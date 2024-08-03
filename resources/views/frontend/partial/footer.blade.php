
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
            <h4>Useful Links</h4>
            <ul>
              <li><a href="{{ route('home_page') }}">Home</a></li>
              <li><a href="{{ route('About.section') }}">About us</a></li>
              <li><a href="{{ route('services.section') }}">Services</a></li>
              <li><a href="#">Terms of service</a></li>
              <li><a href="#">Privacy policy</a></li>
            </ul>
          </div><!-- End footer links column-->

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><a href="#">Web Design</a></li>
              <li><a href="#">Web Development</a></li>
              <li><a href="#">Product Management</a></li>
              <li><a href="#">Marketing</a></li>
              <li><a href="#">Graphic Design</a></li>
            </ul>
          </div><!-- End footer links column-->

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Hic solutasetp</h4>
            <ul>
              <li><a href="#">Molestiae accusamus iure</a></li>
              <li><a href="#">Excepturi dignissimos</a></li>
              <li><a href="#">Suscipit distinctio</a></li>
              <li><a href="#">Dilecta</a></li>
              <li><a href="#">Sit quas consectetur</a></li>
            </ul>
          </div><!-- End footer links column-->

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Nobis illum</h4>
            <ul>
              <li><a href="#">Ipsam</a></li>
              <li><a href="#">Laudantium dolorum</a></li>
              <li><a href="#">Dinera</a></li>
              <li><a href="#">Trodelas</a></li>
              <li><a href="#">Flexo</a></li>
            </ul>
          </div><!-- End footer links column-->

        </div>
      </div>
    </div>

    <div class="footer-legal text-center position-relative">
      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span>CordArtist.IT</span></strong>. All Rights Reserved
        </div>
      </div>
    </div>

  </footer>