<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class FoodsTableSeeder extends Seeder
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

        $images = [];
        for ($i = 0; $i < 10; $i++) {
            $images[] = generateStorageImage($faker);
        }

        for ($i = 0; $i < $limit; $i++) {
            DB::table('foods')->insert([
                'place_id' => $faker->randomElement(App\Place::all()->pluck('id')->toArray()),
                'name' => $faker->company,
                'image' => $faker->randomElement($images),
                'price' => rand(20000, 60000),
                'description' => $faker->text,
                'content' => $faker->text,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
