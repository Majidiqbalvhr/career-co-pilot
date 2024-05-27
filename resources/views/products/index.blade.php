@extends('layout.app', ['title' => 'TMS - Add Load'])
@section('content')
    <!-- Start Content-->
    @if(session('status'))
        <div class="alert alert-success">{{session('status')}}</div>
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Products
                            @can('Add Product')
                            <a href="{{url('products/create')}}" class="btn btn-primary float-end">Add Products</a>
                            @endcan
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $index => $product)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>
                                        @can('Edit Product')
                                        <a href="{{ url('products/'.$product->id.'/edit') }}" class="btn btn-success">Edit</a>
                                        @endCan
                                        @can('Delete Product')
                                        <form method="post" action="{{ url('products/'.$product->id) }}" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                        @endCan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
