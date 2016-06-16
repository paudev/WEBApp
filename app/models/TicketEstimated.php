<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Capsule\Manager as Capsule;

class TicketEstimated extends Eloquent
{
	protected $table  = "ticket_estimated";
	protected $primaryKey = "ticket_estimated_id";
	protected $fillable = array('jira_ticket_id', 'tcc_floe', 'tcc_complexity', 'tcc_start_date', 'tcc_end_date', 'tce_floe', 'tce_complexity', 'tce_start_date', 'tce_end_date', 'job_process');
	public $timestamps = false;
	
}

?>