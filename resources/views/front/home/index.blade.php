@extends('layouts.default')
@section('content')
<home v-bind:posts="{{$posts}}"></home>
@endsection
