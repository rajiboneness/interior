<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Chisel & Wood  | Vendor panel</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
    {{-- <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" /> --}}
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-6 col-xl-6">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                            @if (Session::get('success'))<div class="alert alert-success">{{ Session::get('success') }}</div>@endif
                            @if (Session::get('failure'))<div class="alert alert-danger">{{ Session::get('failure') }}</div>
                            @endif

                        <div class="d-flex align-items-center justify-content-center mb-3">
                                <h3 class="text-primary text-center">Register</h3>
                        </div>
                        <form method="POST" action="{{ route('vendor.register.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="fnameInput" placeholder="name@example.com" name="fname" value="{{ old('fname') }}">
                                        <label for="fnameInput">First Name</label>
                                        @error('fname') <p class="small text-danger">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="lnameInput" placeholder="name@example.com" name="lname" value="{{ old('lname') }}">
                                        <label for="lnameInput">Last Name</label>
                                        @error('lname') <p class="small text-danger">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" value="{{ old('email') }}">
                                        <label for="floatingInput">Email address</label>
                                        @error('email') <p class="small text-danger">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" id="mobileInput" placeholder="name@example.com" name="phone" value="{{ old('phone') }}">
                                        <label for="mobileInput">Mobile No</label>
                                        @error('phone') <p class="small text-danger">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                                @error('password') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign Up</button>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <a href="{{ route('vendor.login') }}">Back to Login ?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>

</body>

</html>