<?php

namespace App\Repositories;

use App\Interfaces\VendorInterface;
use App\Models\Vendor;
// use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;

class VendorRepository implements VendorInterface 
{
    // use UploadAble;

    public function getAllVendors() 
    {
        return Vendor::latest('id')->get();
    }
    
    public function CreateVendor(array $vendorDetails){

        // $upload_path = "uploads/blog/";

        $collection = collect($vendorDetails);
        $vendor = new Vendor;
        $vendor->name = $collection['name'];
        $vendor->vendor_head = $collection['hname'];
        $vendor->email = $collection['email'];
        $vendor->phone = $collection['mobile'];
        $vendor->state = $collection['state'];
        // $vendor->country = $collection['country'];
        $vendor->pincode = $collection['pincode'];
        $vendor->address = $collection['address'];

        // Blog Image
        // if (isset($vendorDetails['image'])) {
        //     $image = $collection['image'];
        //     $imageName = time().mt_rand().".".$image->getClientOriginalExtension();
        //     $image->move($upload_path, $imageName);
        //     $uploadedImage = $imageName;
        //     $blog->image = $upload_path.$uploadedImage;
        // }
        $vendor->save();
        return $vendor;
    }

    public function getVendorById($VendorId){
        return Vendor::findOrFail($VendorId);
    }

    public function UpdateVendor($vendorId, array $newDetails){

        $update = Vendor::findOrFail($vendorId);
        $collection = collect($newDetails); 

        $update->name = $collection['name'];
        $update->vendor_head = $collection['hname'];
        $update->email = $collection['email'];
        $update->phone = $collection['mobile'];
        $update->state = $collection['state'];
        // $update->country = $collection['country'];
        $update->pincode = $collection['pincode'];
        $update->address = $collection['address'];

        // if (isset($newDetails['image'])) {
        //     $image = $collection['image'];
        //     $imageName = time().mt_rand().".".$image->getClientOriginalExtension();
        //     $image->move($upload_path, $imageName);
        //     $uploadedImage = $imageName;
        //     $update->image = $upload_path.$uploadedImage;
        // }
        $update->save();
        return $update;
    }

     public function toggleStatus($id){
         $vendor = Vendor::findOrFail($id);
         $status = ($vendor->status == 1)? 0 : 1;
         $vendor->status = $status;
         $vendor->save();
         return $vendor;
     }

    public function Deletevendor($id){
        $vendor = Vendor::findOrFail($id);
        if($vendor){
            $vendor->delete();
            return $vendor;
        }
    }
}