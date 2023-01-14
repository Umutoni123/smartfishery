<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Users;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User;
        $admin->full_name = env('ADMIN_NAME');
        $admin->email = env('ADMIN_EMAIL');
        $admin->phone_number = env('ADMIN_PHONE');
        $admin->password = bcrypt(env('ADMIN_PASSWORD'));
        $admin->type = 'admin';
        $admin->save();

        $rabUser = new User;
        $rabUser->full_name = env('RAB_USER_NAME');
        $rabUser->email = env('RAB_USER_EMAIL');
        $rabUser->phone_number = env('RAB_USER_PHONE');
        $rabUser->password = bcrypt(env('RAB_USER_PASSWORD'));
        $rabUser->type = 'rab';
        $rabUser->save();
    }
}
