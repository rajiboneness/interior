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
                        <a href="{{ route('admin.vendor.index') }}" class="badge primary-btn"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                    <h6 class="mb-4">Vendor Details</h6>
                    </div>
                    <hr>
                    <h3>{{ $vendor->name }}</h3>
                    <hr>
                    <div class="row pb-4">
                        <div class="col-md-2">Head Name</div>
                        <div class="col-md-10">{{ $vendor->vendor_head }}</div>
                    </div>
                    <div class="row pb-4">
                        <div class="col-md-2">Mobile</div>
                        <div class="col-md-10">{{ $vendor->phone }}</div>
                    </div>
                    <div class="row pb-4">
                        <div class="col-md-2">Email</div>
                        <div class="col-md-10">{{ $vendor->email }}</div>
                    </div>
                    <div class="row pb-4">
                        <div class="col-md-2">Address</div>
                        <div class="col-md-10">{{ $vendor->address }}, {{ $vendor->state }},{{ $vendor->pincode }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <form method="POST" action="{{ asset(route('admin.vendor.update', $vendor->id)) }}">
                    @csrf
                    <div class="bg-light text-end pt-4 px-4">
                        <button type="submit" class="btn btn-sm btn-primary">Edit Vendor</button>
                    </div>
                    <div class="bg-light rounded h-100 p-4">
                        <div class="mb-3">
                            <label for="" class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $vendor->name }}">
                            @error('name') <p class="small text-danger">{{ $message }}</p> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Vendod Head<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="hname" name="hname" value="{{$vendor->vendor_head}}">
                            @error('hname') <p class="small text-danger">{{ $message }}</p> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email<span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" value="{{$vendor->email}}">
                            @error('email') <p class="small text-danger">{{ $message }}</p> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Mobile<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="mobile" name="mobile" value="{{$vendor->phone}}">
                            @error('mobile') <p class="small text-danger">{{ $message }}</p> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Address<span class="text-danger">*</span></label>
                            <textarea class="form-control" id="address" name="address" cols="30" rows="3">{{$vendor->address}}</textarea>
                            @error('address') <p class="small text-danger">{{ $message }}</p> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">State</label>
                            <input type="text" class="form-control" id="state" name="state" value="{{$vendor->state}}">
                            @error('state') <p class="small text-danger">{{ $message }}</p> @enderror
                        </div>
                        {{-- <div class="mb-3">
                            <label for="" class="form-label">Address</label>
                            <input type="text" class="form-control" id="country" name="country">
                        </div> --}}
                        <div class="mb-3">
                            <label for="" class="form-label">Pincode<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="pincode" name="pincode" value="{{$vendor->pincode}}">
                            @error('pincode') <p class="small text-danger">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection