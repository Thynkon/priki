<?php

namespace Database\Seeders;

use App\Models\PublicationState;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublicationStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table(PublicationState::getTableName())->insert([
           "slug" => "DRAFT",
            "name" => "Brouillon"
        ]);
        DB::table(PublicationState::getTableName())->insert([
            "slug" => "PROP",
            "name" => "Proposé"
        ]);
        DB::table(PublicationState::getTableName())->insert([
            "slug" => "PUBLISH",
            "name" => "Publié"
        ]);
        DB::table(PublicationState::getTableName())->insert([
            "slug" => "ARCH",
            "name" => "Archivé"
        ]);
        DB::table(PublicationState::getTableName())->insert([
            "slug" => "CLOSED",
            "name" => "Clos"
        ]);
    }
}
