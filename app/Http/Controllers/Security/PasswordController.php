<?php

namespace App\Http\Controllers\Security;

use App\Contracts\Security\PasswordServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PasswordController extends Controller
{
    public function __construct(
        protected PasswordServiceInterface $passwordService
    ) {
    }

    /**
     * Decode password token
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function decodeToken(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required|string'
        ]);

        if($validator->fails()) {
            return $this->error(
                message:__('error.validations'), 
                data: $validator->errors(), 
                httpCode: 400
            );
        }

        try {
            $data = json_decode(decrypt($request->token));
            if($data->login && $data->token) {
                if($this->passwordService->verifyToken($data->login, $data->token)) {
                    return $this->success(
                        message:__('success.security.password.token_valid'),
                        data: ['login' => $data->login]
                    );
                }
            }
        } catch (\Throwable $exeption) {
            // Do nothing
        }
        return $this->error(
            message:__('error.security.password.token_invalid'),
            httpCode: 400
        );
    }

    /**
     * Update Password
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'token'     => 'required|string',
            'password'  => 'required|digits:6|confirmed'
        ]);

        if($validator->fails()) {
            return $this->error(
                message:__('error.validations'),
                data: $validator->errors(),
                httpCode: 400
            );
        }

        try {
            $data = json_decode(decrypt($request->token));
            if($data->login && $data->token) {
                if($this->passwordService->verifyToken($data->login, $data->token)) {
                    if($this->passwordService->updatePassword($data->login, $request->password)) {
                        return $this->success(__('success.security.password.updated'));
                    }
                }
            }
        } catch (\Throwable $exeption) {
            // Do nothing
            return $this->error(
                message:__('error.security.password.token_invalid'),
                httpCode: 400
            );
        }

        return $this->error();
    }
}