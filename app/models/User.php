<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Capsule\Manager as Capsule;

class User extends Eloquent
{
	
	protected $table  = "user_info";
	protected $primaryKey = "user_id";
	public $timestamps = false;
	protected $fillable = array('username', 'email', 'password', 'salt_password', 'first_name', 'last_name', 'date_registered');
	
	public function register($arr)
	{
		try
		{
			if(User::create($arr))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		catch(PDOException $e)
		{
			$e->getMessage();
			echo  "something is wrong" .$e->getMessage();
		} 
		
	}
	
	protected function getInfo($user_id)
	{
		$info = Capsule::table('user_info')->select('username', 'user_type', 'first_name', 'last_name', 'user_id')->where('user_id', '=' , $user_id)->first();
		return $info ;
	}
	
}

?>