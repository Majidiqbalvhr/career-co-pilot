@extends('layout.app', ['title' => 'TMS - Update Load'])
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Products
                            <a href="{{url('products')}}" class="btn btn-primary float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{url('products/'.$product->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="permission-name">Product Name</label>
                                <input type="text" name="name" class="form-control" value="{{$product->name}}" required />
                            </div>
                            <div class="mb-3">
                                <label for="permission-name">Product Detail</label>
                                <input type="text" name="detail" class="form-control" value="{{$product->detail}}" required />
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
