@extends('layouts.backend')

    @section('main')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2 class="text-center"><b>Create Product</b></h2>
            <form action="{{route('admin.product.create')}}" method="post" enctype = "multipart/form-data">
                @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Product Name</label>
        <input type="taxt" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
        @error('name')
    <p class="text-danger">{{ $message }}</p>
@enderror
    </div>
    <div class="mb-3">
        <label for="price" class="form-label @error('price') is-invalid @enderror">Product Price</label>
        <input type="number" class="form-control" name="price" id="price" value="{{ old('price') }}">
        @error('price')
        <p class="text-danger">{{ $message }}</p>
@enderror
    </div>
    <div class="mb-3">
        <label for="desc" class="form-label @error('desc') is-invalid @enderror">Product Description</label>
        <textarea class="form-control" name="desc" id="desc">{{ old('desc') }}</textarea>
        @error('desc')
        <p class="text-danger">{{ $message }}</p>
@enderror
    </div>
    <div class="md-3">
    <label for="photo" class="form-label @error('photo') is-invalid @enderror"><b>Product Photo</b></label>
        <input  type="file" class="form-control mb-3" id="photo" name="photo" value="{{ old('photo') }}">
        @error('photo')
        <p class="text-danger">{{ $message }}</p>
@enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>

            </div>
        </div>


    </div>



    @endsection
