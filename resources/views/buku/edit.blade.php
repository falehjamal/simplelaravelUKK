@extends('dashboard.app')

@section('content')
@section('title','Ubah Buku')
<div class="container">
        	<div class="row">
        		<div class="col-md-12">
        			<div class="panel panel-default">
        				<div class="panel-heading">Ubah Buku</div>
        				<div class="panel-body">
        		<form method="post" action="{{ url('buku/'.$id) }}" enctype="multipart/form-data">
			{{method_field('PUT')}}
			{{ csrf_field() }}
			<label>Judul Buku</label>
			<input type="text" name="buku" required class="form-control" style="width: 30%;" value="{{ $data->buku }}">
			<label>Foto Buku</label>
			<input type="file" name="foto" accept="image/*" class="form-control" style="width: 30%;" value="{{ $data->photo }}"><br>
			<img src="{{ asset('uploads/'.$data->photo) }}" width="100px" height="100px">
			<br><br>
			<input type="submit" name="" value="Save" class="btn btn-primary">
			<a href="{{ url('buku') }}"><input type="button" name="" value="Batal" class="btn btn-warning"></a>
		</form>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
@endsection