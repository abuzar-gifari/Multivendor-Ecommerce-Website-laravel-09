@extends('admin.layout.layout')
@section('main')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Brand Add/Edit</h4>

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
                            @if (empty($brand['id']))
                                action="{{ url('/admin/add-edit-brand') }}"    
                            @else
                                action="{{ url('/admin/add-edit-brand/'.$brand['id']) }}"
                            @endif
                        >
                            @csrf
                            
                            <div class="form-group">
                                <label for="brand_name">Brand Name</label>
                                <input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="Enter Brand Name" 
                                @if (!empty($brand['name']))
                                    value="{{ $brand['name'] }}"
                                @else
                                    value="{{ old($brand['name']) }}"
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
