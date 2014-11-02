@extends('layouts.admin')


@section('content')

<div class="col-md-12">
	{{ link_to_route('timers.create', 'Create a new timer', null, array('class' => 'btn btn-primary')) }}
</div>
@if($timers->count())
<h4>These are your current timers</h4>
	<div class="col-md-12">
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Name</th>
					<th>Start</th>
					<th>End</th>
					<th>Diff</th>
					<th>Preview</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				@foreach($timers as $p)
				<tr>
					<td>{{ $p->name }}</td>
					<td>
						@if ($p->startdate!='0000-00-00 00:00:00')
							<span class="label label-info">{{ $p->startdate}}</span>							
						@endif
					</td>
					<td>
						@if ($p->enddate!='0000-00-00 00:00:00')
							<span class="label label-info">{{ $p->enddate}}</span>							
						@endif
					</td>
					<td>
						@if ($p->enddate!='0000-00-00 00:00:00' and $p->startdate!='0000-00-00 00:00:00')
							<span class="label label-success">
								{{secondsToTimeFormated(strtotime($p->enddate)-strtotime($p->startdate));}}
							</span>
						@endif
					<td>
					@if ($p->startdate=='0000-00-00 00:00:00')						
						{{ Form::open(array('method'=>'post','action'=>'TimerController@start',"name"=>"form"))}}
						{{ Form::hidden('timer_id', $p->id) }}
						{{ Form::submit('Start', array('class' => 'btn btn-success')) }}
						{{ Form::close() }}
					@elseif ($p->enddate=='0000-00-00 00:00:00')
						{{ Form::open(array('method'=>'post','action'=>'TimerController@stop',"name"=>"form"))}}
						{{ Form::hidden('timer_id', $p->id) }}
						{{ Form::submit('Stop', array('class' => 'btn btn-warning')) }}
						{{ Form::close() }}
					@endif
					</td>
					<td>{{ link_to_route('timers.edit', 'Edit', array($p->id), array('class' => 'btn btn-info')) }}</td>
					<td>
						{{ Form::open(array('method' => 'DELETE', 'route' => array('timers.destroy', $p->id))) }}
						{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
						{{ Form::close() }}
					</td>
						
				</tr>
				@endforeach
			</tbody>
			<thead>
				<tr>
					<th colspan="3">Total</th>
					<th>{{ $total;}}</th>
				</tr>
			</thead>
		</table>
	</div>
	@else
	<div class="alert alert-info col-md-4" style="margin-top: 15px">You currently have no timers</div>
	@endif



@stop
