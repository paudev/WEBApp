<?php
	$release_name = $data['release_name'];
	$release_id = $data['release_id'];
	$ticket = $data['ticket'];
	$ticketID = $data['ticketID'];
	$currentTC = $data['currentTC'];
	$project_id = $data['project_id'];
	$browsers = $data['browsers'];
	$decode_browser = json_decode($browsers, true);
	$ticketResults = $data['ticketResults'];
	$screenshots = $data['screenshots'];
	$selectedBrowserID = -1;
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
<link href="assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-datetimepicker-master/build/css/bootstrap-datetimepicker.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css"/>
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
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
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
					<li><a id="my_task_link" href="Home/Tasks">My Tasks</a></li>
					<li><?= $ticket ?> - Test Case Execution</li>
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
				<div class="col-md-12" style='margin-bottom:-40px'>
					<!-- BEGIN PORTLET-->
					<div class="portlet light bordered">
						<div class="portlet-title tabbable-line">
							<div class="caption font-blue">
								<i class="fa fa-calendar-o font-blue"></i>
								<span class="caption-subject theme-font bold uppercase"><?= $ticket ?> - Test Case Execution</span>
							</div>
							<ul class="nav nav-tabs">
								<li class="active">
									<a href="#tab_a_a" data-toggle="tab">
									<b>Execution</b></a>
								</li>
								<li>
									<a href="#tab_a_b" data-toggle="tab">
									<b>Summary</b></a>
								</li>
							</ul>
						</div>

						<hr></hr>
						<div class="col-md-12">
							<div class="portlet box blue">
								<div class="portlet-title">
									<div class="caption">
										<i class="fa fa-cog"></i>Manage Browser
									</div>
									<div class="tools">
										<a title="" data-original-title="" href="javascript:;" class="collapse">
										</a>
									</div>
								</div>
								<div class="portlet-body" style="padding-top:10px">
									<form id= "manage_browser" method="post">
										<input type="hidden" id="browsers" class=" input-md" name="browsers">
										<input type="hidden" class=" input-md" name="ticket_id" value="<?= $ticketID?>">
										<input type="hidden" class=" input-md" name="ticket" value="<?= $ticket?>">
										<input type="hidden" class=" input-md" name="release_id" value="<?= $release_id?>">
										<input type="submit" class="btn blue input-md">
									</form>
								</div>
							</div>
						</div>

			<div class="portlet-body">
				<!--BEGIN TABS-->
				<div class="tab-content"  style='margin-top:-15px'>
					<div class="tab-pane active" id="tab_a_a">
						<hr></hr>
						<div class="scroller" style="height: 500px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
							<div class="col-md-12">
								<div class="col-md-3 col-sm-3 col-xs-3">
									<ul class="nav nav-tabs tabs-left">
									<?php
										if(!count($currentTC) == 0) {
											echo "<h3><b>Test Cases</b></h3>";
											foreach($currentTC as $k=>$ctc) {
												$active = ($k == 0) ? "active" : "";
												echo ' <li class="'.$active.'">
													   <a aria-expanded="true" href="#'.$ctc['tc_id']."_".$ctc['ts_id'].'" data-toggle="tab">'.$ctc['tc_id']."<br>".$ctc['ts_id'].'</a>
													   </li>';
											}
										} else {
											echo '<h3><i>No Test Case Available.</i></h3>';
										}
									?>
									</ul>
								</div>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<div class="tab-content">
									<?php
										$testCaseCounter = 0;
										foreach($currentTC as $k=>$ctc) {
											$active = ($k == 0) ? "active in" : "fade";
											echo '<div class="tab-pane ' . $active . '" id="' . $ctc['tc_id'] . "_" . $ctc['ts_id'] . '">
													<div class="btn-group margin-bottom-10 pull-right">
														<a aria-expanded="false" class="btn blue" href="javascript:;" data-toggle="dropdown">
															<i class="fa fa-user"></i> Action <i class="fa fa-angle-down"></i>
														</a>
														<ul class="dropdown-menu">
															<li>
																<a class="editdetails" href="javascript:;" >
																<i class="fa fa-trash-o"></i> Edit </a>
															</li>
														</ul>
													</div>
													<h3><b>Definition</b></h3>
													<div class="row">
														<div class="col-md-12">
															<table class="table table-bordered" id = "jira_creation_table">
																<tbody>
																	<tr>
																		<td width="30%"><b>Test Case ID</b></td>
																		<td width="70%">' . $ctc['tc_id'] . "_" . $ctc['ts_id'] . '</td>
																	</tr>
																	<tr>
																		<td width="30%"><b>Description/Objective</b></td>
																		<td width="70%">' . $ctc['desc_obj'] . '</td>
																	</tr>
																	<tr>
																		<td width="30%"><b>Test Steps</b></td>
																		<td width="70%"><a href="javascript:;" data-placement="right" class="test_steps" data-type="textarea" data-name="test_steps" data-url="Project/updateTestCase" data-pk="'.$ctc['tcd_id'].'" >'.$ctc['test_steps'].'</td>
																	</tr>
																	<tr>
																		<td width="30%"><b>Expected Results</b></td>
																		<td width="70%"><a href="javascript:;" data-placement="right" class="expected_results" data-type="textarea" data-name="expected_results" data-url="Project/updateTestCase" data-pk="'.$ctc['tcd_id'].'" >'.$ctc['expected_results'].'</td>
																	</tr>
																	<tr>
																		<td width="30%"><b>Test Data</b></td>
																		<td width="70%"><a href="javascript:;" data-placement="right" class="test_data" data-type="textarea" data-name="test_data" data-url="Project/updateTestCase" data-pk="'.$ctc['tcd_id'].'" >'.$ctc['test_data'].'</a></td>
																	</tr>
																</tbody>
															</table>

															<table class="table table-bordered">
																<tbody>
																	<tr>
																		<td width="10%"><b>Scope</b></td>
																		<td width="40%">' . $ctc['scope_of_test'] . '</td>
																		<td width="10%"><b>Type</b></td>
																		<td width="40%">' . $ctc['type_of_test'] . '</td>
																	</tr>
																</tbody>
															</table>

															<table class="table table-bordered" id="jira_creation_table">
																<tbody>
																	<tr>
																		<td width="30%"><b>Actual Results</b></td>
																		<td width="70%"><a href="javascript:;" data-placement="right" class="actual_results" data-type="textarea" data-name="actual_results" data-url="Project/updateTestCase" data-pk="'.$ctc['tcd_id'].'" >'.$ctc['actual_results'].'</a></td>
																	</tr>
																	<tr>
																		<td width="30%"><b>Comments</b></td>
																		<td width="70%"><a href="javascript:;" data-placement="right" class="tc_comments" data-type="textarea" data-name="tc_comments" data-url="Project/updateTestCase" data-pk="'.$ctc['tcd_id'].'" >'.$ctc['tc_comments'].'</a></td>
																	</tr>
																</tbody>
															</table>
														</div>
													</div>
													<h3><b>Test Results</b></h3>
													<div class="row">
														<div class="col-md-12">
															<form class="updateTicketTCResult" method="post" action="Jira/updateTicketTCResult">
																<table class="table table-bordered" id="formtable">
																	<thead>
																		<tr>';
																			foreach($decode_browser as $b) {
																				echo '<th style="text-align:center" width="20%">' . $b['text'] . '</th>';
																			}
																		echo '</tr>
																	</thead>
																<tbody>
											';
																$_results = "";
																$_browsers = "";
																foreach($ticketResults as $tResults) {
																	if($tResults['test_case_detail_id'] == $ctc['test_case_detail_id']) {
																		$_results = $tResults['result'];
																		$_browsers = $tResults['browser_id'];
																		break;
																	}
																}

																$_consol = "";
																$_rr = explode(",", $_results);
																$_rb = explode(",", $_browsers);
																$count = count($_rb);

																for($i = 0; $i < $count; $i++) {
																	$_consol .= ($_rb[$i] . ":" . $_rr[$i]) . ";";
																}
																$_consol = substr($_consol, 0, strlen($_consol) - 1);
																echo "<script> console.log('Consol: " . $_consol . "'); </script>";

																/*
																This is a complicated set up of the dropdowns
																*/
																$browserCount = count($decode_browser);
																echo '<tr>';
																foreach($decode_browser as $b) {
																	//Displays array structure of decoded JSON
																	//echo print_r($b);
																	$_decodeConsol = explode(";", $_consol);
																	$consolLength = count($_decodeConsol);
																	echo
																		'<td name="browserResult">
																				<select style="font-size:11px" class="select2choices form-control" name="browser_result_' . $b['id'] . '">';
																					$outputResult = "";
																					for($i = 0; $i < $consolLength; $i++) {
																						$_explodeValue = explode(":", $_decodeConsol[$i]);
																						if($b['id'] == $_explodeValue[0]) {
																							$outputResult = $_explodeValue[1];
																						}
																					}
																					if($outputResult == "NOT STARTED") {
																						echo '<option style="font-size:11px" selected value="NOT STARTED">NOT STARTED</option>';
																					} else {
																						echo '<option style="font-size:11px" value="NOT STARTED">NOT STARTED</option>';
																					}

																					if($outputResult == "PASS") {
																						echo '<option style="font-size:11px" selected value="PASS">PASS</option>';
																					} else {
																						echo '<option style="font-size:11px" value="PASS">PASS</option>';
																					}

																					if($outputResult == "FAIL") {
																						echo '<option style="font-size:11px" selected value="FAIL">FAIL</option>';
																					} else {
																						echo '<option style="font-size:11px" value="FAIL">FAIL</option>';
																					}

																					if($outputResult == "PENDING") {
																						echo '<option style="font-size:11px" selected value="PENDING">PENDING</option>';
																					} else {
																						echo '<option style="font-size:11px" value="PENDING">PENDING</option>';
																					}
																				echo '</select>
																			</td>
																			<td class="hidden nr" id="browser_id">' . $b['id'] . '</td>
																		';
																}
																echo '</tr>';

																echo
																	'<tr>
																		<td colspan=2 class="hidden nr" id="test_case_detail_id">' . $ctc["test_case_detail_id"] .'</td>
																		<input type="hidden" name="tc_id" value="' . $ctc["tc_id"] . '">
																		<input type="hidden" name="ts_id" value="' . $ctc["ts_id"] . '">
																		<input type="hidden" name="ticket_id" value="' . $ticketID . '">
																		<input type="hidden" name="release_id" value="' . $release_id . '">
																		<input type="hidden" name="browser_count" value="' . $browserCount . '">
																		<input type="hidden" name="test_case_detail_id" value="' . $ctc["test_case_detail_id"] . '">
																		<td colspan=' . $browserCount . '>
																			<input type="submit" class="btn blue pull-right" value="Apply Result">
																		</td>
																	</tr>
																</tbody>
															</table>
														</form>
													</div>
												</div>
												<hr/>
												<div class="btn-group margin-bottom-10 pull-right">
													<a class="btn btn-s blue" href="#upload_test_case_screenshot" onclick="addUploadDetails(this)" data-tcid="' . $ctc['test_case_detail_id'] . '" data-testcase="' . $ctc['tc_id'] . '_' . $ctc['ts_id'] . '" data-toggle="modal" data-ticket="' . $ticket . '" data-release="' . $release_name . '" aria-expanded="false"><i class="glyphicon glyphicon-upload"></i> Upload Screenshot </a>
												</div>
												<h3><b>Screenshots</b></h3>
												<div class="row">
													<div class="col-md-12">
														<div>';
															$hasScreenshot = false;
															foreach($decode_browser as $db) {
																foreach($screenshots as $sc) {
																	if($sc['test_case_id'] == $ctc['test_case_detail_id'] && $sc['browser_id'] == $db['id']) {
																		$hasScreenshot = true;
																		break;
																	}
																}
																if($hasScreenshot) {
																	break;
																}
															}

															if($hasScreenshot) {
																echo '<ul class="nav nav-tabs">';

																$browserCounter = 0;
																foreach($decode_browser as $db) {
																	$hasExistingScreenshot = false;
																	foreach($screenshots as $sc) {
																		if($sc['test_case_id'] == $ctc['test_case_detail_id'] && $sc['browser_id'] == $db['id']) {
																			$hasExistingScreenshot = true;
																			break;
																		}
																	}
																	if($hasExistingScreenshot) {
																		echo ($browserCounter == 0) ? '<li class="active">' : '<li>';

																		echo '<a aria-expanded="true" href="#tab_' . $testCaseCounter . '_' . $browserCounter . '" data-toggle="tab">
																					<b>' . $db['text'] . '</b>
																				</a>
																		</li>';
																		$browserCounter++;
																	}
																}

																echo '</ul>';
															}
													echo '</div>
														<div class="tab-content">';
															$browserCounter = 0;
															$hasExisting = false;
															foreach($decode_browser as $db) {
																$hasScreenshot = false;
																foreach($screenshots as $sc) {
																	if($sc['test_case_id'] == $ctc['test_case_detail_id'] && $sc['browser_id'] == $db['id']) {
																		$hasScreenshot = true;
																		break;
																	}
																}
																if($hasScreenshot) {
																	$hasExisting = true;
																	if($browserCounter == 0) {
																		echo '<div class="tab-pane active"';
																	} else {
																		echo '<div class="tab-pane" ';
																	}
																	echo 'id="tab_' . $testCaseCounter . '_' . $browserCounter . '"><br>';

																	$isExisting = false;
																	$testCaseCtr = 0;
																	foreach($screenshots as $sc) {
																		if($sc['test_case_id'] == $ctc['test_case_detail_id'] && $sc['browser_id'] == $db['id']) {
																			if($testCaseCtr % 3 == 0) {
																				echo '<div class="row">';
																			}

																			echo '<div class="col-sm-12 col-md-4">
																					<div class="thumbnail">
																						<img src="' . $sc['link'] . '" alt="100%x200" style="width: 100%; height: 200px; display: block;">
																						<div class="caption">
																							<p> ' . $sc['description'] . ' </p>
																							<p>
																								<a href="' . $sc['link'] . '" class="fancybox-button btn blue">View</a>
																								<a onclick="promptRemove(this);" data-id="'.$sc['screenshot_id'].'" class="btn red">Remove</a>
																							</p>
																						</div>
																					</div>
																				</div>';

																			if(++$testCaseCtr % 3 == 0) {
																				echo '</div>';
																			}

																			$isExisting = true;
																		}
																	}
																	if($testCaseCtr % 3 != 0) {
																		echo '</div>';
																	}

																	if(!$isExisting) {
																		echo '<center><h3><span class="label label-danger"> No Screenshot Available </span></h3></center>';
																	}

																	echo '</div>';
																	$browserCounter++;
																}
															}
															if(!$hasExisting) {
																echo '<center><h3><span class="label label-danger"> No Screenshots Available </span></h3></center>';
															}
													echo '</div>
													</div>
												</div>
										  </div>';
										  $testCaseCounter++;
										}
									?>
									<br><br>
									</div>
								</div>
							</div>
						</div>
						</div>
						<div class="tab-pane" id="tab_a_b">
							<hr></hr>
							<div class="scroller" style="height: 500px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
								<div class="col-md-12">
									<div class="portlet box blue">
										<div class="portlet-title">
											<div class="caption">
												Test Execution Summary
											</div>
										</div>
										<div class="portlet-body">
											<br>
											<table class="table table-bordered table-condensed" id="summary_table" style="margin-bottom:10px">
												<tr>
													<th style='text-align:center' width="15%" class="">Browser</th>
													<th style='text-align:center' width="17%" class="success">Passed</th>
													<th style='text-align:center' width="17%" class="danger">Failed</th>
													<th style='text-align:center' width="17%" class="bg-yellow-saffron">Pending</th>
													<th style='text-align:center' width="17%" class="bg-default">Not Started</th>
													<th style='text-align:center' width="17%" class="">Test Completion</th>
												</tr>
												<?php
													$testCaseCount = count($currentTC);
													foreach($decode_browser as $b) {
														$noOfPassed = 0;
														$noOfFailed = 0;
														$noOfPending = 0;
														$noOfNotStarted = 0;
														foreach($currentTC as $k => $ctc) {
															$_results = "";
															$_browsers = "";
															foreach($ticketResults as $tResults) {
																if($tResults['test_case_detail_id'] == $ctc['test_case_detail_id']) {
																	$_results = $tResults['result'];
																	$_browsers = $tResults['browser_id'];
																	break;
																}
															}

															$_consol = "";
															$_rr = explode(",", $_results);
															$_rb = explode(",", $_browsers);
															$count = count($_rb);

															for($i = 0; $i < $count; $i++) {
																$_consol .= ($_rb[$i] . ":" . $_rr[$i]) . ";";
															}
															$_consol = substr($_consol, 0, strlen($_consol) - 1);

															$_decodeConsol = explode(";", $_consol);
															$consolLength = count($_decodeConsol);

															$outputResult = "";
															for($i = 0; $i < $consolLength; $i++) {
																$_explodeValue = explode(":", $_decodeConsol[$i]);
																if($b['id'] == $_explodeValue[0]) {
																	$outputResult = $_explodeValue[1];
																}
															}
															if($outputResult == "NOT STARTED" || $outputResult == "") {
																$noOfNotStarted++;
															} else if($outputResult == "PASS") {
																$noOfPassed++;
															} else if($outputResult == "FAIL") {
																$noOfFailed++;
															} else if($outputResult == "PENDING") {
																$noOfPending++;
															}
														}
														echo "<tr>
																<td style='text-align:center'><a style='text-decoration:underline' onclick='viewTestResults(this)' data-toggle='modal' href='#view_test_results_" . $b['id'] . "' data-browserid='" . $b['id'] . "' data-browsername='" . $b['text'] . "'>" . $b['text'] . "</a></td>
																<td style='text-align:center'>" . $noOfPassed . "</td>
																<td style='text-align:center'>" . $noOfFailed . "</td>
																<td style='text-align:center'>" . $noOfPending . "</td>
																<td style='text-align:center'>" . $noOfNotStarted . "</td>
																<td style='text-align:center'>" . number_format(round(($noOfPassed + $noOfFailed) / $testCaseCount * 100.00), 2) . "%</td>
															</tr>";
													}
												?>
											</table>
											<br>
											<?php echo "<a class='btn btn-s blue' data-toggle='modal' onclick='assignTCExecutionChecker(this);' href='#tcexecution_check' data-jiraid = '" . $ticketID . "' data-jirapkey ='" . $ticket . "' data-releasename='" . $release_name . "'> Mark as Finished </a>"; ?>
										</div>
									</div>
								</div>
							</div>
						<!--END TABS-->
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
    <a id="showSuccess"></a>
    <a id="showFailed"></a>
    <a id="showNoFile"></a>
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
						<input type='hidden' id="ticket" name="ticket">
						<input type='hidden' id="release_name" name="release_name">
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

	<div class="modal fade" id="upload_test_case_screenshot" tabindex="-1" role="basic" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title" > <b> Upload Test Case Screenshot </b> </h4>
				</div>
				<form method="post" role="form" id="upload_screenshot_to_db" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-6">
								<label>Test Case ID</label>
								<input type="text" class="form-control" id="test_case_name" disabled>
								<input type="hidden" id="test_case_select_id" name="test_case_select">
								<input type='hidden' id="ticket_" name="ticket">
								<input type='hidden' id="release_name_" name="release_name">
							</div>
							<div class="col-md-6">
								<label>Browser</label>
								<select style="font-size:12px" class="select2choices form-control" name="browser_select">
								<?php
									foreach($decode_browser as $b) {
										echo "<option style='font-size:12px' value='" . $b['id'] . "'>" . $b['text'] . "</option>";
									}
								?>
								</select>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-8">
								<label>Select Your Image</label><br/>
								<input type="file" name="image" id="file" required>
							</div>
						</div>
						<br>
						<div class-"row">
							<label>Description</label><br/>
							<textarea style="font-size: 12px;" class="form-control margin-bottom-10" rows=4 style='resize:vertical;' name="screenshot_description" required></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn default" data-dismiss="modal">Close</button>
						<input type="submit" class="btn blue" name="upload_screenshot" value="Upload">
					</div>
				</form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>

	<?php
		$counter = 0;
		foreach($decode_browser as $b) {
			echo '<div class="modal fade bs-modal-lg" id="view_test_results_' . $b['id'] . '" tabindex="-1" role="basic" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header" id="view_test_results_title_' . $b['id'] . '">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title" >  </h4>
						</div>
						<div class="modal-body">
							<br><br>
							<table class="table table-striped table-bordered" id="execution_test_case_table_' . ($counter++) . '">
								<thead>
									<th>Test Case ID</th>
									<th>Description/Objective</th>
									<th>Test Result</th>
									<th>Comments</th>
									<th>Procedure</th>
									<th>Expected Results</th>
									<th>Test Data</th>
									<th>Actual Results</th>
								</thead>
								<tbody>';
								foreach($currentTC as $k=>$ctc) {
									echo "<tr>
											<td>" . $ctc["tc_id"] . "_" . $ctc["ts_id"] . "</td>
											<td>" . $ctc["desc_obj"] . "</td>";
									$_results = "";
									$_browsers = "";
									foreach($ticketResults as $tResults) {
										if($tResults['test_case_detail_id'] == $ctc['test_case_detail_id']) {
											$_results = $tResults['result'];
											$_browsers = $tResults['browser_id'];
											break;
										}
									}

									$_consol = "";
									$_rr = explode(",", $_results);
									$_rb = explode(",", $_browsers);
									$count = count($_rb);

									for($i = 0; $i < $count; $i++) {
										$_consol .= ($_rb[$i] . ":" . $_rr[$i]) . ";";
									}
									$_consol = substr($_consol, 0, strlen($_consol) - 1);

									$_decodeConsol = explode(";", $_consol);
									$consolLength = count($_decodeConsol);

									$outputResult = "";
									for($i = 0; $i < $consolLength; $i++) {
										$_explodeValue = explode(":", $_decodeConsol[$i]);
										if($b['id'] == $_explodeValue[0]) {
											$outputResult = $_explodeValue[1];
										}
									}
									if($outputResult == "") {
										$outputResult = "NOT STARTED";
									}

									echo "<td style='text-align:center'";
									if($outputResult == "PASS") {
										echo "class='success'><b>" . $outputResult;
									} elseif($outputResult == "FAIL") {
										echo "class='danger'><b>" . $outputResult;
									} elseif($outputResult == "NOT STARTED") {
										echo "class='bg-default'><b>" . $outputResult;
									} elseif($outputResult == "PENDING") {
										echo "class='bg-yellow-saffron'><b>" . $outputResult;
									}
									echo "</b></td>
									<td style='align:center;'>" . $ctc["tc_comments"] . "</td>
									<td><a href='javascript:;' data-placement='right' class='test_steps' data-type='textarea' data-name='test_steps'>" . $ctc['test_steps'] . "</a></td>
									<td><a href='javascript:;' data-placement='right' class='expected_results' data-type='textarea' data-name='expected_results'>" . $ctc['expected_results'] . "</a></td>
									<td><a href='javascript:;' data-placement='right' class='test_data' data-type='textarea' data-name='test_data'>" . $ctc['test_data'] . "</a></td>
									<td><a href='javascript:;' data-placement='right' class='actual_results' data-type='textarea' data-name='actual_results'>" . $ctc['actual_results'] . "</a></td>
									</tr>";
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
		}
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
<script src="assets/global/plugins/moment/moment-with-locales.min.js"></script>
<script src="assets/global/plugins/moment/moment-duration-format.js"></script>
<script type="text/javascript" src="assets/global/plugins/bootstrap-datetimepicker-master/build/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/jquery.mockjax.js"></script>
<script type="text/javascript" src="assets/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="assets/admin/layout6/scripts/layout.js" type="text/javascript"></script>
<script src="assets/admin/layout6/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="assets/admin/layout6/scripts/index.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/table-advanced.js"></script>
<script src="assets/admin/pages/scripts/form-editable.js"></script>
<script type="text/javascript" src="assets/global/plugins/fancybox/source/jquery.fancybox.pack.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->

<script>

jQuery(document).ready(function() {
   	Metronic.init(); // init metronic core componets
   	Layout.init(); // init layout
	FormEditable.init();
	TableAdvanced.init();
	var browserCount = "<?php echo count($decode_browser) ?>";
	for(var $i = 0; $i < browserCount; $i++) {
		initTable_testExecution($i);
	}

	var noOfTestCases = "<?php echo count($currentTC); ?>";
	var noOfBrowsers = "<?php echo count($decode_browser); ?>";
});

var initTable_testExecution = function (i) {
	var table = $('#execution_test_case_table_' + i);
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

		var sOut2 = "<div class='col-md-12'><table class='table table-bordered table-striped'>";
		sOut2 += '<thead>';
		sOut2 += '<tr><th>Procedure</th><th>Expected Results</th><th>Test Data</th><th>Actual Results</th></tr>';
		sOut2 += '</thead>';
		sOut2 += '<tbody>';
		sOut2 += '<tr><td width=25%>'+aData[5]+'</td><td width=25%>'+aData[6]+'</td><td width=25%>'+aData[7]+'</td><td width=25%>'+aData[8]+'</td></tr>';
		sOut2 += '</tbody>';
		sOut2 += '</table></div>';

		return sOut2;
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
				"targets": [ 5, 6, 7, 8 ],
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

	var tableWrapper = $('#execution_test_case_table_' + i + '_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper

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

	$('#execution_test_case_table_' + i + ' .editable').editable('toggleDisabled');
	});
}

function assignTCExecutionChecker(identifier) {
	var id = $(identifier).data('jiraid');
	var pkey = $(identifier).data('jirapkey');
	var releasename = $(identifier).data('releasename');
	console.log(id + "\n" + pkey + "\n" + releasename);
	$('#assign_te_review_modal_title').html('<h4 class="modal-title" >Test Case Execution Reviewer For  ' + pkey + '  </h4>');
	$('#techeck_jira_id').val(id);
	$('#ticket').val(pkey);
	$('#release_name').val(releasename);
}

function viewTestResults(identifier) {
	var browserID = $(identifier).data('browserid');
	var browserName = $(identifier).data('browsername');
	console.log(browserID + "\n" + browserName);
	$('#view_test_results_title_' + browserID).html('<h4 class="modal-title" >Browser Results for ' + browserName +'</h4>');
}

function addUploadDetails(identifier) {
	var testCaseID = $(identifier).data('testcase');
	var tcID = $(identifier).data('tcid');
	var release = $(identifier).data('release');
	var ticket = $(identifier).data('ticket');
	$('#test_case_name').val(testCaseID);
	$('#test_case_select_id').val(tcID);
	$('#ticket_').val(ticket);
	$('#release_name_').val(release);
}
/*
This does the action when "Apply Result" button is clicked.
*/
$(".updateTicketTCResult").on('submit', function(ev){
	ev.preventDefault();

	var testCaseDetailID = $(this).find("input[name='test_case_detail_id']").val();
	var testReleaseID = $(this).find("input[name='release_id']").val();
	var ticketID = $(this).find("input[name='ticket_id']").val();
	var tcID = $(this).find("input[name='tc_id']").val();
	var tsID = $(this).find("input[name='ts_id']").val();
	var browserCount = $(this).find("input[name='browser_count']").val();

	if(browserCount == 0) {
		alert("You do not have any browsers available. Please add atleast one browser.");
	} else {
		console.log("Ticket ID: " + ticketID);

		var browserIDc = "";
		var browserResultC = "";

		<?php
			foreach($decode_browser as $b) {
				?>
				var browserID = "<?php echo $b['id'] ?>";
				var browserValue = $(this).find("select[name = 'browser_result_" + browserID + "']").val();
				browserIDc = browserIDc.concat(browserID + ",");
				browserResultC = browserResultC.concat(browserValue + ",")
				<?php
			}
		?>
		browserIDc = browserIDc.substring(0, browserIDc.length - 1);
		browserResultC = browserResultC.substring(0, browserResultC.length - 1);
		console.log("List of browser IDs: " + browserIDc);
		console.log("List of browser Results: " + browserResultC);

		$.ajax({
			type: 'POST',
			url : $(this).attr('action'),
			data : {
				browserIDs : browserIDc,
				browserResults : browserResultC,
				testCaseDetailID_ : testCaseDetailID,
				testReleaseID_ : testReleaseID,
				ticketID_ : ticketID
			}
		})
		.done(function() {
			alert("Test results applied successfully for " + tcID + "_" + tsID);
			location.reload();
		})
		.fail(function() {
			alert("There were some kind of error.");
		});
	}
});

$('#upload_screenshot_to_db').submit(function() {
	var formData = new FormData();
	var file_data = $('input[type="file"]')[0].files[0];
	formData.append('image', file_data);

	var otherData = $('#upload_screenshot_to_db').serializeArray();
	$.each(otherData, function(key, input) {
		formData.append(input.name, input.value);
	});
	$.ajax({
		url : "Home/uploadScreenshot",
		data: formData,
		contentType : false,
		processData : false,
		type : "POST",
		dataType : "text",
		success : function(data) {
			if(data == "SUCCESS") {
				$('[id="showSuccess"]')[0].click();
			} else if(data == "ERROR") {
				$('[id="showFailed"]')[0].click();
			} else if(data == "NO_FILE") {
				$('[id="showNoFile"]')[0].click();
			}
		}
	});
	return false;
});

function promptRemove(identifier) {
	var r = confirm("Proceed to remove screenshot?");
	if(r == true) {
		var screenshotID = $(identifier).data('id');
		$.ajax({
			url : "Home/updateActiveScreenshot",
			type : "POST",
			data : {
				screenshotID : screenshotID
			},
			success : function(response) {
				alert(response);
				location.reload();
			},
			error : function(response) {
				alert(response);
			}
		});
	} else {
		return false;
	}
}

$('#assign_test_case_execution_reviewer').submit(function() {
	//action="Jira/assignTestExecutionChecker"
	var val = $(this).find("input[type=submit]:focus").val();
	var te_checker = $(this).find("input[name='te_checker']").val();
	var jira_id = $(this).find("input[name='jira_id']").val();
	var ticket = $(this).find("input[name='ticket']").val();
	var release_name = $(this).find("input[name='release_name']").val();
	console.log(val + "\n" + te_checker + "\n" + jira_id + "\n" + ticket + "\n" + release_name);

	if(val == "Assign Reviewer" && te_checker == "") {
		alert("You cannot assign test case execution review to nobody.");
	} else {
		$.ajax({
			url : "Jira/assignTestExecutionChecker",
			type : "POST",
			data : {
				jira_id : jira_id,
				val : val,
				te_checker : te_checker
			},
			success : function(response) {
				alert(response);
				$('[id="my_task_link"]')[0].click();
			},
			error : function(response) {
				alert(response + "\nThere is some kind of error. Please view console (Ctrl + Shift + J) to view.");
			}
		});
	}
});

$("#manage_browser").on('submit', function(ev){
	ev.preventDefault();
	var formdata = $(this).serializeArray();
	if(formdata[0].value == "")
	{
		alert('Please select a browser/s');
		return false;
	}
	//var formdata = $(this).serialize();
	var selection = $("#browsers").select2('data') ;
	browsers = [] ;
	$.each(selection, function(data, value){
		browsers.push(value.id)
	});
	$.ajax({
		url : "Jira/ticketBrowser",
		type: "POST",
		data : {
			jid:formdata[1].value,
			browsers:browsers,
			ticket:formdata[2].value,
			release_id:formdata[3].value
		},
		success: function(response) {
			alert('Browser list is now updated. Page will refresh.');
			location.reload();
		}
	});
});

var projectID = "<?php echo $project_id ?>";
console.log("Project ID: " + projectID);

$('#browsers').select2({
	multiple:true,
	width: '91%' ,
	placeholder:"Select Browsers",
	allowClear:true,
	ajax: {
		url: "Home/getBrowsers",
		dataType: "json",
		type:"post",
		delay: 250,
		data: function (term) {
            return {
			   pid: projectID,
			   term:term
            };
        },
		results: function (data) {
			return {
				results: data
			};
		}
	}
});

$('#showSuccess').click(function() {
	toastr.options = {
	  "closeButton": false,
	  "debug": false,
	  "positionClass": "toast-top-right",
	  "onclick": null,
	  "showDuration": "300",
	  "hideDuration": "300",
	  "timeOut": "1000",
	  "extendedTimeOut": "300",
	  "showEasing": "swing",
	  "hideEasing": "linear",
	  "showMethod": "fadeIn",
	  "hideMethod": "fadeOut"
	}

	toastr.options.onHidden = function() {
		location.reload();
	}

	toastr.success("Successfully added a screenshot.", "Success<br>");
});

$('#showFailed').click(function() {
	toastr.options = {
	  "closeButton": false,
	  "debug": false,
	  "positionClass": "toast-top-right",
	  "onclick": null,
	  "showDuration": "300",
	  "hideDuration": "300",
	  "timeOut": "2000",
	  "extendedTimeOut": "300",
	  "showEasing": "swing",
	  "hideEasing": "linear",
	  "showMethod": "fadeIn",
	  "hideMethod": "fadeOut"
	}

	toastr.error("Your file must be atmost 2MB in size with .jpg, .jpeg, or .png extension name.", "Error<br>");
});

$('#showNoFile').click(function() {
	toastr.options = {
	  "closeButton": false,
	  "debug": false,
	  "positionClass": "toast-top-right",
	  "onclick": null,
	  "showDuration": "300",
	  "hideDuration": "300",
	  "timeOut": "1000",
	  "extendedTimeOut": "300",
	  "showEasing": "swing",
	  "hideEasing": "linear",
	  "showMethod": "fadeIn",
	  "hideMethod": "fadeOut"
	}

	toastr.error("You have no uploaded file.", "Error<br>");
});

var defaultData =  <?= $browsers ?>;
$('#browsers').data().select2.updateSelection(defaultData);	// sets default data browsers

$('.select2').select2();
$('.select2choices').select2({
	placeholder:"Select"
});

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

</script>
<!-- END JAVASCRIPTS -->

</body>

<!-- END BODY -->
</html>
