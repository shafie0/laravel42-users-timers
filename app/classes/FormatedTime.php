<?php

 
class FormatedTime
{
 	/*
     * @param integer $seconds Number of seconds to parse
     * @return string
     */
	 public function getFormatedTime($seconds)
	{
	    // extract hours
	    $hours = floor($seconds / (60 * 60));
	 
	    // extract minutes
	    $divisor_for_minutes = $seconds % (60 * 60);
	    $minutes = floor($divisor_for_minutes / 60);
	 
	    // extract the remaining seconds
	    $divisor_for_seconds = $divisor_for_minutes % 60;
	    $seconds = ceil($divisor_for_seconds);
	 	$obj = array(
            "h" => (int) $hours,
            "m" => (int) $minutes,
            "s" => (int) $seconds,
        );
	    return $obj['h'].'h '.$obj['m'].'m '.$obj['s'].'s ';
	}
}
