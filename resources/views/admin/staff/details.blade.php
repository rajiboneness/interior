@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid pt-4 px-4">
        {{-- <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4 text-end">
                
                </div>
            </div>
        </div> --}}
        <div class="row g-4">
            <div class="col-12 col-md-8">
                <div class="bg-light rounded h-100 p-4">
                    <div class="display-flex">
                        <a href="{{ route('admin.staff.index') }}" class="badge primary-btn"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                    <h6 class="mb-4">Staff Details</h6>
                    </div>
                    <hr>
                    <h3>{{ $staff->name }}</h3>
                    <hr>
                    <div class="row pb-4">
                        <div class="col-md-2">Mobile</div>
                        <div class="col-md-10">{{ $staff->phone }}</div>
                    </div>
                    <div class="row pb-4">
                        <div class="col-md-2">Email</div>
                        <div class="col-md-10">{{ $staff->email }}</div>
                    </div>
                    <div class="row pb-4">
                        <div class="col-md-2">Address</div>
                        <div class="col-md-10">{{ $staff->address }}, {{ $staff->state }},{{ $staff->pincode }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <form method="POST" action="{{ asset(route('admin.staff.update', $staff->id)) }}">
                    @csrf
                   
                    <div class="bg-light rounded h-100 p-4">
                        <div class="mb-3">
                            <label for="" class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $staff->name }}">
                            @error('name') <p class="small text-danger">{{ $message }}</p> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email<span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" value="{{$staff->email}}">
                            @error('email') <p class="small text-danger">{{ $message }}</p> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Mobile<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="mobile" name="mobile" value="{{$staff->phone}}">
                            @error('mobile') <p class="small text-danger">{{ $message }}</p> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Address<span class="text-danger">*</span></label>
                            <textarea class="form-control" id="address" name="address" cols="30" rows="3">{{$staff->address}}</textarea>
                            @error('address') <p class="small text-danger">{{ $message }}</p> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">State<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="state" name="state" value="{{$staff->state}}">
                            @error('state') <p class="small text-danger">{{ $message }}</p> @enderror
                        </div>
                        {{-- <div class="mb-3">
                            <label for="" class="form-label">Address</label>
                            <input type="text" class="form-control" id="country" name="country">
                        </div> --}}
                        <div class="mb-3">
                            <label for="" class="form-label">Pincode<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="pincode" name="pincode" value="{{$staff->pincode}}">
                            @error('pincode') <p class="small text-danger">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div class="bg-light text-end pt-4 px-4">
                        <button type="submit" class="btn btn-sm btn-primary">Edit Staff</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection