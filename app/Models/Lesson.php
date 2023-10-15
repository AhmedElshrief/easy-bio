<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Lesson extends Model implements TranslatableContract
{
    use Translatable;
    protected $translatedAttributes = ['title', 'description'];
    protected $guarded = [];

    protected $appends = ['image_path'];

    public function getImagePathAttribute() {
        $path = public_path($this->image);
        return !$this->image || !file_exists($path)? asset('assets/images/courses/course.jpg') : asset($this->image);
    }

    public function lecture() {
        return $this->belongsTo(Lecture::class, 'lecture_id');
    }
}


