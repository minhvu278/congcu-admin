<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->role('admin')->create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
        ]);

        User::factory()->role('author')->create([
            'name' => 'Author User',
            'email' => 'author@gmail.com',
        ]);

        User::factory()->role('subscriber')->create([
            'name' => 'Subscriber User',
            'email' => 'subscriber@gmail.com',
        ]);
    }
}
