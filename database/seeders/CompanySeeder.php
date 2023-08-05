<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        Company::create([
            'user_id' => 1,
            'title' => 'Company 1',
            'description' => 'First School Company',
            'phone' => 99899222222,
            'is_current_active' => false
        ]);

        Company::create([
            'user_id' => 2,
            'title' => 'Company 2',
            'description' => 'First School Company',
            'phone' => 99899333333,
            'is_current_active' => false
        ]);

        Company::create([
            'user_id' => 3,
            'title' => 'Company 3',
            'description' => 'First School Company',
            'phone' => 99899444444,
            'is_current_active' => false
        ]);
    }
}
