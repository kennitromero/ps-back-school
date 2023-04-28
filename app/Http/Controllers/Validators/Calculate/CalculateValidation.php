<?php

namespace App\Http\Controllers\Validators\Calculate;

class CalculateValidation
{
    public function execute(string $operation, $numb2): array
    {
        //dd($request->all(), $operation, $numb1, $numb2);

        // Lógica de validación
        // $operation !== 'sum' || $operation !== 'subtract' || $operation !== 'multiplication' || $operation !== 'division'
        if (!in_array($operation, ['sum', 'subtract', 'multiplication', 'division'])) {
            return [
                'error' => [
                    'code' => 'FORM_ERROR',
                    'title' => 'Operación inválida',
                    'detail' => 'Operación no permitida, solo se puede hacer +, -, * y /'
                ]
            ];
        }

        if ($operation === 'division' && $numb2 === 0) {
            return [
                'error' => [
                    'code' => 'FORM_ERROR',
                    'title' => 'División inválida',
                    'detail' => 'El divisor no debe ser 0'
                ]
            ];
        }

        return [];
    }
}
