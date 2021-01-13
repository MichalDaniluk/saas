<?php

namespace Database\Factories;

use App\Models\CompanyUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CompanyUser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
//        return [
//            'id'=>rand(1,10),
//            'name'=>'Test_'.rand(1,10),
//            'address'=>'Address_'.rand(1,10),
//            'city'=>'City_'.rand(1,10),
//            'post_code'=>'PostCode_'.rand(1,10),
//            'email'=>'Email_'.rand(1,10),
//        ];
    }
}
