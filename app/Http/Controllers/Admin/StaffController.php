<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\StaffInterface;
use Illuminate\Http\Request;
use App\Models\Staff;

class StaffController extends Controller
{
    public function __construct(StaffInterface $StaffRepository){
        $this->StaffRepository = $StaffRepository;
    }
    public function index(){
        $data = $this->StaffRepository->getallStaff();
        return view('admin.staff.index', compact('data'));
    }
    public function store(Request $request){
        // dd($request->mobile);
    //    dd(strlen($request->mobile));
        $request->validate([
            "name" => "required|string|max:255",
            "email" => "required|email|string|max:255",
            "mobile" => "required|integer",
            "state" => "required|string|max:255",
            "pincode" => "required|integer",
            "address" => "required|string|max:555",
            // "image" => "required|mimes:jpg,jpeg,png,svg,gif|max:10000000"
        ]);
        $params = $request->except('_token');
        $storeData = $this->StaffRepository->CreateStaff($params);
        if($storeData){
            return redirect()->route('admin.staff.index');
        }else{
            return redirect()->route('admin.staff.index')->withInput($request->all());
        }
    }
    public function view($id){
        $staff = $this->StaffRepository->getStaffById($id);
        return view('admin.staff.details', compact('staff'));
    }
    public function update(Request $request, $id){
        $request->validate([
            "name" => "required|string|max:255",
            "email" => "required|email|string|max:255",
            "mobile" => "required|integer",
            "pincode" => "required|integer",
            "state" => "required|string|max:255",
            "address" => "required|string|max:555"
            // "image" => "required|mimes:jpg,jpeg,png,svg,gif|max:10000000"
        ]);
        $params = $request->except('_token');
        $storeData = $this->StaffRepository->UpdateStaff($id, $params);
        if($storeData){
            return redirect()->route('admin.staff.view', $id);
        }else{
            return redirect()->route('admin.staff.view', $id)->withInput($request->all());
        }
    }

    public function status(Request $request, $id){
        $data = $this->StaffRepository->toggleStatus($id);
        if($data){
           return redirect()->route('admin.staff.index');
        }else{
           return redirect()->route('admin.staff.index')->withInput($request->all());
        }
    }
    public function destroy(Request $request, $id){
        $data = $this->StaffRepository->DeleteStaff($id);
        if($data){
           return redirect()->route('admin.staff.index');
        }else{
           return redirect()->route('admin.staff.index')->withInput($request->all());
        }
    }
}
