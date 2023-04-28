<?php

namespace App\UseCases\Calculate;

class CalculateOperationUseCase
{
    public function execute(string $operation, int $numb1, int $numb2): int
    {
        $result = 0;

        // La lógica de negocio
        if ($operation === 'sum') {
            $result = $numb1 + $numb2;
        }

        if ($operation === 'subtract') {
            $result = $numb1 - $numb2;
        }

        if ($operation === 'multiplication') {
            $result = $numb1 * $numb2;
        }

        if ($operation === 'division') {
            $result = $numb1 / $numb2;
        }

        return $result;
    }
}
