<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryConntroller extends Controller
{
    public function index(){
        return view('admin.add_category');
    }
}
