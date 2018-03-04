<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PlacesTableSeeder extends Seeder
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
            DB::table('places')->insert([
                'user_id' => $faker->randomElement(App\User::all()->pluck('id')->toArray()),
                'category_id' => $faker->randomElement(App\Category::all()->pluck('id')->toArray()),
                'prefecture_id' => $faker->randomElement(App\Prefecture::all()->pluck('id')->toArray()),
                'name' => $faker->company,
                'image' => $faker->image('public/storage/', 400, 300, null, false),
                'description' => $faker->text,
                'content' => $faker->text,
                'is_published' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
