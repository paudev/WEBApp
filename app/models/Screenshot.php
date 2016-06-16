<?php
	
	use Illuminate\Database\Eloquent\Model as Eloquent;
	use Illuminate\Database\Capsule\Manager as Capsule;

	class Screenshot extends Eloquent {

		protected $table = "screenshot";
		protected $primaryKey = "screenshot_id";
		protected $fillable = array('test_case_id', 'browser_id', 'link', 'description', 'active', 'extension');
		public $timestamps = false;

		protected function getScreenshots($ticketID, $releaseName) {

			$screenshots = Capsule::table("screenshot as sc")
								-> select("sc.*")
								-> whereIn(
										"sc.test_case_id", function($query) use ($ticketID, $releaseName) {
											$query -> select("tcd.test_case_detail_id")
												-> from("test_case_detail as tcd")
												-> leftjoin("jira_ticket as jt", "tcd.jira_ticket_id", "=", "jt.jira_ticket_id")
												-> leftjoin("project_release as pr", "jt.project_release_id", "=", "pr.project_release_id")
												-> where("jt.jira_ticket_id", "=", $ticketID)
												-> where("pr.release_name", "=", $releaseName)
												-> where("tcd.main_or_jira", "=", "jira")
												-> where("sc.active", "=", 1);
										}
									)
								-> get();

			return $screenshots;

		}

	}

?>