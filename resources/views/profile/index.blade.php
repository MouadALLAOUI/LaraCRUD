@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="card">
        <h3 class="card-header text-uppercase"> Profile </h3>

        <div class="card-body bg-light p-3 d-flex justify-content-center">
            <div class="card" style="width: 40rem;">
                <img src="" class="card-img-top" alt="Profile Image">
                <div class="card-body">
                    <h4 class="card-title">Name: {{ auth()->user()->name }}</h4>
                    <h4 class="card-text">Email: {{ auth()->user()->email }}</h4>
                    <a class="btn btn-danger" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    {{-- <form action="{{ route('password.update') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="current_password">Current Password</label>
                            <input type="password" class="form-control" id="current_password" name="current_password"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Password</button>
                    </form> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
