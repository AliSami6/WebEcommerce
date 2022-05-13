
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.html"><h2>Sixteen <em>Clothing</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="{{url('/')}}">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="{{url('products')}}">Our Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('about')}}">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('contact')}}">Contact Us</a>
              </li>
              <li class="nav-item">
                @if (Route::has('login'))
                  
                      @auth
                      <li class="nav-item">
                          <a class="nav-link" href="{{url('showcart')}}"><i class="fas fa-shopping-cart"></i> Cart[{{$count}}]</a>
                      </li>
                            <x-app-layout>
   
                            </x-app-layout>
                         
                      @else
                          <li>
                            <a class="nav-link" href="{{ route('login') }}" >Log in</a>
                          </li>

                            @if (Route::has('register'))
                              <li>
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                              </li>
                                
                            @endif
                      @endauth
                  
                @endif
              </li>
                
            </ul>
          </div>
        </div>
      </nav>
      @if(session()->has('message'))
      <div class="col-md-3" style="float:right;">
        <div class="card bg-success">
            <div class="card-header">
              <h3 class="card-title">Success</h3>
              <div class="card-tools">
                {{session()->get('message')}}
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                </button>
              </div>
            </div>
        </div>
      </div>
    @endif
    </header>
