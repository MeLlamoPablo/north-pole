@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col col-md-8">
			<div class="card">
				<div class="card-header">
					{{ $file->name }}
				</div>
				<div class="card-body">
					<p>Hola mundo</p>
				</div>
			</div>
		</div>
		<div class="col col-md-4">
			<div class="card">
				<div class="card-header">
					Acciones
				</div>
				<div class="card-body">
					<a
						class="btn btn-default"
						href="/files/{{$file->id}}/owners"
					>
						Propietarios
					</a>
				</div>
			</div>
		</div>
	</div>
@endsection
