<?php
	
	use Illuminate\Database\Eloquent\Model as Eloquent;
	use Illuminate\Database\Capsule\Manager as Capsule;

	class Subcomponent extends Eloquent {

		protected $table = "subcomponent";
		protected $primaryKey = "subcomponent_id";
		protected $fillable = array("subcomponent_name", "component_id", "project_id");
		public $timestamps = false;

		protected function getSubcomponents($projectID) {
			$ticketResults = Capsule::table("subcomponent")
								-> select("*")
								-> where("project_id", "=", $projectID)
								-> get();
			return $ticketResults;
		}
	}

?>