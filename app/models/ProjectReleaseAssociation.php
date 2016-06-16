<?php
	
	use Illuminate\Database\Eloquent\Model as Eloquent;
	use Illuminate\Database\Capsule\Manager as Capsule;

	class ProjectReleaseAssociation extends Eloquent {

		protected $table = 'project_release_association';
		protected $primaryKey = 'id';
		protected $fillable = array('project_id', 'release_id', 'association_type');
		public $timestamp = false;

	}

?>