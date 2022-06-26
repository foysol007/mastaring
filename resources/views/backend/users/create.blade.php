@extends('layouts.backend')

    @section('main')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2 class="text-center"><b>Create User</b></h2>
            <form action="{{ route('admin.user.create') }}" method="post" enctype = "multipart/form-data">
                @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="taxt" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
        @error('name')
    <p class="text-danger">{{ $message }}</p>
@enderror
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label @error('phone') is-invalid @enderror">Phone</label>
        <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}">
        @error('phone')
        <p class="text-danger">{{ $message }}</p>
@enderror
    </div>
    <div class="mb-3">
        <label for="address" class="form-label @error('address') is-invalid @enderror">Address</label>
        <textarea class="form-control" name="address" id="address">{{ old('address') }}</textarea>
        @error('address')
        <p class="text-danger">{{ $message }}</p>
@enderror
    </div>
    <div class="md-3">
    <label for="email" class="form-label @error('Email') is-invalid @enderror">Email</label>
        <input  type="email" class="form-control mb-3" id="email" name="email" value="{{ old('email') }}">
        @error('email')
        <p class="text-danger">{{ $message }}</p>
@enderror
    </div>
    <div class="md-3">
        <label for="password" class="form-label @error('password') is-invalid @enderror">Password</label>
            <input  type="password" class="form-control mb-3" id="password" name="password" value="{{ old('password') }}">
            @error('password')
            <p class="text-danger">{{ $message }}</p>
    @enderror
        </div>
        <div class="md-3">
            <label for="password_confirmation" class="form-label @error('password_confirmation') is-invalid @enderror">Confirm Password</label>
                <input  type="password" class="form-control mb-3" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}">
                @error('password_confirmation')
                <p class="text-danger">{{ $message }}</p>
        @enderror
            </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>

            </div>
        </div>


    </div>



    @endsection
