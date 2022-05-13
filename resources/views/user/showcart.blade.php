<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">
     <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="dist/css/adminlte.min.css">
    
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding:4px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

  </head>

  <body>
 
  
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
                <a class="nav-link" href="index.html">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="products.html">Our Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact Us</a>
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
    <div class="mt-2" style="padding:150px;text-align:center;">
        <div class="justify-content-center table-responsive">
            <div class="col-md-6">
                <table class="table">
                    <tr class="bg-secondary">
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                    <form action="{{url('order')}}" method="POST">
                        @csrf
                        @foreach($cart as $carts)
                            <tr>
                                <td style="width:100%;">
                                
                                    <input type="text" name="productname[]" value="{{$carts->product_title}}" hidden="">
                                    {{$carts->product_title}}
                            
                                </td>
                                <td>
                                    <input type="text" name="quantity[]" value="{{$carts->quantity}}" hidden="">  
                                    {{$carts->quantity}}

                                </td>
                                <td>
                                    <input type="text" name="price[]" value=" {{$carts->price}}" hidden="">
                                    {{$carts->price}}

                                </td>
                                <td>
                                    <!--<a class="btn btn-info" href="#" role="button">Update</a>--->
                                    <a class="btn btn-danger mt-4" href="{{url('delete',$carts->id)}}" role="button">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    
                </table>

                    <button class="btn btn-success bg-success mt-1">Confirm Order</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>




    </div>

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright &copy; Adnan Solution's.
            
            - Design: <a rel="nofollow noopener" href="https://templatemo.com" target="_blank">Adnan Sami</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>
  </body>

</html>
