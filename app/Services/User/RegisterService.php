<?php

namespace App\Services\User;

use App\Models\User;
use App\Services\BaseService;
use Illuminate\Validation\ValidationException;

class RegisterService extends BaseService
{
    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:30',
            'phone' => 'required|unique:users,phone',
            'password' => 'required|min:3'
        ];
    }

    /**
     * @throws ValidationException
     */
    public function execute(array $data): string
    {
        $this->validate($data);
        $user = User::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'password' => $data['password'],
        ]);
        $token = $user->createToken('register')->plainTextToken;

        return $token;
    }
}
