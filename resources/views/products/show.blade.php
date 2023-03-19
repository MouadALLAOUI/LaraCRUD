@extends('layouts.app')
@section('title')
    @php
        echo 'show';
    @endphp
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Product</h2>
            </div>
            <div class="pull-right">
                {{-- <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a> --}}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <ul>
                    <li>{{ $product->id }}</li>
                    <li>{{ $product->title }}</li>
                    <li>{{ $product->ImgPath }}</li>
                    <li>{{ $product->Description }}</li>
                    <li>{{ $product->prix }}</li>
                    <li>{{ $product->Qte }}</li>
                </ul>
            </div>
        </div>
    @endsection
