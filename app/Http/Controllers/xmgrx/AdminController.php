<?php

namespace App\Http\Controllers\xmgrx;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    protected $categoryImageDestination;  // for file upload and file_exists()
    protected $categoryImageUrl; // for image src in blades

    protected $brandLogoDestination;
    protected $brandLogoUrl;

    protected $optValImageDestination;
    protected $optValImageUrl;

    public function __construct()
    {
        $this->categoryImageDestination = base_path() . '/resources/user_files/category_images/';
        $this->categoryImageUrl = '/resources/user_files/category_images/';

        $this->brandLogoDestination = base_path() . '/resources/user_files/brand_images/';
        $this->brandLogoUrl = '/resources/user_files/brand_images/';

        $this->optValImageDestination = base_path() . '/resources/user_files/opt_val_images/';
        $this->optValImageUrl = '/resources/user_files/opt_val_images/';
    }
}
