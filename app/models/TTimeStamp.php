<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Capsule\Manager as Capsule;

class TTimeStamp extends Eloquent
{
	protected $table  = "ticket_timestamp";
	protected $primaryKey = "ticket_time_stamp_id";
	protected $fillable = array('time_stamp_type','start_datetime', 'end_datetime', 'jira_ticket_id');
	public $timestamps = false;
	
	
	
}

?>