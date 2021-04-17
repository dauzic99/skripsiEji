@extends('admin.layout.template')
@section('title')
    Tumbuhan
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection




@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('tumbuhan.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Tambah Tumbuhan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('tumbuhan.index') }}">Tumbuhan</a></div>
                    <div class="breadcrumb-item">Tambah Tumbuhan</div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Tumbuhan</h4>
                    </div>
                    <div class="card-body">
                        @if (Session::has('post_success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('post_success') }}
                            </div>
                        @endif
                        <form method="post" action="{{ route('tumbuhan.save') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                    {{-- penyakit --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group mb-4">
                                                <label class="form-label text-md-left">Penyakit</label>
                                                <select class="form-control select2" name="penyakit_id">
                                                    @foreach ($penyakit as $option)
                                                        <option value="{{ $option->id }}">{{ $option->nama }}</option>
                                                    @endforeach
                                                </select>
                                                @error('penyakit_id')
                                                    <span class=" text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    {{-- nama --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group mb-4">
                                                <label class="form-label text-md-left ">Nama Tumbuhan</label>
                                                <input type="text" class="form-control" name="nama"
                                                    value="{{ old('nama') }}">
                                                @error('nama')
                                                    <span class=" text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    {{-- latin --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group mb-4">
                                                <label class="form-label text-md-left ">Nama Latin</label>
                                                <input type="text" class="form-control font-italic" name="latin"
                                                    value="{{ old('latin') }}">
                                                @error('latin')
                                                    <span class=" text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Deskripsi --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group mb-4">
                                                <label class="form-label text-md-left ">Deskripsi Produk</label>
                                                <textarea name="deskripsi" id="" cols="30" rows="7" class="form-control"
                                                    style="height: 100%">{{ old('deskripsi') }}</textarea>
                                                @error('deskripsi')
                                                    <span class=" text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    {{-- bagian --}}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-4">
                                                <label class="form-label text-md-left">Bagian</label>
                                                <select class="form-control select2" name="bagian">
                                                    <option value="Daun">Daun</option>
                                                    <option value="Akar">Akar</option>
                                                    <option value="Herba">Herba</option>
                                                    <option value="Bunga">Bunga</option>
                                                    <option value="Biji">Biji</option>
                                                    <option value="Getah">Getah</option>
                                                    <option value="Buah">Buah</option>
                                                    <option value="Batang">Batang</option>
                                                    <option value="Siung">Siung</option>
                                                    <option value="Rimpang">Rimpang</option>
                                                </select>
                                                @error('bagian')
                                                    <span class=" text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>


                                        {{-- pengolahan --}}

                                        <div class="col-md-6">
                                            <div class="form-group mb-4">
                                                <label class="form-label text-md-left">Pengolahan</label>
                                                <select class="form-control select2" name="pengolahan">
                                                    <option value="Dihaluskan">Dihaluskan</option>
                                                    <option value="Direbus">Direbus</option>
                                                    <option value="Langsung">Langsung</option>
                                                    <option value="Dibakar">Dibakar</option>
                                                </select>
                                                @error('pengolahan')
                                                    <span class=" text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- penggunaan --}}

                                        <div class="col-md-6">
                                            <div class="form-group mb-4">
                                                <label class="form-label text-md-left">Penggunaan</label>
                                                <select class="form-control select2" name="penggunaan">
                                                    <option value="Dioleskan">Dioleskan</option>
                                                    <option value="Ditempelkan">Ditempelkan</option>
                                                    <option value="Diminum">Diminum</option>
                                                    <option value="Dimakan">Dimakan</option>
                                                    <option value="Digunakan untuk mandi">Digunakan untuk mandi</option>
                                                </select>
                                                @error('penggunaan')
                                                    <span class=" text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- jenis --}}

                                        <div class="col-md-6">
                                            <div class="form-group mb-4">
                                                <label class="form-label text-md-left">Jenis</label>
                                                <select class="form-control select2" name="jenis">
                                                    <option value="Perdu">Perdu</option>
                                                    <option value="Semak">Semak</option>
                                                    <option value="Epifit">Epifit</option>
                                                    <option value="Pohon">Pohon</option>
                                                    <option value="Rumput">Rumput</option>
                                                    <option value="Herba">Herba</option>
                                                    <option value="Terna">Terna</option>
                                                    <option value="Liana">Liana</option>
                                                </select>
                                                @error('jenis')
                                                    <span class=" text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">

                                    {{-- cover --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group mb-4">
                                                <label class="form-label text-md-left ">Cover</label>
                                                <div class="">
                                                    <input type="file" name="cover" placeholder="Choose image" id="image">
                                                </div>
                                                @error('cover')
                                                    <span class=" text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <img id="preview-image-before-upload"
                                                src="{{ asset('stisla-master/assets/img/news/img13.jpg') }}"
                                                alt="preview image" style="max-height: 250px;" class="img-fluid">
                                        </div>
                                    </div>

                                </div>
                            </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group mb-4">
                            <label class="form-label text-md-left "></label>
                            <div class="">
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>


            </div>
        </section>
    </div>
@endsection
@section('script')

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('stisla-master/assets/js/page/features-post-create.js') }}"></script>
    <script>
        $(document).ready(function(e) {
            $('#image').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview-image-before-upload').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });

    </script>
@endsection
