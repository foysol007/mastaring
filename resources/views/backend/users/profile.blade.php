@extends('layouts.backend')
@section('main')
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 mt-5">
            <div class="card" style="width: 18rem;">
                {{--  <img src="..." class="card-img-top" alt="...">  --}}
                <div class="card-body">
                  <h5 class="card-title">{{ auth()->user()->name }}</h5>
                  <p class="card-text"><strong>Email: </strong>{{ auth()->user()->email }}</p>
                  <p class="card-text"><strong>Address: </strong>{{ auth()->user()->address }}</p>
                  <p class="card-text"><strong>Phone: </strong>{{ auth()->user()->phone }}</p>








                </div>
              </div>
        </div>
    </div>
</div>















@endsection
