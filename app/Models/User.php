<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, LaratrustUserTrait;

    public const ACTIVE = 'active';
    public const BLOCKED = 'blocked';

    public const STATUS = [
        self::ACTIVE => 'active',
        self::BLOCKED => 'blocked',
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

    public function getImagePathAttribute()
    {
        $path = public_path($this->image);
        return !$this->image || !file_exists($path) ? asset('assets/images/profile/user-1.jpg') : asset($this->image);
    }

    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function withdrawRequests()
    {
        return $this->hasMany(WithdrawRequest::class, 'user_id');
    }

    public function wallet()
    {
        $wallet = Wallet::where('model_type', get_class($this))
            ->where('model_id', $this->id)
            ->first();

        if (!$wallet) {
            $wallet = Wallet::create([
                'model_type' => get_class($this),
                'model_id' => $this->id,
                'value' => 0,
            ]);
        }

        return $wallet;
    }

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class, 'user_lessons', 'user_id', 'lesson_id');
    }

    public function scopeFilter($query, $request)
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

    /**
     * Updates the wallet balance by incrementing the amount and creating a new transaction.
     *
     * @param mixed $amount The amount to be incremented in the wallet balance.
     * @param mixed $model (optional) The model associated with the transaction.
     * @param mixed $note (optional) The note for the transaction.
     * @throws Some_Exception_Class If there is an error creating the transaction.
     * @return void
     */
    public function updateWallet($amount, $model = null, $note = null)
    {
        $this->wallet()->increment('value', $amount);
        WalletTransaction::create([
            'wallet_id' => $this->wallet()->id,
            'amount' => $amount,
            'transaction_model_type' => $model ? get_class($model) : '',
            'transaction_model_id' => $model ? $model->id : '',
            'note' => $note,
            'type' => WalletTransaction::CREDIT,
            'status' => 'Success',
        ]);
    }
}
