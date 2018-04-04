<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class FollowsTableSeeder extends Seeder
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
            DB::table('follows')->insert([
                'user_id' => $faker->randomElement(App\User::all()->pluck('id')->toArray()),
                'followed_id' => $faker->randomElement(App\Staff::all()->pluck('id')->toArray()),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
