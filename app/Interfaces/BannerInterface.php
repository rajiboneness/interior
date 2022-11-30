<?php

namespace App\Interfaces;

interface BannerInterface 
{
    /**
     * This method is to fetch list of all Banners
     */
    public function getAllBanners();

    public function getBannerById($bannerId);

    public function createBanner(array $bannerDetails);
    
    public function updateBanner($bannerId, array $newDetails);

    public function toggleStatus($id);
    
    public function DeleteBanner($id);

}