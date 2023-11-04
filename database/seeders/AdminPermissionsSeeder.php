<?php

namespace Database\Seeders;

use App\Models\Permission;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class AdminPermissionsSeeder extends Seeder
{

    public $permissions = [];

    public function initPermissions()
    {
        $perfix = "admin_";

        $this->permissions = [
            ['name' => $perfix . 'read-dashboard', 'display_name' => 'Read Dashboard', 'description' => 'عرض لوحة التحكم', 'path' => 'dashboard'],

            //admins
            ['name' => $perfix . 'read-admins', 'display_name' => 'Read Admins', 'description' => 'عرض المسؤلين', 'path' => 'admins'],
            ['name' => $perfix . 'create-admins', 'display_name' => 'Create Admins', 'description' => 'اضافة المسؤلين', 'path' => 'admins'],
            ['name' => $perfix . 'update-admins', 'display_name' => 'Update Admins', 'description' => 'تعديل المسؤلين', 'path' => 'admins'],
            ['name' => $perfix . 'delete-admins', 'display_name' => 'Delete Admins', 'description' => 'حذف المسؤلين', 'path' => 'admins'],

            //courses
            ['name' => $perfix . 'read-courses', 'display_name' => 'Read Courses', 'description' => 'عرض الدورات', 'path' => 'courses'],
            ['name' => $perfix . 'create-courses', 'display_name' => 'Create Courses', 'description' => 'اضافة الدورات', 'path' => 'courses'],
            ['name' => $perfix . 'update-courses', 'display_name' => 'Update Courses', 'description' => 'تعديل الدورات', 'path' => 'courses'],
            ['name' => $perfix . 'delete-courses', 'display_name' => 'Delete Courses', 'description' => 'حذف الدورات', 'path' => 'courses'],

            //lectures
            ['name' => $perfix . 'read-lectures', 'display_name' => 'Read Lectures', 'description' => 'عرض المحاضرات', 'path' => 'lectures'],
            ['name' => $perfix . 'create-lectures', 'display_name' => 'Create Lectures', 'description' => 'اضافة المحاضرات', 'path' => 'lectures'],
            ['name' => $perfix . 'update-lectures', 'display_name' => 'Update Lectures', 'description' => 'تعديل المحاضرات', 'path' => 'lectures'],
            ['name' => $perfix . 'delete-lectures', 'display_name' => 'Delete Lectures', 'description' => 'حذف المحاضرات', 'path' => 'lectures'],

            //lessons
            ['name' => $perfix . 'read-lessons', 'display_name' => 'Read Lessons', 'description' => 'عرض الدروس', 'path' => 'lessons'],
            ['name' => $perfix . 'create-lessons', 'display_name' => 'Create Lessons', 'description' => 'اضافة الدروس', 'path' => 'lessons'],
            ['name' => $perfix . 'update-lessons', 'display_name' => 'Update Lessons', 'description' => 'تعديل الدروس', 'path' => 'lessons'],
            ['name' => $perfix . 'delete-lessons', 'display_name' => 'Delete Lessons', 'description' => 'حذف الدروس', 'path' => 'lessons'],

            //students
            ['name' => $perfix . 'read-students', 'display_name' => 'Read Students', 'description' => 'عرض الطلاب', 'path' => 'students'],
            ['name' => $perfix . 'create-students', 'display_name' => 'Create Students', 'description' => 'اضافة الطلاب', 'path' => 'students'],
            ['name' => $perfix . 'update-students', 'display_name' => 'Update Students', 'description' => 'تعديل الطلاب', 'path' => 'students'],
            ['name' => $perfix . 'delete-students', 'display_name' => 'Delete Students', 'description' => 'حذف الطلاب', 'path' => 'students'],

            //levels
            ['name' => $perfix . 'read-levels', 'display_name' => 'Read Levels', 'description' => 'عرض الطلاب', 'path' => 'levels'],
            ['name' => $perfix . 'create-levels', 'display_name' => 'Create Levels', 'description' => 'اضافة الطلاب', 'path' => 'levels'],
            ['name' => $perfix . 'update-levels', 'display_name' => 'Update Levels', 'description' => 'تعديل الطلاب', 'path' => 'levels'],
            ['name' => $perfix . 'delete-levels', 'display_name' => 'Delete Levels', 'description' => 'حذف الطلاب', 'path' => 'levels'],

            //cities
            ['name' => $perfix . 'read-cities', 'display_name' => 'Read Cities', 'description' => 'عرض المدن', 'path' => 'cities'],
            ['name' => $perfix . 'create-cities', 'display_name' => 'Create Cities', 'description' => 'اضافة المدن', 'path' => 'cities'],
            ['name' => $perfix . 'update-cities', 'display_name' => 'Update Cities', 'description' => 'تعديل المدن', 'path' => 'cities'],
            ['name' => $perfix . 'delete-cities', 'display_name' => 'Delete Cities', 'description' => 'حذف المدن', 'path' => 'cities'],

            //questions_answers
            ['name' => $perfix . 'read-questions_answers', 'display_name' => 'Read Quesiosns And Answers', 'description' => 'عرض الأسئله والاجابات', 'path' => 'questions_answers'],
            ['name' => $perfix . 'create-questions_answers', 'display_name' => 'Create Quesiosns And Answers', 'description' => 'اضافة الأسئله والاجابات', 'path' => 'questions_answers'],
            ['name' => $perfix . 'update-questions_answers', 'display_name' => 'Update Quesiosns And Answers', 'description' => 'تعديل الأسئله والاجابات', 'path' => 'questions_answers'],
            ['name' => $perfix . 'delete-questions_answers', 'display_name' => 'Delete Quesiosns And Answers', 'description' => 'حذف الأسئله والاجابات', 'path' => 'questions_answers'],

            //questions_answers
            ['name' => $perfix . 'read-withdraw_requests', 'display_name' => 'Read Withdraw Requests', 'description' => 'عرض طلبات الدفع', 'path' => 'withdraw_requests'],
            ['name' => $perfix . 'create-withdraw_requests', 'display_name' => 'Create Withdraw Requests', 'description' => 'اضافة طلبات الدفع', 'path' => 'withdraw_requests'],
            ['name' => $perfix . 'update-withdraw_requests', 'display_name' => 'Update Withdraw Requests', 'description' => 'تعديل طلبات الدفع', 'path' => 'withdraw_requests'],
            ['name' => $perfix . 'delete-withdraw_requests', 'display_name' => 'Delete Withdraw Requests', 'description' => 'حذف طلبات الدفع', 'path' => 'withdraw_requests'],

            //settings
            ['name' => $perfix . 'read-settings', 'display_name' => 'Read Settings', 'description' => 'عرض الاعدادات', 'path' => 'settings'],
            ['name' => $perfix . 'update-settings', 'display_name' => 'Update Settings', 'description' => 'تعديل الاعدادات', 'path' => 'settings'],

            //roles
            ['name' => $perfix . 'read-roles', 'display_name' => 'Read Roles', 'description' => 'عرض الادوار', 'path' => 'roles'],
            ['name' => $perfix . 'create-roles', 'display_name' => 'Create Roles', 'description' => 'اضافة الادوار', 'path' => 'roles'],
            ['name' => $perfix . 'update-roles', 'display_name' => 'Update Roles', 'description' => 'تعديل الادوار', 'path' => 'roles'],
            ['name' => $perfix . 'delete-roles', 'display_name' => 'Delete Roles', 'description' => 'حذف الادوار', 'path' => 'roles'],

        ];
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->initPermissions();

        foreach ($this->permissions as $item) {
            if (!DB::table('permissions')->where('name', $item['name'])->exists()) {
                Permission::updateOrCreate($item);
            }
        }

    }
}
