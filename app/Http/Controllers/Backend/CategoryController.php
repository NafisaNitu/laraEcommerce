<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Image;
use File;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::orderBy('id','desc')->get();
        return view('backend.pages.categories.index',compact('categories'));
    }

    public function create(){
        $categories = Category::orderBy('id','desc')->where('parent_id', NULL)->get();
        return view('backend.pages.categories.create',compact('categories'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image',
        ],
        [
            'name.required' => 'Please provide a category name',
            'image.image' => 'Please provide a valid image with .jpg, .png, .gif, .jpeg extension'
        ]
    );
        
        if($request->hasFile('image')){
            $image = $request->file('image');
            $img = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('assets/images/categories/'.$img);
            Image::make($image)->save($location);


            $category = new Category();
            $category->name = $request->name;
            $category->description = $request->description;
            $category->parent_id = $request->parent_id;
            $category->image = $img;
            $category->save();
        }

        // if(count($request->product_image) > 0){
        //     foreach($request->product_image as $image){

        //        // $image = $request->file('product_image');
        //        $img = time().'.'.$image->getClientOriginalExtension();
        //        $location = public_path('assets/images/products/'.$img);

        //        Image::make($image)->save($location);

        //        $product_image = new ProductImage();
        //        $product_image->product_id = $product->id;
        //        $product_image->image = $img;
        //        $product_image->save();
        //     }
        //  }

        session()->flash('success','Category Added Successfully');
        return redirect()->route('admin.categories');
    }

    public function edit($id){
        $categories = Category::orderBy('id', 'desc')->where('parent_id', NULL)->get();
        $category = Category::find($id);
        return view('backend.pages.categories.edit', compact('categories','category'));
    }
    public function update(Request $request, $id){
        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;

            if(file::exists('assets/images/categories/'.$category->image)){
                file::delete('assets/images/categories/'.$category->image);
            }
        
            $image = $request->file('image');
            $img = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('assets/images/categories/'.$img);
            Image::make($image)->save($location);
            $category->image = $img;
        
        $category->save();
        
        return redirect()->route('admin.categories');
    }

    public function delete($id){
        $category = Category::find($id);

        if(!is_null($category)){
            if($category->parent_id == NULL){
                $sub_categories = Category::orderBy('id','desc')->where('parent_id',$category->id)->get();

                foreach($sub_categories as $sub){
                    if(File::exists('assets/images/categories/'.$sub->image)){
                        File::delete('assets/images/categories/'.$sub->image);
                    }
                    $sub->delete();
                }
            }

        if(File::exists('assets/images/categories/'.$category->image)){
            File::delete('assets/images/categories/'.$category->image);
        }
        $category->delete();
        return redirect()->route('admin.categories');
    }
}
    
}
