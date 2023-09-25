<?php

namespace App\Http\Controllers;

use App\DTO\HQ\HQStoreDTO;
use App\DTO\HQ\HQUpdateDTO;
use App\DTO\S3\S3DTO;
use App\Http\Requests\HQs\HQStoreRequest;
use App\Http\Requests\HQs\HQUpdateRequest;
use App\Http\Requests\Web\S3\S3Request;
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
        $images = [];
        foreach ($items->items() as $item) {
            $images[] = $this->s3Service->findOne($item->image_path);
        }
        return view('teste', compact('items', 'images'));
    }

    public function store(S3Request $s3request, HQStoreRequest $storeRequest)
    {
        $image_path = $this->s3Service->store(S3DTO::makeFromRequest($s3request, 'quadrinhos'));
        $storeRequest['image_path'] = $image_path;
        $this->service->store(HQStoreDTO::makeFromRequest($storeRequest));
        return redirect()->back();
    }

    public function show(string $id)
    {
        $cosplay = $this->service->findOne($id);
        $image = $this->s3Service->findOne($cosplay->image_path);
        return $image;
    }

    public function update(HQUpdateRequest $request, string $id)
    {
        $this->service->update(
            HQUpdateDTO::makeFromRequest($request, $id)
        );
        return redirect()->back();
    }

    public function destroy(string $id)
    {
        $this->service->delete($id);
        return redirect()->back();
    }
}
