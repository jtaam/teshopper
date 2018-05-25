<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;


class HomeController extends Controller
{
    public function index()
    {
        $all_published_products = DB::table('tbl_products')
        ->join('tbl_category', 'tbl_products.category_id','=','tbl_category.category_id')
        ->join('tbl_brand','tbl_products.brand_id','=','tbl_brand.brand_id')
        ->where('product_status', 1)
        ->limit(9)
        ->get();
        $manage_published_product = view('pages.home_content')
            ->with('all_published_products', $all_published_products);
        return view('layout')
            ->with('pages.home_content', $manage_published_product);
    }

    public function product_by_category($category_id){
        $product_by_category = DB::table('tbl_products')
            ->join('tbl_category', 'tbl_products.category_id','=','tbl_category.category_id')
            ->join('tbl_brand','tbl_products.brand_id','=','tbl_brand.brand_id')
            ->select('tbl_products.*','tbl_category.category_name','tbl_brand.brand_name')
            ->where('tbl_products.product_status', 1)
            ->where('tbl_category.category_id', $category_id)
            ->limit(18)
            ->get();

        $manage_product_by_category = view('pages.product_by_category')
            ->with('product_by_category', $product_by_category);
        return view('layout')
            ->with('pages.product_by_category', $manage_product_by_category);
    }

    public function product_by_brand($brand_id){
        $product_by_brand = DB::table('tbl_products')
            ->join('tbl_category', 'tbl_products.category_id','=','tbl_category.category_id')
            ->join('tbl_brand','tbl_products.brand_id','=','tbl_brand.brand_id')
            ->select('tbl_products.*','tbl_category.category_name','tbl_brand.brand_name')
            ->where('tbl_products.product_status', 1)
            ->where('tbl_brand.brand_id', $brand_id)
            ->limit(18)
            ->get();

        $manage_product_by_brand = view('pages.product_by_brand')
            ->with('product_by_brand', $product_by_brand);
        return view('layout')
            ->with('pages.product_by_brand', $manage_product_by_brand);
    }

    public function product_by_id($product_id){
        $product_by_id = DB::table('tbl_products')
            ->join('tbl_category', 'tbl_products.category_id','=','tbl_category.category_id')
            ->join('tbl_brand','tbl_products.brand_id','=','tbl_brand.brand_id')
            ->select('tbl_products.*','tbl_category.category_name','tbl_brand.brand_name')
            ->where('tbl_products.product_id', $product_id)
            ->where('product_status', 1)
            ->first();
        $manage_product_id = view('pages.product_details')
            ->with('product_by_id', $product_by_id);
        return view('layout')
            ->with('pages.product_details', $manage_product_id);
    }

}
