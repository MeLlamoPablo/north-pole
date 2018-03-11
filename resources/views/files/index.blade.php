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
						<table class="table">
							<thead>
								<tr>
									<th>Nombre</th>
									<th>Tamaño</th>
								</tr>
							</thead>
							<tbody>
								@foreach($files as $file)
									<tr>
										<td>
											<a href="/files/{{$file->id}}">
												{{$file->name}}
											</a>
										</td>
										<td>
											{{$file->getSizeMB()}} MB
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
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
