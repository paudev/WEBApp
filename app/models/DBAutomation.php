<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Capsule\Manager as Capsule;

class DBAutomation extends Eloquent {
	
	protected $table  = "SmokeTestCaseDetails";
	protected $primaryKey = "Id";
	protected $fillable = array('TestCaseId', 'Description', 'TestProcedure', 'ExpectedResult', 'Automated' );
	public $timestamps = false;
	protected $connection = 'rmautomation';
	
	protected function getAutomationResults($connectionName) {

		$eid = Capsule::connection($connectionName)
					->table('SmokeTest as ST')
					-> select(
							'ST.ExecId as execid',
							'ST.Result as result',
							'ST.TestCaseStartTime',
							'ST.TestCaseEndTime', 
							Capsule::raw("IFNULL(SUM(result = 'PASSED'), 0) as totalPass"),
							Capsule::raw("IFNULL(SUM(result = 'FAILED'), 0) as totalFail"),
							Capsule::raw("IFNULL(SUM(result = 'SKIPPED'), 0) as totalSkip"),
							Capsule::raw("MIN(ST.TestCaseStartTime) AS mintime"),
							Capsule::raw("MAX(ST.TestCaseEndTime) AS maxtime"),
							Capsule::raw("SEC_TO_TIME(TIMESTAMPDIFF(SECOND,Min(ST.TestCaseStartTime),Max(ST.TestCaseEndTime))) AS elapsedtime"),
							Capsule::raw("SEC_TO_TIME(SUM(UNIX_TIMESTAMP(ST.TestCaseEndTime) - UNIX_TIMESTAMP(ST.TestCaseStartTime))) AS sumtime"),
							Capsule::raw("COUNT(result) as totalTestCase")
						)
					-> where('result', '!=', 'STARTED')
					-> whereNotNull('ST.TestCaseEndTime')
					-> whereNotNull('ST.TestCaseStartTime')
					-> groupBy('execid')
					-> orderBy('execid', 'desc')
					-> get();

		return $eid;

	}
	
	protected function getExecutionResults($execid, $connectionName) {

		$eid = Capsule::connection($connectionName)
					-> table('SmokeTest as ST')
					-> select(
							'ST.ExecId as execid',
							'ST.TestCaseId as tid',
							'ST.Result as result',
							'ST.TestCaseStartTime as start',
							'ST.TestCaseEndTime as end',
							'ST.UserName as username',
							'ST.ErrorMessage as errormessage',
							'ST.ScreenShot as screenshot',
							'STD.Description as desc'
						)
					-> leftjoin('SmokeTestCaseDetails as STD', 'ST.TestCaseId', '=', 'STD.TestCaseId')
					-> where('execid', '=', $execid)
					-> where('result', '!=', 'STARTED')
					-> where('result', '!=', 'SKIPPED')
					-> orderBy('tid', 'asc')
					-> get();
								
		return $eid;

	}
	
	protected function getExecutionTID($execid, $connectionName) {

		$eid = Capsule::connection($connectionName)
					-> table('SmokeTest as ST')
					-> select('ST.TestCaseId as tid')
					-> where('execid', '=', $execid)
					-> where('result', '!=', 'STARTED')
					-> where('result', '!=', 'SKIPPED')
					-> orderBy('tid', 'asc')
					-> lists('tid');
								
		return $eid;

	}
	
	protected function getIntersectTC($execid, $intersect) {

		$eid = Capsule::connection('rmautomation')
					-> table('SmokeTest as ST')
					-> select(
							'ST.ExecId as execid',
							'ST.TestCaseId as tid',
							'ST.Result as result',
							'ST.TestCaseStartTime as start',
							'ST.TestCaseEndTime as end',
							'ST.UserName as username',
							'ST.ErrorMessage as errormessage',
							'ST.ScreenShot as screenshot',
							'STD.Description as desc'
						)
					-> leftjoin('SmokeTestCaseDetails as STD', 'ST.TestCaseId', '=', 'STD.TestCaseId')
					-> where('execid', '=', $execid)
					-> where('result', '!=', 'STARTED')
					-> where('result', '!=', 'SKIPPED')
					-> whereIn('ST.TestCaseId', $intersect)
					-> orderBy('tid', 'asc')
					-> get();	

		return $eid;

	}
	
	protected function getTCResult($execid, $at_script_location) {

		$eid = Capsule::connection('rmautomation')
					-> table('SmokeTest as ST')
					-> select(
							'ST.TestCaseId as asl',
							'ST.Result as result',
							'ST.ScreenShot as screenshot'
						)
					-> leftjoin('SmokeTestCaseDetails as STD', 'ST.TestCaseId', '=', 'STD.TestCaseId')
					-> where('execid', '=', $execid)
					-> where('result', '!=', 'STARTED')
					-> where('result', '!=', 'SKIPPED')
					-> whereIn('ST.TestCaseId', $at_script_location)
					-> orderBy('asl', 'asc')
					-> get();			

		return $eid;

	}
	
}

?>