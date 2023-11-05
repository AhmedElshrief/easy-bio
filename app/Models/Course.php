<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Course extends Model implements TranslatableContract
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

    public function lectures()
    {
        return $this->hasMany(Lecture::class, 'course_id');
    }

    public function lessons()
    {
        return Lesson::whereIn('lecture_id', $this->lectures->pluck('id'));
    }

    public function scopeFilter($query, $request)
    {
        if ($request->search) {
            $query->WhereTranslationLike('title', '%' . $request->search . '%');
        }

        if ($request->level_id) {
            $query->where('level_id', $request->level_id);
        }

        if ($request->active) {
            $query->where('active', $request->active === 'active' ? '1' : '0');
        }
    }
}
