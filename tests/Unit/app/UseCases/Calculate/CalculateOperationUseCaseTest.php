<?php

namespace Tests\Unit\app\UseCases\Calculate;

use App\UseCases\Calculate\CalculateOperationUseCase;
use Tests\TestCase;

class CalculateOperationUseCaseTest extends TestCase
{
    public function testExecuteSum()
    {
        $calculateOperationUseCase = new CalculateOperationUseCase();

        $result = $calculateOperationUseCase->execute('sum', 5, 5);
        $this->assertSame(10, $result);
    }

    public function testExecuteSubtract()
    {
        $calculateOperationUseCase = new CalculateOperationUseCase();

        $result = $calculateOperationUseCase->execute('subtract', 5, 2);
        $this->assertSame(3, $result);
    }

    public function testExecuteMultiplication()
    {
        $calculateOperationUseCase = new CalculateOperationUseCase();

        $result = $calculateOperationUseCase->execute('multiplication', 2, 3);
        $this->assertSame(6, $result);
    }

    public function testExecuteDivision()
    {
        $calculateOperationUseCase = new CalculateOperationUseCase();

        $result = $calculateOperationUseCase->execute('division', 4, 2);
        $this->assertSame(2, $result);
    }
}
