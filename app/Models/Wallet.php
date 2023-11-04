<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = ['model_id', 'model_type', 'value'];

    public function user()
    {
        return $this->belongsTo(User::class, 'model_id', 'id');
    }
}
