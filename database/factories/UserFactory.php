<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'age' => rand(15, 40),
            'favorite' => json_encode([
                $this->faker->randomElement(
                    [
                        "house",
                        "flat",
                        "apartment",
                        "room", "shop",
                        "lot", "garage"
                    ]
                )
            ]),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make($this->faker->password()), // password
            'phone' => $this->faker->phoneNumber(),
            'is_admin' => false,
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
