@extends('layouts.app')

@section('content')
    <div class="card container">
        <h5 class="card-header text-uppercase">
            @guest
                Welcome to Stock Manager
            @else
                Welcome {{ auth()->user()->name }}
            @endguest
        </h5>
        <div class="card-body bg-dark text-light p-3">
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
