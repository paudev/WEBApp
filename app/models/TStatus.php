<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class TStatus extends Eloquent
{
	
	protected $table  = "test_status";
	protected $primaryKey = "test_status_id";
	protected $fillable = array('test_case_detail_id', 'user_id', 'test_status');
	
	
	public function tcdetails()
	{
		return $this->belongsTo("TCDetails", "test_case_detail_id");
	}
	
}

?>