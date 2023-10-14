<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseTranslation extends Model
{
    protected $fillable = ['title', 'description'];
    public $timestamps = false;
}
