@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Product Details</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text"><strong>Price:</strong> ${{ $product->price }}</p>
                <p class="card-text"><strong>Description:</strong> {{ $product->description }}</p>

                <a href="{{ route('products.index') }}" class="btn btn-primary">Back to Products</a>
            </div>
        </div>
    </div>
@endsection