<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top" style="position: relative; overflow: hidden;">
        <!-- Background Blur -->
        <div
            style="
            background-image: url('{{ asset('img/footer.jpg') }}');
            background-size: cover;
            background-position: center;
            filter: blur(3px);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;">
        </div>

        <!-- Konten Footer -->
        <div class="container" style="position: relative; z-index: 1;">
            <div class="row">
                <!-- Logo and Tagline Section -->
                <div class="col-lg-6 col-md-6 footer-contact d-flex flex-column justify-content-center"
                    style="margin-left: -55px;">
                    <h1 class="logo">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('img/logofooter.png') }}" alt="Logo"
                                style="width: 100%; max-width: 350px; object-fit: contain;margin-left: -25px;">
                        </a>
                    </h1>
                    <h5 class="mt-3">{{ $companyData->motto }}</h5>
                </div>

                <!-- Menu Links Section -->
                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Menu</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ route('home') }}">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ route('about') }}">About Us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ route('project') }}">Projects</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ route('services') }}">Services</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ route('location') }}">Location</a></li>
                    </ul>
                </div>

                <!-- Contact Information Section -->
                <div class="col-lg-3 col-md-6 footer-contact">
                    <h4>Contact Us</h4>
                    <ul class="list-unstyled">
                        <li>
                            <i class="bi bi-telephone"></i>
                            <a href="tel:{{ $companyData->notelp }}">{{ $companyData->notelp }}</a>
                        </li>
                        <li>
                            <i class="bi bi-envelope"></i>
                            <a href="mailto:{{ $companyData->email }}">{{ $companyData->email }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Overlay Transparan -->
        <div
            style="
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgb(255 255 255 / 45%);
            z-index: 0;
            ">
        </div>
    </div>
</footer>
<!-- End Footer -->
