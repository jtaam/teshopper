<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Http\Requests;
use Session;
session_start();

class ProductController extends Controller
{
    public function index(){
        $all_product_info = DB::table('tbl_products')
            ->join('tbl_category', 'tbl_products.category_id','=','tbl_category.category_id')
            ->join('tbl_brand','tbl_products.brand_id','=','tbl_brand.brand_id')
            ->get();
//            echo "<pre>";
//                print_r($all_product_info);
//            echo "</pre>";
//            exit();
        $manage_product = view('admin.all_product')
            ->with('all_product_info', $all_product_info);
        return view('admin_layout')
            ->with('admin.all_product', $manage_product);
    }

    public function create(){
        return view('admin.add_product');
    }

    public function save(Request $request){
        $data = array();
        $data['product_name']=$request->product_name;
        $data['category_id']=$request->category_id;
        $data['brand_id']=$request->brand_id;
        $data['product_short_description']=$request->product_short_description;
        $data['product_long_description']=$request->product_long_description;
        $data['product_price']=$request->product_price;
        $data['product_size']=$request->product_size;
        $data['product_color']=$request->product_color;
        $data['product_status']=$request->product_status;
        $image=$request->file('product_image');
        if ($image) {
            $image_name=str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='images/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['product_image']=$image_url;
                DB::table('tbl_products')->insert($data);
                Session::put('message','<p class="alert alert-success">Product added successfully!!</p>');
                return Redirect::to('/add-product');
                // echo "<pre>";
                // print_r($data);
                // echo "</pre>";
                // exit();

            }
        }
        $data['product_image']='';
        DB::table('tbl_products')->insert($data);
        Session::put('message','product added successfully without image!!');
        return Redirect::to('/add-product');

    }

    public function unpublish($product_id){
        DB::table('tbl_products')
            ->where('product_id', $product_id)
            ->update(['product_status' => 0]);
        Session::put('message','<p class="alert alert-success">Product unpublished!</p>');
        return Redirect::to('all-product');
    }

    public function publish($product_id){
        DB::table('tbl_products')
            ->where('product_id', $product_id)
            ->update(['product_status' => 1]);
        Session::put('message','<p class="alert alert-success">Product published!</p>');
        return Redirect::to('all-product');
    }

    public function edit($product_id){
        $the_product_info = DB::table('tbl_products')
            ->where('product_id',$product_id)
            ->first();
        $product_info = view('admin.edit_product')
            ->with('the_product_info', $the_product_info);
        return view('admin_layout')
            ->with('admin.edit_product', $product_info);
    }

    public function update(Request $request, $product_id){
        $data = array();
        $data['product_name'] = $request->product_name;


        DB::table('tbl_products')
            ->where('product_id', $product_id)
            ->update($data);
        Session::put('message','<p class="alert alert-success">Product updated!</p>');
        return Redirect::to('all-product');
    }

    public function delete($product_id){
        DB::table('tbl_products')
            ->where('product_id', $product_id)
            ->delete();
        Session::put('message','<p class="alert alert-success">Product deleted!</p>');
        return Redirect::to('all-product');
    }
}
