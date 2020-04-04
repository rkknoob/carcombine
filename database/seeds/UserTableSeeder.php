<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin
       $user           = new User;
       $user->name     = "Administrator";
       $user->username = "admin";
       $user->password = "Admin_CarCombined";
       $user->save();
    }
}
