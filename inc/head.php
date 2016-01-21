<?
	$addClass = "";
	$addStyle = "";
	if($com == "shaman" && $lnd == "join"){
		$addClass = "st_sch_wrap_shop_join";
		$addStyle = " style=\"width:540px;\"";
	}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>산신각 - 선생님 이름별 < 유명점집</title>
    <script src="/js/jquery-1.11.3.min.js"></script>
    <script src="/css/common.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js"></script>
	<script src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/markerwithlabel/src/markerwithlabel.js"></script>
	<script type="text/javascript" src="/js/common.js"></script>
	<script type="text/javascript" src="/js/page.js"></script>
	<script type="text/javascript" src="/js/<?=$com?>.js"></script>

    <link rel="stylesheet" href="/css/layout.css" />
<?
	if($com=="shaman"){
		if($lnd != "join"){
?>
    <link rel="stylesheet" href="/css/famous.css" />
<?}else{?>
    <link rel="stylesheet" href="/css/member.css" />
<?
		}
	}else if($com=="board"){
?>
    <link rel="stylesheet" href="/css/community.css" />
<?}else if($com=="user"){?>
    <link rel="stylesheet" href="/css/member.css" />
<?}else if($com=="aqBoard"){?>
    <link rel="stylesheet" href="/css/community.css" />
<?}?>

    <script>

        function toggleView(obj)
        {
            if ($(obj).attr("alt") == "확대")
            {
                $(obj).attr("src", "/images/btn_collapse.gif");
                $(obj).attr("alt", "축소");
                $(obj).parent().next().show(100);
            }
            else
            {
                $(obj).attr("src", "/images/btn_expand.gif");
                $(obj).attr("alt", "확대");
                $(obj).parent().next().hide(100);
            }
        }

    </script>
</head>
<body>
    <!-- 상단 로고 ~ 검색 시작 -->
    <div class="sub_top_wrap">
        <h1 class="sub_h1"><a href="?com=index" title="첫 페이지로 이동합니다."><img src="/images/logo.jpg" alt="산신각" /></a></h1>

        <nav class="sub_top_nav">
            <ul class="l_style_left">
<?if($_SESSION["SH_ID"] == ""){?>
                <!--<li><a href="?com=shaman&lnd=join"><input type="button" value="무료 점집 등록하기" class="btn1" /></a></li>-->
<?}?>

<?if($_SESSION["SH_ID"] != ""){?>
                <li><input type="button" value="마이페이지" onclick="location.href = '?com=shMypage&lnd=modify';" class="btn1" /></li>
				<li><a href="?com=shaman&pro=logout">로그아웃</a></li>
                <!-- <li><a href="?com=shMypage&lnd=resList">예약 관리</a></li> -->
<?}else{?>
<?if($_SESSION["USER_ID"] == ""){?>
                <li><input type="button" value=" 로 그 인" onclick="location.href = '?com=user&lnd=login';" class="btn1" /></li>
                <li><a href="?com=user&lnd=join">회원가입</a></li>
<?}else{?>
                <li><input type="button" value="마이페이지" onclick="location.href = '?com=mypage&lnd=modify';" class="btn1" /></li>
				<li><a href="?com=user&pro=logout">로그아웃</a></li>
                <!-- <li><a href="?com=mypage&lnd=resList">예약확인</a></li> -->
<?}?>
<?}?>
			</ul>
        </nav>

        <div class="st_sch_wrap <?=$addClass?>">
            <div class="st_sch_input">
				<?
					if($com == "shaman"){
						if($lnd != "join" && $lnd != "login"){
							include $_SERVER["DOCUMENT_ROOT"]."/inc/shamanSearch.php";
						}else{
							include $_SERVER["DOCUMENT_ROOT"]."/inc/boardSearch.php";
						}
					}else{
						include $_SERVER["DOCUMENT_ROOT"]."/inc/boardSearch.php";
					}
				?>
            </div>
        </div>
    </div>
    <!-- 상단 로고 ~ 검색 끝 -->


    <div class="sub_content_wrap" <?=$addStyle?>>
		<?
			if($com=="user" && ($lnd == "join" || $lnd == "login" || $lnd == "search" || $lnd == "out")){
				include $_SERVER["DOCUMENT_ROOT"]."/inc/userMenu.php";
			}
		?>