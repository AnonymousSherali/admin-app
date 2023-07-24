<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Hash::make('123456');
        $adminRecords = [
            ['id' => 2, 'name' => 'Sherali', 'type' => 'subadmin', 'mobile' => 9700000000, 'email' => 'sherali@admin.com', 'password' => $password, 'image' => '', 'status' => 1],
            ['id' => 3, 'name' => 'Shahzod', 'type' => 'subadmin', 'mobile' => 9900000000, 'email' => 'shahzod@admin.com', 'password' => $password, 'image' => '', 'status' => 1],
        ];
        Admin::insert($adminRecords);
    }
}
