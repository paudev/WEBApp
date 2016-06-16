<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Capsule\Manager as Capsule;

class DBSmokeTest extends Eloquent
{
	
	protected $table  = "smoke_test";
	protected $primaryKey = "smoke_test_id";
	protected $fillable = array('smoke_test_status', 'browser_id', 'project_release_id', 'test_case_detail_id', 'is_included');
	
	protected function checkSmoke($matchThese)
	{
		$cs = Capsule::table('smoke_test as st')
		->select('p.project_name', 'b.browser_name', 'pr.release_name', 'b.browser_id as b_id', 'pr.project_release_id as pr_id')
		->join('project_release as pr' , 'pr.project_release_id' , '=', 'st.project_release_id')
		->join('project_release_association as pra', 'pra.release_id', '=', 'pr.project_release_id')
		->join('project as p' , 'p.project_id' , '=', 'pra.project_id')
		->join('browser as b' , 'st.browser_id' , '=', 'b.browser_id')
		->where($matchThese)
		-> where('pra.association_type', '=', 'smoketest')
		->first();
		return $cs;
	}
	
	protected function getSummaryPerComponent($matchThese)
	{
		$spc = Capsule::table('smoke_test as st')
		->select('tcd.tc_name','c.component_name', 'b.browser_id',
				Capsule::raw("IFNULL(SUM(st.smoke_test_status = 'PASSED'), 0) as totalPass"),
				Capsule::raw("IFNULL(SUM(st.smoke_test_status = 'FAILED'),0) as totalFail"),
				Capsule::raw("IFNULL(SUM(st.smoke_test_status = 'PENDING'),0) as totalPending"),
				Capsule::raw("IFNULL(COUNT(tcd.test_case_detail_id), 0) as totalScenario"),		
				Capsule::raw("IFNULL(SUM(st.smoke_test_status = 'Not Started'),0) as totalNotStarted"))
			->leftjoin('test_case_detail as tcd', 'st.test_case_detail_id', '=', 'tcd.test_case_detail_id')
			->leftjoin('component as c', 'c.component_id', '=', 'tcd.component_id')
			->leftjoin('project_release as pr' , 'pr.project_release_id' , '=', 'st.project_release_id')
			->leftjoin('project_release_association as pra', 'pra.release_id', '=', 'pr.project_release_id')
			->leftjoin('project as p' , 'p.project_id' , '=', 'pra.project_id')
			->leftjoin('browser as b' , 'st.browser_id' , '=', 'b.browser_id')
			->where('st.is_included', '=', 1)
			->where($matchThese)
			-> where('pra.association_type', '=', 'smoketest')
			->groupBy('c.component_name')
			->get();
		$spc =  json_decode(json_encode($spc), true);	
		return $spc;
	}
	
	protected function getComponentSummary($matchThese)
	{
		$spc = Capsule::table('smoke_test as st')
				->select('tcd.tc_name','c.component_name', 'b.browser_id',
					Capsule::raw("IFNULL(SUM(st.smoke_test_status = 'PASSED'), 0) as totalPass"),
					Capsule::raw("IFNULL(COUNT(DISTINCT tcd.tc_id), 0) as totalTestCase"),
					Capsule::raw("IFNULL(COUNT(tcd.test_case_detail_id), 0) as totalScenario"),
					Capsule::raw("IFNULL(SUM(st.smoke_test_status = 'FAILED'),0) as totalFail"),
					Capsule::raw("IFNULL(SUM(st.smoke_test_status = 'PENDING'),0) as totalPending"),
					Capsule::raw("IFNULL(SUM(st.smoke_test_status = 'Not Started'),0) as totalNotStarted"))
				->leftjoin('test_case_detail as tcd', 'st.test_case_detail_id', '=', 'tcd.test_case_detail_id')
				->leftjoin('component as c', 'c.component_id', '=', 'tcd.component_id')
				->leftjoin('project_release as pr' , 'pr.project_release_id' , '=', 'st.project_release_id')
				->leftjoin('project_release_association as pra', 'pra.release_id', '=', 'pr.project_release_id')
				->leftjoin('project as p' , 'p.project_id' , '=', 'pra.project_id')
				->leftjoin('browser as b' , 'st.browser_id' , '=', 'b.browser_id')
				->where('st.is_included', '=', 1)
				->where($matchThese)
				->where('pra.association_type', '=', 'smoketest')
				->first();
		$spc = json_decode(json_encode($spc), true);	
		return $spc;
	}
	
	protected function getTestLogID($matchThese)
	{
		$tli = Capsule::table('smoke_test as st')
		->select('tcd.tc_id')
		->distinct()
		->leftjoin('test_case_detail as tcd', 'st.test_case_detail_id', '=', 'tcd.test_case_detail_id')
		->leftjoin('component as c', 'c.component_id', '=', 'tcd.component_id')
		->leftjoin('project_release as pr' , 'pr.project_release_id' , '=', 'st.project_release_id')
		->leftjoin('project_release_association as pra', 'pra.release_id', '=', 'pr.project_release_id')
		->leftjoin('project as p' , 'p.project_id' , '=', 'pra.project_id')
		->leftjoin('browser as b' , 'st.browser_id' , '=', 'b.browser_id')
		->where('st.is_included', '=', 1)
		->where($matchThese)
		->where('pra.association_type', '=', 'smoketest')
		->lists('tcd.tc_id');
		$tli = json_decode(json_encode($tli), true);	
		return $tli;
	}
	
	protected function getTestLogScenario($matchThese)
	{
		$tsid = Capsule::table('smoke_test as st')
		->select('tcd.tc_id', 'tcd.tc_name', 'tcd.ts_id', 'tcd.ts_name', 'st.smoke_test_status as status', 'pr.project_release_id as pr_id', 
				'b.browser_id as b_id', 'tcd.test_case_detail_id as tcd_id', 'c.component_name as component_name', 'tcd.test_steps as test_steps', 'tcd.expected_results as expected_results')
		->leftjoin('test_case_detail as tcd', 'st.test_case_detail_id', '=', 'tcd.test_case_detail_id')
		->leftjoin('component as c', 'c.component_id', '=', 'tcd.component_id')
		->leftjoin('project_release as pr' , 'pr.project_release_id' , '=', 'st.project_release_id')
		->leftjoin('project_release_association as pra', 'pra.release_id', '=', 'pr.project_release_id')
		->leftjoin('project as p' , 'p.project_id' , '=', 'pra.project_id')
		->leftjoin('browser as b' , 'st.browser_id' , '=', 'b.browser_id')
		->where('st.is_included', '=', 1)
		->where($matchThese)
		->where('pra.association_type', '=', 'smoketest')
		->get();
		return $tsid;
	}
	
	
	public function browser()
	{
		return $this->hasOne('browser', 'browser_id');
	}
}

?>