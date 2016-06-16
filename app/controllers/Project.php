<?php

use Illuminate\Database\Capsule\Manager as Capsule;

class Project extends Controller {

	protected $projects = '';

	public function __construct() {
		session_start();
		if(!isset($_SESSION['user_id'], $_SESSION['user_type'], $_SESSION['username'])) {
			header('Location: /WEBApp/public/');
		}
		$this->projects = $this->getProjectSidebar();
	}

	public function index() {
		$list_of_all_projects = DBProject::getAllProjects();
		$this->view(
			'project/index',
			[
				'bhref' => "/WEBApp/public/",
				'projects' => $this->projects,
				'all_projects' => $list_of_all_projects
			]
		);
	}

	public function AddProject() {
		$connections = AutomationConnection::getConnections();
		$this->view('project/project/add_project',
			[
				'bhref' => "/WEBApp/public/",
				'projects' => $this->projects,
				'connections' => $connections
			]
		);
	}

	public function Manage($project = '', $msg = '') {
		$column = "project_name";
		$column2 = "project_id";

		if($proj = DBProject::where($column, '=' , $project)->first()) {

			$components = DBProject::find($proj['project_id'])->component;
			$getSettings = PSetting::where('project_id', '=', $proj['project_id'])->first();
			$connections = AutomationConnection::getConnections();
			$connection_name = AutomationConnection::where("connection_id", "=", $proj['connection_id'])->pluck("connection_name");
			$this->view('project/main/manage_project',
				[
					'bhref' =>  "/WEBApp/public/",
					'project_name' => $proj['project_name'],
					'project_description' => $proj['project_description'],
					'project_id' => $proj['project_id'],
					'projects' => $this->projects,
					'msg' => $msg ,
					'components' => $components,
					'getSettings' => $getSettings,
					'jira_pname' => $proj['jira_pname'],
					'jira_component' => $proj['jira_component'],
					'jira_pname_key' => $proj['jira_pname_key'],
					'jira_component_key' => $proj['jira_component_key'],
					'connections' => $connections,
					'project_' => $proj,
					'connection_id' => $proj['connection_id'],
					'connection_name' => $connection_name
				]
			);
		} else {
			header('Location: ../../home/error404');
		}
	}

	public function exportTestCases() {
		$project = $_POST['project_name'];

		$test_cases = Capsule::table('test_case_detail as tcd')
				-> select('*',
					Capsule::raw("IFNULL(CONCAT(uits.first_name, ' ' , uits.last_name ), tcd.tc_tester) as tester"),
					Capsule::raw("IFNULL(CONCAT(uich.first_name, ' ' , uich.last_name ), tcd.tc_reviewer) as checker"),
					Capsule::raw("IFNULL(CONCAT(uidev.first_name, ' ' , uidev.last_name ), tcd.developer) as developer"),
					'tcd.test_case_detail_id as tcd_id')
				-> join('component as c', 'c.component_id', '=', 'tcd.component_id')
				-> join('project as p', 'p.project_id', '=', 'c.project_id')
				-> leftjoin('user_info as uidev', function ($join) {
						$join->on('uidev.username', '=', 'tcd.tc_tester');
					})
				-> leftjoin('user_info as uits', function ($join) {
						$join->on('uits.username', '=', 'tcd.tc_tester');
					})
				-> leftjoin('user_info as uich', function ($join) {
						$join->on('uich.username', '=', 'tcd.tc_reviewer');
					})
				-> orderBy('tcd.tc_id')
				-> orderBy('tcd.ts_id')
				-> where('p.project_name', '=', $project)
				-> where('tcd.main_or_jira', '=', 'main')
				-> get();

		require_once('Classes/PHPExcel.php');

		$tcData = new PHPExcel();
		$tcData -> getDefaultStyle()
				-> getFont()
				-> setName('Calibri');
		$tcData -> getDefaultStyle()
				-> getFont()
				-> setSize(11);

		$tcWriter = PHPExcel_IOFactory::createWriter($tcData, "Excel2007");

		$tcSheet = $tcData -> getActiveSheet();
		$tcSheet -> setTitle("Test Case Details");
		$tcSheet -> getStyle("A1:W1")
				-> getFont()
				-> setBold(true);
		$tcSheet -> getStyle("A1:W1")
				-> getAlignment()
				-> setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$tcSheet -> getStyle("A1:W1")
				-> applyFromArray(
					array(
						'fill' => array(
							'type' => PHPExcel_Style_Fill::FILL_SOLID,
							'color' => array(
								'rgb' => '800000'
								)
							),
						'font' => array(
							'bold' => true,
							'color' => array(
								'rgb' => 'FFFF00'
								),
							'size' => 11,
							'name' => 'Calibri'
							)
						)
					);

		$tcSheet -> getCell("A1")
				-> setValue("Test Case ID");
		$tcSheet -> getCell("B1")
				-> setValue("Test Scenario ID");
		$tcSheet -> getCell("C1")
				-> setValue("Test Case Name");
		$tcSheet -> getCell("D1")
				-> setValue("Test Scenario Name");
		$tcSheet -> getCell("E1")
				-> setValue("Description/Objective");
		$tcSheet -> getCell("F1")
				-> setValue("Scope");
		$tcSheet -> getCell("G1")
				-> setValue("Type");
		$tcSheet -> getCell("H1")
				-> setValue("Test Status");
		$tcSheet -> getCell("I1")
				-> setValue("Date Last Change");
		$tcSheet -> getCell("J1")
				-> setValue("Tester");
		$tcSheet -> getCell("K1")
				-> setValue("Comment");
		$tcSheet -> getCell("L1")
				-> setValue("Reviewed");
		$tcSheet -> getCell("M1")
				-> setValue("Priority");
		$tcSheet -> getCell("N1")
				-> setValue("Date Reviewed");
		$tcSheet -> getCell("O1")
				-> setValue("Reviewer");
		$tcSheet -> getCell("P1")
				-> setValue("Comment");
		$tcSheet -> getCell("Q1")
				-> setValue("Test Steps");
		$tcSheet -> getCell("R1")
				-> setValue("Expected Results");
		$tcSheet -> getCell("S1")
				-> setValue("Developed");
		$tcSheet -> getCell("T1")
				-> setValue("Date Finished");
		$tcSheet -> getCell("U1")
				-> setValue("Status");
		$tcSheet -> getCell("V1")
				-> setValue("Comment");
		$tcSheet -> getCell("W1")
				-> setValue("AT Script Location");

		$tcCounter = 2;
		foreach($test_cases as $tc) {
			$date_reviewed = (!$tc['date_reviewed'] == null) ? $tc['date_reviewed'] : "Not Yet Reviewed";
			$tcSheet -> getCell("A" . $tcCounter)
					-> setValue($tc['tc_id']);
			$tcSheet -> getStyle("A" . $tcCounter)
					-> getAlignment()
					-> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$tcSheet -> getCell("B" . $tcCounter)
					-> setValue($tc['ts_id']);
			$tcSheet -> getStyle("B" . $tcCounter)
					-> getAlignment()
					-> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$tcSheet -> getCell("C" . $tcCounter)
					-> setValue($tc['tc_name']);
			$tcSheet -> getStyle("C" . $tcCounter)
					-> getAlignment()
					-> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$tcSheet -> getCell("D" . $tcCounter)
					-> setValue($tc['ts_name']);
			$tcSheet -> getStyle("D" . $tcCounter)
					-> getAlignment()
					-> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$tcSheet -> getCell("E" . $tcCounter)
					-> setValue($tc['desc_obj']);
			$tcSheet -> getStyle("E" . $tcCounter)
					-> getAlignment()
					-> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$tcSheet -> getCell("F" . $tcCounter)
					-> setValue($tc['scope_of_test']);
			$tcSheet -> getStyle("F" . $tcCounter)
					-> getAlignment()
					-> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$tcSheet -> getCell("G" . $tcCounter)
					-> setValue($tc['type_of_test']);
			$tcSheet -> getStyle("G" . $tcCounter)
					-> getAlignment()
					-> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$tcSheet -> getCell("H" . $tcCounter)
					-> setValue($tc['tc_status']);
			$tcSheet -> getStyle("H" . $tcCounter)
					-> getAlignment()
					-> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$tcSheet -> getCell("I" . $tcCounter)
					-> setValue($tc['date_last_change']);
			$tcSheet -> getStyle("I" . $tcCounter)
					-> getAlignment()
					-> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$tcSheet -> getCell("J" . $tcCounter)
					-> setValue($tc['tester']);
			$tcSheet -> getStyle("J" . $tcCounter)
					-> getAlignment()
					-> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$tcSheet -> getCell("K" . $tcCounter)
					-> setValue("");
			$tcSheet -> getStyle("K" . $tcCounter)
					-> getAlignment()
					-> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$tcSheet -> getCell("L" . $tcCounter)
					-> setValue($tc['tc_reviewed']);
			$tcSheet -> getStyle("L" . $tcCounter)
					-> getAlignment()
					-> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$tcSheet -> getCell("M" . $tcCounter)
					-> setValue($tc['priority']);
			$tcSheet -> getStyle("M" . $tcCounter)
					-> getAlignment()
					-> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$tcSheet -> getCell("N" . $tcCounter)
					-> setValue($date_reviewed);
			$tcSheet -> getStyle("N" . $tcCounter)
					-> getAlignment()
					-> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$tcSheet -> getCell("O" . $tcCounter)
					-> setValue($tc['checker']);
			$tcSheet -> getStyle("O" . $tcCounter)
					-> getAlignment()
					-> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$tcSheet -> getCell("P" . $tcCounter)
					-> setValue("");
			$tcSheet -> getStyle("P" . $tcCounter)
					-> getAlignment()
					-> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$tcSheet -> getCell("Q" . $tcCounter)
					-> setValue($tc['test_steps']);
			$tcSheet -> getStyle("Q" . $tcCounter)
					-> getAlignment()
					-> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$tcSheet -> getCell("R" . $tcCounter)
					-> setValue($tc['expected_results']);
			$tcSheet -> getStyle("R" . $tcCounter)
					-> getAlignment()
					-> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$tcSheet -> getCell("S" . $tcCounter)
					-> setValue($tc['developer']);
			$tcSheet -> getStyle("S" . $tcCounter)
					-> getAlignment()
					-> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$tcSheet -> getCell("T" . $tcCounter)
					-> setValue($tc['date_finished']);
			$tcSheet -> getStyle("T" . $tcCounter)
					-> getAlignment()
					-> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$tcSheet -> getCell("U" . $tcCounter)
					-> setValue($tc['automation_status']);
			$tcSheet -> getStyle("U" . $tcCounter)
					-> getAlignment()
					-> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$tcSheet -> getCell("V" . $tcCounter)
					-> setValue("");
			$tcSheet -> getStyle("V" . $tcCounter)
					-> getAlignment()
					-> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$tcSheet -> getCell("W" . $tcCounter)
					-> setValue($tc['at_script_location']);
			$tcSheet -> getStyle("W" . $tcCounter)
					-> getAlignment()
					-> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

			$tcCounter++;
		}

		$tcSheet -> setAutoFilter("A1:W" . ($tcCounter - 1));

		$tcSheet -> getColumnDimension("A") 
				-> setWidth(37);
		$tcSheet -> getColumnDimension("B") 
				-> setWidth(21);
		$tcSheet -> getColumnDimension("C") 
				-> setWidth(22);
		$tcSheet -> getColumnDimension("D") 
				-> setWidth(42);
		$tcSheet -> getColumnDimension("E") 
				-> setWidth(66);
		$tcSheet -> getColumnDimension("F") 
				-> setWidth(16);
		$tcSheet -> getColumnDimension("G") 
				-> setWidth(15);
		$tcSheet -> getColumnDimension("H") 
				-> setWidth(22);
		$tcSheet -> getColumnDimension("I") 
				-> setWidth(29);
		$tcSheet -> getColumnDimension("J") 
				-> setWidth(17);
		$tcSheet -> getColumnDimension("K") 
				-> setWidth(20);
		$tcSheet -> getColumnDimension("L") 
				-> setWidth(20);
		$tcSheet -> getColumnDimension("M") 
				-> setWidth(17);
		$tcSheet -> getColumnDimension("N") 
				-> setWidth(26);
		$tcSheet -> getColumnDimension("O") 
				-> setWidth(19);
		$tcSheet -> getColumnDimension("P") 
				-> setWidth(20);
		$tcSheet -> getColumnDimension("Q") 
				-> setWidth(67);
		$tcSheet -> getColumnDimension("R") 
				-> setWidth(67);
		$tcSheet -> getColumnDimension("S") 
				-> setWidth(25);
		$tcSheet -> getColumnDimension("T") 
				-> setWidth(25);
		$tcSheet -> getColumnDimension("U") 
				-> setWidth(17);
		$tcSheet -> getColumnDimension("V") 
				-> setWidth(20);
		$tcSheet -> getColumnDimension("W") 
				-> setWidth(50);

		$tcSheet -> getStyle("A1:W".($tcCounter - 1))
						-> getBorders()
						-> getAllBorders()
						-> setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$tcSheet -> getStyle("E1:E" . $tcSheet -> getHighestRow())
				-> getAlignment()
				-> setWrapText(true);
		$tcSheet -> getStyle("Q1:Q" . $tcSheet -> getHighestRow())
				-> getAlignment()
				-> setWrapText(true);
		$tcSheet -> getStyle("R1:R" . $tcSheet -> getHighestRow())
				-> getAlignment()
				-> setWrapText(true);

		$tcData -> setActiveSheetIndex(0);

		$filename = "Test Cases - " . $project;
		$main = "C:/Downloads/";

		if(!file_exists($main)) {
			mkdir($main);
		}

		$directory = "C:/Downloads/Test Cases/";
		date_default_timezone_set("Asia/Hong_Kong");
		$date = date("m-d-Y_H-i-sa");

		if(!file_exists($directory)) {
			mkdir($directory);
		}

		$tcWriter -> save(str_replace(__FILE__, $directory . $filename . " (" . $date . ").xlsx",__FILE__));

		echo "Test Case list for " . $project . " successfully exported to " . $directory . $filename . " (" . $date . ").xlsx";
	}

	public function ManageTestCases($project = '', $component = '') {
		$column = "project_name";
		$proj = DBProject::where($column, '=' , $project)->first();
		$components = DBProject::find($proj['project_id'])->component;
		$project_id = $proj['project_id'];
		$component_list = Component::where('project_id' , '=', $proj['project_id'])
								-> lists('component_name')
								-> toArray();

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
						$join->on('uidev.username', '=', 'tcd.tc_tester');
					})
				-> leftjoin('user_info as uits', function ($join) {
						$join->on('uits.username', '=', 'tcd.tc_tester');
					})
				-> leftjoin('user_info as uich', function ($join) {
						$join->on('uich.username', '=', 'tcd.tc_reviewer');
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
						$join->on('uidev.username', '=', 'tcd.tc_tester');
					})
				-> leftjoin('user_info as uits', function ($join) {
						$join->on('uits.username', '=', 'tcd.tc_tester');
					})
				-> leftjoin('user_info as uich', function ($join) {
						$join->on('uich.username', '=', 'tcd.tc_reviewer');
					})
				-> orderBy('tcd.tc_id')
				-> orderBy('tcd.ts_id')
				-> where('c.component_id', '=', $component['component_id'])
				-> where('tcd.main_or_jira', '=', 'main')
            	-> get();
		} else {
			header("Location: ../../../home/error404");
		}

		$this->view(
			'project/main/manage_test_cases',
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

	public function createTestCase() {
		$matchThese = ['tc_id' => $_POST['tc_id'], 'ts_id' => $_POST['ts_id' ]];
		$getComponent = Component::where('component_id','=',$_POST['component_id'])->pluck('component_name');
		$ifExists = TCDetails::where($matchThese)->first();
		if($ifExists == null) {
			$insertTCDetails = array(
				'tc_id' => $_POST['tc_id'],
				'tc_name' => $_POST['tc_name'],
				'ts_id' => $_POST['ts_id'],
				'ts_name' => $_POST['ts_name'],
				'desc_obj' => $_POST['desc_obj'],
				'scope_of_test' => $_POST['scope_of_test'],
				'type_of_test' => $_POST['type_of_test'],
				'component_id' => $_POST['component_id'],
				'test_steps' =>  htmlentities($_POST['test_steps'], ENT_QUOTES, 'UTF-8'),
				'expected_results' =>  htmlentities($_POST['expected_results'], ENT_QUOTES, 'UTF-8'),
				'main_or_jira' => 'main',
				'tc_status' => 'In-Progress',
				'date_last_change' => date("Y-m-d H:i:s"),
				'tc_tester' => $_SESSION['username'],
				'tc_reviewed' => 'To Be Approved',
				'priority' => null,
				'date_reviewed' => null,
				'tc_reviewer' => null
			);

			$last_insert_id = TCDetails::insertGetId($insertTCDetails);

			$insertATDetails = array(
				'test_case_detail_id' => $last_insert_id,
				'at_script_location' => $_POST['tc_id'] . "_" . $_POST['ts_id'],
			);

			AutomationDetail::create($insertATDetails);
			header("Location: ManageTestCases/" . $_POST['project'] . "/" . $getComponent);
		} else {
			echo "error";
		}
	}

	public function updateTestCase() {
		if($_POST['name'] == 'tc_id' || $_POST['name'] == 'ts_id') {
			$validate = TCDetails::checkDetails($_POST['pk'],$_POST['name'] ,$_POST['value']);
			if ($validate == false) {
				$result = array('error' => "exists", 'data' => "");
				echo json_encode($result);
				return false;
			}
		}

		$tc = TCDetails::find($_POST['pk']);
		$tc->$_POST['name'] = htmlentities($_POST['value'], ENT_QUOTES, 'UTF-8');

		if($_POST['name'] == 'tc_status') {
			$tc->date_last_change =  date("Y-m-d H:i:s");
		} elseif($_POST['name'] == 'tc_reviewed') {
			$tc->date_reviewed =  date("Y-m-d H:i:s");
		}

		$tc->save();

		if($_POST['name'] == 'tc_id' || $_POST['name'] == 'ts_id' ) {
			TCDetails::updateATScriptLocation($_POST['pk']);
		}
	}

	public function updateProject() {

		$jiraProjectID = $_POST['project_name_select'];
		$jiraComponentID = $_POST['component_name_select'];
		$connectionID = $_POST['connection_id'];

		$jiraProjectName = "";
		$jiraComponentName = "";

		if($jiraProjectID != "") {
			$jiraProjectName = Capsule::connection('jira')
								-> table('project')
								-> select('pname')
								-> where('ID', '=', $jiraProjectID)
								-> pluck('pname');
		} else {
			$jiraProjectID = -1;
		}

		if($jiraComponentID != "") {

			$jira_ = explode(",", $jiraComponentID);
			$count_ = count($jira_);
			$jiraComponentName = "";

			$i = 0;
			foreach($jira_ as $j_) {
				$jiraCname = Capsule::connection('jira')
							-> table('component')
							-> select('cname')
							-> where('ID', '=', $j_)
							-> pluck('cname');
				$jiraComponentName = $jiraComponentName . $jiraCname;
				if(++$i != $count_) {
					$jiraComponentName = $jiraComponentName . ",";
				}
			}
		} else {
			$jiraComponentID = -1;
		}

		$dbproject = DBProject::find($_POST['project_id']);
		$dbproject->project_name = $_POST['project_name'];
		$dbproject->project_description = $_POST['project_description'];
		$dbproject->jira_pname = $jiraProjectName;
		$dbproject->jira_component = $jiraComponentName;
		$dbproject->jira_pname_key = $jiraProjectID;
		$dbproject->jira_component_key = $jiraComponentID;
		$dbproject->connection_id = $connectionID;

		$dbproject->save();
	}

	public function createProject() {
		$jiraProjectID = $_POST['project_name_select'];
		$jiraComponentID = $_POST['component_name_select'];
		$automation_connection_id = $_POST['connection_name_select'];

		$jiraProjectName = "";
		$jiraComponentName = "";

		if($jiraProjectID != "") {
			$jiraProjectName = Capsule::connection('jira')
								-> table('project')
								-> select('pname')
								-> where('ID', '=', $jiraProjectID)
								-> pluck('pname');
		} else {
			$jiraProjectID = -1;
		}

		if($jiraComponentID != "") {

			$jira_ = explode(",", $jiraComponentID);
			$count_ = count($jira_);
			$jiraComponentName = "";

			$i = 0;
			foreach($jira_ as $j_) {
				$jiraCname = Capsule::connection('jira')
							-> table('component')
							-> select('cname')
							-> where('ID', '=', $j_)
							-> pluck('cname');
				$jiraComponentName = $jiraComponentName . $jiraCname;
				if(++$i != $count_) {
					$jiraComponentName = $jiraComponentName . ",";
				}
			}
		} else {
			$jiraComponentID = -1;
		}

		$arr = array(
			'project_name' => $_POST['project_name'],
			'project_description' => $_POST['project_description'],
			'jira_pname' => $jiraProjectName,
			'jira_component' => $jiraComponentName,
			'jira_pname_key' => $jiraProjectID,
			'jira_component_key' => $jiraComponentID,
			'connection_id' => $automation_connection_id
		);

		$last_insert_id = DBProject::insertGetId($arr);
	}

	public function addComponent() {
		$arr = array (
			'component_name' => $_POST['component_name'],
			'project_id' => $_POST['project_id']
		);
		$column = "project_id";
		$proj = DBProject::where($column, '=' , $_POST['project_id'])
					-> first();
		try {
			Component::create($arr);
			header('Location: Manage/' . $proj['project_name'] . '/add_component_success' );
		} catch(PDOException $e) {
			echo "Error";
		}
	}

	public function addBrowser() {
		$add_browser = array (
			'browser_name' => $_POST['new_browser'],
			'project_id' => $_POST['project_id']
		);

		if(trim($add_browser['browser_name']) == '') {
			//
		} else {
			Browser::create($add_browser);
			header("Location: ../SmokeTest/Browser/".$_POST['project']."/".$_POST['release']);
		}
	}

	public function updateBrowserSettings() {
		$update_settings = PSetting::find($_POST['release_setting_key']);
		if(isset($_POST['browser_selection'])) {
			$selected_browser = serialize($_POST['browser_selection']);
			$update_settings->value = $selected_browser;
			$update_settings->save();
		} else {
			$array = array($_POST['no_browser']);
			$selected_browser = serialize($array);
			$update_settings->value = $selected_browser;
			$update_settings->save();
		}

		header("Location: ../SmokeTest/Browser/" . $_POST['project'] . "/" . $_POST['release']);
	}

	public function getProjectSidebar() {
		$arr = DBProject::where('activated', '=', 1)->lists('project_name');
		return $arr;
	}

	public function Project_Main($project = '') {
		$column = "project_name";
		$selectColumn = "p.project_name";
		$project = urldecode($project);
		$proj = DBProject::where($column, '=' , $project)
				-> first();
		$isEmpty = 'true';

		if($proj['jira_pname'] != "") {
			$selectColumn = "p.jira_pname";
			$column = "jira_pname";
			$isEmpty = $proj['jira_pname'] . " - " . $selectColumn . " - " . $column;
		}

		$component_summary = Capsule::table("test_case_detail as tcd")
				-> select(
						Capsule::raw("ifnull(count(distinct tcd.tc_id), 0) as tc_id_count"),
						Capsule::raw("ifnull(count(tcd.ts_id), 0) as ts_id_count"),
						Capsule::raw("sum(case when tcd.manual_automation = 'Automation' then 1 else 0 end) as automation_count"),
						"c.component_id as component_id",
						"c.component_name as component_name"
					)
				-> join("component as c", "c.component_id", "=", "tcd.component_id")
				-> join("project as p", "p.project_id", "=", "c.project_id")
				-> where($selectColumn, "=", $proj[$column])
				-> where("p.project_id", '=', $proj['project_id'])
				-> where("tcd.main_or_jira", "=", "main")
				-> groupBy("c.component_name")
				-> get();

		$test_cases = Capsule::table("test_case_detail as tcd")
				-> select(
						"*",
						Capsule::raw("ifnull(jt.jira_pkey, '') as jira"),
						"c.component_name as component_name",
						Capsule::raw("IFNULL(CONCAT(uits.first_name, ' ' , uits.last_name ), tcd.tc_tester) as tester"),
						Capsule::raw("IFNULL(CONCAT(uich.first_name, ' ' , uich.last_name ), tcd.tc_reviewer) as checker"),
						Capsule::raw("IFNULL(CONCAT(uidev.first_name, ' ' , uidev.last_name ), tcd.developer) as developer")
					)
				-> leftjoin('jira_ticket as jt', function($join) {
						$join -> on('jt.jira_ticket_id', '=', 'tcd.jira_ticket_id');
					})
				-> leftjoin('user_info as uidev', function ($join) {
						$join->on('uidev.username', '=', 'tcd.tc_tester');
					})
				-> leftjoin('user_info as uits', function ($join) {
						$join->on('uits.username', '=', 'tcd.tc_tester');
					})
				-> leftjoin('user_info as uich', function ($join) {
						$join->on('uich.username', '=', 'tcd.tc_reviewer');
					})
				-> join('component as c', 'c.component_id', '=', 'tcd.component_id')
				-> join('project as p', 'p.project_id', '=', 'c.project_id')
				-> where($selectColumn, '=', $proj[$column])
				-> where("p.project_id", '=', $proj['project_id'])
				-> where('tcd.main_or_jira', '=', 'main')
				-> orderBy('tcd.tc_id')
				-> orderBy('tcd.ts_id')
				-> get();

		$jira_list = "";

		if($proj['jira_component'] == "") {
			$jira_list = Capsule::table("jira_ticket as jt")
				-> select(
						"jt.*",
						"te.*",
						"pr.*"
					)
				-> leftjoin("ticket_estimated as te", function($join) {
						$join -> on("te.jira_ticket_id", "=", "jt.jira_ticket_id");
					})
				-> join("project_release as pr", "pr.project_release_id", "=", "jt.project_release_id")
				-> join("project_release_association as pra", "pra.release_id", "=", "pr.project_release_id")
				-> join("project as p", "p.project_id", "=", "pra.project_id")
				-> where($selectColumn, "=", $proj[$column])
				-> where("pra.association_type", "=", "jira")
				-> groupBy("jt.jira_pkey")
				-> get();
		} else {
			$jira_ = explode(",", $proj['jira_component']);

			$jira_list = Capsule::table("jira_ticket as jt")
				-> select(
						"jt.*",
						"te.*",
						"pr.*"
					)
				-> leftjoin("ticket_estimated as te", function($join) {
						$join -> on("te.jira_ticket_id", "=", "jt.jira_ticket_id");
					})
				-> join("project_release as pr", "pr.project_release_id", "=", "jt.project_release_id")
				-> join("project_release_association as pra", "pra.release_id", "=", "pr.project_release_id")
				-> join("project as p", "p.project_id", "=", "pra.project_id")
				-> where($selectColumn, "=", $proj[$column])
				-> whereIn("jt.component", $jira_)
				-> where("pra.association_type", "=", "jira")
				-> groupBy("jt.jira_pkey")
				-> get();
		}

		$jira_test_cases = Capsule::table("test_case_detail as tcd")
				-> select(
						"tcd.*",
						"jt.*",
						Capsule::raw("IFNULL(CONCAT(uits.first_name, ' ' , uits.last_name ), tcd.tc_tester) as tester"),
						Capsule::raw("IFNULL(CONCAT(uich.first_name, ' ' , uich.last_name ), tcd.tc_reviewer) as checker"),
						Capsule::raw("IFNULL(CONCAT(uidev.first_name, ' ' , uidev.last_name ), tcd.developer) as developer")
					)
				-> leftjoin('user_info as uidev', function ($join) {
						$join->on('uidev.username', '=', 'tcd.tc_tester');
					})
				-> leftjoin('user_info as uits', function ($join) {
						$join->on('uits.username', '=', 'tcd.tc_tester');
					})
				-> leftjoin('user_info as uich', function ($join) {
						$join->on('uich.username', '=', 'tcd.tc_reviewer');
					})
				-> join("jira_ticket as jt", "jt.jira_ticket_id", "=", "tcd.jira_ticket_id")
				-> join("project_release as pr", "pr.project_release_id", "=", "jt.project_release_id")
				-> join("project_release_association as pra", "pra.release_id", "=", "pr.project_release_id")
				-> join("project as p", "p.project_id", "=", "pra.project_id")
				-> where($selectColumn, "=", $proj[$column])
				-> orderBy('tcd.tc_id')
				-> orderBy('tcd.ts_id')
				-> groupBy('tcd.test_case_detail_id')
				-> get();

		if(!$proj == null) {
			$this->view(
				'Project/main/index',
					[
						'bhref' => "/WEBApp/public/",
						'project' => $project,
						'projects' => $this->projects,
						'component_summary' => $component_summary,
						'test_cases' => $test_cases,
						'jira_list' => $jira_list,
						'jira_test_cases' => $jira_test_cases,
						'isEmpty' => $isEmpty
					]
			);
		} else {
			header('Location:  /WEBApp/public/home/error404');
		}
	}

	public function exportProjectJira() {
		$project = $_POST["project_name"];

		$column = "project_name";
		$selectColumn = "p.project_name";

		$proj = DBProject::where($column, '=' , $project)
				-> first();
		$isEmpty = 'true';

		if($proj['jira_pname'] != "") {
			$selectColumn = "p.jira_pname";
			$column = "jira_pname";
			$isEmpty = $proj['jira_pname'] . " - " . $selectColumn . " - " . $column;
		}

		$jira_list = "";

		if($proj['jira_component'] == "") {
			$jira_list = Capsule::table("jira_ticket as jt")
				-> select(
						"jt.*",
						"te.*",
						"pr.*"
					)
				-> leftjoin("ticket_estimated as te", function($join) {
						$join -> on("te.jira_ticket_id", "=", "jt.jira_ticket_id");
					})
				-> join("project_release as pr", "pr.project_release_id", "=", "jt.project_release_id")
				-> join("project_release_association as pra", "pra.release_id", "=", "pr.project_release_id")
				-> join("project as p", "p.project_id", "=", "pra.project_id")
				-> where($selectColumn, "=", $proj[$column])
				-> where("pra.association_type", "=", "jira")
				-> groupBy("jt.jira_pkey")
				-> get();
		} else {
			$jira_ = explode(",", $proj['jira_component']);

			$jira_list = Capsule::table("jira_ticket as jt")
				-> select(
						"jt.*",
						"te.*",
						"pr.*"
					)
				-> leftjoin("ticket_estimated as te", function($join) {
						$join -> on("te.jira_ticket_id", "=", "jt.jira_ticket_id");
					})
				-> join("project_release as pr", "pr.project_release_id", "=", "jt.project_release_id")
				-> join("project_release_association as pra", "pra.release_id", "=", "pr.project_release_id")
				-> join("project as p", "p.project_id", "=", "pra.project_id")
				-> where($selectColumn, "=", $proj[$column])
				-> whereIn("jt.component", $jira_)
				-> where("pra.association_type", "=", "jira")
				-> groupBy("jt.jira_pkey")
				-> get();
		}

		$jira_test_cases = Capsule::table("test_case_detail as tcd")
				-> select(
						"tcd.*",
						"jt.*",
						Capsule::raw("IFNULL(CONCAT(uits.first_name, ' ' , uits.last_name ), tcd.tc_tester) as tester"),
						Capsule::raw("IFNULL(CONCAT(uich.first_name, ' ' , uich.last_name ), tcd.tc_reviewer) as checker"),
						Capsule::raw("IFNULL(CONCAT(uidev.first_name, ' ' , uidev.last_name ), tcd.developer) as developer")
					)
				-> leftjoin('user_info as uidev', function ($join) {
						$join->on('uidev.username', '=', 'tcd.tc_tester');
					})
				-> leftjoin('user_info as uits', function ($join) {
						$join->on('uits.username', '=', 'tcd.tc_tester');
					})
				-> leftjoin('user_info as uich', function ($join) {
						$join->on('uich.username', '=', 'tcd.tc_reviewer');
					})
				-> join("jira_ticket as jt", "jt.jira_ticket_id", "=", "tcd.jira_ticket_id")
				-> join("project_release as pr", "pr.project_release_id", "=", "jt.project_release_id")
				-> join("project_release_association as pra", "pra.release_id", "=", "pr.project_release_id")
				-> join("project as p", "p.project_id", "=", "pra.project_id")
				-> where($selectColumn, "=", $proj[$column])
				-> orderBy('tcd.tc_id')
				-> orderBy('tcd.ts_id')
				-> groupBy('tcd.test_case_detail_id')
				-> get();

		require_once('Classes/PHPExcel.php');

		$pjiraData = new PHPExcel();
		$pjiraData -> getDefaultStyle()
					-> getFont()
					-> setName('Calibri');
		$pjiraData -> getDefaultStyle()
					-> getFont()
					-> setSize(11);
		
		$pjiraWriter = PHPExcel_IOFactory::createWriter($pjiraData, "Excel2007");

		$pjiraSheet = $pjiraData -> getActiveSheet();
		$pjiraSheet -> setTitle("Summary");
		$pjiraSheet -> getStyle("A1:F1")
					-> getFont()
					-> setBold(true)
					-> setSize(11);
		$pjiraSheet -> getStyle("A1:F1")
					-> applyFromArray(
						array(
							'fill' => array(
								'type' => PHPExcel_Style_Fill::FILL_SOLID,
								'color' => array(
									'rgb' => '800000'
									)
								),
							'font' => array(
								'bold' => true,
								'color' => array(
									'rgb' => 'FFFF00'
									),
								'size' => 11,
								'name' => 'Calibri'
								)
							)
						);
		$pjiraSheet -> getStyle("A1:F1")
					-> getAlignment()
					-> setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$pjiraSheet -> getCell("A1")
					-> setValue("Ticket");
		$pjiraSheet -> getCell("B1")
					-> setValue("Release");
		$pjiraSheet -> getCell("C1")
					-> setValue("Summary");
		$pjiraSheet -> getCell("D1")
					-> setValue("Component");
		$pjiraSheet -> getCell("E1")
					-> setValue("QBIT Status");
		$pjiraSheet -> getCell("F1")
					-> setValue("JIRA Status");

		$counter = 2;
		foreach($jira_list as $jl) {
			$QBITStatus = $jl['qbit_status'];
			if($QBITStatus == 'NotAssigned') {
				$QBITStatus = "Not Assigned";
			} elseif($QBITStatus == 'NotYetScheduled') {
				$QBITStatus = "Not Yet Scheduled";
			} elseif($QBITStatus == 'TCCreationNotStarted') {
				$QBITStatus = "Creation Not Started";
			} elseif($QBITStatus == 'TCCreationInProgress') {
				$QBITStatus = "Creation In Progress";
			} elseif($QBITStatus == 'TCCreationCompletedForReview') {
				$QBITStatus = "Creation for Review";
			} elseif($QBITStatus == 'TCExecutionNotStarted') {
				$QBITStatus = "Execution Not Started";
			} elseif($QBITStatus == 'TCExecutionInProgress') {
				$QBITStatus = "Execution In Progress";
			} elseif($QBITStatus == 'TCExecutionCompletedForReview') {
				$QBITStatus = "Execution for Review";
			} elseif($QBITStatus == 'ForSignOff') {
				$QBITStatus = "For SignOff";
			}

			$pjiraSheet -> getCell("A" . $counter)
						-> setValue($jl["jira_pkey"]);
			$hasTestCase = false;
			foreach($jira_test_cases as $jtc) {
				if($jtc["jira_ticket_id"] == $jl["jira_ticket_id"]) {
					$hasTestCase = true;
					break;
				}
			}
			if($hasTestCase) {
				$pjiraSheet -> getCell("A" . $counter) -> getHyperlink() -> setUrl("sheet://'" . $jl["jira_pkey"] . "'!A1");
				$pjiraSheet -> getStyle("A" . $counter)
					-> applyFromArray(
						array(
							'font' => array(
								'color' => array(
									'rgb' => '0000FF'
									),
								'underline' => 'single'
								)
							)
						);
			}
			$pjiraSheet -> getCell("B" . $counter)
						-> setValue($jl["release_name"]);
			$pjiraSheet -> getCell("C" . $counter)
						-> setValue($jl["summary"]);
			$pjiraSheet -> getCell("D" . $counter)
						-> setValue($jl["component"]);
			$pjiraSheet -> getCell("E" . $counter)
						-> setValue($QBITStatus);
			$pjiraSheet -> getCell("F" . $counter)
						-> setValue($jl["jira_status"]);

			$pjiraSheet -> getRowDimension($counter)
						-> setRowHeight(20);
			$pjiraSheet -> getStyle("A" . $counter)
					-> getAlignment() 
					-> setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$pjiraSheet -> getStyle("A" . $counter)
					-> getAlignment() 
					-> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$pjiraSheet -> getStyle("B" . $counter)
					-> getAlignment() 
					-> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$pjiraSheet -> getStyle("B" . $counter)
					-> getAlignment() 
					-> setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$pjiraSheet -> getStyle("C" . $counter) 
					-> getAlignment() 
					-> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$pjiraSheet -> getStyle("D" . $counter) 
					-> getAlignment() 
					-> setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$pjiraSheet -> getStyle("D" . $counter) 
					-> getAlignment() 
					-> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$pjiraSheet -> getStyle("E" . $counter) 
					-> getAlignment() 
					-> setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$pjiraSheet -> getStyle("E" . $counter) 
					-> getAlignment() 
					-> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$pjiraSheet -> getStyle("F" . $counter) 
					-> getAlignment() 
					-> setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$pjiraSheet -> getStyle("F" . $counter) 
					-> getAlignment() 
					-> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

			$counter++;
		}

		$pjiraSheet -> getStyle("A1:F".($counter - 1)) -> getBorders() -> getAllBorders() -> setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$pjiraSheet -> setAutoFilter("A1:F" . ($counter - 1));

		$columnStart = ord("A");
		for($i = 0; $i < 6; $i++) {
			if(chr($columnStart + $i) == "B") {
				$pjiraSheet -> getColumnDimension(chr($columnStart + $i))
							-> setWidth(12);
			} elseif(chr($columnStart + $i) == "F") {
				$pjiraSheet -> getColumnDimension(chr($columnStart + $i))
							-> setWidth(15);
			} else {
				$pjiraSheet -> getColumnDimension(chr($columnStart + $i))
							-> setAutoSize(true);
			}
		}

		$index = 1;
		foreach($jira_list as $jl) {
			$hasTestCase = false;
			foreach($jira_test_cases as $jtc) {
				if($jtc["jira_ticket_id"] == $jl["jira_ticket_id"]) {
					$hasTestCase = true;
					break;
				}
			}
			if(!$hasTestCase) {
				continue;
			}

			$pjiraSheet = $pjiraData -> createSheet($index);

			$pjiraSheet -> setTitle($jl["jira_pkey"]);

			$tcCounter = 2;
			foreach($jira_test_cases as $jtc) {
				if($jtc["jira_ticket_id"] == $jl["jira_ticket_id"]) {

					$date_reviewed = (!$jtc['date_reviewed'] == null)  ? $jtc['date_reviewed']  : "Not Yet Reviewed";

					$pjiraSheet -> getCell("A" . $tcCounter) -> setValue($jtc["tc_id"]);
					$pjiraSheet -> getCell("B" . $tcCounter) -> setValue($jtc["tc_name"]);
					$pjiraSheet -> getCell("C" . $tcCounter) -> setValue($jtc["ts_id"]);
					$pjiraSheet -> getCell("D" . $tcCounter) -> setValue($jtc["ts_name"]);
					$pjiraSheet -> getCell("E" . $tcCounter) -> setValue($jtc["scope_of_test"]);
					$pjiraSheet -> getCell("F" . $tcCounter) -> setValue($jtc["type_of_test"]);
					if($jtc["manual_automation"] == "Manual") {
						$pjiraSheet -> getCell("G" . $tcCounter) -> setValue("YES");
						$pjiraSheet -> getCell("H" . $tcCounter) -> setValue("");
					} elseif($jtc["manual_automation"] == "Automation") {
						$pjiraSheet -> getCell("G" . $tcCounter) -> setValue("");
						$pjiraSheet -> getCell("H" . $tcCounter) -> setValue("YES");
					}
					$pjiraSheet -> getCell("I" . $tcCounter) -> setValue($jtc["tc_status"]);
					$pjiraSheet -> getCell("J" . $tcCounter) -> setValue($jtc["date_last_change"]);
					$pjiraSheet -> getCell("K" . $tcCounter) -> setValue($jtc["tester"]);
					$pjiraSheet -> getCell("L" . $tcCounter) -> setValue($jtc["tc_comments"]);
					$pjiraSheet -> getCell("M" . $tcCounter) -> setValue($jtc["tc_reviewed"]);
					$pjiraSheet -> getCell("N" . $tcCounter) -> setValue($jtc["priority"]);
					$pjiraSheet -> getCell("O" . $tcCounter) -> setValue($date_reviewed);
					$pjiraSheet -> getCell("P" . $tcCounter) -> setValue($jtc["checker"]);
					$pjiraSheet -> getCell("Q" . $tcCounter) -> setValue("");
					$pjiraSheet -> getCell("R" . $tcCounter) -> setValue($jtc["test_steps"]);
					$pjiraSheet -> getStyle("R" . $tcCounter) -> getAlignment() -> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
					$pjiraSheet -> getCell("S" . $tcCounter) -> setValue($jtc["expected_results"]);
					$pjiraSheet -> getStyle("S" . $tcCounter) -> getAlignment() -> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
					$pjiraSheet -> getCell("T" . $tcCounter) -> setValue($jtc["developer"]);
					$pjiraSheet -> getCell("U" . $tcCounter) -> setValue($jtc["date_finished"]);
					$pjiraSheet -> getCell("V" . $tcCounter) -> setValue($jtc["automation_status"]);
					$pjiraSheet -> getCell("W" . $tcCounter) -> setValue("");
					$pjiraSheet -> getCell("X" . $tcCounter) -> setValue($jtc["at_script_location"]);

					$tcCounter++;
				}
			}

			$pjiraSheet -> setAutoFilter("A1:Y" . ($tcCounter - 1));

			$pjiraSheet -> getStyle("A1:Y".($tcCounter - 1)) -> getBorders() -> getAllBorders() -> setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);

			$pjiraSheet -> getStyle("A1:Y1") -> getFont() -> setBold(true) -> setSize(14);
			$pjiraSheet -> getStyle("A1:Y1") -> getAlignment() -> setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$pjiraSheet -> getCell("A1") -> setValue("Test Case ID");
			$pjiraSheet -> getColumnDimension("A") -> setAutoSize(true);
			$pjiraSheet -> getCell("B1") -> setValue("Test Case Name");
			$pjiraSheet -> getColumnDimension("B") -> setAutoSize(true);
			$pjiraSheet -> getCell("C1") -> setValue("Test Scenario ID");
			$pjiraSheet -> getColumnDimension("C") -> setAutoSize(true);
			$pjiraSheet -> getCell("D1") -> setValue("Test Scenario Name");
			$pjiraSheet -> getColumnDimension("D") -> setAutoSize(true);
			$pjiraSheet -> getCell("E1") -> setValue("Scope");
			$pjiraSheet -> getColumnDimension("E") -> setAutoSize(true);
			$pjiraSheet -> getCell("F1") -> setValue("Type");
			$pjiraSheet -> getColumnDimension("F") -> setAutoSize(true);
			$pjiraSheet -> getCell("G1") -> setValue("Manual");
			$pjiraSheet -> getColumnDimension("G") -> setAutoSize(true);
			$pjiraSheet -> getCell("H1") -> setValue("Automation");
			$pjiraSheet -> getColumnDimension("H") -> setAutoSize(true);
			$pjiraSheet -> getCell("I1") -> setValue("Test Status");
			$pjiraSheet -> getColumnDimension("I") -> setAutoSize(true);
			$pjiraSheet -> getCell("J1") -> setValue("Date Last Change");
			$pjiraSheet -> getColumnDimension("J") -> setAutoSize(true);
			$pjiraSheet -> getCell("K1") -> setValue("Tester");
			$pjiraSheet -> getColumnDimension("K") -> setAutoSize(true);
			$pjiraSheet -> getCell("L1") -> setValue("Comment");
			$pjiraSheet -> getColumnDimension("L") -> setAutoSize(true);
			$pjiraSheet -> getCell("M1") -> setValue("Reviewed");
			$pjiraSheet -> getColumnDimension("M") -> setAutoSize(true);
			$pjiraSheet -> getCell("N1") -> setValue("Priority");
			$pjiraSheet -> getColumnDimension("N") -> setAutoSize(true);
			$pjiraSheet -> getCell("O1") -> setValue("Date Reviewed");
			$pjiraSheet -> getColumnDimension("O") -> setAutoSize(true);
			$pjiraSheet -> getCell("P1") -> setValue("Reviewer");
			$pjiraSheet -> getColumnDimension("P") -> setAutoSize(true);
			$pjiraSheet -> getCell("Q1") -> setValue("Comment");
			$pjiraSheet -> getColumnDimension("Q") -> setAutoSize(true);
			$pjiraSheet -> getCell("R1") -> setValue("Test Steps");
			$pjiraSheet -> getStyle("R1:R" . $pjiraSheet -> getHighestRow()) -> getAlignment() -> setWrapText(true);
			$pjiraSheet -> getColumnDimension("R") -> setWidth(80);
			$pjiraSheet -> getCell("S1") -> setValue("Expected Results");
			$pjiraSheet -> getStyle("S1:S" . $pjiraSheet -> getHighestRow()) -> getAlignment() -> setWrapText(true);
			$pjiraSheet -> getColumnDimension("S") -> setWidth(80);
			$pjiraSheet -> getCell("T1") -> setValue("Developed");
			$pjiraSheet -> getColumnDimension("T") -> setAutoSize(true);
			$pjiraSheet -> getCell("U1") -> setValue("Date Finished");
			$pjiraSheet -> getColumnDimension("U") -> setAutoSize(true);
			$pjiraSheet -> getCell("V1") -> setValue("Status");
			$pjiraSheet -> getColumnDimension("V") -> setAutoSize(true);
			$pjiraSheet -> getCell("W1") -> setValue("Comment");
			$pjiraSheet -> getColumnDimension("W") -> setAutoSize(true);
			$pjiraSheet -> getCell("X1") -> setValue("AT Script Location");
			$pjiraSheet -> getColumnDimension("X") -> setAutoSize(true);

			$index++;
		}

		$pjiraData -> setActiveSheetIndex(0);

		$filename = "JIRA Summary - " . $project;
		$main = "C:/Downloads/";

		if(!file_exists($main)) {
			mkdir($main);
		}
		$directory = "C:/Downloads/JIRA Summary/";
		date_default_timezone_set("Asia/Hong_Kong");
		$date = date("m-d-Y_H-i-sa");

		if(!file_exists($directory)) {
			mkdir($directory);
		}

		$pjiraWriter->save(str_replace(__FILE__, $directory . $filename . " (" . $date . ").xlsx",__FILE__));

		echo "JIRA summary successfully exported to " . $directory . $filename . " (" . $date . ").xlsx";
	}

	public function AutomationResults($project = '') {
		$column = "project_name";
		$project = urldecode($project);
		$proj = DBProject::where($column, '=' , $project)
						-> first();
		$autoResults = "";

		if($proj["connection_id"] != 0) {
			$connectionName = AutomationConnection::where("connection_id", "=", $proj['connection_id'])
												-> pluck("connection_name");
			$autoResults = DBAutomation::getAutomationResults($connectionName);
		}

		if(!$proj == null) {
			$this->view(
				'Project/main/automation_results',
				[
					'bhref' => "/WEBApp/public/",
					'project' => $project,
					'projects' => $this->projects,
					'autoResults' => $autoResults,
					'project_' => $proj
				]
			);
		} else {
			header('Location: /WEBApp/public/home/error404');
		}
	}

	public function exportAutomationsList() {
		$project = $_POST['project_name'];

		$column = "project_name";
		$proj = DBProject::where($column, '=' , $project)
						-> first();

		$autoResults = json_decode($_POST['automation_results'], true);

		require_once('Classes/PHPExcel.php');

		$autoData = new PHPExcel();
		$autoData -> getDefaultStyle()
					-> getFont()
					-> setName('Calibri');
		$autoData -> getDefaultStyle()
					-> getFont()
					-> setSize(11);
		
		$autoWriter = PHPExcel_IOFactory::createWriter($autoData, "Excel2007");

		$autoSheet = $autoData -> getActiveSheet();
		$autoSheet -> setTitle("Automations List");
		$autoSheet -> getStyle("A1:I1")
					-> getFont()
					-> setBold(true)
					-> setSize(11);
		$autoSheet -> getStyle("A1:I1")
					-> getAlignment()
					-> setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$autoSheet -> getStyle("A1:I1")
					-> applyFromArray(
						array(
							'fill' => array(
								'type' => PHPExcel_Style_Fill::FILL_SOLID,
								'color' => array(
									'rgb' => '800000'
									)
								),
							'font' => array(
								'bold' => true,
								'color' => array(
									'rgb' => 'FFFF00'
									),
								'size' => 11,
								'name' => 'Calibri'
								)
							)
						);

		$autoCounter = 2;
		foreach($autoResults as $ar) {
			$autoSheet -> getCell("A" . $autoCounter)
						-> setValue("Exec-" . $ar['execid']);
			$autoSheet -> getCell("B" . $autoCounter)
						-> setValue($ar['totalPass']);
			$autoSheet -> getCell("C" . $autoCounter)
						-> setValue($ar['totalFail']);
			$autoSheet -> getCell("D" . $autoCounter)
						-> setValue($ar['totalSkip']);
			$autoSheet -> getCell("E" . $autoCounter)
						-> setValue($ar['totalTestCase']);
			$autoSheet -> getCell("F" . $autoCounter)
						-> setValue($ar['mintime']);
			$autoSheet -> getCell("G" . $autoCounter)
						-> setValue($ar['maxtime']);
			$autoSheet -> getCell("H" . $autoCounter)
						-> setValue($ar['elapsedtime']);
			$autoSheet -> getCell("I" . $autoCounter)
						-> setValue($ar['sumtime']);

			$autoSheet -> getStyle("A" . $autoCounter . ":I" . $autoCounter)
					-> getAlignment()
					-> setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

			$autoCounter++;
		}

		$autoSheet -> getCell("A1")
					-> setValue("Execution ID");
		$autoSheet -> getColumnDimension("A")
					-> setAutoSize(true);
		$autoSheet -> getCell("B1")
					-> setValue("Passed");
		$autoSheet -> getColumnDimension("B")
					-> setAutoSize(true);
		$autoSheet -> getCell("C1")
					-> setValue("Failed");
		$autoSheet -> getColumnDimension("C")
					-> setAutoSize(true);
		$autoSheet -> getCell("D1")
					-> setValue("Skipped");
		$autoSheet -> getColumnDimension("D")
					-> setAutoSize(true);
		$autoSheet -> getCell("E1")
					-> setValue("Total Test Cases");
		$autoSheet -> getColumnDimension("E")
					-> setAutoSize(true);
		$autoSheet -> getCell("F1")
					-> setValue("Time Started");
		$autoSheet -> getColumnDimension("F")
					-> setAutoSize(true);
		$autoSheet -> getCell("G1")
					-> setValue("Time Ended");
		$autoSheet -> getColumnDimension("G")
					-> setAutoSize(true);
		$autoSheet -> getCell("H1")
					-> setValue("Time Elapsed");
		$autoSheet -> getColumnDimension("H")
					-> setAutoSize(true);
		$autoSheet -> getCell("I1")
					-> setValue("Total Execution Time");
		$autoSheet -> getColumnDimension("I")
					-> setAutoSize(true);

		$autoSheet -> getStyle("A1:I".($autoCounter - 1))
					-> getBorders()
					-> getAllBorders()
					-> setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$autoSheet -> setAutoFilter("A1:I" . ($autoCounter - 1));

		$autoData -> setActiveSheetIndex(0);

		$filename = "Automation Results - " . $project;
		$main = "C:/Downloads/";

		if(!file_exists($main)) {
			mkdir($main);
		}
		$directory = "C:/Downloads/Automation Results/";
		date_default_timezone_set("Asia/Hong_Kong");
		$date = date("m-d-Y_H-i-sa");

		if(!file_exists($directory)) {
			mkdir($directory);
		}

		$autoWriter->save(str_replace(__FILE__, $directory . $filename . " (" . $date . ").xlsx",__FILE__));

		echo "Automation Results for " . $project . " successfully exported to " . $directory . $filename . " (" . $date . ").xlsx";
	}

	public function exportExecutionResults() {
		$project_name = $_POST['project_name'];
		$execid = $_POST['exec_id'];
		
		$column = "project_name";
		$proj = DBProject::where($column, '=', $project_name)
						->first();

		$connectionName = AutomationConnection::where('connection_id', '=', $proj['connection_id'])
											-> pluck('connection_name');
		$execution_results = DBAutomation::getExecutionResults($execid, $connectionName);

		require_once('Classes/PHPExcel.php');

		$execData = new PHPExcel();
		$execData -> getDefaultStyle()
					-> getFont()
					-> setName('Calibri');
		$execData -> getDefaultStyle()
					-> getFont()
					-> setSize(11);
		
		$execWriter = PHPExcel_IOFactory::createWriter($execData, "Excel2007");

		$execSheet = $execData -> getActiveSheet();
		$execSheet -> setTitle("Execution Results - " . $execid);
		$execSheet -> getStyle("A1:H1")
					-> getFont()
					-> setBold(true)
					-> setSize(11);
		$execSheet -> getStyle("A1:H1")
					-> getAlignment()
					-> setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$execSheet -> getStyle("A1:H1")
					-> applyFromArray(
						array(
							'fill' => array(
								'type' => PHPExcel_Style_Fill::FILL_SOLID,
								'color' => array(
									'rgb' => '800000'
									)
								),
							'font' => array(
								'bold' => true,
								'color' => array(
									'rgb' => 'FFFF00'
									),
								'size' => 11,
								'name' => 'Calibri'
								)
							)
						);

		$execCounter = 2;
		foreach($execution_results as $er) {
			$execSheet -> getCell("A" . $execCounter)
						-> setValue($er['tid']);
			$execSheet -> getCell("B" . $execCounter)
						-> setValue($er['desc']);
			$execSheet -> getCell("C" . $execCounter)
						-> setValue($er['result']);
			$execSheet -> getCell("D" . $execCounter)
						-> setValue($er['username']);
			$execSheet -> getCell("E" . $execCounter)
						-> setValue($er['errormessage']);
			$execSheet -> getCell("F" . $execCounter)
						-> setValue("Value");
			$execSheet -> getCell("G" . $execCounter)
						-> setValue($er['start']);
			$execSheet -> getCell("H" . $execCounter)
						-> setValue($er['end']);

			$execSheet -> getStyle("A" . $execCounter . ":H" . $execCounter)
					-> getAlignment()
					-> setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

			$execCounter++;
		}

		$execSheet -> getCell("A1")
					-> setValue("Test Case ID");
		$execSheet -> getColumnDimension("A")
					-> setAutoSize(true);
		$execSheet -> getCell("B1")
					-> setValue("Description");
		$execSheet -> getColumnDimension("B")
					-> setAutoSize(true);
		$execSheet -> getCell("C1")
					-> setValue("Result");
		$execSheet -> getColumnDimension("C")
					-> setAutoSize(true);
		$execSheet -> getCell("D1")
					-> setValue("Username");
		$execSheet -> getColumnDimension("D")
					-> setAutoSize(true);
		$execSheet -> getCell("E1")
					-> setValue("Error Message");
		$execSheet -> getColumnDimension("E")
					-> setWidth(120);
		$execSheet -> getStyle("E1:E" . $execSheet -> getHighestRow())
					-> getAlignment()
					-> setWrapText(true);
		$execSheet -> getCell("F1")
					-> setValue("Screenshot");
		$execSheet -> getColumnDimension("F")
					-> setAutoSize(true);
		$execSheet -> getCell("G1")
					-> setValue("Time Started");
		$execSheet -> getColumnDimension("G")
					-> setAutoSize(true);
		$execSheet -> getCell("H1")
					-> setValue("Time Ended");
		$execSheet -> getColumnDimension("H")
					-> setAutoSize(true);

		$execSheet -> getStyle("A1:H".($execCounter - 1))
					-> getBorders()
					-> getAllBorders()
					-> setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$execSheet -> setAutoFilter("A1:H" . ($execCounter - 1));

		$execData -> setActiveSheetIndex(0);

		$filename = "Execution Results - " . $project_name . " - Exec-" . $execid;
		$main = "C:/Downloads/";

		if(!file_exists($main)) {
			mkdir($main);
		}
		
		date_default_timezone_set("Asia/Hong_Kong");
		$date = date("m-d-Y_H-i-sa");

		$directory = "C:/Downloads/Execution Results/";
		if(!file_exists($directory)) {
			mkdir($directory);
		}

		$directory = "C:/Downloads/Execution Results/" . $project_name . "/";
		if(!file_exists($directory)) {
			mkdir($directory);
		}

		$execWriter->save(str_replace(__FILE__, $directory . $filename . " (" . $date . ").xlsx",__FILE__));

		echo "Execution Results for " . $project_name . " - Exec-" . $execid . " successfully exported to " . $directory . $filename . " (" . $date . ").xlsx";
	}

	public function ExecutionResults($project = '', $execid = '') {

		$column = "project_name";
		$project = urldecode($project);
		$proj = DBProject::where($column, '=', $project)
						->first();

		$connectionName = AutomationConnection::where('connection_id', '=', $proj['connection_id'])
											-> pluck('connection_name');
		$execResults = DBAutomation::getExecutionResults($execid, $connectionName);

		if(!$proj == null) {
			$this->view(
				'Project/main/execution_results',
				[
					'bhref' => "/WEBApp/public/",
					'project' => $project,
					'projects' => $this->projects,
					'execResults' => $execResults,
					'execid' => $execid
				]
			);
		} else {
			header('Location: /WEBApp/public/home/error404');
		}

	}

	public function ApplyToSmokeTest($project = '', $execid = '') {
		$column = "project_name";
		$project = urldecode($project);
		$proj = DBProject::where($column, '=' , $project)
						->first();
		$releases = Release::getReleases_($proj['project_id']);
		$browsers = Browser::where('project_id', '=', $proj['project_id'])
							->get();

		$connectionName = AutomationConnection::where('connection_id', '=', $proj['connection_id'])
											-> pluck('connection_name');

		$execTID = DBAutomation::getExecutionTID($execid, $connectionName);
		$getASL = TCDetails::getASL($proj['project_id']);

		$intersect = array_intersect($execTID,$getASL);
		$test_cases = DBAutomation::getIntersectTC($execid, $intersect);
		$diff = array_diff($execTID,$getASL);
		if(!$proj == null) {
			$this->view(
				'Project/main/apply_to_smoketest',
				[
					'bhref' => "/WEBApp/public/",
					'project' => $project,
					'projects' => $this->projects,
					'test_cases' => $test_cases,
					'execid' => $execid,
					'releases' => $releases,
					'browsers' => $browsers
				]
			);
		} else {
			header('Location: /WEBApp/public/home/error404');
		}
	}

	public function addToSmokeTest() {

		$tc_results = DBAutomation::getTCResult($_POST['exec_id'], $_POST['tc']);
		$convertedTC = TCDetails::getTCDbyASL($_POST['tc']);
		/*
		Initialize resultset as an array to create key-value mapping
		between tc_results and convertedTC
		*/
		$resultset = array();
		foreach($convertedTC as $key => $value) {//  merges the result of test case from automation to it's corresponding test case in WEBApp.
			$resultset[$key] = array_merge($value, $tc_results[$key]);
		}

		$matchThese = array();

		/*
		Iterate over resultset to either create or update data on smoke_test table
		based on conditions given below
		*/
		foreach($resultset as $rs) {
			$matchThese = [
				'test_case_detail_id' => $rs['t_id'],
				'project_release_id' => $_POST['release_id'],
				'browser_id' => $_POST['browser_id']
			];

			/*
			Checks if there's already a smoketest result with $matchThese conditions
			*/
			$ifExists = DBSmokeTest::where($matchThese)
								->first();

			/*
			If $ifExists is null, insert the result to smoke_test table,
			else, update the result on the same table
			*/
			if($ifExists == null) {
				DBSmokeTest::create(
					array(
						'test_case_detail_id' => $rs['t_id'],
						'is_included' => 1,
						'project_release_id' => $_POST['release_id'],
						'browser_id' => $_POST['browser_id'],
						'screenshot' => $rs['screenshot'],
						'smoke_test_status' => $rs['result']
					)
				);
			} else {
				DBSmokeTest::where($matchThese)
					-> update(
						array(
							'test_case_detail_id' => $rs['t_id'],
							'is_included' => 1,
							'project_release_id' => $_POST['release_id'],
							'browser_id' => $_POST['browser_id'],
							'screenshot' => $rs['screenshot'],
							'smoke_test_status' => $rs['result']
						)
					);
			}
		}

		/*
		Gets release details for redirection purposes. (Returns this details to easily redirect in SmokeTest/Component)
		*/
		$getReleaseDetails = Capsule::table('project_release as PR')
						-> leftjoin('project_release_association as PRA', 'PRA.release_id', '=', 'PR.project_release_id')
						-> leftjoin('project as P', 'PRA.project_id', '=', 'P.project_id')
						-> where('PR.project_release_id', '=', $_POST['release_id'])
						-> first();

		$browser_name = Browser::where('browser_id' ,'=' ,$_POST['browser_id'])
						-> pluck('browser_name') ;// gets browser name

		/*
		Redirection details
		*/
		$redirection = array(
					'browser_name' => $browser_name,
					'release_name' => $getReleaseDetails['release_name'],
					'project_name' => $getReleaseDetails['project_name']
		);

		/*
		Echo redirection details to return in calling ajax' "success" function.
		*/
		echo json_encode($redirection);
	}
}

?>
