<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'url' => 'https://i.gzn.jp/img/2018/11/29/killing-mosquitoes/00_m.jpg',
            'title' => 'Googleの親会社は世界中の蚊を撲滅するための技術を開発中',
            'description' => 'Googleの親会社であるAlphabetの研究者たちが、蚊を媒介とする病気を根絶するため、蚊の卵が孵化しなくなる技術を開発しています。',
         ]);
    }
}
