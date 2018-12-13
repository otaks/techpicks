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
        $userIds = App\User::pluck('id')->all();
        $postIds = App\Post::pluck('id')->all();

        $generationCnt = 12;
        $everyWhat = 3; // この件数毎にユーザーを切り替える
        for ($i = 0; $i < $generationCnt; $i++) {
            factory(App\Pick::class)->create(['user_id' => $userIds[$i / $everyWhat], 'post_id' => $postIds[$i]]);
        }
    }
}
