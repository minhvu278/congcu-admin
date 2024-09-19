<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Traits\TruncateTable;


class UserSeeder extends Seeder
{
    use TruncateTable;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->truncateTable('users');
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
