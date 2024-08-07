<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLessons extends Model
{
    use HasFactory;
    protected $table = 'user_lessons';

    protected $fillable = ['user_id', 'lesson_id'];

}
