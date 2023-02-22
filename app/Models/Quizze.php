<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quizze extends Model
{
    use HasFactory;
    protected $fillable = [
        'question_id',
        'number',
        'answer1',
        'answer2',
        'answer3',
        'answer4',
        'correct_answer',
        'text'
    ];
}
