<?php
	$test_cases = $data['test_cases'];
	$project = $data['project'];
	$project_id = $data['project_id'];
	$projects = $data['projects'];
	$components = $data['components'] ;
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
<title>ISS | Manage Test Cases</title>
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

<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-editable/inputs-ext/address/address.css"/>

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
					<li>Manage Test Cases</li>
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
								<li class=""><a href="home/dashboard"><i class="fa fa-angle-double-right"></i>Dashboard</a></li>
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
									<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
									<span class="sr-only">
									Toggle navigation </span>
									<span class="icon-bar">
									</span>
									<span class="icon-bar">
									</span>
									<span class="icon-bar">
									</span>
									</button>
									<a class="navbar-brand" href="javascript:;">
									<?=$project?></a>
								</div>
								<!-- /.navbar-collapse -->
							</div>

					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-edit"></i>Manage Test Cases
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-toolbar">
								<div class="row">
									<div class="col-md-12">
										<form method="post" action="Excel/importTestCase" enctype="multipart/form-data" id="form" accept-charset="utf-8" style="float:left;">
											<a href = "#add_test_case" data-toggle="modal" class="btn blue"><i class="fa fa-plus"></i>Add New Test Case</a>
											<input type="hidden" name="pid" value="<?=$project_id?>">
											<input type="hidden" name="pname" value="<?= $project ?>">
											<a class='btn blue' href='javascript:;'>
												Import Test Cases
												<input type="file" name="spreadsheet" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' id="file_source" size="40" >
											</a>
											&nbsp;
											<span class='label label-info' id="upload-file-info"></span>
											<button id="enable" class="btn blue" type="button">Click here to edit</button>
										</form>
										<a onclick="exportTestCases(this);" <?php echo "data-projectname='" . $project . "'" ?> class="btn blue" style="float:right;">Export Excel</a>
									</div>
								</div>
							</div>
							<br>
							<div class="absolute-dropdown toolbar">
								<form class="form-inline">
									<div class="form-group">
										<label class="control-text">Select Component:</label>
										<select id="component_dropdown" class= "form-control input-large">
											<?php
												$url      = $_SERVER['REQUEST_URI'] ;
												$url_path = parse_url($url, PHP_URL_PATH);
												$basename = pathinfo($url_path, PATHINFO_BASENAME);
												foreach($components as $component) {
													switch($basename) {
														case "All":
															$all = "selected";
															break;
														case $component['component_name'];
															$selected = "selected";
															break;
														default:
															$selected= "";
													}
													echo "<option ".$selected." value='".$component['component_id']."'>".$component['component_name']."</option>";
												}
											?>
											<option value="All" <?php if(isset($all)){ echo $all ;} ?>>All</option>
										</select>
									</div>
								</form>
							</div>

							<table class="table table-hover table-bordered" id="manage_test_case_table" >
								<thead>
									<tr>
										<th>Test Case ID</th>
										<th>Test Scenario ID</th>
										<th>Test Case Name</th>
										<th>Test Scenario Name</th>
										<th>Description/Objective</th>
										<th>Scope</th>
										<th>Type</th>
										<th>Action</th>
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
								<tbody>
								<?php
									foreach($test_cases as $tcdetail) {
										$url_testdetail = $data['bhref']. 'Project/updateTestCase';

										$date_reviewed = (!$tcdetail['date_reviewed'] == null)  ? $tcdetail['date_reviewed']  : "Not Yet Reviewed" ;

										echo "<tr>" .
											 "<td><a href='javascript:;' data-placement='right' class='tc_id' data-type='text' data-name='tc_id' data-url='".$url_testdetail."' data-pk='".$tcdetail['tcd_id']."' >".$tcdetail['tc_id']."</a></td>".
											 "<td><a href='javascript:;' class='ts_id' data-type='text' data-name='ts_id' data-url='".$url_testdetail."' data-pk='".$tcdetail['tcd_id']."' >".$tcdetail['ts_id']."</a></td>".
											 "<td><a href='javascript:;' class='tc_name' data-type='text' data-name='tc_name' data-url='".$url_testdetail."' data-pk='".$tcdetail['tcd_id']."' >".$tcdetail['tc_name']."</a></td>".
											 "<td><a href='javascript:;' class='ts_name' data-type='text' data-name='ts_name' data-url='".$url_testdetail."' data-pk='".$tcdetail['tcd_id']."' >".$tcdetail['ts_name']."</a></td>".
											 "<td><a href='javascript:;' class='desc_obj' data-type='textarea' data-name='desc_obj' data-url='".$url_testdetail."' data-pk='".$tcdetail['tcd_id']."' >".$tcdetail['desc_obj']."</a></td>".
											 "<td><a href='javascript:;' class='scope_of_test' data-type='select'  data-source='/sot' data-value='".$tcdetail['scope_of_test']."' data-name='scope_of_test' data-url='".$url_testdetail."' data-pk='".$tcdetail['tcd_id']."' >".$tcdetail['scope_of_test']."</a></td>".
											 "<td><a href='javascript:;' class='type_of_test' data-type='select' data-source='/tot' data-value='".$tcdetail['type_of_test']."' data-name='type_of_test'  data-pk='".$tcdetail['tcd_id']."' >".$tcdetail['type_of_test']."</a></td>".
											 "<td>Action</td>".
											 "<td><a href='javascript:;' class='test_status' data-type='select' data-source='/test_status' data-value='".$tcdetail['tc_status']."' data-name='tc_status' data-url='".$url_testdetail."' data-pk='".$tcdetail['tcd_id']."' >".$tcdetail['tc_status']."</a></td>".
											 "<td>".$tcdetail['date_last_change']."</td>".
											 "<td>".$tcdetail['tester']."</td>".
											 "<td>comment</td>".
											 "<td><a href='javascript:;' class='check_status' data-type='select' data-source='/check_status' data-value='".$tcdetail['tc_reviewed']."' data-name='tc_reviewed' data-url='".$url_testdetail."' data-pk='".$tcdetail['tcd_id']."' >".$tcdetail['tc_reviewed']."</a></td>".
											 "<td>".$tcdetail['priority']."</td>".
											 "<td>".$date_reviewed."</td>".
											 "<td>".$tcdetail['checker']."</td>".
											 "<td>"."comment"."</td>".
											 "<td><a href='javascript:;' data-placement='right' class='test_steps' data-type='textarea' data-name='test_steps' data-url='".$url_testdetail."' data-pk='".$tcdetail['tcd_id']."' >".$tcdetail['test_steps']."</a></td>".
											 "<td><a href='javascript:;' data-placement='right' class='expected_results' data-type='textarea' data-name='expected_results' data-url='".$url_testdetail."' data-pk='".$tcdetail['tcd_id']."' >".$tcdetail['expected_results']."</a></td>".
											 "<td>".$tcdetail['developer']."</td>".
											 "<td>".$tcdetail['date_finished']."</td>".
											 "<td>".$tcdetail['automation_status']."</td>".
											 "<td></td>".
											 "<td>".$tcdetail['at_script_location']."</td>".
											 "</tr>";
									}
								?>
								</tbody>
							</table>
						</div>
					</div>
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
	<!-- MODALS -->
	<!-- Add New Test Case -->
	<div class="modal fade bs-modal-lg" id="add_test_case" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header green">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title">Add New Test Case</h4>
				</div>
				<form class="form-horizontal" method="post" action="project/createTestCase">
					<div class="modal-body">
						<div class='row'>
							<div class="form-body">
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-md-3 control-label">Component</label>
										<div class="col-md-9">
											<select id="selected_component" class= "form-control" name="component_id">
											<?php
												foreach($components as $component) {
													echo "<option value='".$component['component_id']."'>".$component['component_name']."</option>";
												}
											?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">TC ID*</label>
										<div class="col-md-9">
											<input class="form-control" placeholder="Enter TC ID" type="text" name="tc_id">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">TC Name*</label>
										<div class="col-md-9">
											<input class="form-control" placeholder="Enter TC Name" type="text" name="tc_name">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">TS ID*</label>
										<div class="col-md-9">
											<input class="form-control" placeholder="Enter TS ID" type="text" name="ts_id">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">TS Name*</label>
										<div class="col-md-9">
											<input class="form-control" placeholder="Enter TS Name" type="text" name="ts_name">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Description/Objective*</label>
										<div class="col-md-9">
											<textarea class="form-control" style="resize:none" rows=2 name="desc_obj"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Scope of Test*</label>
										<div class="col-md-9">
											<select class="form-control select2 margin-bottom-10" name='scope_of_test'>
												<option value='SmokeFast'>SmokeFast</option>
												<option value='SmokeFull'>SmokeFull</option>
												<option value='Regression'>Regression</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Type of Test*</label>
										<div class="col-md-9">
											<select class="form-control select2 margin-bottom-10" name='type_of_test'>
												<option value='Functional'>Functional</option>
												<option value='Regression'>Regression</option>
												<option value='Integration'>Integration</option>
												<option value='Negative'>Negative</option>
												<option value='Combination'>Combination</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-md-3 control-label">Test Steps*</label>
										<div class="col-md-9">
											<textarea class="form-control" style="resize:none" rows=8 name='test_steps'></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Expected Results*</label>
										<div class="col-md-9">
											<textarea class="form-control" style="resize:none" rows=8 name='expected_results'></textarea>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<div style="margin-right:12px">
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn blue">Add</button>
						</div>
					</div>
					<input type="hidden" name="project" value="<?= $project ?>">
				</form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- End Add Release -->

	<!-- Add Release -->
	<div class="modal fade in" id="manage_browser" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog ">
			<div class="modal-content">
				<div class="modal-header green">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title">Manage Browsers</h4>
				</div>
				<form action="" class="form-horizontal form-row-seperated">
					<div class="modal-body">
						<div class="form-group">
							<label class="control-label col-md-3">Browser Name</label>
							<div class="col-md-8">
								<div class="input-group" style="text-align:left">
									<input type="text" class="form-control" name="username1" id="username1_input">
									<span class="input-group-btn">
										<a href="javascript:;" class="btn green" id=""><i class="fa fa-plus"></i> Add </a>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Select Browsers</label>
							<div class="col-md-9">
								<select multiple="multiple" class="multi-select" id="my_multi_select1" name="my_multi_select1[]">
									<option>Internet Explorer 9</option>
									<option>Internet Explorer 10</option>
									<option selected>Firefox 24</option>
									<option>Firefox 40</option>
								</select>
							</div>
						</div>
					</div>
				</form>
				<div class="modal-footer">
					<div style="margin-right:12px">
						<button type="button" class="btn default" data-dismiss="modal">Close</button>
						<button type="button" class="btn blue" data-dismiss="modal">Apply Changes</button>
					</div>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- End Add Release -->
	<!-- END MODALS -->

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
<script type="text/javascript" src="assets/global/plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>

<script type="text/javascript" src="assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<script type="text/javascript" src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/bootstrap-datepicker/js/locales/bootstrap-datepicker.zh-CN.js"></script>
<script type="text/javascript" src="assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/moment.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/jquery.mockjax.js"></script>
<script type="text/javascript" src="assets/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js"></script>
<script type="text/javascript" src="assets/global/plugins/bootstrap-editable/inputs-ext/address/address.js"></script>
<script type="text/javascript" src="assets/global/plugins/bootstrap-editable/inputs-ext/wysihtml5/wysihtml5.js"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="assets/admin/layout6/scripts/layout.js" type="text/javascript"></script>
<script src="assets/admin/layout6/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="assets/admin/layout6/scripts/index.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/table-advanced.js"></script>
<script src="assets/admin/pages/scripts/components-dropdowns.js"></script>
<script src="assets/admin/pages/scripts/form-editable.js"></script>
<script src="assets/admin/pages/scripts/loading.js"></script>

<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {
   	Metronic.init(); // init metronic core componets
   	Layout.init(); // init layout
	ComponentsDropdowns.init();
	FormEditable.init();
	TableAdvanced.init();
});

function exportTestCases(identifier) {
	var project_name = $(identifier).data('projectname');

	openModal();
	$.ajax({
		url : "Project/exportTestCases",
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

$('#file_source').on('change', function(ev){
	$('#form').submit();
});

$('.select2').select2();

$('#selected_component').select2();

$('#component_dropdown').select2();

$("#component_dropdown").change(function() {
	var cdv = $('#component_dropdown').val();
	var cdt = $(":selected",this).text();
	$("#selected_component").select2("val", cdv);
	window.location= "Project/ManageTestCases/<?php echo $project."/" ?>" + cdt ;
});

</script>
<!-- END JAVASCRIPTS -->

</body>

<!-- END BODY -->
</html>
