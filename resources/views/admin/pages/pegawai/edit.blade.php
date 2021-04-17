@extends('admin.layout.template')
@section('title')
    TUMBUHAN EDIT
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
                <h1>Edit Tumbuhan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('tumbuhan.index') }}">Tumbuhan</a></div>
                    <div class="breadcrumb-item">Edit Tumbuhan</div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Tumbuhan {{ $tumbuhan->nama }}</h4>
                    </div>
                    <div class="card-body">

                        <form method="post" action="{{ route('tumbuhan.update', ['slug' => $tumbuhan->slug]) }}"
                            enctype="multipart/form-data">
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
                                                        <option value="{{ $option->id }}" @if ($option->id == $tumbuhan->penyakit_id) selected @endif>{{ $option->nama }}
                                                        </option>
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
                                                    value="{{ $tumbuhan->nama }}">
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
                                                    value="{{ $tumbuhan->latin }}">
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
                                                    style="height: 100%">{{ $tumbuhan->deskripsi }}</textarea>
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
                                                    <option value="Daun" @if ($tumbuhan->bagian == 'Daun') selected @endif>Daun</option>
                                                    <option value="Akar" @if ($tumbuhan->bagian == 'Akar') selected @endif>Akar</option>
                                                    <option value="Herba" @if ($tumbuhan->bagian == 'Herba') selected @endif>Herba</option>
                                                    <option value="Bunga" @if ($tumbuhan->bagian == 'Bunga') selected @endif>Bunga</option>
                                                    <option value="Biji" @if ($tumbuhan->bagian == 'Biji') selected @endif>Biji</option>
                                                    <option value="Getah" @if ($tumbuhan->bagian == 'Getah') selected @endif>Getah</option>
                                                    <option value="Buah" @if ($tumbuhan->bagian == 'Buah') selected @endif>Buah</option>
                                                    <option value="Batang" @if ($tumbuhan->bagian == 'Batang') selected @endif>Batang</option>
                                                    <option value="Siung" @if ($tumbuhan->bagian == 'Siung') selected @endif>Siung</option>
                                                    <option value="Rimpang" @if ($tumbuhan->bagian == 'Rimpang') selected @endif>Rimpang</option>
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
                                                    <option value="Dihaluskan" @if ($tumbuhan->pengolahan == 'Dihaluskan') selected @endif>Dihaluskan</option>
                                                    <option value="Direbus" @if ($tumbuhan->pengolahan == 'Direbus') selected @endif>Direbus</option>
                                                    <option value="Langsung" @if ($tumbuhan->pengolahan == 'Langsung') selected @endif>Langsung</option>
                                                    <option value="Dibakar" @if ($tumbuhan->pengolahan == 'Dibakar') selected @endif>Dibakar</option>
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
                                                    <option value="Dioleskan" @if ($tumbuhan->penggunaan == 'Dioleskan') selected @endif>Dioleskan</option>
                                                    <option value="Ditempelkan" @if ($tumbuhan->penggunaan == 'Ditempelkan') selected @endif>Ditempelkan</option>
                                                    <option value="Diminum" @if ($tumbuhan->penggunaan == 'Diminum') selected @endif>Diminum</option>
                                                    <option value="Dimakan" @if ($tumbuhan->penggunaan == 'Dimakan') selected @endif>Dimakan</option>
                                                    <option value="Digunakan untuk mandi" @if ($tumbuhan->penggunaan == 'Digunakan untuk mandi') selected @endif>Digunakan untuk mandi
                                                    </option>
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
                                                    <option value="Perdu" @if ($tumbuhan->jenis == 'Perdu') selected @endif>Perdu</option>
                                                    <option value="Semak" @if ($tumbuhan->jenis == 'Semak') selected @endif>Semak</option>
                                                    <option value="Epifit" @if ($tumbuhan->jenis == 'Epifit') selected @endif>Epifit</option>
                                                    <option value="Pohon" @if ($tumbuhan->jenis == 'Pohon') selected @endif>Pohon</option>
                                                    <option value="Rumput" @if ($tumbuhan->jenis == 'Rumput') selected @endif>Rumput</option>
                                                    <option value="Herba" @if ($tumbuhan->jenis == 'Herba') selected @endif>Herba</option>
                                                    <option value="Terna" @if ($tumbuhan->jenis == 'Terna') selected @endif>Terna</option>
                                                    <option value="Liana" @if ($tumbuhan->jenis == 'Liana') selected @endif>Liana</option>
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
                                                src="{{ asset('images/tumbuhan/cover/' . $tumbuhan->cover) }}"
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
