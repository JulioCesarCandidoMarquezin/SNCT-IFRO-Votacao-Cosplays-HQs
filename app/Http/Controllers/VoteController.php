<?php

namespace App\Http\Controllers;

use App\DTO\Vote\VoteStoreDTO;
use App\DTO\Vote\VoteUpdateDTO;
use App\Http\Requests\Votes\VoteStoreRequest;
use App\Http\Requests\Votes\VoteUpdateRequest;
use App\Service\VoteService;

class VoteController extends Controller
{
    public function __construct(
        protected VoteService $service,
    ) { }

    public function vote(VoteStoreRequest $request)
    {
        $voted = $this->service->vote(VoteStoreDTO::makeFromRequest($request));
        if($voted) return redirect()->back()->with('Success', 'Voto registrado com sucesso!');
        return redirect()->back()->with('Error', 'Você já votou nessa turma.');
    }

    function score(VoteStoreRequest $request)
    {
        $totalVotos = $this->service->score(VoteStoreDTO::makeFromRequest($request));

        return $totalVotos;
    }

    public function update(VoteUpdateRequest $request)
    {
        $updated = $this->service->update(VoteUpdateDTO::makeFromRequest($request));
        if($updated) redirect()->back()->with('Success', 'Voto atualizado com sucesso!');

        return redirect()->back()->with('Error', 'Voto não atualizado');
    }

    public function destroy(VoteUpdateRequest $request)
    {
        $deleted = $this->service->delete(VoteUpdateDTO::makeFromRequest($request));
        if($deleted) redirect()->back()->with('Success', 'Voto deletado com sucesso!');

        return redirect()->back()->with('Error', 'Voto não deletado');
    }
}
