<?php

use Illuminate\Database\Capsule\Manager as Capsule;

class Home extends Controller {

	protected $projects = '';

	public function __construct() {

		session_start();
		if(!isset($_SESSION['user_id'], $_SESSION['user_type'], $_SESSION['username'])) {
			header('Location: /WEBApp/public/');
		}
		$this->projects = $this->getProjectSidebar();

	}

	public function getProjectSidebar() {

		$arr = DBProject::where('activated', '=', 1) -> lists('project_name');
		return $arr;

	}

	public function error404() {

		$this->view(
			'home/404_error',
			[
				'bhref' => "/WEBApp/public/"
			]
		);

	}

	public function Dashboard() {

		$this->view(
			'home/dashboard',
			[
				'bhref' => "/WEBApp/public/", 'projects' => $this->projects
			]
		);

	}

	public function Tasks() {

		$no_schedule = DBJiraTicket::getTicketNoSchedule();
		$test_creation = DBJiraTicket::getTicketTestCreation();
		$test_execution = DBJiraTicket::getTicketTestExecution();
		$test_checking = DBJiraTicket::getTicketTestCreationChecking();
		$test_signoff = DBJiraTicket::getTicketSignOff();
		$automation_connections = AutomationConnection::getConnections();
		$assignedTickets = DBJiraTicket::getAssignedTickets();
		// Put here all tickets currently assigned

		$this->view (
			'home/task/task',
			[
				'bhref' => "/WEBApp/public/",
				'projects' => $this->projects,
				'no_schedule' => $no_schedule,
				'test_creation' => $test_creation,
				'test_execution' => $test_execution,
				'test_checking' => $test_checking,
				'test_signoff' => $test_signoff,
				'automation_connections' => $automation_connections,
				'statement' => "None",
				'assignedTickets' => $assignedTickets
			]
		);

	}

	public function checkConnectionName() {

		$connectionName = $_POST["connectionName"];

		$exists = AutomationConnection::checkName($connectionName);
		if($exists == "") {
			echo "Available";
		} else {
			echo "Not Available";
		}

	}

	public function TicketSchedule($ticket = '', $release_name = '') {

		$matchThese = [
			'JT.jira_pkey' => $ticket,
			'PR.release_name' => $release_name
		];

		$ticketID = DBJiraTicket::getTicketID($matchThese);
		$this->view(
			'home/task/ticket_schedule',
			[
				'bhref' => "/WEBApp/public/",
				'projects' => $this->projects,
				'ticket' => $ticket,
				'release_name' => $release_name,
				'ticketID' => $ticketID
			]
		);

	}

	public function checkDatabaseConnectivity() {

		$host = $_POST['connection_host'];
		$username = $_POST['connection_username'];
		$password = $_POST['connection_password'];

		set_time_limit(0);

		$conn = mysql_connect($host, $username, $password);
		if(!mysql_ping($conn)) {
			echo "Cannot cannot to server with your username and password. You can try again.";
		} else {
			echo "Connection credentials are valid.";
		}

	}

	public function createNewConnection() {

		$connection_name = $_POST["connection_name"];
		$driver = $_POST["driver"];
		$host = $_POST["host"];
		$database_name = $_POST["database_name"];
		$prefix = $_POST["prefix"];
		$username = $_POST["username"];
		$password = $_POST["password"];

		$newConnection = array(
				'driver' => $driver,
				'host' => $host,
				'database_name' => $database_name,
				'prefix' => $prefix,
				'username' => $username,
				'password' => $password,
				'connection_name' => $connection_name
			);

		AutomationConnection::create($newConnection);
		echo "Successfully added new Automation Connection details";

	}

	public function uploadScreenshot() {

		if(isset($_FILES['image'])) {
			$testCaseID = $_POST['test_case_select'];
			$browserID = $_POST['browser_select'];

			$errors= array();
			$file_name = $_FILES['image']['name'];
			$file_size =$_FILES['image']['size'];
			$file_tmp =$_FILES['image']['tmp_name'];
			$file_type=$_FILES['image']['type'];
			$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

			$expensions= array("jpeg","jpg","png");
			if(in_array($file_ext,$expensions)=== false){
				$errors[]="extension not allowed, please choose a JPEG or PNG file.";
			}
			if($file_size > 2097152) {
				$errors[] = 'File size must be at most 2 MB';
			}

			if(empty($errors) == true) {
				$destination = "uploads/" . $file_name;
				move_uploaded_file($file_tmp, $destination);

				$arr = array(
					'test_case_id' => $testCaseID,
					'browser_id' => $browserID,
					'link' => $destination,
					'description' => htmlentities($_POST['screenshot_description'], ENT_QUOTES, 'UTF-8'),
					'active' => true,
					'extension' => $file_ext
				);
				$last_insert_id = Screenshot::insertGetId($arr);
				echo "SUCCESS";
			} else {
				echo "ERROR";
			}
		} else {
			echo "NO_FILE";
		}

	}

	public function updateActiveScreenshot() {

		$screenshotID = $_POST['screenshotID'];
		$return = Screenshot::where("screenshot_id", "=", $screenshotID)
						-> update(
								array(
									"active" => false
								)
							);

		if($return == true) {
			echo "Screenshot successfully removed.";
		} else {
			echo "There is some kind of error. Please report issue to developer.";
		}

	}

	public function TCCreation($ticket = '', $release_name = '') {

		$matchThese = [
			'JT.jira_pkey' => $ticket,
			'PR.release_name' => $release_name
		];
		$ticketID = DBJiraTicket::getTicketID($matchThese); // ticketID of jira ticket
		$currentTC = DBJiraTicket::getCurrentTC($ticketID, $release_name);
		$components = Component::getComponentsOfProjectJIRA($ticket);

		$this->view(
			'home/task/tc_creation',
			[
				'bhref' => "/WEBApp/public/",
				'projects' => $this->projects,
				'ticket' => $ticket,
				'release_name' => $release_name,
				'ticketID' => $ticketID,
				'currentTC' => $currentTC,
				'components' => $components,
			]
		);

	}

	public function TCExecution($ticket = '', $release_name = '') {

		$matchThese = [
			'JT.jira_pkey' => $ticket,
			'PR.release_name' => $release_name
		];
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

		$this->view(
			'home/task/tc_execution',
			[
				'bhref' => "/WEBApp/public/",
				'projects' => $this->projects,
				'ticket' => $ticket,
				'release_name' => $release_name,
				'ticketID' => $ticketID,
				'currentTC' => $currentTC,
				'project_id' => $getProjectID,
				'release_id' => $release_id,
				'browsers' => $getBrowsers,
				'ticketResults' => $ticketResults,
				'screenshots' => $screenshots
			]
		);

	}

	public function exportTestCases() {

		$ticket = $_POST["jira_pkey"];
		$release_name = $_POST["release_name"];

		$matchThese = [
			'JT.jira_pkey' => $ticket,
			'PR.release_name' => $release_name
		];
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

		$index = 1;
		foreach($currentTC as $tc) {
			$hasScreenshot = false;
			foreach($screenshots as $sc) {
				if($sc['test_case_id'] == $tc['test_case_detail_id']) {
					$hasScreenshot = true;
					break;
				}
			}

			if($hasScreenshot) {
				$jiraSheet = $jiraData -> createSheet($index);
				$jiraSheet -> setTitle($tc['tc_id'] . "_" . $tc['ts_id']);

				$row = 1;
				foreach($screenshots as $sc) {
					if($sc['test_case_id'] == $tc['test_case_detail_id']) {
						$extension = $sc['extension'];
						$image = "";

						if($extension == "jpg" || $extension == "jpeg") {
							$image = imagecreatefromjpeg($sc['link']);
						} elseif($extension == "png") {
							$image = imagecreatefrompng($sc['link']);
						}

						$jiraDrawing = new PHPExcel_Worksheet_MemoryDrawing();
						$jiraDrawing -> setName('image');
						$jiraDrawing -> setDescription('image');
						$jiraDrawing -> setImageResource($image);

						if($extension == "jpg" || $extension == "jpeg") {
							$jiraDrawing -> setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_JPEG);
						} elseif($extension == "png") {
							$jiraDrawing -> setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
						}

						$jiraDrawing -> setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
						$jiraDrawing -> setHeight(450);

						$browserName = "";
						foreach($decode_browser as $b) {
							if($b['id'] == $sc['browser_id']) {
								$browserName = $b['text'];
								break;
							}
						}
						$jiraSheet -> getCell("A" . $row)
									-> setValue($browserName);
						$jiraDrawing -> setCoordinates("A" . ($row + 1));
						$row = $row + 24;
						$jiraDrawing -> setWorksheet($jiraSheet);
					}
				}

				$index++;
			}
		}

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

		$jiraWriter -> save(str_replace(__FILE__, $directory . $filename . " (" . $date . ").xlsx",__FILE__));

		echo $ticket . " test execution results successfully exported to " . $directory . $filename . " (" . $date . ").xlsx";

	}

	public function TestCaseCreationReview($ticket = '', $release_name = '') {

		$matchThese = [
			'JT.jira_pkey' => $ticket,
			'PR.release_name' => $release_name
		];
		$ticketID = DBJiraTicket::getTicketID($matchThese);
		$currentTC = DBJiraTicket::getCurrentTC($ticketID, $release_name);

		$this -> view(
			'home/task/tc_creation_review',
			[
				'bhref' => "/WEBApp/public/",
				'projects' => $this->projects,
				'ticket' => $ticket,
				'release_name' => $release_name,
				'ticketID' => $ticketID,
				'currentTC' => $currentTC
			]
		);

	}

	public function TestCaseExecutionReview($ticket = '', $release_name = '') {

		$matchThese = [
			'JT.jira_pkey' => $ticket,
			'PR.release_name' => $release_name
		];
		$ticketID = DBJiraTicket::getTicketID($matchThese);
		$release_id = DBJiraTicket::getTicketReleaseID($matchThese);
		$currentTC = DBJiraTicket::getCurrentTC($ticketID, $release_name);
		$screenshots = Screenshot::getScreenshots($ticketID, $release_name);

		$ticketResults = TicketResult::getTicketResults($ticketID);

		$getTicketBrowserSettings = PSetting::where('affected_release' , $release_id)
										-> where('setting_key' , $ticket."_browser")
										-> pluck('value');
		$unserialize = unserialize($getTicketBrowserSettings);
		$getBrowsers = DBJiraTicket::getBrowser($unserialize);
		$getBrowsers = json_encode($getBrowsers);

		$this -> view(
			'home/task/tc_execution_review',
			[
				'bhref' => "/WEBApp/public/",
				'projects' => $this->projects,
				'ticket' => $ticket,
				'release_name' => $release_name,
				'ticketID' => $ticketID,
				'currentTC' => $currentTC,
				'ticketResults' => $ticketResults,
				'browsers' => $getBrowsers,
				'screenshots' => $screenshots
			]
		);

	}

	public function getProjects() {

		$tes = Capsule::table('project')
					-> select('project_id as id', 'project_name as text')
					-> where('project_name', 'LIKE', '%'.$_POST['term'].'%')
					-> get();

		echo json_encode($tes);

	}

	public function getProjectsAct() {

		$tes = Capsule::table('project')
					-> select('project_id as id', 'project_name as text')
					-> where('project_name', 'LIKE', '%'.$_POST['term'].'%')
					-> where('activated', '=', 1)
					-> get();

		echo json_encode($tes);

	}

	public function getComponents_Jira() {

		$components = Capsule::table('component as c')
							-> select('c.component_id as id', 'c.component_name as text')
							-> leftjoin('project as p', 'p.project_id', '=', 'c.project_id')
							-> leftjoin('project_release_association as pra', 'pra.project_id', '=', 'p.project_id')
							-> leftjoin('project_release as pr', 'pr.project_release_id', '=', 'pra.release_id')
							-> leftjoin('jira_ticket as jt', 'pr.project_release_id', '=', 'jt.project_release_id')
							-> where('jt.jira_pkey', '=', $_POST['ticketName'])
							-> where('c.component_name', 'LIKE', '%'.$_POST['term'].'%')
							-> groupBy('c.component_name')
							-> get();

		echo json_encode($components);

	}

	public function getTestCaseDetailComponents() {

		$data = TCDetails::getComponentTestCaseDetails($_POST['component_id'] , $_POST['ticketName']);
		$jsonData =  array("aaData" => $data);

		echo json_encode($jsonData);

	}

	public function getProjectsAct2() {

		$tes = Capsule::connection('jira')
					-> table('project')
					-> select('ID as id', 'pname as text')
					-> where('pname', 'LIKE', '%'.$_POST['term'].'%')
					-> get();

		echo json_encode($tes);

	}

	public function getProjectsAct2_() {

		$tes = Capsule::connection('jira')
					-> table('project')
					-> select('ID as id', 'pname as text')
					-> where('ID', '=', $_POST['id'])
					-> get();

		echo json_encode($tes);

	}

	public function getReleases() {

		$tes = Capsule::table('project_release as pr')
					-> select('pr.project_release_id as id', 'pr.release_name as text')
					-> leftjoin('project_release_association as pra', 'pra.release_id', '=', 'pr.project_release_id')
					-> leftjoin('project as p', 'p.project_id', '=', 'pra.project_id')
					-> where('p.project_id', '=', $_POST['id'])
					-> where('pr.release_name', 'LIKE', '%'.$_POST['term'].'%')
					-> get();

		echo json_encode($tes);

	}

	public function getBrowsers() {

		$tes = Capsule::table('browser')
					-> select('browser_id as id', 'browser_name as text')
					-> where('project_id', '=',$_POST['pid'])
					-> where('browser_name', 'LIKE', '%'.$_POST['term'].'%')
					-> get();

		echo json_encode($tes);

	}

	public function getProjectsAct3() {

		$tes = Capsule::connection('jira')
					-> table('project')
					-> select('ID as id', 'pname as text')
					-> where('ID', '=', $_POST['pid'])
					-> where('pname', 'LIKE', '%'.$_POST['term'].'%')
					-> get();

		echo json_encode($tes);

	}

	public function getComponents() {

		$tes = Capsule::table('jira_ticket')
					-> select('component as id', 'component as text')
					-> where('project_release_id', '=', $_POST['id'])
					-> where('component', 'LIKE', '%'.$_POST['term'].'%')
					-> groupBy('component')
					-> get();

		echo json_encode($tes);

	}

	public function getComponents2() {

		$tes = Capsule::connection('jira')
					-> table('component as c')
					-> select('c.ID as id', 'c.cname as text')
					-> leftjoin('project as p', 'c.PROJECT', '=', 'p.ID')
					-> where('p.ID', '=', $_POST['id'])
					-> where('c.cname', 'LIKE', '%'.$_POST['term'].'%')
					-> groupBy('c.cname')
					-> get();

		echo json_encode($tes);

	}

	public function getConnections() {

		$tes = Capsule::table('automation_connection')
					-> select('connection_id as id', 'connection_name as text')
					-> get();

		echo json_encode($tes);

	}

	public function getUsers() {

		$tes = Capsule::table('user_info')
					-> select('username as id', Capsule::raw('CONCAT(first_name , " " , last_name ) as text'))
					-> where('username', 'LIKE', '%'.$_POST['term'].'%')
					-> orWhere('first_name', 'LIKE', '%'.$_POST['term'].'%')
					-> orwhere('username', 'LIKE', '%'.$_POST['term'].'%')
					-> orWhere('last_name', 'LIKE', '%'.$_POST['term'].'%')
					-> get();

		echo json_encode($tes);
		
	}
}

?>
