<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Appointment;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create();
        User::factory(15)->create();

        User::factory()->create([
            'name' => $faker->name(),
            'email' => $faker->safeEmail(),
            'role' => $faker->randomElement(['Client', 'Employee', 'User', 'Admin']),
            'password' => Hash::make('12345678'),
        ]);

        $this->call([AppAppointmentSeeder::class]);

        // Appointment::factory(20)->create();  // Generate 20 random appointments
    }
}
