<?php

namespace App\Http\Controllers\Calculate;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Validators\Calculate\CalculateValidation;
use App\Repositories\EloquentHistoryRepository;
use App\UseCases\Calculate\CalculateOperationUseCase;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CalculateController extends Controller
{
    private CalculateOperationUseCase $calculateOperationUseCase;
    private EloquentHistoryRepository $historyRepository;
    private CalculateValidation $calculateValidation;

    public function __construct(
        CalculateValidation $calculateValidation,
        CalculateOperationUseCase $calculateOperationUseCase,
        EloquentHistoryRepository $historyRepository
    )
    {
        $this->calculateOperationUseCase = $calculateOperationUseCase;
        $this->historyRepository = $historyRepository;
        $this->calculateValidation = $calculateValidation;
    }

    public function __invoke(Request $request, string $userId): JsonResponse
    {
        // Lógica captura de datos
        $operation = $request->input('operation');
        $numb1 = $request->input('numb1');
        $numb2 = $request->input('numb2');

       $resultValidation = $this->calculateValidation->execute($operation, $numb2);
       if (sizeof($resultValidation) > 0) {
           return response()->json($resultValidation);
       }

        $result = $this->calculateOperationUseCase->execute($operation, $numb1, $numb2);

        $this->historyRepository->save($operation, $numb1, $numb2, $result, $userId);

        return response()->json([
            'data' => [
                'result' => $result
            ]
        ]);
    }
}
