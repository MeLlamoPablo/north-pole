@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col">
			<div class="card">
				<div class="card-header">Subir archivo</div>
				<div class="card-body">
					<form class="form-horizontal" method="POST" action="{{ route('storeFile') }}">
						{{ csrf_field() }}

						<div class="{{ $errors->has('email') ? ' has-error' : '' }}">
							<label for="name" class="col-md-4 col-form-label">Nombre del
								archivo</label>

							<div class="col-md-6">
								<input
									id="name"
									type="text"
									class="form-control"
									name="name"
									value="{{ old('name') }}"
									required autofocus>

								@if ($errors->has('name'))
									<span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
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
