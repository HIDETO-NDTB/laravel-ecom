@extends('layouts.app')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ $product->name }}</div>

            <div class="card-body">
                <img src="{{$product->image}}" alt="{{ $product->name }}" height="250px" width="40%">
                <p>{{ $product->description }}</p>
                <p>{{ $product->price }}</p>
            </div>
        </div>
    </div>
</div>

@endsection
