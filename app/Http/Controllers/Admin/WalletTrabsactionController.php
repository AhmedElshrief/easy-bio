<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\WalletRequest;
use App\Http\Requests\Admin\WalletTransactionRequest;
use App\Models\User;
use App\Models\Wallet;
use App\Models\WalletTransaction;
use App\Models\WithdrawRequest;
use Illuminate\Support\Facades\DB;

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
        DB::beginTransaction();
        $data['transaction_model_id'] = $request->model_id;
        $data['transaction_model_type'] = User::class;
        $data['note'] = $request->note;
        $data['wallet_id'] = $user->wallet()->id;

        Wallet::where('model_id', $user->id)->where('model_type', User::class)->increment('value', $request->amount);
        $data['type'] = WalletTransaction::CREDIT;
        WithdrawRequest::where('user_id', $user->id)->update(['status' => WithdrawRequest::APPROVED]);
        $this->model->create($data);

        DB::commit();
        toast(__('lang.created_successfully'), 'success');
        return redirect()->route('admin.withdraw_requests.index');
    }

}




