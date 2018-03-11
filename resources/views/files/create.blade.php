@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col">
			<div class="card">
				<div class="card-header">Subir archivo</div>
				<div class="card-body">
					<div class="col-md-6">
						<form
							class="form-horizontal"
							method="POST"
							action="{{ route('storeFile') }}"
							enctype="multipart/form-data"
						>
							{{ csrf_field() }}

							<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
								<label for="file">Selecciona el archivo:</label>
								<input
									type="file"
									class="form-control-file"
									id="file"
									name="file"
									required
								>

								@if ($errors->has('file'))
									<span class="help-block">
                                        <strong>{{ $errors->first('file') }}</strong>
                                    </span>
								@endif
							</div>

							<button type="submit" class="btn btn-primary">
								Enviar
							</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
