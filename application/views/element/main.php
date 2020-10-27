<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<title>UD.TUGU JAYA | Task Monitoring System</title>
	<!-- Favicon-->
	<link rel="icon" href="<?php echo base_url() ?>assets/images/favicon.ico" type="image/x-icon">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
		type="text/css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

	<!-- Bootstrap Core Css -->
	<link href="<?php echo base_url() ?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

	<!-- Waves Effect Css -->
	<link href="<?php echo base_url() ?>assets/plugins/node-waves/waves.css" rel="stylesheet" />

	<!-- Animation Css -->
	<link href="<?php echo base_url() ?>assets/plugins/animate-css/animate.css" rel="stylesheet" />

	<!-- Morris Chart Css-->
	<link href="<?php echo base_url() ?>assets/plugins/morrisjs/morris.css" rel="stylesheet" />

	<!-- JQuery DataTable Css -->
	<link href="<?php echo base_url() ?>assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
	
	<!-- Bootstrap Select Css -->
    <link href="<?php echo base_url() ?>assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

	<!-- Custom Css -->
	<link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">

	<!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
	<link href="<?php echo base_url() ?>assets/css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
	<!-- Page Loader -->
	<div class="page-loader-wrapper">
		<div class="loader">
			<div class="preloader">
				<div class="spinner-layer pl-red">
					<div class="circle-clipper left">
						<div class="circle"></div>
					</div>
					<div class="circle-clipper right">
						<div class="circle"></div>
					</div>
				</div>
			</div>
			<p>Please wait...</p>
		</div>
	</div>
	<!-- #END# Page Loader -->
	<!-- Overlay For Sidebars -->
	<div class="overlay"></div>
	<!-- #END# Overlay For Sidebars -->
	<!-- Top Bar -->
	<nav class="navbar">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse"
					data-target="#navbar-collapse" aria-expanded="false"></a>
				<a href="javascript:void(0);" class="bars"></a>
				<a class="navbar-brand" href="index.html">TASK MONITORING SYSTEM</a>
			</div>
		</div>
	</nav>
	<!-- #Top Bar -->

	<?php $this->load->view('element/sidebar'); ?>

	<section class="content">
		<?php 
            if(!empty($content)){
                echo $content;
            }
        ?>
	</section>

	<!-- Jquery Core Js -->
	<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>

	<!-- Bootstrap Core Js -->
	<script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.js"></script>

	<!-- Select Plugin Js -->
	<script src="<?php echo base_url() ?>assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

	<!-- Slimscroll Plugin Js -->
	<script src="<?php echo base_url() ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

	<!-- Waves Effect Plugin Js -->
	<script src="<?php echo base_url() ?>assets/plugins/node-waves/waves.js"></script>

	<!-- Jquery CountTo Plugin Js -->
	<script src="<?php echo base_url() ?>assets/plugins/jquery-countto/jquery.countTo.js"></script>

	<!-- Morris Plugin Js -->
	<script src="<?php echo base_url() ?>assets/plugins/raphael/raphael.min.js"></script>
	<script src="<?php echo base_url() ?>assets/plugins/morrisjs/morris.js"></script>

	<!-- ChartJs -->
	<script src="<?php echo base_url() ?>assets/plugins/chartjs/Chart.bundle.js"></script>

	<!-- Flot Charts Plugin Js -->
	<script src="<?php echo base_url() ?>assets/plugins/flot-charts/jquery.flot.js"></script>
	<script src="<?php echo base_url() ?>assets/plugins/flot-charts/jquery.flot.resize.js"></script>
	<script src="<?php echo base_url() ?>assets/plugins/flot-charts/jquery.flot.pie.js"></script>
	<script src="<?php echo base_url() ?>assets/plugins/flot-charts/jquery.flot.categories.js"></script>
	<script src="<?php echo base_url() ?>assets/plugins/flot-charts/jquery.flot.time.js"></script>

	<!-- Sparkline Chart Plugin Js -->
	<script src="<?php echo base_url() ?>assets/plugins/jquery-sparkline/jquery.sparkline.js"></script>

	<!-- Jquery DataTable Plugin Js -->
    <script src="<?php echo base_url() ?>assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

	<!-- Custom Js -->
	<script src="<?php echo base_url() ?>assets/js/admin.js"></script>
	<!-- <script src="<?php echo base_url() ?>assets/js/pages/index.js"></script> -->
	<script src="<?php echo base_url() ?>assets/js/pages/tables/jquery-datatable.js"></script>
	<script src="<?php echo base_url() ?>assets/js/pages/ui/modals.js"></script>
	<script src="<?php echo base_url() ?>assets/js/pages/forms/advanced-form-elements.js"></script>

	<!-- Demo Js -->
	<script src="<?php echo base_url() ?>assets/js/demo.js"></script>
</body>

</html>
