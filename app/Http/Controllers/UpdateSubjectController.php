<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Subject;

class UpdateSubjectController extends Controller
{
    public function update(Request $request, $subjectId): JsonResponse
    {
        $Subject = Subject::where('Id', $subjectId)->firstOrFail();

        //dd($Subject);
        $Subject->update([
            
            'name' => $request->input('name'),
            
        ]);
        $Subject->save();
        return response()->json($Subject);
    }

}


