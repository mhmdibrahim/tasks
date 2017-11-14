<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user->first_name = 'admin';
        $user->last_name = 'admin';
        $user->email = 'admin@admin.com';
        $user->password =bcrypt('password');
        $user->role = 'admin';
        $user->department_id = 1;
        $user->save();
        $user = new \App\User();
        $user->first_name = 'tracker';
        $user->last_name = 'tracker';
        $user->email = 'tracker@tracker.com';
        $user->password =bcrypt('password');
        $user->role = 'tracker';
        $user->department_id = 1;
        $user->save();
    }
}
