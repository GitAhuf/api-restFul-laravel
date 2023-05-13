<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Victor Arana Flores',
            'email' => 'victor@example.com',
            'password' => bcrypt('12345678')
        ]);

        User::factory(99)->create();
    }
}
