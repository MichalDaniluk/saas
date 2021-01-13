<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Company::factory(10)->create();
        User::factory(1)->create();
        Course::factory(10)->create();

    }
}
