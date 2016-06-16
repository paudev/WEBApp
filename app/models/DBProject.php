<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Capsule\Manager as Capsule;

class DBProject extends Eloquent {

	protected $table  = "project";
	protected $primaryKey = "project_id";
	protected $fillable = array('project_name', 'project_description', 'activated', 'jira_pname', 'jira_component', 'jira_pname_key', 'jira_component_key');

	public function component() {
		return $this->hasMany('Component', 'project_id');
	}

	public function psetting() {
		return $this->hasOne('PSetting', 'project_id');
	}

	public function browser() {
		return $this->hasMany('Browser', 'project_id');
	}

	protected function getAllProjects() {

		$projects = Capsule::table('project as p')
						-> select(
								'p.*',
								'ac.*'
							)
						-> leftjoin('automation_connection as ac', 'p.connection_id', '=', 'ac.connection_id')
						-> get();

		return $projects;

	}

	protected function getProjectComponents() {
		$component = "All";
		$project = $_POST['project'];
		$column = "project_name";
		$proj = DBProject::where($column, '=' , $project)->first();
		$components = DBProject::find($proj['project_id'])->component;
		$project_id = $proj['project_id'];
		$component_list = Component::where('project_id' , '=', $proj['project_id'])->lists('component_name')->toArray();

		if($component == "All") {
			$test_cases = Capsule::table('test_case_detail as tcd')
				-> select('*',
					Capsule::raw("IFNULL(CONCAT(uits.first_name, ' ' , uits.last_name ), tcd.tc_tester) as tester"),
					Capsule::raw("IFNULL(CONCAT(uich.first_name, ' ' , uich.last_name ), tcd.tc_reviewer) as checker"),
					Capsule::raw("IFNULL(CONCAT(uidev.first_name, ' ' , uidev.last_name ), tcd.developer) as developer"),
					'tcd.test_case_detail_id as tcd_id')
				-> join('component as c', 'c.component_id', '=', 'tcd.component_id')
				-> join('project as p', 'p.project_id', '=', 'c.project_id')
				-> leftjoin('user_info as uidev', function ($join) {
						$join -> on('uidev.username', '=', 'tcd.tc_tester');
					})
				->leftjoin('user_info as uits', function ($join) {
						$join -> on('uits.username', '=', 'tcd.tc_tester');
					})
				-> leftjoin('user_info as uich', function ($join) {
						$join -> on('uich.username', '=', 'tcd.tc_reviewer');
					})
				-> orderBy('tcd.tc_id')
				-> orderBy('tcd.ts_id')
				-> where('p.project_name', '=', $project)
				-> where('tcd.main_or_jira', '=', 'main')
	            -> get();
		} elseif(in_array($component, (array)$component_list)) {
			$component = Component::where('component_name', '=' , $component)->first();
			$test_cases = Capsule::table('test_case_detail as tcd')
				-> select('*',
					Capsule::raw("IFNULL(CONCAT(uits.first_name, ' ' , uits.last_name ), tcd.tc_tester) as tester"),
					Capsule::raw("IFNULL(CONCAT(uich.first_name, ' ' , uich.last_name ), tcd.tc_reviewer) as checker"),
					Capsule::raw("IFNULL(CONCAT(uidev.first_name, ' ' , uidev.last_name ), tcd.developer) as developer"),
					'tcd.test_case_detail_id as tcd_id')
				-> join('component as c', 'c.component_id', '=', 'tcd.component_id')
				-> join('project as p', 'p.project_id', '=', 'c.project_id')
				-> leftjoin('user_info as uidev', function ($join) {
					$join -> on('uidev.username', '=', 'tcd.tc_tester');
					})
				-> leftjoin('user_info as uits', function ($join) {
					$join -> on('uits.username', '=', 'tcd.tc_tester');
					})
				-> leftjoin('user_info as uich', function ($join) {
					$join -> on('uich.username', '=', 'tcd.tc_reviewer');
					})
				-> orderBy('tcd.tc_id')
				-> orderBy('tcd.ts_id')
				-> where('c.component_id', '=', $component['component_id'])
				-> where('tcd.main_or_jira', '=', 'main')
				-> get();
		} else {
			header("Location: ../../../home/error404");
		}

		$this->view('project/main/manage_test_cases',
			[
				'bhref' => "/WEBApp/public/",
				'projects' => $this->projects,
				'project' => $proj['project_name'],
				'components' => $components,
				'test_cases' => $test_cases,
				'project_id' => $project_id
			]
		);
	}
}

?>
