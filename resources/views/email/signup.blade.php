@extends('dashboard.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">Verifikasi Email</div>
				<div class="panel-body">
					<p>Hai <b>{{$namaemail}}</b>,</p>
					<p>Terima kasih atas partisipasinya. </p>
					<p>
						<a href="{{ $link }}" target="_blank"><button class="btn btn-lg btn-primary">Konfirmasi E-mail</button></a>
					</p>
				</div>
					<div class="panel-footer">
						<span class="align-center">Copy right tokobuku @falehjamaluddin</span>
					</div>
			</div>
		<div class="col-md-2"></div>
		</div>
	</div>
</div>



@endsection