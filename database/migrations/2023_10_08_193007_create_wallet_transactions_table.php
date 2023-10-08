<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallet_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_model_type')->nullable();
            $table->string('transaction_model_id')->nullable();
            $table->float('amount');
            $table->string('note')->nullable();
            $table->enum('type', ['debit', 'credit'])->default('debit');
            $table->string('status')->default('pending');
            $table->foreignId('wallet_id')->constrained('wallets')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('cancled_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wallet_transactions');
    }
};
