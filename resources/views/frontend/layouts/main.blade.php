
@php
  $settings = DB::table('website_settings')->first();
  $banner = DB::table('banner')->where('status','1')->limit(5)->get();
@endphp

@extends('frontend.layouts.app')
@section('containt')
<main id="main">

      <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero">

    <div class="whatrsapp_float">

      <a href="https://wa.me/+8801764130103" target="_blank">
        <img src="{{ asset('frontend/image/whatsapp.png') }}" alt="" width="55px;">
      </a>
    </div>

    <div class="info d-flex align-items-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 text-center">
            <h2 data-aos="fade-down">Welcome to <span>{{ $settings->website_name }}</span></h2>
            <p data-aos="fade-up">Express Engineers BD, was established in the year 2000 to import, installation and maintenance of quality lift and escalator. After enormous success in elevator business "Express engineers bd."  has developed its trading business.

             </p>
            <a data-aos="fade-up" data-aos-delay="200" href="#get-started" class="btn-get-started">Get Started</a>
          </div>
        </div>
      </div>
    </div>

    <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

      @foreach ($banner as $index => $item)
      <div class="carousel-item {{ $index === 0 ? 'active' : '' }}" style="background-image: url({{ asset($item->banner) }})"></div>
      @endforeach

      

      <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
      <!-- ======= Stats Counter Section ======= -->
      <section id="stats-counter" class="stats-counter section-bg">
        <div class="container">
  
          <div class="row gy-4">
  
            <div class="col-lg-3 col-md-6">
              <div class="stats-item d-flex align-items-center w-100 h-100">
                {{-- <svg aria-hidden="true" class="e-font-icon-svg e-fas-power-off" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M400 54.1c63 45 104 118.6 104 201.9 0 136.8-110.8 247.7-247.5 248C120 504.3 8.2 393 8 256.4 7.9 173.1 48.9 99.3 111.8 54.2c11.7-8.3 28-4.8 35 7.7L162.6 90c5.9 10.5 3.1 23.8-6.6 31-41.5 30.8-68 79.6-68 134.9-.1 92.3 74.5 168.1 168 168.1 91.6 0 168.6-74.2 168-169.1-.3-51.8-24.7-101.8-68.1-134-9.7-7.2-12.4-20.5-6.5-30.9l15.8-28.1c7-12.4 23.2-16.1 34.8-7.8zM296 264V24c0-13.3-10.7-24-24-24h-32c-13.3 0-24 10.7-24 24v240c0 13.3 10.7 24 24 24h32c13.3 0 24-10.7 24-24z"></path></svg> --}}
                <i class="fa-solid fa-arrow-up-from-bracket"></i>
                <div>
                  <h6 class="text-white">LIFT/ELEVATOR</h6>
                  <p class="text-white">Importer</p>
                </div>
              </div>
            </div><!-- End Stats Item -->
  
            <div class="col-lg-3 col-md-6">
              <div class="stats-item d-flex align-items-center w-100 h-100">
                <i class="fa-solid fa-person-running"></i>
                <div>
                  <h6 class="text-white">Escalator</h6>
                  <p class="text-white">Importer</p>
                </div>
              </div>
            </div><!-- End Stats Item -->
  
            <div class="col-lg-3 col-md-6">
              <div class="stats-item d-flex align-items-center w-100 h-100">
                <i class="fa-solid fa-power-off"></i>
                <div>
                  <h6 class="text-white">Generator</h6>
                  <p class="text-white">Importer</p>
                </div>
              </div>
            </div><!-- End Stats Item -->
  
            <div class="col-lg-3 col-md-6">
              <div class="stats-item d-flex align-items-center w-100 h-100">
                <i class="fa-solid fa-recycle"></i>
                <div>
                  <h6 class="text-white">Servicing &</h6>
                  <p class="text-white">Maintenance</p>
                </div>
              </div>
            </div><!-- End Stats Item -->
  
          </div>
  
        </div>
      </section><!-- End Stats Counter Section -->
      <hr>

  </section><!-- End Hero Section -->

    <!-- ======= Get Started Section ======= -->
    <section id="get-started" class="get-started section-bg">
      <div class="container">

        <div class="row justify-content-between gy-4">

          <div class="col-lg-12 d-flex align-items-center" data-aos="fade-up">
            <div class="content">
            
              <h2 class="text-center text-bg-info p-3 text-white">Express Engineers BD.</h2>
              <h3>Description </h3>
              <p> <a href="https://expressengineersbd.com/" class="text-info">Express Engineers BD</a> was founded in 2000. Aftab ahamed  Managing Director with experience of 26(twenty six) years in lift installation, renovation and maintenance and supply . He has surrounded himself with individuals who are long time professionals in their field of expertise. management experience in different reputed company.   <a href="https://expressengineersbd.com/" class="text-info">Express Engineers BD</a>   key focuses are on providing the quality elevator and escalator at a competitive price within the confines of the elevator and escalator safety code. Over the years Express Engineers BD has continually increased quality and efficiency.  <a href="https://expressengineersbd.com/" class="text-info">Express Engineers BD</a> with the commitment of everyone in the organization has the regard for quality, the safety of our employees and client satisfaction.<br><br> <a href="https://expressengineersbd.com/" class="text-info">Express Engineers BD</a> business principles are based on a code of ethics, commitment to its employees and a pursuit for perfection
                <a href="https://expressengineersbd.com/" class="text-info">Express Engineers BD</a> is committed to reducing the environmental footprint caused from the means and material of quality elevator and escalator. We provide new lift and escalator as well as renovations or upgrades. We are fully dedicated to serving our valuable customer by providing quality finishing and durable parts. We understand that time is always valuable when an elevator or escalator is shut down; therefore our in-house teams strive to provide solutions in a timely manner to minimize down time.</p>
              
            </div>
          </div>

         

        </div>

      </div>
    
    </section><!-- End Get Started Section -->




     <!-- ======= Our Projects Section ======= -->
     <section id="projects" class="projects">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Trending Products</h2>
        </div>

        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order">

          <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">

            @php
              $trending_product = DB::table('trending_products')->where('status',1)->orderBy('id', 'DESC')->get();
              // @dd($trending_product)
            @endphp

            @foreach ($trending_product as $row)
           
            <div class="col-lg-4 col-md-6 portfolio-item filter-remodeling">
              <div class="portfolio-content h-100">
                <img src="{{ asset($row->image ?? '') }}" class="img-fluid" alt="">

              </div>
            </div><!-- End Projects Item -->

            @endforeach
          
          </div><!-- End Projects Container -->

        </div>

      </div>
    </section><!-- End Our Projects Section -->




     <!-- ======= Recent Blog Posts Section ======= -->
     <section id="recent-blog-posts" class="recent-blog-posts">
      <div class="container" data-aos="fade-up">

    
    
      <div class=" section-header">
            <h2>Best Selling Products</h2>
      </div>

        <div class="row gy-5">
          @php
            $selling_product = DB::table('selling_products')->where('status',1)->orderBy('id', 'DESC')->limit(3)->get();
          @endphp


          @foreach ($selling_product as $row)
            
          
          <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="post-item position-relative h-100">

              <div class="post-img position-relative overflow-hidden">
                <img src="{{ asset($row->image ?? 'frontend/assets/img/blog/blog-1.jpg') }}" class="img-fluid" alt="{{ $row->title }}">
              </div>

              <div class="post-content d-flex flex-column">
                <h3 class="post-title">{{ $row->title ?? '' }}</h3>
                <hr>

                <a href="#" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
              </div>

            </div>
          </div><!-- End post item -->

          @endforeach
          

        </div>
    </section>
    <!-- End Recent Blog Posts Section -->






    <!-- ======= Constructions Section ======= -->
    <section id="constructions" class="constructions">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Constructions</h2>
          <p><a href="https://expressengineersbd.com/" class="text-info">Express Engineers BD</a> Constructions Site.</p>
        </div>

        <div class="row gy-4">
          @php
            $constructions = DB::table('constructions')->where('status',1)->orderBy('id','DESC')->limit(4)->get();
          @endphp

          @foreach ($constructions as $row)
            
          
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="card-item">
              <div class="row">
                <div class="col-xl-5">
                  <div class="card-bg" style="background-image: url({{ asset($row->image) }});"></div>
                </div>
                <div class="col-xl-7 d-flex align-items-center">
                  <div class="card-body">
                    <h4 class="card-title">{{ $row->title ?? ''}}</h4>
                    <p>{!! $row->description	?? '' !!}</p>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End Card Item -->
          @endforeach

          

        

        </div>

      </div>
    </section><!-- End Constructions Section -->

    
    <!-- ======= Alt Services Section ======= -->
    <section id="alt-services" class="alt-services">
      <div class="container" data-aos="fade-up">

        <div class="row justify-content-around gy-4">
          <div class="col-lg-6 img-bg" style="background-image: url(frontend/assets/img/alt-services.jpg);" data-aos="zoom-in" data-aos-delay="100"></div>

          <div class="col-lg-5 d-flex flex-column justify-content-center">
            <h3>Enim quis est voluptatibus aliquid consequatur fugiat</h3>
            <p>Esse voluptas cumque vel exercitationem. Reiciendis est hic accusamus. Non ipsam et sed minima temporibus laudantium. Soluta voluptate sed facere corporis dolores excepturi</p>

            <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="100">
              <i class="bi bi-easel flex-shrink-0"></i>
              <div>
                <h4><a href="" class="stretched-link">Lorem Ipsum</a></h4>
                <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
              </div>
            </div><!-- End Icon Box -->

            <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="200">
              <i class="bi bi-patch-check flex-shrink-0"></i>
              <div>
                <h4><a href="" class="stretched-link">Nemo Enim</a></h4>
                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
              </div>
            </div><!-- End Icon Box -->

            <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-brightness-high flex-shrink-0"></i>
              <div>
                <h4><a href="" class="stretched-link">Dine Pad</a></h4>
                <p>Explicabo est voluptatum asperiores consequatur magnam. Et veritatis odit. Sunt aut deserunt minus aut eligendi omnis</p>
              </div>
            </div><!-- End Icon Box -->

            <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-brightness-high flex-shrink-0"></i>
              <div>
                <h4><a href="" class="stretched-link">Tride clov</a></h4>
                <p>Est voluptatem labore deleniti quis a delectus et. Saepe dolorem libero sit non aspernatur odit amet. Et eligendi</p>
              </div>
            </div><!-- End Icon Box -->

          </div>
        </div>

      </div>
    </section><!-- End Alt Services Section -->



  </main><!-- End #main -->
@endsection