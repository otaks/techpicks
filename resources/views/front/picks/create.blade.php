@extends('layouts.default') 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-8 mb-5">
            <div class="card card-post mt-5 mb-5">
                <div class="card-img-block">
                    <img class="img-fluid" src="https://images.pexels.com/photos/870903/pexels-photo-870903.jpeg?w=940&h=650&auto=compress&cs=tinysrgb" alt="Card image cap">
                </div>
                <div class="card-body">
                    {{-- <img src="https://randomuser.me/api/portraits/men/64.jpg" alt="profile-image" class="profile"/> --}}
                    <h5 class="card-title">
                        {{ $post->title }}
                    </h5>
                    <div class="card-text mb-3">
                        {{ $post->description}}
                        <p><a href="{{$post->url}}">{{$post->url}}</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8 mb-5">
            <form method="POST" action="/picks">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="comment">コメント</label>
                    <textarea class="form-control" name="comment" rows="5"></textarea>
                    <input type="hidden" name="postId" value="{{$post->id}}">
                </div>
                <button type="submit" class="btn btn-block btn-primary mt-5">ピック！</button>
            </form>
        </div>
    </div>
</div>
@endsection