<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
        <h1 class="logo me-auto">
            <a href="{{ route('home') }}">
                <img src="{{ asset('img/' . $companyData->logo) }}" alt="" class="img-fluid">
            </a>
        </h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar">
            <ul>
                <li>
                    <a class="nav-link scrollto {{ Route::is('home') ? 'active' : '' }}"
                        href="{{ route('home') }}">Home</a>
                </li>
                <li>
                    <a class="nav-link scrollto {{ Route::is('about') ? 'active' : '' }}"
                        href="{{ route('about') }}">About Us</a>
                </li>
                <li>
                    <a class="nav-link scrollto {{ Route::is('project') ? 'active' : '' }}"
                        href="{{ route('project') }}">Projects</a>
                </li>
                <li>
                    <a class="nav-link scrollto {{ Route::is('services') ? 'active' : '' }}"
                        href="{{ route('services') }}">Services</a>
                </li>
                <li>
                    <a class="nav-link scrollto {{ Route::is('location') ? 'active' : '' }}"
                        href="{{ route('location') }}">Location</a>
                </li>
                <li>
                    <a class="nav-link scrollto {{ Route::is('contact') ? 'active' : '' }}"
                        href="{{ route('contact') }}">Get in touch</a>
                </li>
            </ul>
            <i class="bi
                        bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- .navbar -->
    </div>
</header>
<!-- End Header -->
