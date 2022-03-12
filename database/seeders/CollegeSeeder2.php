<?php

namespace Database\Seeders;

use App\Models\College;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CollegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $collehe = College::create([
            'name' => 'Government Polytechnic For Girls ( GPG )',
                'email' => 'gpgs@gmail.com',
                'contact_no' => '4789451203',
                'address' => 'Surat, Gujrat',
                'password' => Hash::make('password'),
                'logo' => 'abc.jpg',
                'status' => '1',
        ],
        );
        $collehe->assignRole('Administration');
    }
}
