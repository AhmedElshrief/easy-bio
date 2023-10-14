<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Level extends Model implements TranslatableContract
{
    use Translatable;

    protected $translatedAttributes = ['name'];
    protected $guarded = [];

    public function courses() {
        return $this->hasMany(Course::class, 'level_id');
    }
}



