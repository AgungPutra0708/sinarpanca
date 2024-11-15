@extends('landingpage.template.app')

@section('content')
    <main id="main">
        <!-- ======= About Section ======= -->
        <div class="section-title">
            <div class="container" data-aos="fade-right">
                <h2>About Us</h2>
            </div>
        </div>
        <section id="about" class="why-us section-bg">
            <div class="container-fluid" data-aos="fade-right">
                <div class="row">
                    <div
                        class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch order-1 order-sm-1 order-md-1 order-lg-0">
                        <div class="content">
                            {!! $aboutData->description !!}
                            <h4>
                                Our Vision
                            </h4>
                            {!! $aboutData->vision !!}
                            <h4>
                                Our Mission
                            </h4>
                            {!! $aboutData->mission !!}
                        </div>
                    </div>
                    <div class="col-lg-5 align-items-stretch align-content-center order-0 order-sm-0 order-md-0 order-lg-1"
                        data-aos="zoom-in" data-aos-delay="150">
                        <img src="{{ asset('img/about-us.png') }}" class="img-fluid" alt="" />
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Section -->
    </main>
    @include('landingpage.template.footer')
@endsection
