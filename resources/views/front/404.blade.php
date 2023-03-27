@extends('front.layout.app')

@section('meta')
@endsection

@section('title')
Error
@endsection

@section('styles')
@endsection

@section('content')
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="breadcrumb-hero">
      <div class="container">
        <div class="breadcrumb-hero">
          <h1>Oops...</h1>
          <p>Looks like you are lost, </p>
        </div>
      </div>
    </div>
    
  </section><!-- End Breadcrumbs -->

  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container">

      <div class="row justify-content-center item-align-center">
        <div class="col-lg-12">
          <div class="row justify-content-center">
              <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
              <lottie-player src="https://assets6.lottiefiles.com/packages/lf20_0hj4Khn1at.json" background="transparent" speed="1" style="width: 300px; height: 300px;" hover loop autoplay></lottie-player>
          </div>
          <div class="row justify-content-center">
              Let's go back to home
              <div class="col-md-12">
                <div class="text-center">
                  <a href="{{ route('home') }}"><button class="btn btn-outline-primary btn-rounded">Home</button></a>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End About Section -->
</main><!-- End #main -->
@endsection

@section('scripts')
@endsection