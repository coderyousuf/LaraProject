<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'phone'=>$this->faker->phoneNumber()
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    public function admin(){
        return $this->state(function(array $attributes){
            return [
                'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('1234'),
            'remember_token' => Str::random(10),
            'phone'=>'01739291120'
            ];
        });
    }

    public function manager(){
        return $this->state(function(array $attributes){
            return [
                'name' => 'manager',
            'email' => 'manager@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345'),
            'remember_token' => Str::random(10),
            'phone'=>'654654654'
            ];
        });
    }
}
