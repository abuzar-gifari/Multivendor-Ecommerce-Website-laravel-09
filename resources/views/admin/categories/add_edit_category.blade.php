@extends('admin.layout.layout')
@section('main')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Category Form</h4>

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
                            @if (empty($category['id']))
                                action="{{ url('/admin/add-edit-category') }}"    
                            @else
                                action="{{ url('/admin/add-edit-category/'.$category['id']) }}"
                            @endif
                        >
                            @csrf
                            
                            <div class="form-group">
                                <label for="category_name">Category Name</label>
                                <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter Category Name" 

                                @if (!empty($category['category_name']))
                                    value="{{ $category['category_name'] }}"
                                @else
                                {{-- htmlspecialchars(): Argument #1 ($string) must be of type string, array given 
                                    Bug place--}}
                                    {{-- value="{{ old($category['category_name']) }}" --}}
                                    value="{{ old('category_name') }}"
                                @endif 
                                >
                            </div>

                            <div class="form-group">
                                <label for="section_id">Select Section</label>
                                <select name="section_id" id="section_id" class="form-control">
                                    <option value="">Select Section</option>
                                    @foreach ($getSections as $section)
                                        <option value="{{ $section['id'] }}"
                                        
                                        @if (!empty($category['section_id']) && $category['section_id']==$section['id'])
                                            selected=""   
                                        @endif

                                        >{{ $section['name'] }}</option>                                        
                                    @endforeach
                                </select>
                            </div>

                            <div class="appendCategoriesLevel">
                                @include('admin.categories.append_categories_level')
                            </div>
                            
                            <div class="form-group">
                                <label for="category_image">Category Image</label><br>
                                <input type="file" name="category_image">
                            </div>

                            <div class="form-group">
                                <label for="category_discount">Category Discount</label>
                                <input type="text" class="form-control" id="category_discount" name="category_discount" placeholder="Enter Category Discount" 

                                @if (!empty($category['category_discount']))
                                    value="{{ $category['category_discount'] }}"
                                @else
                                    value="{{ old('category_discount') }}"
                                @endif 
                                >
                            </div>

                            <div class="form-group">
                                <label for="description">Category Description</label> 
                                <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="url">Category URL</label>
                                <input type="text" class="form-control" id="url" name="url" placeholder="Enter Category URL" 

                                @if (!empty($category['url']))
                                    value="{{ $category['url'] }}"
                                @else
                                    value="{{ old('url') }}"
                                @endif 
                                >
                            </div>

                            <div class="form-group">
                                <label for="meta_title"> Meta Title </label>
                                <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Enter Meta Titles" 

                                @if (!empty($category['meta_title']))
                                    value="{{ $category['meta_title'] }}"
                                @else
                                    value="{{ old('meta_title') }}"
                                @endif 
                                >
                            </div>

                            <div class="form-group">
                                <label for="meta_description"> Meta Description </label>
                                <input type="text" class="form-control" id="meta_description" name="meta_description" placeholder="Enter Meta Descriptions" 

                                @if (!empty($category['meta_description']))
                                    value="{{ $category['meta_description'] }}"
                                @else
                                    value="{{ old('meta_description') }}"
                                @endif 
                                >
                            </div>

                            <div class="form-group">
                                <label for="meta_keywords"> Meta Keywords </label>
                                <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Enter Meta Keywords" 

                                @if (!empty($category['meta_keywords']))
                                    value="{{ $category['meta_keywords'] }}"
                                @else
                                    value="{{ old('meta_keywords') }}"
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
