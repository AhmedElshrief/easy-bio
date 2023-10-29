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

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_lessons', 'user_id', 'lesson_id');
    }

    public function scopeFilter($query, $request)
    {
        if ($request->search) {
            $query->WhereTranslationLike('title', '%' . $request->search . '%');
        }

        if ($request->lecture_id) {
            $query->where('lecture_id', $request->lecture_id);
        }

        if ($request->active) {
            $query->where('active', $request->active === 'active' ? '1' : '0');
        }
    }
}


