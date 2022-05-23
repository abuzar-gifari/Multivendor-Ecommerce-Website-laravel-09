@extends('admin.layout.layout')
@section('main')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Products</h4>

                        <a href="{{ url('/admin/add-edit-product') }}" class="btn btn-block btn-primary" style="max-width:150px; float:right; display:inline-block;">
                            Add Products
                        </a>

                        @if (Session::has('success_msg'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong></strong>{{ Session::get('success_msg') }} 
                            </div>    
                        @endif

                        <div class="table-responsive pt-3">
                            <table id="products" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            Id
                                        </th>
                                        <th>
                                            Product Name
                                        </th>
                                        <th>
                                            Product Code
                                        </th>
                                        <th>
                                            Product Color
                                        </th>
                                        <th>
                                            Category
                                        </th>
                                        <th>
                                            Section
                                        </th>
                                        <th>
                                            Added By
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>
                                                {{ $product['id'] }}
                                            </td>
                                            <td>
                                                {{ $product['product_name'] }}
                                            </td>
                                            <td>
                                                {{ $product['product_code'] }}
                                            </td>
                                            <td>
                                                {{ $product['product_color'] }}
                                            </td>
                                            <td>
                                                {{ $product['category']['category_name'] }}
                                            </td>
                                            <td>
                                                {{ $product['section']['name'] }}
                                            </td>
                                            <td>
                                                @if ($product['admin_type']=="vendor")
                                                    <a target="_blank" href="{{ url('admin/view-vendor-details/'.$product['admin_id']) }}">
                                                        {{ ucfirst($product['admin_type']) }}
                                                    </a>
                                                @else
                                                    {{ ucfirst($product['admin_type']) }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($product['status']==1)
                                                    <a href="javascript:void(0)" class="updateProductStatus" id="{{ $product['id'] }}" product_id="{{ $product['id'] }}">
                                                        <i style="font-size:25px;" class="mdi mdi-bookmark-check" status="Active"></i>
                                                    </a>
                                                @else
                                                    <a href="javascript:void(0)" class="updateProductStatus" id="{{ $product['id'] }}" product_id="{{ $product['id'] }}">
                                                        <i style="font-size:25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i>
                                                    </a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('admin/add-edit-product/'.$product['id']) }}">
                                                    <i style="font-size:25px;" class="mdi mdi-pencil-box"></i>
                                                </a>
                                                <a class="confirmDelete" href="javascript:void(0)" module="product" moduleid="{{ $product['id'] }}">
                                                    <i style="font-size:25px;" class="mdi mdi-file-excel-box"></i>
                                                </a>
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
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
        </div>
    </footer>
    <!-- partial -->
</div>
@endsection
