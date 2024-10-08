@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Edit Product</h1>

        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description">{{ $product->description }}</textarea>
            </div>

            <div class="mb-3">
            <label  class="form-label">Product Category</label>
            <select name="category" class="form-control">
                @foreach ($categorys as $category )
                <option  @if($category->id == $product->category_id) selected @endif value="{{$category->id}}">{{$category->category_name}}</option>
                @endforeach
            </select>
        </div>

            <button type="submit" class="btn btn-success">Update Product</button>
        </form>
    </div>
@endsection