@extends('admin.layout.layout')
@section('main')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Vendor Details</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <h4>Personal Details</h4>

                    {{-- FOR VENDOR PERSONAL DETAILS --}}

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
                    
                        <div class="form-group">
                            <label for="vendor_personal_email">Email</label>
                            <input type="email" readonly class="form-control" value="{{ $vendorDetails["vendor_personal"]["email"] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="vendor_personal_name">Name</label>
                            <input type="text" class="form-control" value="{{ $vendorDetails["vendor_personal"]["name"] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="vendor_personal_address">Address</label>
                            <input type="text" class="form-control" value="{{ $vendorDetails["vendor_personal"]["address"] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="vendor_personal_city">City</label>
                            <input type="text" class="form-control" value="{{ $vendorDetails["vendor_personal"]["city"] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="vendor_personal_state">State</label>
                            <input type="text" class="form-control" value="{{ $vendorDetails["vendor_personal"]["state"] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="vendor_personal_country">Country</label>
                            <input type="text" class="form-control" value="{{ $vendorDetails["vendor_personal"]["country"] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="vendor_personal_pincode">Pin Code</label>
                            <input type="text" class="form-control" value="{{ $vendorDetails["vendor_personal"]["pincode"] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="vendor_personal_pincode">Mobile</label>
                            <input type="text" class="form-control" value="{{ $vendorDetails["vendor_personal"]["mobile"] }}" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <h4>Business Details</h4>

                    {{-- FOR VENDOR BUSINESS DETAILS --}}

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
                    
                        <div class="form-group">
                            <label for="">Shop Name</label>
                            <input type="email" readonly class="form-control" value="{{ $vendorDetails["vendor_business"]["shop_name"] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Shop Address</label>
                            <input type="text" class="form-control" value="{{ $vendorDetails["vendor_business"]["shop_address"] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Shop City</label>
                            <input type="text" class="form-control" value="{{ $vendorDetails["vendor_business"]["shop_city"] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Shop City</label>
                            <input type="text" class="form-control" value="{{ $vendorDetails["vendor_business"]["shop_city"] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Shop State</label>
                            <input type="text" class="form-control" value="{{ $vendorDetails["vendor_business"]["shop_state"] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Shop Country</label>
                            <input type="text" class="form-control" value="{{ $vendorDetails["vendor_business"]["shop_country"] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Shop Pin Code</label>
                            <input type="text" class="form-control" value="{{ $vendorDetails["vendor_business"]["shop_pincode"] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Shop Mobile</label>
                            <input type="text" class="form-control" value="{{ $vendorDetails["vendor_business"]["shop_mobile"] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Shop Website</label>
                            <input type="text" class="form-control" value="{{ $vendorDetails["vendor_business"]["shop_website"] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Shop Email</label>
                            <input type="text" class="form-control" value="{{ $vendorDetails["vendor_business"]["shop_email"] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Address Proof</label>
                            <input type="text" class="form-control" value="{{ $vendorDetails["vendor_business"]["address_proof"] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Business License Number</label>
                            <input type="text" class="form-control" value="{{ $vendorDetails["vendor_business"]["business_license_number"] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">GST Number</label>
                            <input type="text" class="form-control" value="{{ $vendorDetails["vendor_business"]["gst_number"] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Pan Number</label>
                            <input type="text" class="form-control" value="{{ $vendorDetails["vendor_business"]["pan_number"] }}" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h4>Bank Details</h4>

        {{-- FOR VENDOR BANK DETAILS --}}

        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">                   
                        <div class="form-group">
                            <label for="">Account Holder Name</label>
                            <input type="email" readonly class="form-control" value="{{ $vendorDetails["vendor_bank"]["account_holder_name"] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Bank Name</label>
                            <input type="text" class="form-control" value="{{ $vendorDetails["vendor_bank"]["bank_name"] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Account Number</label>
                            <input type="text" class="form-control" value="{{ $vendorDetails["vendor_bank"]["account_number"] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Bank IFSC Code</label>
                            <input type="text" class="form-control" value="{{ $vendorDetails["vendor_bank"]["bank_ifsc_code"] }}" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @includeIf('admin.layout.footer')
</div>
@endsection
