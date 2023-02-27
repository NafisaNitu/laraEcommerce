@extends('backend.layouts.master')
@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="card">
        <div class="card-body">
          <h3>Edit Category</h3>
            {{-- @include('backend.partials.message') --}}

            <div class="card-title"></div>
            @if (Session::has('success'))
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  {{ Session::get('success') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
          @endif

          @if ($errors->any())
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <ul>
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </ul>
            </div>
        @endif

            <div class="card-text">
                <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
                  @csrf
                    <div class="form-group">
                      <label for="title">Category Name</label>
                      <input type="text" name="name" class="form-control" id="title"  placeholder="Category Name">
                    </div>
                    <div class="form-group">
                      <label for="text">Description</label>
                      <textarea name="description" id="" cols="30" class="form-control" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <select name="parent_id" id="" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                      <label for="image">Image</label>
                        <input type="file" name="image" class="form-control" id="image">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Category</button>
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