<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">LaraEcommerce</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('index') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('products') }}">Product</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('contact') }}">Contact</a>
              </li>
              <li class="nav-item">
                <form class="form-inline my-2 my-lg-0" action="{{ route('search') }}" method="get">
                  <div class="input-group">
                      <input type="text" class="form-control" name="search" placeholder="Search products" aria-label="Recipient's username" aria-describedby="basic-addon2">
                      <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button"><i class="fa-solid fa-magnifying-glass"></i></button>
                      </div>
                    </div>
                </form>
              </li>
            {{-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li> --}}
            {{-- <li class="nav-item">
              <a class="nav-link disabled" href="#">Disabled</a>
            </li> --}}
          </ul>
          <div>
            @if (Route::has('login'))
            <ul class="navbar-nav ml-auto">
              @auth
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                </li>
              @else

                <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">Log in</a>
                </li>
              @if (Route::has('register'))
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
              @endif
              @endauth
            </ul>
          @endif
        </div>
        </div>
    </div>
</nav>