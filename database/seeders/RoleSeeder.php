<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('roles')->truncate();

        $admin = Role::create([
            'name' => 'Administration',
            'guard_name' => 'university',
        ]);

        // $admin->hasPermissionTo('view-course', 'admin');
        $admin->givePermissionTo(Permission::all());
    }
}
