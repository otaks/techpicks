@extends('layouts.default') 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-8 mb-5">
            <p>エラーが発生しました</p>
            {{$message}}
        </div>
    </div>
</div>
@endsection