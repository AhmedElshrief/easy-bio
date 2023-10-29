<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminRequest;
use App\Models\Admin;
use App\Models\Role;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $model;

    public function __construct(Admin $model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = __('lang.delete_item');
        $text = __('lang.are_you_sure');
        confirmDelete($title, $text);
        return view('admin.admins.index', [
            'data' => $this->model->filter($request)->paginate(15)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.admins.form', [
            'resource' => $this->model,
            'roles' => Role::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param AdminRequest $request
     */
    public function store(AdminRequest $request)
    {
        $inputs = $request->validated();
        unset($inputs['image'], $inputs['password']);

        $inputs['password'] = bcrypt($request->password);
        if($request->image){
            $inputs['image'] = uploadImage($request->image, config('paths.ADMINS_PATH'));
        }
        $admin = $this->model->create($inputs);
        if($request->role)
            $admin->syncRoles([$request->role]);
        toast(__('lang.added_successfully'), 'success');
        return redirect(route('admin.admins.index'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param Admin $admin
     */
    public function edit(Admin $admin)
    {
        return view('admin.admins.form', [
            'resource' => $admin,
            'roles' => Role::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param AdminRequest $request
     * @param Admin $admin
     */
    public function update(AdminRequest $request, Admin $admin)
    {
        $inputs = $request->validated();
        unset($inputs['image'], $inputs['password']);

        if($request->password) {
            $inputs['password'] = bcrypt($request->password);
        }else {
            $inputs['password'] = $admin->password;
        }
        if($request->image){
            $path = $admin->image ?? null;
            $inputs['image'] = uploadImage($request->image, config('paths.ADMINS_PATH'), $path);
        }
        if($request->role)
            $admin->syncRoles([$request->role]);

        $admin->update($inputs);

        toast(__('lang.updated_successfully'), 'success');
        return redirect(route('admin.admins.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param Admin $admin
     */
    public function destroy(Admin $admin)
    {
        deleteImage($admin->image);
        $admin->delete();
        toast(__('lang.deleted_successfully'), 'success');
        return redirect(route('admin.admins.index'));
    }
}
