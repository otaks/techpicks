@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-12 shadow-sm">
                <img class="card-img-top" src="{{$results->url}}" height="300px"  alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title">{{$results->title}}</h2>
                    <p class="card-text">{{$results->description}}</p>

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <form>
                                <button formaction="{{$results->url}}" class="btn btn-sm btn-outline-secondary">引用記事</button>
                            </form>
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
    </div>

    <div class="row">
        <h2 class="card-title">{{$results->comment}}</h2>
    </div>
</div>
@endsection
