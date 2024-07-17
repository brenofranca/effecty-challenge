<?php

namespace App\Http\Controllers;

use App\Models\Licitation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LicitationRecentController extends Controller
{
    public function get(Request $request)
    {
        $licitations = Licitation::take($request->query('take', 3))->get();

        return response()->json(['licitations' => $licitations], JsonResponse::HTTP_OK);
    }
}
