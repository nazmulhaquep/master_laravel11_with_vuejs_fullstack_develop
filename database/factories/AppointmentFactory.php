<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Appointment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Appointment::class;

    public function definition(): array
    {
        $faker = Faker::create();
        // Generate random start and finish times
        $startTime = $this->faker->dateTimeBetween('-1 month', '+1 month');
        $finishTime = (clone $startTime)->modify('+1 hour');

        return [
            'start_time' => $startTime,
            'finish_time' => $finishTime,
            'comments' => $faker->randomElement(['Available', 'Booked']),  // Generate random comment
            'client_id' => User::inRandomOrder()->first()->id, // Random existing client
            'employee_id' => User::inRandomOrder()->first()->id, // Random existing employee
        ];
    }
}
