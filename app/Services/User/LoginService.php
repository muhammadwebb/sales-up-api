<?php

namespace App\Services\User;

use App\Models\User;
use App\Services\BaseService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginService extends BaseService
{
    public function rules(): array
    {
        return [
            'phone' => 'required|exists:users,phone',
            'password' => 'required'
        ];
    }

    /**
     * @throws ValidationException
     */
    public function execute(array $data): string
    {
        $this->validate($data);
        $user = User::where('phone', $data['phone'])->first();
        if(!$user or !Hash::check($data['password'], $user->password)){
            throw new \Exception('user not found or password incorrect',401);
        }
        $token = $user->createToken('user')->plainTextToken;
        return $token;
    }
}
