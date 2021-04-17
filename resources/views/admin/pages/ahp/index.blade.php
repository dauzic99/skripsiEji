@extends('admin.layout.template')
@section('css')



@endsection

@section('title')
AHP
@endsection
@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>AHP</h1>

            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
                <div class="breadcrumb-item">Kriteria</div>
            </div>
        </div>
        <div class="section-body">

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Pairwise Comparison</h4>

                        </div>
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
                                            <th>Eigen Value</th>
                                            <th>Bobot Prioritas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($criterion as $item)
                                        <tr class="rowPairwise">
                                            <td>{{ $item->nama }}</td>
                                            @for ($i = 0; $i < count($comparison[$loop->index]); $i++)
                                                <td class="pairwise">
                                                    <input type="number" class="crit form-control form-danger" id="{{ $loop->index + 1 }}{{ $i + 1 }}" required value="{{ $comparison[$loop->index][$i]->nilai }}" @if ($loop->index == $i) disabled @elseif ($loop->index > $i)
                                                    disabled @endif data-crit1="{{ $loop->index + 1 }}"
                                                    data-crit2="{{ $i + 1 }}" style="min-width: 100px;
                                                    @if ($loop->index == $i)
                                                    background-color:#CCF2F4;@endif ">
                                                </td>
                                                @endfor
                                                <td>{{ number_format($eigenValue[$loop->index], 4) }}</td>
                                                <td>{{ number_format($bobotPrioritas[$loop->index], 4) }}</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td><strong>Jumlah</strong></td>
                                            @foreach ($jumlah as $jumlahCrit)
                                            <td class="jumlah">{{ $jumlahCrit }}</td>
                                            @endforeach
                                            <td>{{ number_format($jumlahEigenValue,4) }}</td>
                                            <td>{{ $jumlahBobot }}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-success simpan">
                                <i class="fas fa-check-circle">&nbsp;Simpan</i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Uji Konsistensi</h4>

                        </div>
                        <div class="card-body">
                            <h5>Indeks Rasio = {{ $indeksRandom }}</h5>
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
                                            <th>Bobot Sintesa</th>
                                            <th>Eigen Maks</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($criterion as $kriteria)
                                        <tr class="rowConsistency">
                                            <td>{{ $kriteria->nama }}</td>
                                            @for ($i = 0; $i < count($comparison[$loop->index]); $i++)
                                                <td class="consistency">
                                                    {{ number_format($comparison[$loop->index][$i]->nilai / $jumlah[$i], 4) }}
                                                </td>
                                                @endfor
                                                <td class="bobotSintesa"></td>
                                                <td class="eigenMaks"></td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td><strong>Jumlah</strong></td>
                                            @foreach ($criterion as $itemKonsistensi)
                                            <td class="jumlahConsistency"></td>

                                            @endforeach
                                            <td></td>
                                            <td class="jumlahEigenMaks"></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div id="lambda">Maks Lambda = </div>
                            <div id="CI">CI = </div>
                            <div id="CR">CR = </div>
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

<script>
    $(document).ready(function() {
        var arrayJumlah = [];
        var arrayConsistency = [];
        $('table > tbody  > tr.rowPairwise').each(function(index, tr) {
            var arrayRow = [];

            $(this).find("td.pairwise").each(function() {
                var isiCell = $(this).find("input").val();
                arrayRow.push(isiCell);
            });
            arrayJumlah.push(arrayRow);

        });


        var bobotPrioritas = <?php echo json_encode($bobotPrioritas); ?>;
        var jumlahEigenMaks = 0;


        $('table > tbody  > tr.rowConsistency').each(function(index, tr) {
            var arrayRow = [];

            $(this).find("td.consistency").each(function() {
                var isiCell = $(this).html().trim();
                arrayRow.push(isiCell);
            });
            arrayConsistency.push(arrayRow);

            let numberArray = arrayRow.map(Number)
            var bobotSintesa = numberArray.reduce((a, b) => a + b, 0);
            $(this).find("td.bobotSintesa").html(bobotSintesa.toFixed(4));

            var eigenMaks = bobotSintesa / bobotPrioritas[index];
            jumlahEigenMaks += eigenMaks;
            $(this).find("td.eigenMaks").each(function() {
                $(this).html(eigenMaks.toFixed(4));
            });

        });
        $('table > tbody  > tr > td.jumlahEigenMaks').each(function(index, td) {
            $(this).html(jumlahEigenMaks.toFixed(4));
        });

        var jumlahKrit = <?php echo $jumlahKriteria; ?>;
        var maksLambda = jumlahEigenMaks / jumlahKrit;
        var CI = (maksLambda - jumlahKrit) / (jumlahKrit - 1);
        var CR = CI / <?php echo $indeksRandom; ?>;
        $('#lambda').html('Maks Lambda = ' + maksLambda.toFixed(4));
        $('#CI').html('CI = ' + CI.toFixed(4));
        $('#CR').html('CR = ' + CR.toFixed(4));


        $('table > tbody  > tr > td.jumlahConsistency').each(function(index, td) {
            var jumlahRow = 0;
            for (let i = 0; i < arrayConsistency.length; i++) {
                if (arrayConsistency[i][index] == '') {
                    continue;
                }
                jumlahRow += parseFloat(arrayConsistency[i][index]);
            }
            $(this).html(jumlahRow.toFixed(4));
            // console.log(jumlahRow);
        });

        $(".simpan").click(function() {
            swal({
                    title: 'Yakin ?',
                    text: 'Apakah Anda ingin Menyimpan Data ?',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: 'POST',
                            url: "/admin/ahp/save",
                            data: {
                                _token: '{{ csrf_token() }}',
                                data: arrayJumlah,
                            },
                            success: function(response) {
                                if (response.success) {
                                    swal({
                                        title: "Tersimpan!",
                                        text: response.success,
                                        buttonsStyling: false,
                                        confirmButtonClass: "btn btn-success",
                                        icon: "success"
                                    }).then((result) => {
                                        location.reload();
                                    });
                                }
                            }
                        });
                    } else {
                        swal('Data anda tidak jadi disimpan');
                    }
                });
        });
        $(".crit").change(function() {
            var value = $(this).val();
            var crit1 = $(this).data('crit1');
            var crit2 = $(this).data('crit2');
            var id = String(crit2) + String(crit1);
            var nilai = 1 / value;
            $("#" + id).val(nilai.toFixed(2));

            arrayJumlah = [];
            $('table > tbody  > tr.rowPairwise').each(function(index, tr) {
                var arrayRow = [];

                $(this).find("td.pairwise").each(function() {
                    var isiCell = $(this).find("input").val();
                    arrayRow.push(isiCell);
                });
                arrayJumlah.push(arrayRow);
            });
            $('table > tbody  > tr > td.jumlah').each(function(index, td) {
                var jumlahRow = 0;
                for (let i = 0; i < arrayJumlah.length; i++) {
                    if (arrayJumlah[i][index] == '') {
                        continue;
                    }
                    jumlahRow += parseFloat(arrayJumlah[i][index]);
                }
                $(this).html(jumlahRow);
                // console.log(jumlahRow);
            });
        });
    });
</script>
@endsection
