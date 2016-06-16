<?php
	$connections = $data['connections'];
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
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>

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
					<li><a href="project/index">Projects</a></li>
					<li><a href="project/add_project">Add New Project</a></li>
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
							<li class="active"><a href="Project/AddProject"><i class="fa fa-plus"></i>Add New Project</a></li>
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
					<div class="navbar navbar-default" role="navigation">
						<div class="navbar-header">
							<a class="navbar-brand" href="javascript:;">Add New Project</a>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<form method="post" role="form" id="create_new_project">
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption">
									Project Configuration
								</div>
							</div>
							<div class="portlet-body form">
								<div class="form-body">
									<div class="form-group">
										<label><b>Project Name</b></label>
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-rocket"></i></span>
											<input class="form-control" placeholder="Enter New Project" type="text" name="project_name">
										</div>
									</div>
									<div class="form-group">
										<label><b>Project Description</b></label>
										<textarea class="form-control" rows="4" style="resize:none" name="project_description"></textarea>
										<br>
										<table class="table table-bordered">
											<tr>
												<td>
													<label class='control-label'><b>Project Jira Set-up</b>
													</label>
												</td>
											</tr>
											<tr>
												<td>
													<div class="col-md-4">
														<label class='blue' style="font-size:12px; color=#00f"><b>Project</b></label><input type="hidden" class="form-control assign" id="project" name="project_name_select">
													</div>
													<div class="col-md-4">
														<label class='blue' style="font-size:12px; color=#00f"><b>Component</b></label><input type="hidden" class="form-control assign" id="component" name="component_name_select">
													</div>
												</td>
											</tr>
										</table>
										<table class="table table-bordered">
											<tr>
												<td>
													<label class="control-label"><b>Automation Set-up</b></label>
												</td>
											</tr>
											<tr>
												<td>
												<div class="row">
													<div class="col-md-12">
														<div class="col-md-4">
															<label class='blue' style="font-size:12px; color=#00f"><b>Connection Name</b></label><input type="hidden" class="form-control assign" id="connection" name="connection_select">
														</div>
													</div>
												</div>
												<br>
												<div class="row">
													<div class="col-md-12">
														<table class="table table-bordered">
															<tr>
																<td>
																	<div class="col-md-12">
																		<b>Parameters</b>
																	</div>
																</td>
																<td>
																	<div class="col-md-12">
																		<b>Database User</b>
																	</div>
																</td>
															</tr>
															<tr>
																<td>
																	<input type="hidden" name="connection_id">
																	<div class="col-md-6">															
																		<label>Driver</label>
																		<input type="text" class="form-control" disabled name="connection_driver">
																		<label>Host</label>
																		<input type="text" class="form-control" disabled name="connection_host">
																	</div>
																	<div class="col-md-6">
																		<label>Database Name</label>
																		<input type="text" class="form-control" disabled name="connection_database_name">
																		<label>Prefix</label>
																		<input type="text" class="form-control" disabled name="connection_prefix">
																	</div>
																</td>
																<td>
																	<div class="col-md-12">
																		<label>Username</label>
																		<input type="text" class="form-control" disabled name="connection_username">
																		<label>Password</label>
																		<input type="text" class="form-control" disabled name="connection_password">
																	</div>
																</td>
															</tr>
														</table>
													</div>
												</div>
												</td>
											</tr>
										</table>
									</div>
									<a id="showSuccessToast"></a>
									<a id="showFailedToast"></a>
									<a id="showFailedEmpty"></a>
									<a id="showFailedAdd"></a>
									<a id="proceed_to_index" href="project/index"></a>
									<div class="form-actions" style="background:transparent;">
										<div class="pull-right">
											<button type="submit" class="btn blue">Add New Project</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
    			<!-- END PAGE CONTENT FIXED -->
    			<!-- Copyright BEGIN -->
				<p class="copyright-v2">2015 © ISS. </p>
				<!-- Copyright END -->
    		</div>
    	</div>
    </div>
	<!-- PAGE CONTENT END -->
    <!-- END MAIN LAYOUT -->
    <a href="#index" class="go2top"><i class="icon-arrow-up"></i></a>

    <div id="fade"></div>
	<div id="modal">
		<img src="assets/admin/layout/img/progress-dialog.gif" alt="logo" class="logo-default"/>
	</div>

<style>
	#fade {
	    display: none;
	    position:absolute;
	    top: 0%;
	    left: 0%;
	    width: 100%;
	    height: 100%;
	    background-color: #ababab;
	    z-index: 1001;
	    -moz-opacity: 0.8;
	    opacity: .70;
	    filter: alpha(opacity=80);
	}

	#modal {
	    display: none;
	    position: absolute;
	    top: 45%;
	    left: 45%;
	    width: 200px;
	    height: 200px;
	    padding:30px 15px 0px;
	    border: 3px solid #ababab;
	    box-shadow:1px 1px 10px #ababab;
	    border-radius:20px;
	    background-color: white;
	    z-index: 1002;
	    text-align:center;
	    overflow: auto;
	}
</style>

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {
   	Metronic.init(); // init metronic core componets
   	Layout.init(); // init layout
	TableAdvanced.init();

});

var connectionArray = <?php echo json_encode($connections); ?>

$('#project').select2({
	placeholder: "Select Project",
	allowClear: true,
	ajax: {
		url: "Home/getProjectsAct2",
		dataType: "json",
		type: "post",
		delay: 10000,
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

$('#component').select2({
	placeholder: "Select Component",
	allowClear: true,
	multiple:true,
	ajax: {
		url: "Home/getComponents2",
		dataType: "json",
		type: "post",
		delay: 10000,
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

$('#connection').select2({
	placeholder: "Select Connection",
	allowClear: true,
	ajax: {
		url: "Home/getConnections",
		dataType: "json",
		type: "post",
		delay: 10000,
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

$('#connection').change(function() {
	//alert(JSON.stringify(connectionArray));
	var idx = $(this).val();
	console.log(idx);
	if(idx != "") {
		var ID = connectionArray[idx - 1]["connection_id"]
		var driver = connectionArray[idx - 1]["driver"];
		var host = connectionArray[idx - 1]["host"];
		var database_name = connectionArray[idx - 1]["database_name"];
		var prefix = connectionArray[idx - 1]["prefix"];
		var username = connectionArray[idx - 1]["username"]
		var password = connectionArray[idx - 1]["password"];

		$("input[name='connection_driver']").val(driver);
		$("input[name='connection_host']").val(host);
		$("input[name='connection_database_name']").val(database_name);
		$("input[name='connection_prefix']").val(prefix);
		$("input[name='connection_username']").val(username);
		$("input[name='connection_password']").val(password);
		$("input[name='connection_id']").val(ID);
	} else {
		$("input[name='connection_driver']").val("");
		$("input[name='connection_host']").val("");
		$("input[name='connection_database_name']").val("");
		$("input[name='connection_prefix']").val("");
		$("input[name='connection_username']").val("");
		$("input[name='connection_password']").val("");
		$("input[name='connection_id']").val("");
	}
}); 

function openModal() {
	document.getElementById('modal').style.display = 'block';
	document.getElementById('fade').style.display = 'block';
}

function closeModal() {
	document.getElementById('modal').style.display = 'none';
	document.getElementById('fade').style.display = 'none';
}

$('#create_new_project').submit(function() {

	var project_name = $(this).find("input[name='project_name']").val();
	var project_description = $(this).find("textarea[name='project_description']").val();
	var project_name_select = $(this).find("input[name='project_name_select']").val();
	var component_name_select = $(this).find("input[name='component_name_select']").val();
	var connection_name_select = $(this).find("input[name='connection_select']").val();

	console.log(project_name + "\n" + project_description + "\n" + project_name_select + "\n" + component_name_select + "\n" + connection_name_select);

	if(project_name_select != "" && component_name_select == "") {
		console.log("Project filled and component unfilled");
	} else if(project_name_select == "" && component_name_select == "") {
		console.log("Project unfilled and component unfilled");
	} else if(project_name_select != "" && component_name_select != "") {
		console.log("Project filled and component filled");
	}

	//alert(project_name + "\n" + project_description + "\n" + project_name_select + "\n" + component_name_select);

	if(project_name_select == "" || component_name_select == "") {
		$('[id="showFailedToast"]')[0].click();
	} else {
		if(project_name == "" || project_description == "") {
			$('[id="showFailedEmpty"]')[0].click();
		} else {
			openModal();
			$.ajax({
				url : "Project/createProject",
				type : "POST",
				data : {
					project_name : project_name,
					project_description : project_description,
					project_name_select : project_name_select,
					component_name_select : component_name_select,
					connection_name_select : connection_name_select
				},
				success : function(response) {
					closeModal();
					//alert(response);
					$('[id="showSuccessToast"]')[0].click();
				},
				error : function(response) {
					closeModal();
					$('[id="showFailedAdd"]')[0].click();
				}
			});
		}
	}

	return false;
});

$('#showSuccessToast').click(function() {
	toastr.options = {
	  "closeButton": false,
	  "debug": false,
	  "positionClass": "toast-top-right",
	  "onclick": null,
	  "showDuration": "500",
	  "hideDuration": "500",
	  "timeOut": "3000",
	  "extendedTimeOut": "500",
	  "showEasing": "swing",
	  "hideEasing": "linear",
	  "showMethod": "fadeIn",
	  "hideMethod": "fadeOut"
	}

	toastr.options.onHidden = function() {
		$('[id="proceed_to_index"]')[0].click();
	}

	toastr.success("Project is successfully created.", "Success<br>");
});

$('#showFailedToast').click(function() {
	toastr.options = {
	  "closeButton": false,
	  "debug": false,
	  "positionClass": "toast-top-right",
	  "onclick": null,
	  "showDuration": "500",
	  "hideDuration": "500",
	  "timeOut": "3000",
	  "extendedTimeOut": "500",
	  "showEasing": "swing",
	  "hideEasing": "linear",
	  "showMethod": "fadeIn",
	  "hideMethod": "fadeOut"
	}

	toastr.error("You should have atleast chosen a project from JIRA.", "Error<br>");
});

$('#showFailedEmpty').click(function() {
	toastr.options = {
	  "closeButton": false,
	  "debug": false,
	  "positionClass": "toast-top-right",
	  "onclick": null,
	  "showDuration": "500",
	  "hideDuration": "500",
	  "timeOut": "3000",
	  "extendedTimeOut": "500",
	  "showEasing": "swing",
	  "hideEasing": "linear",
	  "showMethod": "fadeIn",
	  "hideMethod": "fadeOut"
	}

	toastr.error("You still have empty fields left. Please fill out the form completely.", "Error<br>");
});

$('#showFailedAdd').click(function() {
	toastr.options = {
	  "closeButton": false,
	  "debug": false,
	  "positionClass": "toast-top-right",
	  "onclick": null,
	  "showDuration": "500",
	  "hideDuration": "500",
	  "timeOut": "3000",
	  "extendedTimeOut": "500",
	  "showEasing": "swing",
	  "hideEasing": "linear",
	  "showMethod": "fadeIn",
	  "hideMethod": "fadeOut"
	}

	toastr.options.onHidden = function() {
		location.reload();
	}

	toastr.error("Project not created.", "Error<br>");
});

</script>
<!-- END JAVASCRIPTS -->

</body>

<!-- END BODY -->
</html>
