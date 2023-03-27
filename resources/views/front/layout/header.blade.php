<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
  <div class="container d-flex align-items-center justify-content-between">

    <div class="logo">
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="{{ route('home') }}"><img src="{{ asset('assets/img/Shibam%20logo.png') }}" alt="" class="img-fluid"></a>
    </div>

    <nav id="navbar" class="navbar">
      <ul>
        <li><a class="@if(\Request::route()->getName() == '' || \Request::route()->getName() == 'home') active @endif" href="{{ route('home') }}">Home</a></li>
        <li><a class="@if(\Request::route()->getName() == 'products') active @endif" href="{{ route('products') }}">Products</a></li>
        <li><a href="asd.php">Event</a></li>
        <li><a class="@if(\Request::route()->getName() == 'about') active @endif" href="{{ route('about') }}">About Us</a></li>
        <li><a class="@if(\Request::route()->getName() == 'contact') active @endif" href="{{ route('contact') }}">Contact Us</a></li>
        <li><a class="getstarted" href="{{ route('contact') }}">Book a Service</a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

  </div>
</header><!-- End Header -->