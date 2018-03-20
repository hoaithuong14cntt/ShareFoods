<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CitiesTableSeeder::class);
        $this->call(PrefecturesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(PlacesTableSeeder::class);
        $this->call(FoodsTableSeeder::class);
        $this->call(FollowsTableSeeder::class);
        $this->call(BlocksTableSeeder::class);
        $this->call(FavoritesTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(SavesTableSeeder::class);
    }
}
