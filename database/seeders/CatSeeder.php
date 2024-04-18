<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\cat;
use App\Models\Exam;
use App\Models\Questions;
use App\Models\Skill;

class CatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // cat::factory()->has(
        //     Skill::factory()->has(
        //         Exam::factory()->has(
        //             Questions::factory()->count(15)
        //         )->count(2)
        //     )->count(8)
        // )->count(5)->create();
        cat::factory()->has(
            Skill::factory()->has(
                Exam::factory()->has(
                    Questions::factory()->count(15)
                )->count(2)
            )->count(8)
        )->count(5)->create();
    }
    // كل كاتيجوري ليه 8 مهارات و تحت كل مهارة فيه امتحانين و بكل امتحان فيه 15 سؤال
}
