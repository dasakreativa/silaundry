<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
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
      'email'             => $this->faker->safeEmail(),
      'username'          => $this->faker->userName(),
      'fullname'          => $this->faker->name(),
      'nik'               => $this->faker->numberBetween(1111111111111111, 9999999999999999),
      'ktp_depan'         => $this->faker->image(public_path('uploads'), 720, 480, 'PG', false, true, 'Contoh KTP'),
      'foto'              => $this->faker->image(public_path('uploads'), 720, 720, 'PG', false, true, 'Contoh KTP'),
      'ktp_belakang'      => $this->faker->image(public_path('uploads'), 720, 480, 'PG', false, true, 'Contoh KTP'),
      'email_verified_at' => now(),
      'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
      'remember_token'    => Str::random(10),
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
