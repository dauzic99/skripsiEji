@extends('landing.layout.template')
@section('content')
    <section id="home-slider">
        <div class="container">
            <div class="row">
                <div class="main-slider">
                    <div class="slide-text">
                        <h1>We Are Creative Nerds</h1>
                        <p>Boudin doner frankfurter pig. Cow shank bresaola pork loin tri-tip tongue venison pork belly
                            meatloaf short loin landjaeger biltong beef ribs shankle chicken andouille.</p>
                        <a href="{{ route('login') }}" class="btn btn-common">MASUK</a>
                    </div>
                    <img src="{{ asset('multicolor/images/home/slider/hill.png') }}" class="slider-hill"
                        alt="slider image">
                    <img src="{{ asset('multicolor/images/home/slider/house.png') }}" class="slider-house"
                        alt="slider image">
                    <img src="{{ asset('multicolor/images/home/slider/sun.png') }}" class="slider-sun" alt="slider image">
                    <img src="{{ asset('multicolor/images/home/slider/birds1.png') }}" class="slider-birds1"
                        alt="slider image">
                    <img src="{{ asset('multicolor/images/home/slider/birds2.png') }}" class="slider-birds2"
                        alt="slider image">
                </div>
            </div>
        </div>
        <div class="preloader"><i class="fa fa-sun-o fa-spin"></i></div>
    </section>
    <!--/#home-slider-->

    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <div class="single-service">
                        <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="300ms">
                            <img src="{{ asset('multicolor/images/leaves.svg') }}" alt="">
                        </div>
                        <h2>Banyak Tumbuhan</h2>
                        <p>Tersedia sebanyak 50+ tumbuhan untuk berbagai macam penyakit.</p>
                    </div>
                </div>
                <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
                    <div class="single-service">
                        <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="600ms">
                            <img src="{{ asset('multicolor/images/symptoms.svg') }}" alt="">
                        </div>
                        <h2>Banyak Penyakit</h2>
                        <p>Sistem ini dapat mendukung keputusan untuk pemilihan obat bagi banyak penyakit.</p>
                    </div>
                </div>
                <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="900ms">
                    <div class="single-service">
                        <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="900ms">
                            <img src="{{ asset('multicolor/images/ranking.svg') }}" alt="">
                        </div>
                        <h2>ROC MOORA</h2>
                        <p>Sistem ini menggunakan 2 macam metode untuk mempertajam akurasi pemilihan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#services-->

    <section id="action" class="responsive">
        <div class="vertical-center">
            <div class="container">
                <div class="row">
                    <div class="action take-tour">
                        <div class="col-sm-7 wow fadeInLeft" data-wow-duration="500ms" data-wow-delay="300ms">
                            <h1 class="title">Triangle Corporate Template</h1>
                            <p>A responsive, retina-ready &amp; wide multipurpose template.</p>
                        </div>
                        <div class="col-sm-5 text-center wow fadeInRight" data-wow-duration="500ms" data-wow-delay="300ms">
                            <div class="tour-button">
                                <a href="{{ route('landing.perhitungan') }}" class="btn btn-common">Hitung disini</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#action-->





@endsection
