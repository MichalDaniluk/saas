<?php

namespace Database\Seeders;

use Database\Factories\CourseFactory;
use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->factory(Company::class,10)->create();
    }
}
