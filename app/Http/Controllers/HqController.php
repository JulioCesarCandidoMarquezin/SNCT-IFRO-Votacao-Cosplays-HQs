<?php

namespace App\Http\Controllers;

use App\DTO\HQ\HQStoreDTO;
use App\DTO\HQ\HQUpdateDTO;
use App\DTO\S3\HqS3DTO;
use App\Http\Requests\HQs\HQStoreRequest;
use App\Http\Requests\HQs\HQUpdateRequest;
use App\Http\Requests\S3\HqS3Request;
use App\Service\HqService;
use App\Service\S3Service;
use App\Utils\Utils;
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
            $item->images_url = Utils::arraySort($this->s3Service->getAllUrlsFromPath($item->images_path));
        }
        return view('teste', compact('items'));
    }

    public function show(string $id)
    {
        $datas = $this->service->findOne($id);
        $datas->images = $this->s3Service->getAll($datas->images_path);
        return view('hqs.show')->with('datas', $datas);
    }

    public function create() 
    {
        return view('upload.hqs')->with('route', 'hqs.store');;
    }

    public function store(HqS3Request $s3request, HQStoreRequest $storeRequest)
    {
        $images_path = $this->s3Service->store(HqS3DTO::makeFromRequest($s3request, 'hqs'));
        $storeRequest['images_path'] = $images_path[0];
        $this->service->store(HQStoreDTO::makeFromRequest($storeRequest));
        return redirect()
                ->route('hqs.index')
                ->with('message', 'Cadastrado com sucesso!'); 
    }

    public function edit($id)
    {
        $hq = $this->service->findOne($id);
        if($hq) return view('hqs.edit');

        return back()->with('message', 'Não foi possível encontrar o item.');
    }

    public function update(HQUpdateRequest $request, string $id)
    {
        $hq = $this->service->update(
            HQUpdateDTO::makeFromRequest($request, $id)
        );

        if($hq) {
            return redirect()
                ->route('hqs.index')
                ->with('message', 'Atualizado com sucesso!');
        }

        return back()->with('message', 'Não foi possível atualizar');
    }

    public function destroy(string $id)
    {
        $deleted = $this->service->delete($id);

        if($deleted) {
            return redirect()->route('cosplays.index')->with('sucess', 'Deletado com sucesso');
        }
        
        return back()->with('message', 'Não foi possível deletar');
    }
}
