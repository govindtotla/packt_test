<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Helpers\CurlHelper;
use App\Models\Post;
use App\Models\PostImage;

use Auth;
use Storage;

class ProductsController
{
    function index()
    {
		$url = 'products?page=1';
		$products = CurlHelper::callAPI("GET", $url, []);
		return response()->json(['error' => false, 'data' => $products ]);
	}	
}
