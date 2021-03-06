@extends('admin.layout.layout')
@section('main')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Settings</h3>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="justify-content-end d-flex">
                            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                    <a class="dropdown-item" href="#">January - March</a>
                                    <a class="dropdown-item" href="#">March - June</a>
                                    <a class="dropdown-item" href="#">June - August</a>
                                    <a class="dropdown-item" href="#">August - November</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Update Admin Password</h4>
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
                        <form class="forms-sample" method="post" action="{{ url('/admin/update-admin-details') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="email">Username/Email</label>
                                <input type="email" readonly class="form-control" id="email" value="{{ Auth::guard('admin')->user()->email }}">
                            </div>
                            <div class="form-group">
                                <label>Admin Type</label>
                                <input readonly class="form-control" value="{{ Auth::guard('admin')->user()->type }}">
                            </div>
                            <div class="form-group">
                                <label for="admin_name">Name</label>
                                <input type="text" class="form-control" value="{{ Auth::guard('admin')->user()->name }}" id="admin_name" name="admin_name" placeholder="Enter Your Name">
                            </div>
                            <div class="form-group">
                                <label for="admin_mobile">Mobile</label>
                                <input type="text" class="form-control" id="admin_mobile" name="admin_mobile" value="{{ Auth::guard('admin')->user()->mobile }}" placeholder="Enter Your Mobile No">
                            </div>
                            <div class="form-group">
                                <label for="admin_img">Image</label><br>
                                <input type="file" name="admin_img">
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
