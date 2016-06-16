<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class PSetting extends Eloquent {

	protected $table  = "project_setting";
	protected $primaryKey = "project_setting_id";
	protected $fillable = array('project_id', 'setting_key', 'value', 'affected_release');

	public function belongsTo() {
		return $this->hasMany('Project', 'project_id');
	}
}

?>
