<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Capsule\Manager as Capsule;

class Component extends Eloquent
{

	protected $table  = "component";
	protected $primaryKey = "component_id";
	protected $fillable = array('component_id', 'component_name', 'project_id');

	protected function getComponentsOfProjectJIRA($jira_pkey) {
		
		$components = Capsule::table('component as c')
						-> select('c.*')
						-> leftjoin('project as p', 'p.project_id', '=', 'c.project_id')
						-> leftjoin('project_release_association as pra', 'pra.project_id', '=', 'p.project_id')
						-> leftjoin('project_release as pr', 'pr.project_release_id', '=', 'pra.release_id')
						-> leftjoin('jira_ticket as jt', 'pr.project_release_id', '=', 'jt.project_release_id')
						-> where('jt.jira_pkey', '=', $jira_pkey)
						-> groupBy('c.component_name')
						-> get();

		return $components;

	}
	
	public function project() {

		return $this->belongsTo('DBProject', 'project_id');

	}

	public function tcdetails() {

		return $this->hasMany('TCDetails', 'component_id');
		
	}
}

?>
