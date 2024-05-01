@extends('layout')

@section('title','MY KABINET')

@section('content')
<h1>Salam @if (Auth::check())

   {{ Auth::user()->name}}
    
@endif </h1>

<a href="{{route('logout')}}">Logout</a>
@endsection