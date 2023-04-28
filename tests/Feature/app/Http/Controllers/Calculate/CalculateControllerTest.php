<?php

namespace Tests\Feature\app\Http\Controllers\Calculate;

use App\UseCases\Calculate\CalculateOperationUseCase;
use Mockery\Mock;
use Tests\TestCase;

class CalculateControllerTest extends TestCase
{

    public function testCalculateControllerShouldSumSuccess(): void
    {
        /** @var Mock $calculateOperationUseCaseMock */
        $calculateOperationUseCaseMock = $this->mock(CalculateOperationUseCase::class);
        $calculateOperationUseCaseMock->shouldReceive('execute')
            ->with('sum', 28, 9)
            ->andReturn(37);

        $response = $this->post('/api/1.0/calculate/774848', [
            'operation' => 'sum',
            'numb1' => 28,
            'numb' => 9
        ]);

        $response->assertStatus(200);

        $response->assertJson([
            'data' => [
                'result' => 37
            ]
        ]);

        $this->assertDatabaseHas('histories', [
            'operation' => 'sum',
            'numb1' => 28,
            'numb2' => 9,
            'user_id' => '774848'
        ]);
    }
}
