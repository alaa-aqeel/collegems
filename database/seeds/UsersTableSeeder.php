<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
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

        $user = User::create([
            'fullname' => 'Admin',
            'email'    => 'admin@local.com',
            'avatar'   => 'avatar.png',
            'gender'   => 'male',
            'active'   => 1,
            'email_verified_at' => \Carbon\Carbon::now(),
            'password' => Hash::make('12345678')
        ]);

        $role = Role::where('name', 'admin')->first();
        $user->role()->associate($role);
        $user->save();

    }
}
