<?php

use Illuminate\Database\Seeder;
use App\User;

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
        User::firstOrCreate([
           'first_name' => 'admin',
           'last_name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'address' => 'World',
            'phone' => '9876543210',

        ]);
    }
}
