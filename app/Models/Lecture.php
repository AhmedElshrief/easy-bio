<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Lecture extends Model implements TranslatableContract
{
    use Translatable;
    protected $translatedAttributes = ['title', 'description'];
    protected $guarded = [];

    protected $appends = ['image_path'];

    public function getImagePathAttribute()
    {
        $path = public_path($this->image);
        return !$this->image || !file_exists($path) ? asset('assets/images/courses/course.jpg') : asset($this->image);
    }

    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'lecture_id');
    }

    public function scopeFilter($query, $request)
    {
        if ($request->search) {
            $query->WhereTranslationLike('title', '%' . $request->search . '%');
        }

        if ($request->course_id) {
            $query->where('course_id', $request->course_id);
        }

        if ($request->active) {
            $query->where('active', $request->active === 'active' ? '1' : '0');
        }
    }
}
