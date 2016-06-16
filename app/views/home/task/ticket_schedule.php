<?php

	$release_name = $data['release_name'];
	$ticket = $data['ticket'];
	$ticketID = $data['ticketID'];
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
			<a href="Home/Dashboard">
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
					<li><a href="Home/Dashboard">Home</a></li>
					<li><a href="Home/Tasks">My Tasks</a></li>
					<li>Ticket Schedule</li>
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

							foreach($data['projects'] as $projects)
							{

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

			<div class="col-md-12" style='margin-bottom:-40px'>
						<!-- BEGIN PORTLET-->
						<div class="portlet light bordered">
							<div class="portlet-title tabbable-line">
								<div class="caption font-blue">
									<i class="fa fa-calendar-o font-blue"></i>
									<span class="caption-subject theme-font bold uppercase"><?= $ticket ?> - Ticket Schedule</span>
								</div>

							</div>
							<hr style='margin-top:0px'></hr>
							<div class="portlet-body">
							<div class='row' style='margin-top:-5px'>
								<div class="col-md-4 col-sm-4 col-xs-4">
								<ul class="nav nav-tabs">
								<li class="active">
									<a href="#creation" data-toggle="tab">
									TC Creation </a>
								</li>
								<li>
									<a href="#execution" data-toggle="tab">
									TC Execution </a>
								</li>
								<li>
									<a href="#summary" data-toggle="tab">
									Summary </a>
								</li>
							</ul>

							<form class='form-horizontal' method= 'post' id = "schedule_form">
							<div class="tab-content">
								<div class="tab-pane fade active in" id="creation">
									<table class='table'>
							<tbody>
								<tr>
								<th>Test Case Creation</th>
								</tr>


								<tr>
								<td>
								<div class="input-group date date-picker margin-bottom-5" >
											<input type="text" class="form-control datepicker form-filter getdays" id="creation_start" name="tcc_start_date" placeholder="TC Creation Start">
											<span class="input-group-btn">
											<button class="btn  default" type="button"><i class="fa fa-calendar"></i></button>
											</span>
										</div>
								</td>
								</tr>
								<tr>
								<td>
								<div class="input-group date date-picker margin-bottom-5" >
											<input type="text" class="form-control  form-filter " id="creation_end" readonly name="tcc_end_date" placeholder="TC Creation End">
											<span class="input-group-btn">
											<button class="btn default" type="button" disabled><i class="fa fa-calendar"></i></button>
											</span>
										</div>
								</td>

								</tr>




								</tbody>
								</table>


								<table class='table'>
								<tbody>

								<tr>
								<td width='20%'><label class='control-label'>FLOE<label></td>
								<td width='80%'>
								<select class='form-control getdays' id='floe_creation' name='tcc_floe'>
								<option value='120' selected>1 - Easiest (0.25)</option>
								<option value='240'>2 - Fairly Easy (0.50)</option>
								<option value='360'>3 - Normal Effort (0.75)</option>
								<option value='480'>5 - Little More Than Normal (1.00)</option>
								<option value='600'>8 - Above the Average Effort (1.25)</option>
								<option value='720'>13 - Significant Effort (1.50)</option>
								<option value='840'>21 - Extreme Effort (1.75)</option>

								</select>
								</td>
								</tr>

								<tr>
								<td width='20%'><label class='control-label'>Complexity<label></td>
								<td width='80%'>
								<select class='form-control getdays' id='complexity_creation' name='tcc_complexity'>
								<option value='1' selected>Easy (1x)</option>
								<option value='2'>Normal (2x)</option>
								<option value='3'>Hard (3x)</option>

								</select>
								</td>
								</tr>

								</tbody>
								</table>

								</div>
								<div class="tab-pane fade" id="execution">

								<table class='table'>
							<tbody>
								<tr>
								<th>Test Case Execution</th>
								</tr>


								<tr>
								<td>
								<div class="input-group date date-picker margin-bottom-5" >
											<input type="text" class="form-control datepicker form-filter getdays" id="execution_start" name="tce_start_date" placeholder="TC Execution Start">
											<span class="input-group-btn">
											<button class="btn  default" type="button"><i class="fa fa-calendar"></i></button>
											</span>
										</div>
								</td>
								</tr>
								<tr>
								<td>
								<div class="input-group date date-picker margin-bottom-5" >
											<input type="text" class="form-control  form-filter " readonly name="tce_end_date" id = "execution_end" placeholder="TC Execution End">
											<span class="input-group-btn">
											<button class="btn default" type="button" disabled ><i class="fa fa-calendar"></i></button>
											</span>
										</div>
								</td>

								</tr>




								</tbody>
								</table>


								<table class='table'>
								<tbody>

								<tr>
								<td width='20%'><label class='control-label'>FLOE<label></td>
								<td width='80%'>
								<select class='form-control getdays' id='floe_execution' name='tce_floe'>
								<option value='120' selected>1 - Easiest (0.25)</option>
								<option value='240'>2 - Fairly Easy (0.50)</option>
								<option value='360'>3 - Normal Effort (0.75)</option>
								<option value='480'>5 - Little More Than Normal (1.00)</option>
								<option value='600'>8 - Above the Average Effort (1.25)</option>
								<option value='720'>13 - Significant Effort (1.50)</option>
								<option value='840'>21 - Extreme Effort (1.75)</option>

								</select>
								</td>
								</tr>

								<tr>
								<td width='20%'><label class='control-label'>Complexity<label></td>
								<td width='80%'>
								<select class='form-control getdays' id='complexity_execution' name='tce_complexity'>
								<option value='1' selected>Easy (1x)</option>
								<option value='2'>Normal (2x)</option>
								<option value='3'>Hard (3x)</option>

								</select>
								</td>
								</tr>

								<tr>
								<td width='20%'><label class='control-label'>Job Process<label></td>
								<td width='80%'>
								<select class='form-control getdays' id='job_process' name='job_process'>
								<option value='0' selected>N/A</option>
								<option value='720'>0.5 Day</option>
								<option value='1080'>0.75 Day</option>
								</select>
								</td>
								</tr>


								</tbody>
								</table>
							</div>

							<div class="tab-pane fade" id="summary">

							<table class='table table-bordered'>
							<tbody>
							<tr>
								<th>Test Case Creation</th>
							</tr>

							<tr>
								<td>FLOE</td>
								<td id='summary_floe_creation'></td>
							</tr>
							<tr>
								<td>Complexity</td>
								<td id='summary_complexity_creation'></td>
							</tr>
							<tr>
								<td width='50%'>Test Case Creation (Days)</td>
								<td width='50%' id="tcc" ></td>
							</tr>

							</tbody>
							</table>

							<table class='table table-bordered'>
							<tbody>
							<tr>
								<th>Test Case Execution</th>
							</tr>

							<tr>
								<td>FLOE</td>
								<td id='summary_floe_execution'></td>
							</tr>
							<tr>
								<td>Complexity</td>
								<td id='summary_complexity_execution'></td>
							</tr>
							<tr>
								<td width='50%'>Job Process (Days)</td>
								<td width='50%' id="s_job_process" ></td>
							</tr>
							<tr>
								<td width='50%'>Test Case Execution (Days)</td>
								<td width='50%' id="tcd" ></td>
							</tr>

							</tbody>
							</table>

							<table class='table table-bordered'>
							<tbody>
							<tr>
								<td width='50%'>Total Days</td>
								<td width='50%' id="total_days" ></td>
							</tr>
							</tbody>
							</table>
							<input type='hidden' name='ticket_id' value="<?= $ticketID ?>">


							</div>

							</div>
							<input type='submit' class='btn btn-block blue' value='Apply Changes'>
								</div>

							</form>
								<div class="col-md-8 col-sm-8 col-xs-8">
                                     <div id="calendar">
									 </div>
                                </div>

							</div>
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


var hrs = [0,1,2,3,4,5,6,7,8];
var hrs2 = [20,21,22,23,24];
// alert(Math.max.apply(null,hrs));
var merge = $.merge(hrs,hrs2);

$('#schedule_form').on('submit' , function(e) {
	e.preventDefault();

	var formdata = $(this).serialize();
	var form = {};

	$.each($(this).serializeArray(), function (i, field) {
		form[field.name] = field.value || "";
		});

	if(moment(form.tcc_start_date).format('HH:mm') == "00:00" || moment(form.tce_start_date).format('HH:mm') == "00:00" )
	{
		alert("Can't enter time as 00:00. Please enter a valid business time!");
		return false;
	}

	else if(moment(form.tcc_start_date) > moment(form.tce_start_date))
	{
		alert("TC Execution should not be scheduled before TC Creation!");
		return false;
	}

	$.ajax({
		url : "Jira/updateTicketEstimated",
		type: "POST",
		data : formdata,
		success: function(response)
		{
			  response = JSON.parse(response);

			 if(response.error == "null")
			 {
				 alert(response.data + " is empty");
				 return false;
			 }

			 alert('Schedule Updated!');
			$('#calendar').fullCalendar( 'refetchEvents' )

		}

	});


});

$('#calendar').fullCalendar({
        // put your options and callbacks here
		height: 500,
		droppable: true,
		displayEventEnd:true,
		displayEventTime:true,
		nextDayThreshold:'00:00:00',
		timeFormat: 'H(:mm)',
		editable:true,

		eventDrop: function(event, delta, revertFunc) {

		var now = moment(moment().format("YYYY-MM-DD HH:mm"));
		var drag_start = moment(moment(event.start).format("YYYY-MM-DD HH:mm"));
		if( (event.type == "creation") && (moment(event.start).isAfter(event.restricted_start)))
		{
			alert("TC Creation should not be scheduled after TC Execution!");
			 revertFunc();
			return false;
		}

		if( (event.type == "execution") && (moment(event.start).isBefore(event.restricted_start)))
		{
			alert("TC Execution should not be scheduled before TC Execution!");
			 revertFunc();
			return false;
		}


		if(drag_start.isBefore(now))
		{
			 alert("Can't assign to previous dates!");
			 revertFunc();
			 return false;
		}

		if(drag_start.isoWeekday() == 6 || drag_start.isoWeekday() == 7  )
		{
			alert("Can't assign to weekends!");
			 revertFunc();
			 return false;

		}



        if (!confirm("Are you sure about this change?")) {
            revertFunc();
        }
		else
		{
			var floe = event.floe;
			var complexity = event.complexity;
			var days = Number(floe)*Number(complexity);
			var start = moment(event.start).format("YYYY-MM-DD HH:mm");

			var i ;
			var hrs = moment.duration(days, 'minutes').format('h'); // hours to be added in start date
			var startdate = moment(start); // start date where you drag the event
			var enddate ; // current value of end date . (to be iterated by the value of hrs)
			var format; // current hour of end date.
			var business_end  = 19; // business ends in 19:00 or 7pm.
			var ctr = 0; // counter to count hours added in the current day.
			var working_hours = 9 // Number of working hours per day. (Value is 8 hours (Add 1 to the value of real working hours. 8+1 = 9)))
			var difference; // difference of current hour to 1 day
			for (i = 1; i <=Number(hrs) ; i++)
			{

				ctr++ ;
				format = moment(enddate).format("HH");

				if(ctr == working_hours)
				{

					difference = (24-Number(format)+9);

					enddate = startdate.add(difference, 'h').format("YYYY-MM-DD HH:mm") ;
					ctr = 0;
				}


				if(format >= business_end)
				{

					enddate = startdate.add(14, 'h').format("YYYY-MM-DD HH:mm") ;
					ctr = 0;
				}

				enddate = startdate.add(1, 'h').format("YYYY-MM-DD HH:mm") ;

				var day = moment(enddate);
				if(day.isoWeekday() == 6)
				{
					enddate = startdate.add(2, 'd').format("YYYY-MM-DD HH:mm") ;
				}

			}

			var end = moment(enddate).format("YYYY-MM-DD HH:mm");
			$.ajax({
				url : "Jira/updateTicketEstimatedDrag",
				type: "POST",
				data : {id: event.t_id, start:start, end:end, type:event.type},
				success: function(data)
				{
					$('#calendar').fullCalendar( 'refetchEvents' )
					alert('Changes has been saved!');
				}
			});
			$('#calendar').fullCalendar('rerender');
		}

    },

		eventSources:
		[
			{
				url: 'Calendar/userScheduleCreation',
				type:"post",
				color: 'green',
				data:{jid:<?=$ticketID ?>},
				allDay: true


			},
			{
				url: 'Calendar/userScheduleExecution',
				type:"post",
				color: 'red',
				data:{jid:<?=$ticketID ?>},
				allDay: true
			}
		],
		eventClick:  function(event, jsEvent, view) {

			var eventStart = moment(event.start).format("MMMM DD, YYYY - [Time:] H:mm");
            var eventEnd   = moment(event.end).format("MMMM DD, YYYY - [Time:] H:mm");
            $('#modalTitle').html(event.title);
            $('#modalBody').html("Summary:<br>" +event.description + "<br><br>Start: " + eventStart + "<br>" + "End:&nbsp  " + eventEnd);
			$('#start_date').html(event.end);
/*            $('#eventUrl').attr('href',event.url); */
            $('#fullCalModal').modal();
        }

});

$('.getdays').on('dp.change', function () {
	var start = document.getElementById('creation_start').value;
	var start_e = document.getElementById('execution_start').value;

	var creation_days = 0;
	var execution_days = 0;
	if(start !== ""){
	var x = document.getElementById('floe_creation').value;
	var y = document.getElementById('complexity_creation').value;
	creation_days = x*y;

	var i ;
	var hrs = moment.duration(creation_days, 'minutes').format('h');
	var startdate = moment(start);
	var enddate ;
	var format;
	ctr = 0;
			for (i = 1; i <=Number(hrs) ; i++)
			{

				ctr++ ;
				if(ctr == 9)
				{
					enddate = startdate.add(15, 'h').format("YYYY-MM-DD HH:mm") ;
					ctr = 0;
				}

				format = moment(enddate).format("HH");
				if(format>=19)
				{
					enddate = startdate.add(14, 'h').format("YYYY-MM-DD HH:mm") ;
					ctr = 0;
				}

				enddate = startdate.add(1, 'h').format("YYYY-MM-DD HH:mm") ;

				var day = moment(enddate);
				if(day.isoWeekday() == 6)
				{
					enddate = startdate.add(2, 'd').format("YYYY-MM-DD HH:mm") ;
				}

			}


	$('#creation_end').val(enddate);

	var tcc = moment.duration(creation_days, 'minutes').format("h");
	tcc = Number(tcc)/8;
	$('#tcc').text(tcc);
	}

	if(start_e !== ""){
	var x = document.getElementById('floe_execution').value;
	var y = document.getElementById('complexity_execution').value;
	var z = document.getElementById('job_process').value;
	execution_days = (x*y);

	var i ;
	var hrs = moment.duration(execution_days, 'minutes').format('h');
	var startdate = moment(start_e);
	var enddate ;
	var format;
	ctr = 0;
			for (i = 1; i <=Number(hrs) ; i++)
			{

				ctr++ ;
				if(ctr == 9)
				{
					enddate = startdate.add(15, 'h').format("YYYY-MM-DD HH:mm") ;
					ctr = 0;
				}

				format = moment(enddate).format("HH");
				if(format>=19)
				{
					enddate = startdate.add(14, 'h').format("YYYY-MM-DD HH:mm") ;
					ctr = 0;
				}

				enddate = startdate.add(1, 'h').format("YYYY-MM-DD HH:mm") ;

				var day = moment(enddate);
				if(day.isoWeekday() == 6)
				{
					enddate = startdate.add(2, 'd').format("YYYY-MM-DD HH:mm") ;
				}

			}

	 $('#execution_end').val(enddate);

	var tcd = moment.duration(execution_days, 'minutes').format("h");
	tcd = Number(tcd)/8;
	$('#tcd').text(tcd);
	}

	// set summary  floe creation
	var sfc = $('#floe_creation :selected').text();
	 $('#summary_floe_creation').text(sfc);

	 // set summary  floe creation
	var sfc = $('#complexity_creation :selected').text();
	 $('#summary_complexity_creation').text(sfc);

	 // set summary  floe creation
	var sfc = $('#floe_execution :selected').text();
	 $('#summary_floe_execution').text(sfc);

	 // set summary  floe creation
	 var sfc = $('#complexity_execution :selected').text();
	 $('#summary_complexity_execution').text(sfc);

	 var sjb = $('#job_process :selected').text();
	 var sjb_value = $('#job_process :selected').val();
	 var val = moment.duration(Number(sjb_value), 'minutes').format("h [hours]");
	 $('#s_job_process').text(sjb + ' - (' +val+ ')');

	 total = execution_days + creation_days;
	 var totaldays = moment.duration(total, 'minutes').format("h");
	 totaldays = Number(totaldays)/8;
	 var jobtext;
	 if(val == "0 hours")
	 {
		 jobtext = "";
	 }
	 else
	 {
		  jobtext = "and " + val + " Job Process";
	 }
	 $('#total_days').text(totaldays + ' Working Days ' + jobtext);
});


$('.getdays').on('change', function () {
	var start = document.getElementById('creation_start').value;
	var start_e = document.getElementById('execution_start').value;

	var creation_days = 0;
	var execution_days = 0;
	if(start !== ""){
	var x = document.getElementById('floe_creation').value;
	var y = document.getElementById('complexity_creation').value;
	creation_days = x*y;

	var i ;
	var hrs = moment.duration(creation_days, 'minutes').format('h');
	var startdate = moment(start);
	var enddate ;
	var format;
	ctr = 0;
			for (i = 1; i <=Number(hrs) ; i++)
			{

				ctr++ ;
				if(ctr == 9)
				{
					enddate = startdate.add(15, 'h').format("YYYY-MM-DD HH:mm") ;
					ctr = 0;
				}

				format = moment(enddate).format("HH");
				if(format>=19)
				{
					enddate = startdate.add(14, 'h').format("YYYY-MM-DD HH:mm") ;
					ctr = 0;
				}

				enddate = startdate.add(1, 'h').format("YYYY-MM-DD HH:mm") ;

				var day = moment(enddate);
				if(day.isoWeekday() == 6)
				{
					enddate = startdate.add(2, 'd').format("YYYY-MM-DD HH:mm") ;
				}

			}


	$('#creation_end').val(enddate);

	var tcc = moment.duration(creation_days, 'minutes').format("h");
	tcc = Number(tcc)/8;
	$('#tcc').text(tcc);
	}

	if(start_e !== ""){
	var x = document.getElementById('floe_execution').value;
	var y = document.getElementById('complexity_execution').value;
	var z = document.getElementById('job_process').value;
	execution_days = (x*y);

	var i ;
	var hrs = moment.duration(execution_days, 'minutes').format('h');
	var startdate = moment(start_e);
	var enddate ;
	var format;
	ctr = 0;
			for (i = 1; i <=Number(hrs) ; i++)
			{

				ctr++ ;
				if(ctr == 9)
				{
					enddate = startdate.add(15, 'h').format("YYYY-MM-DD HH:mm") ;
					ctr = 0;
				}

				format = moment(enddate).format("HH");
				if(format>=19)
				{
					enddate = startdate.add(14, 'h').format("YYYY-MM-DD HH:mm") ;
					ctr = 0;
				}

				enddate = startdate.add(1, 'h').format("YYYY-MM-DD HH:mm") ;

				var day = moment(enddate);
				if(day.isoWeekday() == 6)
				{
					enddate = startdate.add(2, 'd').format("YYYY-MM-DD HH:mm") ;
				}

			}

	 $('#execution_end').val(enddate);

	var tcd = moment.duration(execution_days, 'minutes').format("h");
	tcd = Number(tcd)/8;
	$('#tcd').text(tcd);
	}

	// set summary  floe creation
	var sfc = $('#floe_creation :selected').text();
	 $('#summary_floe_creation').text(sfc);

	 // set summary  complexity creation
	var sfc = $('#complexity_creation :selected').text();
	 $('#summary_complexity_creation').text(sfc);

	 // set summary  floe execution
	var sfc = $('#floe_execution :selected').text();
	 $('#summary_floe_execution').text(sfc);

	 // set summary  complexity execution
	 var sfc = $('#complexity_execution :selected').text();
	 $('#summary_complexity_execution').text(sfc);

	 var sjb = $('#job_process :selected').text();
	 var sjb_value = $('#job_process :selected').val();
	 var val = moment.duration(Number(sjb_value), 'minutes').format("h [hours]");
	 $('#s_job_process').text(sjb + ' - (' +val+ ')');

	 total = execution_days + creation_days;
	 var totaldays = moment.duration(total, 'minutes').format("h");
	 totaldays = Number(totaldays)/8;

	 var jobtext;
	 if(val == "0 hours")
	 {
		 jobtext = "";
	 }
	 else
	 {
		  jobtext = "and " + val + " Job Process";
	 }
	 $('#total_days').text(totaldays + ' Working Days ' + jobtext);
});


$('#creation_start').datetimepicker({
	icons: { close:'glyphicon glyphicon-ok'},
	format: "YYYY-MM-DD HH:mm",
	useCurrent:false,
	minDate:new Date(),
	sideBySide:true,
	showClose:true,
	toolbarPlacement: 'bottom',
	daysOfWeekDisabled: [0,6],
	disabledHours:merge,
	useStrict:true,
	keepInvalid:false
});

$('#execution_start').datetimepicker({
	icons: { close:'glyphicon glyphicon-ok'},
	format: "YYYY-MM-DD HH:mm",
	useCurrent:false,
	minDate:new Date(),
	sideBySide:true,
	showClose:true,
	toolbarPlacement: 'bottom',
	daysOfWeekDisabled: [0,6],
	disabledHours:merge,
	useStrict:true,
	keepInvalid:false
});



</script>
<!-- END JAVASCRIPTS -->

</body>

<!-- END BODY -->
</html>
