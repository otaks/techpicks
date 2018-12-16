@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div>記事登録画面</div>
        <button>キャンセル</button>
        <input type="text" name="url" placeholder="URL入力欄">
        <input type="hidden" name="title" value="">
        <input type="hidden" name="description" value="">
        <textarea name="comment" id="" cols="30" rows="10" placeholder="コメント入力欄"></textarea>
        <button type="submit">投稿する</button>
    </div>
</div>
@endsection