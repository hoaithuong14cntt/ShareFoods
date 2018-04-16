<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RatingsTableSeeder extends Seeder
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
            DB::table('ratings')->insert([
                'user_id' => $faker->randomElement(App\User::where('type', \App\User::TYPES['user'])->pluck('id')->toArray()),
                'place_id' => $faker->randomElement(App\Place::all()->pluck('id')->toArray()),
                'rate' => rand(1, 5),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
