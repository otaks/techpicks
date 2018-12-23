@extends('layouts.default')
@section('content')

<div class="container">
    <div class="row">
    @foreach ($results as $post)
        <div class="col-md-12">
            <div class="card  shadow-sm mb-4" style="max-width: 25rem;">
                <img class="card-img-top" src="{{$post->url}}" height="300px"  alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title">{{$post->title}}</h2>
                    <p class="card-text">{{$post->description}}</p>

                    <div class="border border-secondary">
                        <img class="rounded-circle" src="{{ asset('storage/sekainoaoki.jpg') }}" alt="Generic placeholder image" width="100" height="100">
                        {{$post->top_comment}}
                    </div>

                    <br>
                    <div class="d-flex justify-content-between align-items-center">
                        <button type="button" class="btn btn-sm btn-outline-secondary">{{$post->is_picked_count}} Pick</button>
                    
                        <a href="{{ url('/picks/create', $post->id) }}">
                            <button type="button" class="btn btn-sm badge-pill btn-primary">Pick</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
