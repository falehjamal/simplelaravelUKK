@extends('dashboard.app')

@section('content')
@section('title','Tambah Buku')
<div class="container">
        	<div class="row">
        		<div class="col-md-12">
        			<div class="panel panel-default">
        				<div class="panel-heading">Tambah Buku</div>
        				<div class="panel-body">
        		<form method="post" action="{{ url('buku') }}" enctype="multipart/form-data">
			{{method_field('POST')}}
			{{ csrf_field() }}
			<label>* Judul Buku</label>
			<input type="text" name="buku" required class="form-control" style="width: 30%;">
			<label>Foto Buku</label>
			<input type="file" name="foto" accept="image/*" class="form-control" style="width: 30%;">
			<br>
			<input type="submit" name="" value="Save" class="btn btn-primary">
			<a href="{{ url('buku') }}"><input type="button" name="" value="Batal" class="btn btn-warning"></a>
		</form>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
@endsection