<!DOCTYPE html>
<html>
    <head>
        <title>본격 무속 포털 ADMIN</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="UTF-8" />
        <!-- CSS
  ================================================== -->
        <link rel="stylesheet" href="/css/style.css">

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
        <link rel="shortcut icon" href="/images/favicon.ico">
		<script type="text/javascript" src="/js/jquery-2.1.4.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js"></script>
		<script src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/markerwithlabel/src/markerwithlabel.js"></script>
		<script type="text/javascript" src="/js/common.js"></script>
		<script type="text/javascript" src="/js/page.js"></script>
		<script type="text/javascript" src="/js/<?=$com?>.js"></script>
    </head>

<body class="full">

    <div class="fake-table">
        <div class="fake-table-cell">
            <div id="login">
                <div class="top left clearfix">
                    <div class="logo left"><img src="/images/id-logo.png" alt="logo"></div>
                    <p>SSG ADMIN<br><span>LOGIN PAGE</span></p>
                </div>
                <form class="clearfix" name="loginForm" method="post" action="/?com=mng&pro=login&mng=Y">
                    <div class="fields">
                        <fieldset>
                            <input type="text" name="id" placeholder="LOGIN" style="text-transform:none;">
                            <span><i class="fa fa-user"></i></span>
                        </fieldset>
                        <fieldset>
                            <input type="password" name="pwd" placeholder="PASSWORD">
                            <span><i class="fa fa-key"></i></span>
                        </fieldset>
                        <input type="submit" value="OK">
                    </div>
                    <!--<div class="bottom clearfix">
                        <input type="checkbox" data-label="REMEMBER ME" checked>
                        <a href="03-02-forgot-password.php" class="forgot right">FORGOT PASSWORD?</a>
                    </div>-->
                </form>
            </div>
        </div>
    </div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
<script src="js/libs/bootstrap.min.js"></script>
<script src="js/libs/waypoints.js"></script>
<script src="js/libs/jquery.counterup.min.js"></script>
<script src="js/libs/chosen.jquery.min.js"></script>
<script src="js/libs/input.slider.js"></script>
<script src="js/libs/bxslider.js"></script>
<script src="js/libs/prettyCheckable.min.js"></script>
<script src="js/libs/jquery.dataTables.min.js"></script>
<script src="js/libs/chartist/chartist.min.js"></script>
<script src="js/libs/chartist/chartist-plugin-tooltip.js"></script>
<script src="js/libs/datepicker/moment.min.js"></script>
<script src="js/libs/datepicker/bootstrap-datetimepicker.min.js"></script>
<script src="js/libs/jquery.matchHeight-min.js"></script>
<script src="js/libs/jquery.fileupload.js"></script>
<script src="js/libs/fileStyle.js"></script>
<script src="js/libs/tagsInput.js"></script>
<script src="js/plugins.js"></script>
<script src="js/charts.js"></script>
<script src="js/upload.js"></script>
<script src="js/app.js"></script>
</body>
</html>