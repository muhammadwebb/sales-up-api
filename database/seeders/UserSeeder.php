<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'director 1',
            'phone' => 998991111111,
            'password' => '123',
        ]);

        User::create([
            'name' => 'director 2',
            'phone' => 998991111112,
            'password' => '123',
        ]);

        User::create([
            'name' => 'director 3',
            'phone' => 998991111113,
            'password' => '123',
        ]);
    }
}
