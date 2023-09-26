<?php

namespace App\Http\Controllers;

use App\DTO\HQ\HQStoreDTO;
use App\DTO\HQ\HQUpdateDTO;
use App\DTO\S3\S3DTO;
use App\Http\Requests\HQs\HQStoreRequest;
use App\Http\Requests\HQs\HQUpdateRequest;
use App\Http\Requests\S3\S3Request;
use App\Service\HqService;
use App\Service\S3Service;
use Illuminate\Http\Request;

class HqController extends Controller
{
    public function __construct(
        protected HqService $service,
        protected S3Service $s3Service,
    ) { }

    public function index(Request $request)
    {
        $items = $this->service->paginate(
            $page = $request->get('page', 1),
            $totalPerPage = $request->get('totalPerPage', 15),
            filters: $request->get('filters', []),
        );   
        foreach ($items->items() as $item) {
            $item->images = $this->s3Service->getAll($item->images_path);
        }
        return view('teste', compact('items'));
    }

    public function store(S3Request $s3request, HQStoreRequest $storeRequest)
    {
        $images_path = $this->s3Service->store(S3DTO::makeFromRequest($s3request, 'quadrinhos'));
        $storeRequest['images_path'] = $images_path;
        $this->service->store(HQStoreDTO::makeFromRequest($storeRequest));
        return redirect()->back();
    }

    public function show(string $id)
    {
        $hq_data = $this->service->findOne($id);
        $hq_data->images = $this->s3Service->getAll($hq_data->images_path);
        return redirect()->back()->with('data', $hq_data);
    }

    public function update(HQUpdateRequest $request, string $id)
    {
        $this->service->update(
            HQUpdateDTO::makeFromRequest($request, $id)
        );
        return redirect()->back()->with('sucess', 'Atualizado com sucesso');
    }

    public function destroy(string $id)
    {
        /**
         *@var Hq
         */
        $hq = $this->service->findOne($id);
        $this->s3Service->delete($hq->hq_path);
        $hq->delete();
        return redirect()->back()->with('sucess', 'Deletado com sucesso');
    }
}
