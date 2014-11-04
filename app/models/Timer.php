<?php
use Carbon\Carbon;

class Timer extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required'
		);

	public function user()
	{
		return $this->belongsTo('User', 'user_id');
		
	}

	/**
	 * Start the timer.
	 *
	 * @return Response
	 */
	public static function start()
	{
		$id=Input::get('timer_id');
		
		if(!is_null($id))
		{
			$dt = Carbon::now();
			$timer=Timer::find($id);
			$timer->startdate=$dt->toDateTimeString();
			$timer->save();
		}
	}

	/**
	 * Stop (finish) the timer.
	 *
	 * @return Response
	 */
	public static function stop()
	{
		$id=Input::get('timer_id');
		
		if(!is_null($id))
		{
			$dt = Carbon::now();
			$timer=Timer::find($id);
			$timer->enddate=$dt->toDateTimeString();
			$timer->save();
		}
	}
}
