<!DOCTYPE html>
<html lang="en">

<head>
  @include('front.layout.meta')

  <title>@yield('title') | Shibam Electronics</title>

  <!-- Favicons -->
  @include('front.layout.styles')
</head>

<body>
  @include('front.layout.header')
 

  @yield('content')

  @include('front.layout.footer')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
@include('front.layout.scripts')

</body>

</html>