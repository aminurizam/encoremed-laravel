<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('patients')->insert([
            'name' => 'Amin',
            'ic_number' => '950101-12-5555',
            'mrn' => 'A001',
            'mobile_number' => '0123456789',
        ]);
    }
}
