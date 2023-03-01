@extends('frontend.layouts.master')

@section('title')
      {{ $product->title }} | Laravel Ecommerce Site
@endsection

@section('content')

<div class="container margin-top-20">
  <div class="row">
      <div class="col-md-4">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                @php
                    $i = 1;
                @endphp
                @foreach ($product->images as $image)
                <div class="product-item carousel-item {{ $i==1 ? 'active': '' }}">
                    <img src="{{ asset('assets/images/products/'.$image->image) }}" class="d-block w-100" alt="...">
                  </div>
                @endforeach
                  @php
                      $i++;
                  @endphp
              
            </div>
        
            <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </button>
            
          </div>

      </div>
      <div class="col-md-8">
          <div class="widget">
              <h3>{{ $product->title }}</h3>
              <h3>{{ $product->price }} Taka <span class="badge badge-primary">
                {{ $product->quantity < 1 ? 'No Item is Available' : $product->quantity. ' Item in stack' }}
              </span>
            </h3>
              <hr>

              <div class="product-description">
                {{ $product->description }}
              </div>

          </div>
      </div>
  </div>
      {{-- End Sidebar and content section --}}

</div>

@endsection
