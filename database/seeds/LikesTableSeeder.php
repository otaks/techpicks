<?php

use Illuminate\Database\Seeder;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('ja_JP');
        $userIds = $faker->randomElements(App\User::pluck('id')->all(), 2);
        $pickIds = $faker->randomElements(App\Pick::pluck('id')->all(), 2);

        for ($i = 0; $i < count($pickIds); $i++) {
            factory(App\Like::class)->create(['user_id' => $userIds[$i % count($userIds)], 'pick_id' => $pickIds[$i]]);
        }
    }
}
