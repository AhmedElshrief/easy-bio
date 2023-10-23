<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class Admin extends Authenticatable
{
    use HasFactory, LaratrustUserTrait;

    protected $fillable = ['username', 'email', 'password', 'phone', 'image'];
    protected $table = 'admins';

    protected $hidden = ['password'];

    protected $appends = ['image_path'];

    public function getImagePathAttribute() {
        $path = public_path($this->image);
        return !$this->image || !file_exists($path)? asset('assets/images/profile/user-1.jpg') : asset($this->image);
    }
}







