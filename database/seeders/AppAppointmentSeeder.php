<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Appointment;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AppAppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Generate random start and finish times
        $startTime = $faker->dateTimeBetween('-1 month', '+1 month');
        $finishTime = (clone $startTime)->modify('+1 hour');

        Appointment::factory()->create([
            'start_time' => $startTime,
            'finish_time' => $finishTime,
            'comments' => $faker->sentence(),  // Generate random comment
            'client_id' => User::inRandomOrder()->first()->id, // Random existing client
            'employee_id' => User::inRandomOrder()->first()->id, // Random existing employee
        ]);

        Appointment::factory(20)->create();  // Generate 20 random appointments
    }
}
