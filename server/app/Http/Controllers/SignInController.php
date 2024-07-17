<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignInRequest;
use App\Models\User;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class SignInController extends Controller
{
  public function post(SignInRequest $request)
  {
    $user = User::where('email', $request->email)->first();

    $isInvalidPassword = Hash::check($request->password, $user->password);

    if (!$isInvalidPassword) {
      throw new HttpResponseException(response()->json([
        'errors' => ['The provided credentials are incorrect.'],
      ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }

    return [
      'token' => $user->createToken($user->id)->plainTextToken,
      'user' => $user,
    ];
  }
}
