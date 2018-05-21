<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Http\Requests;
use Session;
session_start();

class CategoryConntroller extends Controller
{
    public function index(){
        $all_category_info = DB::table('tbl_category')->get();
        $manage_category = view('admin.all_category')
            ->with('all_category_info', $all_category_info);
        return view('admin_layout')
            ->with('admin.all_category', $manage_category);
    }
    public function create(){
        return view('admin.add_category');
    }

    public function save(Request $request){
        $data = array();
        $data['category_id'] = $request->category_id;
        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;
        $data['created_at'] = $request->created_at;
        $data['updated_at'] = $request->updated_at;
        $data['category_status'] = $request->category_status;
        DB::table('tbl_category')->insert($data);
        Session::put('message','<div class="alert alert-success">Category Added!</div>');
        return Redirect::to('/add-category');
    }

    public function unpublish($category_id){
        DB::table('tbl_category')
            ->where('category_id', $category_id)
            ->update(['category_status' => 0]);
        Session::put('message','<p class="alert alert-success">Category Unpublished!</p>');
        return Redirect::to('all-category');
    }

    public function publish($category_id){
        DB::table('tbl_category')
            ->where('category_id', $category_id)
            ->update(['category_status' => 1]);
        Session::put('message','<p class="alert alert-success">Category Published!</p>');
        return Redirect::to('all-category');
    }

    public function edit($category_id){
        $the_category_info = DB::table('tbl_category')
            ->where('category_id',$category_id)
            ->first();
        $category_info = view('admin.edit_category')
            ->with('the_category_info', $the_category_info);
        return view('admin_layout')
            ->with('admin.edit_category', $category_info);
//        return view('admin.edit_category');
    }

    public function update(Request $request, $category_id){
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;

        DB::table('tbl_category')
            ->where('category_id', $category_id)
            ->update($data);
        Session::put('message','<p class="alert alert-success">Category updated</p>');
        return Redirect::to('all-category');
    }
}
