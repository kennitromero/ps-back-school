<?php

namespace App\Repositories;

use App\Models\History;

class EloquentHistoryRepository
{
    public function save($operation, $numb1, $numb2, $result, $userId): History
    {
        // Lógica de persistencia de datos
        return History::create([
            'operation' => $operation,
            'numb1' => $numb1,
            'numb2' => $numb2,
            'result' => $result,
            'user_id' => $userId
        ]);
    }
}
