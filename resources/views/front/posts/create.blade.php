@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-8 mb-5">
            @include('front.posts._form')
        </div>
        <div class="col-sm-4">
        </div>
    </div>
</div>
@endsection