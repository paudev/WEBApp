<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class TChecker extends Eloquent
{
	
	protected $table  = "test_checker";
	protected $primaryKey = "test_checker_id";
	protected $fillable = array('test_case_detail_id', 'user_id', 'check_status');
	
	
	public function tcdetails()
	{
		return $this->belongsTo("TCDetails", "test_case_detail_id");
	}
	
}

?>