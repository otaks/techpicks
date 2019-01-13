@extends('layouts.default') 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-8 mb-5">
            @if($pick !== null)
            <delete-pick v-bind:pick-id="{{$pick->id}}" v-bind:post-id="{{$post->id}}"></delete-pick>
            @endif
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
            {{Form::open(['url' => '/picks'])}}
                {{Form::hidden('postId', $post->id)}}
                <div class="form-group">
                    @if ($errors->has('comment'))
                        <div>
                            {{$errors->first('comment')}}
                        </div>
                    @endif
                    {{Form::label('comment', 'コメント')}}
                    @if($pick !== null)
                    {{Form::textarea('comment',$pick->comment, ['class' => 'form-control', 'rows' => 5, 'cols' => null])}}
                    @else
                    {{Form::textarea('comment',null, ['class' => 'form-control', 'rows' => 5, 'cols' => null])}}
                    @endif
                </div>
                <button type="submit" class="btn btn-block btn-primary mt-5">ピック！</button>
            {{Form::close()}}

        </div>
    </div>
</div>
@endsection