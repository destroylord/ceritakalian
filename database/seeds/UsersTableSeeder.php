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
        //
        \App\User::create([
            'username'  => 'dmduls',
            'avatar'    => 'avatar/default.png',
            'name'      => 'Dafrin Maulana',
            'email'     => 'admin@admin.com',
            'password'  => bcrypt('password'),
        ]);
    }
}
