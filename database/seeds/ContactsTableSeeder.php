<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
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
        $users = User::all()->pluck('id')->toArray();

        $datas = [];
        for ($i = 0; $i < $limit; $i++) {
            $datas[] = [
                'user_id' => $faker->randomElement($users),
                'title' => $faker->title,
                'content' => $faker->text,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
    }
}
