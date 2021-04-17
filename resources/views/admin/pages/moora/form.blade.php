@extends('admin.layout.template')
@section('css')

    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/dt-1.10.23/b-1.6.5/r-2.2.7/sp-1.2.2/sl-1.3.1/datatables.min.css" />



@endsection

@section('title')
    User
@endsection
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Moora</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                    <div class="breadcrumb-item">User</div>
                </div>
            </div>
            <div class="section-body">
                <div class="section-header-button">
                    <a href="/admin/moora/proses" class="btn btn-primary">Tambah</a>
                </div>


                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Form</h4>

                            </div>
                            <form action="{{ route('moora.proses') }}" method="POST">
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
                                            <div class="col-sm-12 col-md-12 col-lg-6">
                                                <div class="form-group mb-4">
                                                    <label class="form-label text-md-left ">
                                                        {{ $criteria->nama }}
                                                    </label>
                                                    @if (View::exists('admin.form.' . $nama))
                                                        @includeIf('admin.form.'.$nama, ['nama' => $nama])
                                                    @else
                                                        <input type="text" class="form-control" required
                                                            name="{{ $nama }}" value="{{ old($nama) }}">
                                                    @endif

                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary" type="submit">Proses</button>
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
                                url: "/admin/user/" + id,
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
