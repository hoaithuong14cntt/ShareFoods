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

        $images = [];
        for ($i = 0; $i < 10; $i++) {
            $images[] = generateStorageImage($faker);
        }

        for ($i = 0; $i < $limit; $i++) {
            DB::table('places')->insert([
                'user_id' => $faker->randomElement(App\Staff::all()->pluck('id')->toArray()),
                'category_id' => $faker->randomElement(App\Category::all()->pluck('id')->toArray()),
                'prefecture_id' => $faker->randomElement(App\Prefecture::all()->pluck('id')->toArray()),
                'name' => $faker->company,
                'phone' => '0901234567',
                'image' => $faker->randomElement($images),
                'lat' => '16.0868429',
                'lng' => '108.21352',
                'from_price' => rand(10000, 400000),
                'to_price' => rand(400000, 1000000),
                'start_time' => Carbon::now(),
                'end_time' => Carbon::now(),
                'discount' => rand(10, 99),
                'description' => $faker->text,
                'content' => $faker->text,
                'address' => $faker->address,
                'is_published' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
