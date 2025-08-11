<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Factories\DataSchoolFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DataSchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DataSchoolFactory::new()->count(195)->create();
    }
}
