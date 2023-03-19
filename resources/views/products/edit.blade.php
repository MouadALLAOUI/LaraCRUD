@extends('layouts.app')
@section('title')
    @php
        echo 'Edit';
    @endphp
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Edit Product
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body container">
                <form action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="ImgPath"><strong>Image:</strong></label>
                                    <input type="file" name="ImgPath" id="ImgPath formFile"
                                        value="{{ $product->ImgPath }}" class="form-control" accept="image/*">
                                    {{-- <input type="image"> --}}
                                    <div><img src="" alt="{{ $product->title }}"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group w-100">
                                        <label for="title">
                                            <strong>Titre:</strong>
                                        </label>
                                        <input type="text" name="title" id="title" class="form-control"
                                            placeholder="titre" value="{{ $product->title }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="Description">
                                            <strong>Description:</strong>
                                        </label>
                                        <textarea name="Description" id="Description" class="form-control" placeholder="Description">{{ $product->Description }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="prix">
                                            <strong>prix:</strong>
                                        </label>
                                        <input type="number" name="prix" id="prix" class="form-control"
                                            placeholder="prix" value="{{ $product->prix }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="Description">
                                            <strong>Qté:</strong>
                                        </label>
                                        <input type="number" min="0" name="Qte" id="Qte"
                                            class="form-control" placeholder="Qté" value="{{ $product->Qte }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
