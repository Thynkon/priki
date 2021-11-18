<?php

namespace Database\Seeders;

use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PublicationStateSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(DomainSeeder::class);

        UserFactory::times(10)->create();
    }
}
