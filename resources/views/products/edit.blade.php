@extends('layouts.app')
@section('title')
    @php
        echo 'Edit';
    @endphp
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>
                    Edit Product
                </h2>
            </div>
            <div class="pull-right">
                <a href="{{ route('products.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
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

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">

            <div class="col-md-4">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="ImgPath">
                            <strong>Image:</strong>
                        </label>
                        <input type="file" value="{{ $product->ImgPath }}" name="ImgPath" id="ImgPath"
                            class="form-control" placeholder="Detail">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="col-md-8">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="title">
                                <strong>Titre:</strong>
                            </label>
                            <input value="{{ $product->title }}" type="text" name="title" id="title"
                                class="form-control" placeholder="titre">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="Description">
                                <strong>Description:</strong>
                            </label>
                            <textarea value="{{ $product->Description }}" name="Description" id="Description" class="form-control"
                                placeholder="Description"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="prix">
                                <strong>prix:</strong>
                            </label>
                            <input value="{{ $product->prix }}" type="text" name="prix" id="prix"
                                class="form-control" placeholder="prix">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="Description">
                                <strong>Qté:</strong>
                            </label>
                            <input type="number" min="0" name="Qte" id="Qte" class="form-control"
                                placeholder="Qté" value="{{ $product->Qte }}">
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
