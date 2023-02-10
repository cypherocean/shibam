@extends('front.layout.app')

@section('meta')
@endsection

@section('title')
Home
@endsection

@section('styles')
@endsection

@section('content')
<main id="main">

  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container">

      <div class="row justify-content-center">
        <div class="col-lg-11">
          <div class="row justify-content-center">

            <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
              <div class="count-box py-5">
                <i class="bi bi-emoji-smile"></i>
                <span data-purecounter-start="0" data-purecounter-end="65" class="purecounter">0</span>
                <p>Happy Customers</p>
              </div>
            </div>

            <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
              <div class="count-box py-5">
                <i class="bi bi-journal-richtext"></i>
                <span data-purecounter-start="0" data-purecounter-end="85" class="purecounter">0</span>
                <p>Producsts Sold</p>
              </div>
            </div>

            <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
              <div class="count-box pb-5 pt-0 pt-lg-5">
                <i class="bi bi-clock"></i>
                <span data-purecounter-start="0" data-purecounter-end="27" class="purecounter">0</span>
                <p>Appliances Repaired</p>
              </div>
            </div>


          </div>
        </div>
      </div>

      <div class="row">

        <div class="col-lg-6 video-box align-self-baseline position-relative">
          <img src="{{ asset('assets/img/machine.png') }}" class="img-fluid" alt="">
        </div>

        <div class="col-lg-6 pt-3 pt-lg-0 content">
          <h3>Shibam Electronincs is a reputed store for more than 10 Years</h3>
          <p class="fst-italic">
            From seelling electronic products to repairs we have got you covered..
          </p>
          <ul>
            <li><i class="bx bx-check-double"></i> Positive and helpful customer support.</li>
            <li><i class="bx bx-check-double"></i> Trusted for appliance repair.</li>
            <li><i class="bx bx-check-double"></i> Get the latest products in the market.</li>
            <li><i class="bx bx-check-double"></i> Flexible payment options and easy loans.</li>
            <li><i class="bx bx-check-double"></i> Fast and Easy repairs</li>
          </ul>

        </div>

      </div>

    </div>
  </section><!-- End About Section -->

  <!-- ======= Cta Section ======= -->
  <section id="cta" class="cta">
    <div class="container" data-aos="fade-in">

      <div class="text-center">
        <h3>Call To Book a Service</h3>
        <p> If you are having troubles with your electronic appliances feel free to give us a call.</p>
        <a class="cta-btn" href="#">Call Us</a>
      </div>

    </div>
  </section><!-- End Cta Section -->

  <!-- ======= Services Section ======= -->
  <section id="services" class="services ">
    <div class="container">

      <div class="section-title pt-5" data-aos="fade-up">
        <h2>Browse our products</h2>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="icon-box" data-aos="fade-up">
            <div class="icon"><i class="bi bi-briefcase" style="color: #ff689b;"></i></div>
            <h4 class="title"><a href="">Refrigerator</a></h4>
            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="icon-box" data-aos="fade-up">
            <div class="icon"><i class="bi bi-book" style="color: #e9bf06;"></i></div>
            <h4 class="title"><a href="">TV</a></h4>
            <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
          </div>
        </div>

        <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="icon-box">
            <div class="icon"><i class="bi bi-card-checklist" style="color: #3fcdc7;"></i></div>
            <h4 class="title"><a href="">Air Conditioner</a></h4>
            <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
          </div>
        </div>
        <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="icon-box">
            <div class="icon"><i class="bi bi-binoculars" style="color:#41cf2e;"></i></div>
            <h4 class="title"><a href="">Washing Machine</a></h4>
            <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
          </div>
        </div>

        <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="icon-box">
            <div class="icon"><i class="bi bi-globe" style="color: #d6ff22;"></i></div>
            <h4 class="title"><a href="">Sound Systems</a></h4>
            <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
          </div>
        </div>
        <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="icon-box">
            <div class="icon"><i class="bi bi-clock" style="color: #4680ff;"></i></div>
            <h4 class="title"><a href="">Water Filters</a></h4>
            <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
          </div>
        </div>
        <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="icon-box">
            <div class="icon"><i class="bi bi-globe" style="color: #d6ff22;"></i></div>
            <h4 class="title"><a href="">Ghar Ghanti</a></h4>
            <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
          </div>
        </div>
        <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="icon-box">
            <div class="icon"><i class="bi bi-clock" style="color: #4680ff;"></i></div>
            <h4 class="title"><a href="">Air Coolers</a></h4>
            <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
          </div>
        </div>
      </div>

    </div>
  </section><!-- End Services Section -->

</main><!-- End #main -->
@endsection

@section('scripts')
@endsection