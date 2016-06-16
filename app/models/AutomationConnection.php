<?php

	use Illuminate\Database\Eloquent\Model as Eloquent;
	use Illuminate\Database\Capsule\Manager as Capsule;

	class AutomationConnection extends Eloquent {

		protected $table  = "automation_connection";
		protected $primaryKey = "connection_id";
		protected $fillable = array('driver', 'host', 'username', 'password', 'database_name', 'charset', 'collation', 'prefix', 'connection_name');
		public $timestamps = false;

		protected function getConnections() {
			$automation_connections = Capsule::table("automation_connection")
											-> select("*")
											-> get();

			return $automation_connections;
		}

		protected function checkName($connection_name) {
			$automation_detail = Capsule::table("automation_connection")
											-> select("connection_name")
											-> where("connection_name", "=", $connection_name)
											-> pluck("connection_name");
			return $automation_detail;
		}

	}
?>