<?php

namespace App\Http\Controllers;

use App\Models\Licitation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LicitationDetailsController extends Controller
{
    public function get(Request $request) {
        $licitation = Licitation::with([
            'candidates', 
            'responsibles', 
            'documents', 
            'winner',
            'result', 
        ])
        ->find($request->route('id'));

        return response()->json($licitation, JsonResponse::HTTP_OK);
    }
}
