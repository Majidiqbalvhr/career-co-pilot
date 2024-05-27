@extends('layout.app', ['title' => 'TMS - Add Load'])
@section('content')
    <!-- Start Content-->
    @php
        $productPermissions = $allpermissions->filter(function ($allpermissions) {
              return strpos($allpermissions->name, 'Product');
          });
    @endphp
    @if(session('status'))
        <div class="alert alert-success">{{session('status')}}</div>
    @endif
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <form class="d-flex align-items-center">

                            <a data-toggle="tooltip" data-placement="bottom" title="Back"
                               href="{{ url('roles') }}" class="btn btn-blue btn-sm mr-1">
                                <i class="mdi mdi-arrow-left-bold-circle-outline" style="font-size:20px;"></i>
                            </a>
                        </form>
                    </div>
                    <h4 class="page-title">Permissions of {{ $role->name }} </h4>
                </div>
            </div>
        </div>
        <form method="post" action="{{ route('permissions.update') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $role->id }}" />
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3">
                                    <ul class="sitemap">
                                        <li><a class="text-success"><input class="mr-1" type="checkbox"
                                                                           id="allproducts"><b>Product Permissions </b></a>
                                            <ul>
                                                @foreach ($productPermissions as $productPermission)
                                                    <li><a><input class="mr-1"
                                                                  id="product-{{ str_replace(' ', '', $productPermission->name) }}"
                                                                  type="checkbox" name="permission[]"
                                                                  value="{{ $productPermission->name }}"
                                                                  @if ($productPermission->isAvailable == 'Yes') checked @endif>{{ $productPermission->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </div> <!-- end col-->
                            </div> <!-- end row-->
                            <div class="row">
                                <div class="col-12 text-center">
                                    <button type="submit"
                                            class="btn btn-primary waves-effect waves-light float-middle m-1"
                                            id="submit"><i class="fe-check-circle mr-1"></i>Update Permission</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initial check for allproducts checkbox
            if ($('#product-AddProduct').is(":checked") &&
                $('#product-DeleteProduct').is(":checked") &&
                $('#product-EditProduct').is(":checked")) {
                $('#allproducts').prop('checked', true);
            } else {
                $('#allproducts').prop('checked', false);
            }

            // Event listener for allproducts checkbox

            $('#allproducts').change(function() {
                if (this.checked) {
                    $('#product-AddProduct').prop('checked', true);
                    $('#product-EditProduct').prop('checked', true);
                    $('#product-DeleteProduct').prop('checked', true);
                } else {
                    $('#product-AddProduct').prop('checked', false);
                    $('#product-EditProduct').prop('checked', false);
                    $('#product-DeleteProduct').prop('checked', false);
                }
            });

            // Event listeners for individual product checkboxes
            $('#product-AddProduct, #product-EditProduct, #product-DeleteProduct').change(function() {
                if ($('#product-AddProduct').is(":checked") &&
                    $('#product-DeleteProduct').is(":checked") &&
                    $('#product-EditProduct').is(":checked")) {
                    $('#allproducts').prop('checked', true);
                } else {
                    $('#allproducts').prop('checked', false);
                }
            });
        });
    </script>
@endsection
