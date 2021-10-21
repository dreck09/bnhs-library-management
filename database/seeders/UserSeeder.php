<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create initial user
        DB::table('users')->insert([
            'name' => 'BNSH Librarian',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123456789'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
