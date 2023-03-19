@extends('layouts.app')
@section('title')
    @php
        echo 'show';
    @endphp
@endsection

@section('content')
    <div class="card">
        <h3 class="card-header text-uppercase"> Show Product </h3>

        <div class="card-body bg-light p-3 d-flex justify-content-center">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset($product->ImgPath) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h2 class="card-title">Title : {{ $product->title }}</h2>
                    <h4 class="card-text">Description : {{ $product->Description }}</h4>
                    <h5 class="card-text">price : {{ $product->prix }}</h5>
                    <button type="submit" class="btn btn-success">buy</button>
                </div>
            </div>
        </div>
        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">edit</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
    </div>
@endsection
