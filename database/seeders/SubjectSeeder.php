<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('subjects')->truncate();

        $data = [
            [
                'name' => 'Mathematics',
                'code' => '041',
                'status' => '1',
            ],
            [
                'name' => 'Science',
                'code' => '042',
                'status' => '1',
            ],
            [
                'name' => 'Biology',
                'code' => '044',
                'status' => '1',
            ],
            [
                'name' => 'English',
                'code' => '001',
                'status' => '1',
            ],
            [
                'name' => 'Gujrati',
                'code' => '002',
                'status' => '1',
            ],
            [
                'name' => 'Physics',
                'code' => '003',
                'status' => '1',
            ],
            [
                'name' => 'Sanskrit',
                'code' => '004',
                'status' => '1',
            ],
        ];
        Subject::insert($data);
    }
}
