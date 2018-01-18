<?php

use Illuminate\Database\Seeder;

class SuperAdmin extends Seeder
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
        $user->email = 'admin@tasks.com';
        $user->password =bcrypt('123456');
        $user->role = 'admin';
        $user->save();
    }
}
