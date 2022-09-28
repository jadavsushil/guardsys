<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create();
        return [
            "name" => $this->faker->name(),
            "phone" => $this->faker->phoneNumber,
            "email" => $this->faker->safeEmail,
            'photo'=> $faker->imageUrl($width = 400, $height = 400) ,
        ];
    }
}
