<?php
	$project = $data['project'];
	$component_summary = $data['component_summary'];
	$test_cases = $data['test_cases'];
	$jira_list = $data['jira_list'];
	$jira_test_cases = $data['jira_test_cases'];
	$isEmpty = $data['isEmpty'];
	echo "<script>console.log('" . count($jira_list) . "')</script>";
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
<title>ISS | <?php echo $project ?></title>
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
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
<link href="assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE STYLES -->
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
			<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"></a>
			<!-- END RESPONSIVE MENU TOGGLER -->
			<!-- BEGIN TOP NAVIGATION MENU -->
			<div class="top-menu" >
				<ul class="nav navbar-nav pull-right">
					<!-- BEGIN NOTIFICATION DROPDOWN -->
					<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
					<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<i class="icon-bell"></i>
							<span class="badge badge-default"> 7 </span>
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
									foreach($data['projects'] as $projects) {
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
							<?php echo $project ?></a>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse navbar-ex1-collapse">
							<ul class="nav navbar-nav navbar-right">
								<li class="active">
									<a href="Project/Project_Main/<?= $project ?>">Main</a>
								</li>
								<li>
									<a href="SmokeTest/Releases/<?= $project ?>">Smoke Test</a>
								</li>
								<li>
									<a href="Jira/Releases/<?= $project ?>">Jira </a>
								</li>
							</ul>
						</div>
						<!-- /.navbar-collapse -->
					</div>
				</div>
				<div class="col-md-12">
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-bar-chart  "></i>
								<span class="caption-subject bold uppercase">Overview</span>
							</div>
							<div class="tools">
								<a title="" data-original-title="" href="javascript:;" class="collapse">
								</a>
								<a title="" data-original-title="" href="javascript:;" class="fullscreen">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div class="tabbable-line">
								<ul class="nav nav-tabs">
									<li class="active">
										<a aria-expanded="true" href="#overview_1" data-toggle="tab">Smoke Test </a>
									</li>
									<li class="">
										<a aria-expanded="false" href="#overview_2" data-toggle="tab">Jira</a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="overview_1">
										<a onclick="exportSmokeTest(this);" <?php echo "data-projectname='" . $project . "'" ?>  class="btn btn-s blue" style="float:left;">Export Excel</a>
										<a href="Project/AutomationResults/<?= $project ?>" class="btn btn-s blue" style="float:right; margin-right:2px;">Automation Results</a>
										<a href="Project/ManageTestCases/<?= $project ?>/All" class="btn btn-s blue" style="float:right; margin-right:2px;">Manage Test Cases</a>
										<a href="Project/Manage/<?= $project ?>" class="btn btn-s blue" style="float:right; margin-right:2px;">Manage Project</a>
										<br><br><br>
										<div class="">
											<table class="table table-striped  table-hover table-bordered multiple" id = "one">
												<thead>
													<tr>
														<th>Component</th>
														<th>Test Cases</th>
														<th># of Test Scenarios</th>
														<th>Manual</th>
														<th>Automation</th>
													</tr>
												</thead>
												<tbody>
													<?php
														foreach($component_summary as $cs) {
															echo "<tr>
																	<td><a style='text-decoration:underline' onclick='assignComponent(this)' data-toggle='modal' href='#large_" . $cs['component_id'] . "' data-component_id = '" . $cs['component_id'] . "' data-component_name='" . $cs['component_name'] . "'>" . $cs['component_name'] . "</a></td>
																	<td>" . $cs['tc_id_count'] . "</td>
																	<td>" . $cs['ts_id_count'] . "</td>
																	<td>" . ($cs['ts_id_count'] - $cs['automation_count']) . "</td>
																	<td>" . $cs['automation_count'] . "</td>
																</tr>";
														}
													?>
												</tbody>
											</table>
										</div>
									</div>
									<div class="tab-pane" id="overview_2">
										<a onclick="exportJira(this);" <?php echo "data-projectname='" . $project . "'" ?> class="btn btn-s blue" style="float:left;"></i>Export Excel</a>
										<a href="Project/AutomationResults/<?= $project ?>" class="btn btn-s blue" style="float:right; margin-right:2px;">Automation Results</a>
										<a href="Project/ManageTestCases/<?= $project ?>/All" class="btn btn-s blue" style="float:right; margin-right:2px;">Manage Test Cases</a>
										<a href="Project/Manage/<?= $project ?>" class="btn btn-s blue" style="float:right; margin-right:2px;">Manage Project</a>
										<br><br><br>
										<div class="">
											<table class="table table-striped  table-hover table-bordered multiple" id = "two">
												<thead>
													<tr>
														<th>Ticket</th>
														<th>Release</th>
														<th>Summary</th>
														<th>Component</th>
														<th>QBIT Status</th>
														<th>JIRA Status</th>
													</tr>
												</thead>
												<tbody>
													<?php
														foreach($jira_list as $jl) {
															$jiraStatus = $jl['jira_status'];
															$QBITStatus = $jl['qbit_status'];

															if($QBITStatus == 'NotAssigned') {
																$QBITStatus = "Not Assigned";
															} elseif($QBITStatus == 'NotYetScheduled') {
																$QBITStatus = "Not Yet Scheduled";
															} elseif($QBITStatus == 'TCCreationNotStarted') {
																$QBITStatus = "Creation Not Started";
															} elseif($QBITStatus == 'TCCreationInProgress') {
																$QBITStatus = "Creation In Progress";
															} elseif($QBITStatus == 'TCCreationCompletedForReview') {
																$QBITStatus = "Creation for Review";
															} elseif($QBITStatus == 'TCExecutionNotStarted') {
																$QBITStatus = "Execution Not Started";
															} elseif($QBITStatus == 'TCExecutionInProgress') {
																$QBITStatus = "Execution In Progress";
															} elseif($QBITStatus == 'TCExecutionCompletedForReview') {
																$QBITStatus = "Execution for Review";
															} elseif($QBITStatus == 'ForSignOff') {
																$QBITStatus = "For SignOff";
															}
															//if($jiraStatus == "Closed" || $jiraStatus == "Fixed") {
																echo "<tr>
																		<td><a style='text-decoration:underline' onclick='displayJiraTestCases(this)' data-toggle='modal' href='#large2_" . $jl['jira_ticket_id'] . "' data-ticket_name = '" . $jl['jira_pkey'] . "' data-ticket_id = '" . $jl['jira_ticket_id'] . "'>" . $jl['jira_pkey'] . "</a></td>
																		<td>" . $jl['release_name'] . "</td>
																		<td>" . $jl['summary'] . "</td>
																		<td>" . $jl['component'] . "</td>
																		<td>" . $QBITStatus . "</td>
																		<td>" . $jl['jira_status'] . "</td>
																	</tr>";
															//}
														}
													?>
												</tbody>
											</table>
										</div>
									</div>
									<div class="tab-pane" id="overview_3">
										<div class="table-responsive">
											Under Engineering.
										</div>
									</div>
								</div>
							</div>
						</div>
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
    <a href="#index" class="go2top"><i class="icon-arrow-up"></i></a>
	<!-- MODALS -->
	<?php
		$componentCounter = 0;
		foreach($component_summary as $cs) {
			echo '
				<div class="modal fade bs-modal-lg" id="large_' . $cs['component_id'] . '" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header green" id="assign_component_modal_title_' . $cs['component_id'] . '">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
								<h4 class="modal-title"></h4>
							</div>
							<div class="modal-body">
								<br><br>
								<table class="table table-striped table-bordered table-hover" id="smoke_test_test_case_table_' . $componentCounter . '">
									<thead>
										<tr class="success">
											<th>Test Case ID</th>
											<th>Test Case Name</th>
											<th>Test Scenario ID</th>
											<th>Test Scenario Name</th>
											<th>Scope</th>
											<th>Type</th>
											<th>Jira</th>
											<th>Manual</th>
											<th>Automation</th>
											<th>Test Status</th>
											<th>Date Last Change</th>
											<th>Tester</th>
											<th>Comment</th>
											<th>Reviewed</th>
											<th>Priority</th>
											<th>Date Reviewed</th>
											<th>Reviewer</th>
											<th>Comment</th>
											<th>Test Steps</th>
											<th>Expected Results</th>
											<th>Developed</th>
											<th>Date Finished</th>
											<th>Status</th>
											<th>Comment</th>
											<th>AT Script Location</th>
										</tr>
									</thead>
									<tbody>';
										foreach($test_cases as $tc) {
											if($tc['component_name'] == $cs['component_name']) {
												echo "<tr>
														<td>" . $tc['tc_id'] . "</td>
														<td>" . $tc['tc_name'] . "</td>
														<td>" . $tc['ts_id'] . "</td>
														<td>" . $tc['ts_name'] . "</td>
														<td>" . $tc['scope_of_test'] . "</td>
														<td>" . $tc['type_of_test'] . "</td>
														<td><a style='text-decoration:underline'>" . $tc['jira'] . "</a></td>";
														if($tc['manual_automation'] == 'Automation') {
															echo '<td></td>
																<td><i class="fa fa-check"></td>';
														} elseif($tc['manual_automation'] == 'Manual' || $tc['manual_automation'] == '') {
															echo '<td><i class="fa fa-check"></td>
																<td></td>';
														}
													$date_reviewed = (!$tc['date_reviewed'] == null)  ? $tc['date_reviewed']  : "Not Yet Reviewed" ;
													echo "
														<td>" . $tc['tc_status'] . "</td>
														<td>" . $tc['date_last_change'] . "</td>
														<td>" . $tc['tester'] . "</td>
														<td>" . $tc['tc_comments'] . "</td>
														<td>" . $tc['tc_reviewed'] . "</td>
														<td>" . $tc['priority'] . "</td>
														<td>" . $date_reviewed . "</td>
														<td>" . $tc['checker'] . "</td>
														<td>" . "comment" . "</td>
														<td><textarea style='resize:none; width: 100%; height:auto; overflow:auto; border: none; background-color:transparent;' disabled wrap='hard' rows = '15'>" . $tc['test_steps'] . "</textarea></td>
														<td><textarea style='resize:none; width: 100%; height:auto; overflow:auto; border: none; background-color:transparent;' disabled wrap='hard' rows = '15'>" . $tc['expected_results'] . "</textarea></td>
														<td>" . $tc['developer'] . "</td>
														<td>" . $tc['date_finished'] . "</td>
														<td>" . $tc['automation_status'] . "</td>
														<td></td>
														<td>" . $tc['at_script_location'] . "</td>
													";
												echo "</tr>";
											}
										}
									echo '</tbody>
								</table>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn default" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>';
			
			$componentCounter++;
		}
	?>

	<?php
		$jiraCounter = 0;
		foreach($jira_list as $jl) {
			echo '
				<div class="modal fade bs-modal-lg" id="large2_' . $jl['jira_ticket_id'] . '" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header green" id="assign_jira_modal_title_' . $jl['jira_ticket_id'] . '">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
								<h4 class="modal-title"></h4>
							</div>
							<div class="modal-body">
								<br><br>
								<table class="table table-striped table-bordered table-hover" id="jira_test_case_table_' . $jiraCounter . '">
									<thead>
										<tr class="success">
											<th>Test Case ID</th>
											<th>Test Case Name</th>
											<th>Test Scenario ID</th>
											<th>Test Scenario Name</th>
											<th>Scope</th>
											<th>Type</th>
											<th>Manual</th>
											<th>Automation</th>
											<th>Test Status</th>
											<th>Date Last Change</th>
											<th>Tester</th>
											<th>Comment</th>
											<th>Reviewed</th>
											<th>Priority</th>
											<th>Date Reviewed</th>
											<th>Reviewer</th>
											<th>Comment</th>
											<th>Test Steps</th>
											<th>Expected Results</th>
											<th>Developed</th>
											<th>Date Finished</th>
											<th>Status</th>
											<th>Comment</th>
											<th>AT Script Location</th>
										</tr>
									</thead>
									<tbody>';
										foreach($jira_test_cases as $jtc) {
											if($jtc['jira_ticket_id'] == $jl['jira_ticket_id']) {
												echo '<tr>
														<td>' . $jtc['tc_id'] . '</td>
														<td>' . $jtc['tc_name'] . '</td>
														<td>' . $jtc['ts_id'] . '</td>
														<td>' . $jtc['ts_name'] . '</td>
														<td>' . $jtc['scope_of_test'] . '</td>
														<td>' . $jtc['type_of_test'] . '</td>';
														if($jtc['manual_automation'] == 'Manual') {
															echo '<td><i class="fa fa-check"></td>
																<td></td>';
														} elseif($jtc['manual_automation'] == 'Automation') {
															echo '<td></td>
																<td><i class="fa fa-check"></td>';
														}
														$date_reviewed = (!$jtc['date_reviewed'] == null)  ? $jtc['date_reviewed']  : "Not Yet Reviewed" ;
														echo "
															<td>" . $jtc['tc_status'] . "</td>
															<td>" . $jtc['date_last_change'] . "</td>
															<td>" . $jtc['tester'] . "</td>
															<td>" . $jtc['tc_comments'] . "</td>
															<td>" . $jtc['tc_reviewed'] . "</td>
															<td>" . $jtc['priority'] . "</td>
															<td>" . $date_reviewed . "</td>
															<td>" . $jtc['checker'] . "</td>
															<td>" . "comment" . "</td>
															<td><textarea style='resize:none; width: 100%; height:auto; overflow:auto; border: none; background-color:transparent;' disabled wrap='hard' rows = '15'>" . $jtc['test_steps'] . "</textarea></td>
															<td><textarea style='resize:none; width: 100%; height:auto; overflow:auto; border: none; background-color:transparent;' disabled wrap='hard' rows = '15'>" . $jtc['expected_results'] . "</textarea></td>
															<td>" . $jtc['developer'] . "</td>
															<td>" . $jtc['date_finished'] . "</td>
															<td>" . $jtc['automation_status'] . "</td>
															<td>comment</td>
															<td>" . $jtc['at_script_location'] . "</td>
														";
												echo '</tr>';
											}
										}
									echo '</tbody>
								</table>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn default" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>';

			$jiraCounter++;
		}
	?>

<?php
	include "/../../../loading.php";
?>

<!-- END MODALS -->
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
<script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
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
	TableAdvanced.init();
	var jiraCount = "<?php echo count($jira_list) ?>";
	var componentCount = "<?php echo count($component_summary)?>";
	console.log("Jira Count: " + jiraCount);
	console.log("Component Count: " + componentCount);

	for($i = 0; $i < jiraCount; $i++) {
		initTable_JiraTestCases($i);
	}

	for($i = 0; $i < componentCount; $i++) {
		initTable_SmokeTest($i);
	}
});

function exportSmokeTest(identifier) {
	var project_name = $(identifier).data('projectname');
	
	openModal();
	$.ajax({
		url : "SmokeTest/exportSmokeTest",
		type : "POST",
		data : {
			project_name : project_name
		},
		success : function(response) {
			closeModal();
			alert(response);
		},
		error : function(response) {
			closeModal();
			alert(response);
		}
	});
}

function exportJira(identifier) {
	var project_name = $(identifier).data('projectname');
	openModal();
	$.ajax({
		url : "Project/exportProjectJira",
		type : "POST",
		data : {
			project_name : project_name
		},
		success : function(response) {
			closeModal();
			alert(response);
		},
		error : function(response) {
			closeModal();
			alert(response);
		}
	});
}

var initTable_JiraTestCases = function (i) {
	var table = $('#jira_test_case_table_' + i);
		$.extend(true, $.fn.DataTable.TableTools.classes, {
		"container": "btn-group tabletools-dropdown-on-portlet",
		"buttons": {
			"normal": "btn btn-md default",
			"disabled": "btn btn-md default disabled"
		},
		"collection": {
			"container": "DTTT_dropdown dropdown-menu tabletools-dropdown-menu"
		}
	});

	/* Formatting function for row details */
	function fnFormatDetails(oTable, nTr) {
		var aData = oTable.fnGetData(nTr);
		var sOut = "<div style='margin-top:10px'><div class='col-md-3'>" ;
		sOut += "<table class='table table-bordered table-striped'>";
		sOut += '<thead>';
		sOut += '<tr><th>Status</th> <th></th></tr>';
		sOut += '</thead>';
		sOut += '<tbody>';

		sOut += "<tr><td>Status</td> <td>" + aData[9] + "</td></tr>";
		sOut += '<tr><td>Date Last Change</td> <td>' + aData[10] + '</td></tr>';
		sOut += '<tr><td>Tester</td> <td>' + aData[11] + '</td></tr>';
		sOut += '<tr><td>Comment</td> <td>' + aData[12] + '</td></tr>';
		sOut += '</tbody>';
		sOut += '</table>';

		sOut += "<table class='table table-bordered table-striped'>";
		sOut += '<thead>';
		sOut += '<tr><th>Checker</th> <th></th></tr>';
		sOut += '</thead>';
		sOut += '<tbody>';
		sOut += '<tr><td>Reviewed</td> <td>' + aData[13] + '</td></tr>';
		sOut += '<tr><td>Priority</td> <td>' + aData[14] + '</td></tr>';
		sOut += '<tr><td>Date Reviewed</td> <td>' + aData[15] + '</td></tr>';
		sOut += '<tr><td>Reviewer</td> <td>' + aData[16] + '</td></tr>';
		sOut += '<tr><td>Comment</td> <td>' + aData[17] + '</td></tr>';
		sOut += '</tbody>';
		sOut += '</table>';
		sOut += '</div>';

		var sOut2 = "<div class='col-md-5'><table class='table table-bordered table-striped'>";
		sOut2 += '<thead>';
		sOut2 += '<tr><th>Procedure</th><th>Expected Results</th></tr>';
		sOut2 += '</thead>';
		sOut2 += '<tbody>';
		sOut2 += '<tr><td width=50%>' + aData[18] + '</td><td width=50%>' + aData[19] + '</td></tr>';
		sOut2 += '</tbody>';
		sOut2 += '</table></div>';

		var sOut3 = "<div style='margin-top:10px'><div class='col-md-4'><table class='table table-bordered table-striped'>";
		sOut3 += '<thead>';
		sOut3 += '<tr><th>Automation Details</th> <th></th></tr>';
		sOut3 += '</thead>';
		sOut3 += '<tbody>';
		sOut3 += '<tr><td>Developed</td> <td>' + aData[20] + '</td></tr>';
		sOut3 += '<tr><td>Date Finished</td> <td>' + aData[21] + '</td></tr>';
		sOut3 += '<tr><td>Status</td> <td>' + aData[22] + '</td></tr>';
		sOut3 += '<tr><td>Comment</td><td>' + aData[23] + '</td></tr>';
		sOut3 += '<tr><td>AT Script Location</td> <td>' + aData[24] + '</td></tr>';
		sOut3 += '</tbody>';
		sOut3 += '</table></div>';

		return sOut + sOut2 + sOut3;
	}

	/*
	 * Insert a 'details' column to the table
	 */
	var nCloneTh = document.createElement('th');
	nCloneTh.className = "table-checkbox";

	var nCloneTd = document.createElement('td');
	nCloneTd.innerHTML = '<span class="row-details row-details-close"></span>';

	table.find('thead tr').each(function () {
		this.insertBefore(nCloneTh, this.childNodes[0]);
	});

	table.find('tbody tr').each(function () {
		this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
	});

	/*
	 * Initialize DataTables, with no sorting on the 'details' column
	 */
	var oTable = table.dataTable({
		// Internationalisation. For more info refer to http://datatables.net/manual/i18n
		"language": {
			"aria": {
				"sortAscending": ": activate to sort column ascending",
				"sortDescending": ": activate to sort column descending"
			},
			"emptyTable": "No data available in table",
			"info": "Showing _START_ to _END_ of _TOTAL_ entries",
			"infoEmpty": "No entries found",
			"infoFiltered": "(filtered1 from _MAX_ total entries)",
			"lengthMenu": "Show _MENU_ entries",
			"search": "Search:",
			"zeroRecords": "No matching records found"
		},
		destroy: true,
		"columnDefs": [
			{
				"orderable": false,
				"targets": [0]
			}, {
				"targets": [ 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24 ],
				"visible": false,
				"searchable": true
			}
		],
		"order": [
			[1, 'asc']
		],
		"lengthMenu": [
			[5, 10, 15, 20, -1],
			[5, 10, 15, 20, "All"] // change per page values here
		],
		// set the initial value
		"pageLength": 10,
		"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6' <'toolbar'>><'col-md-6'f>r><'table-scrollable't><'row'<'col-md-6 col-sm-12' l><'col-md-6 col-sm-12' p> <'col-md-5'><'col-md-6'i>>", // horizobtal scrollable datatable
		  // "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>"
		"tableTools": {
			"sSwfPath": "assets/global/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
			"aButtons": [
				{
					"sExtends": "text",
					"sButtonText": "Expand All",
					"fnClick": function ( button, config ) {
						$('tbody td .row-details').each( function() {
							if( !oTable.fnIsOpen( $(this).parents('tr')[0] ) ){
								$( this ).click();
							}
						})
					}
				}, {
					"sExtends": "text",
					"sButtonText": "Collapse All",
					"fnClick": function ( button, config ) {
						$('tbody td .row-details').each( function() {
							if( oTable.fnIsOpen( $(this).parents('tr')[0] ) ){
								$( this ).click();
							}
						})
					}
				}
			]
		}

	});

	var tableWrapper = $('#jira_test_case_table_' + i + '_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper

	tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown

	var nEditing = null;
	var nNew = false;

	/* Add event listener for opening and closing details
	 * Note that the indicator for showing which row is open is not controlled by DataTables,
	 * rather it is done here
	 */
	table.on('click', ' tbody td .row-details', function () {
		var nTr = $(this).parents('tr')[0];
		if (oTable.fnIsOpen(nTr)) {
			/* This row is already open - close it */
			$(this).addClass("row-details-close").removeClass("row-details-open");
			oTable.fnClose(nTr);
		} else {
			/* Open this row */
			$(this).addClass("row-details-open").removeClass("row-details-close");
			oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
		}
	});

	$('#enable').on('click', function () {
		$('tbody td .row-details').each( function() {
			if(!oTable.fnIsOpen( $(this).parents('tr')[0])) {
				$( this ).click();
			}
		});
		$('#jira_test_case_table_' + i + ' .editable').editable('toggleDisabled');
	});
}

var initTable_SmokeTest = function (i) {
	var table = $('#smoke_test_test_case_table_' + i);
	
	$.extend(true, $.fn.DataTable.TableTools.classes, {
		"container": "btn-group tabletools-dropdown-on-portlet",
		"buttons": {
			"normal": "btn btn-md default",
			"disabled": "btn btn-md default disabled"
		},
		"collection": {
			"container": "DTTT_dropdown dropdown-menu tabletools-dropdown-menu"
		}
	});

	/* Formatting function for row details */
	function fnFormatDetails(oTable, nTr) {
		var aData = oTable.fnGetData(nTr);
		var sOut = "<div style='margin-top:10px'><div class='col-md-3'>" ;
		sOut += "<table class='table table-bordered table-striped'>";
		sOut += '<thead>';
		sOut += '<tr><th>Status</th> <th></th></tr>';
		sOut += '</thead>';
		sOut += '<tbody>';

		sOut += "<tr><td>Status</td> <td>" + aData[10] + "</td></tr>";
		sOut += '<tr><td>Date Last Change</td> <td>' + aData[11] + '</td></tr>';
		sOut += '<tr><td>Tester</td> <td>' + aData[12] + '</td></tr>';
		sOut += '<tr><td>Comment</td> <td>' + aData[13] + '</td></tr>';
		sOut += '</tbody>';
		sOut += '</table>';

		sOut += "<table class='table table-bordered table-striped'>";
		sOut += '<thead>';
		sOut += '<tr><th>Checker</th> <th></th></tr>';
		sOut += '</thead>';
		sOut += '<tbody>';
		sOut += '<tr><td>Reviewed</td> <td>' + aData[14] + '</td></tr>';
		sOut += '<tr><td>Priority</td> <td>' + aData[15] + '</td></tr>';
		sOut += '<tr><td>Date Reviewed</td> <td>' + aData[16] + '</td></tr>';
		sOut += '<tr><td>Reviewer</td> <td>' + aData[17] + '</td></tr>';
		sOut += '<tr><td>Comment</td> <td>' + aData[18] + '</td></tr>';
		sOut += '</tbody>';
		sOut += '</table>';
		sOut += '</div>';

		var sOut2 = "<div class='col-md-5'><table class='table table-bordered table-striped'>";
		sOut2 += '<thead>';
		sOut2 += '<tr><th>Procedure</th><th>Expected Results</th></tr>';
		sOut2 += '</thead>';
		sOut2 += '<tbody>';
		sOut2 += '<tr><td width=50%>' + aData[19] + '</td><td width=50%>' + aData[20] + '</td></tr>';
		sOut2 += '</tbody>';
		sOut2 += '</table></div>';

		var sOut3 = "<div style='margin-top:10px'><div class='col-md-4'><table class='table table-bordered table-striped'>";
		sOut3 += '<thead>';
		sOut3 += '<tr><th>Automation Details</th> <th></th></tr>';
		sOut3 += '</thead>';
		sOut3 += '<tbody>';
		sOut3 += '<tr><td>Developed</td> <td>' + aData[21] + '</td></tr>';
		sOut3 += '<tr><td>Date Finished</td> <td>' + aData[22] + '</td></tr>';
		sOut3 += '<tr><td>Status</td> <td>' + aData[23] + '</td></tr>';
		sOut3 += '<tr><td>Comment</td><td>' + aData[24] + '</td></tr>';
		sOut3 += '<tr><td>AT Script Location</td> <td>' + aData[25] + '</td></tr>';
		sOut3 += '</tbody>';
		sOut3 += '</table></div>';

		return sOut + sOut2 + sOut3;
	}

	/*
	 * Insert a 'details' column to the table
	 */
	var nCloneTh = document.createElement('th');
	nCloneTh.className = "table-checkbox";

	var nCloneTd = document.createElement('td');
	nCloneTd.innerHTML = '<span class="row-details row-details-close"></span>';

	table.find('thead tr').each(function () {
		this.insertBefore(nCloneTh, this.childNodes[0]);
	});

	table.find('tbody tr').each(function () {
		this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
	});

	/*
	 * Initialize DataTables, with no sorting on the 'details' column
	 */
	var oTable = table.dataTable({
		// Internationalisation. For more info refer to http://datatables.net/manual/i18n
		"language": {
			"aria": {
				"sortAscending": ": activate to sort column ascending",
				"sortDescending": ": activate to sort column descending"
			},
			"emptyTable": "No data available in table",
			"info": "Showing _START_ to _END_ of _TOTAL_ entries",
			"infoEmpty": "No entries found",
			"infoFiltered": "(filtered1 from _MAX_ total entries)",
			"lengthMenu": "Show _MENU_ entries",
			"search": "Search:",
			"zeroRecords": "No matching records found"
		},
		destroy: true,
		"columnDefs": [
			{
				"orderable": false,
				"targets": [0]
			}, {
				"targets": [ 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25 ],
				"visible": false,
				"searchable": true
			}
		],
		"order": [
			[1, 'asc']
		],
		"lengthMenu": [
			[5, 10, 15, 20, -1],
			[5, 10, 15, 20, "All"] // change per page values here
		],
		// set the initial value
		"pageLength": 10,
		"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6' <'toolbar'>><'col-md-6'f>r><'table-scrollable't><'row'<'col-md-6 col-sm-12' l><'col-md-6 col-sm-12' p> <'col-md-5'><'col-md-6'i>>", // horizobtal scrollable datatable
		  // "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>"
		"tableTools": {
			"sSwfPath": "assets/global/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
			"aButtons": [
				{
					"sExtends": "text",
					"sButtonText": "Expand All",
					"fnClick": function ( button, config ) {
						$('tbody td .row-details').each( function() {
							if( !oTable.fnIsOpen( $(this).parents('tr')[0] ) ){
								$( this ).click();
							}
						})
					}
				}, {
					"sExtends": "text",
					"sButtonText": "Collapse All",
					"fnClick": function ( button, config ) {
						$('tbody td .row-details').each( function() {
							if( oTable.fnIsOpen( $(this).parents('tr')[0] ) ){
								$( this ).click();
							}
						})
					}
				}
			]
		}

	});

	var tableWrapper = $('#smoke_test_test_case_table_' + i + '_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper

	tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown

	var nEditing = null;
	var nNew = false;

	/* Add event listener for opening and closing details
	 * Note that the indicator for showing which row is open is not controlled by DataTables,
	 * rather it is done here
	 */
	table.on('click', ' tbody td .row-details', function () {
		var nTr = $(this).parents('tr')[0];
		if (oTable.fnIsOpen(nTr)) {
			/* This row is already open - close it */
			$(this).addClass("row-details-close").removeClass("row-details-open");
			oTable.fnClose(nTr);
		} else {
			/* Open this row */
			$(this).addClass("row-details-open").removeClass("row-details-close");
			oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
		}
	});

	$('#enable').on('click', function () {
		$('tbody td .row-details').each( function() {
			if(!oTable.fnIsOpen( $(this).parents('tr')[0])) {
				$( this ).click();
			}
		});
		$('#smoke_test_test_case_table_' + i + ' .editable').editable('toggleDisabled');
	});
}

function assignComponent(identifier) {
	var component_id = $(identifier).data('component_id');
	var component_name = $(identifier).data('component_name');
	$('#comp_id').val(component_id);
	$('#assign_component_modal_title_' + component_id).html('<h4 class="modal-title" >' + component_name + '</h4>');
}

function displayJiraTestCases(identifier) {
	var ticket = $(identifier).data('ticket_name');
	var jira_id = $(identifier).data('ticket_id');
	$('#assign_jira_modal_title_' + jira_id).html('<h4 class="modal-title" >' + ticket +  '</h4>');
}

</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>