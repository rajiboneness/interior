@extends('vendor.layouts.master')

@section('content')
@php
$user = Auth::guard('vendor')->user();
//    dd($user);
@endphp
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        @if($userData)
        <a href="{{ route('vendor.profile') }}">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ $user->vendor_head }}!</strong> {{ $userData }}
          </div>
        </a>
        @endif
        <div class="row g-4">
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-user fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Staff</p>
                        <h6 class="mb-0">50</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-building fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Vendor</p>
                        <h6 class="mb-0">15</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-area fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Today Revenue</p>
                        <h6 class="mb-0">$1234</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-pie fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Revenue</p>
                        <h6 class="mb-0">$1234</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12 col-md-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Vendor List</h6>
                    <div class="table-responsive">
                        <table class="table" id="vendorTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Head Name</th>
                                    <th scope="col">Mobile</th>
                                    <th scope="col">Address</th>
                                    {{-- <th scope="col">Address</th> --}}
                                    <th scope="col">Status</th>
                                    <th scope="col">Joined</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                    @if ($data)
                                        @foreach($data->vendors as $vkey =>$vdata)
                                        <tr>
                                            <td>{{ $vkey+1 }}</td>
                                            <td><p style="overflow: hidden;text-overflow: ellipsis;margin-bottom: 0;">{{ $vdata->name }}</p>
                                                <div class="row__action">
                                                    <a href="{{ route('admin.vendor.view', $vdata->id) }}">View </a><span>|</span>
                                                    <a href="{{ route('admin.vendor.delete', $vdata->id) }}" class="text-danger"> delete</a>
                                                </div>
                                            </td>
                                            <td>{{ $vdata->vendor_head }}</td>
                                            <td>{{ $vdata->phone }}</td>
                                            <td>{{ $vdata->address }}</td>
                                            {{-- <td>{{ $vdata->address }}</td> --}}
                                            <td> <a href="{{ route('admin.vendor.status', $vdata->id) }}" class="badge {{ $vdata->status==1 ? "success-btn" : "danger-btn"}}">{{ $vdata->status== 1 ?"Active" : "Inactive" }}</a></td>
                                            <td>
                                                {{date('d M Y', strtotime($vdata->created_at))}}
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endif
                                    
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sale & Revenue End -->

    <!-- Widgets End -->
@endsection
@section('script')
@endsection