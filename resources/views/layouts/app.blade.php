<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="container">
			<nav class="nav">
				<a class="nav-link" href="/admin/leads">Leads</a>
				<a class="nav-link" href="/admin/contents">Contents</a>
				<a class="nav-link" href="/admin/categories">Categories</a>
			</nav>
			<nav class="nav justify-content-end">
							<!-- Authentication Links -->
							@if (Auth::guest())
									<a class="nav-link" href="{{ route('login') }}">Login</a>
									<a class="nav-link" href="{{ route('register') }}">Register</a>
							@else
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
											{{ Auth::user()->name }} <span class="caret"></span>
									</a>

									<ul class="dropdown-menu" role="menu">
											<li>
													<a href="{{ route('logout') }}"
															onclick="event.preventDefault();
																			 document.getElementById('logout-form').submit();">
															Logout
													</a>

													<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
															{{ csrf_field() }}
													</form>
											</li>
									</ul>
							@endif
			</nav>

        @yield('content')
    </div>

    <!-- Scripts -->
		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
