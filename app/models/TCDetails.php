<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Capsule\Manager as Capsule;

class TCDetails extends Eloquent
{

	protected $table  = "test_case_detail";
	protected $primaryKey = "test_case_detail_id";
	protected $fillable = ['tc_id', 'tc_name', 'ts_id', 'ts_name','desc_obj', 'scope_of_test', 'type_of_test', 'component_id','test_steps','expected_results', 'actual_results', 'test_data', 'manual_automation',
							'main_or_jira', 'tc_status', 'date_last_change', 'tc_tester', 'tc_reviewed', 'priority', 'date_reviewed', 'tc_reviewer', 'jira_ticket_id'];
	public $timestamps = false;


	protected function getProjectTestCaseIDs($project_id)
	{
		$gptc_id = Capsule::table('test_case_detail as tcd' )
				->select('tcd.test_case_detail_id')
				->join('component as c', 'tcd.component_id' , '=', 'c.component_id')
				->join('project as p', 'c.project_id', '=', 'p.project_id')
				->where('p.project_id', '=', $project_id )
				->lists('test_case_detail_id');
		$gptc_id = json_decode(json_encode($gptc_id), true);
		return $gptc_id;
	}


	protected function getMainTestCases($project, $b_id, $pr_id, $cname)
	{
		$mtc = Capsule::table('test_case_detail as tcd')
				->select('c.component_name', 'tcd.tc_id', 'tcd.tc_name', 'tcd.ts_id', 'tcd.ts_name', 'tcd.scope_of_test', 'tcd.type_of_test', 'st.is_included', 'tcd.desc_obj',
				'tcd.test_case_detail_id as tcd_id')
				->leftjoin('smoke_test as st', 'st.test_case_detail_id', '=', 'tcd.test_case_detail_id')
				->leftjoin('project_release as pr' , 'pr.project_release_id' , '=', 'st.project_release_id')
				->leftjoin('browser as b' , 'st.browser_id' , '=', 'b.browser_id')
				->leftjoin('component as c', 'c.component_id', '=', 'tcd.component_id')
				->leftjoin('project as p', 'p.project_id', '=', 'c.project_id')
				->where('p.project_name', '=', $project)
				->where('b.browser_id' ,'=' ,$b_id)
				->where('pr.project_release_id', '=' ,$pr_id)
				->where('c.component_name', '=' ,$cname)
				->get();
		$mtc = json_decode(json_encode($mtc), true);
		return $mtc;
	}

	protected function checkDetails($tcd_id, $name, $value)
	{
		$otherValue = Capsule::table('test_case_detail as TCD')->select('TCD.tc_id as tc_id', 'TCD.ts_id as ts_id')->where('TCD.test_case_detail_id', '=' , $tcd_id)->first();
		$matchThese = [];
		$ifExists = "";
		if($name == "tc_id")
		{
			$matchThese = ['tc_id' => $value , 'ts_id' => $otherValue['ts_id']];
			$ifExists = Capsule::table('test_case_detail as TCD')->where($matchThese)->first();
			$check = ($ifExists == null) ?  true: false ;
			return $check;
		}
		else
		{
			$matchThese = ['ts_id' => $value , 'tc_id' => $otherValue['tc_id']];
			$ifExists = Capsule::table('test_case_detail as TCD')->where($matchThese)->first();
			$check = ($ifExists == null) ?  true: false ;
			return $check;
		}

	}

	protected function getASL($project_id) // get automation script location
	{
		$asl = Capsule::table('test_case_detail as TCD')
			   ->select('TCD.at_script_location')
			   ->leftjoin('component as C', 'C.component_id','=' , 'TCD.component_id')
			   ->leftjoin('project as P', 'P.project_id','=','C.project_id')
			   ->where('P.project_id', '=', $project_id)
			   ->lists('TCD.at_script_location');
		return $asl;
	}

	protected function getTCDbyASL($asl) // get test case id by array AT script location
	{
		$tcd = Capsule::table('test_case_detail as TCD')
			   ->select('TCD.test_case_detail_id as t_id', 'TCD.at_script_location as asl')
			   ->leftjoin('component as C', 'C.component_id','=' , 'TCD.component_id')
			   ->leftjoin('project as P', 'P.project_id','=','C.project_id')
			   ->whereIn('TCD.at_script_location', $asl)
			   ->get();
		return $tcd;
	}


	protected function updateATScriptLocation($tcd_id)
	{
		$tcd = Capsule::table('test_case_detail as TCD')->select('TCD.tc_id as tc_id', 'TCD.ts_id as ts_id')->where('test_case_detail_id', '=' , $tcd_id)->first();
		$tcd = Capsule::table('test_case_detail')->where('test_case_detail_id', '=' , $tcd_id)->update(array('at_script_location' => $tcd['tc_id'] . "_" . $tcd['ts_id']));
	}

	protected function getComponentTestCaseDetails($componentID, $ticketName) {
		
		$tcdetails = Capsule::table('test_case_detail as tcd')
							-> select('tcd.*')
							-> leftjoin('component as c', 'tcd.component_id', '=', 'c.component_id')
							-> leftjoin('project as p', 'p.project_id', '=', 'c.project_id')
							-> leftjoin('project_release_association as pra', 'pra.project_id', '=', 'p.project_id')
							-> leftjoin('project_release as pr', 'pr.project_release_id', '=', 'pra.release_id')
							-> leftjoin('jira_ticket as jt', 'pr.project_release_id', '=', 'jt.project_release_id')
							-> where('jt.jira_pkey', '=', $ticketName)
							-> where(function($query) use ($componentID) {
									if($componentID != "" || $componentID != null)
										$query->where('c.component_id', $componentID);
								})
							-> get();

		return $tcdetails;

	}

	public function component()
	{
		return $this->belongsTo('Component', 'component_id');
	}

	public function tstatus()
	{
		return $this->hasOne("TStatus", "test_case_detail_id");
	}

	public function tchecker()
	{
		return $this->hasOne("TChecker", "test_case_detail_id");
	}

}

?>
