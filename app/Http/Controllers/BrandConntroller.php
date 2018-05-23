<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Http\Requests;
use Session;
session_start();
class BrandConntroller extends Controller
{
    public function index(){
        $this->AdminAuthCheck();
        $all_brand_info = DB::table('tbl_brand')->get();
        $manage_brand = view('admin.all_brand')
            ->with('all_brand_info', $all_brand_info);
        return view('admin_layout')
            ->with('admin.all_brand', $manage_brand);
    }

    public function create(){
        $this->AdminAuthCheck();
        return view('admin.add_brand');
    }

    public function save(Request $request){
        $this->AdminAuthCheck();
        $data = array();
        $data['brand_id'] = $request->brand_id;
        $data['brand_name'] = $request->brand_name;
        $data['brand_description'] = $request->brand_description;
        $data['created_at'] = $request->created_at;
        $data['updated_at'] = $request->updated_at;
        $data['brand_status'] = $request->brand_status;
        DB::table('tbl_brand')->insert($data);
        Session::put('message','<div class="alert alert-success">brand added!</div>');
        return Redirect::to('/add-brand');
    }

    public function unpublish($brand_id){
        $this->AdminAuthCheck();
        DB::table('tbl_brand')
            ->where('brand_id', $brand_id)
            ->update(['brand_status' => 0]);
        Session::put('message','<p class="alert alert-success">brand unpublished!</p>');
        return Redirect::to('all-brand');
    }

    public function publish($brand_id){
        $this->AdminAuthCheck();
        DB::table('tbl_brand')
            ->where('brand_id', $brand_id)
            ->update(['brand_status' => 1]);
        Session::put('message','<p class="alert alert-success">brand published!</p>');
        return Redirect::to('all-brand');
    }

    public function edit($brand_id){
        $this->AdminAuthCheck();
        $the_brand_info = DB::table('tbl_brand')
            ->where('brand_id',$brand_id)
            ->first();
        $brand_info = view('admin.edit_brand')
            ->with('the_brand_info', $the_brand_info);
        return view('admin_layout')
            ->with('admin.edit_brand', $brand_info);
    }

    public function update(Request $request, $brand_id){
        $this->AdminAuthCheck();
        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['brand_description'] = $request->brand_description;

        DB::table('tbl_brand')
            ->where('brand_id', $brand_id)
            ->update($data);
        Session::put('message','<p class="alert alert-success">brand updated!</p>');
        return Redirect::to('all-brand');
    }

    public function delete($brand_id){
        $this->AdminAuthCheck();
        DB::table('tbl_brand')
            ->where('brand_id', $brand_id)
            ->delete();
        Session::put('message','<p class="alert alert-success">brand deleted!</p>');
        return Redirect::to('all-brand');
    }

    public function AdminAuthCheck(){
        $admin_id = Session::get('admin_id');
        if ($admin_id){
            return; // stay in same page
        }else{
            return Redirect::to('/admin')->send();
        }
    }
}
