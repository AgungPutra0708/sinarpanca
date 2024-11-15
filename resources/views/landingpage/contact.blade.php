@extends('landingpage.template.app')

@section('content')
    <main id="main">
        <!-- ======= Contact Section ======= -->
        <div class="section-title">
            <div class="container">
                <h2>Get in touch</h2>
            </div>
        </div>

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <h3 class="text-center">Ready to get strated?</h3>
            <p class="text-center mb-0">
                Looking to turn your construction dreams into reality?
            </p>
            <p class="text-center">
                PT Sinar Panca’s trusted expertise will help you achieve your goals.
                Let’s build your success together.
            </p>
            <div class="container">
                <form action="{{ route('send.mail') }}" method="post" role="form" class="php-email-form">
                    @csrf
                    <div class="form-group col-md-12">
                        <label for="name">Name*</label>
                        <input type="text" name="name" class="form-control" id="name" required />
                    </div>
                    <div class="form-group col-md-12">
                        <label for="telphone">No. Telp*</label>
                        <input type="text" name="telphone" class="form-control" id="telphone" required />
                    </div>
                    <div class="form-group col-md-12">
                        <label for="email">Email*</label>
                        <input type="email" class="form-control" name="email" id="email" required />
                    </div>
                    <div class="form-group">
                        <label for="company_name">Company Name*</label>
                        <input type="text" class="form-control" name="company_name" id="company_name" required />
                    </div>
                    <div class="form-group">
                        <label for="name">Description*</label>
                        <textarea class="form-control" name="message" rows="10" required></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit">Send Message</button>
                    </div>
                </form>
            </div>
        </section>
        <!-- End Contact Section -->
    </main>
    @include('landingpage.template.footer')
@endsection
