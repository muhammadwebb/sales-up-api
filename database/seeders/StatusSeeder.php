<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    public function run(): void
    {
        /* 1 */
        Status::create([
            'company_id' => 1,
            'title' => 'started']
        );
        Status::create([
            'company_id' => 1,
            'title' => 'registered']);
        Status::create([
            'company_id' => 1,
            'title' => 'ordered']);
        Status::create([
            'company_id' => 1,
            'title' => 'called']);

        /* 2 */
        Status::create([
            'company_id' => 2,
            'title' => 'started']
        );
        Status::create([
            'company_id' => 2,
            'title' => 'registered']);
        Status::create([
            'company_id' => 2,
            'title' => 'ordered']);
        Status::create([
            'company_id' => 2,
            'title' => 'called']);

        /* 3 */
        Status::create([
            'company_id' => 3,
            'title' => 'started']
        );
        Status::create([
            'company_id' => 3,
            'title' => 'registered']);
        Status::create([
            'company_id' => 3,
            'title' => 'ordered']);
        Status::create([
            'company_id' => 3,
            'title' => 'called']);
    }
}
