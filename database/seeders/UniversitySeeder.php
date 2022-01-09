<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\University;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('universities')->truncate();
        University::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'contact_no' => '1111111111',
            'address' => 'surat',
            'password' => Hash::make("admin@123"),
            'deleted_at'  => Carbon::now(),
            'created_at'  => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
