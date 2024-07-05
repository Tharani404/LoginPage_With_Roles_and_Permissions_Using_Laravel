<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin_user = new User();
        $admin_user->name = 'Admin_user';
        $admin_user->email = 'Admin@gmail.com';
        $admin_user->password = Hash::make('admin1234');
        $admin_user->save();

        $admin_user->assignRole('admin');
    }
}
