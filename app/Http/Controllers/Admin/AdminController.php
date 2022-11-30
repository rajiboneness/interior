<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Vendor;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function check(Request $request)
    {
        $request->validate([
            'email' => 'required | string | email | exists:admins',
            'password' => 'required | string'
        ]);

        $adminCreds = $request->only('email', 'password');

        if ( Auth::guard('admin')->attempt($adminCreds) ) {
            return redirect()->route('admin.home');
        } else {
            return redirect()->route('admin.login')->withInputs($request->all())->with('failure', 'Invalid credentials. Try again');
        }
    }

    public function home()
    {
        $data = (object)[];
        $data->vendors = Vendor::latest('id')->limit(10)->get();
        // $data->news = News::count();
        // $data->articles = Blog::count();
        // // $data->subcategory = SubCategory::count();
        // $data->author = Author::count();
        // $data->products = Product::latest('id')->get();
        // $data->orders = Order::latest('id')->limit(10)->get();
        return view('admin.home', compact('data'));
    }
}
