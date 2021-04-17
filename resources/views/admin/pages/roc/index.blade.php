@extends('admin.layout.template')
@section('css')

    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/dt-1.10.23/b-1.6.5/r-2.2.7/sp-1.2.2/sl-1.3.1/datatables.min.css" />



@endsection

@section('title')
    Rank Order Centroid
@endsection
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Rank Order Centroid</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                    <div class="breadcrumb-item">Rank Order Centroid</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Kriteria</h4>
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
                                    <table class="table table-striped" id="sortable-table">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    <i class="fas fa-th"></i>
                                                </th>
                                                <th>Rank</th>
                                                <th>Nama</th>
                                                <th>Tipe</th>
                                                <th>Bobot</th>
                                            </tr>
                                        </thead>
                                        <tbody class="sort-item">
                                            @foreach ($criterion as $item)
                                                <tr data-id="{{ $item->id }}">
                                                    <td class="text-center">
                                                        <div class="sort-handler">
                                                            <i class="fas fa-th"></i>
                                                        </div>
                                                    </td>
                                                    <td class="rank-roc">{{ $loop->index + 1 }}</td>
                                                    <td>{{ $item->nama }}</td>
                                                    <td>{{ $item->tipe }}</td>
                                                    <td class="bobot-roc">{{ $item->bobot }}</td>
                                                </tr>
                                            @endforeach
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
            $('.sort-item').sortable({
                start: function(event, ui) {
                    ui.item.data('start_pos', ui.item.index());
                },
                stop: function(event, ui) {
                    var start_pos = ui.item.data('start_pos');
                    if (start_pos != ui.item.index()) {
                        console.log('tepindah');
                    } else {
                        console.log('nda pindah');
                    }
                },
                update: function(event, ui) {
                    $('table > tbody  > tr > td.rank-roc').each(function(index, td) {
                        $(this).html(index + 1);
                        var value = $(this).html();
                    });
                }
            });

            $('.simpan').on('click', function() {
                var orderArray = [];
                $('table > tbody  > tr').each(function(index, tr) {
                    var id = $(this).data('id');
                    var rank = 0;
                    $(this).find("td.rank-roc").each(function() {
                        rank = $(this).html();
                    });

                    orderArray.push({
                        'id': id,
                        'rank': rank
                    });
                });
                $.ajax({
                    type: "POST",
                    url: "{{ route('roc.update') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        orderArray,
                    },
                    dataType: "JSON",
                    success: function(response) {
                        iziToast.success({
                            title: 'Updated',
                            message: response.success,
                            position: 'topRight'
                        });
                    }
                });

                $.ajax({
                    type: "GET",
                    url: "{{ route('roc.bobot') }}",
                    dataType: "JSON",
                    success: function(response) {
                        console.log(response.bobot);
                        $('table > tbody  > tr > td.bobot-roc').each(function(index, td) {
                            $(this).html(response.bobot[index].bobot);
                        });
                    }
                });
            });
        });

    </script>
@endsection
