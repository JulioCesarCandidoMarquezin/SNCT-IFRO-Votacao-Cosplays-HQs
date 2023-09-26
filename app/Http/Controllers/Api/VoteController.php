<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\DTO\Vote\VoteStoreDTO;
use App\DTO\Vote\VoteUpdateDTO;
use App\Http\Requests\Votes\VoteStoreRequest;
use App\Http\Requests\Votes\VoteUpdateRequest;
use App\Service\VoteService;
use Illuminate\Http\JsonResponse;

class VoteController extends Controller
{
    protected $service;

    public function __construct(VoteService $service)
    {
        $this->service = $service;
    }

    public function vote(VoteStoreRequest $request): JsonResponse
    {
        $voted = $this->service->vote(VoteStoreDTO::makeFromRequest($request));
        
        if($voted) {
            return response()->json(['message' => 'Voto registrado com sucesso!'], 200);
        } else {
            return response()->json(['message' => 'Você já votou nessa turma.'], 400);
        }
    }

    public function score(VoteUpdateRequest $request): JsonResponse
    {
        $totalVotos = $this->service->score(VoteUpdateDTO::makeFromRequest($request));
        
        return response()->json(['total_votos' => $totalVotos], 200);
    }

    public function update(VoteUpdateRequest $request): JsonResponse
    {
        $updated = $this->service->update(VoteUpdateDTO::makeFromRequest($request));
        
        if($updated) {
            return response()->json(['message' => 'Voto atualizado com sucesso!'], 200);
        } else {
            return response()->json(['message' => 'Voto não atualizado'], 400);
        }
    }

    public function destroy(VoteUpdateRequest $request): JsonResponse
    {
        $deleted = $this->service->delete(VoteUpdateDTO::makeFromRequest($request));
        
        if($deleted) {
            return response()->json(['message' => 'Voto deletado com sucesso!'], 200);
        } else {
            return response()->json(['message' => 'Voto não deletado'], 400);
        }
    }
}
