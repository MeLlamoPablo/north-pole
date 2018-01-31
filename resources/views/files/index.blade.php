@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col col-md-8">
			<div class="card">
				<div class="card-header">Mis archivos</div>
				<div class="card-body">
					@if($files->isEmpty())
						Todavía no has subido archivos
					@else
						<ul>
							@foreach($files as $file)
								<li>{{$file->name}}</li>
							@endforeach
						</ul>
					@endif
				</div>
			</div>
		</div>
		<div class="col col-md-4">
			<div class="card">
				<div class="card-header">Opciones</div>
				<div class="card-body">
					<a href="/files/create" class="btn btn-success">Nuevo archivo</a>
				</div>
			</div>
		</div>
	</div>
@endsection
