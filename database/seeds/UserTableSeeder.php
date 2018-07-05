<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' =>'admin',
            'email' =>'admin@forum.com',
            'password' =>bcrypt('admin'),
            'avatar'   => 'https://avatars0.githubusercontent.com/u/18004746?v=4',
            'admin'   => 1
        ]);
    }
}
