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
                            <p class="highlighted-text">Clients</p>
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
                        <a href="#worker" class="scroll-to-section">
                            <div class="icon">
                                <img src="{{ asset('img/strategy.png') }}" alt="" class="img-fluid">
                            </div>
                            <div class="text-content">
                                <h3>{{ $homeData->worker }}</h3>
                                <p class="highlighted-text">Worker</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= Worker Section ======= -->
    <div id="worker">
        <div class="section-title">
            <div class="container" data-aos="fade-right">
                <h2></h2>
            </div>
        </div>
        <section class="section-bg">
            <div class="container-fluid" data-aos="fade-right">
                <div class="row justify-content-center">
                    <!-- Gambar Utama -->
                    <div class="col-lg-8 text-center" data-aos="zoom-in" data-aos-delay="150">
                        <img src="{{ asset('img/' . $homeData->picture) }}" class="img-fluid" alt=""
                            style="max-width: 650px;" />
                    </div>
                </div>

                <div class="row justify-content-center align-items-center mt-4">
                    <!-- Staff -->
                    <div class="col-lg-4 text-center">
                        <div class="worker-box">
                            <img src="{{ asset('img/staff-worker.png') }}" class="img-fluid mb-3" alt="Staff"
                                style="width: 250px;">
                            <h4 class="mb-0">20++</h4>
                            <h4>Staff</h4>
                        </div>
                    </div>
                    <!-- Field Workers -->
                    <div class="col-lg-4 text-center">
                        <div class="worker-box">
                            <img src="{{ asset('img/field-worker.png') }}" class="img-fluid" alt="Field Workers"
                                style="width: 250px;">
                            <h4 class="mb-0">200++</h4>
                            <h4>Field Workers</h4>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center mt-4">
                    <!-- Deskripsi -->
                    <div class="col-lg-10 text-center">
                        <div class="content">
                            <p>
                                {{ $homeData->description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="section-title">
            <div class="container" data-aos="fade-right">
                <h2></h2>
            </div>
        </div>
    </div>
    <!-- End Worker Section -->
@endsection
