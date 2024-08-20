@extends('layouts.app')
@section('title', 'products')


@section('content')
<div class="text-center">

    <a href="{{route('products.create')}}" class="btn btn-success">Add Product</a>
</div>
<table class="table mt-4">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Product Name</th>

            <th scope="col">product description</th>
            <th scope="col"> product price</th>
            <th scope="col"> action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)

            <tr>
                <th scope="row">{{$product['id']}}</th>
                <td>{{$product->name}}</td>
  
                <td>{{$product->description}}</td>
                <td>{{$product->price}}</td>


                <td><a href="{{route('products.show', $product['id'])}}" class="btn btn-info">view</a>
                    <a href="{{route('products.edit', $product['id'])}}" class="btn btn-primary">Edit</a>
                    <form style="display:inline;" method='POST' action={{route('products.destroy', $product->id)}} onsubmit="return deleteconform()" >
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>

                    </form>
                </td>
            </tr>
        @endforeach


    </tbody>
</table>
<script>
    function deleteconform() {
        return confirm("are you sure to delete ?");
    }
</script>
@endsection
