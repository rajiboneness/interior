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
                    <h6 class="mb-4">Staff List</h6>
                    <div class="table-responsive">
                        <table class="table" id="vendorTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Mobile</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Joined</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                    @if ($data)
                                        @foreach($data as $key =>$value)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td><p style="overflow: hidden;text-overflow: ellipsis;margin-bottom: 0;">{{ $value->name }}</p>
                                                <div class="row__action">
                                                    <a href="{{ route('admin.staff.view', $value->id) }}">View </a><span>|</span>
                                                    <a href="{{ route('admin.staff.delete', $value->id) }}" class="text-danger"> delete</a>
                                                </div>
                                            </td>
                                            <td>{{ $value->phone }}</td>
                                            <td>{{ $value->address }}</td>
                                            <td> <a href="{{ route('admin.staff.status', $value->id) }}" class="badge {{ $value->status==1 ? "success-btn" : "danger-btn"}}">{{ $value->status== 1 ?"Active" : "Inactive" }}</a></td>
                                            <td>
                                                {{date('d M Y', strtotime($value->created_at))}}
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endif
                                    
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <form method="POST" action="{{ asset(route('admin.staff.store')) }}">
                    @csrf
                    <div class="bg-light rounded h-100 p-4">
                        <div class="mb-3">
                            <label for="" class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                            @error('name') <p class="small text-danger">{{ $message }}</p> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email<span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
                            @error('email') <p class="small text-danger">{{ $message }}</p> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Mobile<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="mobile" name="mobile" value="{{old('mobile')}}">
                            @error('mobile') <p class="small text-danger">{{ $message }}</p> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Address<span class="text-danger">*</span></label>
                            {{-- <input type="text" class="form-control" id="address" name="address" value="{{old('address')}}"> --}}
                            <textarea name="address" class="form-control" id="address" cols="30" rows="3">{{old('address')}}</textarea>
                            @error('address') <p class="small text-danger">{{ $message }}</p> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">State<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="state" name="state" value="{{old('state')}}">
                            @error('state') <p class="small text-danger">{{ $message }}</p> @enderror
                        </div>
                        {{-- <div class="mb-3">
                            <label for="" class="form-label">Address</label>
                            <input type="text" class="form-control" id="country" name="country">
                        </div> --}}
                        <div class="mb-3">
                            <label for="" class="form-label">Pincode<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="pincode" name="pincode" value="{{old('pincode')}}">
                            @error('pincode') <p class="small text-danger">{{ $message }}</p> @enderror
                        </div>
                        {{-- <div class="row p-2">
                            <div class="col-md-12 card">
                                <div class="card-header p-0 mb-3">Image <span class="text-danger">*</span></div>
                                <div class="card-body p-0">
                                    <div class="w-100 product__thumb">
                                        <label for="thumbnail"><img id="output" src="{{ asset('admin/img/placeholder-image.jpg') }}" /></label>
                                    </div>
                                    <input type="file" name="image" id="thumbnail" accept="image/*" onchange="loadFile(event)" class="d-none">
                                    <script>
                                        var loadFile = function(event) {
                                            var output = document.getElementById('output');
                                            output.src = URL.createObjectURL(event.target.files[0]);
                                            output.onload = function() {
                                                URL.revokeObjectURL(output.src) // free memory
                                            }
                                        };
                                    </script>
                                </div>
                                @error('image') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div> --}}
                    </div>
                    <div class="bg-light pt-4 px-4">
                        <button type="submit" class="btn btn-sm btn btn-primary">Add Staff</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    $(document).ready( function () {
    $('#vendorTable').DataTable();
} );
</script>
@endsection