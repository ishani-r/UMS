<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UniversitySeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(SubjectSeeder::class);
        $this->call(CollegeSeeder::class);
    }
}
