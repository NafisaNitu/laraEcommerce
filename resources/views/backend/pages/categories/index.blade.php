@extends('backend.layouts.master')
@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <div class="card-title">Manage Category</div>
            <div class="card-text">
                <table class="table table-hover">
                    <tr>
                        <th>#</th>
                        <th>Category Name</th>
                        <th>Parent Name</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                @if ($category->parent_id == NULL)
                                    Primary Category
                                @else
                                    {{ $category->parent->name }}                                    
                                @endif
                            </td>
                            <td>
                              <img src="{{ asset('assets/images/categories/'.$category->image) }}" width="80" height="50" alt="">
                            </td>
                            <td>
                              <a href="{{ route('admin.category.edit',$category->id) }}" class="btn btn-info">Edit</a>
                              <a href="#deleteModal{{ $category->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>

                                <div class="modal fade" id="deleteModal{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Are you sure to Delete?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <form action="{{ route('admin.category.delete',$category->id) }}" method="post">
                                          @csrf
                                          <button type="submit" class="btn btn-danger">Parmanent Delete</button>
                                        </form>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
                 
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