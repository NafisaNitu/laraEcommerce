<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Image;
use File;

class BrandController extends Controller
{
    public function index(){
        $brands = Brand::orderBy('id','desc')->get();
        return view('backend.pages.brands.index',compact('brands'));
    }

    public function create(){
        return view('backend.pages.brands.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image',
        ],
        [
            'name.required' => 'Please provide a brand name',
            'image.image' => 'Please provide a valid image file: jpg, png, jpeg extension'
        ]
    );

        if($request->hasFile('image')){
            $image = $request->file('image');
            $img = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('assets/images/brands/'.$img);
            Image::make($image)->save($location);

            $brand = new Brand();
            $brand->name = $request->name;
            $brand->description = $request->description;
            $brand->image = $img;
            $brand->save();
        }

        Session::flash('message', 'Brand Added Successfully...');
        return redirect()->route('admin.brands');

    }

    public function edit($id){
        $brand = Brand::find($id);
        return view('backend.pages.brands.edit',compact('brand'));

    }

    public function update(Request $request, $id){
        $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->description = $request->description;

        if(File::exists('assets/images/brands/'.$brand->image)){
            File::delete('assets/images/brands/'.$brand->image);
        }
        $image = $request->file('image');
        $img = time().'.'.$image->getClientOriginalExtension();
        $location = public_path('assets/images/brands/'.$img);
        Image::make($image)->save($location);
        $brand->image = $img;
        $brand->save();

        Session::flash('message', 'Brand Added Successfully...');
        return redirect()->route('admin.brands');
    }

    public function delete($id){
        $brand = Brand::find($id);
        if(!is_null($brand)){
            if(File::exists('assets/images/brands/'.$brand->image)){
                File::delete('assets/images/brands/'.$brand->image);
            }
            $brand->delete();
            return redirect()->route('admin.brands');
        }
    }
}
