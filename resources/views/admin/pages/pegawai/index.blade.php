@extends('admin.layout.template')
@section('css')

    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/dt-1.10.23/b-1.6.5/r-2.2.7/sp-1.2.2/sl-1.3.1/datatables.min.css" />



@endsection

@section('title')
    Pegawai
@endsection
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Pegawai</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                    <div class="breadcrumb-item">Pegawai</div>
                </div>
            </div>
            <div class="section-body">
                <div class="section-header-button">
                    <a href="{{ route('pegawai.create') }}" class="btn btn-primary">Tambah</a>
                </div>


                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Pegawai</h4>

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
                                                <th width="5%" class="text-center">
                                                    #
                                                </th>
                                                <th width="10%">Cover</th>
                                                <th>Nama</th>
                                                <th>Bagian</th>
                                                <th width="20%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pegawais as $item)
                                                <tr id="{{ $item->id }}">
                                                    <td class="align-middle">
                                                        {{ $loop->index + 1 }}
                                                    </td>
                                                    <td>
                                                        <img src="{{ asset('images/pegawai/cover/' . $item->cover) }}"
                                                            alt="" class="img-fluid">
                                                    </td>
                                                    <td class="align-middle">{{ $item->nama }}</td>
                                                    <td class="align-middle">{{ $item->bagian->nama }}</td>

                                                    <td class="align-middle">
                                                        <a href="{{ route('pegawai.detail', ['slug' => $item->slug]) }}"
                                                            class="btn btn-outline-primary" style="margin: 5px;">
                                                            <i class="fas fa-id-card    "></i>
                                                        </a>
                                                        <a href="{{ route('pegawai.edit', ['slug' => $item->slug]) }}"
                                                            class="btn btn-primary" style="margin: 5px;">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="#" class="btn btn-danger delete">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach

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
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4/dt-1.10.23/b-1.6.5/r-2.2.7/sp-1.2.2/sl-1.3.1/datatables.min.js"></script>
    <script src="{{ asset('stisla-master/assets/js/page/modules-datatables.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        $(document).ready(function() {
            $(".delete").click(function() {
                var id = $(this).parents("tr").attr("id");
                swal({
                        title: 'Are you sure?',
                        text: 'Once deleted, you will not be able to recover this post!',
                        icon: 'warning',
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            console.log('id :' + id);
                            $.ajax({
                                type: 'DELETE',
                                url: "/admin/pegawai/" + id,
                                data: {
                                    _token: '{{ csrf_token() }}',
                                },
                                success: function(response) {
                                    if (response.success) {
                                        swal({
                                            title: "Terhapus!",
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
                            swal('Data anda tidak jadi dihapus');
                        }
                    });

            });
        });

    </script>
@endsection
