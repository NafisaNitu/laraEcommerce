<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;


class AdminPagesController extends Controller
{
    public function index(){
       return view('backend.pages.index'); 
    }

}
