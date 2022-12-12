<?php

namespace App\Interfaces;

interface StaffInterface 
{
    /**
     * This method is to fetch list of all Banners
     */
    public function getallStaff();

    public function CreateStaff(array $createDetails);

    public function getStaffById($Id);
    
    public function UpdateStaff($Id, array $newDetails);

    public function toggleStatus($id);
    
    public function DeleteStaff($id);

}