<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletTransaction extends Model
{
    use HasFactory;

    public const DEBIT = 'debit';
    public const CREDIT = 'credit';

    protected $fillable = ['transaction_model_type', 'transaction_model_id', 'amount', 'note', 'type', 'status', 'wallet_id'];

    public function wallet() {
        return $this->belongsTo(Wallet::class);
    }
}


