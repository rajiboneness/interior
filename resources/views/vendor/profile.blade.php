@extends('vendor.layouts.master')

@section('content')
<!-- Sale & Revenue Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row" id="profile_page">
        <div class="col-md-2">
            <div class="card">
                <div class="card-body">
                    @php
                     $avater = asset('avater.png')   
                    @endphp
                    <div class="profile__img"><img src="{{ $user->image ? asset($user->image) : $avater }}" alt=""></div>
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                        role="tab" aria-controls="home" aria-selected="true">Profile</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                        role="tab" aria-controls="profile" aria-selected="false">Change Password</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <form method="POST" action="{{ asset(route('vendor.profile.store')) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="bg-light rounded h-100 p-4">
                            <div class="mb-3">
                                <label for="" class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                                @error('name') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Vendod Head<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="hname" name="hname" value="{{$user->vendor_head}}">
                                @error('hname') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Email<span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
                                @error('email') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Mobile<span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="mobile" name="mobile" value="{{$user->phone}}">
                                @error('mobile') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Address<span class="text-danger">*</span></label>
                                <textarea name="address" class="form-control" id="address" cols="30"
                                    rows="3">{{$user->address}}</textarea>
                                @error('address') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-md-8 col-12">
                                        <label for="" class="form-label">State</label>
                                        <input type="text" class="form-control" id="state" name="state" value="{{$user->state}}">
                                        @error('state') <p class="small text-danger">{{ $message }}</p> @enderror
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <label for="" class="form-label">Pincode<span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="pincode" name="pincode" value="{{$user->pincode}}">
                                        @error('pincode') <p class="small text-danger">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Profile Image<span class="text-danger">*</span></label>
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>
                        <div class="bg-light text-end pt-4 px-4">
                            <button type="submit" class="btn btn-sm btn btn-primary">Add Vendor</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="bg-light rounded h-100 p-4">
                        <form method="POST" id="check_password_form" action="{{ asset(route('vendor.password.check')) }}">
                        @csrf
                        <div class="mb-3">
                            <div class="row align-items-end checkpassword">
                                <label for="" class="form-label">Old Password <span class="text-danger">*</span></label>
                                <div class="col input-group">
                                    <input type="password" class="form-control" id="oldpassword" name="oldpassword" value="{{old('oldpassword')}}">
                                    <div class="input-group-prepend">
                                        <div id="alert_sms" class="input-group-text">@</div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button type="submit" id="check_btn" class="btn btn-primary">Check</button>
                                </div>
                            </div>
                            <p class="small" id="error_alert"></p>
                        </div>
                    </form>
                    <form method="POST" id="change_password_form">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">New Password<span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}">
                            <p class="small" id="error_password"></p>
                        </div>
                        <div class="mb-3 changepassword">
                            <label for="" class="form-label">confirm Password<span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="cpassword" name="cpassword" value="{{old('cpassword')}}">
                            <p class="small" id="error_confirm_password"></p>
                        </div>
                    </div>
                    <div class="bg-light text-end pt-4 px-4" id="submit_btn">
                        <input type="hidden" name="old" id="old">
                        <button type="submit" id="change_password_btn" class="btn btn-sm btn btn-primary display">Change Password</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sale & Revenue End -->

@endsection
@section('script')
<script>
    $(window).on("load", function () {
            var name = $('#name').val().length;
            var hname = $('#hname').val().length;
            var email = $('#email').val().length;
            var mobile = $('#mobile').val().length;
            var address = $('#address').val().length;
            var state = $('#state').val().length;
            var pincode = $('#pincode').val().length;
            if(name==0){
                $("#name").addClass('danger-bg');
            }
            if(hname===0){
                $("#hname").addClass('danger-bg');
            }
            if(email==0){
                $("#email").addClass('danger-bg');
            }
            if(mobile==0){
                $("#mobile").addClass('danger-bg');
            }
            if(address==0){
                $("#address").addClass('danger-bg');
            }
            if(pincode==0){
                $("#pincode").addClass('danger-bg');
            }
            if(state==0){
                $("#state").addClass('danger-bg');
            }
        });
    // });
    $('#check_password_form').on('submit', function(e) {
		e.preventDefault();
        var data = $(this).serialize();
        // validation
		var field = $(this).serializeArray();
        if(!field[1].value){
            $('#error_alert').html('<span style="color: red;">Please Enter Old Password</span>');
        }else{
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: data,
                success: function(result) {
                    if (result.status == 200) {
                        $('#error_alert').html("<span style='color: green;'>"+result.message+"</span>");
                        // $("#error_alert").fadeOut(5000);
                        $(".input-group-prepend div").addClass('alert_sms');
                        $(".input-group-prepend div").removeClass('alert_sms_danger');
                        $(".checkpassword input").addClass('success-bg');
                        $(".checkpassword input").removeClass('danger-bg');
                        $('#alert_sms').html('<span style="color: green;">✔</span>');
                        $("#submit_btn button").removeClass('display');
                        $("#old").val(result.data);
                        $(".checkpassword input").attr('disabled', 'disabled');
                    } else if(result.status == 400) {
                        $('#error_alert').html("<span style='color: red;'>"+result.message+"</span>");
                        // $("#error_alert").fadeOut(5000);
                        $(".input-group-prepend div").addClass('alert_sms_danger');
                        $(".input-group-prepend div").removeClass('alert_sms');
                        $(".checkpassword input").addClass('danger-bg');
                        $(".checkpassword input").removeClass('success-bg');
                        $('#alert_sms').html('<span style="color: red;">X</span>');
                        $("#submit_btn button").addClass('display');
                    }
                },
            });
        }
    });

    // Change Password
        $("#change_password_form").on("submit", function(e){
            e.preventDefault();
            var data = $(this).serialize();
            // validation
            var field = $(this).serializeArray();
            console.log(field)
            if(!field[1].value){
                $('#error_password').html('<span style="color: red;">Please Enter Password !</span>');
            }else if(!field[2].value){
                $('#error_confirm_password').html('<span style="color: red;">Please Enter Confirm Password !</span>');
            }else{
                $.ajax({
                    url: "{{route('vendor.password.change')}}",
                    method: $(this).attr('method'),
                    data: data,
                    success: function(result) {
                        if (result.status == 200) {
                            $('#error_confirm_password').html("<span style='color: green;'>"+result.message+"</span>");
                            $("#error_alert span").addClass('d-none');
                            $(".checkpassword input").removeClass('success-bg');
                            $(".changepassword input").removeClass('danger-bg');
                            $(".changepassword input").addClass('success-bg');
                            setTimeout(function() {
                                $('#check_password_form')[0].reset();
                                $('#change_password_form')[0].reset();
                                $('#error_confirm_password span').addClass('d-none');
                                $(".changepassword input").removeClass('success-bg');
                                $(".checkpassword input").attr('disabled', false);
                                $('#alert_sms span').html('<span style="color:#4b4b4b;">@</span>');
                            }, 4000);
                           
                        } else if(result.status == 400) {
                            $('#error_confirm_password').html("<span style='color: red;'>"+result.message+"</span>");
                            $(".changepassword input").addClass('danger-bg');
                            $(".changepassword input").removeClass('success-bg');
                        }
                    },
                });
            }
        });
</script>
@endsection
