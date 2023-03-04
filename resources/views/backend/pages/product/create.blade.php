@extends('backend.layouts.master')
@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <div class="card-title">Create Product</div>
            <div class="card-text">
                <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  @include('backend.partials.message')
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" name="title" class="form-control" id="title"  placeholder="Title">
                    </div>
                    <div class="form-group">
                      <label for="text">Description</label>
                      <textarea name="description" id="" cols="30" class="form-control" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="title">Price</label>
                        <input type="number" name="price" class="form-control" id="price"  placeholder="Price">
                      </div>
                      <div class="form-group">
                        <label for="title">Quantity</label>
                        <input type="number" name="quantity" class="form-control" id="quantity"  placeholder="Quantity">
                      </div>
                      <div class="form-group">
                        <select name="category_id" id="" class="form-control">
                          <option value="">Select Category for the Product</option>
                            @foreach (App\Models\Category::orderBy('name','desc')->where('parent_id',NULL)->get() as $parent)
                            <option value="{{ $parent->id }}">{{ $parent->name }}</option>

                            @foreach (App\Models\Category::orderBy('name','asc')->where('parent_id',$parent->id)->get() as $child)
                                <option value="{{ $child->id }}">------->{{ $child->name }}</option>
                            @endforeach
                            @endforeach
                        </select>
                      </div> 
                
                      <div class="form-group">
                        <select name="brand_id" id="" class="form-control">
                          <option value="">Select Brand for the Product</option>
                            @foreach (App\Models\Brand::orderBy('name','desc')->get() as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                      </div>  

                      <label for="product_image">Image</label>
                      <div class="row">
                          <div class="col-md-4">
                            <input type="file" name="product_image[]" class="form-control" id="product_image">
                          </div>
                          <div class="col-md-4">
                            <input type="file" name="product_image[]" class="form-control" id="product_image">
                          </div>
                          <div class="col-md-4">
                            <input type="file" name="product_image[]" class="form-control" id="product_image">
                          </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Product</button>
                  </form>
            </div>
        </div>
    </div>
  </div>
  <!-- content-wrapper ends -->
  <!-- partial:partials/_footer.html -->
  <footer class="footer">
    <div class="container-fluid clearfix">
      <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018 <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
    </div>
  </footer>
  <!-- partial -->
</div>
<!-- main-panel ends -->

@endsection