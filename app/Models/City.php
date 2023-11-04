<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class City extends Model implements TranslatableContract
{
    use Translatable;

    protected $translatedAttributes = ['name'];
    protected $guarded = [];

    public function students() {
        return $this->hasMany(User::class, 'city_id');
    }

    public function scopeFilter($query, $request)
    {
        if ($request->search) {
            $query->WhereTranslationLike('name', '%' . $request->search . '%');
        }
    }
}



