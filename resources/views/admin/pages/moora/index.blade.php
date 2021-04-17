@extends('admin.layout.template')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


@endsection

@section('title')
    MOORA
@endsection
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>MOORA</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item">MOORA</div>
                </div>
            </div>
            <div class="section-body">
                <ul class="nav nav-pills" id="" role="tablist">
                    @foreach ($penyakit as $sick)
                        <li class="nav-item">
                            <a class="nav-link  tab-penyakit" id="home-tab3" data-toggle="tab" href="#home3" role="tab"
                                aria-controls="home" aria-selected="true"
                                data-id="{{ $sick->id }}">{{ $sick->nama }}</a>
                        </li>
                    @endforeach
                </ul>

                <button class="btn btn-outline-primary mt-4" id="buttonForm">Additional Option</button>
                <div class="mt-4" id="form-additional" style="display: none;">
                    <form>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label class="form-label text-md-left">Bagian</label>
                                    <select class="form-control select2" name="bagian" id="formBagian">
                                        <option value="">Semua</option>
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
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label class="form-label text-md-left">Pengolahan</label>
                                    <select class="form-control select2" name="pengolahan" id="formPengolahan">
                                        <option value="">Semua</option>
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
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label class="form-label text-md-left">Penggunaan</label>
                                    <select class="form-control select2" name="penggunaan" id="formPenggunaan">
                                        <option value="">Semua</option>
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
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label class="form-label text-md-left">Jenis</label>
                                    <select class="form-control select2" name="jenis" id="formJenis">
                                        <option value="">Semua</option>
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
                    </form>
                    <button class="btn btn-primary" id="filterButton">Filter</button>
                </div>
                {{-- table data tumbuhan --}}
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Tumbuhan</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-2">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    #
                                                </th>
                                                <th>Nama</th>
                                                @foreach ($criterion as $criterias)
                                                    <th>{{ $criterias->nama }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody class="data-penyakit">
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                {{-- table matriks keputusan --}}
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Matriks Keputusan</h4>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-2">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    #
                                                </th>
                                                @foreach ($criterion as $criteria)
                                                    <th>{{ $criteria->nama }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>

                                        <tbody class="matriks-normalize">
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                {{-- table matriks normal --}}
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Matriks Normalisasi</h4>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-2">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    #
                                                </th>
                                                @foreach ($criterion as $criteria5)
                                                    <th>{{ $criteria5->nama }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>

                                        <tbody class="matriks-normalisasi">

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                {{-- table matriks bobot --}}
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Matriks Normalisasi Terbobot</h4>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-2">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    #
                                                </th>
                                                @foreach ($criterion as $criteria6)
                                                    <th>{{ $criteria6->nama }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>

                                        <tbody class="matriks-terbobot">

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                {{-- table Ranking --}}
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Tabel Perankingan</h4>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-2">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    Ranking
                                                </th>
                                                <th>Nama Tumbuhan</th>
                                                <th>Nilai Preferensi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="tabel-ranking">
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection

@section('script')

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        var arrayMatriks = []; //array matriks
        var pembagiMatriks = []; //pembagi
        var arrayMatriksNormal = []; // array matriks normalisasi
        var arrayMatriksNormalBobot = []; // array matriks terbobot

        var tumbuhan = [];
        var weights = [];

        function getPenyakit(id) {
            $.ajax({
                type: "POST",
                url: "{{ route('getPenyakit') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                },
                dataType: "JSON",
                success: function(response) {
                    var plants = response.tumbuhan;
                    var html = '';
                    tumbuhan = [];
                    plants.forEach((plant, index) => {
                        tumbuhan.push(plant.nama);
                        html += '<tr>' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td>' + plant.nama + '</td>' +
                            '<td>' + plant.bagian + '</td>' +
                            '<td>' + plant.pengolahan + '</td>' +
                            '<td>' + plant.penggunaan + '</td>' +
                            '<td>' + plant.jenis + '</td>' +
                            '</tr>';
                    });
                    $('.data-penyakit').animate({
                        'opacity': 0
                    }, 200, function() {
                        $(this).html(html).animate({
                            'opacity': 1
                        }, 200);
                    });
                }
            });
        }

        function getPembagi() {
            arrayMatriks = [];
            $('table > tbody  > tr.rowMatriks').each(function(index, tr) {
                var arrayRow = [];

                $(this).find("td.matriks").each(function() {
                    var isiCell = $(this).html();
                    arrayRow.push(parseFloat(isiCell));
                });
                arrayMatriks.push(arrayRow);
            });
            //hitung pembagi
            pembagiMatriks = [];
            $('table > tbody  > tr > td.pembagi').each(function(index, td) {
                var jumlahRow = 0;
                for (let i = 0; i < arrayMatriks.length; i++) {
                    if (arrayMatriks[i][index] == '') {
                        continue;
                    }
                    jumlahRow += parseFloat(Math.pow(arrayMatriks[i][index], 2));
                }
                pembagiMatriks.push(Math.sqrt(jumlahRow).toFixed(4));
                $(this).animate({
                    'opacity': 0
                }, 200, function() {
                    $(this).html(Math.sqrt(jumlahRow).toFixed(4)).animate({
                        'opacity': 1
                    }, 200);
                });
            });
        }

        function getMatriks(id) {
            $.ajax({
                type: "POST",
                url: "{{ route('getMatriks') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                },
                dataType: "JSON",
                success: function(response) {
                    var plants = response.tumbuhan;
                    weights = response.bobot;
                    var html = '';
                    plants.forEach((plant, index) => {
                        html += '<tr class="rowMatriks">' +
                            '<td>' + plant.nama + '</td>' +
                            '<td class="matriks">' + plant.bagian + '</td>' +
                            '<td class="matriks">' + plant.pengolahan + '</td>' +
                            '<td class="matriks">' + plant.penggunaan + '</td>' +
                            '<td class="matriks">' + plant.jenis + '</td>' +
                            '</tr>';
                    });
                    html += '<tr>' +
                        '<td>Bobot</td>';
                    weights.forEach((weight, index) => {
                        html += '<td>' + weight.bobot + '</td>';
                    })
                    html += '</tr>' +
                        '<tr>' +
                        '<td>Pembagi</td>';
                    weights.forEach((weight, index) => {
                        html += '<td class ="pembagi"></td>';
                    });
                    html += '</tr>';

                    $('.matriks-normalize').animate({
                        'opacity': 0
                    }, 200, function() {
                        $(this).html(html).animate({
                            'opacity': 1
                        }, 200);
                        getPembagi();
                        getMatriksNormalize();
                        getMatriksTerbobot();
                        getNilaiPreferensi(id);
                    });


                }
            });
        }

        function getMatriksNormalize() {
            //hitung matriks normal
            arrayMatriksNormal = [];

            for (let i = 0; i < arrayMatriks.length; i++) {
                var rowMatriksNormal = [];
                for (let j = 0; j < arrayMatriks[i].length; j++) {
                    var value = arrayMatriks[i][j] / pembagiMatriks[j];
                    if (isNaN(value)) {
                        rowMatriksNormal.push(0);
                    } else {
                        rowMatriksNormal.push(value.toFixed(4));
                    }

                }
                arrayMatriksNormal.push(rowMatriksNormal);
            }


            //masukkan ke table matriks normalisasi
            var html = '';

            tumbuhan.forEach((plant, index) => {
                html += '<tr class="rowMatriksNormal">' +
                    '<td>' + plant + '</td>';
                for (let j = 0; j < arrayMatriksNormal[index].length; j++) {
                    html += '<td>' + arrayMatriksNormal[index][j] + '</td>';
                }
                html += '</tr>';
            });

            $('.matriks-normalisasi').animate({
                'opacity': 0
            }, 200, function() {
                $(this).html(html).animate({
                    'opacity': 1
                }, 200);
            });

        }

        function getMatriksTerbobot() {
            arrayMatriksNormalBobot = [];
            //hitung matriks normal terbobot
            for (let i = 0; i < arrayMatriksNormal.length; i++) {
                var rowMatriksNormalBobot = [];
                for (let j = 0; j < arrayMatriksNormal[i].length; j++) {
                    var value = arrayMatriksNormal[i][j] * weights[j].bobot;
                    rowMatriksNormalBobot.push(value.toFixed(4));
                }
                arrayMatriksNormalBobot.push(rowMatriksNormalBobot);
            }

            //masukkan ke table matriks terbobot
            var html = '';

            tumbuhan.forEach((plant, index) => {
                html += '<tr class="rowMatriksNormalBobot">' +
                    '<td>' + plant + '</td>';
                for (let j = 0; j < arrayMatriksNormalBobot[index].length; j++) {
                    html += '<td>' + arrayMatriksNormalBobot[index][j] + '</td>';
                }
                html += '</tr>';
            });
            $('.matriks-terbobot').animate({
                'opacity': 0
            }, 200, function() {
                $(this).html(html).animate({
                    'opacity': 1
                }, 200);
            });

        }

        function getNilaiPreferensi(id) {
            $('.tabel-ranking').html('');
            $.ajax({
                type: "POST",
                url: "{{ route('preferensi') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    arrayMatriksNormalBobot: arrayMatriksNormalBobot,
                    penyakit_id: id,

                },
                dataType: "JSON",
                success: function(response) {


                    var output = sortJSON(response, 'nilai', '321');
                    var html = '';

                    output.forEach((plant, index) => {
                        html += '<tr class="rowRanking">' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td>' + plant.produk + '</td>' +
                            '<td>' + plant.nilai.toFixed(3) + '</td>' +
                            '</tr>';
                    });
                    $('.tabel-ranking').animate({
                        'opacity': 0
                    }, 200, function() {
                        $(this).html(html).animate({
                            'opacity': 1
                        }, 200);
                    });

                }
            });
        }



        function sortJSON(arr, key, way) {
            return arr.sort(function(a, b) {
                var x = a[key];
                var y = b[key];
                if (way === '123') {
                    return ((x < y) ? -1 : ((x > y) ? 1 : 0));
                }
                if (way === '321') {
                    return ((x > y) ? -1 : ((x < y) ? 1 : 0));
                }
            });
        }


        function getPenyakitFiltered(param) {
            $.ajax({
                type: "POST",
                url: "{{ route('getPenyakitFiltered') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    param: param,
                },
                dataType: "JSON",
                success: function(response) {
                    var plants = response.tumbuhan;
                    var html = '';
                    tumbuhan = [];
                    plants.forEach((plant, index) => {
                        tumbuhan.push(plant.nama);
                        html += '<tr>' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td>' + plant.nama + '</td>' +
                            '<td>' + plant.bagian + '</td>' +
                            '<td>' + plant.pengolahan + '</td>' +
                            '<td>' + plant.penggunaan + '</td>' +
                            '<td>' + plant.jenis + '</td>' +
                            '</tr>';
                    });
                    $('.data-penyakit').animate({
                        'opacity': 0
                    }, 200, function() {
                        $(this).html(html).animate({
                            'opacity': 1
                        }, 200);
                    });
                }
            });
        }

        function getMatriksFiltered(param) {
            $.ajax({
                type: "POST",
                url: "{{ route('getMatriksFiltered') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    param: param,
                },
                dataType: "JSON",
                success: function(response) {
                    console.log(response.tumbuhan);
                    var plants = response.tumbuhan;
                    weights = response.bobot;
                    var html = '';
                    plants.forEach((plant, index) => {
                        html += '<tr class="rowMatriks">' +
                            '<td>' + plant.nama + '</td>' +
                            '<td class="matriks">' + plant.bagian + '</td>' +
                            '<td class="matriks">' + plant.pengolahan + '</td>' +
                            '<td class="matriks">' + plant.penggunaan + '</td>' +
                            '<td class="matriks">' + plant.jenis + '</td>' +
                            '</tr>';
                    });
                    html += '<tr>' +
                        '<td>Bobot</td>';
                    weights.forEach((weight, index) => {
                        html += '<td>' + weight.bobot + '</td>';
                    })
                    html += '</tr>' +
                        '<tr>' +
                        '<td>Pembagi</td>';
                    weights.forEach((weight, index) => {
                        html += '<td class ="pembagi"></td>';
                    });
                    html += '</tr>';

                    $('.matriks-normalize').animate({
                        'opacity': 0
                    }, 200, function() {
                        $(this).html(html).animate({
                            'opacity': 1
                        }, 200);
                        getPembagi();
                        getMatriksNormalize();
                        getMatriksTerbobot();
                        getNilaiPreferensiFiltered(param);
                    });


                }
            });
        }

        function getNilaiPreferensiFiltered(param) {
            $('.tabel-ranking').html('');
            $.ajax({
                type: "POST",
                url: "{{ route('preferensiFiltered') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    arrayMatriksNormalBobot: arrayMatriksNormalBobot,
                    param: param,

                },
                dataType: "JSON",
                success: function(response) {


                    var output = sortJSON(response, 'nilai', '321');
                    var html = '';

                    output.forEach((plant, index) => {
                        html += '<tr class="rowRanking">' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td>' + plant.produk + '</td>' +
                            '<td>' + plant.nilai.toFixed(3) + '</td>' +
                            '</tr>';
                    });
                    $('.tabel-ranking').animate({
                        'opacity': 0
                    }, 200, function() {
                        $(this).html(html).animate({
                            'opacity': 1
                        }, 200);
                    });

                }
            });
        }


        $(document).ready(function() {

            $('.tab-penyakit').on('click', function() {
                var id = $(this).data('id');
                getPenyakit(id);
                getMatriks(id);

            });

            $('#buttonForm').on('click', function() {
                var jumlahActive = $('.tab-penyakit.active').length;
                if (jumlahActive > 0) {
                    if ($(this).hasClass('btn-outline-primary')) {
                        $(this).removeClass('btn-outline-primary');
                        $(this).addClass('btn-primary');
                    } else {
                        $(this).removeClass('btn-primary');
                        $(this).addClass('btn-outline-primary');
                    }
                    $('#form-additional').toggle('display');

                } else {
                    iziToast.error({
                        title: 'Gagal',
                        message: 'Silahkan pilih jenis penyakit terlebih dahulu',
                        position: 'topRight'
                    });
                }
            });

            $('#filterButton').on('click', function() {
                var bagian = $('#formBagian').val();
                var pengolahan = $('#formPengolahan').val();
                var penggunaan = $('#formPenggunaan').val();
                var jenis = $('#formJenis').val();
                var penyakit_id = $('.tab-penyakit.active').data('id');

                var param = {
                    bagian: bagian,
                    pengolahan: pengolahan,
                    penggunaan: penggunaan,
                    jenis: jenis,
                    penyakit_id: penyakit_id,
                }
                getPenyakitFiltered(param);
                getMatriksFiltered(param);

            });

        });

    </script>
@endsection
