<?php

session_start();
use Illuminate\Database\Capsule\Manager as Capsule;

class Calendar extends Controller {

	public function userScheduleCreation() {

		$eventsArray = Capsule::table('ticket_estimated as TE')
					   -> select('JT.jira_pkey as jira_pkey', 'TE.tcc_end_date as end', 'JT.summary as summary', 'TE.tcc_start_date as start','TE.ticket_estimated_id as id', 'TE.tcc_floe as floe', 'TE.tcc_complexity as complexity', 'TE.tce_start_date as restricted_start')
					   -> leftjoin('jira_ticket as JT', 'TE.jira_ticket_id','=', 'JT.jira_ticket_id')
					   -> where('JT.jira_ticket_id', '=', $_POST['jid'])
					   -> get();
		$events = array();

		foreach($eventsArray as $ea) {
			if($ea['start'] == null) {
				continue;
			}
			$event['t_id'] = $ea['id'];
			$event['title'] = $ea['jira_pkey'];
			$event['start'] = $ea['start'];
			$event['end'] = $ea['end'];
			$event['description'] = $ea['summary'];
			$event['floe'] = $ea['floe'];
			$event['complexity'] = $ea['complexity'];
			$event['type'] = "creation";
			$event['restricted_start']  = $ea['restricted_start'];
			$events[] = $event;
		}

		echo json_encode($events);

	}

	public function userScheduleExecution() {

		$eventsArray = Capsule::table('ticket_estimated as TE')
					   -> select('JT.jira_pkey as jira_pkey', 'TE.tce_start_date as start', 'TE.tce_end_date as end', 'JT.summary as summary','TE.ticket_estimated_id as id', 'TE.tce_floe as floe', 'TE.tce_complexity as complexity', 'TE.tcc_start_date as restricted_start')
					   -> leftjoin('jira_ticket as JT', 'TE.jira_ticket_id','=', 'JT.jira_ticket_id')
					   -> where('JT.jira_ticket_id', '=', $_POST['jid'])
					   -> get();
		$events = array();

		foreach($eventsArray as $ea) {
			if($ea['start'] == null) {
				continue;
			}
			$event['t_id'] = $ea['id'];
			$event['title'] = $ea['jira_pkey'];
			$event['start'] = $ea['start'];
			$event['end'] = $ea['end'];
			$event['description'] = $ea['summary'];
			$event['floe'] = $ea['floe'];
			$event['complexity'] = $ea['complexity'];
			$event['restricted_start']  = $ea['restricted_start'];
			$event['type'] = "execution";
			$events[] = $event;
		}

		echo json_encode($events);

	}
}

?>
