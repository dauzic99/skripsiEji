@extends('landing.layout.template')
@section('content')
    <section id="page-breadcrumb">
        <div class="vertical-center sun">
            <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title">Tumbuhan</h1>
                            <p>Penyakit {{ $penyakit->nama }}</p>
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
                    @forelse ($plants as $plant)
                        <div class="col-xs-6 col-sm-4 col-md-3 portfolio-item branded logos">
                            <div class="portfolio-wrapper">
                                <div class="portfolio-single">
                                    <div class="portfolio-thumb" style="">
                                        <img src="{{ asset('images/tumbuhan/cover/' . $plant->cover) }}"
                                            class="img-responsive" alt="" style="object-fit: cover;height: 200px;">
                                    </div>
                                    <div class="portfolio-view">
                                        <ul class="nav nav-pills">
                                            <li><a href="{{ route('landing.tumbuhan.detail', ['slug' => $plant->slug]) }}"><i
                                                        class="fa fa-link"></i></a></li>
                                            <li><a href="{{ asset('images/tumbuhan/cover/' . $plant->cover) }}"
                                                    data-lightbox="example-set"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="portfolio-info ">
                                    <h2>{{ $plant->nama }} ({{ $plant->bagian }})</h2>
                                    <span><i>{{ $plant->latin }}</i></span>
                                </div>
                            </div>
                        </div>
                    @empty

                    @endforelse
                </div>
            </div>

            <div class="row">
                <div class="portfolio-pagination">
                    {!! $plants->links() !!}
                </div>
            </div>
        </div>
    </section>
@endsection
