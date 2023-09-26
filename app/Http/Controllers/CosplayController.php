<?php

namespace App\Http\Controllers;

use App\DTO\Cosplays\CosplayStoreDTO;
use App\DTO\Cosplays\CosplayUpdateDTO;
use App\DTO\S3\S3DTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cosplays\CosplayStoreRequest;
use App\Http\Requests\Cosplays\CosplayUpdateRequest;
use App\Http\Requests\S3\S3Request;
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
        foreach($items as $item){
            $item->cosplay_url = $this->s3Service->findOne($item->cosplay_path); 
            $item->pinture_url = $this->s3Service->findOne($item->pinture_path); 
        }
        return view('teste', compact('items'));
    }

    public function store(S3Request $s3request, CosplayStoreRequest $storeRequest)
    {
        dd('store');
        $cosplay_path = $this->s3Service->store(S3DTO::makeFromRequest($s3request, 'cosplays'));
        $storeRequest['cosplay_path'] = $cosplay_path;
        $this->service->store(CosplayStoreDTO::makeFromRequest($storeRequest));
        return redirect()->back();
    }

    public function show(string $id)
    {
        $cosplay_data = $this->service->findOne($id);
        $cosplay_data->cosplay = $this->s3Service->findOne($cosplay_data->cosplay_path);
        $cosplay_data->pinture = $this->s3Service->findOne($cosplay_data->pinture_path);
        return redirect()->back()->with($cosplay_data);
    }

    public function update(CosplayUpdateRequest $request, string $id)
    {
        $this->service->update(
            CosplayUpdateDTO::makeFromRequest($request, $id)
        );
        return redirect()->back();
    }

    public function destroy(string $id)
    {
        /**
         *@var Cosplay
         */
        $cosplay = $this->service->findOne($id);
        $this->s3Service->delete($cosplay->cosplay_path);
        $cosplay->delete();
        return redirect()->back();
    }
}
