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
                                <a href="#{{ Str::slug($item->name_service) }}" class="scroll-to-section">
                                    <div class="icon">
                                        <img src="{{ asset('img/' . $item->picture) }}" alt="" class="img">
                                    </div>
                                    <h4>{{ $item->name_service }}</h4>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- End Services Section -->

        @foreach ($serviceData as $item)
            <hr>

            <!-- ======= Project Management Section ======= -->
            <section id="{{ Str::slug($item->name_service) }}" class="services section-bg">
                <div class="container">
                    <h3>{{ $item->name_service }}</h3>
                    <div class="row text-center">
                        @if ($item->details->isNotEmpty())
                            @foreach ($item->details as $detail)
                                <div class="col-lg-4 mb-4" data-aos="fade-right" data-aos-delay="100">
                                    <div class="box">
                                        <img src="{{ asset('img/' . $detail->picture) }}" alt="{{ $detail->name_service }}"
                                            class="img-fluid" style="width: 400px; height: 250px;">
                                        <h4 class="mb-0">{{ $detail->name_service }}</h4>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </section>
        @endforeach
    </main>
    @include('landingpage.template.footer')
@endsection
