<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    protected $model;

    public function __construct(Role $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $title = __('lang.delete_item');
        $text = __('lang.are_you_sure');
        confirmDelete($title, $text);

        return view('admin.roles.index', [
            'data' => $this->model->paginate(20),
        ]);
    }

    public function create()
    {
        return view('admin.roles.form', [
            'permissions' => Permission::get()->groupBy('path'),
            'resource' => $this->model,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(RoleRequest $request)
    {
        $inputs = $request->validated();
        DB::beginTransaction();
        $resource = Role::create([
            'name'          =>  $inputs['name'],
            'display_name'  => $inputs['display_name'],
            'description'   => $inputs['description'],
        ]);
        $resource->syncPermissions($inputs['permissions']);
        DB::commit();

        toast(__('lang.added_successfully'), 'success', 'top-right');
        return redirect(route('admin.roles.index'));
    }

    public function edit(Role $role)
    {
        return view('admin.roles.form', [
            'permissions' => Permission::get()->groupBy('path'),
            'resource' => $role,
            'rolePermissions' => $role->permissions->pluck('id')->all(),
        ]);
    }

    public function update(RoleRequest $request, Role $role)
    {
        $inputs = $request->validated();
        DB::beginTransaction();
        $role->update([
            'name'  => $inputs['name'],
            'display_name'  => $inputs['display_name'],
            'description'  => $inputs['description'],
        ]);
        $role->syncPermissions($inputs['permissions']);
        DB::commit();
        toast(__('lang.updated_successfully'), 'success', 'top-right');
        return redirect(route('admin.roles.index'));
    }

    public function destroy(Role $role)
    {
        $role->delete();
        toast(__('lang.deleted_successfully'), 'success', 'top-right');
        return redirect(route('admin.roles.index'));
    }
}
