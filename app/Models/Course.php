<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Course extends Model implements TranslatableContract
{
    use Translatable;
    protected $translatedAttributes = ['title', 'description'];
    protected $guarded = [];

    protected $appends = ['image_path'];

    public function getImagePathAttribute() {
        $path = public_path($this->image);
        return !$this->image || !file_exists($path)? asset('assets/images/courses/course.jpg') : asset($this->image);
    }

    public function level() {
        return $this->belongsTo(Level::class, 'level_id');
    }
}




