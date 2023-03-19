@extends('layouts.app')
@section('title')
    @php
        echo 'Profile';
    @endphp
@endsection




@section('content')
    @guest
        <h1 class="title">no profile avaible</h1>
    @else
        <h2>mouad</h2>
    @endguest
@endsection
