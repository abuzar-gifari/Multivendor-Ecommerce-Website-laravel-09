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
        <h4>Update Business Details</h4>
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
                        <form class="forms-sample" method="post" action="{{ url('/admin/update-vendor-details/business') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="shop_email">Email</label>
                                <input type="email" readonly class="form-control" id="shop_email" value="{{ $vendorDetails["shop_email"] }}">
                            </div>
                            <div class="form-group">
                                <label for="shop_name">Name</label>
                                <input type="text" class="form-control" value="{{ $vendorDetails["shop_name"] }}" id="shop_name" name="shop_name">
                            </div>
                            <div class="form-group">
                                <label for="shop_address">Address</label>
                                <input type="text" class="form-control" id="shop_address" name="shop_address" value="{{ $vendorDetails['shop_address'] }}">
                            </div>
                            <div class="form-group">
                                <label for="shop_city">City</label>
                                <input type="text" class="form-control" id="shop_city" name="shop_city" value="{{ $vendorDetails['shop_city'] }}">
                            </div>
                            <div class="form-group">
                                <label for="shop_state">State</label>
                                <input type="text" class="form-control" id="shop_state" name="shop_state" value="{{ $vendorDetails['shop_state'] }}">
                            </div>
                            <div class="form-group">
                                <label for="shop_country">Country</label>
                                <input type="text" class="form-control" id="shop_country" name="shop_country" value="{{ $vendorDetails['shop_country'] }}">
                            </div>
                            <div class="form-group">
                                <label for="shop_pincode">Pin Code</label>
                                <input type="text" class="form-control" id="shop_pincode" name="shop_pincode" value="{{ $vendorDetails['shop_pincode'] }}">
                            </div>
                            <div class="form-group">
                                <label for="shop_mobile">Mobile</label>
                                <input type="text" class="form-control" id="shop_mobile" name="shop_mobile" value="{{ $vendorDetails['shop_mobile'] }}">
                            </div>
                            <div class="form-group">
                                <label for="shop_mobile">Shop Website</label>
                                <input type="text" class="form-control" id="shop_mobile" name="shop_website" value="{{ $vendorDetails['shop_website'] }}">
                            </div>
                            <div class="form-group">
                                <label for="address_proof">Address Proof</label>
                                <select name="address_proof" id="address_proof" class="form-control">
                                    <option value="Passport"
                                        @if ($vendorDetails['address_proof']=="Passport")
                                            selected
                                        @endif
                                    >Passport</option>
                                    <option value="Voting Card"
                                        @if ($vendorDetails['address_proof']=="Voting Card")
                                            selected
                                        @endif
                                    >Voting Card</option>
                                    <option value="Pan"
                                        @if ($vendorDetails['address_proof']=="Pan")
                                            selected
                                        @endif
                                    >Pan</option>
                                    <option value="Driving License"
                                        @if ($vendorDetails['address_proof']=="Driving License")
                                            selected
                                        @endif
                                    >Driving License</option>
                                    <option value="Aadhar card"
                                        @if ($vendorDetails['address_proof']=="Aadhar card")
                                            selected
                                        @endif
                                    >Aadhar card</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="address_proof_image">Address Proof Image</label>
                                <input type="file" class="form-control" id="address_proof_image" name="address_proof_image">
                            </div>
                            <div class="form-group">
                                <label for="business_license_number">Business License Number</label>
                                <input type="text" class="form-control" id="business_license_number" name="business_license_number" value="{{ $vendorDetails['business_license_number'] }}">
                            </div>
                            <div class="form-group">
                                <label for="shop_gst_number">GST Number</label>
                                <input type="text" class="form-control" id="gst_number" name="gst_number" value="{{ $vendorDetails['gst_number'] }}">
                            </div>
                            <div class="form-group">
                                <label for="pan_number">PAN Number</label>
                                <input type="text" class="form-control" id="pan_number" name="pan_number" value="{{ $vendorDetails['pan_number'] }}">
                            </div>
                            <button style="width: 100%" type="submit" class="btn btn-primary mr-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @elseif($slug=="bank")
            
        @endif
        
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    @includeIf('admin.layout.footer')
    <!-- partial -->
</div>
@endsection
