@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($results as $post)
    @if($loop->first)
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-12 shadow-sm">
                <img class="card-img-top" src="{{$post->url}}" height="300px"  alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title">{{$post->title}}</h2>
                    <p class="card-text">{{$post->description}}</p>

                    <div class="d-flex justify-content-between align-items-center">
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
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-12 shadow-sm">
                  <h5 class="card-title">{{$post->comment}}</h5>
                  <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                           <button type="button" class="btn btn-sm btn-outline-secondary">いいね数 {{$post->is_liked_count}}</button>
                      </div>
                      <div class="btn-group">
                          {{-- いいねボタンは未実装 --}}
                              <button type="button" class="btn btn-sm btn-outline-secondary">いいね</button>
                      </div>
                   </div>
            </div>
        </div> 
    </div>
    @endforeach
</div>
@endsection
