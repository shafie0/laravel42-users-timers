<?php

class TimerController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$timers = Timer::whereUserId(Auth::user()->id)->paginate(10);
		$total = DB::table('timers')
					 ->select(DB::raw('SUM( TIME_TO_SEC( TIMEDIFF( enddate, startdate ) ) ) as total'))
                     ->where('user_id', '=', Auth::user()->id)
                     ->where('enddate', '<>','0000-00-00 00:00:00')
                     ->groupBy('user_id')
                     ->get();
		if (empty($total)) {
			$total = 0;
		} else {
        	$total = secondsToTimeFormated($total[0]->total);
		}
        return View::make('timers.index', array('timers' => $timers, 'total' => $total));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('timers.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		$v = Validator::make($input, Timer::$rules);

		if ($v->passes()) {
			
			$timer = new Timer;
			$timer->name = Input::get('name');
			$timer->user_id = Auth::user()->id;
			$timer->save();

			return Redirect::route('timers.index');
		}

		return Redirect::back()->withErrors($v);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$timer = Timer::find($id);

		if(is_null($timer))
		{
			return Redirect::route('timers.index');
		}

        return View::make('timers.edit')->with('timer', $timer);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');

		$v = Validator::make($input, Timer::$rules);

		if($v->passes())
		{
			Timer::find($id)->update($input);
			return Redirect::route('timers.index');
		}

		return Redirect::back()->withErrors($v);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Timer::find($id)->delete();

		return Redirect::route('timers.index');
	}

	/**
	 * Start the timer.
	 *
	 * @return Response
	 */
	public function start()
	{
		$id=Input::get('timer_id');
		
		if(!is_null($id))
		{
			$timer=Timer::find($id);
			$timer->startdate=date("Y-m-d H:i:s");
			$timer->save();
		}

	        //return to the previous page after executing the action
        	return Redirect::back();
	}

	/**
	 * Stop (finish) the timer.
	 *
	 * @return Response
	 */
	public function stop()
	{
		$id=Input::get('timer_id');
		
		if(!is_null($id))
		{
			$timer=Timer::find($id);
			$timer->enddate=date("Y-m-d H:i:s");
			$timer->save();
		}

	        //return to the previous page after executing the action
        	return Redirect::back();
	}

}
