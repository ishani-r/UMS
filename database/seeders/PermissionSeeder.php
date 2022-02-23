<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [
            // College
            [
                'module_name' => 'College',
                'name' => 'view-college',
                'guard_name' => 'university'
            ],
            [
                'module_name' => 'College',
                'name' => 'create-college',
                'guard_name' => 'university'
            ],
            [
                'module_name' => 'College',
                'name' => 'update-college',
                'guard_name' => 'university'
            ],
            [
                'module_name' => 'College',
                'name' => 'delete-college',
                'guard_name' => 'university'
            ],
            // Course
            [
                'module_name' => 'Course',
                'name' => 'view-course',
                'guard_name' => 'university'
            ],
            [
                'module_name' => 'Course',
                'name' => 'create-course',
                'guard_name' => 'university'
            ],
            [
                'module_name' => 'Course',
                'name' => 'update-course',
                'guard_name' => 'university'
            ],
            [
                'module_name' => 'Course',
                'name' => 'delete-course',
                'guard_name' => 'university'
            ],
            // Subject
            [
                'module_name' => 'Subject', 
                'name' => 'view-subject',
                'guard_name' => 'university'
            ],
            [
                'module_name' => 'Subject', 
                'name' => 'create-subject',
                'guard_name' => 'university'
            ],
            [
                'module_name' => 'Subject', 
                'name' => 'update-subject',
                'guard_name' => 'university'
            ],
            [
                'module_name' => 'Subject', 
                'name' => 'delete-subject',
                'guard_name' => 'university'
            ],
            // MeritRound
            [
                'module_name' => 'MeritRound',
                'name' => 'view-meritround',
                'guard_name' => 'university'
            ],
            [
                'module_name' => 'MeritRound',
                'name' => 'create-meritround',
                'guard_name' => 'university'
            ],
            [
                'module_name' => 'MeritRound',
                'name' => 'update-meritround',
                'guard_name' => 'university'
            ],
            [
                'module_name' => 'MeritRound',
                'name' => 'delete-meritround',
                'guard_name' => 'university'
            ],
        ];
        Permission::insert($permission);
    }
}
