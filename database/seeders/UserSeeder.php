<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            "name"=> "Prithvi",
            "email"=> "admin@admin.com",
            "status" => "active",
            "role"  => "admin"

        ]);

        User::factory()->create([
            "name"=> "Editor",
            "email"=> "editor@editor.com",
            "status" => "active",
            "role"  => "editor"
        ]);

        User::factory()->create([
            "name"=> "Front User",
            "email"=> "user@user.com",
            "status" => "active",
            "role"  => "user"
        ]);
    }
}
