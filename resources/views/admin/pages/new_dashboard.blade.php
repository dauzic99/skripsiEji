@extends('layouts.admin')

@section('header','DashBoard')
@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="card card-warning">
			<div class="card-body">
				<h6>Selamat Datang <strong>{{ Auth::user()->name }}</strong></h6>
			</div>
		</div>
	</div>
</div>

@endsection