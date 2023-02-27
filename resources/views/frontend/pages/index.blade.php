@extends('frontend.layouts.master')


@section('content')

<div class="container margin-top-20">
  <div class="row">
      <div class="col-md-4">
        
        @include('frontend.partials.product-sidebar')

      </div>
      <div class="col-md-8">
          <div class="widget">
              <h3>Feature Products</h3>
              @include('frontend.pages.product.partials.all_product')
          </div>
      </div>
  </div>
      {{-- End Sidebar and content section --}}

</div>

@endsection
