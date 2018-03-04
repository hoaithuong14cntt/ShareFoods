<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BlocksTableSeeder extends Seeder
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
            DB::table('blocks')->insert([
                'user_id' => $faker->randomElement(App\User::all()->pluck('id')->toArray()),
                'blocked_id' => $faker->randomElement(App\User::all()->pluck('id')->toArray()),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
