<?php

namespace App\Http\Controllers\Calculate;

use App\Http\Controllers\Controller;
use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function __invoke(string $userId) {
        $histories = History::where('user_id', '=', $userId)
            ->select(['id', 'operation', 'numb1', 'numb2', 'result', 'created_at as date'])
            ->get();

        if ($histories->isEmpty()) {
            return response()->json([
                'error' => [
                    'code' => 'CODE_HISTORY_OPERATION_EMPTY',
                    'title' => 'Sin historial',
                    'detail' => 'Usuario no tiene historial de operaciones'
                ]
            ]);
        }

        return response()->json([
            'data' => $histories
        ]);
    }
}
