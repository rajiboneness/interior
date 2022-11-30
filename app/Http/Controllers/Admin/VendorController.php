<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\VendorInterface;
use Illuminate\Http\Request;
use App\Models\Vendor;

class VendorController extends Controller
{
    public function __construct(VendorInterface $VendorRepository){
        $this->VendorRepository = $VendorRepository;
    }
    public function index(){
        $data = $this->VendorRepository->getAllVendors();
        return view('admin.vendor.index', compact('data'));
    }

    public function store(Request $request){
        $request->validate([
            "name" => "required|string|max:255",
            "hname" => "required|string|max:255",
            "email" => "required|email|string|max:255",
            "mobile" => "required|integer",
            "pincode" => "required|integer",
            "address" => "required|string|max:555"
            // "image" => "required|mimes:jpg,jpeg,png,svg,gif|max:10000000"
        ]);
        $params = $request->except('_token');
        $storeData = $this->VendorRepository->CreateVendor($params);
        if($storeData){
            return redirect()->route('admin.vendor.index');
        }else{
            return redirect()->route('admin.vendor.index')->withInput($request->all());
        }
    }

    public function view($id){
        $vendor = $this->VendorRepository->getVendorById($id);
        return view('admin.vendor.details', compact('vendor'));
    }
    public function update(Request $request, $id){
        $request->validate([
            "name" => "required|string|max:255",
            "hname" => "required|string|max:255",
            "email" => "required|email|string|max:255",
            "mobile" => "required|integer",
            "pincode" => "required|integer",
            "address" => "required|string|max:555"
            // "image" => "required|mimes:jpg,jpeg,png,svg,gif|max:10000000"
        ]);
        $params = $request->except('_token');
        $storeData = $this->VendorRepository->UpdateVendor($id, $params);
        if($storeData){
            return redirect()->route('admin.vendor.view', $id);
        }else{
            return redirect()->route('admin.vendor.view', $id)->withInput($request->all());
        }
    }

    public function status(Request $request, $id){
        $data = $this->VendorRepository->toggleStatus($id);
        if($data){
           return redirect()->route('admin.vendor.index');
        }else{
           return redirect()->route('admin.vendor.index')->withInput($request->all());
        }
    }
    public function destroy(Request $request, $id){
        $data = $this->VendorRepository->Deletevendor($id);
        if($data){
           return redirect()->route('admin.vendor.index');
        }else{
           return redirect()->route('admin.vendor.index')->withInput($request->all());
        }
    }
}
