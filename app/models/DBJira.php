
<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Capsule\Manager as Capsule;

class DBJira extends Eloquent {

	protected function getTicket($pk) {

		$gt= Capsule::connection('jira')->table('jiraissue as JI')
								->select('JI.pkey as pkey', 'JI.SUMMARY as summary', 'IS.pname as issue_status', 'IS.DESCRIPTION as detailed_issue_status',
										'IT.pname as issue_type', 'C.cname as cname' , 'RES.pname as resolution', 'PRIO.pname as priority', 'JI.ID as ID', 'CFVT.STRINGVALUE as tester',
										'JI.assignee as assignee', 'JI.reporter as reporter', 'JI.CREATED as created_at', 'JI.UPDATED as updated_at', 'L.label as label')
								->leftjoin('nodeassociation as NA', 'JI.ID','=' , 'NA.SOURCE_NODE_ID')
								->leftjoin('component as C', 'NA.SINK_NODE_ID','=' , 'C.ID')
								->leftjoin('issuestatus as IS', 'IS.ID' ,'=' , 'JI.issuestatus')
								->leftjoin('issuetype as IT', 'IT.ID' ,'=' , 'JI.issuetype')
								->leftjoin('priority as PRIO', 'PRIO.ID' ,'=' , 'JI.PRIORITY')
								->leftjoin('resolution as RES', 'RES.ID' ,'=' , 'JI.RESOLUTION')
								->leftjoin('customfieldvalue as CFVT', function ($join) {
										$join->on('CFVT.ISSUE', '=', 'JI.ID')
											->where('CFVT.CUSTOMFIELD', '=', 10523);
								})
								->leftjoin('label as L', 'L.issue', '=', 'JI.id')
								->where('JI.pkey', '=', $pk)
								->where('NA.ASSOCIATION_TYPE', '=', 'IssueComponent')
								->take(1)
								->get();

		return $gt;

	}

	protected function getTicketWithComponent($pk, $component_) {

		$gt = Capsule::connection('jira')->table('jiraissue as JI')
								->select('JI.pkey as pkey', 'JI.SUMMARY as summary', 'IS.pname as issue_status', 'IS.DESCRIPTION as detailed_issue_status',
										'IT.pname as issue_type', 'C.cname as cname' , 'RES.pname as resolution', 'PRIO.pname as priority', 'JI.ID as ID', 'CFVT.STRINGVALUE as tester',
										'JI.assignee as assignee', 'JI.reporter as reporter', 'JI.CREATED as created_at', 'JI.UPDATED as updated_at', 'L.label as label')
								->leftjoin('nodeassociation as NA', 'JI.ID','=' , 'NA.SOURCE_NODE_ID')
								->leftjoin('component as C', 'NA.SINK_NODE_ID','=' , 'C.ID')
								->leftjoin('issuestatus as IS', 'IS.ID' ,'=' , 'JI.issuestatus')
								->leftjoin('issuetype as IT', 'IT.ID' ,'=' , 'JI.issuetype')
								->leftjoin('priority as PRIO', 'PRIO.ID' ,'=' , 'JI.PRIORITY')
								->leftjoin('resolution as RES', 'RES.ID' ,'=' , 'JI.RESOLUTION')
								->leftjoin('customfieldvalue as CFVT', function ($join) {
										$join->on('CFVT.ISSUE', '=', 'JI.ID')
											->where('CFVT.CUSTOMFIELD', '=', 10523);
								})
								->leftjoin('label as L', 'L.issue', '=', 'JI.id')
								->where('JI.pkey', '=', $pk)
								->where('NA.ASSOCIATION_TYPE', '=', 'IssueComponent')
								->take(1)
								->get();

		return $gt;

	}


	protected function getJiraPKey($project, $release) {

		$getJiraPKey = Capsule::connection('jira')->table('jiraissue as JI')
					->select('JI.pkey as pkey')
					->leftjoin('nodeassociation as NA', 'JI.ID','=' , 'NA.SOURCE_NODE_ID')
					->leftjoin('projectversion as PV', 'NA.SINK_NODE_ID', '=' , 'PV.ID')
					->leftjoin('project as P', 'P.ID', '=' , 'PV.PROJECT')
					->where('PV.vname', '=' , $release)
					->where('P.pname', '=' , $project)
					->where('NA.ASSOCIATION_TYPE', '=' , 'IssueFixVersion')
					->lists('JI.pkey');

		return $getJiraPKey;

	}
}

?>
