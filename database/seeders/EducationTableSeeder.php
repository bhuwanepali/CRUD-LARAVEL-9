<?php

namespace Database\Seeders;

use App\Models\Education;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EducationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Education::create(['title' => "SLC"]);
        Education::create(['title' => "INTERMEDIATE"]);
        Education::create(['title' => "BACHELOR"]);
        Education::create(['title' => "MASTER"]);
        Education::create(['title' => "PHD"]);
    }
}
