@extends('landingpage.template.app')

@section('content')
    <section id="hero-carousel">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="10000">
            <div class="carousel-inner">
                <div class="carousel-item active d-flex align-items-center blur-background"
                    style="background-image: url('{{ asset('img/sky.jpg') }}');">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6 d-flex flex-column justify-content-center text-center pt-4 pt-lg-0"
                                data-aos="fade-up" data-aos-delay="200">
                                <h1>STRENGTH IN EVERY STRUCTURE VISION IN EVERY PROJECT</h1>
                            </div>
                            <div class="col-lg-3"></div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item d-flex align-items-center blur-background"
                    style="background-image: url('{{ asset('img/hat.jpg') }}');">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                                data-aos="fade-up" data-aos-delay="200">
                                <h1>FOUNDATIONS OF STRENGTH</h1>
                                <hr>
                                <h1>CERTAINTY IN RESULTS</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item d-flex align-items-center blur-background"
                    style="background-image: url('{{ asset('img/site.jpg') }}');">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 d-flex flex-column justify-content-center text-center pt-4 pt-lg-0 order-2 order-lg-1"
                                data-aos="fade-up" data-aos-delay="200">
                                <h1>Beyond Structures, We Build Trust</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Right Boxes -->
        <div class="bottom-right-boxes">
            <div class="row">
                <div class="col-lg-4 col-4">
                    <div class="box">
                        <div class="icon">
                            <img src="{{ asset('img/handshake.png') }}" alt="" class="img-fluid">
                        </div>
                        <div class="text-content">
                            <h3>{{ $homeData->client }}</h3>
                            <p class="highlighted-text">Happy Clients</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-4">
                    <div class="box">
                        <div class="icon">
                            <img src="{{ asset('img/clipboard.png') }}" alt="" class="img-fluid">
                        </div>
                        <div class="text-content">
                            <h3>{{ $homeData->project }}</h3>
                            <p class="highlighted-text">Projects Completed</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-4">
                    <div class="box">
                        <div class="icon">
                            <img src="{{ asset('img/strategy.png') }}" alt="" class="img-fluid">
                        </div>
                        <div class="text-content">
                            <h3>{{ $homeData->business }}</h3>
                            <p class="highlighted-text">Year In Business</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
