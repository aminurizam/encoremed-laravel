<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


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
    public function definition(): array
    {
        return [
            'code' => Str::random(10),
            'appt_datetime' => fake()->dateTimeBetween('+1 week', '+4 weeks'),
            'patient_id' => 1,
            // 'arrived_at' => Carbon::now()->toDateTimeString(),
            'status' => fake()->randomElement(['pending', 'arrived', 'rescheduled'])
        ];
    }
}
