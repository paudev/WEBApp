<?php
	$release_name = $data['release_name'];
	$ticket = $data['ticket'];
	$ticketID = $data['ticketID'];
	$currentTC = $data['currentTC'];
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
					<li><a id='my_task_link' href="Home/Tasks">My Tasks</a></li>
					<li><?= $ticket ?> - Test Case Review</li>
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
									<span class="caption-subject theme-font bold uppercase"><?= $ticket ?> - Test Case Review</span>
								</div>
								<ul class="nav nav-tabs">
									<?php
										$count = count($currentTC);
										echo "<a id='revise_test_cases' class='btn red btn-s' onclick='updateTCCreationInProgress(this);' data-id='" . $ticketID . "' data-count='" . $count . "'><b>Revise Test Cases</b></a>";
										echo "<a id='for_test_execution' class='btn green btn-s' onclick='updateJiraCreationToExecution(this);' data-id='" . $ticketID . "' data-count='" . $count . "'><b>For Test Execution</b></a>"; ?>
								</ul>
							</div>

							<div class="portlet-body">
								<!--BEGIN TABS-->
								<div class="tab-content"  style='margin-top:-15px'>
									<div class="tab-pane active">
                                        <hr></hr>
									<div class="scroller" style="height: 580px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
										<div class="col-md-3 col-sm-3 col-xs-3">
											<ul class="nav nav-tabs tabs-left">
												<?php
    												if(!count($currentTC) == 0) {
    													echo "<h3><b>Test Cases</b></h3>";
    													foreach($currentTC as $k=>$ctc) {
    														$active = ($k == 0) ? "active" : "";
    														echo '<li class="'.$active.'">
                                                                <a aria-expanded="true" href="#'.$ctc['tc_id']."_".$ctc['ts_id'].'" data-toggle="tab">'.$ctc['tc_id']."<br>".$ctc['ts_id'].'</a>
                                                                </li>';
    													}
    												} else {
                                                        echo '<h3><i><b>No Test Cases Available.</b></i></h3>';
                                                    }
												?>
                                            </ul>
											</div>
											<div class="col-md-9 col-sm-9 col-xs-9">
                                            <div class="tab-content">
												<?php
													$counter = 0;
													foreach($currentTC as $k=>$ctc) {
														$active = ($k == 0) ? "active in" : "fade";
														echo '<div class="tab-pane '.$active.'" id="'.$ctc['tc_id']."_".$ctc['ts_id'].'">
																<div class="btn-group margin-bottom-10 pull-right">
                                                                    <a aria-expanded="false" class="btn blue" href="javascript:;" data-toggle="dropdown">
																		<i class="fa fa-user"></i> Action <i class="fa fa-angle-down"></i>
																	</a>
																	<ul class="dropdown-menu">
																		<li>
																			<a class="editdetails" href="javascript:;" >
																			<i class="fa fa-trash-o"></i> Edit </a>
																		</li>
																		<li>
																			<a id="delete_button_' . ($counter++) . '" class="delete" href="javascript:;"  onclick="deleteTC(this);" data-id="'.$ctc['tcd_id'].'" data-value="'.$ctc['tc_id']."_".$ctc['ts_id'].'">
																			<i class="fa fa-times"></i> Delete </a>
																		</li>
																	</ul>
																</div>
																<h3 class="margin-bottom-10"><b>Details</b></h3>
																<div class="row">
																	<br>
																	<div class="col-md-4">
    																	<table class="table table-bordered" id = "jira_creation_table">
        																	<tbody>
            																	<tr>
                																	<td><b>Test Case ID</b></td>
                																	<td><a href="javascript:;" data-placement="right" class="tc_id" data-type="text" data-name="tc_id" data-url="Project/updateTestCase" data-pk="'.$ctc['tcd_id'].'" >'.$ctc['tc_id'].'</a></td>
            																	</tr>
            																	<tr>
                																	<td><b>Test Case Name</b></td>
                																	<td><a href="javascript:;" data-placement="right" class="tc_name" data-type="text" data-name="tc_name" data-url="Project/updateTestCase" data-pk="'.$ctc['tcd_id'].'" >'.$ctc['tc_name'].'</a></td>
            																	</tr>
            																	<tr>
                																	<td><b>Test Scenario ID</b></td>
                																	<td><a href="javascript:;" data-placement="right" class="ts_id" data-type="text" data-name="ts_id" data-url="Project/updateTestCase" data-pk="'.$ctc['tcd_id'].'" >'.$ctc['ts_id'].'</a></td>
            																	</tr>
            																	<tr>
                																	<td><b>Test Scenario Name</b></td>
                																	<td><a href="javascript:;" data-placement="right" class="ts_name" data-type="text" data-name="ts_name" data-url="Project/updateTestCase" data-pk="'.$ctc['tcd_id'].'" >'.$ctc['ts_name'].'</a></td>
            																	</tr>
            																	<tr>
                																	<td><b>Scope</b></td>
                																	<td><a href="javascript:;" data-placement="right" class="scope_of_test"  data-value="'.$ctc['scope_of_test'].'" data-type="select"  data-source="/sot" data-name="scope_of_test" data-url="Project/updateTestCase" data-pk="'.$ctc['tcd_id'].'" >'.$ctc['scope_of_test'].'</a></td>
            																	</tr>
            																	<tr>
                																	<td><b>Type</b></td>
                																	<td><a href="javascript:;" data-placement="right" class="type_of_test"  data-value="'.$ctc['type_of_test'].'" data-type="select"  data-source="/tot" data-name="type_of_test" data-url="Project/updateTestCase" data-pk="'.$ctc['tcd_id'].'" >'.$ctc['type_of_test'].'</a></td>
            																	</tr>
        																	</tbody>
    																	</table>
																	</div>
																	<div class="col-md-8">
    																	<table class="table table-bordered" id = "jira_creation_table">
        																	<tbody>
            																	<tr>
                																	<td  width="30%"><b>Description/Objective</b></td>
                																	<td  width="70%"> <a href="javascript:;" data-placement="right" class="desc_obj" data-type="textarea" data-name="desc_obj" data-url="Project/updateTestCase" data-pk="'.$ctc['tcd_id'].'" >'.$ctc['desc_obj'].'</a></td>
            																	</tr>
            																</tbody>
            															</table>
            															<table class="table table-bordered" id = "jira_creation_table">
            																<tbody>
            																	<tr>
                																	<td width="30%"><b>Test Steps</b></td>
                																	<td  width="70%"><a href="javascript:;" data-placement="right" class="test_steps" data-type="textarea" data-name="test_steps" data-url="Project/updateTestCase" data-pk="'.$ctc['tcd_id'].'" >'.$ctc['test_steps'].'</a></td>
            																	</tr>
            																	<tr>
                																	<td  width="30%"><b>Expected Results</b></td>
                																	<td  width="70%"><a href="javascript:;" data-placement="right" class="expected_results" data-type="textarea" data-name="expected_results" data-url="Project/updateTestCase" data-pk="'.$ctc['tcd_id'].'" >'.$ctc['expected_results'].'</a></td>
            																	</tr>
																				<tr>
																					<td  width="30%"><b>Actual Results</b></td>
																					<td  width="70%"><a href="javascript:;" data-placement="right" class="actual_results" data-type="textarea" data-name="actual_results" data-url="Project/updateTestCase" data-pk="'.$ctc['tcd_id'].'" >'.$ctc['actual_results'].'</a></td>
																				</tr>
																				<tr>
																					<td  width="30%"><b>Test Data</b></td>
																					<td  width="70%"><a href="javascript:;" data-placement="right" class="test_data" data-type="textarea" data-name="test_data" data-url="Project/updateTestCase" data-pk="'.$ctc['tcd_id'].'" >'.$ctc['test_data'].'</a></td>
																				</tr>
        																	</tbody>
    																	</table>
																		<table class="table table-bordered" id = "jira_creation_table">
																			<tbody>
																				<tr>
																					<td  width="30%"><b>Comments</b></td>
																					<td  width="70%"><a href="javascript:;" data-placement="right" class="tc_comments" data-type="textarea" data-name="tc_comments" data-url="Project/updateTestCase" data-pk="'.$ctc['tcd_id'].'" >'.$ctc['tc_comments'].'</a></td>
																				</tr>
																			</tbody>
																		</table>
																	</div>
                                                                </div>
                                                            </div>';
													}
												?>
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
<!-- END PAGE LEVEL SCRIPTS -->
<script>

jQuery(document).ready(function() {
   	Metronic.init(); // init metronic core componets
   	Layout.init(); // init layout
	FormEditable.init();
	TableAdvanced.init();
});

function updateTCCreationInProgress(identifier) {
    var r = confirm("Are you sure you want assignee to revise test cases?");
	var count = $(identifier).data('count');
    if (r == true) {
        $.ajax({
            url: "Jira/updateJiraTCCreationInProgress",
            type: "POST",
            data: {
                id: $(identifier).data('id')
            },
            success: function(response) {
                alert('Ticket test cases are now available for revision of assignee.');
				$('[id="my_task_link"]')[0].click();
				$('[id="revise_test_cases"]').prop('onclick', null).off('click');
				$('[id="for_test_execution"]').prop('onclick', null).off('click');
				//$('a.revise_test_cases').removeAttr('onclick');
				for(var i = 0; i < count; i++) {
					$('[id="delete_button_' + i + '"]').prop('onclick', null).off('click');
				}
				//$(this).find("a[name='re']")
            }
        });
    } else {
        return false;
    }
}

function deleteTC(identifier){
	var r = confirm("Are you sure you want to delete " + $(identifier).data('value'));
	if (r == true) {
		$.ajax({
			url : "Jira/deleteJiraTC",
			type: "POST",
			data : {
				id: $(identifier).data('id')
			},
			success: function(response) {
				alert('Test Case ' + $identifier.data('value') + ' Deleted');
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
		$.ajax({
			url : "Jira/updateJiraTCCreationToTCExecution",
			type : "POST",
			data : {
				id : $(identifier).data('id')
			},
			success : function(response) {
				alert(response + 'Ticket now ready for Test Execution.');
				$('[id="my_task_link"]')[0].click();
				$('[id="revise_test_cases"]').prop('onclick', null).off('click');
				$('[id="for_test_execution"]').prop('onclick', null).off('click');
				//$('a.revise_test_cases').removeAttr('onclick');
				for(var i = 0; i < count; i++) {
					$('[id="delete_button_' + i + '"]').prop('onclick', null).off('click');
				}
			}
		});
	} else {
		return false;
	}
}

$('#new_test_case').on('submit', function(ev){
	ev.preventDefault();
	var formdata = $(this).serialize();
	$.ajax({
		url : "Jira/createJiraTC",
		type : "POST",
		data : formdata,
		success: function(response) {
			 alert('Added Test Case Successfully!');
			 location.reload();
		},
		error : function(response) {
			alert('ID\'s might have been used already.');
		}
	});
});

$('.select2').select2();

</script>
<!-- END JAVASCRIPTS -->

</body>

<!-- END BODY -->
</html>
