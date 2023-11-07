<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WithdrawRequest extends Model
{
    protected $guarded = [];
    public const PENDING = 'pending';
    public const REFUSED = 'refused';
    public const APPROVED = 'approved';

    public const STATUS = [
        self::PENDING => 'pending',
        self::REFUSED => 'refused',
        self::APPROVED => 'approved'
    ];

    protected $appends = ['image_path'];

    public function getImagePathAttribute() {
        $path = public_path($this->image);
        return !$this->image || !file_exists($path)? asset('assets/images/courses/course.jpg') : asset($this->image);
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeFilter($query, $request)
    {
        return $query->where(function ($q) use ($request) {
            if ($request->status) {
                $q->where('status', $request->status);
            }
        });
    }
}
