<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use Illuminate\Support\Facades\Session;

class AdminProductController extends Controller
{
   
    public function index(){
      $products = Product::orderby('id','desc')->get();
      return view('backend.pages.product.index')->with('products', $products);
    }

    public function create(){
        return view('backend.pages.product.create');
     }

     public function store(Request $request){


         $request->validate([
            'title'  => 'required|max:150',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'category_id' => 'required|numeric',
            'brand_id' => 'required|numeric'
         ]);


         $product = new Product();
         $product->title = $request->title;
         $product->description  = $request->description;
         $product->price = $request->price;
         $product->quantity = $request->quantity;

         $product->slug = Str::slug($request->title);
         $product->category_id = $request->category_id;
         $product->brand_id = $request->brand_id;
         $product->admin_id = 1;
         $product->save();

         // ProductImage model insert image

         if(count($request->product_image) > 0){
            foreach($request->product_image as $image){

               // $image = $request->file('product_image');
               $img = time().'.'.$image->getClientOriginalExtension();
               $location = public_path('assets/images/products/'.$img);

               Image::make($image)->save($location);

               $product_image = new ProductImage();
               $product_image->product_id = $product->id;
               $product_image->image = $img;
               $product_image->save();
            }
         }



         // if($request->hasFile('product_image')){
         //    // insert that image
         //    $images = $request->file('product_image');
         //    $img = time().'.'.$images->getClientOriginalExtension();
         //    $location = public_path('assets/images/products/'.$img);

         //    Image::make($images)->save($location);

         //    $product_image = new ProductImage();
         //    $product_image->product_id = $product->id;
         //    $product_image->image = $img;
         //    $product_image->save();
         // }

         return redirect()->route('admin.product.create');

     }

     public function edit($id){

      $product = Product::find($id);
      return view('backend.pages.product.edit')->with('product',$product);
     }

     public function update(Request $request, $id){
      
      $request->validate([
         'title'  => 'required|max:150',
         'description' => 'required',
         'price' => 'required|numeric',
         'quantity' => 'required|numeric',
         'category_id' => 'required|numeric',
         'brand_id' => 'required|numeric',
      ]);


      $product = Product::find($id);

      $product->title = $request->title;
      $product->description  = $request->description;
      $product->price = $request->price;
      $product->quantity = $request->quantity;

      $product->save();

      return redirect()->route('admin.products');
     }

     public function delete($id){
         $product = Product::find($id);
         if(!is_null($product)){
            $product->delete();
         }

         Session::flash('message','Product has Deleted Successfully');

         return redirect()->back();
         // return redirect()->back()->with('message','Product has Deleted Successfully');
     }


}
