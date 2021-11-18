<?php

namespace Database\Seeders;

use App\Models\Domain;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DomainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table(Domain::getTableName())->insert([
            "slug" => "PROG_LANG",
            "name" => "Languages de programmation"
        ]);
        DB::table(Domain::getTableName())->insert([
            "slug" => "BACKUPS",
            "name" => "Sauvegardes"
        ]);
        DB::table(Domain::getTableName())->insert([
            "slug" => "PACKAGE_MANAGEMENT",
            "name" => "Maintient de paquets"
        ]);
    }
}
