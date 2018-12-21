@extends('layouts.default')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            MyPick一覧
        </div>
    </div>
    <div class="row">
    @foreach ($posts as $post)
        <div class="col-md-12">
            <div class="card mb-5 shadow-sm">
                <a href="post/detail/{{$post->id}}"><img class="card-img-top" src="{{$post->url}}" height="300px"  alt="Card image cap"></a>
                <div class="card-body">
                    <h2 class="card-title">{{$post->title}}</h2>
                    <p class="card-text">{{$post->description}}</p>
                    <p class="card-text border border-secondary"><img class="rounded-circle" src="{{ asset('storage/sekainoaoki.jpg') }}" alt="Generic placeholder image" width="100" height="100">{{$post->top_comment}}</p>

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">総コメント数 ({{$post->is_picked_count}})</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
