<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Domain;
use Illuminate\Support\Str;
use App\Models\PublicationState;
use Database\Seeders\PublicationStateSeeder;
use Illuminate\Database\Eloquent\Factories\Factory;

class PracticeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description' => $this->faker->realText(5000),
            // generate a string whose length is between 3 and 40
            // reference: https://stackoverflow.com/a/56541520
            'title' => $this->faker->regexify("[A-Za-z]{" . mt_rand(3, 40) . "}"),
            'domain_id' => Domain::all()->random()->id,
            'publication_state_id' => PublicationState::all()->random()->id,
            'user_id' => User::all()->random()->id,
        ];
    }
}
