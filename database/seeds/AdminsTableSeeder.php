<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            [
                'username' => 'admin',
                'password' => Hash::make('123456'), // password
                'email' => 'giangtuan6199@gmail.com',
                'role_id' => '1',
                'avatar' => 'sontung.jpg'
            ],
        ]);
    }
}
