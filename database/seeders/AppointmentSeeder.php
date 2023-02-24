<?php

namespace Database\Seeders;

use App\Models\Appointment;
use Database\Factories\AppointmentFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Appointment::factory(10)->create();
    }
}
