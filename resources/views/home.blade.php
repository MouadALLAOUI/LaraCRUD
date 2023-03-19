@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="flex-grow-1 p-3 text-center bg-dark text-light">
            @guest
                <h1 class="text-uppercase">Welcome to Stock Manager</h1>
                <p>You're not regestred</p>
            @else
                <h1 class="text-uppercase">Welcome {{ auth()->user()->name }}</h1>
                <p class="m-3 text-capitalize fs-4 text-secondary">
                    @if (auth()->user()->role === 'admin')
                        your role is an {{ auth()->user()->role }}
                    @else
                        your role is a {{ auth()->user()->role }}
                    @endif
                </p>
            @endguest
        </div>
    </div>
@endsection
