<?php

use Illuminate\Database\Seeder;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        DB::table('admins')->delete();

        $admin = [
            'name'      => 'Admin',
            'email'     => 'admin@gmail.com',
            'password'  =>  Hash::make("123456"),
        ];

        Admin::create($admin);
    }
}
