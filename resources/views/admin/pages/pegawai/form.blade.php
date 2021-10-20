@extends('admin.layout.template')
@section('css')

    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/dt-1.10.23/b-1.6.5/r-2.2.7/sp-1.2.2/sl-1.3.1/datatables.min.css" />



@endsection

@section('title')
    Penilaian Pegawai
@endsection
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('pegawai.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Penilaian</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('pegawai.index') }}">Pegawai</a></div>
                    <div class="breadcrumb-item">Penilaian</div>
                </div>
            </div>
            <div class="section-body">


                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Form Penilaian</h4>

                            </div>
                            <form action="{{ route('pegawai.penilaian') }}" method="POST">
                                <div class="card-body">
                                    @if (Session::has('post_success'))
                                        <div class="alert alert-success alert-dismissible show fade">
                                            <div class="alert-body">
                                                <button class="close" data-dismiss="alert">
                                                    <span>&times;</span>
                                                </button>
                                                {{ Session::get('post_success') }}
                                            </div>
                                        </div>
                                    @endif
                                    @csrf
                                    <div class="row">
                                        @foreach ($criterion as $criteria)
                                            @php
                                                $nama = Str::slug($criteria->nama, '_');
                                            @endphp
                                            <div class="col-md-4">
                                                <div class="form-group mb-4">
                                                    <label class="form-label text-md-left ">
                                                        {{ $criteria->nama }}
                                                    </label>
                                                    <input type="number" class="form-control penilaian" min="0" required
                                                        data-pegawai="{{ $pegawai->id }}"
                                                        data-crit="{{ $criteria->id }}" value="{{ $criteria->nilai }}">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary" id="submit">Proses</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4/dt-1.10.23/b-1.6.5/r-2.2.7/sp-1.2.2/sl-1.3.1/datatables.min.js"></script>
    <script src="{{ asset('stisla-master/assets/js/page/modules-datatables.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#submit').click(function(e) {
                e.preventDefault();
                var arrayNilai = [];
                var stop = false;
                $('.penilaian').each(function(index, element) {
                    var pegawai_id = $(this).data('pegawai');
                    var criteria_id = $(this).data('crit');
                    var nilai = $(this).val();
                    if (nilai == '') {
                        iziToast.error({
                            title: 'Gagal',
                            message: 'Mohon diisi sampai lengkap',
                            position: 'topRight'
                        });
                        stop = true;
                        return false;
                    }
                    arrayNilai.push({
                        'pegawai_id': pegawai_id,
                        'criteria_id': criteria_id,
                        'nilai': parseInt(nilai)
                    });

                });
                if (stop) {
                    return false;
                }
                $.ajax({
                    type: "POST",
                    url: "{{ route('pegawai.penilaian') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        arrayNilai: arrayNilai,
                    },
                    dataType: "JSON",
                    success: function(response) {
                        iziToast.success({
                            title: 'Sukses',
                            message: response.success,
                            position: 'topRight'
                        });
                    }
                });

            });
        });

    </script>
@endsection
