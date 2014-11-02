@extends('layouts.admin')

@section('content')

<h2>Hello {{ ucwords(Auth::user()->username) }}</h2>
<div class="row-fluid">
	<div class="span3">
		<ul class="nav nav-list well">
			@if(Auth::user())
			<li>{{ HTML::link('timers', 'List all the timers') }}</li>
			<li>{{ HTML::link('logout', 'Logout') }}</li>
			<li>What else...</li>
			@else
			<li>{{ HTML::link('login', 'Login') }}</li>
			@endif
		</ul>
	</div>
	<div class="span9">
		@yield('content')
	</div>
</div>
@stop