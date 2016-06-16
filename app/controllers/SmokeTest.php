<?php
use Illuminate\Database\Capsule\Manager as Capsule;
class SmokeTest extends Controller
{
	protected $projects = '';

	public function __construct() {
		session_start();
		if(!isset($_SESSION['user_id'], $_SESSION['user_type'], $_SESSION['username'])) {
			header('Location: /WEBApp/public/');
		}
		$this->projects = $this->getProjectSidebar();
	}

	public function index() {
		$this->view('project/index', ['bhref' => "/WEBApp/public/", 'projects' => $this->projects]);
	}

	public function add_project() {
		$this->view('project/project/add_project', ['bhref' => "/WEBApp/public/", 'projects' => $this->projects]);
	}

	public function getProjectSidebar() {
		//$arr = DBProject::all() -> lists('project_name');
		$arr = DBProject::where('activated', '=', 1)->lists('project_name');
		return $arr;
	}

	public function createRelease() {
		$releaseExisting = Capsule::table('project_release as pr')
							-> select('pr.release_name')
							-> join('project_release_association as pra', 'pra.release_id', '=', 'pr.project_release_id')
							-> join('project as p', 'p.project_id', '=', 'pra.project_id')
							-> where('pra.association_type', '=', 'smoketest')
							-> where('pr.release_name', '=', $_POST['release_name'])
							-> pluck('pr.release_name');

		if($releaseExisting == '') { // release as smoketest to project is not existing, therefore, it will add to project_release_association_table and project_release_table
			$arr = array(
				'release_name' => $_POST['release_name'],
				'source_project_id' => 0,
				'release_type' => $_POST['release_type']
			);
			$releaseInstance = Release::create($arr);

			$matchAssoc = ['project_id' => $_POST['project_id'], 'release_id' => $releaseInstance['project_release_id'], 'association_type' => 'smoketest'];
			$ifAssocExists = ProjectReleaseAssociation::where($matchAssoc)->first();
			
			if($ifAssocExists == null) {
				ProjectReleaseAssociation::create($matchAssoc);
			}
		}

		$proj = DBProject::where('project_id', '=' , $_POST['project_id'])
				-> first();

		header("Location: ../SmokeTest/Releases/" . $proj['project_name']);
	}

	public function Browser($project = '' , $release='') {
		$proj = DBProject::where('project_name', '=' , $project)
				-> first();
		$matchThese = ['project_id' => $proj['project_id'],
					'setting_key' => 'browser',
					'affected_release' => $release];
		$matchThese2 = ['project_id' => $proj['project_id'],
					'browser_name' => 'No Browser'];
		$ifExistsSettings = PSetting::where($matchThese)
						-> first();
		$ifExistsBrowser = Browser::where($matchThese2)
						-> first();

		if($ifExistsBrowser == null) {
			Browser::create($matchThese2);
		}

		$no_browser = Browser::where($matchThese2)->first();

		if($ifExistsSettings == null) {
			$array = array($no_browser['browser_id']);
			$serialize_default_value = serialize($array);
			$setDefaultSetting = array('project_id' => $proj['project_id'],
							'affected_release' => $release,
							'setting_key' => 'browser',
							'value' => $serialize_default_value);

			PSetting::create($setDefaultSetting);
		}

		$release_setting_key = PSetting::where($matchThese)->first();
		$displayed_browser_array = array();
		$displayed_browser = unserialize($release_setting_key['value']);
		if(is_array($displayed_browser)) {
			$result_set = array();
			foreach($displayed_browser as $br) {
				$browser_results = Capsule::table('smoke_test as st')
						->select('browser_name', 'release_name',
								Capsule::raw("IFNULL(SUM(st.smoke_test_status = 'PASSED'), 0) as totalPass"),
								Capsule::raw("IFNULL(SUM(st.smoke_test_status = 'FAILED'),0) as totalFail"),
								Capsule::raw("IFNULL(COUNT(st.test_case_detail_id), 0) as totalScenario"),
								Capsule::raw("IFNULL(SUM(st.smoke_test_status = 'Not Started'),0) as totalNotStarted"),
								Capsule::raw("IFNULL(SUM(st.smoke_test_status = 'PENDING'),0) as totalPending"))
						-> leftjoin('browser as b', 'st.browser_id', '=', 'b.browser_id')
						-> leftjoin('project_release as pr', 'st.project_release_id', '=', 'pr.project_release_id')
						-> where('b.browser_id', '=', $br)
						-> where('release_name', '=', $release)
						-> where('st.is_included', '=', 1)
						-> get();
				$browser_results = json_decode(json_encode($browser_results), true);
				array_push($result_set, $browser_results);
			}
		}
		$browsers = Browser::where('project_id', '=', $proj['project_id'])
					-> get();
		$this->view(
			'project/smoketest/browser',
			[
				'bhref' => "/WEBApp/public/",
				'project_id' => $proj['project_id'],
				'release' => $release,
				'no_browser_id' => $no_browser['browser_id'],
				'project' => $project,
				'projects' => $this->projects,
				'browsers' => $browsers,
				'release_setting_key' => $release_setting_key['project_setting_id'],
				'getSettings' => $release_setting_key['value'],
				'result_set' => $result_set,
				'proj' => $proj
			]
		);
	}

	public function Releases($project = '') {
		$column = "project_name";
		$project = urldecode($project);
		$proj = DBProject::where($column, '=' , $project)
					-> first();

		if(!$proj == null) {
			$releases = Capsule::table('project_release as pr')
				-> select('b.browser_name', 'pr.release_name', 'pr.created_at as created_at', 'pr.release_type as release_type',
						Capsule::raw("IFNULL(SUM(st.smoke_test_status = 'PASSED'), 0) as totalPass"),
						Capsule::raw("IFNULL(SUM(st.smoke_test_status = 'FAILED'),0) as totalFail"),
						Capsule::raw("IFNULL(COUNT(st.test_case_detail_id), 0) as totalScenario"),
						Capsule::raw("IFNULL(SUM(st.smoke_test_status = 'Not Started'),0) as totalNotStarted"),
						Capsule::raw("IFNULL(SUM(st.smoke_test_status = 'PENDING'),0) as totalPending"))
				-> leftjoin('smoke_test as st', function ($join) {
					$join -> on('st.project_release_id', '=', 'pr.project_release_id')
	                			-> where('st.is_included', '=', 1);
					})
				-> leftjoin('browser as b', 'st.browser_id', '=', 'b.browser_id')
				-> leftjoin('project_release_association as pra', 'pra.release_id', '=', 'pr.project_release_id')
				-> leftjoin('project as p', 'pra.project_id', '=', 'p.project_id')
				-> where('p.project_id', '=', $proj['project_id'])
				-> where('pra.association_type', '=', 'smoketest')
				-> groupBy('pr.release_name')
				-> get();
				$releases = json_decode(json_encode($releases), true);
			$this -> view(
				'project/smoketest/index',
				[
					'bhref' => "/WEBApp/public/",
					'projects' => $this->projects,
					'releases' => $releases,
					'project_id' => $proj['project_id'],
					'project'=> $proj['project_name']
				]
			);
		} else {
			header('Location:  /WEBApp/public/home/error404');
		}
	}

	public function exportReleases() {
		$column = "project_name";
		$project = $_POST['project_name'];
		$proj = DBProject::where($column, '=' , $project)
					-> first();

		$releases = Capsule::table('project_release as pr')
				-> select('b.browser_name', 'pr.release_name', 'pr.created_at as created_at', 'pr.release_type as release_type',
						Capsule::raw("IFNULL(SUM(st.smoke_test_status = 'PASSED'), 0) as totalPass"),
						Capsule::raw("IFNULL(SUM(st.smoke_test_status = 'FAILED'),0) as totalFail"),
						Capsule::raw("IFNULL(COUNT(st.test_case_detail_id), 0) as totalScenario"),
						Capsule::raw("IFNULL(SUM(st.smoke_test_status = 'Not Started'),0) as totalNotStarted"),
						Capsule::raw("IFNULL(SUM(st.smoke_test_status = 'PENDING'),0) as totalPending"))
				-> leftjoin('smoke_test as st', function ($join) {
						$join -> on('st.project_release_id', '=', 'pr.project_release_id')
	                			-> where('st.is_included', '=', 1);
						})
				-> leftjoin('browser as b', 'st.browser_id', '=', 'b.browser_id')
				-> leftjoin('project_release_association as pra', 'pra.release_id', '=', 'pr.project_release_id')
				-> leftjoin('project as p', 'pra.project_id', '=', 'p.project_id')
				-> where('p.project_id', '=', $proj['project_id'])
				-> where('pra.association_type', '=', 'smoketest')
				-> groupBy('pr.release_name')
				-> get();

		//echo $project . " has this number of releases: " . count($releases);

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
		$autoSheet -> setTitle("Releases");
		$autoSheet -> getStyle("A1:H1")
					-> getFont()
					-> setBold(true)
					-> setSize(11);
		$autoSheet -> getStyle("A1:H1")
					-> getAlignment()
					-> setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$autoSheet -> getStyle("A1:H1")
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
		foreach($releases as $releases) {
			if(!$releases['totalScenario'] == 0) {
				$test_completion = round(((($releases['totalPass'] + $releases['totalFail']) / $releases['totalScenario']) * 100));
			} else {
				$test_completion = 0 ;
			}

			$sqldatetotime = strtotime($releases['created_at']);
			$dateFormat = date("M d, Y", $sqldatetotime);

			$autoSheet -> getCell("A" . $autoCounter)
						-> setValue($releases['release_name']);
			$autoSheet -> getCell("B" . $autoCounter)
						-> setValue($releases['totalPass']);
			$autoSheet -> getCell("C" . $autoCounter)
						-> setValue($releases['totalFail']);
			$autoSheet -> getCell("D" . $autoCounter)
						-> setValue($releases['totalPending']);
			$autoSheet -> getCell("E" . $autoCounter)
						-> setValue($releases['totalNotStarted']);
			$autoSheet -> getCell("F" . $autoCounter)
						-> setValue($test_completion);
			$autoSheet -> getCell("G" . $autoCounter)
						-> setValue($dateFormat);
			$autoSheet -> getCell("H" . $autoCounter)
						-> setValue($releases['release_type']);

			$autoSheet -> getStyle("A" . $autoCounter . ":H" . $autoCounter)
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

		$autoSheet -> getStyle("A1:H".($autoCounter - 1))
					-> getBorders()
					-> getAllBorders()
					-> setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$autoSheet -> setAutoFilter("A1:H" . ($autoCounter - 1));

		$autoData -> setActiveSheetIndex(0);

		$filename = "Releases (Smoke Test) - " . $project;
		$main = "C:/Downloads/";

		if(!file_exists($main)) {
			mkdir($main);
		}
		
		date_default_timezone_set("Asia/Hong_Kong");
		$date = date("m-d-Y_H-i-sa");

		$directory = "C:/Downloads/SmokeTest/";
		if(!file_exists($directory)) {
			mkdir($directory);
		}

		$directory = "C:/Downloads/SmokeTest/Releases/";
		if(!file_exists($directory)) {
			mkdir($directory);
		}

		$autoWriter->save(str_replace(__FILE__, $directory . $filename . " (" . $date . ").xlsx",__FILE__));

		echo "Smoke Test releases for " . $project . " successfully exported to " . $directory . $filename . " (" . $date . ").xlsx";
	}

	public function Component($project = '' , $release='', $browser = '') {
		$column = "project_name";
		$proj = DBProject::where($column, '=' , $project)
					-> first();
		$components = Component::where("project_id", "=", $proj["project_id"])->get();
		$b_id =  Browser::where('project_id' ,'=', $proj['project_id'])
				-> where('browser_name' ,'=', urldecode($browser))
				-> pluck('browser_id') ;

		$pr_id = Capsule::table('project_release as pr')
				-> select('pr.project_release_id')
				-> join('project_release_association as pra', 'pr.project_release_id', '=', 'pra.release_id')
				-> join('project as p', 'p.project_id', '=', 'pra.project_id')
				-> where('pra.association_type', '=', 'smoketest')
				-> where('p.project_id', '=', $proj['project_id'])
				-> where('pr.release_name', '=', $release)
				-> pluck('pr.project_release_id');

		/*$pr_id = Release::where('project_id', '=', $proj['project_id'])
				-> where('release_name', '=', $release)
				-> pluck('project_release_id') ;*/

		// check smoke_test if it has test cases with current browser, release, and project
		$matchThese = ['p.project_name' => $project,
				'pr.project_release_id' => $pr_id,
				'b.browser_id' => $b_id];
		$checkSmoke = DBSmokeTest::checkSmoke($matchThese);

		// if null, add test_cases to smoke_test but not yet included (is_included = 0 in smoke_test table)
		if($checkSmoke == null) {
			$tcdetails_tcd_id = TCDetails::getProjectTestCaseIDs($proj['project_id']) ;
			foreach($tcdetails_tcd_id as $tcd_id) {
				$addToSmokeTest = array(
					'browser_id' => $b_id,
					'test_case_detail_id' => $tcd_id,
					'project_release_id' => $pr_id
				);
				DBSmokeTest::create($addToSmokeTest);
			}
		} else {// else add test_cases that are not yet added from smoke_test
			$tcdetails_tcd_id = TCDetails::getProjectTestCaseIDs($proj['project_id']) ;
			$smoke_test_tcd_id = DBSmokeTest::where('browser_id', '=', $b_id)
								-> where('project_release_id', '=', $pr_id)
								-> lists('test_case_detail_id')
								-> toArray();
			$array_diff = array_diff($tcdetails_tcd_id, $smoke_test_tcd_id);
			foreach($array_diff as $ad_id) {
				$addToSmokeTest = array(
					'browser_id' => $b_id,
					'test_case_detail_id' => $ad_id,
					'project_release_id' => $pr_id
				);
				DBSmokeTest::create($addToSmokeTest);
			}
		}

		// get summary per component where matchThese is equal to 'where' statement
		$components_resultset = DBSmokeTest::getSummaryPerComponent($matchThese);

		$test_cases = array();
		// get main test cases per component
		foreach($components as $component) {
			$cname = $component['component_name'];
			$component_tc = TCDetails::getMainTestCases($project, $b_id, $pr_id, $cname);
			$test_cases[$cname] = $component_tc;
		}

		$this->view('project/smoketest/component',
			[
				'bhref' => "/WEBApp/public/",
				'projects'=> $this->projects,
				'project' => $proj['project_name'],
				'components' => $components,
				'components_resultset' => $components_resultset,
				'manage_smoke_test_cases' => $test_cases,
				'b_id' => $b_id,
				'pr_id' => $pr_id,
				'release_name' => $release,
				'browser_name' => urldecode($browser),
				'project_id'=> $proj['project_id']
			]
		);
	}

	public function remove_smoketest() {
		$tcdetails_tcd_id = TCDetails::getProjectTestCaseIDs($_POST['project_id']);
		if(isset($_POST['check'])) {
			$getChecked = array();
			foreach($_POST['check'] as $check) {
				array_push($getChecked, $check['cbarray']);
			}
			$getUnchecked = array_diff($tcdetails_tcd_id, $getChecked);

			foreach($getUnchecked as $update_gu) {
			Capsule::table('smoke_test')
				-> where('test_case_detail_id', '=', $update_gu)
				-> where('project_release_id', '=', $_POST['pr_id'])
				-> where('browser_id', '=', $_POST['b_id'])
				-> update(array('is_included'=>0));
			}
		} else {
			$getChecked = array();
			$getUnchecked = array_diff($tcdetails_tcd_id, $getChecked);

			foreach($getUnchecked as $update_gu) {
				Capsule::table('smoke_test')
					->where('test_case_detail_id' , '=', $update_gu)
					->where('project_release_id', '=', $_POST['pr_id'])
					->where('browser_id', '=', $_POST['b_id'])
					->update(array('is_included'=>0));
			}
		}
	}

	public function include_smoketest()	{
		$getChecked = array();
		if(isset($_POST['cbarray'])) {
			foreach($_POST['cbarray'] as $mstc_tcd) {
				Capsule::table('smoke_test')
					-> where('test_case_detail_id' , '=', $mstc_tcd)
					-> where('project_release_id', '=', $_POST['pr_id'])
					-> where('browser_id', '=', $_POST['b_id'])
					-> update(array('is_included' => 1));
					array_push($getChecked, $mstc_tcd['cbarray']);
			}
		}
	}

	public function includeall_smoketest() {
		Capsule::table('smoke_test')
			-> where('project_release_id', '=', $_POST['pr_id'])
			-> where('browser_id', '=', $_POST['b_id'])
			-> update(array('is_included' => 1));

		header('Location:' . $_POST['location']);
	}

	public function unincludeall_smoketest() {
		Capsule::table('smoke_test')
			-> where('project_release_id', '=', $_POST['pr_id'])
			-> where('browser_id', '=', $_POST['b_id'])
			-> update(array('is_included' => 0));
		header('Location:' . $_POST['location']);
	}


	public function TestLog($project= '', $release= '', $browser = '' , $component = '') {
		$column = "project_name";
		$proj = DBProject::where($column, '=' , $project)
				->first();
		$b_id =  Browser::where('project_id' ,'=', $proj['project_id'])
				-> where('browser_name' ,'=', urldecode($browser))
				-> pluck('browser_id') ;
		/*$pr_id = Release::where('project_id', '=', $proj['project_id'])
				-> where('release_name', '=', $release)
				-> pluck('project_release_id') ;*/
		$pr_id = Release::getReleaseID_($proj['project_id'], $release);

		$matchThese = [
			'p.project_name' => $project,
			'pr.project_release_id' => $pr_id,
			'b.browser_id' => $b_id,
			'c.component_name' =>$component
		];

		$component_summary = DBSmokeTest::getComponentSummary($matchThese);

		$test_logs = array();

		$getTestCaseID = DBSmokeTest::getTestLogID($matchThese);

		foreach($getTestCaseID as $tcid) {
			$matchThese =
			[
				'p.project_name' => $project,
				'pr.project_release_id' => $pr_id,
				'b.browser_id' => $b_id,
				'c.component_name' => $component,
				'tcd.tc_id' => $tcid
			];
			$test_logs[$tcid] = DBSmokeTest::getTestLogScenario($matchThese);
		}

		$this->view(
			'project/smoketest/test_log',
			[
				'bhref' => "/WEBApp/public/",
				'projects' => $this->projects,
				'component_summary' => $component_summary,
				'test_logs' => $test_logs,
				'project' => $proj['project_name'],
				'browser_name' => urldecode($browser),
				'release_name' => $release,
				'component' => $component,
				'all_fail' => 0
			]
		);
	}

	public function TestLogFailed($project= '', $release= '', $browser = '', $component = '') {
		$column = "project_name";

		$proj = DBProject::where($column, '=' , $project)
						->first();

		$b_id =  Browser::where('project_id' ,'=', $proj['project_id'])
						->where('browser_name' ,'=', urldecode($browser))
						->pluck('browser_id');
		$pr_id = Release::getReleaseID_($proj['project_id'], $release);

		$matchThese = [
			'p.project_name' => $project,
			'pr.project_release_id' => $pr_id,
			'b.browser_id' => $b_id,
			'st.smoke_test_status'=> "FAILED"
		];

		$component_summary = DBSmokeTest::getComponentSummary($matchThese);

		$test_logs = array();

		$getTestCaseID = DBSmokeTest::getTestLogID($matchThese);

		foreach($getTestCaseID as $tcid) {
			$matchThese = [
				'p.project_name' => $project,
				'pr.project_release_id' => $pr_id,
				'b.browser_id' => $b_id,
				'st.smoke_test_status' => 'FAILED',
				'tcd.tc_id' => $tcid
			];
			$test_logs[$tcid] = DBSmokeTest::getTestLogScenario($matchThese);
		}

		$this->view(
			'project/smoketest/test_log',
			[
				'bhref' => "/WEBApp/public/",
				'component_summary' => $component_summary,
				'test_logs' => $test_logs,
				'projects' => $this->projects,
				'project' => $proj['project_name'],
				'browser_name' => urldecode($browser),
				'release_name' => $release,
				'component' => $component,
				'all_fail' => 1
			]
		);
	}



	public function updateTestLog() {

		$matchThese = [
			'project_release_id' => $_POST['pr_id'],
			'test_case_detail_id' => $_POST['tcd_id'],
			'browser_id' => $_POST['b_id']
		];

		if(isset($_POST['status_radio'])) {
			$affectedRows = DBSmokeTest::where($matchThese)->update(array('smoke_test_status' => $_POST['status_radio']));
		} else {
			$affectedRows = DBSmokeTest::where($matchThese)->update(array('smoke_test_status' => "Not Started"));
		}
	}

	public function updateSummary() {

		$matchThese = "";
		if($_GET['all_fail_'] == 1) {
			$matchThese = [
				'pr.project_release_id' => $_GET['pr_id'],
				'b.browser_id' => $_GET['b_id'],
				'st.smoke_test_status'=> "FAILED"
			];
		} elseif($_GET['all_fail_'] == 0) {
			$matchThese = [
				'pr.project_release_id' => $_GET['pr_id'],
				'b.browser_id' => $_GET['b_id'],
				'c.component_name'=>$_GET['component']
			];
		}

		$component_summary = DBSmokeTest::getComponentSummary($matchThese);

		echo "<tr>
			  <td>".$component_summary['totalTestCase']."</td>
			  <td>".$component_summary['totalScenario']."</td>
			  <td>".$component_summary['totalPass']."</td>
			  <td>".$component_summary['totalFail']."</td>
			  <td>".$component_summary['totalPending']."</td>
			  <td>".$component_summary['totalNotStarted']."</td>
			  <td>".round(((($component_summary['totalPass']+$component_summary['totalFail'])/$component_summary['totalScenario'])*100))."%</td>
			  ";

	}

	public function updatePanel() {

		$matchThese = ['pr.project_release_id' => $_GET['pr_id'], 'b.browser_id' => $_GET['b_id'],'st.test_case_detail_id'=>$_GET['tcd_id']] ;
		$log = DBSmokeTest::getTestLogScenario($matchThese);
		$log[0]['panel_id'] = $_GET['panel_id'];
		$log[0]['h4color'] = $_GET['h4color'];
		echo json_encode($log);

	}

	public function exportSmokeTest() {

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

		require_once('Classes/PHPExcel.php');

		$componentData = new PHPExcel();
		$componentData -> getDefaultStyle() -> getFont() -> setName('Calibri');
		$componentData -> getDefaultStyle() -> getFont() -> setSize(11);
		
		$componentWriter = PHPExcel_IOFactory::createWriter($componentData, "Excel2007");

		$componentSheet = $componentData -> getActiveSheet();
		$componentSheet -> setTitle("Summary");
		$componentSheet -> getStyle("A1:E1") -> getFont() -> setBold(true) -> setSize(11);
		$componentSheet -> getStyle("A1:E1") -> getAlignment() -> setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$componentSheet -> getCell("A1") -> setValue("Component");
		$componentSheet -> getCell("B1") -> setValue("Test Cases");
		$componentSheet -> getCell("C1") -> setValue("# of Test Scenario");
		$componentSheet -> getCell("D1") -> setValue("Manual");
		$componentSheet -> getCell("E1") -> setValue("Automation");
		$componentSheet -> getStyle("A1:E1")
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

		$counter = 2;
		foreach($component_summary as $cs) {
			$componentSheet -> getCell("A" . $counter) -> setValue($cs["component_name"]);
			$componentSheet -> getCell("A" . $counter) -> getHyperlink() -> setUrl("sheet://'" . $cs["component_name"] . "'!A1");
			$componentSheet -> getStyle("A" . $counter)
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
			$componentSheet -> getCell("B" . $counter) -> setValue($cs["tc_id_count"]);
			$componentSheet -> getCell("C" . $counter) -> setValue($cs["ts_id_count"]);
			$componentSheet -> getCell("D" . $counter) -> setValue($cs["ts_id_count"] - $cs["automation_count"]);
			$componentSheet -> getCell("E" . $counter) -> setValue($cs["automation_count"]);
			$componentSheet -> getStyle("B" . $counter . ":E" . $counter)
							-> applyFromArray(
								array(
									'font' => array(
										'size' => 13,
										)
									)
								);
			$componentSheet -> getStyle("B" . $counter . ":E" . $counter)
							-> getAlignment()
							-> setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$componentSheet -> getStyle("B" . $counter . ":E" . $counter)
							-> getAlignment()
							-> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

			$componentSheet -> getRowDimension($counter) -> setRowHeight(25);
			$componentSheet -> getStyle("A" . $counter) -> getAlignment() -> setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$componentSheet -> getStyle("A" . $counter) -> getAlignment() -> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

			$counter++;
		}

		$componentSheet -> getStyle("A1:E".($counter - 1)) -> getBorders() -> getAllBorders() -> setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$componentSheet -> setAutoFilter("A1:E" . ($counter - 1));

		$componentSheet -> getColumnDimension("A") -> setWidth(28);
		$componentSheet -> getColumnDimension("B") -> setWidth(17);
		$componentSheet -> getColumnDimension("C") -> setWidth(26);
		$componentSheet -> getColumnDimension("D") -> setWidth(14);
		$componentSheet -> getColumnDimension("E") -> setWidth(19);

		$index = 1;
		foreach($component_summary as $cs) {
			$componentSheet = $componentData -> createSheet($index);

			$componentSheet -> setTitle($cs["component_name"]);

			$tcCounter = 2;
			foreach($test_cases as $tc) {
				if($tc['component_name'] == $cs['component_name']) {
					$date_reviewed = (!$tc['date_reviewed'] == null)  ? $tc['date_reviewed']  : "Not Yet Reviewed";

					$componentSheet -> getCell("A" . $tcCounter) -> setValue($tc["tc_id"]);
					$componentSheet -> getCell("B" . $tcCounter) -> setValue($tc["tc_name"]);
					$componentSheet -> getCell("C" . $tcCounter) -> setValue($tc["ts_id"]);
					$componentSheet -> getCell("D" . $tcCounter) -> setValue($tc["ts_name"]);
					$componentSheet -> getCell("E" . $tcCounter) -> setValue($tc["scope_of_test"]);
					$componentSheet -> getCell("F" . $tcCounter) -> setValue($tc["type_of_test"]);
					$componentSheet -> getCell("G" . $tcCounter) -> setValue($tc["jira"]);
					if($tc["manual_automation"] == "Manual") {
						$componentSheet -> getCell("H" . $tcCounter) -> setValue("YES");
						$componentSheet -> getCell("I" . $tcCounter) -> setValue("");
					} elseif($tc["manual_automation"] == "Automation") {
						$componentSheet -> getCell("H" . $tcCounter) -> setValue("NO");
						$componentSheet -> getCell("I" . $tcCounter) -> setValue("YES");
					}
					$componentSheet -> getCell("J" . $tcCounter) -> setValue($tc["tc_status"]);
					$componentSheet -> getCell("K" . $tcCounter) -> setValue($tc["date_last_change"]);
					$componentSheet -> getCell("L" . $tcCounter) -> setValue($tc["tester"]);
					$componentSheet -> getCell("M" . $tcCounter) -> setValue($tc["tc_comments"]);
					$componentSheet -> getCell("N" . $tcCounter) -> setValue($tc["tc_reviewed"]);
					$componentSheet -> getCell("O" . $tcCounter) -> setValue($tc["priority"]);
					$componentSheet -> getCell("P" . $tcCounter) -> setValue($date_reviewed);
					$componentSheet -> getCell("Q" . $tcCounter) -> setValue($tc["checker"]);
					$componentSheet -> getCell("R" . $tcCounter) -> setValue("");
					$componentSheet -> getCell("S" . $tcCounter) -> setValue($tc["test_steps"]);
					$componentSheet -> getStyle("S" . $tcCounter) -> getAlignment() -> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
					$componentSheet -> getCell("T" . $tcCounter) -> setValue($tc["expected_results"]);
					$componentSheet -> getStyle("T" . $tcCounter) -> getAlignment() -> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
					$componentSheet -> getCell("U" . $tcCounter) -> setValue($tc["developer"]);
					$componentSheet -> getCell("V" . $tcCounter) -> setValue($tc["date_finished"]);
					$componentSheet -> getCell("W" . $tcCounter) -> setValue($tc["automation_status"]);
					$componentSheet -> getCell("X" . $tcCounter) -> setValue("");
					$componentSheet -> getCell("Y" . $tcCounter) -> setValue($tc["at_script_location"]);
					
					$tcCounter++;
				}
			}

			$componentSheet -> setAutoFilter("A1:Y" . ($tcCounter - 1));

			$componentSheet -> getStyle("A1:Y".($tcCounter - 1)) -> getBorders() -> getAllBorders() -> setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);

			$componentSheet -> getStyle("A1:Y1") -> getFont() -> setBold(true) -> setSize(14);
			$componentSheet -> getStyle("A1:Y1") -> getAlignment() -> setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$componentSheet -> getCell("A1") -> setValue("Test Case ID");
			$componentSheet -> getColumnDimension("A") -> setAutoSize(true);
			$componentSheet -> getCell("B1") -> setValue("Test Case Name");
			$componentSheet -> getColumnDimension("B") -> setAutoSize(true);
			$componentSheet -> getCell("C1") -> setValue("Test Scenario ID");
			$componentSheet -> getColumnDimension("C") -> setAutoSize(true);
			$componentSheet -> getCell("D1") -> setValue("Test Scenario Name");
			$componentSheet -> getColumnDimension("D") -> setAutoSize(true);
			$componentSheet -> getCell("E1") -> setValue("Scope");
			$componentSheet -> getColumnDimension("E") -> setAutoSize(true);
			$componentSheet -> getCell("F1") -> setValue("Type");
			$componentSheet -> getColumnDimension("F") -> setAutoSize(true);
			$componentSheet -> getCell("G1") -> setValue("Jira");
			$componentSheet -> getColumnDimension("G") -> setAutoSize(true);
			$componentSheet -> getCell("H1") -> setValue("Manual");
			$componentSheet -> getColumnDimension("H") -> setAutoSize(true);
			$componentSheet -> getCell("I1") -> setValue("Automation");
			$componentSheet -> getColumnDimension("I") -> setAutoSize(true);
			$componentSheet -> getCell("J1") -> setValue("Test Status");
			$componentSheet -> getColumnDimension("J") -> setAutoSize(true);
			$componentSheet -> getCell("K1") -> setValue("Date Last Change");
			$componentSheet -> getColumnDimension("K") -> setAutoSize(true);
			$componentSheet -> getCell("L1") -> setValue("Tester");
			$componentSheet -> getColumnDimension("L") -> setAutoSize(true);
			$componentSheet -> getCell("M1") -> setValue("Comment");
			$componentSheet -> getColumnDimension("M") -> setAutoSize(true);
			$componentSheet -> getCell("N1") -> setValue("Reviewed");
			$componentSheet -> getColumnDimension("N") -> setAutoSize(true);
			$componentSheet -> getCell("O1") -> setValue("Priority");
			$componentSheet -> getColumnDimension("O") -> setAutoSize(true);
			$componentSheet -> getCell("P1") -> setValue("Date Reviewed");
			$componentSheet -> getColumnDimension("P") -> setAutoSize(true);
			$componentSheet -> getCell("Q1") -> setValue("Reviewer");
			$componentSheet -> getColumnDimension("Q") -> setAutoSize(true);
			$componentSheet -> getCell("R1") -> setValue("Comment");
			$componentSheet -> getColumnDimension("R") -> setAutoSize(true);
			$componentSheet -> getCell("S1") -> setValue("Test Steps");
			$componentSheet -> getStyle("S1:S" . $componentSheet -> getHighestRow()) -> getAlignment() -> setWrapText(true);
			$componentSheet -> getColumnDimension("S") -> setWidth(80);
			$componentSheet -> getCell("T1") -> setValue("Expected Results");
			$componentSheet -> getStyle("T1:T" . $componentSheet -> getHighestRow()) -> getAlignment() -> setWrapText(true);
			$componentSheet -> getColumnDimension("T") -> setWidth(80);
			$componentSheet -> getCell("U1") -> setValue("Developed");
			$componentSheet -> getColumnDimension("U") -> setAutoSize(true);
			$componentSheet -> getCell("V1") -> setValue("Date Finished");
			$componentSheet -> getColumnDimension("V") -> setAutoSize(true);
			$componentSheet -> getCell("W1") -> setValue("Status");
			$componentSheet -> getColumnDimension("W") -> setAutoSize(true);
			$componentSheet -> getCell("X1") -> setValue("Comment");
			$componentSheet -> getColumnDimension("X") -> setAutoSize(true);
			$componentSheet -> getCell("Y1") -> setValue("AT Script Location");
			$componentSheet -> getColumnDimension("Y") -> setAutoSize(true);

			$index++;
		}

		$componentData -> setActiveSheetIndex(0);

		$filename = "SmokeTest - " . $project;
		$main = "C:/Downloads/";

		if(!file_exists($main)) {
			mkdir($main);
		}
		$directory = "C:/Downloads/SmokeTest/";
		date_default_timezone_set("Asia/Hong_Kong");
		$date = date("m-d-Y_H-i-sa");

		if(!file_exists($directory)) {
			mkdir($directory);
		}

		$componentWriter->save(str_replace(__FILE__, $directory . $filename . " (" . $date . ").xlsx",__FILE__));

		echo "Smoke Test results successfully exported to " . $directory . $filename . " (" . $date . ").xlsx";
	}

	public function exportTestCases() {
		$ticket = $_POST["jira_pkey"];
		$release_name = $_POST["release_name"];

		$matchThese = ['JT.jira_pkey' => $ticket, 'PR.release_name' => $release_name];
		$ticketID = DBJiraTicket::getTicketID($matchThese);
		$release_id = DBJiraTicket::getTicketReleaseID($matchThese);
		$getProjectID = DBJiraTicket::getProject($ticketID, $release_name);
		$currentTC = DBJiraTicket::getCurrentTC($ticketID, $release_name);
		$screenshots = Screenshot::getScreenshots($ticketID, $release_name);
		$ticketResults = TicketResult::getTicketResults($ticketID);
		$getTicketBrowserSettings = PSetting::where('affected_release', $release_id)
									-> where('setting_key', $ticket."_browser")
									-> pluck('value');
		$unserialize = unserialize($getTicketBrowserSettings);
		$getBrowsers = DBJiraTicket::getBrowser($unserialize);
		$getBrowsers = json_encode($getBrowsers);
		$decode_browser = json_decode($getBrowsers, true);

		$noOfBrowsers = count($decode_browser);

		require_once('Classes/PHPExcel.php');

		$jiraData = new PHPExcel();

		$jiraWriter = PHPExcel_IOFactory::createWriter($jiraData, "Excel2007");
		$jiraSheet = $jiraData -> getActiveSheet();
		$jiraSheet -> setTitle("Test Execution");

		$jiraSheet -> setCellValueByColumnAndRow(0, 1, "#");
		$jiraSheet -> mergeCells("A1:A2");
		$jiraSheet -> getColumnDimension("A")
					-> setWidth(5);

		$jiraSheet -> setCellValueByColumnAndRow(1, 1, "Test Case ID");
		$jiraSheet -> mergeCells("B1:B2");
		$jiraSheet -> getColumnDimension("B")
					-> setWidth(32);

		$jiraSheet -> setCellValueByColumnAndRow(2, 1, "Test Case Name");
		$jiraSheet -> mergeCells("C1:C2");
		$jiraSheet -> getColumnDimension("C")
					-> setWidth(20);

		$jiraSheet -> setCellValueByColumnAndRow(3, 1, "Test Scenario Name");
		$jiraSheet -> mergeCells("D1:D2");
		$jiraSheet -> getColumnDimension("D")
					-> setWidth(20);

		$jiraSheet -> setCellValueByColumnAndRow(4, 1, "Scope");
		$jiraSheet -> mergeCells("E1:E2");
		$jiraSheet -> getColumnDimension("E")
					-> setWidth(20);

		$jiraSheet -> setCellValueByColumnAndRow(5, 1, "Type");
		$jiraSheet -> mergeCells("F1:F2");
		$jiraSheet -> getColumnDimension("F")
					-> setWidth(20);

		$jiraSheet -> setCellValueByColumnAndRow(6, 1, "Description");
		$jiraSheet -> mergeCells("G1:G2");
		$jiraSheet -> getColumnDimension("G")
					-> setWidth(25);

		$jiraSheet -> setCellValueByColumnAndRow(7, 1, "Test Steps");
		$jiraSheet -> mergeCells("H1:H2");
		$jiraSheet -> getColumnDimension("H")
					-> setWidth(35);

		$jiraSheet -> setCellValueByColumnAndRow(8, 1, "Expected Results");
		$jiraSheet -> mergeCells("I1:I2");
		$jiraSheet -> getColumnDimension("I")
					-> setWidth(26);

		$columnStart = ord("J");
		$counter = 0;
		$jiraSheet -> getStyle("A1:" . chr($columnStart + $noOfBrowsers + 2) . "2")
					-> getFont()
					-> setBold(true)
					-> setSize(11);

		foreach($decode_browser as $b) {
			$jiraSheet -> getCell(chr($columnStart + ($counter)) . "2")
						-> setValue($b['text']);
			$jiraSheet -> getColumnDimension("" . chr($columnStart + $counter) . "")
						-> setWidth(16);
			$counter++;
		}

		$jiraSheet -> mergeCells("J1:" . chr($columnStart + $noOfBrowsers - 1) . "1");
		$jiraSheet -> setCellValueByColumnAndRow(9, 1, "Browsers");

		$jiraSheet -> setCellValueByColumnAndRow(9 + $noOfBrowsers, 1, "Test Data");
		$jiraSheet -> mergeCells(chr($columnStart + $noOfBrowsers) . "1:" . chr($columnStart + $noOfBrowsers) . "2");
		$jiraSheet -> getColumnDimension(chr($columnStart + $noOfBrowsers))
					-> setWidth(26);
		$jiraSheet -> setCellValueByColumnAndRow(9 + $noOfBrowsers + 1, 1, "Actual Results");
		$jiraSheet -> mergeCells(chr($columnStart + $noOfBrowsers + 1) . "1:" . chr($columnStart + $noOfBrowsers + 1) . "2");
		$jiraSheet -> getColumnDimension(chr($columnStart + $noOfBrowsers + 1))
					-> setWidth(26);
		$jiraSheet -> setCellValueByColumnAndRow(9 + $noOfBrowsers + 2, 1, "Comments");
		$jiraSheet -> mergeCells(chr($columnStart + $noOfBrowsers + 2) . "1:" . chr($columnStart + $noOfBrowsers + 2) . "2");
		$jiraSheet -> getColumnDimension(chr($columnStart + $noOfBrowsers + 2))
					-> setWidth(26);

		$jiraSheet -> setAutoFilter("A2:" . chr($columnStart + $noOfBrowsers + 2) . ($counter - 1));

		$jiraSheet -> getStyle("A1:" . chr($columnStart + $noOfBrowsers + 2) . "2")
					-> getAlignment()
					-> setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$jiraSheet -> getStyle("A1:" . chr($columnStart + $noOfBrowsers + 2) . "2")
					-> getAlignment()
					-> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$jiraSheet -> getStyle("A1:" . chr($columnStart + $noOfBrowsers + 2) . "2")
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

		$rn = 3;
		foreach($currentTC as $tc) {
			$jiraSheet -> getCell("A" . $rn)
						-> setValue($rn - 2);
			$jiraSheet -> getStyle("A" . $rn)
					-> getAlignment()
					-> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$jiraSheet -> getStyle("A" . $rn)
					-> getAlignment()
					-> setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

			$jiraSheet -> getCell("B" . $rn)
						-> setValue($tc["tc_id"] . "_" . $tc["ts_id"]);
			$jiraSheet -> getStyle("B" . $rn)
					-> getAlignment()
					-> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

			$jiraSheet -> getCell("C" . $rn)
						-> setValue($tc["tc_name"]);
			$jiraSheet -> getStyle("C" . $rn)
					-> getAlignment()
					-> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

			$jiraSheet -> getCell("D" . $rn)
						-> setValue($tc["ts_name"]);
			$jiraSheet -> getStyle("D" . $rn)
					-> getAlignment()
					-> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

			$jiraSheet -> getCell("E" . $rn)
						-> setValue($tc["scope_of_test"]);
			$jiraSheet -> getStyle("E" . $rn)
					-> getAlignment()
					-> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

			$jiraSheet -> getCell("F" . $rn)
						-> setValue($tc["type_of_test"]);
			$jiraSheet -> getStyle("F" . $rn)
					-> getAlignment()
					-> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

			$jiraSheet -> getCell("G" . $rn)
						-> setValue($tc["desc_obj"]);
			$jiraSheet -> getStyle("G" . $rn)
					-> getAlignment()
					-> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

			$jiraSheet -> getCell("H" . $rn)
						-> setValue(html_entity_decode($tc["test_steps"], ENT_QUOTES));
			$jiraSheet -> getStyle("H" . $rn)
					-> getAlignment()
					-> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

			$jiraSheet -> getCell("I" . $rn)
						-> setValue(html_entity_decode($tc["expected_results"], ENT_QUOTES));
			$jiraSheet -> getStyle("I" . $rn)
					-> getAlignment()
					-> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

			$_results = "";
			$_browsers = "";
			foreach($ticketResults as $tResults) {
				if($tResults['test_case_detail_id'] == $tc['test_case_detail_id']) {
					$_results = $tResults['result'];
					$_browsers = $tResults['browser_id'];
					break;
				}
			}

			$_consol = "";
			$_rr = explode(",", $_results);
			$_rb = explode(",", $_browsers);
			$count = count($_rb);

			for($i = 0; $i < $count; $i++) {
				$_consol .= ($_rb[$i] . ":" . $_rr[$i]) . ";";
			}
			$_consol = substr($_consol, 0, strlen($_consol) - 1);

			$browserCount = count($decode_browser);

			$ctr = 0;
			foreach($decode_browser as $b) {
				$_decodeConsol = explode(";", $_consol);
				$consolLength = count($_decodeConsol);

				$outputResult = "";
				for($i = 0; $i < $consolLength; $i++) {
					$_explodeValue = explode(":", $_decodeConsol[$i]);
					if($b['id'] == $_explodeValue[0]) {
						$outputResult = $_explodeValue[1];
						break;
					}
				}
				if($outputResult == "" || $outputResult == "NOT STARTED") {
					$outputResult = "NOT STARTED";
					$jiraSheet -> getStyle(chr($columnStart + ($ctr)) . $rn)
								-> applyFromArray(
									array(
										'font' => array(
											'bold' => true
											)
										)
									);
				} elseif($outputResult == "PASS") {
					$jiraSheet -> getStyle(chr($columnStart + ($ctr)) . $rn)
								-> applyFromArray(
									array(
										'fill' => array(
											'type' => PHPExcel_Style_Fill::FILL_SOLID,
											'color' => array(
												'rgb' => 'c8f0d0'
												)
											),
										'font' => array(
											'bold' => true,
											'color' => array(
												'rgb' => '006100'
												),
											)
										)
									);
				} elseif($outputResult == "FAIL") {
					$jiraSheet -> getStyle(chr($columnStart + ($ctr)) . $rn)
								-> applyFromArray(
									array(
										'fill' => array(
											'type' => PHPExcel_Style_Fill::FILL_SOLID,
											'color' => array(
												'rgb' => 'ffc7ce'
												)
											),
										'font' => array(
											'bold' => true,
											'color' => array(
												'rgb' => 'ff0000'
												),
											)
										)
									);
				} elseif($outputResult == "PENDING") {
					$jiraSheet -> getStyle(chr($columnStart + ($ctr)) . $rn)
								-> applyFromArray(
									array(
										'fill' => array(
											'type' => PHPExcel_Style_Fill::FILL_SOLID,
											'color' => array(
												'rgb' => 'ffeb9c'
												)
											),
										'font' => array(
											'bold' => true,
											'color' => array(
												'rgb' => '9c6500'
												),
											)
										)
									);
				}

				$jiraSheet -> getCell(chr($columnStart + ($ctr)) . $rn)
							-> setValue($outputResult);
				$jiraSheet -> getStyle(chr($columnStart + ($ctr)) . $rn)
							-> getAlignment()
							-> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
				$jiraSheet -> getStyle(chr($columnStart + ($ctr)) . $rn)
							-> getAlignment()
							-> setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

				$ctr++;
			}

			$jiraSheet -> getCell(chr($columnStart + $noOfBrowsers) . $rn)
						-> setValue(html_entity_decode($tc["test_data"], ENT_QUOTES));
			$jiraSheet -> getStyle(chr($columnStart + $noOfBrowsers) . $rn)
					-> getAlignment()
					-> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$jiraSheet -> getCell(chr($columnStart + $noOfBrowsers + 1) . $rn)
						-> setValue(html_entity_decode($tc["actual_results"], ENT_QUOTES));
			$jiraSheet -> getStyle(chr($columnStart + $noOfBrowsers + 1) . $rn)
					-> getAlignment()
					-> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$jiraSheet -> getCell(chr($columnStart + $noOfBrowsers + 2) . $rn)
						-> setValue(html_entity_decode($tc["tc_comments"], ENT_QUOTES));
			$jiraSheet -> getStyle(chr($columnStart + $noOfBrowsers + 2) . $rn)
					-> getAlignment()
					-> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

			$jiraSheet -> getStyle("A" . $rn . ":" . chr($columnStart + $noOfBrowsers + 2) . $rn)
						-> applyFromArray(
							array(
								'font' => array(
									'size' => 10,
									)
								)
							);
			$jiraSheet -> getStyle("A" . $rn)
						-> applyFromArray(
							array(
								'font' => array(
									'size' => 10,
									'bold' => true
									)
								)
							);

			$rn++;
		}

		$jiraSheet -> getStyle("A1:" . chr($columnStart + $noOfBrowsers + 2) . ($rn - 1))
					-> getBorders()
					-> getAllBorders()
					-> setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);

		$jiraSheet -> getStyle("C1:C" . $jiraSheet -> getHighestRow()) -> getAlignment() -> setWrapText(true);
		$jiraSheet -> getStyle("D1:D" . $jiraSheet -> getHighestRow()) -> getAlignment() -> setWrapText(true);
		$jiraSheet -> getStyle("E1:E" . $jiraSheet -> getHighestRow()) -> getAlignment() -> setWrapText(true);
		$jiraSheet -> getStyle("F1:F" . $jiraSheet -> getHighestRow()) -> getAlignment() -> setWrapText(true);
		$jiraSheet -> getStyle("G1:G" . $jiraSheet -> getHighestRow()) -> getAlignment() -> setWrapText(true);
		$jiraSheet -> getStyle("H1:H" . $jiraSheet -> getHighestRow()) -> getAlignment() -> setWrapText(true);
		$jiraSheet -> getStyle("I1:I" . $jiraSheet -> getHighestRow()) -> getAlignment() -> setWrapText(true);
		$jiraSheet -> getStyle(chr($columnStart + $noOfBrowsers) . "1:" . chr($columnStart + $noOfBrowsers) . $jiraSheet -> getHighestRow()) -> getAlignment() -> setWrapText(true);
		$jiraSheet -> getStyle(chr($columnStart + $noOfBrowsers + 1) . "1:" . chr($columnStart + $noOfBrowsers + 1) . $jiraSheet -> getHighestRow()) -> getAlignment() -> setWrapText(true);
		$jiraSheet -> getStyle(chr($columnStart + $noOfBrowsers + 2) . "1:" . chr($columnStart + $noOfBrowsers + 2) . $jiraSheet -> getHighestRow()) -> getAlignment() -> setWrapText(true);

		//$jiraWriter -> save($ticket . "- Test Execution.xlsx");

		$filename = "JIRA - " . $ticket . " - Test Execution";
		$main = "C:/Downloads/";

		if(!file_exists($main)) {
			mkdir($main);
		}
		$directory = "C:/Downloads/JIRA/";
		date_default_timezone_set("Asia/Hong_Kong");
		$date = date("m-d-Y_H-i-sa");

		if(!file_exists($directory)) {
			mkdir($directory);
		}

		$jiraWriter->save(str_replace(__FILE__, $directory . $filename . " (" . $date . ").xlsx",__FILE__));

		echo $ticket . " test execution results successfully exported to " . $directory . $filename . " (" . $date . ").xlsx";
	}
}

?>
