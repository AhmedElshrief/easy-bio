<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LessonTranslation extends Model
{
    protected $fillable = ['title', 'description'];
    public $timestamps = false;
}
