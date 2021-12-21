<?php

namespace Database\Seeders;

use Database\Factories\UserOpinionFactory;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Opinion;
use Faker\Factory as Faker;

class UserOpinionSeeder extends Seeder
{
    private $faker;

    public function __construct()
    {
        // for some reason, faker does not use the faker_locale setting defined in config/app.php
        $this->faker = Faker::create('fr_CH');
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $number_of_comments = 50;

        for ($i = 0; $i < $number_of_comments; $i++) {
            $comment = $this->faker->realText('100');
            $points = $this->faker->numberBetween(-1, 1);

            $user = User::all()->random();
            $opinion_id = Opinion::all()->random()->id;
            //$opinion_id = Practice::published()->practices()->random()->id;

            $user->feedbacks()->attach($opinion_id, ['comment' => $comment, 'points' => $points]);

            $user->save();
        }
    }
}
