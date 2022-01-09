<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\College;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class CollegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        College::create([
            'name' => 'college',
            'email' => 'college@gmail.com',
            'contact_no' => '11',
            'address' => 'surat',
            'password' => Hash::make("college@123"),
            'logo' => 'logo.png',
            'status' => '0',
            'created_at'  => Carbon::now(),
        ]);
    }
}
