<!DOCTYPE html>
<html>
    <head>
        <title>본격 무속 포털 ADMIN</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- CSS
  ================================================== -->
        <link rel="stylesheet" href="css/style2.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <!-- FONTS
  ================================================== -->

        <!-- Favicons
        ================================================== -->
        <link rel="shortcut icon" href="images/favicon.ico">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<script type="text/javascript" src="/js/jquery-2.1.4.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js"></script>
		<script src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/markerwithlabel/src/markerwithlabel.js"></script>
		<script type="text/javascript" src="/js/common.js"></script>
		<script type="text/javascript" src="/js/page.js"></script>
		<script type="text/javascript" src="/js/<?=$com?>.js"></script>
    </head>
	<body>

		<header class="clearfix">
			<div class="user left clearfix">
				<!-- <div class="avatar"><img src="images/avatar.png" alt="user"></div> -->
<?if($_SESSION["ADMIN_ID"] != ""){?>
				<p><?=$_SESSION["ADMIN_ID"]?><br><span>MANAGER</span></p>
				<a href="/?com=mng&pro=logout&mng=Y" class="logout"><i class="fa fa-power-off"></i></a>
<?}?>
			</div>
			<div class="search right clearfix" style="color:#ffffff;">
				<img src="/images/logo.png" style="padding:5px;width:200px;height:auto;"/>
			</div>
		</header>

		<div id="wrapper" class="clearfix expand">

			<?php include('inc/mngMenu.php'); ?>

			<div id="content" class="right">