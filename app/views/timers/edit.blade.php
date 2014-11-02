@extends('layouts.admin')

@section('content')

<div class="col-md-12">
	{{ Form::model($timer, array('method' => 'PATCH', 'route' => array('timers.update', $timer->id))) }}
	@if($errors->any())
		<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			{{ implode('', $errors->all('<li class="error">:message</li>')) }}
		</div>
	@endif
	<div class="control-group">
	{{ Form::label('name', 'Name') }}
	{{ Form::text('name', Input::old('name'), array('class' => 'form-control', 'placeholder' => 'Please insert your timert title here...')) }}
	</div>
	<br>
	{{ Form::submit('Update', array('class' => 'btn btn-success')) }}
	{{ link_to_route('timers.index', 'Cancel', null, array('class' => 'btn btn-warning')) }}
	{{Form::close() }}
	
</div>

@stop