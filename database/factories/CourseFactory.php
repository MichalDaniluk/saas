<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=>1,
            'company_id'=>1,
            'title'=>$this->faker->text(rand(10,100)),
            'title_short'=>$this->faker->text(rand(10,100)),
            'title_english'=>$this->faker->text(rand(10,100))
        ];
    }
}
