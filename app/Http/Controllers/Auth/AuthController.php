<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Services\User\LoginService;
use App\Services\User\RegisterService;
use App\Traits\JsonRespondController;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    use JsonRespondController;

    public function register(Request $request)
    {
        try {
            $user = app(RegisterService::class)->execute($request->all());
            return ['token' => $user];
        } catch (ValidationException $exception) {
            return $this->respondValidatorFailed($exception->validator);
        }
    }


    public function login(Request $request): JsonResponse|array
    {
        try {
            $token = app(LoginService::class)->execute($request->all());
            return ['token' => $token];
        } catch (ValidationException $exception) {
            return $this->respondValidatorFailed($exception->validator);
        } catch (Exception $exception){
            $this->setHTTPStatusCode($exception->getCode());
            return $this->respondWithError($exception->getMessage());
        }
    }


    public function getme(): UserResource
    {
        $user = auth()->user();
        return new UserResource($user);
    }
}
