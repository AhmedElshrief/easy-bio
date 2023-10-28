<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, LaratrustUserTrait;

    public const ACTIVE = 'active';
    public const BLOCKED = 'blocked';

    public const STATUS = [
        self::ACTIVE => 'active',
        self::BLOCKED => 'blocked'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'parent_phone',
        'username',
        'password',
        'status',
        'image',
        'level_id',
        'city_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    protected $appends = ['image_path'];

    public function getImagePathAttribute() {
        $path = public_path($this->image);
        return !$this->image || !file_exists($path)? asset('assets/images/profile/user-1.jpg') : asset($this->image);
    }

    public function level() {
        return $this->belongsTo(Level::class, 'level_id');
    }

    public function city() {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function withdrawRequests() {
        return $this->hasMany(WithdrawRequest::class, 'user_id');
    }

    public function wallet()
    {
        return $this->hasOne(Wallet::class, 'model_id', 'id');
    }

    public function scopeFilter($query,$request)
    {
        return $query->where(function ($q) use ($request) {
            if ($request->search) {
                $q->where('name', 'like', '%' . $request->search . '%');
                $q->orWhere('phone', 'like', '%' . $request->search . '%');
                $q->orWhere('email', 'like', '%' . $request->search . '%');
            }

            if ($request->status) {
                $q->where('status', $request->status);
            }
        });
    }

}




