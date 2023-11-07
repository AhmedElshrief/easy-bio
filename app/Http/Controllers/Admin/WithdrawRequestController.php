<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\WithdrawRequest as AdminWithdrawRequest;
use App\Models\User;
use App\Models\WithdrawRequest;
use Illuminate\Http\Request;

class WithdrawRequestController extends Controller
{
    protected $model;

    public function __construct(WithdrawRequest $model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = __('lang.delete_item');
        $text = __('lang.are_you_sure');
        confirmDelete($title, $text);
        return view('admin.withdraw_requests.index', [
            'withdraw_requests' => $this->model->filter($request)->paginate(15)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  WithdrawRequest $withdraw_request
     * @return \Illuminate\Http\Response
     */
    public function edit(WithdrawRequest $withdraw_request)
    {
        return view('admin.withdraw_requests.form', [
            'users' => User::get()->pluck('name', 'id'),
            'withdraw_request' => $withdraw_request
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  WithdrawRequest $withdraw_request
     * @return \Illuminate\Http\Response
     */
    public function update(AdminWithdrawRequest $request, WithdrawRequest $withdraw_request)
    {
        $data = $request->validated();
        if(isset($data['image'])) {
            $data['image'] = uploadImage($data['image'], config('paths.WITHDRAW_REQUESTS_PATH'), $withdraw_request->image);
        }
        $withdraw_request->update($data);
        toast(__('lang.updated_successfully'), 'success');
        return redirect()->route('admin.withdraw_requests.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(WithdrawRequest $withdraw_request)
    {
        deleteImage($withdraw_request->image);
        $withdraw_request->delete();
        toast(__('lang.deleted_successfully'), 'success');
        return redirect()->route('admin.withdraw_requests.index');
    }

    public function payFormModal()
    {
        return view('admin.withdraw_requests.pay_form_modal');
    }

    public function refuse(WithdrawRequest $withdraw_request)
    {
        $withdraw_request->update([
            'status' => WithdrawRequest::REFUSED
        ]);
        toast(__('lang.updated_successfully'), 'success');
        return redirect()->route('admin.withdraw_requests.index');
    }
}




