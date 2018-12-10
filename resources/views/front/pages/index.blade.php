@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
    @foreach ($results as $result)
        <div class="col-md-12">
            <div class="card mb-12 shadow-sm">
                <img class="card-img-top" src="{{$result->url}}" height="300px"  alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title">{{$result->title}}</h2>
                    <p class="card-text">{{$result->description}}</p>
                     <p class="card-text border border-secondary"><img class="rounded-circle" src="{{ asset('storage/sekainoaoki.jpg') }}" alt="Generic placeholder image" width="100" height="100">へのへのもへじ</p>

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">総Pick数 {{$result->is_picked_count}}</button>
                        </div>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Pick</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
