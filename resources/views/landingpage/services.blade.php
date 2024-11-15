@extends('landingpage.template.app')

@section('content')
    <main id="main">
        <!-- ======= Projects Section ======= -->
        <div class="section-title">
            <div class="container">
                <h2>Services</h2>
            </div>
        </div>

        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg position-relative">
            <!-- Background Image -->
            <div class="container-fluid">
                <div class="background-image">
                    <img src="{{ asset('img/building.jpg') }}" alt="Background" class="img-fluid">
                </div>
            </div>

            <div class="container position-relative text-center" data-aos="fade-up">
                <div class="row">
                    @foreach ($serviceData as $item)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                            <div class="icon-box">
                                <div class="icon">
                                    <img src="{{ asset('img/' . $item->picture) }}" alt="" class="img">
                                </div>
                                <h4>{{ $item->name_service }}</h4>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- End Services Section -->
    </main>
    @include('landingpage.template.footer')
@endsection
