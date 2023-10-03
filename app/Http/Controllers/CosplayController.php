<?php

namespace App\Http\Controllers;

use App\DTO\Cosplays\CosplayStoreDTO;
use App\DTO\Cosplays\CosplayUpdateDTO;
use App\DTO\S3\CosplayS3DTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cosplays\CosplayStoreRequest;
use App\Http\Requests\Cosplays\CosplayUpdateRequest;
use App\Http\Requests\S3\CosplayS3Request;
use App\Service\CosplayService;
use App\Service\S3Service;
use Illuminate\Http\Request;

class CosplayController extends Controller
{
    public function __construct(
        protected CosplayService $service,
        protected S3Service $s3Service,
    ) { }

    public function index(Request $request)
    {
        $items = $this->service->paginate(
            $page = $request->get('page', 1),
            $totalPerPage = $request->get('totalPerPage', 15),
            filters: $request->get('filters', []),
        );   
        foreach($items->items() as $item){
            $item->cosplay = $this->s3Service->findOne($item->cosplay_path); 
            $item->pinture = $this->s3Service->findOne($item->pinture_path); 
        }
        return view('teste', compact('items'));
    }

    public function show(string $id)
    {
        $datas = $this->service->findOne($id);
        $datas->cosplay = $this->s3Service->findOne($datas->cosplay_path);
        $datas->pinture = $this->s3Service->findOne($datas->pinture_path);
        return view('hqs.show')->with('datas', $datas);
    }

    public function create()
    {
        return view('upload.cosplays')->with('route', 'cosplays.store');
    }

    public function store(CosplayS3Request $s3request, CosplayStoreRequest $storeRequest)
    {
        $paths = $this->s3Service->store(CosplayS3DTO::makeFromRequest($s3request, 'cosplays'));

        $storeRequest['cosplay_path'] = $paths[0];
        $storeRequest['pinture_path'] = $paths[1];
        $this->service->store(CosplayStoreDTO::makeFromRequest($storeRequest));

        return redirect()
                ->route('cosplays.index')
                ->with('message', 'Cadastrado com sucesso!');        
    }

    public function edit($id)
    {
        $cosplay = $this->service->findOne($id);
        if($cosplay) return view('cosplays.edit');

        return back()->with('message', 'Não foi possível encontrar o item.');
    }

    public function update(CosplayUpdateRequest $request, string $id)
    {
        $cosplay = $this->service->update(
            CosplayUpdateDTO::makeFromRequest($request, $id)
        );

        if ($cosplay) {
            return redirect()
                ->route('cosplays.index')
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
