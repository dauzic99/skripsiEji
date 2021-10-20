@extends('admin.layout.template')
@section('style')
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/test.css') }}">
@endsection
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Blank Page</h1>
            </div>

            <div class="section-body">
                <div class="container">
                    <img src="{{ asset('images/1200px-UI_Logo.svg.png') }}" alt=""
                        class="img-fluid rounded mx-auto d-block" id="featured-img-produk">
                    <div id="slide-wrapper">
                        <i class="material-icons slider-arrow" id="slideLeft">arrow_back_ios</i>
                        <div id="slider">
                            <img src="{{ asset('images/1200px-UI_Logo.svg.png') }}" alt=""
                                class="rounded thumbnail-img-produk activeImage">
                            <img src="{{ asset('images/240px-Unmul_logo_low.svg.png') }}" alt=""
                                class="rounded thumbnail-img-produk">
                            <img src="{{ asset('images/logo-unpad-flat.jpg') }}" alt=""
                                class="rounded thumbnail-img-produk">
                            <img src="{{ asset('images/1200px-UI_Logo.svg.png') }}" alt=""
                                class="rounded thumbnail-img-produk activeImage">
                            <img src="{{ asset('images/240px-Unmul_logo_low.svg.png') }}" alt=""
                                class="rounded thumbnail-img-produk">
                            <img src="{{ asset('images/logo-unpad-flat.jpg') }}" alt=""
                                class="rounded thumbnail-img-produk">
                            <img src="{{ asset('images/1200px-UI_Logo.svg.png') }}" alt=""
                                class="rounded thumbnail-img-produk activeImage">
                            <img src="{{ asset('images/240px-Unmul_logo_low.svg.png') }}" alt=""
                                class="rounded thumbnail-img-produk">
                            <img src="{{ asset('images/logo-unpad-flat.jpg') }}" alt=""
                                class="rounded thumbnail-img-produk">

                        </div>
                        <i class="material-icons slider-arrow" id="slideRight">arrow_forward_ios</i>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            Deskripsi
                        </div>
                        <div class="col-1">
                            :
                        </div>
                        <div class="col-7">
                            blablabla
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            Harga
                        </div>
                        <div class="col-1">
                            :
                        </div>
                        <div class="col-7">
                            Rp 700000
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            let thumbnails = document.getElementsByClassName('thumbnail-img-produk');
            let activeImage = document.getElementsByClassName('activeImage');
            for (let i = 0; i < thumbnails.length; i++) {
                thumbnails[i].addEventListener('mouseover', function() {
                    if (activeImage.length > 0) {
                        activeImage[0].classList.remove('activeImage');
                    }
                    this.classList.add('activeImage');
                    document.getElementById('featured-img-produk').src = this.src;
                });

            }

            let buttonRight = document.getElementById('slideRight');
            let buttonLeft = document.getElementById('slideLeft');
            var container = document.getElementById('slider');

            buttonLeft.addEventListener('click', function() {
                sideScroll(container, 'left', 25, 100, 10);
            });

            buttonRight.addEventListener('click', function() {
                sideScroll(container, 'right', 25, 100, 10);
            });

            container.addEventListener("wheel", event => {
                const delta = Math.sign(event.deltaY);
                if (delta < 0) {
                    sideScroll(container, 'left', 25, 100, 10);
                } else {
                    sideScroll(container, 'right', 25, 100, 10);
                }
            });

        });

        function sideScroll(element, direction, speed, distance, step) {
            scrollAmount = 0;
            var slideTimer = setInterval(function() {
                if (direction == 'left') {
                    element.scrollLeft -= step;
                } else {
                    element.scrollLeft += step;
                }
                scrollAmount += step;
                if (scrollAmount >= distance) {
                    window.clearInterval(slideTimer);
                }
            }, speed);
        }

    </script>
@endsection
