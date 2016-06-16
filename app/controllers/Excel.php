
<?php

session_start();
use Illuminate\Database\Capsule\Manager as Capsule;

class Excel extends Controller {

	public function importTestCase() {

		$file = $_FILES['spreadsheet']['tmp_name'];
		require_once('Classes/PHPExcel.php');
		$inputFileName = $file;
		ini_set('memory_limit', '-1');
		ini_set('max_execution_time', 14000);
		$objPHPExcel = new PHPExcel();
		//  Read your Excel workbook
		try {
			$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
			$objReader = PHPExcel_IOFactory::createReader($inputFileType);
			$objReader->setLoadAllSheets();
			$objPHPExcel = $objReader->load($inputFileName);
		} catch(Exception $e) {
			die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
		}

		$loadedSheetNames = $objPHPExcel->getSheetNames();

		foreach($loadedSheetNames as $sheetIndex => $loadedSheetName) {
			$lowerCaseSheetName = strtolower($loadedSheetName);
			$lowerCasePName = strtolower($_POST['pname']);
			if(stristr($lowerCaseSheetName,$lowerCasePName) === FALSE) {
				continue;
			}

			$ifExists = Capsule::table('component as C')
						-> leftjoin('project as P', 'P.project_id', '=', 'C.project_id')
						-> where('P.project_id', '=' , $_POST['pid'])
						-> where('C.component_name', '=', $loadedSheetName)
						-> first();
			if($ifExists == null) {
				Component::create(
					array(
							'component_name' => $loadedSheetName,
							'project_id' => $_POST['pid']
						)
				);
			}

			$objPHPExcel -> setActiveSheetIndex($sheetIndex);
			$worksheet = $objPHPExcel -> getActiveSheet();
			$worksheetTitle = $worksheet -> getTitle();
			$highestRow = $worksheet -> getHighestRow();
			$rowdata = array();
			$component_id = Capsule::table('component as C')
								-> leftjoin('project as P', 'P.project_id', '=', 'C.project_id')
								-> where('P.project_id', '=' , $_POST['pid'])
								-> where('C.component_name', '=', $worksheetTitle)
								-> pluck('C.component_id');

			for ($row = 4; $row <= $highestRow; ++ $row) {
				if($worksheet -> getCellByColumnAndRow(1, $row) == "") {
					break;
				}
				$tc_id = ($worksheet -> getCellByColumnAndRow(0, $row) != "") ? $worksheet -> getCellByColumnAndRow(0, $row) -> getFormattedValue() : $tc_id;

				$rowdata[$worksheetTitle.$row] = array(
					'tc_id' => str_replace(
							"-",
							"_",
							$tc_id
						),
					'tc_name' => $worksheet -> getCellByColumnAndRow(1, $row)
											->getFormattedValue(),
					'ts_id' => str_replace(
							"-",
							"_",
							$worksheet -> getCellByColumnAndRow(2, $row)
										-> getFormattedValue()
						),
					'ts_name' => $worksheet -> getCellByColumnAndRow(3, $row) 
											-> getFormattedValue(),
					'desc_obj' => $worksheet -> getCellByColumnAndRow(4, $row)
											-> getFormattedValue(),
					'scope_of_test' => $worksheet -> getCellByColumnAndRow(5, $row)
												-> getFormattedValue(),
					'type_of_test' => $worksheet -> getCellByColumnAndRow(6, $row)
												-> getFormattedValue(),
					'test_steps' => $worksheet -> getCellByColumnAndRow(7, $row)
												-> getFormattedValue(),
					'expected_results' => $worksheet -> getCellByColumnAndRow(8, $row)
													-> getFormattedValue(),
					'manual_automation' => $manual_automation,
					'main_or_jira' => 'main',
					'tc_status' => $worksheet -> getCellByColumnAndRow(10, $row)
											-> getFormattedValue(),
					'date_last_change' => $datelastchanged,
					'tc_tester' => $worksheet -> getCellByColumnAndRow(12, $row)
											-> getFormattedValue(),
					'tc_reviewed' => $worksheet -> getCellByColumnAndRow(14, $row)
											-> getFormattedValue(),
					'priority' => $worksheet -> getCellByColumnAndRow(15, $row)
											-> getFormattedValue(),
					'date_reviewed' => $datereviewed,
					'developer' => $worksheet -> getCellByColumnAndRow(26, $row)
											-> getFormattedValue(),
					'date_finished' => $datefinished,
					'automation_status' => $worksheet -> getCellByColumnAndRow(28, $row)
													-> getFormattedValue(),
					'at_script_location' => $worksheet -> getCellByColumnAndRow(30, $row)
													-> getFormattedValue(),
					'component_id' =>$component_id
				);
			}

			foreach($rowdata as $rd) {
				$matchThese = [
					'tc_id' => $rd['tc_id'] ,
					'ts_id' => $rd['ts_id']
				];
				$check_tcd = TCDetails::where($matchThese)->first() ;
				if($check_tcd == null) {
					$res = TCDetails::create($rd);
					if($res == true) {
						echo $rd['tc_id'] . "is added <br>";
						$success[] = $rd;
					} else {
						echo $rd['tc_id'] . "is failed<br>";
						$fail[] = $rd ;
					}
				} else {
					$res2 = TCDetails::where($matchThese)->update($rd);
					if($res2 == true) {
						echo $rd['tc_id'] . "is updated <br>";
						$update[] = $rd ;
					} else {
						echo "no changes in ". $rd['tc_id'] . " <br>";
					}
				}
			}
		}
		echo "<br>";

	}
}

?>
