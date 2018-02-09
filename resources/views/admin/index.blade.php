@extends('dashboard.app')

@section('content')
@section('title','Admin')

<script src="{{ asset('js/jquery.min.js') }}"></script>

        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">Data User</div>
                <div class="panel-body">
                        {{-- <a href="{{ url('admin/create') }}" class="btn btn-primary btn-sm" style="margin: 10px;">Tambah User</a> --}}
                        <a href="">
                        <button class="btn btn-primary btn-sm pull-right" type="button">
                          Data User <span class="badge">{{count($jumlah)}}</span>
                        </button>
                        </a>
                        @if ($status = Session::get('status'))
                            {{-- <div class="container"> --}}
                                <div class="alert alert-info">
                                    {{$status}}
                                </div>    
                            {{-- </div> --}}
                        @endif
                        @if ($warning = Session::get('warning'))
                            {{-- <div class="container"> --}}
                                <div class="alert alert-warning">
                                    {{ $warning }}
                                </div>    
                            {{-- </div> --}}
                        @endif
    <table class="table table-striped">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Email</th>
        <th scope="col">Status</th>
        <th scope="col">Created_at</th>
        <th scope="col">Updated_at</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($data as $datas)
      <tr>
                    
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{$datas->name}}</td>    
                    <td>{{$datas->email}}</td>
                    <td>
                      @if ($datas->status == 'pending')
                        <span class="label label-warning">{{$datas->status}}</span>
                      @else  
                        <span class="label label-success">{{$datas->status}}</span>
                      @endif
                      {{-- {{$datas->status}} --}}
                    </td>
                    <td>{{$datas->created_at}}</td>
                    <td>{{$datas->updated_at}}</td>
                    <td>
                        <a href="{{ url($url.'/'.$datas->id.'/edit') }}" class="btn btn-info btn-xs" style="float: left;margin-right: 10px;">Edit</a>
                        <form action="{{ url($url.'/'.$datas->id) }}" method="post" style="float: left;">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                            <input type="submit" name="" value="Hapus" class="btn btn-danger btn-xs">
                        </form>
                    </td>
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

     <script src="//code.jquery.com/jquery-1.12.4.js"></script>
@endsection