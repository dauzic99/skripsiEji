@extends('admin.layout.template')
@section('title')
    KRITERIA EDIT
@endsection
@section('css')

@endsection

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('kriteria.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Edit Kriteria</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="/admin/kriteria">Kriteria</a></div>
                    <div class="breadcrumb-item">Edit Kriteria</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Edit Kriteria</h2>
                <p class="section-lead">
                    On this page u can edit your previously created post.
                </p>

                <div class="card">
                    <div class="card-header">
                        <h4>Edit Kriteria {{ $criteria->nama }}</h4>
                    </div>
                    <div class="card-body">

                        <form method="post" action="/admin/kriteria/update/{{ $criteria->id }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                    {{-- nama --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group mb-4">
                                                <label class="form-label text-md-left ">Nama Kriteria</label>
                                                <input type="text" class="form-control" name="nama"
                                                    value="{{ $criteria->nama }}">
                                                @error('nama')
                                                    <span class=" text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Tipe --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group mb-4">
                                                <label class="form-label text-md-left ">Tipe Kriteria</label>
                                                <select name="tipe" id="" class="form-control">
                                                    <option value="Benefit" @if ($criteria->tipe == 'Benefit') selected @endif>Benefit</option>
                                                    <option value="Cost" @if ($criteria->tipe == 'Cost') selected @endif>Cost</option>
                                                </select>
                                                @error('deskripsi')
                                                    <span class=" text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">



                                </div>
                            </div>

                    </div>
                    <div class="card-footer">
                        <div class="form-group mb-4">
                            <label class="form-label text-md-left "></label>
                            <div class="">
                                <button class="btn btn-primary" type="submit">Simpan </button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>


            </div>
        </section>
    </div>
@endsection
@section('script')

    <script src="{{ asset('stisla-master/assets/js/page/features-post-create.js') }}"></script>
    <script>
        $(document).ready(function(e) {


        });

    </script>
@endsection
