<?php

use App\City;
use Illuminate\Database\Seeder;

class PrefecturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $limit = 50;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('prefectures')->insert([
                'name' => $faker->state,
                'city_id' => $faker->randomElement(App\City::all()->pluck('id')->toArray()),
            ]);
        }
    }
}
