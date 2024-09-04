<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin :: Create ([
            'name' =>'Admin',
            'email' => 'admin@admin.com',
            'address'=>'dubai',
            'mobile_number'=>'00',
            'role_id'=>1,
            'designation'=>'System administration',
            'status'=>'Active',
            'gender'=>'Male',
            'image'=>'avatar2.png',
            'password' => Hash::make(123456789),
        ]);
    }
}
