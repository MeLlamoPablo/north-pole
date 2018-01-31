<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="/">northpole</a>

	<button class="navbar-toggler" type="button" data-toggle="collapse"
	        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
	        aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			@guest
				<li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
					<a class="nav-link" href="/">Inicio</a>
				</li>
			@else
				<li class="nav-item {{ Request::is('files') ? 'active' : '' }}">
					<a class="nav-link" href="/">Mis archivos</a>
				</li>
				<li class="nav-item {{ Request::is('users/' . Auth::user()->username) ? 'active' : '' }}">
					<a class="nav-link" href="/profile">Mi perfil</a>
				</li>
			@endguest
		</ul>
	</div>

	<div class="my-2 my-lg-0">
		@guest
			<a class="btn my-2 my-sm-0" href="{{route('login')}}">Iniciar sesión</a>
			<a class="btn btn-outline-primary my-2 my-sm-0"
			   href="{{route('register')}}">Registrarse</a>
		@else
			<span>¡Hola, {{Auth::user()->name ?: Auth::user()->username}}!</span>
			<a class="btn btn-outline-danger my-2 my-sm-0" href="{{ route('logout') }}">Salir</a>
		@endguest
	</div>
</nav>

