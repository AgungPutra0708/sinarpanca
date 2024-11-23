@extends('landingpage.template.app')

@section('content')
    <main id="main">
        <!-- ======= Location Section ======= -->
        <div class="section-title">
            <div class="container">
                <h2>Location</h2>
            </div>
        </div>

        <!-- ======= Location Section ======= -->
        <section id="contact" class="contact">
            <div class="container">
                <div class="row mb-5" data-aos="fade-right">
                    <h2 class="text-center">Our Office</h2>
                    <div class="col-lg-12 d-flex align-items-stretch">
                        <iframe src="{!! $locationData->maps !!}" frameborder="0" style="border: 0; width: 100%; height: 290px"
                            allowfullscreen></iframe>
                    </div>
                </div>
                <div class="row" data-aos="fade-right">
                    <div class="col-lg-6">
                        <div class="address">
                            <h2 class="text-center">Head Office</h2>
                            <p>{{ $locationData->head_office }}</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="address">
                            <h2 class="text-center">Workshop</h2>
                            <p>{{ $locationData->branch_office }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Location Section -->
    </main>
    @include('landingpage.template.footer')
@endsection
