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
        <hr>

        <!-- ======= Project Management Section ======= -->
        <section id="project_management" class="services section-bg">
            <div class="container">
                <h3>Project Management</h3>
                <div class="row text-center">
                    <div class="col-lg-4 mb-4" data-aos="fade-right" data-aos-delay="100">
                        <div class="box">
                            <img src="{{ asset('img/project1.jpg') }}" alt="Schedule and Budget Planning" class="img-fluid"
                                style="width: 400px; height: 250px;">
                            <h4 class="mb-0">Schedule and Budget Planning</h4>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4" data-aos="fade-right" data-aos-delay="100">
                        <div class="box">
                            <img src="{{ asset('img/project2.jpg') }}" alt="Contractor Procurement" class="img-fluid"
                                style="width: 400px; height: 250px;">
                            <h4 class="mb-0">Contractor Procurement</h4>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4" data-aos="fade-right" data-aos-delay="100">
                        <div class="box">
                            <img src="{{ asset('img/project3.jpg') }}" alt="Overall Project Supervision" class="img-fluid"
                                style="width: 400px; height: 250px;">
                            <h4 class="mb-0">Overall Project Supervision</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Project Management Section -->
        <hr>

        <!-- ======= Construction Management Section ======= -->
        <section id="construction_management" class="services section-bg">
            <div class="container">
                <h3>Construction Management</h3>
                <div class="row text-center">
                    <div class="col-lg-4 mb-4" data-aos="fade-right" data-aos-delay="100">
                        <div class="box">
                            <img src="{{ asset('img/construction1.jpg') }}" alt="Modeling" class="img-fluid"
                                style="width: 400px; height: 250px;">
                            <h4 class="mb-0">Modeling</h4>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4" data-aos="fade-right" data-aos-delay="100">
                        <div class="box">
                            <img src="{{ asset('img/construction2.jpg') }}" alt="Planning" class="img-fluid"
                                style="width: 400px; height: 250px;">
                            <h4 class="mb-0">Planning</h4>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4" data-aos="fade-right" data-aos-delay="100">
                        <div class="box">
                            <img src="{{ asset('img/construction3.jpg') }}" alt="Execution" class="img-fluid"
                                style="width: 400px; height: 250px;">
                            <h4 class="mb-0">Execution</h4>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-4" data-aos="fade-right" data-aos-delay="100">
                        <div class="box">
                            <img src="{{ asset('img/construction4.jpg') }}" alt="Monitoring" class="img-fluid"
                                style="width: 400px; height: 250px;">
                            <h4 class="mb-0">Monitoring</h4>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-4" data-aos="fade-right" data-aos-delay="100">
                        <div class="box">
                            <img src="{{ asset('img/construction5.jpg') }}" alt="Closure" class="img-fluid"
                                style="width: 400px; height: 250px;">
                            <h4 class="mb-0">Closure</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Construction Management Section -->
        <hr>

        <!-- ======= Architect Section ======= -->
        <section id="architect" class="services section-bg">
            <div class="container">
                <h3>Contructor MEP, Structure and Architect</h3>
                <div class="row text-center">
                    <div class="col-lg-4 mb-4" data-aos="fade-right" data-aos-delay="100">
                        <div class="box">
                            <img src="{{ asset('img/architect1.jpg') }}" alt="Contructor MEP" class="img-fluid"
                                style="width: 400px; height: 250px;">
                            <h4 class="mb-0">Contructor MEP</h4>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4" data-aos="fade-right" data-aos-delay="100">
                        <div class="box">
                            <img src="{{ asset('img/architect2.jpg') }}" alt="Structure" class="img-fluid"
                                style="width: 400px; height: 250px;">
                            <h4 class="mb-0">Structure</h4>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4" data-aos="fade-right" data-aos-delay="100">
                        <div class="box">
                            <img src="{{ asset('img/architect3.jpg') }}" alt="Architect" class="img-fluid"
                                style="width: 400px; height: 250px;">
                            <h4 class="mb-0">Architect</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Architect Section -->
    </main>
    @include('landingpage.template.footer')
@endsection
