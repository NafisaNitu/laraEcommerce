@extends('backend.layouts.master')
@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <div class="card-title">Edit Product</div>
            <div class="card-text">
                <form action="{{ route('admin.product.update',$product->id) }}" method="post" enctype="multipart/form-data">
                  @csrf
                  {{-- @include('admin.partials.message') --}}
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" name="title" class="form-control" id="title"  value="{{ $product->title }}">
                    </div>
                    <div class="form-group">
                      <label for="text">Description</label>
                      <textarea name="description" id="" cols="30" class="form-control" rows="10">{{ $product->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="title">Price</label>
                        <input type="number" name="price" class="form-control" id="price"  value="{{ $product->price }}">
                      </div>
                      <div class="form-group">
                        <label for="title">Quantity</label>
                        <input type="number" name="quantity" class="form-control" id="quantity"  value="{{ $product->quantity }}">
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
                    <button type="submit" class="btn btn-primary">Update Product</button>
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