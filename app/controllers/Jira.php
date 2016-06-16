<?php

use Illuminate\Database\Capsule\Manager as Capsule;

class Jira extends Controller {

	protected $projects = '';

	public function __construct() {
		session_start();
		if(!isset($_SESSION['user_id'], $_SESSION['user_type'], $_SESSION['username'])) {
			header('Location: /WEBApp/public/');
		}
		$this->projects = $this->getProjectSidebar();
	}

	public function index() {
		$this->view('project/index', ['bhref' =>  "/WEBApp/public/", 'projects' => $this->projects]);
	}

	public function getProjectSidebar() {
		//$arr =  DBProject::all()->lists('project_name');
		$arr = DBProject::where('activated', '=', 1)->lists('project_name');
		return $arr;
	}

	public function createRelease() {
		$arr = array(
			'release_name' => $_POST['release_name'],
			'source_project_id' => -1,
			'release_type' => $_POST['release_type']
		);

		$proj = DBProject::where('project_id', '=' , $_POST['project_id'])
						->first();

		$matchThese = ['release_name' => $_POST['release_name'], 'release_type' => 'Jira'];
		$ifExistsFromLocal = Release::where($matchThese)->first();

		$lastInstance = $ifExistsFromLocal;

		if($ifExistsFromLocal == null) {
			$lastInstance = Release::create($arr);
		}

		$matchAssoc = [
			'project_id' => $proj['project_id'],
			'release_id' => $lastInstance['project_release_id'],
			'association_type' => 'jira'
		];

		$ifAssocExists = ProjectReleaseAssociation::where($matchAssoc)->first();

		if($ifAssocExists == null) {
			ProjectReleaseAssociation::create($matchAssoc);
		}

		header("Location: ../Jira/Releases/" . $proj['project_name']);
	}

	public function addBrowser() {
		$add_browser = array(
			'browser_name' => $_POST['new_browser'],
			'project_id' => $_POST['project_id']
		);

		Browser::create($add_browser);
		header("Location: ../project/browser/".$_POST['project']."/".$_POST['release']);
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

		header("Location: ../project/browser/" . $_POST['project'] . "/" . $_POST['release']);
	}

	public function Releases($project = '') {
		$proj = DBProject::where('project_name', '=' , $project)
						->first();
		$getReleaseFromJira = "";

		if($proj['jira_pname'] == null) {
			$getReleaseFromJira = Release::getReleaseFromJira($project);
		} else {
			if($proj['jira_component'] == null) {
				$getReleaseFromJira = Release::getReleaseFromJira($proj['jira_pname']);
			} else {
				$getReleaseFromJira = Release::getReleasesOfComponent($proj['jira_pname_key'], $proj['jira_component']);
			}
		}

		foreach($getReleaseFromJira as $GRFJ) {
			$matchThese = ['release_name' => $GRFJ['vname'], 'source_id' => $GRFJ['release_id'], 'release_type' => 'Jira'];
			$ifExistsFromLocal = Release::where($matchThese)->first();

			$lastInstance = $ifExistsFromLocal;

			if($ifExistsFromLocal == null) {
				$matchThese['created_at'] = $GRFJ['RELEASEDATE'];
				$matchThese['release_description'] = $GRFJ['DESCRIPTION'];
				$matchThese['source_project_id'] = $GRFJ['p_id'];
				$lastInstance = Release::create($matchThese);
			}

			$matchAssoc = ['project_id' => $proj['project_id'], 'release_id' => $lastInstance['project_release_id'], 'association_type' => 'jira'];
			$ifAssocExists = ProjectReleaseAssociation::where($matchAssoc)->first();

			if($ifAssocExists == null) {
				ProjectReleaseAssociation::create($matchAssoc);
			}
		}

		$localRelease = Release::getProjectReleases($proj['project_id'], $proj['jira_component']);
		$localRelease = json_decode(json_encode($localRelease), true);
		$localReleaseCount = Release::getProjectReleaseCount($proj['project_id'], $proj['jira_component']);
		$localReleaseCount = json_decode(json_encode($localReleaseCount), true);
		$this->view(
			'project/jira/index',
			[
				'bhref' => "/WEBApp/public/",
				'projects' => $this->projects,
				'releases' => $localRelease,
				'localReleaseCount' => $localReleaseCount,
				'project_id' => $proj['project_id'],
				'project' => $proj['project_name'],
				'proj' => $proj
			]
		);
	}

	public function exportJiraReleases() {
		$project = $_POST['project'];

		$proj = DBProject::where('project_name', '=' , $project)
						->first();
		$getReleaseFromJira = "";

		if($proj['jira_pname'] == null) {
			$getReleaseFromJira = Release::getReleaseFromJira($project);
		} else {
			if($proj['jira_component'] == null) {
				$getReleaseFromJira = Release::getReleaseFromJira($proj['jira_pname']);
			} else {
				$getReleaseFromJira = Release::getReleasesOfComponent($proj['jira_pname_key'], $proj['jira_component']);
			}
		}

		foreach($getReleaseFromJira as $GRFJ) {
			$matchThese = ['release_name' => $GRFJ['vname'], 'source_id' => $GRFJ['release_id'], 'release_type' => 'Jira'];
			$ifExistsFromLocal = Release::where($matchThese)->first();

			$lastInstance = $ifExistsFromLocal;

			if($ifExistsFromLocal == null) {
				$matchThese['created_at'] = $GRFJ['RELEASEDATE'];
				$matchThese['release_description'] = $GRFJ['DESCRIPTION'];
				$matchThese['source_project_id'] = $GRFJ['p_id'];
				$lastInstance = Release::create($matchThese);
			}

			$matchAssoc = ['project_id' => $proj['project_id'], 'release_id' => $lastInstance['project_release_id'], 'association_type' => 'jira'];
			$ifAssocExists = ProjectReleaseAssociation::where($matchAssoc)->first();

			if($ifAssocExists == null) {
				ProjectReleaseAssociation::create($matchAssoc);
			}
		}

		$localRelease = Release::getProjectReleases($proj['project_id'], $proj['jira_component']);
		$localRelease = json_decode(json_encode($localRelease), true);
		$localReleaseCount = Release::getProjectReleaseCount($proj['project_id'], $proj['jira_component']);
		$localReleaseCount = json_decode(json_encode($localReleaseCount), true);

		require_once('Classes/PHPExcel.php');

		$rData = new PHPExcel();
		$rData -> getDefaultStyle()
				-> getFont()
				-> setName('Calibri');
		$rData -> getDefaultStyle()
				-> getFont()
				-> setSize(11);

		$rWriter = PHPExcel_IOFactory::createWriter($rData, "Excel2007");

		$rSheet = $rData -> getActiveSheet();
		$rSheet -> setTitle("JIRA Releases Summary");
		$rSheet -> getStyle("A1:G1") -> getFont() -> setBold(true) -> setSize(11);
		$rSheet -> getStyle("A1:G1") -> getAlignment() -> setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$rSheet -> getStyle("A1:G1")
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

		$rCounter = 2;
		foreach($localRelease as $release) {
			$count = $release['total_jira'];
			foreach($localReleaseCount as $releaseCount) {
				if($release['project_release_id'] == $releaseCount['project_release_id']) {
					$count = $releaseCount['total_jira'];
					break;
				}
			}
			$sqldatetotime = strtotime($release['created_at']);
			$dateFormat = date("M d, Y", $sqldatetotime);

			$rSheet -> getCell("A" . $rCounter)
					-> setValue($release['release_name']);
			$rSheet -> getCell("B" . $rCounter)
					-> setValue($release['release_description']);
			$rSheet -> getCell("C" . $rCounter)
					-> setValue("");
			$rSheet -> getCell("D" . $rCounter)
					-> setValue("");
			$rSheet -> getCell("E" . $rCounter)
					-> setValue($count);
			$rSheet -> getCell("F" . $rCounter)
					-> setValue("");
			$rSheet -> getCell("G" . $rCounter)
					-> setValue($dateFormat);

			$rSheet -> getStyle("A" . $rCounter . ":G" . $rCounter)
					-> getAlignment()
					-> setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

			$rCounter++;
		}

		$rSheet -> getCell("A1")
				-> setValue("Release No.");
		$rSheet -> getColumnDimension("A")
					-> setAutoSize(true);
		$rSheet -> getCell("B1") 
				-> setValue("Description");
		$rSheet -> getColumnDimension("B")
					-> setAutoSize(true);
		$rSheet -> getCell("C1") 
				-> setValue("Total LOE");
		$rSheet -> getColumnDimension("C")
					-> setAutoSize(true);
		$rSheet -> getCell("D1") 
				-> setValue("Total Actual");
		$rSheet -> getColumnDimension("D")
					-> setAutoSize(true);
		$rSheet -> getCell("E1") 
				-> setValue("Total JIRA");
		$rSheet -> getColumnDimension("E")
					-> setAutoSize(true);
		$rSheet -> getCell("F1") 
				-> setValue("Total % Done");
		$rSheet -> getColumnDimension("F")
					-> setAutoSize(true);
		$rSheet -> getCell("G1") 
				-> setValue("Date Released");
		$rSheet -> getColumnDimension("G")
					-> setAutoSize(true);

		$rSheet -> getStyle("A1:G".($rCounter - 1))
					-> getBorders()
					-> getAllBorders()
					-> setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$rSheet -> setAutoFilter("A1:G" . ($rCounter - 1));

		$rData -> setActiveSheetIndex(0);

		$filename = "Releases (JIRA) - " . $project;
		$main = "C:/Downloads/";

		if(!file_exists($main)) {
			mkdir($main);
		}
		
		date_default_timezone_set("Asia/Hong_Kong");
		$date = date("m-d-Y_H-i-sa");

		$directory = "C:/Downloads/JIRA/";
		if(!file_exists($directory)) {
			mkdir($directory);
		}

		$directory = "C:/Downloads/JIRA/Releases/";
		if(!file_exists($directory)) {
			mkdir($directory);
		}

		$rWriter->save(str_replace(__FILE__, $directory . $filename . " (" . $date . ").xlsx",__FILE__));

		echo "JIRA releases for " . $project . " successfully exported to " . $directory . $filename . " (" . $date . ").xlsx";
	}

	public function exportReleaseTickets() {
		$project = $_POST['project'];
		$component_ = $_POST['component'];
		$release = $_POST['release'];

		$releaseID = Release::getReleaseID($release);
		$jiraTicket = array();

		$proj = DBProject::where('project_name', '=' , $project)->first();

		$getJiraPKey = DBJira::getJiraPKey($proj['jira_pname'], $release);

		foreach($getJiraPKey as $pk) {
			if($component_ == "AllComponents") {
				$jiraTicket[$pk] = DBJira::getTicket($pk);
			} else {
				$jiraTicket[$pk] = DBJira::getTicketWithComponent($pk, $component_);
			}
		}

		foreach($jiraTicket as $k=>$v) {
			foreach($v as $ticket ) {
				$data_set = array(
					'jira_pkey' => $ticket['pkey'],
					'summary' => $ticket['summary'],
					'assignee' => $ticket['assignee'],
					'tester' => $ticket['tester'],
					'reporter' => $ticket['reporter'],
					'jira_status' => $ticket['issue_status'],
					'resolution' => $ticket['resolution'],
					'priority' => $ticket['priority'],
					'component' => $ticket['cname'],
					'jira_source_id' => $ticket['ID'],
					'project_release_id' => $releaseID,
					'created_at' => $ticket['created_at'],
					'updated_at' => $ticket['updated_at'],
					'in_jira' => 1,
					'label' => $ticket['label']
				);

				if($component_ == "AllComponents") {
					$ifExists = DBJiraTicket::where('jira_pkey','=', $ticket['pkey'] )->where('project_release_id', '=', $releaseID)->pluck('jira_pkey');
					if($ifExists == null ) {
						$last = DBJiraTicket::insertGetId($data_set);
						TicketEstimated::create(array('jira_ticket_id' => $last));
					} else {
						DBJiraTicket::updateTicket($ticket['pkey'], $releaseID, $data_set);
					}
				} else {
					$_jira = explode(",", $component_);

					if(in_array($ticket['cname'], $_jira)) {
						$ifExists = DBJiraTicket::where('jira_pkey','=', $ticket['pkey'] )->where('project_release_id', '=', $releaseID)->pluck('jira_pkey');
						if($ifExists == null ) {
							$last = DBJiraTicket::insertGetId($data_set);
							TicketEstimated::create(array('jira_ticket_id' => $last));
						} else {
							DBJiraTicket::updateTicket($ticket['pkey'], $releaseID, $data_set);
						}
					}
				}
			}
		}

		$localTicket = DBJiraTicket::getAllTicketPKey($releaseID, $component_);
		$ticketDiff = array_diff($localTicket, $getJiraPKey);

		foreach($ticketDiff as $td) {
			$update_in_jira = DBJiraTicket::updateInJira($td, $releaseID);
		}

		$jiraTicket = null;
		$jiraTicket = DBJiraTicket::getJiraTicket($releaseID, $component_);

		require_once('Classes/PHPExcel.php');

		$jData = new PHPExcel();
		$jData -> getDefaultStyle()
					-> getFont()
					-> setName('Calibri');
		$jData -> getDefaultStyle()
					-> getFont()
					-> setSize(11);
		
		$jWriter = PHPExcel_IOFactory::createWriter($jData, "Excel2007");
		$jSheet = $jData -> getActiveSheet();
		$jSheet -> setTitle("Ticket Details List");
		$jSheet -> getStyle("A1:AV1")
				-> getFont()
				-> setBold(true)
				-> setSize(11);
		$jSheet -> getStyle("A1:AV1")
				-> getAlignment()
				-> setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$jSheet -> getStyle("A1:AV1")
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

		$column = 0;
		$row = 1;

		$jSheet -> setCellValueByColumnAndRow($column++, $row, "Ticket ID");
		$jSheet -> setCellValueByColumnAndRow($column++, $row, "Component");
		$jSheet -> setCellValueByColumnAndRow($column++, $row, "Summary");
		$jSheet -> setCellValueByColumnAndRow($column++, $row, "Jira Status");
		$jSheet -> setCellValueByColumnAndRow($column++, $row, "QA Status");
		$jSheet -> setCellValueByColumnAndRow($column++, $row, "Estimated");
		$jSheet -> setCellValueByColumnAndRow($column++, $row, "Actual");
		$jSheet -> setCellValueByColumnAndRow($column++, $row, "Percentage");

		$jSheet -> setCellValueByColumnAndRow($column++, $row, "Estimated (Days)");
		$jSheet -> setCellValueByColumnAndRow($column++, $row, "Planned Start");
		$jSheet -> setCellValueByColumnAndRow($column++, $row, "Planned End");
		$jSheet -> setCellValueByColumnAndRow($column++, $row, "Assigned");
		$jSheet -> setCellValueByColumnAndRow($column++, $row, "Actual Start");
		$jSheet -> setCellValueByColumnAndRow($column++, $row, "Actual End");
		$jSheet -> setCellValueByColumnAndRow($column++, $row, "Actual (Days)");
		
		$jSheet -> setCellValueByColumnAndRow($column++, $row, "Test Scenarios");
		$jSheet -> setCellValueByColumnAndRow($column++, $row, "Passed");
		$jSheet -> setCellValueByColumnAndRow($column++, $row, "Failed");
		$jSheet -> setCellValueByColumnAndRow($column++, $row, "Pending");
		$jSheet -> setCellValueByColumnAndRow($column++, $row, "Not Started");
		$jSheet -> setCellValueByColumnAndRow($column++, $row, "Test Complete %");

		$jSheet -> setCellValueByColumnAndRow($column++, $row, "Status");
		$jSheet -> setCellValueByColumnAndRow($column++, $row, "Resolution");
		$jSheet -> setCellValueByColumnAndRow($column++, $row, "Assignee");
		$jSheet -> setCellValueByColumnAndRow($column++, $row, "Reporter");
		$jSheet -> setCellValueByColumnAndRow($column++, $row, "Resource");
		$jSheet -> setCellValueByColumnAndRow($column++, $row, "Tester");
		$jSheet -> setCellValueByColumnAndRow($column++, $row, "Issue Type");
		$jSheet -> setCellValueByColumnAndRow($column++, $row, "Priority");
		$jSheet -> setCellValueByColumnAndRow($column++, $row, "Fix Version");
		$jSheet -> setCellValueByColumnAndRow($column++, $row, "Labels");
		$jSheet -> setCellValueByColumnAndRow($column++, $row, "Affacted Version/s");
		$jSheet -> setCellValueByColumnAndRow($column++, $row, "Updated");
		$jSheet -> setCellValueByColumnAndRow($column++, $row, "Created");
		$jSheet -> setCellValueByColumnAndRow($column++, $row, "Changelist ID");
		$jSheet -> setCellValueByColumnAndRow($column++, $row, "Linked Issues");
		$jSheet -> setCellValueByColumnAndRow($column++, $row, "Tageted Version");
		$jSheet -> setCellValueByColumnAndRow($column++, $row, "Development LOE - Database");
		$jSheet -> setCellValueByColumnAndRow($column++, $row, "Development LOE - Others");
		$jSheet -> setCellValueByColumnAndRow($column++, $row, "Total");

		$jSheet -> setCellValueByColumnAndRow($column++, $row, "FLOE");
		$jSheet -> setCellValueByColumnAndRow($column++, $row, "Complexity");
		$jSheet -> setCellValueByColumnAndRow($column++, $row, "TC Creation (Days)");
		
		$jSheet -> setCellValueByColumnAndRow($column++, $row, "FLOE");
		$jSheet -> setCellValueByColumnAndRow($column++, $row, "Complexity");
		$jSheet -> setCellValueByColumnAndRow($column++, $row, "TC Execution (Days)");
		
		$jSheet -> setCellValueByColumnAndRow($column++, $row, "Job Details");
		$jSheet -> setCellValueByColumnAndRow($column++, $row, "Job Process (Days)");

		$jSheet -> getColumnDimension("A")
				-> setAutoSize(true);
		$jSheet -> getColumnDimension("B")
				-> setAutoSize(true);
		$jSheet -> getColumnDimension("C")
				-> setAutoSize(true);
		$jSheet -> getColumnDimension("D")
				-> setAutoSize(true);
		$jSheet -> getColumnDimension("E")
				-> setAutoSize(true);
		$jSheet -> getColumnDimension("F")
				-> setAutoSize(true);
		$jSheet -> getColumnDimension("G")
				-> setAutoSize(true);
		$jSheet -> getColumnDimension("H")
				-> setAutoSize(true);
		$jSheet -> getColumnDimension("I")
				-> setAutoSize(true);
		$jSheet -> getColumnDimension("J")
				-> setAutoSize(true);
		$jSheet -> getColumnDimension("K")
				-> setAutoSize(true);
		$jSheet -> getColumnDimension("L")
				-> setAutoSize(true);
		$jSheet -> getColumnDimension("M")
				-> setAutoSize(true);
		$jSheet -> getColumnDimension("N")
				-> setAutoSize(true);
		$jSheet -> getColumnDimension("O")
				-> setAutoSize(true);
		$jSheet -> getColumnDimension("P")
				-> setAutoSize(true);
		$jSheet -> getColumnDimension("Q")
				-> setAutoSize(true);
		$jSheet -> getColumnDimension("R")
				-> setAutoSize(true);
		$jSheet -> getColumnDimension("S")
				-> setAutoSize(true);
		$jSheet -> getColumnDimension("T")
				-> setAutoSize(true);
		$jSheet -> getColumnDimension("U")
				-> setAutoSize(true);
		$jSheet -> getColumnDimension("V")
				-> setAutoSize(true);
		$jSheet -> getColumnDimension("W")
				-> setAutoSize(true);
		$jSheet -> getColumnDimension("X")
				-> setAutoSize(true);
		$jSheet -> getColumnDimension("Y")
				-> setAutoSize(true);
		$jSheet -> getColumnDimension("Z")
				-> setAutoSize(true);
		$jSheet -> getColumnDimension("AA")
				-> setAutoSize(true);
		$jSheet -> getColumnDimension("AB")
				-> setAutoSize(true);
		$jSheet -> getColumnDimension("AC")
				-> setAutoSize(true);
		$jSheet -> getColumnDimension("AD")
				-> setAutoSize(true);
		$jSheet -> getColumnDimension("AE")
				-> setAutoSize(true);
		$jSheet -> getColumnDimension("AF")
				-> setAutoSize(true);
		$jSheet -> getColumnDimension("AG")
				-> setAutoSize(true);
		$jSheet -> getColumnDimension("AH")
				-> setAutoSize(true);
		$jSheet -> getColumnDimension("AI")
				-> setAutoSize(true);
		$jSheet -> getColumnDimension("AJ")
				-> setAutoSize(true);
		$jSheet -> getColumnDimension("AK")
				-> setAutoSize(true);
		$jSheet -> getColumnDimension("AL")
				-> setAutoSize(true);
		$jSheet -> getColumnDimension("AM")
				-> setAutoSize(true);
		$jSheet -> getColumnDimension("AN")
				-> setAutoSize(true);
		$jSheet -> getColumnDimension("AO")
				-> setAutoSize(true);
		$jSheet -> getColumnDimension("AP")
				-> setAutoSize(true);
		$jSheet -> getColumnDimension("AQ")
				-> setAutoSize(true);
		$jSheet -> getColumnDimension("AR")
				-> setAutoSize(true);
		$jSheet -> getColumnDimension("AS")
				-> setAutoSize(true);
		$jSheet -> getColumnDimension("AT")
				-> setAutoSize(true);
		$jSheet -> getColumnDimension("AU")
				-> setAutoSize(true);
		$jSheet -> getColumnDimension("AV")
				-> setAutoSize(true);

		$jSheet -> getStyle("A1:AV1")
				-> getBorders()
				-> getAllBorders()
				-> setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$jSheet -> setAutoFilter("A1:AV1");

		$jData -> setActiveSheetIndex(0);

		$filename = "Releases (JIRA) - " . $project;
		$main = "C:/Downloads/";

		if(!file_exists($main)) {
			mkdir($main);
		}
		
		date_default_timezone_set("Asia/Hong_Kong");
		$date = date("m-d-Y_H-i-sa");

		$directory = "C:/Downloads/JIRA/";
		if(!file_exists($directory)) {
			mkdir($directory);
		}

		$directory = "C:/Downloads/JIRA/Releases/";
		if(!file_exists($directory)) {
			mkdir($directory);
		}

		$directory = "C:/Downloads/JIRA/Releases/Ticket List/";
		if(!file_exists($directory)) {
			mkdir($directory);
		}

		$jWriter->save(str_replace(__FILE__, $directory . $filename . " (" . $date . ").xlsx",__FILE__));

		echo "Tickets List for " . $project . "-" . $release . " successfully exported to " . $directory . $filename . " (" . $date . ").xlsx";

	}

	public function Ticket($project = '', $component_ = '', $release ='') {
		$releaseID = Release::getReleaseID($release);
		$jiraTicket = array();

		$proj = DBProject::where('project_name', '=' , $project)->first();

		$getJiraPKey = DBJira::getJiraPKey($proj['jira_pname'], $release);

		foreach($getJiraPKey as $pk) {
			if($component_ == "AllComponents") {
				$jiraTicket[$pk] = DBJira::getTicket($pk);
			} else {
				$jiraTicket[$pk] = DBJira::getTicketWithComponent($pk, $component_);
			}
		}

		foreach($jiraTicket as $k=>$v) {
			foreach($v as $ticket ) {
				$data_set = array(
					'jira_pkey' => $ticket['pkey'],
					'summary' => $ticket['summary'],
					'assignee' => $ticket['assignee'],
					'tester' => $ticket['tester'],
					'reporter' => $ticket['reporter'],
					'jira_status' => $ticket['issue_status'],
					'resolution' => $ticket['resolution'],
					'priority' => $ticket['priority'],
					'component' => $ticket['cname'],
					'jira_source_id' => $ticket['ID'],
					'project_release_id' => $releaseID,
					'created_at' => $ticket['created_at'],
					'updated_at' => $ticket['updated_at'],
					'in_jira' => 1,
					'label' => $ticket['label']
				);

				if($component_ == "AllComponents") {
					$ifExists = DBJiraTicket::where('jira_pkey','=', $ticket['pkey'] )->where('project_release_id', '=', $releaseID)->pluck('jira_pkey');
					if($ifExists == null ) {
						$last = DBJiraTicket::insertGetId($data_set);
						TicketEstimated::create(array('jira_ticket_id' => $last));
					} else {
						DBJiraTicket::updateTicket($ticket['pkey'], $releaseID, $data_set);
					}
				} else {
					$_jira = explode(",", $component_);

					if(in_array($ticket['cname'], $_jira)) {
						$ifExists = DBJiraTicket::where('jira_pkey','=', $ticket['pkey'] )->where('project_release_id', '=', $releaseID)->pluck('jira_pkey');
						if($ifExists == null ) {
							$last = DBJiraTicket::insertGetId($data_set);
							TicketEstimated::create(array('jira_ticket_id' => $last));
						} else {
							DBJiraTicket::updateTicket($ticket['pkey'], $releaseID, $data_set);
						}
					}
				}
			}
		}

		$localTicket = DBJiraTicket::getAllTicketPKey($releaseID, $component_);
		$ticketDiff = array_diff($localTicket, $getJiraPKey);

		foreach($ticketDiff as $td) {
			$update_in_jira = DBJiraTicket::updateInJira($td, $releaseID);
		}

		$jiraTicket = null;
		$jiraTicket = DBJiraTicket::getJiraTicket($releaseID, $component_);
		$this->view(
			'project/jira/jira_ticket',
			[
				'bhref' => "/WEBApp/public/",
				'projects'=> $this->projects,
				'jiraTicket' => $jiraTicket,
				'projects' => $this->projects,
				'project' => $project,
				'release'=> $release,
				'component' => $component_
			]
		);
	}

	public function TicketPage($project = '', $release ='', $ticket = '') {
		$releaseID = Release::getReleaseID($release, $project);
		$getTicketID = DBJiraTicket::where('jira_pkey', '=', $ticket)->where('project_release_id', '=' , $releaseID)->pluck('jira_ticket_id');
		$ticketDetails = DBJiraTicket::getTicketDetails($ticket, $releaseID);
		$this->view(
			'project/jira/jira_ticket_page',
			[
				'bhref' => "/WEBApp/public/",
				'projects' => $this->projects,
				'project' => $project,
				'release' => $release,
				'ticket' => $ticket,
				'ticketDetails' => $ticketDetails,
				'ticketID' => $getTicketID
			]
		);
	}

	public function updateTicketEstimated() {
		$result = array('error' => "", 'data' => "");
		foreach($_POST as $k=>$v) {
			if($v == "") {
				$data = ($k == "tcc_start_date") ? "TC Creation Start" : "TC Execution Start" ;
				$result = array('error' => "null", 'data' => $data);
				echo json_encode($result);
				return false;
			}
		}

		$update = array('tcc_floe' => $_POST['tcc_floe'],
			'tcc_complexity' => $_POST['tcc_complexity'],
			'tcc_start_date' => $_POST['tcc_start_date'],
			'tcc_end_date' => $_POST['tcc_end_date'],
			'tce_floe' => $_POST['tce_floe'],
			'tce_complexity' => $_POST['tce_complexity'],
			'tce_start_date' => $_POST['tce_start_date'],
			'tce_end_date' => $_POST['tce_end_date'],
			'job_process' => $_POST['job_process'],
		);
		$res = TicketEstimated::where('jira_ticket_id', '=', $_POST['ticket_id'])->update($update);

		if($res == true) {
			DBJiraTicket::where('jira_ticket_id', '=', $_POST['ticket_id'])->update(array('qbit_status'=> 'TCCreationNotStarted'));
		}
		echo json_encode($result);
	}

	public function updateTicketEstimatedDrag() {
		$type = $_POST['type'];
		if($type == "creation") {
			$update = array('tcc_start_date' => $_POST['start'],
					'tcc_end_date' => $_POST['end']
				);
			TicketEstimated::where('ticket_estimated_id', '=', $_POST['id'])->update($update);
		} elseif($type == "execution") {
			$update = array('tce_start_date' => $_POST['start'],
					'tce_end_date' => $_POST['end']
				);
			TicketEstimated::where('ticket_estimated_id', '=', $_POST['id'])->update($update);
		}
	}

	public function createJiraTC() {
		$matchThese = ['tc_id' => $_POST['tc_id'], 'ts_id' => $_POST['ts_id' ]];
		//$getComponent = Component::where('component_id','=',$_POST['component_id'])->pluck('component_name');
		$ifExists = TCDetails::where($matchThese)->first();
		if($ifExists == null) {
			$insertTCDetails = array(
				'tc_id' => $_POST['tc_id'],
				'tc_name' => $_POST['tc_name'],
				'ts_id' => $_POST['ts_id'],
				'ts_name' => $_POST['ts_name'],
				'desc_obj' => $_POST['desc'],
				'scope_of_test' => $_POST['scope_of_test'],
				'type_of_test' => $_POST['type_of_test'],
				'test_steps' =>  htmlentities($_POST['test_step'], ENT_QUOTES, 'UTF-8'),
				'expected_results' =>  htmlentities($_POST['expected_result'], ENT_QUOTES, 'UTF-8'),
				'test_data' =>  htmlentities($_POST['test_data'], ENT_QUOTES, 'UTF-8'),
				'tc_comments' => htmlentities($_POST['tc_comments'], ENT_QUOTES, 'UTF-8'),
				'main_or_jira' => 'jira',
				'tc_tester' => $_SESSION['username'],
				'jira_ticket_id' => $_POST['ticket_id']
			);
			$last_insert_id = TCDetails::insertGetId($insertTCDetails);
			$insertATDetails = array(
				'test_case_detail_id' => $last_insert_id,
				'at_script_location' => $_POST['tc_id'] . "_" . $_POST['ts_id']
			);
			AutomationDetail::create($insertATDetails);
			echo "Added Test Case Successfully!";
		} else {
			echo "ID's might have been used already.";
		}
	}

	public function startTCCreation() {
		$return = array('hasError' => "");
		$update_status = DBJiraTicket::where('jira_ticket_id', '=' , $_POST['jid']) -> update(array('qbit_status' => 'TCCreationInProgress'));
		$res = TTimeStamp::create(array('jira_ticket_id' => $_POST['jid'], 'start_datetime' => date("Y-m-d H:i"), 'time_stamp_type' => 'TCCreation' ) );
		if($res) {
			echo json_encode($return);
		} else {
			$return = array('hasError' => "true");
			echo json_encode($return);
			return false;
		}
	}

	public function startTCExecution() {
		$return = array('hasError' => "");
		$update_status = DBJiraTicket::where('jira_ticket_id', '=' , $_POST['jid']) -> update(array('qbit_status' => 'TCExecutionInProgress'));
		$res = TTimeStamp::create(array('jira_ticket_id' => $_POST['jid'], 'start_datetime' => date("Y-m-d H:i"), 'time_stamp_type' => 'TCExecution' ) );
		if($res == true) {
			echo json_encode($return);
		} else {
			$return = array('hasError' => "true");
			echo json_encode($return);
			return false;
		}
	}

	public function assignTCChecker() {
		$matchThese = ['JT.jira_pkey' => $_POST['ticket'], 'PR.release_name' => $_POST['release_name']];
		$ticketID = DBJiraTicket::getTicketID($matchThese);
		$currentTC = DBJiraTicket::getCurrentTC($ticketID, $_POST['release_name']);

		if(count($currentTC) == 0) {
			echo "You cannot assign test case creation review nor proceed to test case execution if there are no test cases included.";
		} else {
			if($_POST['val'] == "Assign Reviewer") {
				DBJiraTicket::where('jira_ticket_id', '=', $_POST['jira_id'])->update(array('qbit_status' => 'TCCreationCompletedForReview', 'qbit_checker' => $_POST['tc_checker']));
				$max = TTimeStamp::where('jira_ticket_id', '=' , $_POST['jira_id'])->max('ticket_time_stamp_id');
				TTimeStamp::where('jira_ticket_id' , '=', $_POST['jira_id'])
						->where('ticket_time_stamp_id','=' , $max)
						->where('time_stamp_type','=' , 'TCCreation')
						->update(array('end_datetime' => date("Y-m-d H:i")));

				echo "Test Case Creation review is assigned successfully! Test Execution will proceed once test cases are good.";
			} elseif($_POST['val'] == 'No Reviewer Required') {
				DBJiraTicket::where('jira_ticket_id', '=', $_POST['jira_id'])->update(array('qbit_status' => 'TCExecutionNotStarted', 'qbit_checker' => NULL));
				$max = TTimeStamp::where('jira_ticket_id', '=' , $_POST['jira_id'])->max('ticket_time_stamp_id');
				TTimeStamp::where('jira_ticket_id' , '=', $_POST['jira_id'])
						->where('ticket_time_stamp_id','=' , $max)
						->where('time_stamp_type','=' , 'TCCreation')
						->update(array('end_datetime' => date("Y-m-d H:i")));

				echo "You can now proceed to test case execution.";
			}
		}
	}

	public function assignTestExecutionChecker() {
		if($_POST['val'] == "Assign Reviewer") {
			DBJiraTicket::where('jira_ticket_id', '=', $_POST['jira_id']) -> update(array('qbit_status' => 'TCExecutionCompletedForReview', 'qbit_checker' => $_POST['te_checker']));
			$max = TTimeStamp::where('jira_ticket_id', '=', $_POST['jira_id']) -> max('ticket_time_stamp_id');
			TTimeStamp::where('jira_ticket_id', '=', $_POST['jira_id'])
					-> where('ticket_time_stamp_id', '=', $max)
					-> where('time_stamp_type','=' , 'TCExecution')
					-> update(array('end_datetime' => date("Y-m-d H:i")));

			echo "Test Case Creation review is assigned successfully! Ticket will proceed for review one results are good.";
		} else {
			DBJiraTicket::where('jira_ticket_id', '=', $_POST['jira_id']) -> update(array('qbit_status' => 'ForSignOff', 'qbit_checker' => NULL));
			$max = TTimeStamp::where('jira_ticket_id', '=', $_POST['jira_id']) -> max('ticket_time_stamp_id');
			TTimeStamp::where('jira_ticket_id', '=', $_POST['jira_id'])
					-> where('ticket_time_stamp_id', '=', $max)
					-> where('time_stamp_type','=' , 'TCExecution')
					-> update(array('end_datetime' => date("Y-m-d H:i")));

			echo "Ticket is now for DEV and BUSINESS sign offs.";
		}
	}

	public function updateJiraTCCreationToTCExecution() {
		DBJiraTicket::where('jira_ticket_id', '=', $_POST['id'])->update(array('qbit_status' => 'TCExecutionInProgress', 'qbit_checker' => NULL));
		$max = TTimeStamp::where('jira_ticket_id', '=' , $_POST['id'])->max('ticket_time_stamp_id');
		TTimeStamp::where('jira_ticket_id' , '=', $_POST['id'])
				->where('ticket_time_stamp_id','=' , $max)
				->where('time_stamp_type','=' , 'TCCreation')
				->update(array('end_datetime' => date("Y-m-d H:i")));
	}

	public function updateJiraTCCreationInProgress() {
		$res = DBJiraTicket::where('jira_ticket_id' ,'=', $_POST['id'])->update(array('qbit_status' => 'TCCreationInProgress'));
		if($res) {
			TTimeStamp::create(array('jira_ticket_id' => $_POST['id'], 'start_datetime' => date("Y-m-d H:i"), 'time_stamp_type' => 'TCCreation' ));
		}
	}

	public function updateJiraTCExecutionInProgress() {
		$res = DBJiraTicket::where('jira_ticket_id', '=', $_POST['id'])->update(array('qbit_status' => 'TCExecutionInProgress'));
		if($res) {
			TTimeStamp::create(array('jira_ticket_id' => $_POST['id'], 'start_datetime' => date("Y-m-d H:i"), 'time_stamp_type' => 'TCExecution'));
		}
	}

	public function deleteJiraTC() {
		$res = Capsule::table('test_case_detail')->where('test_case_detail_id', '=', $_POST['id'])->delete();
		if($res) {
			Capsule::table('automation_detail')->where('test_case_detail_id', '=', $_POST['id'])->delete();
		}
	}

	public function addTCToJIRA() {
		$jira_id = Capsule::table('jira_ticket')
						-> select('jira_ticket_id')
						-> where('jira_pkey', '=', $_POST['jira_pkey'])
						-> pluck('jira_ticket_id');

		$affectedRows = Capsule::table('test_case_detail')
							-> where('test_case_detail_id', '=', $_POST['test_case_detail_id'])
							-> update(array(
									'jira_ticket_id' => $jira_id
								));

		if($affectedRows == 0) {
			echo "There is some kind of problem. Cannot add test case to JIRA";
		} else {
			echo "Test Case Added successfully!";
		}
	}

	public function rescheduleTicket() {
		DBJiraTicket::rescheduleTicket($_POST['id']);
	}

	public function assignGetTicket() {
		$data = DBJiraTicket::getJiraTicketAssign($_POST['release_id'] , $_POST['project_id'], $_POST['component']);
		$jsonData =  array("aaData" => $data);
		echo json_encode($jsonData);
	}

	public function assignTicket() {
		$res =  DBJiraTicket::where('jira_ticket_id', '=' , $_POST['jira_id'])->update(array('qbit_assignee' => $_POST['assignee']));
		if($res) {
			DBJiraTicket::where('jira_ticket_id', '=' , $_POST['jira_id'])->update(array('qbit_status' => 'NotYetScheduled'));
		}
	}

	public function reassignGetTicket() {
		$data = DBJiraTicket::getJiraTicketReAssign($_POST['release_id'] , $_POST['project_id'], $_POST['component']);
		$jsonData =  array("aaData" => $data);
		echo json_encode($jsonData);
	}

	public function ticketBrowser() {
		$serialize = serialize($_POST['browsers']);
		$check_settings = PSetting::where('affected_release' ,'=', $_POST['release_id'])->where('setting_key' , '=', $_POST['ticket']."_browser")->first();
		if($check_settings == null) {
			PSetting::create(
				array(
					'setting_key' => $_POST['ticket']."_browser",
					'value' => $serialize,
					'affected_release' => $_POST['release_id']
				)
			);
		} else {
			PSetting::where('setting_key','=',  $_POST['ticket']."_browser")->where('affected_release' ,'=', $_POST['release_id'])->update(array('value' => $serialize));
		}
	}

	public function updateTicketTCResult() {
		$doesExists = TicketResult::where('test_case_detail_id', '=', $_POST['testCaseDetailID_'])->where('release_id', '=', $_POST['testReleaseID_'])->first();
		if($doesExists == null) {
			TicketResult::create(
				array(
					'result' => $_POST['browserResults'],
					'release_id' => $_POST['testReleaseID_'],
					'browser_id' => $_POST['browserIDs'],
					'test_case_detail_id' => $_POST['testCaseDetailID_'],
					'jira_ticket_id' => $_POST['ticketID_']
				)
			);
		} else {
			TicketResult::where('test_case_detail_id', '=', $_POST['testCaseDetailID_'])->where('release_id', '=', $_POST['testReleaseID_'])->update(array('result' => $_POST['browserResults'], 'browser_id' => $_POST['browserIDs']));
		}
	}

	public function updateDevSignOff() {
		DBJiraTicket::where('jira_ticket_id', '=', $_POST['id'])->update(array('dev_signoff' => 'SignOff Provided'));
	}

	public function updateBusinessSignOff() {
		DBJiraTicket::where('jira_ticket_id', '=', $_POST['id'])->update(array('business_signoff' => 'SignOff Provided'));
	}
}

?>
