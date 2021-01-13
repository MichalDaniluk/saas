<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;


class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>'Test_'.rand(1,10),
            'address'=>'Address_'.rand(1,10),
            'city'=>'City_'.rand(1,10),
            'post_code'=>'PostCode_'.rand(1,10),
            'email'=>'Email_'.rand(1,10),
        ];
    }
}
