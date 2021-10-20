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


                {{-- table data tumbuhan --}}


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

        var pegawais = [];
        var weights = [];


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

        function getMatriks() {
            $.ajax({
                type: "POST",
                url: "{{ route('getMatriks') }}",
                data: {
                    _token: '{{ csrf_token() }}',

                },
                dataType: "JSON",
                success: function(response) {
                    pegawais = response.pegawais;
                    weights = response.bobot;
                    var html = '';
                    pegawais.forEach((pegawai, indexP) => {
                        html += '<tr class="rowMatriks">' +
                            '<td>' + pegawai.nama + '</td>';
                        weights.forEach((weight, indexW) => {
                            html += '<td class="matriks">' + pegawai["crit_" + (indexW + 1)] +
                                '</td>';

                        });
                        html += '</tr>';
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
                        getNilaiPreferensi();
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

            pegawais.forEach((pegawai, index) => {
                html += '<tr class="rowMatriksNormal">' +
                    '<td>' + pegawai.nama + '</td>';
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

            pegawais.forEach((pegawai, index) => {
                html += '<tr class="rowMatriksNormalBobot">' +
                    '<td>' + pegawai.nama + '</td>';
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

        function getNilaiPreferensi() {
            $('.tabel-ranking').html('');
            $.ajax({
                type: "POST",
                url: "{{ route('preferensi') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    arrayMatriksNormalBobot: arrayMatriksNormalBobot,

                },
                dataType: "JSON",
                success: function(response) {


                    var output = sortJSON(response, 'nilai', '321');
                    var html = '';

                    output.forEach((pegawai, index) => {
                        html += '<tr class="rowRanking">' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td>' + pegawai.produk + '</td>' +
                            '<td>' + pegawai.nilai.toFixed(3) + '</td>' +
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




        function getMatriksFiltered(param) {
            console.log(param);
            $.ajax({
                type: "POST",
                url: "{{ route('getMatriksFiltered') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    param: param,
                },
                dataType: "JSON",
                success: function(response) {
                    pegawais = response.pegawais;
                    weights = response.bobot;
                    var html = '';
                    pegawais.forEach((pegawai, indexP) => {
                        html += '<tr class="rowMatriks">' +
                            '<td>' + pegawai.nama + '</td>';
                        weights.forEach((weight, indexW) => {
                            html += '<td class="matriks">' + pegawai["crit_" + (indexW + 1)] +
                                '</td>';

                        });
                        html += '</tr>';
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
            getMatriks();

            $('.tab-penyakit').on('click', function() {
                var id = $(this).data('id');
                var param = {
                    bagian_id: id,
                }
                getMatriksFiltered(param);

            });


        });

    </script>
@endsection
