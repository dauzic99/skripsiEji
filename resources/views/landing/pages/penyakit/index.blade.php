@extends('landing.layout.template')
@section('content')
    <section id="page-breadcrumb">
        <div class="vertical-center sun">
            <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title">Penyakit</h1>
                            <p>Daftar</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="portfolio" style="margin-top: 30px">
        <div class="container">
            <div class="row">
                <div class="portfolio-items">
                    @forelse ($sickness as $penyakit)
                        <div class="col-xs-6 col-sm-4 col-md-3 portfolio-item branded logos">
                            <div class="portfolio-wrapper">
                                <div class="portfolio-single">
                                    <div class="portfolio-thumb" style="">
                                        <img src="" class="img-responsive" alt="">
                                    </div>
                                    <div class="portfolio-view">
                                        <ul class="nav nav-pills">
                                            <li><i class="fa fa-link"></i></li>
                                            <li><a href="" data-lightbox="example-set"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="portfolio-info ">
                                    <a href="{{ route('landing.penyakit.detail', ['slug' => $penyakit->slug]) }}">
                                        <h2>{{ $penyakit->nama }}</h2>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty

                    @endforelse
                </div>
            </div>
            <div class="row">
                <div class="portfolio-pagination">
                    {!! $sickness->links() !!}
                </div>
            </div>
        </div>
    </section>
@endsection
