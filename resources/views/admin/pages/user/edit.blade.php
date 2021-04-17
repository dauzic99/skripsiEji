@extends('admin.layout.template')
@section('title')
    PRODUK EDIT
@endsection
@section('css')

@endsection

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="/article" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Edit Produk</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="/admin/produk">Produk</a></div>
                    <div class="breadcrumb-item">Edit Produk</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Edit Product</h2>
                <p class="section-lead">
                    On this page u can edit your previously created post.
                </p>

                <div class="card">
                    <div class="card-header">
                        <h4>Edit Produk {{ $product->nama }}</h4>
                    </div>
                    <div class="card-body">

                        <form method="post" action="/admin/produk/update/{{ $product->slug }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                    {{-- nama --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group mb-4">
                                                <label class="form-label text-md-left ">Nama Produk</label>
                                                <input type="text" class="form-control" name="nama"
                                                    value="{{ $product->nama }}">
                                                @error('nama')
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
                                                <textarea name="deskripsi" id="" cols="30" rows="50"
                                                    class="form-control">{{ $product->deskripsi }}</textarea>
                                                @error('deskripsi')
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
                                                src="{{ asset('/images/product/cover/' . $product->cover) }}"
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
