
@php
  $settings = DB::table('website_settings')->first();
@endphp


<header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="{{ route('home_page') }}" class="logo d-flex align-items-center" >
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        @isset($settings)

       <img src="{{ asset($settings->logo) }}" alt="" >
          {{-- <h1>{{ $settings->website_name }}<span>.</span></h1> --}}
        @endisset
        
        
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="{{ route('home_page') }}" class="active">Home</a></li>
          <li><a href="{{ route('About.section') }}">About</a></li>
          <li><a href="{{ route('services.section') }}">Services</a></li>
          <li><a href="{{ route('projects.section') }}">Projects</a></li>
          <li><a href="{{ route('blog.section') }}">Blog</a></li>
          <li><a href="{{ route('Contact.section') }}">Contact</a></li>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->



