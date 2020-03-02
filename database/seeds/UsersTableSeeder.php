<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'name'=>'Biniam Hailemariam',
            'email'=>'bini@gmail.com',
            'password'=>Hash::make('B1234567890'),
        ]);

        $user = User::create([
            'name'=>'Bereket Zerihun',
            'email'=>'bere@gmail.com',
            'password'=>Hash::make('B1234567890'),
        ]);
        
        $admin->roles()->attach($adminRole);
        $user->roles()->attach($userRole);
    }
}
