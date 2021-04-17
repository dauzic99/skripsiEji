@extends('landing.layout.template')
@section('content')
    <section id="page-breadcrumb">
        <div class="vertical-center sun">
            <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title">Penyakit</h1>
                            <p>Detail</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#action-->

    <section id="portfolio-information" class="padding-top">
        <div class="container">
            <div class="row">

                <div class="col-sm-12">
                    <div class="project-name overflow">
                        <h2 class="bold">{{ $penyakit->nama }}</h2>
                    </div>
                    <div class="project-info overflow">
                        <h3>Deskripsi</h3>
                        <p>{{ $penyakit->deskripsi }}</p>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
