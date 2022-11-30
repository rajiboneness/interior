<?php

namespace App\Interfaces;

interface VendorInterface 
{
    /**
     * This method is to fetch list of all Banners
     */
    public function getAllVendors();

    public function getVendorById($VendorId);

    public function CreateVendor(array $vendorDetails);
    
    public function UpdateVendor($vendorId, array $newDetails);

    public function toggleStatus($id);
    
    public function Deletevendor($id);

}