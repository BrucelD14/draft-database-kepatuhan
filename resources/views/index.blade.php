@extends('layouts.main')
@section('container')
    <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-12 mx-auto">
                    <h6 class="text-white text-center">SELAMAT DATANG DI JARINGAN DOKUMENTASI DAN INFORMASI HUKUM
                    </h6>
                    <h3 class="text-white text-center">PT INDUSTRI KERETA API (Persero)</h3>

                    <form method="get" class="custom-form mt-4 pt-2 mb-lg-0 mb-5" role="search">
                        <div class="input-group input-group-lg">
                            <span class="input-group-text bi-search" id="basic-addon1">

                            </span>

                            <input name="keyword" type="search" class="form-control" id="keyword"
                                placeholder="Peraturan, Reviu, Keputusan, Surat Edaran ..." aria-label="Search">

                            <button type="submit" class="form-control">Cari</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>


    <section class="featured-section">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-6 col-12 mb-4 mb-lg-0">
                    <div class="custom-block bg-white shadow-lg">
                        <a href="topics-detail.html">
                            <div class="d-flex">
                                <div>
                                    <h5 class="mb-2 text-center">Peraturan Internal Perusahaan</h5>

                                    <p class="mb-0">When you search for free CSS templates, you will notice that
                                        TemplateMo is one of the best websites.</p>
                                </div>
                            </div>
                            <img src="{{ asset('img/topics/undraw_Remote_design_team_re_urdx.png') }}"
                                class="custom-block-image img-fluid" alt="">
                        </a>
                    </div>
                </div>

                <div class="col-lg-6 col-12">
                    <div class="custom-block custom-block-overlay">
                        <div class="d-flex flex-column h-100">
                            <img src="{{ asset('img/businesswoman-using-tablet-analysis.jpg') }}"
                                class="custom-block-image img-fluid" alt="">

                            <div class="custom-block-overlay-text d-flex">
                                <div>
                                    <h5 class="text-white mb-2 text-center">Peraturan Eksternal</h5>

                                    <p class="text-white">Topic Listing Template includes homepage, listing page,
                                        detail page, and contact page. You can feel free to edit and adapt for your
                                        CMS requirements.</p>
                                </div>
                            </div>

                            <div class="section-overlay"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="faq-section section-padding" id="section_4">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12">
                    <h2 class="mb-4">Frequently Asked Questions</h2>
                </div>

                <div class="clearfix"></div>

                <div class="col-lg-5 col-12">
                    <img src="{{ asset('img/faq_graphic.jpg') }}" class="img-fluid" alt="FAQs">
                </div>

                <div class="col-lg-6 col-12 m-auto">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Apa itu JDIH PT INKA (Persero)?
                                </button>
                            </h2>

                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    JDIH PT INKA (Persero) adalah <strong>wadah informasi peraturan
                                        perundang-undangan
                                        terkait dengan proses bisnis PT
                                        INKA (Persero)</strong> serta Peraturan yang berlaku di PT INKA (Persero)
                                    yang disajikan
                                    secara lengkap, akurat,
                                    mudah, dan cepat.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    How to find a topic?
                                </button>
                            </h2>

                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    You can search on Google with <strong>keywords</strong> such as templatemo
                                    portfolio, templatemo one-page layouts, photography, digital marketing, etc.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Does it need to paid?
                                </button>
                            </h2>

                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    You can modify any of this with custom CSS or overriding our default variables.
                                    It's also worth noting that just about any HTML can go within the
                                    <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <section class="contact-section section-padding section-bg" id="section_5">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-12 col-12 text-center">
                    <h2 class="mb-5">Get in touch</h2>
                </div>

                <div class="col-lg-7 col-12 mb-4 mb-lg-0">
                    {{-- <iframe class="google-map"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2595.065641062665!2d-122.4230416990949!3d37.80335401520422!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80858127459fabad%3A0x808ba520e5e9edb7!2sFrancisco%20Park!5e1!3m2!1sen!2sth!4v1684340239744!5m2!1sen!2sth"
                            width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3841.320560625069!2d111.52351447641053!3d-7.618051878009855!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79bf015ea242bb%3A0xa2f7a9e70e95cddf!2sPT%20Industri%20Kereta%20Api!5e1!3m2!1sen!2sid!4v1698895300949!5m2!1sen!2sid"
                        width="100%" height="370" style="border:0;border-radius:30px;" allowfullscreen=""
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <div class="col-lg-5 col-md-6 col-12 mb-3 mb-lg- mb-md-0">
                    <h4 class="mb-3">Head office</h4>

                    {{-- <p>Bay St &amp;, Larkin St, San Francisco, CA 94109, United States</p> --}}
                    <p>Jl. Yos Sudarso No.71, Madiun Lor, Kec. Manguharjo, Kota Madiun, Jawa Timur, Indonesia</p>
                    <hr>

                    <p class="d-flex align-items-center mb-1">
                        <span class="me-2">Phone</span>

                        <a href="tel: 305-240-9671" class="site-footer-link">
                            305-240-9671
                        </a>
                    </p>

                    <p class="d-flex align-items-center">
                        <span class="me-2">Email</span>

                        <a href="mailto:info@company.com" class="site-footer-link">
                            info@company.com
                        </a>
                    </p>
                </div>

                {{-- <div class="col-lg-3 col-md-6 col-12 mx-auto">
                        <h4 class="mb-3">Dubai office</h4>

                        <p>Burj Park, Downtown Dubai, United Arab Emirates</p>

                        <hr>

                        <p class="d-flex align-items-center mb-1">
                            <span class="me-2">Phone</span>

                            <a href="tel: 110-220-3400" class="site-footer-link">
                                110-220-3400
                            </a>
                        </p>

                        <p class="d-flex align-items-center">
                            <span class="me-2">Email</span>

                            <a href="mailto:info@company.com" class="site-footer-link">
                                info@company.com
                            </a>
                        </p>
                    </div> --}}

            </div>
        </div>
    </section>
@endsection
