@extends('frontend.layouts.master')


@section('content')

<div class="container margin-top-20">
  <div class="row">
      <div class="col-md-4">

         @include('frontend.partials.product-sidebar')

      </div>
      <div class="col-md-8">
          <div class="widget">
              <h3>All Products in <span class="badge badge-info">{{ $category->name }} Category</span> </h3>

             @php
                 $products = $category->products()->paginate(9); 
             @endphp

              @if ($products->count() > 0)
              @include('frontend.pages.product.partials.all_product')
              @else
                 <div class="alert alert-warning">
                    No Product has added yet in this category!!
                </div> 
              @endif
              
                
          </div>
      </div>
  </div>
      {{-- End Sidebar and content section --}}

</div>

@endsection
