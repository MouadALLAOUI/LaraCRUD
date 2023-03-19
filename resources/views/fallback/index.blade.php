@extends('layouts.app')

@section('title')
    @php
        echo 'Not found';
    @endphp
@endsection
@section('content')
    <div class="flex-grow-1 p-3 text-center bg-dark text-light">
        <h1 class="text-secondary text-center m-a ts-9">Erorr 404 | Not found</h1>
    </div>
@endsection
