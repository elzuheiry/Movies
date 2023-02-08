<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateSuperAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = User::create([
            "name" => "Super Admin",
            "username" => "superadmin",
            "email" => "superadmin@info.dev",
            "email_verified_at" => now(),
            "password" => Hash::make("password!"),
        ]);

        $superadmin->attachRole("superadmin");
    }
}