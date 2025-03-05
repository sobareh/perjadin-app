<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
                "name" => "Nurlaili Ramadhani",
                "username" => "815100227",
                "password" => Hash::make("admin140"),
            ],
            [
                "name" => "Administrator",
                "username" => "admin140",
                "password" => Hash::make("admin140"),
            ],
        );
    }
}
