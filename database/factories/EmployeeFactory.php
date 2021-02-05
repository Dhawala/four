<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'last_name'=>substr($this->faker->lastName,0,60),
            'first_name'=>substr($this->faker->userName,0,6),
            'middle_name'=>substr($this->faker->firstName,0,60),
            'address'=>substr($this->faker->address,0,120),
            'department_id'=>rand(1,8),
            'city_id'=>rand(),
            'state_id'=>rand(),
            'country_id'=>rand(),
            'zip'=>$this->faker->lexify('??????????'),
            'birthdate'=>$this->faker->date(),
            'date_hired'=>$this->faker->date(),
        ];
    }
}
