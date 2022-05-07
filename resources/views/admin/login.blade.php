<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Skydash Admin</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="{{ asset('admin') }}/vendors/feather/feather.css">
        <link rel="stylesheet" href="{{ asset('admin') }}/vendors/ti-icons/css/themify-icons.css">
        <link rel="stylesheet" href="{{ asset('admin') }}/vendors/css/vendor.bundle.base.css">
        <link rel="stylesheet" href="{{ asset('admin') }}/css/vertical-layout-light/style.css">
        <!-- endinject -->
        <link rel="shortcut icon" href="{{ asset('admin') }}/images/favicon.png" />
    </head>
    <body>
        <div class="container-scroller">
            <div class="container-fluid page-body-wrapper full-page-wrapper">
                <div class="content-wrapper d-flex align-items-center auth px-0">
                    <div class="row w-100 mx-0">
                        <div class="col-lg-4 mx-auto">
                            <div class="auth-form-light text-left py-5 px-4 px-sm-5">

                                {{-- SHOW ERROR MESSAGE (LOGIN UNSUCCESS INFORMATION) --}}
                                @if (Session::has('error_msg'))
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>Error:</strong>{{ Session::get('error_msg') }} 
                                    </div>    
                                @endif
                                
                                <h6 class="font-weight-light text-center">Admin Login</h6>
                                <form class="pt-3" action="{{ url('admin/login') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-lg" style="width: 100%">Submit</button>
                                    <div class="text-center mt-4 font-weight-light">
                                        Don't have an account? <a href="register.html" class="text-primary">Create</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('admin') }}/vendors/js/vendor.bundle.base.js"></script>
        <script src="{{ asset('admin') }}/js/off-canvas.js"></script>
        <script src="{{ asset('admin') }}/js/hoverable-collapse.js"></script>
        <script src="{{ asset('admin') }}/js/template.js"></script>
        <script src="{{ asset('admin') }}/js/settings.js"></script>
        <script src="{{ asset('admin') }}/js/todolist.js"></script>
    </body>
</html>