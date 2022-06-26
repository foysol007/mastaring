@extends('layouts.backend');

@section('main')
<div class="container mt-3">
    <H2 class="text-center">Products List</H2>
    <a href="{{route('admin.product.create')}}" class="btn btn-success">Creat New Product</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product Name</th>
      <th scope="col">Price</th>
      <th scope="col">Description</th>
      <th scope="col">Photo</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($products as $key=>$product)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$product->name}}</td>
      <td>{{$product->price}} BDT</td>
      <td>{{$product->desc}}</td>
      <td>
        <img src="{{asset('uplodes/products/'.$product->photo)}}" alt="photo" height="50px">
      </td>
      <td>
        <a class="btn btn-primary" href="{{route('admin.product.edit',$product->id)}}">Edit</a>
        <a class="btn btn-danger" href="{{route('admin.product.delete',$product->id)}}">Delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection
