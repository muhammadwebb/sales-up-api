<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        /* Company 1 */
        Course::create([
            'company_id' => 1,
            'title' => 'Matematika',
            'description' => 'Matematika kursi 9-11 klass',
            'price' => 120000
        ]);

        Course::create([
            'company_id' => 1,
            'title' => 'Fizika',
            'description' => 'Fizika kursi 5-7 klass',
            'price' => 120000
        ]);

        Course::create([
            'company_id' => 1,
            'title' => 'Русский язык',
            'description' => 'Курс Русский язык 7-11 класс',
            'price' => 150000
        ]);


        /* Company 2 */

        Course::create([
            'company_id' => 2,
            'title' => 'English Grammar',
            'description' => 'English Grammar kursi',
            'price' => 150000
        ]);

        Course::create([
            'company_id' => 2,
            'title' => 'Tarix',
            'description' => 'Tarix kursi 10-11 klass',
            'price' => 120000
        ]);

        Course::create([
            'company_id' => 2,
            'title' => 'Kimyo',
            'description' => 'Kimyo kursi 9-11 kalss',
            'price' => 120000
        ]);


        /* Company 3 */

        Course::create([
            'company_id' => 3,
            'title' => 'Back end',
            'description' => 'Back end kursi',
            'price' => 400000
        ]);

        Course::create([
            'company_id' => 3,
            'title' => 'Frontend',
            'description' => 'Frontend kursi',
            'price' => 400000
        ]);

        Course::create([
            'company_id' => 3,
            'title' => 'Mobilografiya',
            'description' => 'Mobilografiya kursi',
            'price' => 400000
        ]);
    }
}
