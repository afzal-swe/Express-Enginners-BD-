
@php
  $settings = DB::table('website_settings')->first();
  $socials = DB::table('socials')->first();
@endphp

<footer id="footer" class="footer">

    <div class="footer-content position-relative">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3>{{ $settings->website_name }}</h3>
              <p>
                {{ $settings->address }}<br>
                <br>
                <strong>Phone : </strong> {{ $settings->phone_one }}<br>
                <strong>Email : </strong>{{ $settings->main_email }}<br>
              </p>
              <div class="social-links d-flex mt-3">
                <a href="{{ $socials->twitter }}" class="d-flex align-items-center justify-content-center"><i class="bi bi-twitter"></i></a>
                <a href="{{ $socials->facebook }}" class="d-flex align-items-center justify-content-center"><i class="bi bi-facebook"></i></a>
                <a href="{{ $socials->instagram }}" class="d-flex align-items-center justify-content-center"><i class="bi bi-instagram"></i></a>
                <a href="{{ $socials->linkedin }}" class="d-flex align-items-center justify-content-center"><i class="bi bi-linkedin"></i></a>
                <a href="{{ $socials->youtube }}" class="d-flex align-items-center justify-content-center"><i class="bi bi-youtube"></i></a>
              </div>
            </div>
          </div><!-- End footer info column-->

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Useful Links</h4><hr>
            <ul>
              <li><a href="{{ route('home_page') }}">Home</a></li>
              <li><a href="{{ route('About.section') }}">About us</a></li>
              <li><a href="{{ route('services.section') }}">Services</a></li>
              <li><a href="#">Terms of service</a></li>
              <li><a href="#">Privacy policy</a></li>
            </ul>
          </div><!-- End footer links column-->

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Our Services</h4><hr>
            <ul>
              <li><a href="#">Left & Elevator</a></li>
              <li><a href="#">Escalator</a></li>
              <li><a href="#">Generator</a></li>
              <li><a href="#">Servicing &</a></li>
              <li><a href="#">Maintenance</a></li>
            </ul>
          </div><!-- End footer links column-->

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Register office :-</h4><hr>
            <p>Suite 907. Resourceful Paltan City (8th Floor). 51-51/A
              Paltan Dhaka-1000 Bangladesh.</p>
          </div><!-- End footer links column-->

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Corporate office :-</h4><hr>
            <p>House # 215/217, Road # 6/B, Block # E, banasree, Dhaka-1212, Bangladesh.</p>
            <span>Phone : +8801764130103</span>
            <span>Phone : +8801755055991</span>
            <span>Phone : +8801638070374</span>
            <span>Mobile: +8801764130103</span>
            
          </div><!-- End footer links column-->

         
          

        </div>
      </div>
    </div>

    <div class="footer-legal text-center position-relative">
      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span><a href="https://www.facebook.com/codeartist.IT" target="blanck">Cord Artist.IT</a></span></strong>. All Rights Reserved
        </div>
      </div>
    </div>

  </footer>