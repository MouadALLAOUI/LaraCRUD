@extends('layouts.app')
@section('title')
    @php
        echo 'Index';
    @endphp
@endsection




@section('content')
    <div class="card">
        <h3 class="card-header text-uppercase"> Table </h3>

        <div class="card-body bg-light p-3">
            @guest
                <h1 class="title">no table avaible</h1>
            @else
                @if ($message = Session::get('success'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <table class="table table-striped table-inverse table-responsive mt-1">
                    @if (auth()->user()->role == 'admin')
                        <thead class="thead-inverse bg-dark text-light">
                            <tr class="">
                                <th><input type="checkbox" name="" id=""></th>
                                <th>Titre</th>
                                <th>prix</th>
                                <th>Qté</th>
                                <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            @include('products.table', $products)
                        </tbody>
                    @elseif (auth()->user()->role == 'user')
                        <thead class="thead-inverse bg-dark text-light">
                            <tr class="">
                                <th>Titre</th>
                                <th>Img</th>
                                <th>Description</th>
                                <th>prix</th>
                                <th>Qté</th>
                            </tr>
                        </thead>
                        <tbody>
                            @include('products.table', $products)
                        </tbody>
                    @endif
                </table>
                <div class="d-flex justify-content-center mb-1">{{ $products->links() }}</div>
            @endguest
        </div>
    </div>
@endsection
