<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->fill([
            'name' => 'Superadmin',
            'email' => 'superadmin@admin.com',
            'username' => 'superadmin',
            'password' => Hash::make('123456')
        ]);
        $admin->save();
        $admin = User::where(['username' => 'superadmin'])->first();
        $admin->assignRole(['Admin']);


        $user = new User();
        $user->fill([
            'name' => 'Heraya Fitra',
            'email' => 'herayafpm@gmail.com',
            'username' => 'heraya',
            'password' => Hash::make('123456')
        ]);
        $user->save();
        $user = User::where(['username' => 'heraya'])->first();
        $user->assignRole(['User']);
    }
}
