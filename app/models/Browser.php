<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Browser extends Eloquent
{
	
	protected $table  = "browser";
	protected $primaryKey = "browser_id";
	protected $fillable = array('browser_name', 'project_id');
	
	public function project()
	{
		return $this->belongsTo('Project', 'project_id');
	}
	
	public function smoketest()
	{
		return $this->belongsTo('SmokeTest', 'browser_id');
	}
	
}

?>