@extends('landing.layout.template')
@section('content')
    <section id="page-breadcrumb">
        <div class="vertical-center sun">
            <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title">Tumbuhan</h1>
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
                <div class="col-sm-6">
                    <img src="{{ asset('images/tumbuhan/cover/' . $plant->cover) }}" class="img-responsive" alt="">
                </div>
                <div class="col-sm-6">
                    <div class="project-name overflow">
                        <h2 class="bold">{{ $plant->nama }}</h2>
                        <span><i>{{ $plant->latin }}</i></span>
                    </div>
                    <div class="project-info overflow">
                        <h3>Deskripsi</h3>
                        <p>{{ $plant->deskripsi }}</p>
                    </div>
                    <div class="skills overflow">
                        <h3>Baik bagi penyakit:</h3>
                        <ul class="nav navbar-nav navbar-default">
                            @php
                                $values = [];
                                foreach ($sickness as $item) {
                                    array_push($values, $item->penyakit->nama);
                                }
                                $sicks = array_unique($values);
                            @endphp
                            @foreach ($sicks as $sick)
                                <li><a
                                        href="{{ route('landing.penyakit.detail', ['slug' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $sick)))]) }}"><i
                                            class="fa fa-check-square"></i>{{ $sick }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="client overflow">
                        <h3>Bagian yang berkhasiat:</h3>
                        <ul class="nav navbar-nav navbar-default">
                            @foreach ($sickness as $item)
                                <li><a><i class="fa fa-bolt"></i>{{ $item->bagian }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
