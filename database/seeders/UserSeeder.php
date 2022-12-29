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
        $user = User::firstOrCreate([
            'email' => 'admin@admin.com',
        ], [
            'name' => 'admin',
            'address' => 'dullsville',
            'phone_number' => 12345678,
            'password' => bcrypt('password'),
            'terms_accepted' => true,
        ]);

        $user->assignRole('admin');

        $users = User::factory()->count(20)->create();
        $users->each(fn ($user) => $user->assignRole('user'));
    }
}
