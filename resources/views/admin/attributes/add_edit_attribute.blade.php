@extends('admin.layout.layout')
@section('main')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center">Attribute Add/Edit Form</h4>

                        @if (Session::has('error_msg'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong></strong>{{ Session::get('error_msg') }} 
                            </div>    
                        @endif
                        @if (Session::has('success_msg'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong></strong>{{ Session::get('success_msg') }} 
                            </div>    
                        @endif

                        <form 
                            class="forms-sample" 
                            method="post"
                            enctype="multipart/form-data"
                            action="{{ url('/admin/add-edit-attributes/'.$product['id']) }}"    
                        >
                            @csrf

                            <div class="form-group">
                                <label for="product_name">Product Name</label>
                                &nbsp; {{ $product['product_name'] }}
                            </div>

                            <div class="form-group">
                                <label for="product_code">Product Code</label>
                                &nbsp; {{ $product['product_code'] }}
                            </div>

                            <div class="form-group">
                                <label for="product_color">Product Color</label>
                                &nbsp; {{ $product['product_color'] }}
                            </div>

                            <div class="form-group">
                                <label for="product_color">Product Price</label>
                                &nbsp; {{ $product['product_price'] }}
                            </div>

                            <div class="form-group">
                                <div class="field_wrapper">
                                    <div>
                                        <input type="text" name="size[]" placeholder="Size" style="width: 120px;" required=""/>
                                        <input type="text" name="sku[]" placeholder="Sku" style="width: 120px;" required=""/>
                                        <input type="text" name="price[]" placeholder="Price" style="width: 120px;" required=""/>
                                        <input type="text" name="stock[]" placeholder="Stock" style="width: 120px;" required=""/>
                                        <a href="javascript:void(0);" class="add_button" title="Add field">Add</a>
                                    </div>
                                </div>
                            </div>

                            <button style="width: 100%" type="submit" class="btn btn-primary mr-2">Submit</button>
                        </form><br>
                        <h4>Product Attributes</h4>
                        <table id="products" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                        Id
                                    </th>
                                    <th>
                                        Size
                                    </th>
                                    <th>
                                        SKU
                                    </th>
                                    <th>
                                        Price
                                    </th>
                                    <th>
                                        Stock
                                    </th>
                                    <th>
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product['attributes'] as $attribute)
                                    <tr>
                                        <td>
                                            {{ $attribute['id'] }}
                                        </td>
                                        <td>
                                            {{ $attribute['size'] }}
                                        </td>
                                        <td>
                                            {{ $attribute['sku'] }}
                                        </td>
                                        <td>
                                            {{ $attribute['price'] }}
                                        </td>
                                        <td>
                                            {{ $attribute['stock'] }}
                                        </td>
                                        <td>
                                            @if ($attribute['status']==1)
                                                <a href="javascript:void(0)" class="updateAttributeStatus" id="{{ $attribute['id'] }}" attribute_id="{{ $attribute['id'] }}">
                                                    <i style="font-size:25px;" class="mdi mdi-bookmark-check" status="Active"></i>
                                                </a>
                                            @else
                                                <a href="javascript:void(0)" class="updateAttributeStatus" id="{{ $attribute['id'] }}" attribute_id="{{ $attribute['id'] }}">
                                                    <i style="font-size:25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i>
                                                </a>
                                            @endif
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
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    @includeIf('admin.layout.footer')
    <!-- partial -->
</div>
@endsection
