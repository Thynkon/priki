<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table(Role::getTableName())->insert([
            "slug" => "MOD",
            "name" => "Modérateur"
        ]);
        DB::table(Role::getTableName())->insert([
            "slug" => "ADMIN",
            "name" => "Administrateur"
        ]);
        DB::table(Role::getTableName())->insert([
            "slug" => "MEMBER",
            "name" => "Membre"
        ]);
        DB::table(Role::getTableName())->insert([
            "slug" => "BANNED",
            "name" => "Banni"
        ]);
    }
}
