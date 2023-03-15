<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Answer extends Model
{
    use HasFactory;
    protected $table = 'user_answers';

    protected $fillable = [
        'user_id',
        'question_id',
        'test_id',
        'remaining_time',
        'isCompleted',
    ];

    protected $casts = [
        'isCompleted' => 'boolean',
    ];
}
