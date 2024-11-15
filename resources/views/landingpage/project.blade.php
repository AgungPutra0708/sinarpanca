@extends('landingpage.template.app')

@section('content')
    <main id="main">
        <!-- ======= Projects Section ======= -->
        <div class="section-title">
            <div class="container">
                <h2>Projects</h2>
            </div>
        </div>

        <!-- Project Now Carousel (for 'Now' projects) -->
        <section id="projects-now" class="projects section-bg">
            <div class="container">
                <h3>Now</h3>
                <div id="projectNowCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($projectsNow->chunk(3) as $projectChunk)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                <div class="row">
                                    @foreach ($projectChunk as $project)
                                        <div class="col-lg-4">
                                            <div class="box">
                                                <img src="{{ asset('img/' . $project->picture_project) }}"
                                                    alt="{{ $project->name_project }}" class="img-fluid">
                                                <h3>{{ $project->name_project }}</h3>
                                                <h4>{{ $project->location_project }}</h4>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Carousel Controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#projectNowCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#projectNowCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </section>

        <hr>

        <!-- Project Completed Pagination (for 'Completed' projects) -->
        <section id="projects-completed" class="projects section-bg">
            <div class="container">
                <h3>Completed</h3>
                <div id="projectCompleted" class="row">
                    @foreach ($projectsCompleted as $project)
                        <div class="col-lg-6 mb-4" data-aos="fade-right" data-aos-delay="100">
                            <div class="box">
                                <img src="{{ asset('img/' . $project->picture_project) }}"
                                    alt="{{ $project->name_project }}" class="img-fluid">
                                <h3>{{ $project->name_project }}</h3>
                                <h4>{{ $project->location_project }}</h4>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination Controls -->
                <div class="pagination-controls text-center mt-4">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <!-- Laravel Pagination Links with Bootstrap -->
                            {{ $projectsCompleted->links('pagination::bootstrap-4') }}
                        </ul>
                    </nav>
                </div>
            </div>
        </section>
    </main>
    @include('landingpage.template.footer')
@endsection
