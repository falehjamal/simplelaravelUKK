@extends('dashboard.app')

@section('content')
@section('title','Ubah User')
<div class="container">
        	<div class="row">
        		<div class="col-md-12">
        			<div class="panel panel-default">
        				<div class="panel-heading">Ubah User</div>
        				<div class="panel-body">
        		<form method="post" action="{{ url('admin/'.$id) }}">
			{{method_field('PUT')}}
			{{ csrf_field() }}
			<label>Status</label>
			<select name="status" class="form-control" style="width: 30%;">
				<option value="pending" @if ($data->status == 'pending') selected @endif>Pending</option>
				<option value="activated" @if ($data->status == 'activated') selected @endif>Activated</option>
			</select><br>
			<input type="submit" name="" value="Save" class="btn btn-primary">
			<a href="{{ url('admin') }}"><input type="button" name="" value="Batal" class="btn btn-warning"></a>
		</form>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
@endsection