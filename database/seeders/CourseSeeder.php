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
        ]);

        Course::create([
            'company_id' => 1,
            'title' => 'Fizika',
            'description' => 'Fizika kursi 5-7 klass',
        ]);

        Course::create([
            'company_id' => 1,
            'title' => 'Русский язык',
            'description' => 'Курс Русский язык 7-11 класс',
        ]);


        /* Company 2 */

        Course::create([
            'company_id' => 2,
            'title' => 'English Grammar',
            'description' => 'English Grammar kursi',
        ]);

        Course::create([
            'company_id' => 2,
            'title' => 'Tarix',
            'description' => 'Tarix kursi 10-11 klass',
        ]);

        Course::create([
            'company_id' => 2,
            'title' => 'Kimyo',
            'description' => 'Kimyo kursi 9-11 kalss',
        ]);


        /* Company 3 */

        Course::create([
            'company_id' => 3,
            'title' => 'Back end',
            'description' => 'Back end kursi',
        ]);

        Course::create([
            'company_id' => 3,
            'title' => 'Frontend',
            'description' => 'Frontend kursi',
        ]);

        Course::create([
            'company_id' => 3,
            'title' => 'Mobilografiya',
            'description' => 'Mobilografiya kursi',
        ]);
    }
}
