<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoriesController extends Controller
{

    public function index()
    {
        //
    }

 
    public function show($id)
    {
        $category = Category::find($id);
        if(!is_null($category)){
            return view('frontend.pages.categories.show',compact('category'));
        } else {
            Session::flash('errors', 'Sorry!! There is no Category');
            return redirect('/');
        }
    }

   
  
}
