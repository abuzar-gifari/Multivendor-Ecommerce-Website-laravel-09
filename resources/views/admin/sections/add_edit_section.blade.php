@extends('admin.layout.layout')
@section('main')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Section</h4>

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
                            @if (empty($section['id']))
                                action="{{ url('/admin/add-edit-section') }}"    
                            @else
                                action="{{ url('/admin/add-edit-section/'.$section['id']) }}"
                            @endif
                        >
                            @csrf
                            
                            <div class="form-group">
                                <label for="section_name">Section Name</label>
                                <input type="text" class="form-control" id="section_name" name="section_name" placeholder="Enter Section Name" 
                                @if (!empty($section['name']))
                                    value="{{ $section['name'] }}"
                                @else
                                    value="{{ old($section['name']) }}"
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
