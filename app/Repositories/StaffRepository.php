<?php

namespace App\Repositories;

use App\Interfaces\StaffInterface;
use App\Models\Staff;
// use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;

class StaffRepository implements StaffInterface 
{
    // use UploadAble;

    public function getallStaff() 
    {
        return Staff::latest('id')->get();
    }
    
    public function CreateStaff(array $createDetails){

        $upload_path = "uploads/staff/";

        $collection = collect($createDetails);
        $store = new Staff;
        $store->name = $collection['name'];
        $store->email = $collection['email'];
        $store->phone = $collection['mobile'];
        $store->state = $collection['state'];
        // $store->country = $collection['country'];
        $store->pincode = $collection['pincode'];
        $store->address = $collection['address'];

        // Staff Image
        if (isset($createDetails['image'])) {
            $image = $collection['image'];
            $imageName = time().mt_rand().".".$image->getClientOriginalExtension();
            $image->move($upload_path, $imageName);
            $uploadedImage = $imageName;
            $store->image = $upload_path.$uploadedImage;
        }
        // dd($store);
        $store->save();
        return $store;
    }

    public function getStaffById($Id){
        return Staff::findOrFail($Id);
    }

    public function UpdateStaff($Id, array $newDetails){

        $update = Staff::findOrFail($Id);
        $collection = collect($newDetails); 

        $update->name = $collection['name'];
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
         $toggle = Staff::findOrFail($id);
         $status = ($toggle->status == 1)? 0 : 1;
         $toggle->status = $status;
         $toggle->save();
         return $toggle;
     }

    public function DeleteStaff($id){
        $delete = Staff::findOrFail($id);
        if($delete){
            $delete->delete();
            return $delete;
        }
    }
}