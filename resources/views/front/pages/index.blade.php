@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
    @foreach ($results as $post)
        <div class="col-md-12">
            <div class="card mb-12 shadow-sm">
                <img class="card-img-top" src="{{$post->url}}" height="300px"  alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title">{{$post->title}}</h2>
                    <p class="card-text">{{$post->description}}</p>
                     <p class="card-text border border-secondary"><img class="rounded-circle" src="{{ asset('storage/sekainoaoki.jpg') }}" alt="Generic placeholder image" width="100" height="100">へのへのもへじ</p>

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">総Pick数 {{$post->is_picked_count}}</button>
                        </div>
                        <div class="btn-group">
                          <a href="{{ url('/picks/create', $post->id) }}">
                              <button type="button" class="btn btn-sm btn-outline-secondary">Pick</button>
                          </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
