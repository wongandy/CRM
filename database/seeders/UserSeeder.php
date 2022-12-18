<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'admin',
            'address' => 'dullsville',
            'phone_number' => 12345678,
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);

        $user->assignRole('admin');
    }
}
