<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function responseGeneralError(): JsonResponse
    {
        return response()->json([
            'error' => [
                'code' => 'CODE_GENERAL_ERROR',
                'title' => 'Ocurrió un error',
                'detail' => 'Estamos trabajando para solucionarlo.'
            ]
        ]);
    }
}
