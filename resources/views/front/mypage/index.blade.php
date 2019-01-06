@extends('layouts.default')
@section('content')
<my-page v-bind:posts="{{$posts}}"></my-page>
@endsection
