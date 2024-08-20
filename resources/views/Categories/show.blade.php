@extends('layouts.app')
@section('title', 'show')
@section('content')

<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Name : {{$category->category_name}}</h5>
        <p class="card-text">Description :  {{$category->category_description}}</p>
        <a href="{{route('categories.index', $category['id'])}}" class="btn btn-info">back</a>
      </div>
    </div>
  </div>
</div>
@stop

