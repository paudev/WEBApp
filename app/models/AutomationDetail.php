<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Capsule\Manager as Capsule;

class AutomationDetail extends Eloquent
{
	
	protected $table  = "automation_detail";
	protected $primaryKey = "automation_detail_id";
	protected $fillable = array('at_script_location', 'test_case_detail_id', 'developer', 'status', 'date_finished');
	public $timestamps = false;
	
	
	protected function getASL($project_id) // get automation script location
	{
		$asl = Capsule::table('automation_detail as AD')
			   ->select('at_script_location')
			   ->leftjoin('test_case_detail as TCD', 'AD.test_case_detail_id','=' , 'TCD.test_case_detail_id')
			   ->leftjoin('component as C', 'C.component_id','=' , 'TCD.component_id')
			   ->leftjoin('project as P', 'P.project_id','=','C.project_id')
			   ->where('P.project_id', '=', $project_id)
			   ->lists('at_script_location');
		return $asl;
	}
	
	protected function getTCDbyASL($asl) // get test case id by array AT script location
	{
		$tcd = Capsule::table('automation_detail as AD')
			   ->select('TCD.test_case_detail_id as t_id', 'AD.at_script_location as asl')
			   ->leftjoin('test_case_detail as TCD', 'AD.test_case_detail_id','=' , 'TCD.test_case_detail_id')
			   ->leftjoin('component as C', 'C.component_id','=' , 'TCD.component_id')
			   ->leftjoin('project as P', 'P.project_id','=','C.project_id')
			   ->whereIn('AD.at_script_location', $asl)
			   ->get();
		return $tcd;
	}
	
	protected function updateATScriptLocation($tcd_id) 
	{
			
		$tcd = Capsule::table('test_case_detail as TCD')->select('TCD.tc_id as tc_id', 'TCD.ts_id as ts_id')->where('test_case_detail_id', '=' , $tcd_id)->first();
		$tcd = Capsule::table('automation_detail')->where('test_case_detail_id', '=' , $tcd_id)->update(array('at_script_location' => $tcd['tc_id'] . "_" . $tcd['ts_id']));
	}
	
	
}

?>