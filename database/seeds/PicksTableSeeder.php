<?php

use Illuminate\Database\Seeder;

class PicksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('picks')->insert([
            'user_id' => 1,
            'post_id' => 1,
            'comment' => 'seeder',
         ]);
    }
}
