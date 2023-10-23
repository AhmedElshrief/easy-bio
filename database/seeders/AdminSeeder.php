<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'username' => 'admin',
            'password' => bcrypt('123456'),
            'email' => 'admin@gmail.com',
            'phone' => '0123456789',
            'image' => 'admin.jpg',
        ];
        $admin = Admin::where('email','admin@gmail.com')->first();
        if(!$admin)
            Admin::create($data);

        $admin->syncRoles(['superadmin']);
    }
}






