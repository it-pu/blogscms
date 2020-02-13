<?php $AuthDivisionCrud = array(16,12); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<title>Dashboard | Podomoro University</title>

	<!--=== CSS ===-->
	<link href="<?= base_url('assets/img/favicon.png') ?>" rel="icon">
	<link href="<?= base_url('assets/img/favicon.png') ?>" rel="apple-touch-icon">
	<!-- Bootstrap -->
	<link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />

	<!-- jQuery UI -->
	<!--<link href="<?= base_url('assets/plugins/jquery-ui/jquery-ui-1.10.2.custom.css')?>" rel="stylesheet" type="text/css" />-->
	<!--[if lt IE 9]>
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/plugins/jquery-ui/jquery.ui.1.10.2.ie.css')?>"/>
	<![endif]-->

	<!-- Theme -->
	<link href="<?= base_url('assets/css/main.css')?>" rel="stylesheet" type="text/css" />
	<link href="<?= base_url('assets/css/plugins.css')?>" rel="stylesheet" type="text/css" />
	<link href="<?= base_url('assets/css/responsive.css')?>" rel="stylesheet" type="text/css" />
	<link href="<?= base_url('assets/css/icons.css')?>" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" href="<?= base_url('assets/css/fontawesome/font-awesome.css')?>">
	<!--[if IE 7]>
		<link rel="stylesheet" href="<?= base_url('assets/css/fontawesome/font-awesome-ie7.min.css')?>">
	<![endif]-->

	<!--[if IE 8]>
		<link href="<?= base_url('assets/css/ie8.css')?>" rel="stylesheet" type="text/css" />
	<![endif]-->
	<!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'> -->
	<link href="<?= base_url('assets/plugins/summernote/summernote.css')?>" rel="stylesheet" type="text/css" />
	<link href="<?= base_url('assets/css/prettify.css')?>" rel="stylesheet" type="text/css" />

	<!--=== JavaScript ===-->

	<script type="text/javascript" src="<?= base_url('assets/js/libs/jquery-1.10.2.min.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js')?>"></script>

	<script type="text/javascript" src="<?= base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/libs/lodash.compat.min.js')?>"></script>

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="<?= base_url('assets/js/libs/html5shiv.js')?>"></script>
	<![endif]-->

	<!-- Smartphone Touch Events -->
	<script type="text/javascript" src="<?= base_url('assets/plugins/touchpunch/jquery.ui.touch-punch.min.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/plugins/event.swipe/jquery.event.move.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/plugins/event.swipe/jquery.event.swipe.js')?>"></script>

	<!-- General -->
	<script type="text/javascript" src="<?= base_url('assets/js/libs/breakpoints.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/plugins/respond/respond.min.js')?>"></script> <!-- Polyfill for min/max-width CSS3 Media Queries (only for IE8) -->
	<script type="text/javascript" src="<?= base_url('assets/plugins/cookie/jquery.cookie.min.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/plugins/slimscroll/jquery.slimscroll.min.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/plugins/slimscroll/jquery.slimscroll.horizontal.min.js')?>"></script>

  <!-- JWT Encode -->
    <script type="text/javascript" src="<?= base_url('assets/plugins/jwt/encode/hmac-sha256.js')?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/plugins/jwt/encode/enc-base64-min.js')?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/plugins/jwt/encode/jwt.encode.js')?>"></script>

    <!-- JWT Decode -->
    <script type="text/javascript" src="<?= base_url('assets/plugins/jwt/decode/build/jwt-decode.min.js')?>"></script>

	<!-- Page specific plugins -->
    <script type="text/javascript" src="<?= base_url('assets/plugins/summernote/summernote.js')?>"></script>
	<!-- Forms -->
	<script type="text/javascript" src="<?= base_url('assets/plugins/typeahead/typeahead.min.js')?>"></script> 
	<script type="text/javascript" src="<?= base_url('assets/plugins/autosize/jquery.autosize.min.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/plugins/inputlimiter/jquery.inputlimiter.min.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/plugins/uniform/jquery.uniform.min.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/plugins/fileinput/fileinput.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/plugins/validation/jquery.validate.min.js')?>"></script>
	<!-- Noty -->
	<script type="text/javascript" src="<?= base_url('assets/plugins/noty/jquery.noty.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/plugins/noty/layouts/top.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/plugins/noty/themes/default.js')?>"></script>
	<!-- bootstrap-wysihtml5 -->
	<!-- <script type="text/javascript" src="<?= base_url('assets/plugins/bootstrap-wysihtml5/wysihtml5.min.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.min.js')?>"></script> -->

	<!-- Styled radio and checkboxes -->
	<!-- DataTables -->
	<!-- OLD dari Yamin
	<script type="text/javascript" src="<?= base_url('assets/plugins/datatables/jquery.dataTables.min.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/plugins/datatables/DT_bootstrap.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/plugins/datatables/responsive/datatables.responsive.js')?>"></script> -->
	<!-- optional -->
	<!-- OLD dari Yamin -->

	<!--<script type="text/javascript" src="--><!--plugins/datatables/jquery.dataTables.min.js"></script>-->
	<script type="text/javascript" src="https://pcam.podomorouniversity.ac.id/assets/template/plugins/datatables/tes/jquery.dataTables.js"></script>
	<!--<script type="text/javascript" src="--><!--plugins/datatables/tes/dataTables.bootstrap.min.js"></script>-->
	<script type="text/javascript" src="https://pcam.podomorouniversity.ac.id/assets/template/plugins/datatables/tabletools/TableTools.min.js"></script> <!-- optional -->
	<script type="text/javascript" src="https://pcam.podomorouniversity.ac.id/assets/template/plugins/datatables/colvis/ColVis.min.js"></script> <!-- optional -->
	<script type="text/javascript" src="https://pcam.podomorouniversity.ac.id/assets/template/plugins/datatables/DT_bootstrap.js"></script>
	<!--<script type="text/javascript" src="--><!--plugins/datatables/dataTables.rowReorder.js"></script>-->

	<!-- Plugin DataTbales -->
	<script type="text/javascript" src="https://pcam.podomorouniversity.ac.id/assets/datatables/dataTables.rowsGroup.js"></script>
	<!--toastr-->
	<link href="https://pcam.podomorouniversity.ac.id/assets/template/plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="https://pcam.podomorouniversity.ac.id/assets/template/plugins/toastr/toastr.min.js"></script>

	<!-- App -->
	<script type="text/javascript" src="<?= base_url('assets/js/app.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/plugins.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/plugins.form-components.js')?>"></script>
	<!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  	<script>tinymce.init({selector:'textarea.default'});</script> -->


	<script>
	$(document).ready(function(){
		"use strict";
		App.init(); // Init layout and core plugins
		// Plugins.init(); // Init all plugins
		FormComponents.init(); // Init all form-specific plugins

		toastr.options = {
		  "closeButton": true,
		  "debug": false,
		  "newestOnTop": false,
		  "progressBar": false,
		  "positionClass": "toast-top-center",
		  "preventDuplicates": false,
		  "onclick": null,
		  "showDuration": "300",
		  "hideDuration": "1000",
		  "timeOut": "5000",
		  "extendedTimeOut": "1000",
		  "showEasing": "swing",
		  "hideEasing": "linear",
		  "showMethod": "fadeIn",
		  "hideMethod": "fadeOut"
		}
	});
	</script>
	<script type="text/javascript" src="<?= base_url('assets/js/demo/form_validation.js')?>"></script>

	<script type="text/javascript">
    	window.base_url_js = "<?php echo base_url(); ?>";
       	window.base_url_js_sw = "<?= url_blog ?>"; //routes url_blogs_admin in index.php
	</script>


</head>

<body>

	<!-- Header -->
	<header class="header navbar navbar-fixed-top" role="banner">
		<!-- Top Navigation Bar -->
		<div class="container">

			<!-- Only visible on smartphones, menu toggle -->
			<ul class="nav navbar-nav">
				<li class="nav-toggle"><a href="javascript:void(0);" title=""><i class="icon-reorder"></i></a></li>
			</ul>

			<!-- Logo -->
			<a class="navbar-brand" href="<?= base_url('dashboard')?>">
				<img src="<?= base_url('assets/img/logo-header-hitam-putih.png')?>" alt="logo" style="width: 150px;   padding: 5px;"/>
			</a>
			<!-- /logo -->

			<!-- Sidebar Toggler -->
			<a href="#" class="toggle-sidebar bs-tooltip" data-placement="bottom" data-original-title="Toggle navigation">
				<i class="icon-reorder"></i>
			</a>
			<!-- /Sidebar Toggler -->

			<!-- Top Left Menu -->
			<ul class="nav navbar-nav navbar-left hidden-xs hidden-sm">
				<li>
					<a href="<?= base_url('dashboard')?>">
						Dashboard
					</a>
				</li>
				<li>
					<a href="https://blogs.podomorouniversity.ac.id/" target="_blink">
						Preview Live
						<i class="icon-external-link"></i>
					</a>
					
				</li>
			</ul>
			<!-- /Top Left Menu -->

			<!-- Top Right Menu -->
			<ul class="nav navbar-nav navbar-right">
				<!-- Notifications -->
				<!-- <li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-warning-sign"></i>
						<span class="badge">5</span>
					</a>
					<ul class="dropdown-menu extended notification">
						<li class="title">
							<p>You have 5 new notifications</p>
						</li>
						<li>
							<a href="javascript:void(0);">
								<span class="label label-success"><i class="icon-plus"></i></span>
								<span class="message">New user registration.</span>
								<span class="time">1 mins</span>
							</a>
						</li>
						<li>
							<a href="javascript:void(0);">
								<span class="label label-danger"><i class="icon-warning-sign"></i></span>
								<span class="message">High CPU load on cluster #2.</span>
								<span class="time">5 mins</span>
							</a>
						</li>
						<li>
							<a href="javascript:void(0);">
								<span class="label label-success"><i class="icon-plus"></i></span>
								<span class="message">New user registration.</span>
								<span class="time">10 mins</span>
							</a>
						</li>
						<li>
							<a href="javascript:void(0);">
								<span class="label label-info"><i class="icon-bullhorn"></i></span>
								<span class="message">New items are in queue.</span>
								<span class="time">25 mins</span>
							</a>
						</li>
						<li>
							<a href="javascript:void(0);">
								<span class="label label-warning"><i class="icon-bolt"></i></span>
								<span class="message">Disk space to 85% full.</span>
								<span class="time">55 mins</span>
							</a>
						</li>
						<li class="footer">
							<a href="javascript:void(0);">View all notifications</a>
						</li>
					</ul>
				</li> -->

				<!-- Tasks -->
				<!-- <li class="dropdown hidden-xs hidden-sm">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-tasks"></i>
						<span class="badge">7</span>
					</a>
					<ul class="dropdown-menu extended notification">
						<li class="title">
							<p>You have 7 pending tasks</p>
						</li>
						<li>
							<a href="javascript:void(0);">
								<span class="task">
									<span class="desc">Preparing new release</span>
									<span class="percent">30%</span>
								</span>
								<div class="progress progress-small">
									<div style="width: 30%;" class="progress-bar progress-bar-info"></div>
								</div>
							</a>
						</li>
						<li>
							<a href="javascript:void(0);">
								<span class="task">
									<span class="desc">Change management</span>
									<span class="percent">80%</span>
								</span>
								<div class="progress progress-small progress-striped active">
									<div style="width: 80%;" class="progress-bar progress-bar-danger"></div>
								</div>
							</a>
						</li>
						<li>
							<a href="javascript:void(0);">
								<span class="task">
									<span class="desc">Mobile development</span>
									<span class="percent">60%</span>
								</span>
								<div class="progress progress-small">
									<div style="width: 60%;" class="progress-bar progress-bar-success"></div>
								</div>
							</a>
						</li>
						<li>
							<a href="javascript:void(0);">
								<span class="task">
									<span class="desc">Database migration</span>
									<span class="percent">20%</span>
								</span>
								<div class="progress progress-small">
									<div style="width: 20%;" class="progress-bar progress-bar-warning"></div>
								</div>
							</a>
						</li>
						<li class="footer">
							<a href="javascript:void(0);">View all tasks</a>
						</li>
					</ul>
				</li> -->

				<!-- Messages -->
				<!-- <li class="dropdown hidden-xs hidden-sm">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-envelope"></i>
						<span class="badge">1</span>
					</a>
					<ul class="dropdown-menu extended notification">
						<li class="title">
							<p>You have 3 new messages</p>
						</li>
						<li>
							<a href="javascript:void(0);">
								<span class="photo"><img src="<?= base_url('assets/img/demo/avatar-1.jpg')?>" alt="" /></span>
								<span class="subject">
									<span class="from">Bob Carter</span>
									<span class="time">Just Now</span>
								</span>
								<span class="text">
									Consetetur sadipscing elitr...
								</span>
							</a>
						</li>
						<li>
							<a href="javascript:void(0);">
								<span class="photo"><img src="<?= base_url('assets/img/demo/avatar-2.jpg')?>" alt="" /></span>
								<span class="subject">
									<span class="from">Jane Doe</span>
									<span class="time">45 mins</span>
								</span>
								<span class="text">
									Sed diam nonumy...
								</span>
							</a>
						</li>
						<li>
							<a href="javascript:void(0);">
								<span class="photo"><img src="<?= base_url('assets/img/demo/avatar-3.jpg')?>" alt="" /></span>
								<span class="subject">
									<span class="from">Patrick Nilson</span>
									<span class="time">6 hours</span>
								</span>
								<span class="text">
									No sea takimata sanctus...
								</span>
							</a>
						</li>
						<li class="footer">
							<a href="javascript:void(0);">View all messages</a>
						</li>
					</ul>
				</li> -->

				<!-- .row .row-bg Toggler -->
				<!-- <li>
					<a href="#" class="dropdown-toggle row-bg-toggle">
						<i class="icon-resize-vertical"></i>
					</a>
				</li> -->

				<!-- Project Switcher Button -->
				<!-- <li class="dropdown">
					<a href="#" class="project-switcher-btn dropdown-toggle">
						<i class="icon-folder-open"></i>
						<span>Projects</span>
					</a>
				</li> -->

				<!-- User Login Dropdown -->
				<li class="dropdown user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<!--<img alt="" src="<?= base_url('assets/img/avatar1_small.jpg')?>" />-->
						<i class="icon-male"></i>
						<span class="username"><?php echo $this->session->userdata('Name') ?></span>
						<i class="icon-caret-down small"></i>
					</a>
					<ul class="dropdown-menu">
						<!-- <li><a href="pages_user_profile.html"><i class="icon-user"></i> My Profile</a></li>
						<li><a href="pages_calendar.html"><i class="icon-calendar"></i> My Calendar</a></li>
						<li><a href="#"><i class="icon-tasks"></i> My Tasks</a></li> -->
						<!-- <li class="divider"></li> -->
						<li><a href="<?php echo base_url().'logout' ?>"><i class="icon-key"></i> Log Out</a></li>
					</ul>
				</li>
				<!-- /user login dropdown -->
			</ul>
			<!-- /Top Right Menu -->
		</div>
		<!-- /top navigation bar -->

		<!--=== Project Switcher ===-->
		<!-- <div id="project-switcher" class="container project-switcher">
			<div id="scrollbar">
				<div class="handle"></div>
			</div>

			<div id="frame">
				<ul class="project-list">
					<li>
						<a href="javascript:void(0);">
							<span class="image"><i class="icon-desktop"></i></span>
							<span class="title">Lorem ipsum dolor</span>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<span class="image"><i class="icon-compass"></i></span>
							<span class="title">Dolor sit invidunt</span>
						</a>
					</li>
					<li class="current">
						<a href="javascript:void(0);">
							<span class="image"><i class="icon-male"></i></span>
							<span class="title">Consetetur sadipscing elitr</span>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<span class="image"><i class="icon-thumbs-up"></i></span>
							<span class="title">Sed diam nonumy</span>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<span class="image"><i class="icon-female"></i></span>
							<span class="title">At vero eos et</span>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<span class="image"><i class="icon-beaker"></i></span>
							<span class="title">Sed diam voluptua</span>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<span class="image"><i class="icon-desktop"></i></span>
							<span class="title">Lorem ipsum dolor</span>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<span class="image"><i class="icon-compass"></i></span>
							<span class="title">Dolor sit invidunt</span>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<span class="image"><i class="icon-male"></i></span>
							<span class="title">Consetetur sadipscing elitr</span>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<span class="image"><i class="icon-thumbs-up"></i></span>
							<span class="title">Sed diam nonumy</span>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<span class="image"><i class="icon-female"></i></span>
							<span class="title">At vero eos et</span>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<span class="image"><i class="icon-beaker"></i></span>
							<span class="title">Sed diam voluptua</span>
						</a>
					</li>
				</ul>
			</div> 
		</div>  -->
		<!-- /#project-switcher -->
	</header> <!-- /.header -->

	<div id="container">
		<div id="sidebar" class="sidebar-fixed">
			<div id="sidebar-content">
				<div class="text-center" style="margin-top: 20px;">
					<img class="img-circle" width="90" src="<?= $this->session->userdata('PathPhoto')?>">
					<p><strong><?php echo $this->session->userdata('Name') ?></strong></p>
					<p><?= $this->session->userdata('User')?></p>
				</div>
				
				<!--=== Navigation ===-->
				<ul id="nav">
					<li class="<?php if($this->uri->segment(1) == 'dashboard' ){echo 'current';} ?>">
						<a href="<?=  base_url('dashboard')?>">
							<i class="icon-dashboard"></i>
							Dashboard
						</a>
					</li>
					<?php if (in_array($this->session->userdata('DivisionID') , $AuthDivisionCrud)): ?>
					<li class="<?php if($this->uri->segment(1) == 'about' ){echo 'current';} ?>">
						<a href="<?=  base_url('about')?>">
							<i class="icon-globe"></i>
							About
						</a>
						
					</li>
					<?php endif ?>
					<li class="<?php if($this->uri->segment(1) == 'content' ){echo 'current open';} ?>">
						<a href="javascript:void(0);">
							<i class="icon-desktop"></i>
							Content
<!-- 							<span class="label label-info pull-right">6</span>
 -->						</a>
						<ul class="sub-menu">
							<li class="<?php if($this->uri->segment(2) == 'article' ){echo 'current';} ?>">
								<a href="<?=  base_url('content/article')?>">
								<i class="icon-angle-right"></i>
								Article
								</a>
							</li>
							<li class="<?php if($this->uri->segment(2) == 'category' ){echo 'current';} ?>">
								<a href="<?=  base_url('content/category')?>">
								<i class="icon-angle-right"></i>
								Category
								</a>
							</li>
						</ul>
					</li>
					<?php if (in_array($this->session->userdata('DivisionID') , $AuthDivisionCrud)): ?>
					<li class="<?php if($this->uri->segment(1) == 'contact' ){echo 'open';} ?>">
						<a href="<?= base_url('contact')?>">
							<i class="icon-book"></i>
							Contact
						</a>
						
					</li>
					<?php endif ?>
					<!-- <li>
						<a href="javascript:void(0);">
							<i class="icon-user"></i>
							User
						</a>
						
					</li> -->
					<?php if (in_array($this->session->userdata('DivisionID') , $AuthDivisionCrud)): ?>
					<li class="<?php if($this->uri->segment(1) == 'setting' ){echo 'open';} ?>">
						<a href="<?= base_url('setting')?>">
							<i class="icon-cog"></i>
							Setting
						</a>
					</li>
					<?php endif ?>
					
						</ul>
					</li>
				</ul>
				
				<!-- /Navigation -->
				

				<div class="sidebar-widget align-center">
					<div class="btn-group" data-toggle="buttons" id="theme-switcher">
						<label class="btn active">
							<input type="radio" name="theme-switcher" data-theme="bright"><i class="icon-sun"></i> Bright
						</label>
						<label class="btn">
							<input type="radio" name="theme-switcher" data-theme="dark"><i class="icon-moon"></i> Dark
						</label>
					</div>
				</div>

			</div>
			<div id="divider" class="resizeable"></div>
		</div>
		<!-- /Sidebar -->

		<?= $content; ?>

	</div>

</body>
</html>

<!-- Global Modal Large -->
<div class="modal fade" id="GlobalModalLarge" role="dialog">
    <div class="modal-dialog" role="document" style="width:900px;">
        <div class="modal-content animated jackInTheBox">
            <div class="modal-header"></div>
            <div class="modal-body"></div>
            <div class="modal-footer"></div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Global Modal Large -->
<!-- Global Modal ExtraLarge -->
<div class="modal fade" id="GlobalModalXtraLarge" role="dialog">
    <div class="modal-dialog" role="document" style="width:1280px;">
        <div class="modal-content animated jackInTheBox">
            <div class="modal-header"></div>
            <div class="modal-body"></div>
            <div class="modal-footer"></div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">

	function Validation_leastCharacter(leastNumber,string,theName) {
	    var result = {status:1, messages:""};
	    var stringLenght =  string.length;
	    if (stringLenght < leastNumber) {
	        result = {status : 0,messages: theName + " at least " + leastNumber + " character"};
	    }
	    return result;
	}

	function Validation_email(string,theName)
	{
	    var result = {status:1, messages:""};
	    var regexx =  /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	    if (!string.match(regexx)) {
	        result = {status : 0,messages: theName + " an invalid email address! "};
	    }
	    return result;
	}

	function Validation_email_gmail(string,theName)
	{
	    var result = {status:1, messages:""};
	    var regexx =  /^[a-z0-9](\.?[a-z0-9]){5,}@g(oogle)?mail\.com$/;
	    if (!string.match(regexx)) {
	        result = {status : 0,messages: theName + " only gmail allowed to register! "};
	    }
	    return result;
	}

	function Validation_required(string,theName)
	{
	    var result = {status:1, messages:""};
	    if (string == "" || string == null) {
	        result = {status : 0,messages: theName + " is required! "};
	    }
	    return result;
	}

	function Validation_numeric(string,theName)
	{
	    var result = {status:1, messages:""};
	    var regexx =  /^\d+$/;
	    if (!string.match(regexx)) {
	        result = {status : 0,messages: theName + " only numeric! "};
	    }
	    return result;
	}
	function Validation_decimal(string,theName)
	{
	    var result = {status:1, messages:""};
	    var regexx =  /^\d*\.?\d*$/;
	    if (!string.match(regexx)) {
	        result = {status : 0,messages: theName + " only decimal! "};
	    }
	    return result;
	}

	function AjaxSubmit(url='',token='',ArrUploadFilesSelector=[]){
	     var def = jQuery.Deferred();
	     var form_data = new FormData();
	     form_data.append('token',token);
	     if (ArrUploadFilesSelector.length>0) {
	        for (var i = 0; i < ArrUploadFilesSelector.length; i++) {
	            var NameField = ArrUploadFilesSelector[i].NameField+'[]';
	            var Selector = ArrUploadFilesSelector[i].Selector;
	            var UploadFile = Selector[0].files;
	            for(var count = 0; count<UploadFile.length; count++)
	            {
	             form_data.append(NameField, UploadFile[count]);
	            }
	        }
	     }

	     $.ajax({
	       type:"POST",
	       url:url,
	       data: form_data,
	       contentType: false,       // The content type used when sending data to the server.
	       cache: false,             // To unable request pages to be cached
	       processData:false,
	       dataType: "json",
	       success:function(data)
	       {
	        def.resolve(data);
	       },  
	       error: function (data) {
	         // toastr.info('No Result Data'); 
	         def.reject();
	       }
	     })
	     return def.promise();
	}

	function loading_button2(selector) {
	    selector.html('<i class="fa fa-refresh fa-spin fa-fw right-margin"></i> Loading...');
	    selector.prop('disabled',true);
	}

	function end_loading_button2(selector,html='Save'){
	    selector.prop('disabled',false).html(html);
	}
</script>