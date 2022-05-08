@extends('admin.layout.layout')
@section('main')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Update Vendor Details</h3>
                    </div>
                </div>
            </div>
        </div>
        
        @if ($slug=="personal")
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
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
                        <form class="forms-sample" method="post" action="{{ url('/admin/update-vendor-details/personal') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="vendor_personal_email">Email</label>
                                <input type="email" readonly class="form-control" id="vendor_personal_email" value="{{ $vendorDetails["email"] }}">
                            </div>
                            <div class="form-group">
                                <label for="vendor_personal_name">Name</label>
                                <input type="text" class="form-control" value="{{ $vendorDetails["name"] }}" id="vendor_personal_name" name="vendor_personal_name">
                            </div>
                            <div class="form-group">
                                <label for="vendor_personal_address">Address</label>
                                <input type="text" class="form-control" id="vendor_personal_address" name="vendor_personal_address" value="{{ $vendorDetails['address'] }}">
                            </div>
                            <div class="form-group">
                                <label for="vendor_personal_city">City</label>
                                <input type="text" class="form-control" id="vendor_personal_city" name="vendor_personal_city" value="{{ $vendorDetails['city'] }}">
                            </div>
                            <div class="form-group">
                                <label for="vendor_personal_state">State</label>
                                <input type="text" class="form-control" id="vendor_personal_state" name="vendor_personal_state" value="{{ $vendorDetails['state'] }}">
                            </div>
                            <div class="form-group">
                                <label for="vendor_personal_country">Country</label>
                                <input type="text" class="form-control" id="vendor_personal_country" name="vendor_personal_country" value="{{ $vendorDetails['country'] }}">
                            </div>
                            <div class="form-group">
                                <label for="vendor_personal_pincode">Pin Code</label>
                                <input type="text" class="form-control" id="vendor_personal_pincode" name="vendor_personal_pincode" value="{{ $vendorDetails['pincode'] }}">
                            </div>
                            <div class="form-group">
                                <label for="vendor_personal_pincode">Mobile</label>
                                <input type="text" class="form-control" id="vendor_personal_pincode" name="vendor_personal_mobile" value="{{ $vendorDetails['mobile'] }}">
                            </div>
                            <div class="form-group">
                                <label for="vendor_personal_image">Photo</label>
                                <input type="file" class="form-control" id="vendor_personal_image" name="vendor_personal_image">
                            </div>
                            <button style="width: 100%" type="submit" class="btn btn-primary mr-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>    
        @elseif($slug=="business")

        @elseif($slug=="bank")
            
        @endif
        
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    @includeIf('admin.layout.footer')
    <!-- partial -->
</div>
@endsection
