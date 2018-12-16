<?php

namespace Tests\Requests;

use Tests\TestCase;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Requests\PostRequest;

class PostRequestTest extends TestCase
{
    /**
     * @dataProvider additionProvider
     */
    public function testRules($name, $value, $expect)
    {
        $request = new PostRequest();
        $rules = $request->rules();
        $validator = Validator::make([$name => $value], $rules);
        $errors = $validator->errors();
        $result = $errors->first($name) ? false : true;
        $this->assertEquals($expect, $result);
    }

    public function additionProvider()
    {
        $faker = \Faker\Factory::create('ja_JP');

        return [
            'url未入力' => ['url', '', false],
            'url不正な形式' => ['url', 'abc', false],
            'url最大文字数エラー' => ['url', 'https://' . str_repeat('cat', 31), false],
            'url正常な形式' => ['url', $faker->url , true],

            'title未入力' => ['title', '', 0],
            'title最大文字数エラー' => ['title', $faker->realText(101,2), false],
            'title最大文字数境界値' => ['title', $faker->realText(100, 2), true],

            'descrption未入力' => ['description', '', false],
            'descrption最大文字数エラー' => ['description', $faker->realText(1001, 2), false],
            'descrption最大文字数境界値' => ['description', $faker->realText(1000, 2), true],
        ];
    }
}
