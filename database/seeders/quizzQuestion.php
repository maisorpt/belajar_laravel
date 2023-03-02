<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Quizze;

class quizzQuestion extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quizzeIds = range(3, 20); // array of quizze IDs
        $questions = [];
    
        foreach ($quizzeIds as $quizzeId) {
            for ($i = 1; $i <= 10; $i++) {
                $questions[] = [
                    'question_id' => $quizzeId,
                    'number' => ($i),
                    'answer1' => Str::random(10),
                    'answer2' => Str::random(10),
                    'answer3' => Str::random(10),
                    'answer4' => Str::random(10),
                    'text' => Str::random(30),
                    'correct_answer' => rand(1, 4)
                ];
            }
        }
    
        DB::table('quizzes')->insert($questions);
    }
    
}
