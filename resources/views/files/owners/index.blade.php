@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col col-md-12">
			<div class="card">
				<div class="card-header">Propietarios de {{ $file->name }}</div>
				<div class="card-body">
					<h4>Propietarios actuales</h4>
					<ul>
						@foreach($owners as $owner)
							<li>
								<a href="/users/{{$owner->username}}">
									{{$owner->username}}
								</a>
							</li>
						@endforeach
					</ul>

					<h4>Añadir propietario</h4>
					<form
						class="form-horizontal"
						method="POST"
						action="/files/{{$file->id}}/owners"
					>
						{{ csrf_field() }}

						<div class="{{ $errors->has('username') ? ' has-error' : '' }}">
							<label for="username" class="col-md-4 col-form-label">
								Nombre de usuario:
							</label>

							<div class="col-md-6">
								<input
									id="username"
									type="text"
									class="form-control"
									name="username"
									value="{{ old('username') }}"
									required>

								@if ($errors->has('username'))
									<span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
								@endif
							</div>
						</div>

						<button type="submit" class="btn btn-primary">
							Enviar
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
