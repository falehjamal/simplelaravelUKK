@extends('dashboard.app')

@section('content')
@section('title','Buku')

<script src="{{ asset('js/jquery.min.js') }}"></script>

        <div class="container">
        	<div class="row">
        		<div class="col-md-12">
        			<div class="panel panel-default">
        				<div class="panel-heading">Buku</div>
        				<div class="panel-body">
                        <a href="{{ url('buku/create') }}" class="btn btn-primary btn-sm" style="margin: 10px;">Tambah Buku</a>
                        @if ($status = Session::get('status'))
                            {{-- <div class="container"> --}}
                                <div class="alert alert-info">
                                    {{$status}}
                                </div>    
                            {{-- </div> --}}
                        @endif
                    {{-- <form method="post" action="{{ url('buku/search') }}" class="pull-right">
                        {{method_field('POST')}}
                        {{csrf_field()}}
                        <input type="text" name="cari" class="form-control">
                        <input type="submit" name="" class="btn btn-primary" style="display: inline-block;">
                    </form> --}}
    <table class="table table-striped">
		<thead class="thead-dark">
			<tr>
				<th scope="col">#</th>
				<th scope="col">Foto Buku</th>
				<th scope="col">Judul Buku</th>
				<th scope="col">Actions</th>
			</tr>
		</thead>
		<tbody>
		@foreach ($data as $datas)
			<tr>
                @if ($datas != null)
                    
                    <th scope="row">{{ $no++ }}</th>
                    @if ($datas->photo != null)
                    <td><a href="{{ asset('uploads/'.$datas->photo) }}"><img src="{{ asset('uploads/'.$datas->photo) }}" width="50px" height="50px"></a></td>
                    @else
                    <td>Photo tiada guna</td>    
                    @endif
                    <td>{{ $datas->buku }}</td>
                    <td>
                        <a href="{{ url('buku/'.$datas->id.'/edit') }}" class="btn btn-info btn-xs" style="float: left;margin-right: 10px;"><span class="glyphicon glyphicon-pencil"></span></a>
                        <form action="{{ url('buku/'.$datas->id) }}" method="post" style="float: left;">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                            <button type="submit" class="btn btn-danger btn-xs">
                                <span class="glyphicon glyphicon-trash"></span>
                            </button>
                            {{-- <input type="submit" name="" value="Hapus" class="btn btn-danger btn-xs"> --}}
                        </form>
                    </td>
                @elseif($datas == null)
                <td>Data tiada guna</td>
                @endif
			</tr>
		@endforeach
		</tbody>
	</table>


    <center>{{$data->links('vendor.pagination.bootstrap-4')}}</center>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>

     {{-- <script src="//code.jquery.com/jquery-1.12.4.js"></script> --}}
     <script type="text/javascript">
        document.ready(function(){
            $('.alert').show(3000);
        });
        </script>
@endsection