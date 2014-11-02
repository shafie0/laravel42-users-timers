@extends('layouts.admin')

@section('content')

<div class="col-lg-8">
	<hr>
	<h1>{{ $timer->name }}</h1>
	<p class="lead">{{ ucwords($timer->user->username) }}</p>
	<hr>
	<p><span class="glyphicon glyphicon-time"></span> Created {{ $date }}</p>
	<hr>
	<p class="lead">{{ $timer->body }}</p>
</div>

<div class="col-lg-4">
	<div class="well">
		<legend>What would you like to do next?</legend>
		{{ link_to_route('timers.edit', 'Update', array($timer->id), array('class' => 'btn btn-primary')) }}
		{{ link_to_route('timers.index', 'Back to index', null, array('class' => 'btn btn-warning')) }}
		<br>
	</div>
</div>

@stop