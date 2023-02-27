<div class="row">

    @foreach ($products as $product)
      <div class="col-md-3">
          <div class="card">

            @php
                $i = 1;
            @endphp

           @foreach ($product->images as $images)
              
                @if ($i > 0)
                    <a href="{{ route('products.show',$product->slug) }}"><img class="card-img-top feature-img" src="{{ asset('assets/images/products/'.$images->image) }}" alt="Card image"></a>
                @endif

                @php
                    $i--;
                @endphp
               
           @endforeach
              <div class="card-body">
                <a href="{{ route('products.show',$product->slug) }}"><h4 class="card-title">{{ $product->title }}</h4></a>
                <p class="card-text">Taka - {{ $product->price }}</p>
                <a href="#" class="btn btn-outline-warning">Add to cart</a>
              </div>
            </div>
      </div>
 
      @endforeach  
  </div>

  <div class="pagination mt-5">
    {{ $products->links()}}
  </div>
  {{-- {{ $products->appends(request()->input())->links() }} --}}

    {{-- {!! $products->withQueryString()->links('pagination::bootstrap-4') !!} --}}
  

    
