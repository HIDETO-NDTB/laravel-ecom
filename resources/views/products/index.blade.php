@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Products</div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="table table-hover">
                        <thead>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @if($products->count() > 0)
                                @foreach ($products as $product)
                                    <tr>
                                        <td>
                                            <img src="{{$product->image}}" alt="" height="100px" width="100px">
                                        </td>
                                        <td>
                                            {{ $product->name }}
                                        </td>
                                        <td>
                                            {{ $product->price }}
                                        </td>
                                        <td>
                                            <a href="{{ route('products.show',['id' => $product->id])}}" class="btn btn-primary">Show</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('products.destroy',['id' => $product->id])}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"  class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>

                                @endforeach



                            @else
                                <th class="text-center">No products found.</th>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
