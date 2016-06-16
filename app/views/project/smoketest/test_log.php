<?php
	$component_summary = $data['component_summary'];
	$test_logs = $data['test_logs'];
	$project = $data['project'];
	$release_name = $data['release_name'];
	$browser_name = $data['browser_name'];
	$component = $data['component'];
	$allFail = $data['all_fail'];
	echo "<script>console.log('Displaying')</script>";
	echo "<script>console.log('" . $component_summary['totalScenario'] . "')</script>";
	echo "<script>console.log('" . $component_summary['totalTestCase'] . "')</script>";
	foreach($test_logs as $tc_id=>$ts_id) {
		foreach($ts_id as $ts) {
			echo "<script>console.log('" . $ts['tc_id'] . '_' . $ts['ts_id'] . "')</script>";
		}
	}
?>

<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>ISS | Test Logs</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<base href="<?= $data['bhref'] ?>">
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
<link href="assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<!-- DOC: To use 'material design' style just load 'components-md.css' stylesheet instead of 'components.css' in the below style tag -->
<link href="assets/global/css/components-md.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout6/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout6/css/custom.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
<style>
.colorwhite
{
	color:white;
}

.colorblack
{
	color:black;
}
</style>

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-md page-header-fixed page-quick-sidebar-over-content page-style-rounded">

	<!-- BEGIN MAIN LAYOUT -->
	<div class="page-header md-shadow-z-1-i navbar navbar-fixed-top" >
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="index.html">
			<img src="assets/admin/layout/img/logo.png" alt="logo" class="logo-default"/>
			</a>
			<div class="menu-toggler sidebar-toggler hide">
				<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<div class="top-menu" >
			<ul class="nav navbar-nav pull-right">
				<!-- BEGIN NOTIFICATION DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<i class="icon-bell"></i>
					<span class="badge badge-default">
					7 </span>
					</a>
					<ul class="dropdown-menu">
						<li class="external">
							<h3><span class="bold">12 pending</span> notifications</h3>
							<a href="extra_profile.html">view all</a>
						</li>
						<li>
							<ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
								<li>
									<a href="javascript:;">
									<span class="time">just now</span>
									<span class="details">
									<span class="label label-sm label-icon label-success">
									<i class="fa fa-plus"></i>
									</span>
									New user registered. </span>
									</a>
								</li>
								<li>
									<a href="javascript:;">
									<span class="time">3 mins</span>
									<span class="details">
									<span class="label label-sm label-icon label-danger">
									<i class="fa fa-bolt"></i>
									</span>
									Server #12 overloaded. </span>
									</a>
								</li>
								<li>
									<a href="javascript:;">
									<span class="time">10 mins</span>
									<span class="details">
									<span class="label label-sm label-icon label-warning">
									<i class="fa fa-bell-o"></i>
									</span>
									Server #2 not responding. </span>
									</a>
								</li>
								<li>
									<a href="javascript:;">
									<span class="time">14 hrs</span>
									<span class="details">
									<span class="label label-sm label-icon label-info">
									<i class="fa fa-bullhorn"></i>
									</span>
									Application error. </span>
									</a>
								</li>
								<li>
									<a href="javascript:;">
									<span class="time">2 days</span>
									<span class="details">
									<span class="label label-sm label-icon label-danger">
									<i class="fa fa-bolt"></i>
									</span>
									Database overloaded 68%. </span>
									</a>
								</li>
								<li>
									<a href="javascript:;">
									<span class="time">3 days</span>
									<span class="details">
									<span class="label label-sm label-icon label-danger">
									<i class="fa fa-bolt"></i>
									</span>
									A user IP blocked. </span>
									</a>
								</li>
								<li>
									<a href="javascript:;">
									<span class="time">4 days</span>
									<span class="details">
									<span class="label label-sm label-icon label-warning">
									<i class="fa fa-bell-o"></i>
									</span>
									Storage Server #4 not responding dfdfdfd. </span>
									</a>
								</li>
								<li>
									<a href="javascript:;">
									<span class="time">5 days</span>
									<span class="details">
									<span class="label label-sm label-icon label-info">
									<i class="fa fa-bullhorn"></i>
									</span>
									System Error. </span>
									</a>
								</li>
								<li>
									<a href="javascript:;">
									<span class="time">9 days</span>
									<span class="details">
									<span class="label label-sm label-icon label-danger">
									<i class="fa fa-bolt"></i>
									</span>
									Storage server failed. </span>
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</li>
				<!-- END NOTIFICATION DROPDOWN -->
				<!-- BEGIN INBOX DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<i class="icon-envelope-open"></i>
					<span class="badge badge-default">
					4 </span>
					</a>
					<ul class="dropdown-menu">
						<li class="external">
							<h3>You have <span class="bold">7 New</span> Messages</h3>
							<a href="page_inbox.html">view all</a>
						</li>
						<li>
							<ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
								<li>
									<a href="inbox.html?a=view">
									<span class="photo">
									<img src="assets/admin/layout3/img/avatar2.jpg" class="img-circle" alt="">
									</span>
									<span class="subject">
									<span class="from">
									Lisa Wong </span>
									<span class="time">Just Now </span>
									</span>
									<span class="message">
									Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
									</a>
								</li>
								<li>
									<a href="inbox.html?a=view">
									<span class="photo">
									<img src="assets/admin/layout3/img/avatar3.jpg" class="img-circle" alt="">
									</span>
									<span class="subject">
									<span class="from">
									Richard Doe </span>
									<span class="time">16 mins </span>
									</span>
									<span class="message">
									Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
									</a>
								</li>
								<li>
									<a href="inbox.html?a=view">
									<span class="photo">
									<img src="assets/admin/layout3/img/avatar1.jpg" class="img-circle" alt="">
									</span>
									<span class="subject">
									<span class="from">
									Bob Nilson </span>
									<span class="time">2 hrs </span>
									</span>
									<span class="message">
									Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
									</a>
								</li>
								<li>
									<a href="inbox.html?a=view">
									<span class="photo">
									<img src="assets/admin/layout3/img/avatar2.jpg" class="img-circle" alt="">
									</span>
									<span class="subject">
									<span class="from">
									Lisa Wong </span>
									<span class="time">40 mins </span>
									</span>
									<span class="message">
									Vivamus sed auctor 40% nibh congue nibh... </span>
									</a>
								</li>
								<li>
									<a href="inbox.html?a=view">
									<span class="photo">
									<img src="assets/admin/layout3/img/avatar3.jpg" class="img-circle" alt="">
									</span>
									<span class="subject">
									<span class="from">
									Richard Doe </span>
									<span class="time">46 mins </span>
									</span>
									<span class="message">
									Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</li>
				<!-- END INBOX DROPDOWN -->
				<!-- BEGIN TODO DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<i class="icon-calendar"></i>
					<span class="badge badge-default">
					3 </span>
					</a>
					<ul class="dropdown-menu extended tasks">
						<li class="external">
							<h3>You have <span class="bold">12 pending</span> tasks</h3>
							<a href="page_todo.html">view all</a>
						</li>
						<li>
							<ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
								<li>
									<a href="javascript:;">
									<span class="task">
									<span class="desc">New release v1.2 </span>
									<span class="percent">30%</span>
									</span>
									<span class="progress">
									<span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">40% Complete</span></span>
									</span>
									</a>
								</li>
								<li>
									<a href="javascript:;">
									<span class="task">
									<span class="desc">Application deployment</span>
									<span class="percent">65%</span>
									</span>
									<span class="progress">
									<span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">65% Complete</span></span>
									</span>
									</a>
								</li>
								<li>
									<a href="javascript:;">
									<span class="task">
									<span class="desc">Mobile app release</span>
									<span class="percent">98%</span>
									</span>
									<span class="progress">
									<span style="width: 98%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">98% Complete</span></span>
									</span>
									</a>
								</li>
								<li>
									<a href="javascript:;">
									<span class="task">
									<span class="desc">Database migration</span>
									<span class="percent">10%</span>
									</span>
									<span class="progress">
									<span style="width: 10%;" class="progress-bar progress-bar-warning" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">10% Complete</span></span>
									</span>
									</a>
								</li>
								<li>
									<a href="javascript:;">
									<span class="task">
									<span class="desc">Web server upgrade</span>
									<span class="percent">58%</span>
									</span>
									<span class="progress">
									<span style="width: 58%;" class="progress-bar progress-bar-info" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">58% Complete</span></span>
									</span>
									</a>
								</li>
								<li>
									<a href="javascript:;">
									<span class="task">
									<span class="desc">Mobile development</span>
									<span class="percent">85%</span>
									</span>
									<span class="progress">
									<span style="width: 85%;" class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">85% Complete</span></span>
									</span>
									</a>
								</li>
								<li>
									<a href="javascript:;">
									<span class="task">
									<span class="desc">New UI release</span>
									<span class="percent">38%</span>
									</span>
									<span class="progress progress-striped">
									<span style="width: 38%;" class="progress-bar progress-bar-important" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">38% Complete</span></span>
									</span>
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</li>
				<!-- END TODO DROPDOWN -->
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<li class="dropdown dropdown-user">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<img alt="" class="img-circle" src="assets/admin/layout/img/avatar.png"/>
					<span class="username username-hide-on-mobile">
					<?= $_SESSION['first_name'] ?></span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-default">
						<li>
							<a href="extra_profile.html">
							<i class="icon-user"></i> My Profile </a>
						</li>
						<li>
							<a href="page_calendar.html">
							<i class="icon-calendar"></i> My Calendar </a>
						</li>
						<li>
							<a href="inbox.html">
							<i class="icon-envelope-open"></i> My Inbox <span class="badge badge-danger">
							3 </span>
							</a>
						</li>
						<li>
							<a href="page_todo.html">
							<i class="icon-rocket"></i> My Tasks <span class="badge badge-success">
							7 </span>
							</a>
						</li>
						<li class="divider">
						</li>
						<li>
							<a href="extra_lock.html">
							<i class="icon-lock"></i> Lock Screen </a>
						</li>
						<li>
							<a href="login.html">
							<i class="icon-key"></i> Log Out </a>
						</li>
					</ul>
				</li>
				<!-- END USER LOGIN DROPDOWN -->
				<!-- BEGIN QUICK SIDEBAR TOGGLER -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<li class="dropdown dropdown-quick-sidebar-toggler">
					<a href="javascript:;" class="dropdown-toggle">
					<i class="icon-logout"></i>
					</a>
				</li>
				<!-- END QUICK SIDEBAR TOGGLER -->
			</ul>
		</div>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->

	<!-- PAGE CONTENT BEGIN -->
    <div class="container-fluid" style='margin-top:-18px'>
    	<div class="page-content page-content-popup">
    		<!-- BEGIN PAGE CONTENT FIXED -->
			<div class="page-content-fixed-header">
				<ul class="page-breadcrumb">
					<li><a href="Project/index">Projects</a></li>
					<li><a href="Project/Project_Main/<?= $project ?>"><?= $project ?></a></li>
					<li><a href="SmokeTest/Releases/<?= $project . "/". $release_name?>"><?= $release_name ?></a></li>
					<li><a href="SmokeTest/Browser/<?= $project . "/". $release_name."/".urlencode($browser_name)?>"><?= $browser_name ?></a></li>
					<li><a href="SmokeTest/Component/<?= $project . "/". $release_name."/".urlencode($browser_name)?>"><?php
					if(!$component == "") {
						echo $component;
					} else {
						echo "View Failed";
					}
					?></a></li>
					<li>Test Logs</li>
				</ul>

			</div>

			<!-- BEGIN SIDEBAR -->
			<div class="page-sidebar-wrapper">
				<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
				<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
				<div class="page-sidebar navbar-collapse collapse">
					<!-- BEGIN SIDEBAR MENU -->
					<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
					<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
					<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
					<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
					<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
					<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
					<ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">

						<li class="">
							<a href="javascript:;">
							<i class="icon-home"></i>
							<span class="title">Home</span>
							<span class="arrow "></span>
							</a>
							<ul class="sub-menu">
							<li class=""><a href="Home/Dashboard"><i class="fa fa-angle-double-right"></i>Dashboard</a></li>
							<li class=""><a href="Home/Tasks"><i class="fa fa-angle-double-right"></i>My Tasks</a></li>
							</ul>
						</li>

						<li class="active">
							<a href="javascript:;">
							<i class="icon-layers"></i>
							<span class="title">Projects</span>
							<span class="arrow "></span>
							</a>
							<ul class="sub-menu">
							<li><a href="Project/AddProject"><i class="fa fa-plus"></i>Add New Project</a></li>
							<?php

							foreach($data['projects'] as $projects)
							{
								$s_active = ($projects == $project) ? "active" : "";
								$project_href = 'Project/Project_Main/' . urlencode($projects);
								echo "<li class='".$s_active."'><a href='".$project_href."'><i class='fa fa-angle-double-right'></i>".$projects."</a></li>";
							}

							?>
							</ul>
						</li>
					</ul>

					<!-- END SIDEBAR MENU -->
				</div>
			</div>
			<!-- END SIDEBAR -->

			<div class="page-fixed-main-content">
					<div class="col-md-12">
						<div class="navbar navbar-default" role="navigation">
						<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header">
								<a class="navbar-brand" href="javascript:;">
								RecoverMax</a>
							</div>
							<!-- Collect the nav links, forms, and other content for toggling -->
						</div>
					</div>

					<div class="col-md-12 ">
						<div class="portlet box blue" >
							<div class="portlet-title">
								<div class="caption">
									RecoverMaxApplication
								</div>
							</div>
							<div class="portlet-body">
								<table class="table table-bordered table-condensed" id="summary_table" style="margin-bottom:10px">
									<thead>
										<tr>
											<th class=""># of Test Cases</th>
											<th class=""># of Scenarios</th>
											<th class="success">Passed</th>
											<th class="danger">Failed</th>
											<th class="bg-yellow-saffron">Pending</th>
											<th class="bg-default">Not Started</th>
											<th class="">Test Completion</th>
										</tr>
									</thead>
									<tbody>
									<?php
										if(!$component_summary['totalScenario'] == 0) {
											echo "<tr>
												  <td>".$component_summary['totalTestCase']."</td>
												  <td>".$component_summary['totalScenario']."</td>
												  <td>".$component_summary['totalPass']."</td>
												  <td>".$component_summary['totalFail']."</td>
												  <td>".$component_summary['totalPending']."</td>
												  <td>".$component_summary['totalNotStarted']."</td>
												  <td>".round(((($component_summary['totalPass']+$component_summary['totalFail'])/$component_summary['totalScenario'])*100))."%</td>";
										} else {
											echo "<tr><td colspan='7'><h5 class='text-center'>No More Failing Test Cases. Go back to <a href='SmokeTest/Component/".$project. "/". $release_name."/".urlencode($browser_name)."' style='text-decoration:underline'>Components</a>?</h5></td></tr>";
										}
									?>
									</tbody>
								</table>
							</div>
						</div>
					</div>

				<div class="col-md-3">
					<ul class="ver-inline-menu tabbable margin-bottom-10">
						<?php
						$ctr = 1 ;
						foreach($test_logs as $tc_id=>$ts_id)
						{
							if ($ctr== 1)
							{
								$active = "active";
							}
							else
							{
								$active = "";
							}
							echo "<li class='".$active."'>
									<a data-toggle='tab' href='#tab-".$tc_id."'>
									<i class='fa fa-circle'></i>".$tc_id."</a>
									<span class='after'>
									</span>
								</li>";
								$ctr++;
						}

						?>


					</ul>
				</div>
				<div class="col-md-9">

					<div class="tab-content">
				<?php
					$ctr = 1 ;
					foreach($test_logs as $tc_id=>$ts_id)
					{

						if ($ctr== 1)
						{
							$active = "active";
						}
						else
						{
							$active = "";
						}

						echo "<div id='tab-".$tc_id."' class='tab-pane ".$active."'>
								<div id='accordion-".$tc_id."' class='panel-group'>";
						$ctr2 = 1 ;
						foreach($ts_id as $ts)
						{
							$panel_color = "";
							$style = "";
							$pass ="";
							$fail="";
							$pending="";

							switch($ts['status'])
							{
								case "Not Started": $panel_color = "panel-default"; $style= "colorblack" ;break;
								case "PASSED": $panel_color = "panel-success";$style= "colorwhite" ; $pass='checked'; break;
								case "FAILED": $panel_color = "panel-danger";$style= "colorwhite" ; $fail='checked'; break;
								case "PENDING": $panel_color = "panel-warning"; $style= "colorwhite" ; $pending='checked'; break;
								default : $panel_color = "default";
							}
							if ($ctr2== 1)
							{
								$in = "in";
							}
							else
							{
								$in = "";
							}
							echo "<div class='panel ".$panel_color."' id='panel-".$ts['tc_id'] ."-".$ts['ts_id']."' >
									<div class='panel-heading' >
									<a class='accordion-toggle' data-toggle='collapse' style= 'text-decoration:none' data-parent='#accordion-".$ts['tc_id']."' href='#".$ts['tc_id'] ."-".$ts['ts_id']."'>
										<h4 id='h4-".$ts['tc_id'] ."-".$ts['ts_id']."' class='panel-title ".$style."' ><strong>
										".$ts['tc_id'] ."-".$ts['ts_id']."
										<span class='pull-right status'>Status: ".$ts['status']."</span></strong></h4>
									</a>
									</div>
									<div id='".$ts['tc_id'] ."-".$ts['ts_id']."' class='panel-collapse collapse ".$in."'>
										<div class='panel-body'>
											<div class='col-md-9'>
											<table class='table'>
												<thead>
													<tr>

														<th>Test Steps</th>
														<th>Expected Result</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td width='50%'>".nl2br($ts['test_steps'])."</td>
														<td width='50%'>".nl2br($ts['expected_results'])."</td>
													</tr>
												</tbody>
											</table>
											</div>
											<div class='col-md-3'>
											<form method='post' class='update_test' action='SmokeTest/updateTestLog'>
												<div class='form-group form'>


										<label class='control-label'>Jira ID:</label>

											<select class='form-control margin-bottom-10 ddselect' data-placeholder='None By Default'>
												<option value=''></option>
												<option value='AL'>None</option>
												<option value='AL'>To Be Updated</option>
												<option value='WY'>SCAS-1234</option>
												<option value='WY'>SCAS-5678</option>
												<option value='WY'>SCAS-1242</option>
											</select>

									<label class='control-label'>Actual Results:</label>

									<a class='fancybox fancybox-button' href='' id='preview' data-rel='fancybox-button'><img src ='' id='uploadPreview' class='img-responsive' /></a>
									<input type='file'>


									<label class='control-label'>Comments:</label>
									<textarea class='form-control' style='resize:none' rows='5'>[11/1/2015] Ed: This is the comment section
									</textarea>
									</div>
											<input type='hidden' id ='status_value' name='status_value' value=''>
											<input type='hidden'  name='panel_id' value='panel-".$ts['tc_id'] ."-".$ts['ts_id']."'>
											<input type='hidden'  name='h4color' value='h4-".$ts['tc_id'] ."-".$ts['ts_id']."'>
											<input type='hidden'  name='component' value='".$ts['component_name']."'>
											<input type='hidden' name='pr_id' value='".$ts['pr_id']."'>
											<input type='hidden' name='b_id' value='".$ts['b_id']."'>
											<input type='hidden' name='tcd_id' value='".$ts['tcd_id']."'>
											<input type='hidden' name='all_fail_' value='".$allFail."'>
											<input type='hidden' name='location' value='".$_SERVER['REQUEST_URI']."'>
												<div class='btn-group margin-bottom-10'>
													<label class='btn btn-danger ' >
													<input type='radio' name='status_radio' class='toggle' value='FAILED' ".$fail."> Fail </label>
													<label class='btn btn-success '>
													<input type='radio' name='status_radio' class='toggle' value='PASSED'".$pass."> Pass </label>
													<label class='btn yellow-saffron ' >
													<input type='radio' name='status_radio' class='toggle' value='PENDING' ".$pending."> Pending </label>
												</div>
												<button type='submit' class='btn blue btn-block'>Apply Changes</button>
												</form>
											</div>
										</div>
									</div>

								</div>";
							$ctr2++;

						}


							echo "	</div></div>";
							$ctr++;
					}
					?>



						</div>
					</div>
			</div>
    		<!-- END PAGE CONTENT FIXED -->
    		<!-- Copyright BEGIN -->
			<p class="copyright-v2">2015 © ISS. </p>
			<!-- Copyright END -->
    	</div>
    </div>
	<!-- PAGE CONTENT END -->
    <!-- END MAIN LAYOUT -->
    <a  class="go2top"><i class="icon-arrow-up"></i></a>

<?php
	include "/../../../loading.php";
?>

<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/global/plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="assets/admin/layout6/scripts/layout.js" type="text/javascript"></script>
<script src="assets/admin/layout6/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="assets/admin/layout6/scripts/index.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/table-advanced.js"></script>
<script src="assets/admin/pages/scripts/loading.js"></script>

<!-- END PAGE LEVEL SCRIPTS -->
<script>

jQuery(document).ready(function() {
   	Metronic.init(); // init metronic core componets
   	Layout.init(); // init layout
});

$('.ddselect').select2();

var body = $('html, body');

$('.go2top').click(function(e){
        e.preventDefault();
        body.animate({scrollTop:0}, '500', 'swing');
});

$(".update_test" ).on( "submit", function( event ) {
	event.preventDefault();
	openModal();
    $.ajax({
		type: "POST",
        url: $(this).attr('action'),
        data: $(this).serializeArray(),
        success: function(data) {
        	
		}
	});

	$.ajax({
		type: "GET",
		url: 'SmokeTest/updateSummary',
		data: $(this).serializeArray(),
		success: function(data) {
			console.log('updating summary: ');
			$('#summary_table tbody').empty();
			$('#summary_table tbody').html(data);
		}
	});

	$.ajax({
		type: "GET",
		url: 'SmokeTest/updatePanel',
		data: $(this).serializeArray(),
		dataType:'json',
		success: function(data) {
			closeModal();
			var status = data[0].status;
			var panel_id = data[0].panel_id;
			var h4color = data[0].h4color;
			var panel_color = "";
			var style = "";

			switch(status) {
				case "Not Started":
					panel_color = "panel-default";
					style= "colorblack";
					break;
				case "PASSED":
					panel_color = "panel-success";
					style = "colorwhite";
					break;
				case "FAILED":
					panel_color = "panel-danger";
					style = "colorwhite";
					break;
				case "PENDING":
					panel_color = "panel-warning";
					style = "colorwhite";
					break;
				default:
					panel_color = "default";
			}

			$('#' + panel_id).removeClass();
			$('#' + h4color).removeClass();
			$('#' + panel_id).addClass('panel');
			$('#' + panel_id).addClass(panel_color);
			$('#' + h4color).addClass('panel-title');
			$('#' + h4color).addClass(style);
			$('#' + panel_id + ' .status').text('Status: ' + status);
			console.log(data[0].status);
			console.log(data[0].panel_id);
			//location.reload();
		}
	});
});

</script>
<!-- END JAVASCRIPTS -->

</body>

<!-- END BODY -->
</html>
