<?php

use App\User;
use Illuminate\Database\Seeder;

class HasRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $admin = User::find(1);
       $admin->attachRole("admin");
    }
}
