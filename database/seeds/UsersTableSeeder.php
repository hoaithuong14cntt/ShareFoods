<?php

use App\Prefecture;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
            DB::table('users')->insert([
                'email' => $faker->unique()->email,
                'password' => bcrypt('123456789'),
                'firstname' => $faker->firstName,
                'lastname' => $faker->lastName,
                'date_of_birth' => Carbon::now(),
                'gender' => rand(1, 2),
                'prefecture_id' => $faker->randomElement(Prefecture::all()->pluck('id')->toArray()),
                'address' => $faker->address,
                'memo' => null,
                'avatar' => $faker->image('public/storage/', 400, 300, null, false),
                'phone' => '0905123456',
                'status' => rand(1, 2),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
