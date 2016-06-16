<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Capsule\Manager as Capsule;

class DBJiraTicket extends Eloquent {

	protected $table  = "jira_ticket";
	protected $primaryKey = "jira_ticket_id";
	protected $fillable = array('jira_pkey', 'summary', 'assignee', 'tester', 'reporter', 'jira_status', 'resolution', 'priority', 'component', 'in_jira', 'jira_source_id',
								'project_release_id' ,'created_at' , 'updated_at', 'issues', 'dev_signoff', 'business_signoff', 'label');

	protected function getAllTicketPKey($releaseID, $value) {

		$pkeys = "";

		if($value == "AllComponents") { // meaning, all components are included
			$pkeys = Capsule::table('jira_ticket')
							->where('project_release_id', '=' , $releaseID)
							->lists('jira_pkey');
		} else { // meaning, specific component/s are only included
			$_jiras = explode(",", $value);
			$pkeys = Capsule::table('jira_ticket')
							->where('project_release_id', '=' , $releaseID)
							->whereIn('component', $_jiras)
							->lists('jira_pkey');
		}

		return $pkeys;

	}

	protected function getJiraTicket($releaseID, $value) {

		$jiraTicket = "";

		if($value == "AllComponents") {
			$jiraTicket = Capsule::table('jira_ticket as JT')
							->select('*', 'JT.qbit_status',
								Capsule::raw("IFNULL(TE.tcc_floe, 'Not Set') as cfloe"),
								Capsule::raw("IFNULL(CONCAT(UIA.first_name, ' ',  UIA.last_name), JT.assignee) as assignee"),
								Capsule::raw("IFNULL(CONCAT(UIR.first_name, ' ',  UIR.last_name), JT.reporter) as reporter"),
								Capsule::raw("IFNULL(CONCAT(UIT.first_name, ' ',  UIT.last_name), JT.tester) as tester"),
								Capsule::raw("IFNULL( CONCAT( ((((TE.tcc_floe*TE.tcc_complexity)/60)/8)) + ((((TE.tce_floe*TE.tce_complexity)/60)/8)) , ' Work Days' )  , 'Not Set') as tc_estimated"),
								Capsule::raw("IFNULL( DATE_FORMAT(TE.tcc_start_date, '%b %d, %Y %H:%i' ), 'Not Set') as planned_start"),
								Capsule::raw("IFNULL( DATE_FORMAT(TE.tce_end_date, '%b %d, %Y %H:%i' ) , 'Not Set') as planned_end"),
								Capsule::raw("IFNULL( CONCAT( ((((TE.tcc_floe*TE.tcc_complexity)/60)/8)) ,' Work Days'), 'Not Set') as tc_creation"),
								Capsule::raw("IFNULL( CONCAT( ((((TE.tce_floe*TE.tce_complexity)/60)/8)) ,' Work Days'), 'Not Set') as tc_execution"),
								Capsule::raw("IFNULL( CONCAT( ((((TE.job_process)/60)/8)) ,' Job Days'), 'Not Set') as job_process"))
							->leftjoin('ticket_estimated as TE', 'JT.jira_ticket_id', '=' , 'TE.jira_ticket_id')
							->leftjoin('user_info as UIA', function ($join) {
											$join->on('UIA.username' ,'=' , 'JT.assignee');
									})
							->leftjoin('user_info as UIR', function ($join) {
											$join->on('UIR.username' ,'=' , 'JT.reporter');
									})
							->leftjoin('user_info as UIT', function ($join) {
											$join->on('UIT.username' ,'=' , 'JT.tester');
									})
							->where('project_release_id', '=' ,$releaseID)
							->where('in_jira', '=' ,1 )
							->orderByRaw("FIELD(jira_status , 'In Test', 'Fix in Progress','Fixed', 'Closed', 'Deferred') ASC, jira_status")
							->groupBy('JT.jira_pkey')
							->get();
		} else {
			$_jiras = explode(",", $value);
			$jiraTicket = Capsule::table('jira_ticket as JT')
							->select('*', 'JT.qbit_status',
								Capsule::raw("IFNULL(TE.tcc_floe, 'Not Set') as cfloe"),
								Capsule::raw("IFNULL(CONCAT(UIA.first_name, ' ',  UIA.last_name), JT.assignee) as assignee"),
								Capsule::raw("IFNULL(CONCAT(UIR.first_name, ' ',  UIR.last_name), JT.reporter) as reporter"),
								Capsule::raw("IFNULL(CONCAT(UIT.first_name, ' ',  UIT.last_name), JT.tester) as tester"),
								Capsule::raw("IFNULL( CONCAT( ((((TE.tcc_floe*TE.tcc_complexity)/60)/8)) + ((((TE.tce_floe*TE.tce_complexity)/60)/8)) , ' Work Days' )  , 'Not Set') as tc_estimated"),
								Capsule::raw("IFNULL( DATE_FORMAT(TE.tcc_start_date, '%b %d, %Y %H:%i' ), 'Not Set') as planned_start"),
								Capsule::raw("IFNULL( DATE_FORMAT(TE.tce_end_date, '%b %d, %Y %H:%i' ) , 'Not Set') as planned_end"),
								Capsule::raw("IFNULL( CONCAT( ((((TE.tcc_floe*TE.tcc_complexity)/60)/8)) ,' Work Days'), 'Not Set') as tc_creation"),
								Capsule::raw("IFNULL( CONCAT( ((((TE.tce_floe*TE.tce_complexity)/60)/8)) ,' Work Days'), 'Not Set') as tc_execution"),
								Capsule::raw("IFNULL( CONCAT( ((((TE.job_process)/60)/8)) ,' Job Days'), 'Not Set') as job_process"))
							->leftjoin('ticket_estimated as TE', 'JT.jira_ticket_id', '=' , 'TE.jira_ticket_id')
							->leftjoin('user_info as UIA', function ($join) {
											$join->on('UIA.username' ,'=' , 'JT.assignee');
									})
							->leftjoin('user_info as UIR', function ($join) {
											$join->on('UIR.username' ,'=' , 'JT.reporter');
									})
							->leftjoin('user_info as UIT', function ($join) {
											$join->on('UIT.username' ,'=' , 'JT.tester');
									})
							->where('project_release_id', '=' ,$releaseID)
							->where('in_jira', '=' ,1 )
							->whereIn('component', $_jiras)
							->orderByRaw("FIELD(jira_status , 'In Test', 'Fix in Progress','Fixed', 'Closed', 'Deferred') ASC, jira_status")
							->groupBy('JT.jira_pkey')
							->get();
		}

		return $jiraTicket;

	}

	protected function getJiraTicketAssign($releaseID, $projectID, $component) {

		$jiraTicket = Capsule::table('jira_ticket as JT')
					  ->select('JT.jira_pkey as jira_pkey', 'JT.summary as summary', 'JT.assignee as assignee', 'PR.release_name as release_name', 'JT.jira_ticket_id as jira_id', 'JT.component as component')
					  ->leftjoin('project_release as PR', 'PR.project_release_id','=', 'JT.project_release_id')
					  ->leftjoin('project_release_association as PRA', 'PRA.release_id', '=', 'PR.project_release_id')
					  ->leftjoin('project as P', 'P.project_id','=', 'PRA.project_id')
					  ->where('JT.in_jira', '=', 1)
					  ->where('JT.qbit_status', '=' ,'NotAssigned')
					  /*->where('JT.jira_status', '!=' ,'Closed')
					  ->where('JT.jira_status', '!=' ,'Fixed')
					  ->where('JT.jira_status', '!=' ,'No Change Required')
					  ->where('JT.jira_status', '!=' ,'Submitted')
					  ->where('JT.jira_status', '!=' ,'Deferred')
					  ->where('JT.jira_status', '!=' ,'Need More Information')*/
					  ->where(function($query) use ($releaseID, $projectID , $component) {
							if($releaseID != "" || $releaseID != null)
								$query->where('PR.project_release_id', $releaseID);
							if($component != "" || $component != null)
								$query->where('JT.component', $component);
						    if($projectID != "" || $projectID != null)
								$query->where('P.project_id', $projectID);
						})
					  ->orderBy('pr.created_at', 'desc')
					  ->orderBy('JT.jira_pkey')
					  ->groupBy('JT.jira_pkey')
					  ->orderByRaw("FIELD(jira_status , 'In Test', 'Fix in Progress','Fixed', 'Closed', 'Deferred') ASC, jira_status")
					  ->get();

		return $jiraTicket;

	}

	protected function getJiraTicketReAssign($releaseID, $projectID, $component) {

		$jiraTicket = Capsule::table('jira_ticket as JT')
					  -> select('JT.jira_pkey as jira_pkey', 'JT.summary as summary', 'JT.qbit_assignee as assignee', 'PR.release_name as release_name', 'JT.jira_ticket_id as jira_id')
					  -> leftjoin('project_release as PR', 'PR.project_release_id','=', 'JT.project_release_id')
					  -> leftjoin('project_release_association as PRA', 'PRA.release_id', '=', 'PR.project_release_id')
					  -> leftjoin('project as P', 'P.project_id','=', 'PRA.project_id')
					  -> where('JT.in_jira', '=' ,1)
					  -> where('JT.qbit_status', '=' ,'NotYetScheduled')
					  -> where(function($query) use ($releaseID, $projectID , $component) {
							if($releaseID != "" || $releaseID != null)
								$query -> where('PR.project_release_id', $releaseID);
							if($component != "" || $component != null)
								$query -> where('JT.component', $component);
						    if($projectID != "" || $projectID != null)
								$query -> where('P.project_id', $projectID);
						})
					  -> orderBy('release_name')
					  -> groupBy('JT.jira_pkey')
					  -> orderByRaw("FIELD(jira_status , 'In Test', 'Fix in Progress','Fixed', 'Closed', 'Deferred') ASC, jira_status")
					  -> get();

		return $jiraTicket;

	}

	protected function getTicketDetails($ticket, $releaseID) {

		$jiraTicket = Capsule::table('jira_ticket as JT')
					  ->select('*',
					  Capsule::raw("IFNULL( CONCAT( ((((TE.tcc_floe*TE.tcc_complexity)/60)/8)) + ((((TE.tce_floe*TE.tce_complexity)/60)/8)) , ' Work Days' )  , 'Not Set') as tc_estimated"),
					  Capsule::raw("IFNULL( CONCAT( ((((TE.tcc_floe*TE.tcc_complexity)/60)/8)) ,' Work Days'), 'Not Set') as tc_creation"),
					  Capsule::raw("IFNULL( CONCAT( ((((TE.tce_floe*TE.tce_complexity)/60)/8)) ,' Work Days'), 'Not Set') as tc_execution"),
					  Capsule::raw("IFNULL(CONCAT(UIA.first_name, ' ',  UIA.last_name), JT.assignee) as assignee"),
					  Capsule::raw("IFNULL(CONCAT(UIR.first_name, ' ',  UIR.last_name), JT.reporter) as reporter"),
					  Capsule::raw("IFNULL(CONCAT(UIT.first_name, ' ',  UIT.last_name), JT.tester) as tester"))
					  ->leftjoin('ticket_estimated as TE', 'JT.jira_ticket_id', '=' , 'TE.jira_ticket_id')
					  ->leftjoin('user_info as UIA', function ($join) {
										$join->on('UIA.username' ,'=' , 'JT.assignee');
								})
					  ->leftjoin('user_info as UIR', function ($join) {
										$join->on('UIR.username' ,'=' , 'JT.reporter');
								})
					  ->leftjoin('user_info as UIT', function ($join) {
										$join->on('UIT.username' ,'=' , 'JT.tester');
								})
					  ->where('project_release_id', '=' ,$releaseID)
					  ->where('jira_pkey', '=', $ticket)
					  ->first();

		return $jiraTicket;

	}

	protected function updateTicket($pkey, $releaseID, $data_set) {

		Capsule::table('jira_ticket')
		->where('jira_pkey' , '=', $pkey)
		->where('project_release_id', '=', $releaseID)
		->update($data_set);

	}

	protected function updateInJira($td, $releaseID) {

		Capsule::table('jira_ticket')
			->where('jira_pkey' , '=', $td)
			->where('project_release_id', '=', $releaseID)
			->update(array('in_jira' => 0));

	}

	protected function getTicketID($matchThese) {
		
		$tid = Capsule::table('jira_ticket as JT')
			   ->leftjoin('project_release as PR', 'PR.project_release_id', '=', 'JT.project_release_id')
			   ->where($matchThese)
			   ->where('JT.in_jira', '=' ,1)
			   ->pluck('JT.jira_ticket_id');

		return $tid;

	}

	protected function getTicketReleaseID($matchThese) {
		$tid = Capsule::table('jira_ticket as JT')
			   ->leftjoin('project_release as PR', 'PR.project_release_id', '=', 'JT.project_release_id')
			   ->where($matchThese)
			   ->where('JT.in_jira', '=' ,1)
			   ->pluck('JT.project_release_id');

		return $tid;

	}

	protected function getTicketNoSchedule() {

		$gtns = Capsule::table('jira_ticket as JT')
				->select('JT.jira_pkey as jira_pkey','JT.summary as summary' ,'JT.component as component', 'PR.release_name as release_name', 'JT.qbit_assignee as qbit_assignee')
				->leftjoin('project_release as PR', 'JT.project_release_id', '=' , 'PR.project_release_id')
				->leftjoin('ticket_estimated as TE', 'JT.jira_ticket_id', '=' , 'TE.jira_ticket_id')
				->where('JT.in_jira', '=' ,1)
				//->where('JT.qbit_assignee', '=' ,$_SESSION['username'])
				->where('JT.qbit_status', '=', 'NotYetScheduled')
				->groupBy('JT.jira_pkey')
				->get();

		return $gtns;

	}

	protected function getTicketTestCreation() {

		$gtns = Capsule::table('jira_ticket as JT')
				->select('JT.jira_ticket_id as j_id','JT.jira_pkey as jira_pkey', 'JT.summary as summary', 'PR.release_name as release_name', 'JT.tester as tester', 'JT.qbit_assignee as assignee', 'JT.qbit_checker as checker', 'JT.qbit_status as qbit_status', 'TE.tcc_end_date as due_date',
					Capsule::raw("(CASE
								WHEN (MAX(TT.end_datetime IS NULL and TT.start_datetime IS NULL and TT.time_stamp_type = 'TCCreation')) THEN 0
								WHEN (MAX(TT.end_datetime IS NULL and TT.start_datetime IS NOT NULL and TT.time_stamp_type = 'TCCreation')) THEN 1
								WHEN (MAX(TT.end_datetime IS NOT NULL and TT.start_datetime IS NOT NULL and TT.time_stamp_type = 'TCCreation')) THEN 2 END) as count"))
				->leftjoin('project_release as PR', 'JT.project_release_id', '=' , 'PR.project_release_id')
				->leftjoin('ticket_estimated as TE', 'JT.jira_ticket_id', '=' , 'TE.jira_ticket_id')
				->leftjoin('ticket_timestamp as TT', 'JT.jira_ticket_id', '=' , 'TT.jira_ticket_id')
				->where('JT.qbit_assignee', '=' ,$_SESSION['username'])
				->where('JT.in_jira', '=' ,1)
				->whereIn('JT.qbit_status', array('TCCreationNotStarted','TCCreationInProgress', 'TCCreationCompletedForReview'))
				->groupBy('JT.jira_pkey')
				->get();

		return $gtns;

	}

	protected function getTicketTestCreationChecking() {

		$ticketsForChecking = Capsule::table('jira_ticket as JT')
			-> select('JT.jira_ticket_id as j_id', 'JT.jira_pkey as jira_pkey', 'JT.summary as summary', 'PR.release_name as release_name', 'JT.tester as tester', 'JT.qbit_assignee as assignee', 'JT.qbit_checker as checker', 'JT.qbit_status as qbit_status', 'TE.tcc_end_date as due_date',
				Capsule::raw("(CASE
							WHEN (MAX(TT.end_datetime IS NULL and TT.start_datetime IS NULL and TT.time_stamp_type = 'TCCreation')) THEN 0
							WHEN (MAX(TT.end_datetime IS NULL and TT.start_datetime IS NOT NULL and TT.time_stamp_type = 'TCCreation')) THEN 1
							WHEN (MAX(TT.end_datetime IS NOT NULL and TT.start_datetime IS NOT NULL and TT.time_stamp_type = 'TCCreation')) THEN 2 END) as count"))
			-> leftjoin('project_release as PR', 'JT.project_release_id', '=', 'PR.project_release_id')
			-> leftjoin('ticket_estimated as TE', 'JT.jira_ticket_id', '=', 'TE.jira_ticket_id')
			-> leftjoin('ticket_timestamp as TT', 'JT.jira_ticket_id', '=', 'TT.jira_ticket_id')
			-> where('JT.in_jira', '=', 1)
			-> whereIn('JT.qbit_status', array('TCCreationCompletedForReview', 'TCExecutionCompletedForReview'))
			-> groupBy('JT.jira_pkey')
			-> get();

		return $ticketsForChecking;

	}

	protected function getTicketSignOff() {

		$ticketSignOff = Capsule::table('jira_ticket as JT')
			-> select('JT.jira_ticket_id as j_id', 'JT.jira_pkey as jira_pkey', 'JT.summary as summary', 'PR.release_name as release_name', 'JT.tester as tester', 'JT.qbit_assignee as assignee', 'JT.qbit_checker as checker', 'JT.qbit_status as qbit_status', 'TE.tcc_end_date as due_date', 'JT.dev_signoff as dev_signoff', 'JT.business_signoff as business_signoff',
				Capsule::raw("(CASE
							WHEN (MAX(TT.end_datetime IS NULL and TT.start_datetime IS NULL and TT.time_stamp_type = 'TCCreation')) THEN 0
							WHEN (MAX(TT.end_datetime IS NULL and TT.start_datetime IS NOT NULL and TT.time_stamp_type = 'TCCreation')) THEN 1
							WHEN (MAX(TT.end_datetime IS NOT NULL and TT.start_datetime IS NOT NULL and TT.time_stamp_type = 'TCCreation')) THEN 2 END) as count"))
			-> leftjoin('project_release as PR', 'JT.project_release_id', '=', 'PR.project_release_id')
			-> leftjoin('ticket_estimated as TE', 'JT.jira_ticket_id', '=', 'TE.jira_ticket_id')
			-> leftjoin('ticket_timestamp as TT', 'JT.jira_ticket_id', '=', 'TT.jira_ticket_id')
			-> where('JT.in_jira', '=', 1)
			-> whereIn('JT.qbit_status', array('ForSignOff'))
			-> groupBy('JT.jira_pkey')
			-> get();

		return $ticketSignOff;

	}

	protected function getTicketTestExecution() {

			$gtns = Capsule::table('jira_ticket as JT')
					->select('JT.jira_ticket_id as j_id','JT.jira_pkey as jira_pkey', 'JT.summary as summary', 'PR.release_name as release_name', 'JT.tester as tester', 'JT.qbit_status as qbit_status', 'TE.tcc_end_date as due_date',
					Capsule::raw("(CASE
									WHEN (MAX(TT.end_datetime IS NULL and TT.start_datetime IS NULL and TT.time_stamp_type = 'TCExecution')) THEN 0
									WHEN (MAX(TT.end_datetime IS NULL and TT.start_datetime IS NOT NULL and TT.time_stamp_type = 'TCExecution')) THEN 1
									WHEN (MAX(TT.end_datetime IS NOT NULL and TT.start_datetime IS NOT NULL and TT.time_stamp_type = 'TCExecution')) THEN 2 END) as count"))
					->leftjoin('project_release as PR', 'JT.project_release_id', '=' , 'PR.project_release_id')
					->leftjoin('ticket_estimated as TE', 'JT.jira_ticket_id', '=' , 'TE.jira_ticket_id')
					->leftjoin('ticket_timestamp as TT', 'JT.jira_ticket_id', '=' , 'TT.jira_ticket_id')
					->where('JT.qbit_assignee', '=' ,$_SESSION['username'])
					->where('JT.in_jira', '=' ,1)
					->whereIn('JT.qbit_status', array('TCExecutionNotStarted','TCExecutionInProgress', 'TCExecutionCompletedForReview'))
					->groupBy('JT.jira_pkey')
					->get();

		return $gtns;

	}

	protected function getCurrentTC($ticket, $release_name) { // Ticket ID, Release Name
	
		$ctc = Capsule::table('test_case_detail as TCD')
					-> select('TCD.test_case_detail_id', 'TCD.tc_id', 'TCD.ts_id', 'TCD.test_case_detail_id as tcd_id', 'TCD.ts_name as ts_name', 'TCD.tc_name as tc_name', 'TCD.scope_of_test as scope_of_test',
							Capsule::raw('ifnull(TCD.actual_results, "") as actual_results'),
							Capsule::raw('ifnull(TCD.test_data, "") as test_data'),
					        'TCD.type_of_test as type_of_test',
					        Capsule::raw('ifnull(TCD.expected_results, "") as expected_results'),
					        Capsule::raw('ifnull(TCD.test_steps, "") as test_steps'),
					        'TCD.desc_obj as desc_obj',
					        Capsule::raw('ifnull(TCD.tc_comments, "") as tc_comments'))
					-> leftjoin('jira_ticket as JT', 'JT.jira_ticket_id', '=' , 'TCD.jira_ticket_id')
					-> leftjoin('project_release as PR', 'JT.project_release_id', '=' , 'PR.project_release_id')
					-> where('JT.jira_ticket_id', '=' , $ticket)
					-> where('PR.release_name', '=' , $release_name)
					-> where('TCD.main_or_jira', '=' , 'jira')
					-> get();

		return $ctc;

	}

	protected function getProject($ticket, $release_name) { // Ticket ID, Release Name

		$ctc = Capsule::table('project as P')
					->select('P.project_id')
					->leftjoin('project_release_association as PRA', 'PRA.project_id', '=', 'P.project_id')
					->leftjoin('project_release as PR', 'PRA.release_id', '=' , 'PR.project_release_id')
					->leftjoin('jira_ticket as JT', 'JT.project_release_id', '=', 'PR.project_release_id')
					->leftjoin('project_setting as PS', 'PS.project_id', '=', 'P.project_id')
					->where('JT.jira_ticket_id', '=' , $ticket)
					->where('PR.release_name', '=' , $release_name)
					->whereNotNull('PS.value')
					->take(1)
					->pluck('P.project_id');
		return $ctc;

	}

	protected function getBrowser($whereIn) { // $whereIn = array of browserID
		
		$ctc = Capsule::table('browser')
					->select('browser_id as id', 'browser_name as text')
					->whereIn('browser_id', $whereIn)
					->get();

		return $ctc;

	}

	protected function rescheduleTicket($ticket) {

		$reset = TicketEstimated::where('jira_ticket_id', '=' , $ticket)
					->update(
						array(
							'tcc_floe' => null,
							'tcc_complexity'=> null,
							'tcc_start_date' =>null,
							'tcc_end_date' => null,
							'tce_floe' => null,
							'tce_complexity'=> null,
							'tce_start_date' =>null,
							'tce_end_date' => null,
							'job_process' => null
							)
						);

		if($reset == true) {
			Capsule::table('test_case_detail')
					->where('main_or_jira', '=', 'jira')
					->where('jira_ticket_id', '=', $ticket)
					->delete();
			Capsule::table('ticket_timestamp')->where('time_stamp_type', '=', 'TCCreation')->where('jira_ticket_id', '=', $ticket)->delete();
		}

		DBJiraTicket::where('jira_ticket_id', '=' , $ticket)->update(array('qbit_status' => 'Not Started'));

	}

	protected function getAssignedTickets() {

		$tickets = Capsule::table('jira_ticket as jt')
						-> select(
								'jt.*',
								'pr.release_name'
							)
						-> leftjoin('project_release as pr', 'jt.project_release_id', '=', 'pr.project_release_id')
						-> leftjoin('project_release_association as pra', 'pra.release_id', '=', 'pr.project_release_id')
						-> leftjoin('project as p', 'p.project_id', '=', 'pra.project_id')
						-> where('jt.qbit_status', '!=', 'NotAssigned')
						-> groupBy('jt.jira_pkey')
						-> orderBy('p.project_id')
						-> get();

		return $tickets;

	}
}

?>
