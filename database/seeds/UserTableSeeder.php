<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'ice',
            'email'     => 'a@a',
            'password'  => bcrypt('40302010'),
        ]);
        User::create([
            'name'      => 'none',
            'email'     => 'b@b',
            'password'  => bcrypt('40302010'),
        ]);
    }
}
