<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\products;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Product extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = DB::table('products')->orderBy('created_at', 'DESC')->get();
        $response = [
          'Status_Request' => true,
          'Message' => 'List All Products',
          'Data' => $product
      ];
      return response()->json($response, Response::HTTP_OK);
    }    
    public function product_grouped_category()
    {
        $product = DB::table('products')->orderBy('p_category_id', 'DESC')->get();
        $response = [
          'Status_Request' => true,
          'Message' => 'List All Products With Category',
          'Data' => $product
      ];
      return response()->json($response, Response::HTTP_OK);
    }    
    public function product_detailed()
    {
        $product = DB::table('products')
        ->select('*')
        ->join('categories','categories.id','=','products.p_category_id')
        ->join('product_details', 'product_details.p_id','=','products.id')
        ->get();
        $response = [
          'Status_Request' => true,
          'Message' => 'List All Products with Details',
          'Data' => $product
      ];
      return response()->json($response, Response::HTTP_OK);
    }
}
