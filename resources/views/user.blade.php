@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col">
			<div class="card">
				<div class="card-header">
					Perfil de {{ $user->username }}
				</div>
				<div class="card-body">
					<div class="media">
						<img class="img-fluid" src="{{ Gravatar::get($user->email) }}">
						<div class="media-body">
							<ul>
								<li>
									<b>Email</b>: {{$user->email}}
								</li>
								@if(!empty($user->name) && !empty($user->lastName))
									<li>
										<b>Nombre</b>: {{$user->name}} {{$user->lastName}}
									</li>
								@endif
								@if(!empty($user->website))
									<li>
										<b>Página web</b>:
										<a
											href="{{$user->website}}"
											target="_blank"
											rel="noopener"
										>
											{{$user->website}}
										</a>
									</li>
								@endif
								@if(!empty($user->about))
									<li>
										<b>Acerca de {{$user->name ?: $user->username}}</b>:
										{{$user->about}}
									</li>
								@endif
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
