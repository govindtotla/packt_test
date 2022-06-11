<?php

namespace App\Http\Controllers\Api;

use App\Helpers\CurlHelper;

class ProductsController
{
	    
    /**
     * index
     *
     * @return void
     */
    function index()
    {
		$url = 'products?page=1';
		$products = CurlHelper::callAPI("GET", $url, []);
		return response()->json(['error' => false, 'data' => $products ]);
	}	
}
