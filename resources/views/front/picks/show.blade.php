@extends('layouts.default') 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-8 mb-5">
            @include('front.picks._post')
            @for ($i = 0; $i < 5; $i++)
                @include('front.picks._comment')
            @endfor
        </div>
        <div class="col-sm-4">
            @for ($i = 0; $i < 3; $i++)
                @include('front.picks._post')
            @endfor
        </div>
    </div>
</div>
@endsection