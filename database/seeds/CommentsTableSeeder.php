<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
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
            DB::table('comments')->insert([
                'user_id' => $faker->randomElement(App\User::all()->pluck('id')->toArray()),
                'place_id' => $faker->randomElement(App\Place::all()->pluck('id')->toArray()),
                'content' => $faker->text,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
