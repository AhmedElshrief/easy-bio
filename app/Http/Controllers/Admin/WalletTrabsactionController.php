<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\WalletRequest;
use App\Http\Requests\Admin\WalletTransactionRequest;
use App\Models\User;
use App\Models\WalletTransaction;
use App\Models\WithdrawRequest;

class WalletTrabsactionController extends Controller
{
    protected $model;

    public function __construct(WalletTransaction $model)
    {
        $this->model = $model;
    }

    public function create($modelId)
    {
        return view('admin.wallet_transactions.pay_form_modal', [
            'wallet' => $this->model,
            'model_id' => $modelId
        ]);
    }

    public function store(WalletTransactionRequest $request)
    {
        $data = $request->validated();
        $user = User::find($request->model_id);
        $data['transaction_model_id'] = $request->model_id;
        $data['transaction_model_type'] = User::class;
        $data['wallet_id'] = $user->wallet->id;
        if ($request->amount < 0) {
            $data['type'] = WalletTransaction::CREDIT;
        }
        $this->model->create($data);
        toast(__('lang.created_successfully'), 'success');
        return redirect()->route('admin.withdraw_requests.index');
    }

    // public function edit(WalletTransactionRequest $wallet)
    // {
    //     return view('admin.wallet_transactions.pay_form_modal', [
    //         'wallet' => $wallet
    //     ]);
    // }

    // public function update(WalletTransactionRequest $request, WalletTransaction $wallet)
    // {
    //     dd('pay update');
    // }

}




