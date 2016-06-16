<?php
	$no_schedule = $data['no_schedule'];
	$test_creation = $data['test_creation'];
	$test_execution = $data['test_execution'];
	$test_checking = $data['test_checking'];
	$statement = $data['statement'];
	$test_signoff = $data['test_signoff'];
	$automation_connections = $data['automation_connections'];
	$assignedTickets = $data['assignedTickets'];

	$str1 = "None";
	$str2 = "Cannot Mark as Finished. There are currently no test cases for this ticket.";
	$str3 = "Ticket assigning finished. Wait after review before proceeding to execution.";
	$str4 = "You cannot assign execution review without choosing a reviewer.";
	$str5 = "Ticket assigning finished. Wait after review before doing any changes.";

	if(strcmp($statement, $str1) == 0) {

	} else {
		echo '<script language="javascript">';
		if(strcmp($statement, $str2) == 0) {
			echo 'alert("' . $str2 . '")';
		} else if(strcmp($statement, $str3) == 0) {
			echo 'alert("' . $str3 . '")';
		} else if(strcmp($statement, $str4) == 0) {
			echo 'alert("' . $str4 . '")';
		} else if(strcmp($statement, $str5) == 0) {
			echo 'alert("' . $str5 . '")';
		}
		echo '</script>';
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
<title>ISS | Dashboard </title>
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
			<a href="Home/Dashboard">
			<img src="assets/admin/layout/img/logo.png" alt="logo" class="logo-default"/>
			</a>
			<div class="menu-toggler sidebar-toggler hide">
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
					<li><a href="Home/Dashboard">Home</a></li>
					<li>My Tasks</li>
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

						<li class="active">
							<a href="javascript:;">
							<i class="icon-home"></i>
							<span class="title">Home</span>
							<span class="arrow "></span>
							</a>
							<ul class="sub-menu">
							<li class=""><a href="Home/Dashboard"><i class="fa fa-angle-double-right"></i>Dashboard</a></li>
							<li class="active"><a href="Home/Tasks"><i class="fa fa-angle-double-right"></i>My Tasks</a></li>
							</ul>
						</li>

						<li class="">
							<a href="javascript:;">
							<i class="icon-layers"></i>
							<span class="title">Projects</span>
							<span class="arrow "></span>
							</a>
							<ul class="sub-menu">
							<li><a href="Project/AddProject"><i class="fa fa-plus"></i>Add New Project</a></li>
							<?php

							foreach($data['projects'] as $projects) {
								echo "<li class=''><a href='Project/Project_Main/" .$projects."'><i class='fa fa-angle-double-right'></i>".$projects."</a></li>";
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
						<!-- BEGIN PORTLET-->
						<div class="portlet light bordered">
							<div class="portlet-title tabbable-line">
								<div class="caption font-blue">
									<i class="fa fa-calendar-o font-blue"></i>
									<span class="caption-subject theme-font bold uppercase">My Tasks</span>
								</div>
								<ul class="nav nav-tabs">
									<?php
										$pt_lead = ($_SESSION['user_type'] == "PTLead") ? ' <li class=""><a href="#ptlead" data-toggle="tab"><b>Ticket Assignment</b></a></li>' : "" ;
										echo $pt_lead ;
									?>
									<li class="active">
										<a href="#tab_1_1" data-toggle="tab">
										<b>JIRA Workflow</b></a>
									</li>
									<?php
										$auto_pt = ($_SESSION['user_type'] == "PTLead") ? '<li class=""><a href="#autopt" data-toggle="tab"><b>Automation</b></a></li>' : "";
										echo $auto_pt;
									?>
									<li>
										<a href="#tab_1_2" data-toggle="tab">
										<b>Activities</b></a>
									</li>
								</ul>
							</div>
							<div class="portlet-body">
								<!--BEGIN TABS-->
								<div class="tab-content"  style='margin-top:-15px'>
								<?php
									if($_SESSION['user_type'] == "PTLead") {
										echo '<div class="tab-pane fade " id="ptlead">
												<hr></hr>
												<div class="scroller" style="height: 800px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
													<div class="col-md-3 col-sm-3 col-xs-3">
														<ul class="nav nav-tabs tabs-left">
														<h3><b>Jira</b></h3>
															<li class="active">
			                                                    <a aria-expanded="true" href="#assign_ticket" data-toggle="tab"><b>Assign Ticket</b></a>
			                                                </li>
															<li class="">
			                                                    <a aria-expanded="true" href="#reassign_ticket" data-toggle="tab"><b>Re-Assign Ticket</b></a>
			                                                </li>
			                                                <li class="">
			                                                    <a aria-expanded="true" href="#ticket_status" data-toggle="tab"><b>Ticket Status</b></a>
			                                                </li>
			                                            </ul>
														</div>
														<div class="col-md-9 col-sm-9 col-xs-9">
			                                            <div class="tab-content">
			                                                <div class="tab-pane active in" id="assign_ticket">
															<h3><b>Assign Ticket</b></h3>
																<div class="row">
																	<div class="col-md-3">
																		<input type="hidden" class="form-control assign" id="project">
																	</div>
																	<div class="col-md-3">
																		<input type="hidden" class="form-control assign" id="release">
																	</div>
																	<div class="col-md-3">
																		<input type="hidden" class="form-control assign" id="component">
																	</div>
																	<div class="col-md-3">
																		<button type="button" class="btn btn-block" id="clear_assign" style="background:white;">Clear Filters</button>
																	</div>
																	<div class="col-md-12 margin-top-20">
																		<table class="table refreshtable table-bordered" id="assign_table">
																			<thead>
																				<tr>
																					<th>Ticket ID</th>
																					<th>Release</th>
																					<th>Summary</th>
																					<th>Component</th>
																					<th>Action</th>
																				</tr>
																			</thead>
																			<tbody>
																			</tbody>
																		</table>
																	</div>
																</div>
			                                                </div>
															<div class="tab-pane fade" id="reassign_ticket">
																<h3><b>Re-Assign Ticket</b></h3>
																<div class="row">
																	<div class="col-md-3">
																		<input type="hidden" class="form-control reassign" id="project2">
																	</div>
																	<div class="col-md-3">
																		<input type="hidden" class="form-control reassign" id="release2">
																	</div>
																	<div class="col-md-3">
																		<input type="hidden" class="form-control reassign" id="component2">
																	</div>
																	<div class="col-md-3">
																		<button type="button" class="btn btn-block" id="clear_assign2" style="background:white;">Clear Filters</button>
																	</div>
																	<div class="col-md-12 margin-top-20">
																		<table class="table refreshtable table-bordered" id="reassign_table">
																			<thead>
																				<tr>
																					<td>Ticket ID</td>
																					<td>Release</td>
																					<td>Summary</td>
																					<td>Assignee</td>
																					<td>Action</td>
																				</tr>
																			</thead>
																			<tbody>
																			</tbody>
																		</table>
																	</div>
																</div>
															</div>
															<div class="tab-pane fade" id="ticket_status">
																<h3 style="float:left;"><b>Ticket Status</b></h3>
																<br>
																<a class="btn btn-s blue" style="float:right;">Export Excel</a>
																<div class="row">
																	<div class="col-md-12 margin-top-20">
																		<table class="table table-bordered" id="ticket_status_table">
																			<thead>
																				<tr>
																					<td>Ticket ID</td>
																					<td>Release</td>
																					<td>Summary</td>
																					<td>Status</td>
																					<td>Issues</td>
																				</tr>
																			</thead>
																			<tbody>';
																			foreach($assignedTickets as $at) {
																				$status = "";

																				$qbitStatus = $at['qbit_status'];
																				if($at['issues'] != "") {
																					$status = "<span class='label label-danger'>With Issue</span>";
																				} else {
																					if((strpos(strtoupper($qbitStatus), strtoupper("ForSignOff")) !== FALSE)) {
																						if($at['dev_signoff'] == "SignOff Provided" && $at['business_signoff'] == "SignOff Provided") {
																							$status = "<span class='label label-success'>Pass</span>";
																						} else {
																							$status = "<span class='label label-info'>For Review</span>";
																						}
																					} else {
																						$status = "<span class='label label-warning'>In Progress</span>";
																					}
																				}

																				echo '<tr>
																						<td>' . $at['jira_pkey'] . '</td>
																						<td>' . $at['release_name'] . '</td>
																						<td>' . $at['summary'] . '</td>
																						<td>' . $status . '</td>
																						<td>' . $at['issues'] . '</td>
																					</tr>';
																			}
																		echo '</tbody>
																		</table>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>';
									} else {
										echo "";
									}
								?>

								<div class="tab-pane active" id="tab_1_1">
									<hr></hr>
									<div class="scroller" style="height: 580px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
										<div class="col-md-3 col-sm-3 col-xs-3">
											<ul class="nav nav-tabs tabs-left">
												<h3><b>My Tasks</b></h3>
												<li class="active">
													<a aria-expanded="true" href="#tab_6_1" data-toggle="tab">Not Yet Scheduled</a>
												</li>
												<li class="">
													<a aria-expanded="true" href="#tab_6_2" data-toggle="tab">Test Case Creation</a>
												</li>
												<li class="">
	                                                <a aria-expanded="true" href="#tab_6_3" data-toggle="tab">Test Case Execution</a>
	                                            </li>
												<hr></hr>
												<li class="">
	                                                <a aria-expanded="true" href="#tab_6_4" data-toggle="tab">Needs Review</a>
	                                            </li>
												<hr></hr>
												<li class="">
													<a aria-expanded="true" href="#tab_6_5" data-toggle="tab">Sign Offs</a>
												</li>
                                            </ul>
										</div>
										<div class="col-md-9 col-sm-9 col-xs-9">
                                            <div class="tab-content">
												<div class="tab-pane active in" id="tab_6_1">
													<h3><b>Not Yet Scheduled</b></h3>
													<table class="table table-bordered notyetscheduled" id="notyetscheduled">
														<thead>
															<tr>
																<th>Ticket ID</th>
																<th>Release</th>
																<th>Summary</th>
																<th>Component</th>
																<th>Assignee</th>
															</tr>
														</thead>
														<tbody>
														<?php
															foreach($no_schedule as $ns) {
																if($_SESSION['user_type'] == "PTLead") {
																	echo "<tr>
																		  <td><a href='Home/TicketSchedule/".$ns['jira_pkey']."/".$ns['release_name']."'  style='text-decoration:underline'>".$ns['jira_pkey']."</a></td>
																		  <td>".$ns['release_name']."</td>
																		  <td>".$ns['summary']."</td>
																		  <td>".$ns['component']."</td>
																		  <td>".$ns['qbit_assignee']."</td>
																		  </tr>
																		  ";
																} else if($ns['qbit_assignee'] == $_SESSION['username']) {
																	echo "<tr>
																		  <td><a href='Home/TicketSchedule/".$ns['jira_pkey']."/".$ns['release_name']."'  style='text-decoration:underline'>".$ns['jira_pkey']."</a></td>
																		  <td>".$ns['release_name']."</td>
																		  <td>".$ns['summary']."</td>
																		  <td>".$ns['component']."</td>
																		  <td>".$ns['qbit_assignee']."</td>
																		  </tr>
																		  ";
																}
															}
														?>
														</tbody>
													</table>
                                                </div>
												<div class="tab-pane fade" id="tab_6_2">
                                                	<h3><b>Test Case Creation</b></h3>
													<table class="table table-bordered multiple" id="two">
														<thead>
															<tr>
																<th>Ticket ID</th>
																<th>Release</th>
																<th>Summary</th>
																<th>QBIT Status</th>
																<th>Planned End</th>
																<th>Actions</th>
															</tr>
														</thead>
														<tbody>
														<?php
															foreach($test_creation as $tc) {
																if($tc['count'] != 2) {
																	$c1 = "";
																	switch($tc['count']) {
																		case 0:
																			$c1 = "<a onclick='startTCCreation(this);'  data-pkey='".$tc['jira_pkey']."' data-jid='".$tc['j_id']."' data-rn='".$tc['release_name']."'  class='btn btn-success btn-xs'>Create Now</a>
																					<a onclick='reschedule(this);' data-rn='".$tc['release_name']."' data-pkey='".$tc['jira_pkey']."' data-jid='".$tc['j_id']."' class='btn btn-danger btn-xs'>Re-Schedule</a></td>" ;
																			break;
																		case 1:
																			$c1 = "<a href='Home/TCCreation/".$tc['jira_pkey']."/".$tc['release_name']."' class='btn yellow-crusta btn-xs'>Continue</a>
																				  <a class='btn blue btn-xs' data-toggle='modal' onclick='assignTCChecker(this);' href='#tccreation_check' data-jiraid = '".$tc['j_id']."' data-jirapkey ='".$tc['jira_pkey']."' data-releasename='" . $tc['release_name'] . "'> Mark as Finished </a>";
																			break;
																		default:
																			break;
																	}
																	$status = "";
																	if($tc['qbit_status'] == 'TCCreationInProgress') {
																		$status = 'In Progress';
																	} elseif($tc['qbit_status'] == 'TCCreationNotStarted') {
																		$status = 'Not Started';
																	}
																	echo "<tr>
																		  <td width='5%'>";
																	switch($tc['count']) {
																		case 0:
																			echo "<a style='text-decoration:underline' onclick='startTCCreation(this);'  data-pkey='".$tc['jira_pkey']."' data-jid='".$tc['j_id']."' data-rn='".$tc['release_name']."'>";
																			break;
																		case 1:
																			echo "<a style='text-decoration:underline' href='Home/TCCreation/".$tc['jira_pkey']."/".$tc['release_name']."'>";
																			break;
																		default:
																			break;
																	}
																	echo $tc['jira_pkey'];
																	echo "</a></td>
																		  <td width='4%'>" . $tc['release_name'] . "</td>
																		  <td width='29%'>" . $tc['summary'] . "</td>
																		  <td width='9%'>" . $status . "</td>
																		  <td width='15%'>" . date('m/d/Y, g:iA', strtotime($tc['due_date'])) . "</td>
																		  <td width='38%'>" . $c1 . "</tr>";
																}
															}
														?>
														</tbody>
													</table>
                                                </div>
                                                <div class="tab-pane fade" id="tab_6_3">
													<h3><b>Test Case Execution</b></h3>
													<table class="table table-bordered multiple" id="three">
														<thead>
															<tr>
																<th>Ticket ID</th>
																<th>Release</th>
																<th>Summary</th>
																<th>QBIT Status</th>
																<th>Planned End</th>
																<th>Actions</th>
															</tr>
														</thead>
													<tbody>
													<?php
													foreach($test_execution as $te) {
														if($te['count'] != 2) {
															$c2 = "";
															switch($te['count']) {
																case 0: $c2 = "<a onclick='startTCExecution(this);'  data-pkey='".$te['jira_pkey']."' data-jid='".$te['j_id']."' data-rn='".$te['release_name']."'  class='btn btn-success btn-xs'>Execute Now</a>" ;
																	break;
																case 1: $c2 = "<a href='Home/TCExecution/".$te['jira_pkey']."/".$te['release_name']."' class='btn yellow-crusta btn-xs'>Continue</a>
																	<a class='btn blue btn-xs' data-toggle='modal'  onclick='assignTCExecutionChecker(this);' href='#tcexecution_check' data-jiraid = '".$te['j_id']."' data-jirapkey ='".$te['jira_pkey']."' > Mark as Finished </a>
																	<a class='btn green btn-xs' data-jirapkey='" . $te['jira_pkey'] . "' data-releasename='" . $te['release_name'] . "' onclick='exportTestCases(this)'> Export Excel </a>";
																	break;
																default:
																	break;
															}
															$status = "";
															if($te['qbit_status'] == 'TCExecutionInProgress') {
																$status = 'In Progress';
															} elseif($te['qbit_status'] == 'TCExecutionNotStarted') {
																$status = 'Not Started';
															}
															echo "<tr>
																  <td width='5%'>";
															switch($te['count']) {
																case 0:
																	echo "<a style='text-decoration:underline' onclick='startTCExecution(this);'  data-pkey='".$te['jira_pkey']."' data-jid='".$te['j_id']."' data-rn='".$te['release_name']."'>";
																	break;
																case 1:
																	echo "<a style='text-decoration:underline' href='Home/TCExecution/".$te['jira_pkey']."/".$te['release_name']."'>";
																	break;
																default;
																	break;
															}
															echo $te['jira_pkey'];
															echo "</a></td>
																  <td width='4%'>" . $te['release_name'] . "</td>
																  <td width='29%'>" . $te['summary'] . "</td>
																  <td width='9%'>" . $status . "</td>
																  <td width='15%'>" . date('m/d/Y, g:iA', strtotime($te['due_date'])) . "</td>
																  <td width='38%'>" . $c2 . "</tr>";
														}
													}
													?>
													</tbody>
												</table>
                                                </div>
                                                <div class="tab-pane fade" id="tab_6_4">
													<h3><b>Needs Review</b></h3>
													<table class="table table-bordered multiple" id="three">
														<thead>
															<tr>
																<th>Ticket ID</th>
																<th>Release</th>
																<th>Summary</th>
																<th>QBIT Status</th>
																<th>Planned End</th>
																<th>Actions</th>
															</tr>
														</thead>
														<tbody>
														<?php
															foreach($test_checking as $tch) {
																$status = "";
																$c1 = "";
																if($tch['qbit_status'] == 'TCCreationCompletedForReview') {
																	$status = "Test Case Creation Review";
																	$c1 = "<a class='btn yellow btn-xs' href='Home/TestCaseCreationReview/" . $tch['jira_pkey'] . "/" . $tch['release_name'] . "'> Review </a>
																		<a class='btn green btn-xs' onclick='updateJiraCreationToExecution(this);' data-id='" . $tch['j_id'] . "'> For Test Execution </a>
																		<a class='btn red btn-xs' onclick='updateTCCreationInProgress(this);' data-id='".$tch['j_id']."'> Revise </a>";
																} elseif($tch['qbit_status'] == 'TCExecutionCompletedForReview') {
																	$status = "Test Case Execution Review";
																	$c1 = "<a class='btn yellow btn-xs' href='Home/TestCaseExecutionReview/" . $tch['jira_pkey'] . "/" . $tch['release_name'] . "'> Review </a>
																		<a class='btn green btn-xs'> For Final Review </a>
																		<a class='btn red btn-xs' onclick='updateTCExecutionInProgress(this);' data-id='" . $tch['j_id'] . "'> Re-execute </a>";
																}

																if($tch['checker'] == $_SESSION['username']) {
																	if($tch['count'] == 2) {
																		echo "<tr>
																			  <td width='5%'>" . $tch['jira_pkey'] . "</td>
																			  <td width='4%'>" . $tch['release_name'] . "</td>
																			  <td width='29%'>" . $tch['summary'] . "</td>
																			  <td width='9%'>" . $status . "</td>
																			  <td width='15%'>" . date('m/d/Y, g:iA', strtotime($tch['due_date'])) . "</td>
																			  <td width='38%'>" . $c1 . "</tr>";
																	}
																} else if($tch['assignee'] == $_SESSION['username']) {
																	if($tch['count'] == 2) {
																		echo "<tr>
																			  <td width='5%'>" . $tch['jira_pkey'] . "</td>
																			  <td width='4%'>" . $tch['release_name'] . "</td>
																			  <td width='29%'>" . $tch['summary'] . "</td>
																			  <td width='9%'>" . $status . "</td>
																			  <td width='15%'>" . date('m/d/Y, g:iA', strtotime($tch['due_date'])) . "</td>
																			  <td width='38%'><a class='btn default btn-xs'>On Review Process</a></tr> ";
																	}
																}
															}
														?>
														</tbody>
													</table>
												</div>
												<div class="tab-pane fade" id="tab_6_5">
													<h3><b>Sign Offs</b></h3>
													<table class="table table-bordered multiple" id="three">
														<thead>
															<tr>
																<th>Ticket ID</th>
																<th>Release</th>
																<th>Summary</th>
																<th>Dev</th>
																<th>Business</th>
																<th>Actions</th>
															</tr>
														</thead>
														<tbody>
														<?php
															foreach($test_signoff as $ts) {
																$status = $ts['qbit_status'];
																if($status == "ForSignOff") {
																	$status = "For SignOff";
																}

																$devColor = "";
																if($ts['dev_signoff'] == "For SignOff") {
																	$devColor = "#ff3333"; // red
																} else {
																	$devColor = "#298A08"; // green
																}

																$businessColor = "";
																if($ts['business_signoff'] == "For SignOff") {
																	$businessColor = "#ff3333"; // red
																} else {
																	$businessColor = "#298A08"; // green
																}

																echo "<tr>
																		  <td width='5%'>" . $ts['jira_pkey'] . "</td>
																		  <td width='4%'>" . $ts['release_name'] . "</td>
																		  <td width='28%'>" . $ts['summary'] . "</td>
																		  <td width='17%'><p style='color: " . $devColor . ";'>" . $ts['dev_signoff'] . "</p></td>
																		  <td width='17%'><p style='color: " . $businessColor . ";'>" . $ts['business_signoff'] . "</td>
																		  <td width='29%'>
																			  <a class='btn blue btn-xs' onclick='updateDevSignOff(this);' data-id='" . $ts['j_id'] . "' data-value='" . $ts['dev_signoff'] . "'> Toggle Dev </a>
																			  <a class='btn green btn-xs' onclick='updateBusinessSignOff(this);' data-id='".$ts['j_id']."' data-value='" . $ts['business_signoff'] . "'> Toggle Business </a>
																		  </td>
																	  </tr> ";
															}
														?>
														</tbody>
													</table>
												</div>
                                            </div>
                                        </div>
									</div>
								</div>
								<div class="tab-pane" id="tab_1_2">
									<hr></hr>
									<div class="scroller" style="height: 580px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
										<div class="col-md-3 col-sm-3 col-xs-3">
											<ul class="nav nav-tabs tabs-left">
												<h3><b>Activities</b></h3>
                                                <li class="active">
                                                    <a aria-expanded="true" href="#tab_activity_6_1" data-toggle="tab">Activity Tab 1</a>
                                                </li>
                                                <li class="">
                                                    <a aria-expanded="false" href="#tab_activity_6_2" data-toggle="tab"> Activity Tab 2</a>
                                                </li>
                                                <li>
                                                    <a aria-expanded="false" href="#tab_activity_6_3" data-toggle="tab">Activity Tab 3</a>
                                                </li>
                                                <li>
                                                    <a  aria-expanded="false" href="#tab_activity_6_4" data-toggle="tab">Activity Tab 4</a>
                                                </li>
                                            </ul>
										</div>
										<div class="col-md-9 col-sm-9 col-xs-9">
                                            <div class="tab-content">
                                                <div class="tab-pane active in" id="tab_activity_6_1">
													 <p>Test 6 1</p>
                                                </div>
                                                <div class="tab-pane fade" id="tab_activity_6_2">
													<p>Test 6 2</p>
                                                </div>
                                                <div class="tab-pane fade" id="tab_activity_6_3">
                                                    <p>Test 6 3</p>
                                                </div>
                                                <div class="tab-pane fade" id="tab_activity_6_4">
													<p>Test 6 4</p>
												</div>
                                            </div>
                                        </div>
									</div>
								</div>
								<?php
									if($_SESSION['user_type'] == "PTLead") {
										echo '<div class="tab-pane fade " id="autopt">
												<hr></hr>
												<div class="scroller" style="height: 800px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
													<div class="col-md-12>
														<div class="tab-content">
															<div class="tab-pane active in" id="assign_ticket">
																<div class="row">
																	<div class="col-md-6">
																		<h3><b>Automation Connections</b></h3>
																	</div>
																	<br>
																	<div class="col-md-6">
																		<a class="btn btn-s blue" data-toggle="modal" style="float:right;" href="#create_new_automation_modal">New Connection</a>
																		<a class="btn btn-s green" style="float:right; margin-right:6px;">Export Excel</a>
																	</div>
																</div>
																<div class="row">
																	<div class="col-md-12 margin-top-20">
																		<table class="table refreshtable table-bordered" id="automation_detail_table">
																			<thead>
																				<tr>
																					<th>Connection Name</th>
																					<th>Driver</th>
																					<th>Host</th>
																					<th>Username</th>
																					<th>Password</th>
																					<th>Database</th>
																					<th>Prefix</th>
																				</tr>
																			</thead>
																			<tbody>';
																			foreach($automation_connections as $ac) {
																				echo '<tr>
																						<td>' . $ac["connection_name"] . '</td>
																						<td>' . $ac["driver"] . '</td>
																						<td>' . $ac["host"] . '</td>
																						<td>' . $ac["username"] . '</td>
																						<td>' . $ac["password"] . '</td>
																						<td>' . $ac["database_name"] . '</td>
																						<td>' . $ac["prefix"] . '</td>
																					</tr>';
																			}
																		echo' </tbody>
																		</table>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>';
									} else {
										echo "";
									}

									?>
								<!--END TABS-->
							</div>
						</div>
						<!-- END PORTLET-->
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
	<div class="modal fade" id="assign_modal" tabindex="-1" role="basic" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" id="assign_modal_title">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title" >  </h4>
				</div>
				<form method="post" id = "assign_form">
					<div class="modal-body">
						<input type='hidden' class="form-control" id="assignee" name="assignee">
						<input type='hidden' id="assign_jira_id" name="jira_id">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn blue">Save changes</button>
					</div>
				</form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->

	<div class="modal fade" id="reassign_modal" tabindex="-1" role="basic" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" id="reassign_modal_title">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title" >  </h4>
				</div>
				<form method="post" id = "reassign_form">
					<div class="modal-body">
						<input type='hidden' class="form-control" id="reassignee" name="assignee">
						<input type='hidden' id="reassign_jira_id" name="jira_id">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn blue">Save changes</button>
					</div>
				</form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->

	<div class="modal fade" id="tccreation_check" tabindex="-1" role="basic" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" id="assign_tc_check_modal_title">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title" >  </h4>
				</div>
				<form method="post" role="form" id="assign_test_case_reviewer">
					<div class="modal-body">
						<input type='hidden' class="form-control" id="tc_checker" name="tc_checker">
						<input type='hidden' id="tccheck_jira_id" name="jira_id">
						<input type='hidden' id="ticket" name="ticket">
						<input type='hidden' id="release_name" name="release_name">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn default" data-dismiss="modal">Close</button>
						<input type="submit" class="btn btn-danger" name="btn_no_checker" id="btn_no_checker" value="No Reviewer Required">
						<input type="submit" class="btn blue" name="btn_tc_checker" id="btn_tc_checker" value="Assign Reviewer">
					</div>
				</form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->

	<div class="modal fade" id="tcexecution_check" tabindex="-1" role="basic" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" id="assign_te_review_modal_title">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title" >  </h4>
				</div>
				<form method="post" role="form" id="assign_test_case_execution_reviewer">
					<div class="modal-body">
						<input type='hidden' class="form-control" id="te_checker" name="te_checker">
						<input type='hidden' id="techeck_jira_id" name="jira_id">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn default" data-dismiss="modal">Close</button>
						<input type="submit" class="btn btn-danger" name="btn_no_te_checker" value="No Reviewer Required">
						<input type="submit" class="btn blue" name="btn_te_checker" value="Assign Reviewer">
					</div>
				</form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>

	<div class="modal fade" id="create_new_automation_modal" tabindex="-1" role="basic" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title" > New Automation Connection </h4>
				</div>
				<form method="post" role="form" id="automation_connection_form">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<div class="col-md-12">
									<label><b>Connection Name</b></label>
									<br>
								</div>
								<div class="col-md-8">
									<div class="input-group" style="text-align:left">
										<input type='text' class="form-control" name="connection_name" id="connection_name" required>
										<span class="input-group-btn">
											<a href="javascript:;" onclick="checkFunction()" class="btn green" id="connection_name_checker"><i class="fa fa-check"></i>Check</a>
										</span>
									</div>
								</div>
								<div class="col-md-4">
									<span id="user-availability-status"></span>
								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-12">
								<div class="col-md-12">
									<div class="bg-blue-chambray bg-font-blue-chambray">
										<div class="ribbon ribbon-right ribbon-shadow ribbon-color-danger uppercase">Parameters</div>
									</div>
								</div>
								<br/>
								<br/>
								<div class="col-md-6">
									<label><b>Driver</b></label>
									<br>
									<input type='text' class="form-control" name="driver" required>
								</div>
								<div class="col-md-6">
									<label><b>Host</b></label>
									<br>
									<input type='text' class="form-control" name="host" required>
								</div>
								<br>
								<div class="col-md-6">
									<label><b>Database Name</b></label>
									<br>
									<input type='text' class="form-control" name="database_name" required>
								</div>
								<div class="col-md-3">
									<label><b>Prefix</b></label>
									<br>
									<input type='text' class="form-control" name="prefix">
								</div>
							</div>
						</div>
						<br/><br/>
						<div class="row">
							<div class="col-md-12">
								<div class="col-md-12">
									<div class="mt-element-ribbon bg-blue-chambray bg-font-blue-chambray">
										<div class="ribbon ribbon-right ribbon-shadow ribbon-color-danger uppercase">Database User</div>
									</div>
								</div>
								<br/><br/>
								<div class="col-md-4">
									<label><b>Username</b></label>
									<br>
									<input type='text' class="form-control" name="username" required>
								</div>
								<div class="col-md-4">
									<label><b>Password</b></label>
									<br>
									<input type='password' class="form-control" name="password" required>
								</div>
								<div class="col-md-4">
									<label><b>Verify Password</b></label>
									<br>
									<input type='password' class="form-control" name="verifypassword" required>
								</div>
							</div>
						</div>
						<br>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn default" data-dismiss="modal">Close</button>
						<a href="javascript:;" class="btn blue-chambray" onclick="checkDatabase()" id="check_database_connection"><i class="glyphicon glyphicon-flash"></i>Try Connection</a>
						<button type="submit" class="btn green"><i class="fa fa-check"></i>Create</button>
					</div>
				</form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>

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
});

$("#automation_detail_table").dataTable();
$("#ticket_status_table").dataTable();

function exportTestCases(identifier) {
	var jira_pkey = $(identifier).data('jirapkey');
	var release_name = $(identifier).data('releasename');

	openModal();
	$.ajax({
		url : "Home/exportTestCases",
		type : "POST",
		data : {
			jira_pkey : jira_pkey,
			release_name : release_name
		},
		success : function(response) {
			closeModal();
			alert("Success " + response);
		},
		error : function(response) {
			closeModal();
			alert("Failed " + response);
		}
	});
}

function assign(identifier) {
    var id = $(identifier).data('jiraid');
    var pkey = $(identifier).data('jirapkey');
    $('#assign_modal_title').html('<h4 class="modal-title" > Assign  ' + pkey + '  </h4>');
    $('#assign_jira_id').val(id);
}

function reassign(identifier) {
    var id = $(identifier).data('jiraid');
    var pkey = $(identifier).data('jirapkey');
    $('#reassign_modal_title').html('<h4 class="modal-title" > Re-Assign  ' + pkey + '  </h4>');
    $('#reassign_jira_id').val(id);
}

function startTCCreation(identifier) {
    var r = confirm("This will activate the timestamp for Actual Days of Test Case Creation. Do you want to proceed?");
    if (r == true) {
        var pkey = $(identifier).data('pkey');
        var release_name = $(identifier).data('rn');
        var id = $(identifier).data('jid');
        openModal();
        $.ajax({
            url: "Jira/startTCCreation",
            type: "POST",
            data: {
                jid: id
            },
            success: function(response) {
            	closeModal();
                response = JSON.parse(response);
                window.location = "Home/TCCreation/" + pkey + "/" + release_name;
            }
        });
    } else {
        return false;
    }
}

function startTCExecution(identifier) {
    var r = confirm("This will activate the timestamp for Actual Days of Test Case Execution. Do you want to proceed?");
    if (r == true) {
        var pkey = $(identifier).data('pkey');
        var release_name = $(identifier).data('rn');
        var id = $(identifier).data('jid');
        openModal();
        $.ajax({
            url: "Jira/startTCExecution",
            type: "POST",
            data: {
                jid: id
            },
            success: function(response) {
            	closeModal();
                response = JSON.parse(response);
                window.location = "Home/TCExecution/" + pkey + "/" + release_name;
            }
        });
    } else {
        return false;
    }
}

function reschedule(identifier) {
    var r = confirm("This will unset all data such as FLOE and Complexity. Are you sure you want to re-schedule? ");
    if (r == true) {
        var pkey = $(identifier).data('pkey');
        var release_name = $(identifier).data('rn');
        var id = $(identifier).data('jid');
        openModal();
        $.ajax({
            url: "Jira/rescheduleTicket",
            type: "POST",
            data: {
                id: id
            },
            success: function(response) {
            	closeModal();
                alert(response + 'Data was reset!');
                window.location = "Home/TicketSchedule/" + pkey + '/' + release_name;
            }
        });
    } else {
        return false;
    }
}

function assignTCChecker(identifier) {
    var id = $(identifier).data('jiraid');
    var pkey = $(identifier).data('jirapkey');
	var releasename = $(identifier).data('releasename');
    $('#assign_tc_check_modal_title').html('<h4 class="modal-title" >Test Case Creation Reviewer for  ' + pkey + '  </h4>');
    $('#tccheck_jira_id').val(id);
	$('#ticket').val(pkey);
	$('#release_name').val(releasename);
}

/*
Just created this javascript method to call modal for assigning test case execution checker
*/
function assignTCExecutionChecker(identifier) {
	var id = $(identifier).data('jiraid');
	var pkey = $(identifier).data('jirapkey');
	$('#assign_te_review_modal_title').html('<h4 class="modal-title" >Test Case Execution Reviewer For  ' + pkey + '  </h4>');
	$('#techeck_jira_id').val(id);
}

function updateTCCreationInProgress(identifier) {
    var r = confirm("Are you sure you want assignee to revise test cases?");
    if (r == true) {
    	openModal();
        $.ajax({
            url: "Jira/updateJiraTCCreationInProgress",
            type: "POST",
            data: {
                id: $(identifier).data('id')
            },
            success: function(response) {
            	closeModal();
                alert('Ticket test cases are now available for revision of assignee.');
                location.reload();
            }
        });
    } else {
        return false;
    }
}

function updateTCExecutionInProgress(identifier) {
	var r = confirm("Are you sure you want assignee to redo test execution?");
	if(r == true) {
		openModal();
		$.ajax({
			url : "Jira/updateJiraTCExecutionInProgress",
			type : "POST",
			data : {
				id : $(identifier).data('id')
			},
			success : function(response) {
				closeModal();
				alert(response + 'Ticket test cases are now available again for test execution.');
				location.reload();
			}
		});
	} else {
		return false;
	}
}

function updateJiraCreationToExecution(identifier) {
	var r = confirm("Are you sure to finish test case creation checking?");
	if(r == true) {
		openModal();
		$.ajax({
			url : "Jira/updateJiraTCCreationToTCExecution",
			type : "POST",
			data : {
				id : $(identifier).data('id')
			},
			success : function(response) {
				closeModal();
				alert(response + 'Ticket now ready for Test Execution.');
				location.reload();
			}
		});
	} else {
		return false;
	}
}

function updateDevSignOff(identifier) {
	var value = $(identifier).data('value');
	if(value == "SignOff Provided") {
		alert("Cannot toggle Dev signoff status. SignOff is already provided.");
	} else {
		var r = confirm("Are you sure that Dev provided SignOff?");
		if(r == true) {
			openModal();
			$.ajax({
				url : "Jira/updateDevSignOff",
				type : "POST",
				data : {
					id : $(identifier).data('id')
				},
				success : function(response) {
					closeModal();
					alert(response + 'SignOff successfully provided by Dev!');
					location.reload();
				}
			});
		} else {
			return false;
		}
	}
}

function checkFunction() {
	var connectionName = $("input[name='connection_name']").val();
	var result = "";
	$.ajax({
		url : "Home/checkConnectionName",
		type : "POST",
		async : false,
		data : {
			connectionName : connectionName
		},
		success : function(response) {
			result = response;
		}
	});
	if(result == "Available") {
		$('#user-availability-status').html("<span><font color='26c281'><h5><b>Available.</b></h5></font></span>");
	} else if(result == "Not Available") {
		$('#user-availability-status').html("<span><font color='e43a45'><h5><b>Not Available.</b></h5></font></span>");
	}
}

function checkDatabase() {
	var connection_host = $("input[name='host']").val();
	var connection_username = $("input[name='username']").val();
	var connection_password = $("input[name='password']").val();
	if(connection_host == "" || connection_username == "" || connection_password == "") {
		alert("Error! Host Name, Username and Password must not be empty!");
	} else {
		openModal();
		$.ajax({
			url : "Home/checkDatabaseConnectivity",
			type : "POST",
			data : {
				connection_host : connection_host,
				connection_username : connection_username,
				connection_password : connection_password
			},
			success : function(response) {
				closeModal();
				alert(response);
			},
			error : function(response) {
				closeModal();
				alert("Access denied for user '" + connection_username + "'@'" + connection_host + "' (using password: YES)");
			}
		});
	}
}

$('#create_new_automation_modal').submit(function() {
	var connection_name = $(this).find("input[name='connection_name']").val();
	var driver = $(this).find("input[name='driver']").val();
	var host = $(this).find("input[name='host']").val();
	var database_name = $(this).find("input[name='database_name']").val();
	var prefix = $(this).find("input[name='prefix']").val();
	var username = $(this).find("input[name='username']").val();
	var password = $(this).find("input[name='password']").val();
	var verifypassword = $(this).find("input[name='verifypassword']").val();

	if(password == verifypassword) {
		var result = "";
		$.ajax({
			url : "Home/checkConnectionName",
			type : "POST",
			async : false,
			data : {
				connectionName : connection_name
			},
			success : function(response) {
				result = response;
			}
		});
		if(result == "Available") {
			$('#user-availability-status').html("<span><font color='26c281'><h5><b>Available.</b></h5></font></span>");

			$.ajax({
				url : "Home/createNewConnection",
				type : "POST",
				data : {
					connection_name : connection_name,
					driver : driver,
					host : host,
					database_name : database_name,
					prefix : prefix,
					username : username,
					password : password
				},
				success : function(response) {
					alert(response);
				},
				error : function(response) {
					alert(response);
				}
			});
		} else if(result == "Not Available") {
			$('#user-availability-status').html("<span><font color='e43a45'><h5><b>Not Available.</b></h5></font></span>");
			$('input#connection_name').focus();
			return false;
		}
	} else {		
		alert("Your passwords does not match.");
		return false;
	}
});

function updateBusinessSignOff(identifier) {
	var value = $(identifier).data('value');
	if(value == "SignOff Provided") {
		alert("Cannot toggle Business signoff status. SignOff is already provided.");
	} else {
		var r = confirm("Are you sure that Business provided SignOff?");
		if(r == true) {
			openModal();
			$.ajax({
				url : "Jira/updateBusinessSignOff",
				type : "POST",
				data : {
					id : $(identifier).data('id')
				},
				success : function(response) {
					closeModal();
					alert(response + 'SignOff successfully provided by Business!');
					location.reload();
				}
			});
		} else {
			return false;
		}
	}
}

$('#assign_test_case_reviewer').submit(function(){
	var val = $(this).find("input[type=submit]:focus").val();
	var tc_checker = $(this).find("input[name='tc_checker']").val();
	var jira_id = $(this).find("input[name='jira_id']").val();
	var ticket = $(this).find("input[name='ticket']").val();
	var release_name = $(this).find("input[name='release_name']").val();
	//alert(val + "\n" + tc_checker + "\n" + jira_id + "\n" + ticket + "\n" + release_name);

	if(val == "Assign Reviewer" && tc_checker == "") {
		alert("You cannot assign test case creation review to nobody.");
	} else {
		openModal();
		$.ajax({
			url : "Jira/assignTCChecker",
			type : "POST",
			data : {
				jira_id : jira_id,
				val : val,
				tc_checker : tc_checker,
				ticket : ticket,
				release_name : release_name
			},
			success : function(response) {
				closeModal();
				alert(response);
				location.reload();
			},
			error : function(response) {
				closeModal();
				alert(response + "\nThere is some kind of error. Please view console (Ctrl + Shift + J) to view.");
				location.reload();
			}
		});
	}
});

$('#assign_test_case_execution_reviewer').submit(function() {
	//action="Jira/assignTestExecutionChecker"
	var val = $(this).find("input[type=submit]:focus").val();
	var te_checker = $(this).find("input[name='te_checker']").val();
	var jira_id = $(this).find("input[name='jira_id']").val();
	//alert(val + "\n" + te_checker + "\n" + jira_id);

	if(val == "Assign Reviewer" && te_checker == "") {
		alert("You cannot assign test case execution review to nobody.");
	} else {
		openModal();
		$.ajax({
			url : "Jira/assignTestExecutionChecker",
			type : "POST",
			data : {
				jira_id : jira_id,
				val : val,
				te_checker : te_checker
			},
			success : function(response) {
				closeModal();
				alert(response);
				location.reload();
			},
			error : function(response) {
				closeModal();
				alert(response + "\nThere is some kind of error. Please view console (Ctrl + Shift + J) to view.");
			}
		});
	}
});

$('#assignee').select2({
	placeholder: "Select Assignee",
	allowClear: true,
	ajax: {
		url: "Home/getUsers",
		dataType: "json",
		type: "post",
		delay: 250,
		data: function(term) {
			return {
				term: term
			};
		},
		results: function(data) {
			return {
				results: data
			};
		}
	}
});

$('#reassignee').select2({
	placeholder: "Select Assignee",
	allowClear: true,
	ajax: {
		url: "Home/getUsers",
		dataType: "json",
		type: "post",
		delay: 250,
		data: function(term) {
			return {
				term: term
			};
		},
		results: function(data) {
			return {
				results: data
			};
		}
	}
});

$('#tc_checker').select2({
	placeholder: "Select Test Case Creation Reviewer",
	allowClear: true,
	ajax: {
		url: "Home/getUsers",
		dataType: "json",
		type: "post",
		delay: 250,
		data: function(term) {
			return {
				term: term
			};
		},
		results: function(data) {
			return {
				results: data
			};
		}
	}
});

/*
Method same as above tc_checker
*/
$('#te_checker').select2({
	placeholder : "Select Test Case Execution Reviewer",
	allowClear : true,
	ajax : {
		url : "Home/getUsers",
		dataType : "json",
		type : "post",
		delay : 250,
		data : function(term) {
			return {
				term : term
			};
		},
		results : function(data) {
			return {
				results : data
			};
		}
	}
});

$('#project').select2({
	placeholder: "Select Project",
	allowClear: true,
	ajax: {
		url: "Home/getProjectsAct",
		dataType: "json",
		type: "post",
		delay: 250,
		data: function(term) {
			return {
				term: term
			};
		},
		results: function(data) {
			return {
				results: data
			};
		}
	}
});

$('#release').select2({
	placeholder: "Select Release",
	allowClear: true,
	ajax: {
		url: "Home/getReleases",
		dataType: "json",
		type: "post",
		delay: 250,
		data: function(term) {
			return {
				id: $("#project").val(),
				term: term
			};
		},
		results: function(data) {
			return {
				results: data
			};
		}
	}
});

$('#component').select2({
	placeholder: "Select Component",
	allowClear: true,
	ajax: {
		url: "Home/getComponents",
		dataType: "json",
		type: "post",
		delay: 250,
		data: function(term) {
			return {
				id: $("#release").val(),
				term: term
			};
		},
		results: function(data) {
			return {
				results: data
			};
		}
	}
});

$('#project2').select2({
	placeholder: "Select Project",
	allowClear: true,
	ajax: {
		url: "Home/getProjectsAct",
		dataType: "json",
		type: "post",
		delay: 250,
		data: function(term) {
			return {
				term: term
			};
		},
		results: function(data) {
			return {
				results: data
			};
		}
	}
});


$('#release2').select2({
	placeholder: "Select Release",
	allowClear: true,
	ajax: {
		url: "Home/getReleases",
		dataType: "json",
		type: "post",
		delay: 250,
		data: function(term) {
			return {
				id: $("#project2").val(),
				term: term
			};
		},
		results: function(data) {
			return {
				results: data
			};
		}
	}
});

$('#component2').select2({
	placeholder: "Select Component",
	allowClear: true,
	ajax: {
		url: "Home/getComponents",
		dataType: "json",
		type: "post",
		delay: 250,
		data: function(term) {
			return {
				id: $("#release2").val(),
				term: term
			};
		},
		results: function(data) {
			return {
				results: data
			};
		}
	}
});

</script>
<!-- END JAVASCRIPTS -->

</body>

<!-- END BODY -->
</html>
