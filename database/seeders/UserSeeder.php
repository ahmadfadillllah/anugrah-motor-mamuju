<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Admin123@'),
            'no_hp' => '081248232902',
            'role' => 'admin',
            'avatar' => 'user.png'
        ]);

        User::insert([
            'name' => 'Hyperlink',
            'email' => 'Hyperlink@gmail.com',
            'password' => Hash::make('hyperlink'),
            'no_hp' => '081248232902',
            'role' => 'admin',
            'avatar' => 'user.png'
        ]);

        User::insert([
            'name' => '13ulukumba',
            'email' => '13ulukumba@gmail.com',
            'password' => Hash::make('13ulukumba'),
            'no_hp' => '081248232902',
            'role' => 'admin',
            'avatar' => 'user.png'
        ]);
    }
}
