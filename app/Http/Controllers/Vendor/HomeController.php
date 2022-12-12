<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class HomeController extends Controller
{
    public function register(){
        return view('vendor.auth.register');
    }
    public function RegisterStore(Request $request){
        $request->validate([
            "fname" => "required|string|max:255",
            "lname" => "required|string|max:255",
            "email" => "required|email|string|unique:vendors",
            "password" => "required|string",
            "phone" => "required|integer|unique:vendors"
            // "image" => "required|mimes:jpg,jpeg,png,svg,gif|max:10000000"
        ]);
        $vendor = new Vendor;
        $vendor->vendor_head = $request->fname.' '.$request->lname;
        $vendor->email = $request->email;
        $vendor->phone = $request->phone;
        $vendor->name = "Vendor";
        $vendor->password = \Hash::make($request->password);
        $vendor->save();
        if($vendor){
            return redirect()->route('vendor.login');
        }else{
            return redirect()->route('vendor.register')->withInput($request->all());
        }
    }

    public function loginCheck(Request $request){
       
        $request->validate([
            'email' => 'required | string | email | exists:vendors',
            'password' => 'required | string'
        ]);
       
        $vendorCreds = $request->only('email', 'password');
        if ( Auth::guard('vendor')->attempt($vendorCreds) ) {
            // dd($vendorCreds);
            return redirect()->route('vendor.home');
        } else {
            return redirect()->route('vendor.login')->withInputs($request->all())->with('failure', 'Invalid credentials. Try again');
        }
    }
    public function home()
    {
        $user = Auth::guard('vendor')->user();
        $userData = '';
        if($user->name ==null || $user->vendor_head==null || $user->email==null|| $user->phone==null || $user->image==null || $user->state==null ||$user->pincode==null ||$user->address==null){
            $userData = "please update your account details.";
        }
        $data = (object)[];
        $data->vendors = Vendor::latest('id')->limit(10)->get();
        return view('vendor.home', compact('data', 'userData'));
    }

    public function profile(){
        $user = Auth::guard('vendor')->user();
        return view('vendor.profile', compact('user'));
    }

    public function ProfileStore(Request $request){
        // dd($request->image);
        $id = Auth::guard('vendor')->user()->id;
        $update = Vendor::findOrFail($id);
        $update->name = $request->name;
        $update->vendor_head = $request->hname;
        $update->email = $request->email;
        $update->phone = $request->mobile;
        $update->address =$request->address;
        $update->state = $request->state;
        $update->pincode = $request->pincode;
        $upload_path = "uploads/profile/";
        if(isset($request->image)){
            $image = $request->image;
            $imageName = time().mt_rand().".".$image->getClientOriginalExtension();
            $image->move($upload_path, $imageName);
            $uploadedImage = $imageName;
            $update->image = $upload_path.$uploadedImage;
        }
        $update->save();
        if($update){
            return redirect()->route('vendor.profile');
        }else{
            return redirect()->route('vendor.profile');
        }
    }
    public function passwordCheck(Request $request){
        $oldpass = Auth::guard('vendor')->user()->password;
        $verify = password_verify($request->oldpassword, $oldpass);
        if ($verify) {
            return response()->json(['status' => 200, 'message' => 'Password Verified!', 'data' => $request->oldpassword]);
        } else {
            return response()->json(['status' => 400, 'message' => 'Incorrect Password!']);
        }
    }

    public function passwordChange(Request $request){
        if(strcmp($request->password,$request->cpassword)){
            return response()->json(['status' => 400, 'message' => 'Sorry the Confirm password does not match !']);
        }else{
            $id = Auth::guard('vendor')->user()->id;
            if($request->old){
                $update = Vendor::findOrFail($id);
                $update->password = \Hash::make($request->cpassword);
                $update->save();
                return response()->json(['status' => 200, 'message' => 'updated successfully']);
            }else{
                return response()->json(['status' => 400, 'message' => 'Please verify your existing password !']);
            }
        }
    }

}
