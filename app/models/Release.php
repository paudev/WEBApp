<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Capsule\Manager as Capsule;
class Release extends Eloquent
{
	
	protected $table  = "project_release";
	protected $primaryKey = "project_release_id";
	protected $fillable = ['release_name', 'release_type', 'release_description', 'source_id', 'created_at', 'source_project_id'];
	
	
	protected function getReleaseFromJira($project)
	{
		$getReleaseFromJira = Capsule::connection('jira')->table('projectversion as PV')
							->select('vname', 'RELEASEDATE','PV.DESCRIPTION AS DESCRIPTION', 'RELEASED','PV.STARTDATE as STARTDATE', 'PV.ID as release_id', 'PV.PROJECT as p_id')
							->leftjoin('nodeassociation as NA', 'NA.SINK_NODE_ID', '=' , 'PV.ID')
							->leftjoin('project as P', 'PV.PROJECT', '=', 'P.ID')
							->where('P.pname', '=', $project) 
							->where('NA.SINK_NODE_ENTITY', '=', 'Version')
							->where('NA.ASSOCIATION_TYPE', '=', 'IssueFixVersion')
							->whereNotNull('PV.RELEASEDATE')
							->groupBy('PV.vname')
							->orderBy('PV.RELEASEDATE', 'desc')
							->get();
		$getReleaseFromJira = json_decode(json_encode($getReleaseFromJira), true);
		return $getReleaseFromJira;
	}

	protected function getReleasesOfComponent($projectID, $componentName) {

		$jira_ = explode(",", $componentName);

		$componentReleases = Capsule::connection('jira')
							-> table('projectversion as pv')
							-> select('vname', 'releasedate as RELEASEDATE','pv.description as DESCRIPTION', 'released','pv.startdate as STARTDATE', 'pv.id as release_id', 'pv.project as p_id')
							-> leftjoin('nodeassociation as na', 'na.sink_node_id', '=', 'pv.id')
							-> leftjoin('jiraissue as ji', 'na.source_node_id', '=', 'ji.id')
							-> where('ji.project', '=', $projectID)
							-> whereNotNull('pv.releasedate')
							-> where('na.association_type', '=', 'IssueFixVersion')
							-> where('na.sink_node_entity', '=', 'Version')
							-> whereIn(
									'ji.pkey', function($query) use ($projectID, $jira_) {
										$query -> select('ji.pkey')
											-> from ('jiraissue as ji')
											-> leftjoin('nodeassociation as na', 'na.source_node_id', '=', 'ji.id')
											-> leftjoin('component as c', 'na.sink_node_id', '=', 'c.id')
											-> where('ji.project', '=', $projectID)
											-> whereIn('c.cname', $jira_)
											-> where('na.association_type', '=', 'IssueComponent');
								})
							-> groupBy('pv.vname')
							-> orderBy('pv.releasedate', 'desc')
							-> get();

		return $componentReleases;

	}

	protected function getProjectReleases($projectID, $jiraComponent) {

		$jira_ = explode(",", $jiraComponent);

		$releases = Capsule::table('project_release as pr')
				-> select('pr.*',
						Capsule::raw('ifnull(count(jt.jira_ticket_id), 0) as total_jira')
					)
				-> leftjoin('jira_ticket as jt', 'jt.project_release_id', '=', 'pr.project_release_id')
				-> leftjoin('project_release_association as pra', 'pra.release_id', '=', 'pr.project_release_id')
				-> leftjoin('project as p', 'pra.project_id', '=', 'p.project_id')
				-> where('p.project_id', '=', $projectID)
				-> where('pra.association_type', '=', 'jira')
				//-> whereIn('jt.component', $jira_)
				-> groupBy('pr.project_release_id')
				-> orderBy('pr.created_at', 'desc')
				-> get();

		return $releases;

	}

	protected function getProjectReleaseCount($projectID, $jiraComponent) {

		if($jiraComponent == "") {
			return Release::getProjectReleases($projectID, $jiraComponent);
		} else {
			$jira_ = explode(",", $jiraComponent);
			$releasesCount = Capsule::table('project_release as pr')
					-> select('pr.*',
							Capsule::raw('ifnull(count(jt.jira_ticket_id), 0) as total_jira')
						)
					-> leftjoin('jira_ticket as jt', 'jt.project_release_id', '=', 'pr.project_release_id')
					-> leftjoin('project_release_association as pra', 'pra.release_id', '=', 'pr.project_release_id')
					-> leftjoin('project as p', 'pra.project_id', '=', 'p.project_id')
					-> where('p.project_id', '=', $projectID)
					-> where('pra.association_type', '=', 'jira')
					-> whereIn('jt.component', $jira_)
					-> groupBy('pr.project_release_id')
					-> orderBy('pr.created_at', 'desc')
					-> get();

			return $releasesCount;
		}

	}
	
	protected function getReleaseID($release_name) {

		$id = Capsule::table('project_release as pr')
			  ->select('pr.project_release_id')
			  ->leftjoin('project_release_association as pra', 'pra.release_id', '=', 'pr.project_release_id')
			  ->where('pr.release_name', '=', $release_name)
			  ->where('pra.association_type', '=', 'jira')
			  ->pluck('pr.project_release_id');

		return $id;

	}
	
	protected function getReleases($project_id)
	{
		$id = Capsule::table('project_release as pr')
			  ->select('pr.project_release_id as id', 'pr.release_name as rname')
			  ->join('project_release_association as pra', 'pra.release_id', '=', 'pr.project_release_id')
			  ->join('project as p', 'p.project_id', '=' ,'pra.project_id')
			  ->where('p.project_id', '=', $project_id)
			  ->get();
		return $id;
	}

	protected function getReleases_($project_id) {

		$id = Capsule::table('project_release as pr')
			  ->select('pr.project_release_id as id', 'pr.release_name as rname')
			  ->join('project_release_association as pra', 'pra.release_id', '=', 'pr.project_release_id')
			  ->join('project as p', 'p.project_id', '=' ,'pra.project_id')
			  ->where('p.project_id', '=', $project_id)
			  ->where('pra.association_type', '=', 'smoketest')
			  ->get();

		return $id;

	}


	protected function getReleaseID_($projectID, $releaseName) {

		$releaseID = Capsule::table('project_release as pr')
					-> select('pr.project_release_id')
					-> leftjoin('project_release_association as pra', 'pr.project_release_id', '=', 'pra.release_id')
					-> leftjoin('project as p', 'p.project_id', '=', 'pra.project_id')
					-> where('pr.release_name', '=', $releaseName)
					-> where('p.project_id', '=', $projectID)
					-> where('pra.association_type', '=', 'smoketest')
					-> pluck('pr.project_release_id');

		return $releaseID;

	}
}

?>