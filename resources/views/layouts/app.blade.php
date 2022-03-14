<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>AFSP CMS</title>


	<link href="{{ url(asset('css/styles.css')) }}" rel="stylesheet" />
	<style>
		.accordion-button::after {
			background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='%23333' xmlns='http://www.w3.org/2000/svg'%3e%3cpath fill-rule='evenodd' d='M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z' clip-rule='evenodd'/%3e%3c/svg%3e");
			transform: scale(0.75) !important;
		}
		.accordion-button:not(.collapsed)::after {
			background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='%23333' xmlns='http://www.w3.org/2000/svg'%3e%3cpath fill-rule='evenodd' d='M0 8a1 1 0 0 1 1-1h14a1 1 0 1 1 0 2H1a1 1 0 0 1-1-1z' clip-rule='evenodd'/%3e%3c/svg%3e");
		}
		/*!
 * Load Awesome v1.1.0 (http://github.danielcardoso.net/load-awesome/)
 * Copyright 2015 Daniel Cardoso <@DanielCardoso>
 * Licensed under MIT
 */
		.la-ball-spin-fade-rotating,
		.la-ball-spin-fade-rotating > div {
			position: relative;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
		}
		.la-ball-spin-fade-rotating {
			display: block;
			font-size: 0;
			color: #fff;
		}
		.la-ball-spin-fade-rotating.la-dark {
			color: #333;
		}
		.la-ball-spin-fade-rotating > div {
			display: inline-block;
			float: none;
			background-color: currentColor;
			border: 0 solid currentColor;
		}
		.la-ball-spin-fade-rotating {
			width: 32px;
			height: 32px;
			-webkit-animation: ball-spin-fade-rotate 6s infinite linear;
			-moz-animation: ball-spin-fade-rotate 6s infinite linear;
			-o-animation: ball-spin-fade-rotate 6s infinite linear;
			animation: ball-spin-fade-rotate 6s infinite linear;
		}
		.la-ball-spin-fade-rotating > div {
			position: absolute;
			top: 50%;
			left: 50%;
			width: 8px;
			height: 8px;
			margin-top: -4px;
			margin-left: -4px;
			border-radius: 100%;
			-webkit-animation: ball-spin-fade 1s infinite linear;
			-moz-animation: ball-spin-fade 1s infinite linear;
			-o-animation: ball-spin-fade 1s infinite linear;
			animation: ball-spin-fade 1s infinite linear;
		}
		.la-ball-spin-fade-rotating > div:nth-child(1) {
			top: 5%;
			left: 50%;
			-webkit-animation-delay: -1.125s;
			-moz-animation-delay: -1.125s;
			-o-animation-delay: -1.125s;
			animation-delay: -1.125s;
		}
		.la-ball-spin-fade-rotating > div:nth-child(2) {
			top: 18.1801948466%;
			left: 81.8198051534%;
			-webkit-animation-delay: -1.25s;
			-moz-animation-delay: -1.25s;
			-o-animation-delay: -1.25s;
			animation-delay: -1.25s;
		}
		.la-ball-spin-fade-rotating > div:nth-child(3) {
			top: 50%;
			left: 95%;
			-webkit-animation-delay: -1.375s;
			-moz-animation-delay: -1.375s;
			-o-animation-delay: -1.375s;
			animation-delay: -1.375s;
		}
		.la-ball-spin-fade-rotating > div:nth-child(4) {
			top: 81.8198051534%;
			left: 81.8198051534%;
			-webkit-animation-delay: -1.5s;
			-moz-animation-delay: -1.5s;
			-o-animation-delay: -1.5s;
			animation-delay: -1.5s;
		}
		.la-ball-spin-fade-rotating > div:nth-child(5) {
			top: 94.9999999966%;
			left: 50.0000000005%;
			-webkit-animation-delay: -1.625s;
			-moz-animation-delay: -1.625s;
			-o-animation-delay: -1.625s;
			animation-delay: -1.625s;
		}
		.la-ball-spin-fade-rotating > div:nth-child(6) {
			top: 81.8198046966%;
			left: 18.1801949248%;
			-webkit-animation-delay: -1.75s;
			-moz-animation-delay: -1.75s;
			-o-animation-delay: -1.75s;
			animation-delay: -1.75s;
		}
		.la-ball-spin-fade-rotating > div:nth-child(7) {
			top: 49.9999750815%;
			left: 5.0000051215%;
			-webkit-animation-delay: -1.875s;
			-moz-animation-delay: -1.875s;
			-o-animation-delay: -1.875s;
			animation-delay: -1.875s;
		}
		.la-ball-spin-fade-rotating > div:nth-child(8) {
			top: 18.179464974%;
			left: 18.1803700518%;
			-webkit-animation-delay: -2s;
			-moz-animation-delay: -2s;
			-o-animation-delay: -2s;
			animation-delay: -2s;
		}
		.la-ball-spin-fade-rotating.la-sm {
			width: 16px;
			height: 16px;
		}
		.la-ball-spin-fade-rotating.la-sm > div {
			width: 4px;
			height: 4px;
			margin-top: -2px;
			margin-left: -2px;
		}
		.la-ball-spin-fade-rotating.la-2x {
			width: 64px;
			height: 64px;
		}
		.la-ball-spin-fade-rotating.la-2x > div {
			width: 16px;
			height: 16px;
			margin-top: -8px;
			margin-left: -8px;
		}
		.la-ball-spin-fade-rotating.la-3x {
			width: 96px;
			height: 96px;
		}
		.la-ball-spin-fade-rotating.la-3x > div {
			width: 24px;
			height: 24px;
			margin-top: -12px;
			margin-left: -12px;
		}
		/*
		 * Animations
		 */
		@-webkit-keyframes ball-spin-fade-rotate {
			100% {
				-webkit-transform: rotate(360deg);
				transform: rotate(360deg);
			}
		}
		@-moz-keyframes ball-spin-fade-rotate {
			100% {
				-moz-transform: rotate(360deg);
				transform: rotate(360deg);
			}
		}
		@-o-keyframes ball-spin-fade-rotate {
			100% {
				-o-transform: rotate(360deg);
				transform: rotate(360deg);
			}
		}
		@keyframes ball-spin-fade-rotate {
			100% {
				-webkit-transform: rotate(360deg);
				-moz-transform: rotate(360deg);
				-o-transform: rotate(360deg);
				transform: rotate(360deg);
			}
		}
		@-webkit-keyframes ball-spin-fade {
			0%,
			100% {
				opacity: 1;
				-webkit-transform: scale(1);
				transform: scale(1);
			}
			50% {
				opacity: .25;
				-webkit-transform: scale(.5);
				transform: scale(.5);
			}
		}
		@-moz-keyframes ball-spin-fade {
			0%,
			100% {
				opacity: 1;
				-moz-transform: scale(1);
				transform: scale(1);
			}
			50% {
				opacity: .25;
				-moz-transform: scale(.5);
				transform: scale(.5);
			}
		}
		@-o-keyframes ball-spin-fade {
			0%,
			100% {
				opacity: 1;
				-o-transform: scale(1);
				transform: scale(1);
			}
			50% {
				opacity: .25;
				-o-transform: scale(.5);
				transform: scale(.5);
			}
		}
		@keyframes ball-spin-fade {
			0%,
			100% {
				opacity: 1;
				-webkit-transform: scale(1);
				-moz-transform: scale(1);
				-o-transform: scale(1);
				transform: scale(1);
			}
			50% {
				opacity: .25;
				-webkit-transform: scale(.5);
				-moz-transform: scale(.5);
				-o-transform: scale(.5);
				transform: scale(.5);
			}
		}
	</style>
	@livewireStyles
	<script src="//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
	<script src="//cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
</head>
<body>
<div id="app">
	<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
		<!-- Navbar Brand-->
		<a class="navbar-brand ps-3" href="/">AFSP</a>
	@auth
		<!-- Sidebar Toggle-->
			<button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
			<!-- Navbar-->
			<ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
					<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
						<li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
					</ul>
				</li>
			</ul>
		@endauth
	</nav>
	<div id="layoutSidenav">
		@auth
			<div id="layoutSidenav_nav">
				<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
					<div class="sb-sidenav-menu">
						<div class="nav">

							<a class="nav-link" href="{{url('admin')}}">
								<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
								Dashboard
							</a>
							<a class="nav-link" href="{{url('admin/memories')}}">
								<div class="sb-nav-link-icon"><i class="fas fa-memory"></i></div>
								Memories
							</a>
							<a class="nav-link" href="{{url('admin/resources')}}">
								<div class="sb-nav-link-icon"><i class="fas fa-hands-helping"></i></div>
								Resources
							</a>
							<a class="nav-link" href="{{url('admin/users')}}">
								<div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
								Users
							</a>
						</div>
					</div>
					<div class="sb-sidenav-footer">
						<div class="small">Logged in as:</div>
						{{Auth::User()->name}}
					</div>
				</nav>
			</div>

		@endauth
		<div id="layoutSidenav_content">
			<main>
				<div class="container-fluid py-4 px-4">
					@isset($slot)
						{{ $slot }}
					@else
						@include('flash-message')
						@yield('content')
					@endisset
				</div>
			</main>
		</div>
	</div>
	<script src="//cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
	<script
		src="//code.jquery.com/jquery-3.6.0.min.js"
		integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
		crossorigin="anonymous"></script>

	@livewireScripts
	<script src="{{ asset('js/scripts.js') }} "></script>
	@stack('scripts')

</div>



</body>
</html>
