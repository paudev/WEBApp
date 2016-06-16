<?php
	$project = $data['project'];
	$projects = $data['projects'];
	$release = $data['release'];
	$ticket = $data['ticket'];
	$ticketID = $data['ticketID'];
	$ticketDetails = $data['ticketDetails'];
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
<title>ISS | Dashboard</title>
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
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-select/bootstrap-select.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/jquery-multi-select/css/multi-select.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.tableTools.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-datetimepicker-master/build/css/bootstrap-datetimepicker.min.css"/>
<link href="assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet"/>
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
					<li><a href="Jira/Releases/<?= $project ?>"><?= $release ?></a></li>
					<li><a href="Jira/Ticket/<?= $project ?>/<?= $release ?>"><?= $ticket ?></a></li>
					<li>Ticket Details</li>
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
							<a class="navbar-brand" href="javascript:;"><?= $project ?></a>
						</div>
						<!-- /.navbar-collapse -->
					</div>
				</div>
				<div class="col-md-12">
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								Main Menu
							</div>
						</div>
						<div class="portlet-body ">
							<form class="form-inline">
								<div class="form-body">
									<div class="form-group">
										<button id ="overview" class="btn" style='background:white'><i class="icon-layers"></i>Overview</button>
										<button id ="manage_ticket" class="btn" style='background:white'><i class="fa fa-calendar"></i>Ticket Schedule</button>
										<button id ="test_cases" class="btn" style='background:white'><i class="fa fa-newspaper-o"></i>Test Cases</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class='overview'>
					<div class="col-md-3">
						<div class="portlet light">
							<div class="portlet-title">
								<div class="caption">
									<?= $ticket ?> - Overview
								</div>
							</div>
							<div class="portlet-body">
								<table class='table table-bordered'>
									<tbody>
										<tr>
											<th>Status</th>
										</tr>
										<tr>
											<td width='20%'>QBIT</td>
											<td width='80%'><?= $ticketDetails['qbit_status'];?></td>
										</tr>
										<tr>
											<td width='20%'>Jira</td>
											<td width='80%'><?= $ticketDetails['jira_status'];?></td>
										</tr>
										<tr>
											<td width='20%'>Resolution</td>
											<td width='80%'><?= $ticketDetails['resolution'];?></td>
										</tr>
										<tr>
											<td width='20%'>Priority</td>
											<td width='80%'><?= $ticketDetails['priority'];?></td>
										</tr>
									</tbody>
								</table>
								<table class='table table-bordered'>
									<tbody>
										<tr>
											<th>Test Cases</th>
										</tr>
										<tr>
											<td>Total Scenario</td>
											<td>123</td>
										</tr>
										<tr>
											<td>Pass</td>
											<td><label class='badge badge-success badge-roundless'>1</label></td>
										</tr>
										<tr>
											<td>Fail</td>
											<td><label class='badge badge-danger badge-roundless'>	1</label></td>
										</tr>
										<tr>
											<td>Pending</td>
											<td><label class='badge bg-yellow-saffron badge-roundless'>	1</label></td>
										</tr>
										<tr>
											<td>Not Started</td>
											<td><label class='badge badge-default badge-roundless'>	1</label></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="col-md-9">
						<div class="portlet light">
							<div class="portlet-title">
								<div class="caption">
								Details
								</div>
							</div>
							<div class="portlet-body">
								<div class='row'>
									<div class='col-md-9'>
										<table class='table table-bordered'>
											<tbody>
												<tr>
													<th>Jira Details</th>
												</tr>
												<tr>
													<td>Summary</td>
													<td><?= $ticketDetails['summary'];?></td>
												</tr>
												<tr>
													<td>Component</td>
													<td><?= $ticketDetails['component'];?></td>
												</tr>
												<tr>
													<td>Assignee</td>
													<td><?= $ticketDetails['assignee'];?></td>
												</tr>
												<tr>
													<td>Reporter</td>
													<td><?= $ticketDetails['reporter'];?></td>
												</tr>
												<tr>
													<td>Tester</td>
													<td><?= $ticketDetails['tester'];?></td>
												</tr>
											</tbody>
										</table>
										<div class='row'>
											<div class='col-md-12'>
												<table class='table table-bordered'>
													<tbody>
														<tr>
															<th>Comments</th>
														</tr>
														<tr>
															<td>[09/03/15]: TC creation done.</td>
															<td>Paulo Suero</td>
														</tr>
														<tr>
															<td>[09/03/15]: TC creation done.</td>
															<td>Paulo Suero</td>
														</tr>
														<tr>
															<td>[09/03/15]: TC creation done.</td>
															<td>Paulo Suero</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<div class='col-md-3'>
										<table class='table table-bordered'>
											<tbody>
												<tr>
													<th>Estimated</th>
												</tr>
												<tr>
													<td>TC Creation (Days)</td>
													<td><?= $ticketDetails['tc_creation'];?></td>
												</tr>
												<tr>
													<td>TC Execution (Days)</td>
													<td><?= $ticketDetails['tc_execution'];?></td>
												</tr>
												<tr>
													<td>Total</td>
													<td><?= $ticketDetails['tc_estimated'];?></td>
												</tr>
											</tbody>
										</table>
										<table class='table table-bordered'>
											<tbody>
												<tr>
													<th>Actual</th>
												</tr>
												<tr>
													<td>TC Creation (Days)</td>
													<td>1</td>
												</tr>
												<tr>
													<td>TC Execution (Days)</td>
													<td>1</td>
												</tr>
												<tr>
													<td>Total</td>
													<td>1</td>
												</tr>
											</tbody>
										</table>
										<table class='table table-bordered'>
											<tbody>
												<tr>
													<th>Timestamps</th>
												</tr>
												<tr>
													<td>Created at</td>
													<td><?= $ticketDetails['created_at'];?></td>
												</tr>
												<tr>
													<td>Updated at</td>
													<td><?= $ticketDetails['updated_at'];?></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class='manage_ticket'>
					<div class="col-md-12 col-sm-12">
						<div class="portlet light">
							<div class="portlet-title">
								<div class="caption">
									Calendar
								</div>
								<div class="tools">
									<a title="" data-original-title="" href="" class="fullscreen"></a>
								</div>
							</div>
							<div class="portlet-body">
								<label>	Legend: </label>&nbsp
								<div class="label label-sm" style='background-color:green;'>
									<b> Estimated Test Creation </b>
								</div>
								&nbsp
								<div class="label label-sm" style='background-color:red;'>
									<b> Estimated Test Execution </b>
								</div>
								&nbsp
								<div class="label label-sm" style='background-color:darkblue;'>
									<b>Actual Test Creation</b>
								</div>
								&nbsp
								<div class="label label-sm" style='background-color:darkred;'>
									<b> Actual Test Execution </b>
								</div>
								<div id="calendar" style='margin-top:10px;' >
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class='test_cases'>
					<div class="col-md-3">
						<div class="portlet light">
							<div class="portlet-title">
								<div class="caption">
									Manage
								</div>
							</div>
							<div class="portlet-body">
								<div class="clearfix" style='margin-top:-10px'>
									<h4 class="block">New Test Cases</h4>
									<div class="btn-group">
										<button type="button" class="btn btn-md" style='background:white'><i class="fa fa-plus"></i> Add New TC</button>
										<button type="button" class="btn btn-md" style='background:white'><i class="fa fa-cogs"></i> Add From Main</button>
									</div>
								</div>
								<div class="clearfix">
									<h4 class="block">Browser</h4>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-9">
						<div class="row">
							<div class='col-md-12'>
								<div class="portlet box blue">
									<div class="portlet-title">
										<div class="caption">
											Summary
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
												<td>1</td>
												<td>2</td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class='col-md-12'>
								<div class="portlet light">
									<div class="portlet-title">
										<div class="caption">
										Execution
										</div>
									</div>
									<div class="portlet-body">
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

	<div id="fullCalModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
					<h4 id="modalTitle" class="modal-title"></h4>
				</div>
				<div id="modalBody" class="modal-body"></div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<!-- <a href="" class="btn btn-primary">Event Page</a> -->
				</div>
			</div>
		</div>
	</div>

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
<script type="text/javascript" src="assets/global/plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script src="assets/global/plugins/moment/moment-with-locales.min.js"></script>
<script src="assets/global/plugins/moment/moment-duration-format.js"></script>
<script src="assets/global/plugins/fullcalendar/fullcalendar.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/bootstrap-datetimepicker-master/build/js/bootstrap-datetimepicker.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="assets/admin/layout6/scripts/layout.js" type="text/javascript"></script>
<script src="assets/admin/layout6/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="assets/admin/layout6/scripts/index.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/table-advanced.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {
   	Metronic.init(); // init metronic core componets
   	Layout.init(); // init layout
	TableAdvanced.init();
});

$(".manage_ticket").hide();
$(".test_cases").hide();

$("#manage_ticket").click(function( event ){
	event.preventDefault();  // Prevents the default behavior
	//	and event bubbling is still intact
	$(".overview").hide();
	$(".test_cases").hide();
	$(".manage_ticket").show();
	$('#calendar').fullCalendar('render');
});

$('#calendar').fullCalendar({
	// put your options and callbacks here
	height : 450,
	droppable : false,
	displayEventEnd : true,
	displayEventTime : true,
	nextDayThreshold : '00:00:00',
	timeFormat : 'H(:mm)',
	editable : false,
	eventSources : [{
				url : 'Calendar/userScheduleCreation',
				type :"post",
				color : 'green',
				data : {
					jid : <?=$ticketID ?>
				},
				allDay : true
			}, {
				url : 'Calendar/userScheduleExecution',
				type : "post",
				color : 'red',
				data : {
					jid : <?=$ticketID ?>
				},
				allDay : true
			}
		],
	eventClick : function(event, jsEvent, view) {
		var eventStart = moment(event.start).format("MMMM DD, YYYY - [Time:] H:mm");
		var eventEnd   = moment(event.end).format("MMMM DD, YYYY - [Time:] H:mm");
		$('#modalTitle').html(event.title);
		$('#modalBody').html("Summary:<br>" + event.description + "<br><br>Start: " + eventStart + "<br>" + "End:&nbsp  " + eventEnd);
		$('#start_date').html(event.end);
		$('#fullCalModal').modal();
    }
});

$("#overview").click(function( event ){
	event.preventDefault();  // Prevents the default behavior
	// and event bubbling is still intact
	$(".test_cases").hide();
	$(".manage_ticket").hide();
	$(".overview").show();
});

$("#test_cases").click(function( event ){
	event.preventDefault();  // Prevents the default behavior
	//	and event bubbling is still intact
	$(".overview").hide();
	$(".manage_ticket").hide();
	$(".test_cases").show();
});
</script>
<!-- END JAVASCRIPTS -->

</body>

<!-- END BODY -->
</html>