@extends('admin.layout.layout')
@section('main')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center">Product Add/Edit Form</h4>

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
                            @if (empty($product['id']))
                                action="{{ url('/admin/add-edit-product') }}"    
                            @else
                                action="{{ url('/admin/add-edit-product/'.$product['id']) }}"
                            @endif
                        >
                            @csrf
                            <div class="form-group">
                                <label for="category_id">Select Category</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">Select</option>
                                    @foreach ($categories as $section)
                                        <optgroup label="{{ $section['name'] }}"></optgroup>
                                        @foreach ($section['categories'] as $category)
                                            <option value="{{ $category['id'] }}">&nbsp;&nbsp;&nbsp;--&nbsp;{{ $category['category_name'] }}</option>
                                            @foreach ($category['subcategories'] as $subcategory)
                                                <option value="{{ $subcategory['id'] }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;{{ $subcategory['category_name'] }}</option>
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="brand_id">Select Brand</label>
                                <select name="brand_id" id="brand_id" class="form-control">
                                    <option value="">Select</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand['id'] }}">{{ $brand['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="product_name">Product Name</label>
                                <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter Product Name" 

                                @if (!empty($product['product_name']))
                                    value="{{ $product['product_name'] }}"
                                @else
                                    value="{{ old('product_name') }}"
                                @endif 
                                >
                            </div>

                            <div class="form-group">
                                <label for="product_code">Product Code</label>
                                <input type="text" class="form-control" id="product_code" name="product_code" placeholder="Enter Product Code" 

                                @if (!empty($product['product_code']))
                                    value="{{ $product['product_code'] }}"
                                @else
                                    value="{{ old('product_code') }}"
                                @endif 
                                >
                            </div>

                            <div class="form-group">
                                <label for="product_color">Product Color</label>
                                <input type="text" class="form-control" id="product_color" name="product_color" placeholder="Enter Product Color" 

                                @if (!empty($product['product_color']))
                                    value="{{ $product['product_color'] }}"
                                @else
                                    value="{{ old('product_color') }}"
                                @endif 
                                >
                            </div>

                            <div class="form-group">
                                <label for="product_color">Product Price</label>
                                <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Enter Product Price" 

                                @if (!empty($product['product_price']))
                                    value="{{ $product['product_price'] }}"
                                @else
                                    value="{{ old('product_price') }}"
                                @endif 
                                >
                            </div>
                            
                            <div class="form-group">
                                <label for="product_discount">Product Discount (%)</label>
                                <input type="text" class="form-control" id="product_discount" name="product_discount" placeholder="Enter Product Discount" 

                                @if (!empty($product['product_discount']))
                                    value="{{ $product['product_discount'] }}"
                                @else
                                    value="{{ old('product_discount') }}"
                                @endif 
                                >
                            </div>

                            <div class="form-group">
                                <label for="product_weight">Product Weight</label>
                                <input type="text" class="form-control" id="product_weight" name="product_weight" placeholder="Enter Product Weight" 

                                @if (!empty($product['product_weight']))
                                    value="{{ $product['product_weight'] }}"
                                @else
                                    value="{{ old('product_weight') }}"
                                @endif 
                                >
                            </div>

                            <div class="form-group">
                                <label for="product_image">Product Image (Recommended size: 1000×1000)</label><br>
                                <input type="file" name="main_image">
                            </div>

                            <div class="form-group">
                                <label for="product_video">Product Video (Recommended size: Less Than 2 MB)</label><br>
                                <input type="file" name="product_video">
                            </div>

                            <div class="form-group">
                                <label for="product_description">Product Description</label> 
                                <textarea name="description" id="product_description" class="form-control" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="meta_title"> Meta Title </label>
                                <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Enter Meta Titles" 

                                @if (!empty($product['meta_title']))
                                    value="{{ $product['meta_title'] }}"
                                @else
                                    value="{{ old('meta_title') }}"
                                @endif 
                                >
                            </div>

                            <div class="form-group">
                                <label for="meta_description"> Meta Description </label>
                                <input type="text" class="form-control" id="meta_description" name="meta_description" placeholder="Enter Meta Descriptions" 

                                @if (!empty($product['meta_description']))
                                    value="{{ $product['meta_description'] }}"
                                @else
                                    value="{{ old('meta_description') }}"
                                @endif 
                                >
                            </div>

                            <div class="form-group">
                                <label for="meta_keywords"> Meta Keywords </label>
                                <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Enter Meta Keywords" 

                                @if (!empty($product['meta_keywords']))
                                    value="{{ $product['meta_keywords'] }}"
                                @else
                                    value="{{ old('meta_keywords') }}"
                                @endif 
                                >
                            </div>

                            <div class="form-group">
                                <label for="is_featured"> Featured Item </label>
                                <input type="checkbox" name="is_featured" id="is_featured" value="Yes"
                                @if (!empty($product['is_featured']) && $product['is_featured']=="Yes")
                                    checked=""
                                @endif
                                >
                            </div>

                            <button style="width: 100%" type="submit" class="btn btn-primary mr-2">Submit</button>
                        </form>
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
