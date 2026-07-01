<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        if (DB::table('users')->where('username', 'admin')->exists()) {
            DB::table('users')->where('username', 'admin')->update([
                'name' => 'Admin',
                'updated_at' => now(),
            ]);

            return;
        }

        DB::table('users')->insert([
            'name' => 'Admin',
            'username' => 'admin',
            'password' => Hash::make('password123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
