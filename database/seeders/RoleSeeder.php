<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name' => 'superadmin',
            'display_name' => 'Super Admin',
            'description' => 'This role have all permissions of system'
        ];

        $role = Role::where('name', 'superadmin')->first();

        if(!$role)
            Role::create($data);

        $role->syncPermissions(Permission::pluck('id'));
    }
}


