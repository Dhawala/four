<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use App\Models\Department;
use App\Models\Employee;
use App\Models\State;
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
        User::factory(1)->state(['email'=>'1234dhawala@gmail.com'])->create();
        User::factory(5)->create();
        $this->call([DepartmentSeeder::class]);

        Country::factory(5)
            ->has(
                //states
                State::factory()
                    ->count(10)
                    ->state(
                        function (array $attributes, Country $country) {
                            return ['country_id' => $country->id];
                        }
                    )->has(
                        //cities
                        City::factory()
                            ->count(5)
                            ->state(
                                function (array $attributes, State $state) {
                                    return ['state_id' => $state->id];
                                }
                            )->has(
                                Employee::factory()
                                ->count(3)
                                ->state(function (array $attributes,
                                                  City $city){
                                    return [
                                        'department_id'=>rand(1,8),
                                        'city_id'=>$city->id,
                                        'state_id'=>$city->state->id,
                                        'country_id'=>$city->state->country->id,
                                    ];
                                })
                            )
                    )
            )->create();
    }
}
