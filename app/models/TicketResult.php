<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Capsule\Manager as Capsule;

class TicketResult extends Eloquent {

	protected $table  = "ticket_result";
	protected $primaryKey = "ticket_result_id";
	protected $fillable = array('result', 'release_id', 'browser_id', 'test_case_detail_id', 'jira_ticket_id');
	public $timestamps = false;

	/*
	This method gets all test case results for Jira Ticket
	Refactor function
	*/
	protected function getTicketResults($ticketID) {
		$ticketResults = Capsule::table("ticket_result")
							-> select("*")
							-> where("jira_ticket_id", "=", $ticketID)
							-> get();
		return $ticketResults;
	}
}

?>
