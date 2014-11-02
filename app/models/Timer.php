<?php

class Timer extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required'
		);

	public function user()
	{
		return $this->belongsTo('User', 'user_id');
		
	}
}
