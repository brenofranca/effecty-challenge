<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignInRequest;
use App\Models\User;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SignOutController extends Controller
{
  public function post(Request $request)
  {
    $request->user()->currentAccessToken()->delete();

    return response()->json('', JsonResponse::HTTP_OK);
  }
}
