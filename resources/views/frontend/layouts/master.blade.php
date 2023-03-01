<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    
    @include('frontend.partials.styles')


    <title>
          @yield('title','Laravel Ecommerce Project')
    </title>
  </head>
  <body>
    <div class="wrapper">

       @include('frontend.partials.nav')

    </div>

    
    @yield('content')


    @include('frontend.partials.footer')


    {{-- End Footer section --}}



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   
    @include('frontend.partials.scripts')

  </body>
</html>