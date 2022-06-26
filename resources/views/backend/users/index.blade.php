@extends('layouts.backend');

@section('main')
<div class="container mt-3">
    <H2 class="text-center">User List</H2>
    <a href="{{ route('admin.user.create') }}" class="btn btn-success">Create New User</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Emali</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Address</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $key=>$user)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->phone}}</td>
      <td>{{$user->address}}</td>
      <td>
        <a class="btn btn-primary" href="#">Edit</a>
        <a class="btn btn-danger" href="#">Delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection
