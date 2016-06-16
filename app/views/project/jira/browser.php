<?php
$project_id = $data['project_id'];
$projects = $data['projects'];
$project = $data['project'];
$release = $data['release'];
$browsers = $data['browsers'];
$no_browser_id = $data['no_browser_id'];
$release_setting_key = $data['release_setting_key'];
$getSettings = $data['getSettings'];
$getSettings = unserialize($getSettings);
$result_set = $data['result_set'];
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
<link href="assets/admin/layout6/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-md page-quick-sidebar-over-content">

	<!-- BEGIN MAIN LAYOUT -->
	<!-- HEADER BEGIN -->
    <header class="page-header">
        <nav class="navbar" role="navigation">
            <div class="container-fluid">
                <div class="havbar-header">
                	<!-- BEGIN LOGO -->
                    <a id="index" class="navbar-brand" href="start.html">
                        <img src="assets/admin/layout6/img/logo.png" alt="Logo">
                    </a>
                	<!-- END LOGO -->

	                <!-- BEGIN TOPBAR ACTIONS -->
	                <div class="topbar-actions">
		                <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
						<form class="search-form" action="extra_search.html" method="GET">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Search here" name="query">
								<span class="input-group-btn">
									<a href="javascript:;" class="btn submit"><i class="fa fa-search"></i></a>
								</span>
							</div>
						</form>
						<!-- END HEADER SEARCH BOX -->

	                	<!-- BEGIN GROUP NOTIFICATION -->
						<div class="btn-group-notification btn-group" id="header_notification_bar">
							<button type="button" class="btn dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
								<span class="badge">9</span>
							</button>
							<ul class="dropdown-menu-v2">
								<li class="external">
									<h3><span class="bold">12 pending</span> notifications</h3>
									<a href="#">view all</a>
								</li>
								<li>
									<ul class="dropdown-menu-list scroller" style="height: 250px; padding: 0;" data-handle-color="#637283">
										<li>
											<a href="javascript:;">
												<span class="details">
													<span class="label label-sm label-icon label-success">
														<i class="fa fa-plus"></i>
													</span>
													New user registered.
												</span>
												<span class="time">just now</span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
												<span class="details">
													<span class="label label-sm label-icon label-danger">
														<i class="fa fa-bolt"></i>
													</span>
													Server #12 overloaded.
												</span>
												<span class="time">3 mins</span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
												<span class="details">
													<span class="label label-sm label-icon label-warning">
														<i class="fa fa-bell-o"></i>
													</span>
													Server #2 not responding.
												</span>
												<span class="time">10 mins</span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
												<span class="details">
													<span class="label label-sm label-icon label-info">
														<i class="fa fa-bullhorn"></i>
													</span>
													Application error.
												</span>
												<span class="time">14 hrs</span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
												<span class="details">
													<span class="label label-sm label-icon label-danger">
														<i class="fa fa-bolt"></i>
													</span>
													Database overloaded 68%.
												</span>
												<span class="time">2 days</span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
												<span class="details">
													<span class="label label-sm label-icon label-danger">
														<i class="fa fa-bolt"></i>
													</span>
												A 	user IP blocked.
											</span>
												<span class="time">3 days</span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
												<span class="details">
													<span class="label label-sm label-icon label-warning">
														<i class="fa fa-bell-o"></i>
													</span>
													Storage Server #4 not responding dfdfdfd.
												</span>
												<span class="time">4 days</span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
												<span class="details">
													<span class="label label-sm label-icon label-info">
														<i class="fa fa-bullhorn"></i>
													</span>
													System Error.
												</span>
												<span class="time">5 days</span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
												<span class="details">
													<span class="label label-sm label-icon label-danger">
														<i class="fa fa-bolt"></i>
													</span>
													Storage server failed.
												</span>
												<span class="time">9 days</span>
											</a>
										</li>
									</ul>
								</li>
							</ul>
						</div>
	                	<!-- END GROUP NOTIFICATION -->

	                	<!-- BEGIN USER PROFILE -->
		                <div class="btn-group-img btn-group">
							<button type="button" class="btn btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
								<img src="assets/admin/layout5/img/avatar1.jpg" alt="">
							</button>
							<ul class="dropdown-menu-v2" role="menu">
								<li class="active">
									<a href="profile.html">My Profile <span class="badge badge-danger">1</span> </a>
								</li>
								<li>
									<a href="#">My Inbox <span class="badge badge-info">3</span> </a>
								</li>
								<li>
									<a href="todo.html">My Tasks</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="lock_screen.html">Lock Screen</a>
								</li>
								<li>
									<a href="login.html">Sign Out</a>
								</li>
							</ul>
						</div>
						<!-- END USER PROFILE -->
					</div>
	                <!-- END TOPBAR ACTIONS -->
                </div>
            </div>
            <!--/container-->
        </nav>
    </header>
	<!-- HEADER END -->

	<!-- PAGE CONTENT BEGIN -->
    <div class="container-fluid">
    	<div class="page-content page-content-popup">
    		<!-- BEGIN PAGE CONTENT FIXED -->
			<div class="page-content-fixed-header">
				<ul class="page-breadcrumb">
					<li><a href="Project/index">Projects</a></li>
					<li><a href="Project/Project_Main/<?= $project ?>"><?= $project ?></a></li>
					<li><a href="Jira/Releases/<?= $project ?>"><?= $release ?></a></li>
					<li>Select A Browser</li>
				</ul>

				<div class="content-header-menu">
    				<!-- BEGIN DROPDOWN AJAX MENU -->
    				<div class="dropdown-ajax-menu btn-group">
						<button type="button" class="btn dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<i class="fa fa-circle"></i>
							<i class="fa fa-circle"></i>
							<i class="fa fa-circle"></i>
						</button>
					</div>
    				<!-- END DROPDOWN AJAX MENU -->

    				<!-- BEGIN MENU TOGGLER -->
    				<button type="button" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
	                    <span class="toggle-icon">
	                        <span class="icon-bar"></span>
	                        <span class="icon-bar"></span>
	                        <span class="icon-bar"></span>
	                    </span>
	                </button>
    				<!-- END MENU TOGGLER -->
    			</div>
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

							foreach($data['projects'] as $projects)
							{
								$project_href = 'Project/Project_Main/' . urlencode($projects);
								echo "<li class=''><a href='".$project_href."'><i class='fa fa-angle-double-right'></i>".$projects."</a></li>";
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
									RecoverMax</a>
								</div>
								<!-- Collect the nav links, forms, and other content for toggling -->
								<div class="collapse navbar-collapse navbar-ex1-collapse">

									<ul class="nav navbar-nav navbar-right">
										<li>
											<a href="Project/Project_Main/<?=$project?>">
											Main</a>
										</li>
										<li>
											<a href="SmokeTest/Releases/<?=$project?>">
											Smoketest</a>
										</li>

										<li class="active">
											<a href="Jira/Releases/<?=$project?>">
											Jira </a>
										</li>

										<li class="dropdown">
											<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
											Dropdown <i class="fa fa-angle-down"></i>
											</a>
											<ul class="dropdown-menu">
												<li>
													<a href="javascript:;">
													Action </a>
												</li>
												<li>
													<a href="javascript:;">
													Another action </a>
												</li>
												<li>
													<a href="javascript:;">
													Something else here </a>
												</li>
												<li>
													<a href="javascript:;">
													Separated link </a>
												</li>
											</ul>
										</li>
									</ul>
								</div>
								<!-- /.navbar-collapse -->
							</div>
							</div>

							<div class="col-md-9">
								<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
										Select a Browser

							</div>
						</div>
						<div class="portlet-body">


						<table class="table table-bordered" id="sample_2"	>
							<thead>
							<tr>
								<th>Browser Name</th>
								<th>Pass</th>
								<th>Fail</th>
								<th>Pending</th>
								<th>Not Started</th>
								<th>Total Scenario</th>
								<th>Test Completion</th>
								<th>Actions</th>
							</tr>
							</thead>
							<tbody>

							<?php

							foreach($result_set as $k=>$v)
							{
								foreach($v as $br)
								{
									if(!$br['totalScenario'] == 0)
									{
										$test_completion = round(((($br['totalPass']+$br['totalFail'])/$br['totalScenario'])*100));
									}
									else
									{
										$test_completion = 0 ;
									}
									echo "<tr>" .
									"<td><a href='Jira/Ticket/".$project."/" .$release . "/" .urlencode($br['browser_name'])."' style='text-decoration:underline'>".$br['browser_name']."</a></td>".
									"<td>".$br['totalPass']."</td>".
									"<td>".$br['totalFail']."</td>".
									"<td>".$br['totalPending']."</td>".
									"<td>".$br['totalNotStarted']."</td>".
									"<td>".$br['totalScenario']."</td>".
									"<td>".$test_completion."%</td>".
									"<td></td>".
									"</tr>" ;
								}
							}

							?>

							</tbody>
						</table>

						</div>

									</div>
								</div>


							<div class="col-md-3">
								<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								Manage Browser

							</div>

						</div>
						<div class="portlet-body">
							<form class="form-horizontal" action="project/addBrowser" method ="post">
								<div class="form-body">
									<div class="form-group">
										<input type='hidden' name ='project_id' value="<?= $project_id ?>">
										<input type='hidden' name ='project' value="<?= $project ?>">
										<input type='hidden' name ='release' value="<?= $release ?>">
										<label class="control-text col-md-12">Browser Name:</label>
										<div class="col-md-12">
											<div class="input-group">
													<input class="form-control" name="new_browser" placeholder="Enter New Browser" type="text">
												<span class="input-group-btn">
												<button  class="btn btn-success" type="submit"><i class="fa fa-plus"></i> Add</button>
												</span>
											</div>
										</div>
									</div>
								</div>
							</form>
							<form class="form" action='Project/updateBrowserSettings' method="post">
							<div class="form-body">
							<div class="form-group">
								<label>Select Browser</label>
									<div class="input-group">
										<div class="icheck-list">
											<?php
											$checked = "";
											$no_browser_checked = "";
											if(count($browsers) != 1)
											{

												foreach($browsers as $browser)
												{
													if($browser['browser_name'] == "No Browser")
													{
														continue;
													}
													elseif(in_array($browser['browser_id'], $getSettings) )
													{
														$checked ="checked";
													}
													else
													{
														$checked ="";
													}
													echo "<label>" .
														 "<input type='checkbox' class='browser' ".$checked." name='browser_selection[]' value='".$browser['browser_id']."'>" . $browser['browser_name'] .
														 "</label> ";
												}
											}
											else
											{
												echo "<h6>- Please Add Browsers if needed -</h6>";
											}
											?>

										</div>
									</div>
							</div>
							<div class="form-group">
								<label>Or</label>
									<div class="input-group">
										<div class="icheck-list">
											<label>
											<?php
											if(in_array($no_browser_id,$getSettings))
											{
												$no_browser_checked = "checked";
											}
											?>
												<input type="checkbox" id = "no_browser" <?= $no_browser_checked ?> value="<?= $no_browser_id ?>"> No Browser
												<input type="hidden" name="no_browser" value="<?= $no_browser_id ?>">
												<input type="hidden" name="release" value="<?= $release ?>">
												<input type="hidden" name="project_id" value="<?= $project_id ?>">
												<input type="hidden" name="project" value="<?= $project ?>">
												<input type="hidden" name="release_setting_key" value="<?= $release_setting_key ?>">
											</label>
										</div>
									</div>
							</div>

							<div class="form-action">
								<button type="submit" class="btn blue " >Apply Changes <i class='fa fa-check'></i></button>
							</div>
							</form>
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

	<!-- Add Release -->
	<div class="modal fade in" id="add_release" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog ">
									<div class="modal-content">
										<div class="modal-header green">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Add New Release</h4>
										</div>
										<div class="modal-body">


									<div class="form-group">
										<label class="col-md-3 control-label" style="margin-top:5px">Release #</label>
										<div class="col-md-9">
											<input class="form-control" placeholder="Enter Release" type="text">
										</div>
									</div>

									<br><br>
									<div class="form-group">
										<label class="col-md-3 control-label" style="margin-top:5px">Date Released</label>
										<div class="col-md-9">
											<input class="form-control" placeholder="Enter Release" type="text" value="<?php $date = date('Y-m-d'); echo $date;?>" disabled>
										</div>
									</div>



										</div>
										<div class="modal-footer">
										<div style="margin-right:12px">
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											<button type="button" class="btn blue" data-dismiss="modal">Add</button>
											</div>
										</div>
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
										<div class="modal-body">
								<form action="" class="form-horizontal form-row-seperated">
								<div class="form-group">
										<label class="control-label col-md-3">Browser Name</label>
										<div class="col-md-8">
											<div class="input-group" style="text-align:left">
												<input type="text" class="form-control" name="username1" id="username1_input">
												<span class="input-group-btn">
												<a href="javascript:;" class="btn green" id="">
												<i class="fa fa-plus"></i> Add </a>
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
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="assets/admin/layout6/scripts/layout.js" type="text/javascript"></script>
<script src="assets/admin/layout6/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="assets/admin/layout6/scripts/index.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/table-advanced.js"></script>
<script src="assets/admin/pages/scripts/components-dropdowns.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {
   	Metronic.init(); // init metronic core componets
   	Layout.init(); // init layout
	ComponentsDropdowns.init();
	TableAdvanced.init();

});

 $('#no_browser').change(function(){
   $(".browser" ).each(function( index ) {
		$(this).prop('checked', false);
		console.log( index + ": " + $(this).is(":checked") );
		$.uniform.update();
	});
 });

  $('.browser').change(function(){
   $("#no_browser" ).each(function( index ) {
		$(this).prop('checked', false);
		console.log( index + ": " + $(this).is(":checked") );
		$.uniform.update();
	});
 });


</script>
<!-- END JAVASCRIPTS -->

</body>

<!-- END BODY -->
</html>
