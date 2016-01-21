<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>산신각 - 커뮤니티</title>
    <script src="/js/jquery-1.11.3.min.js"></script>
    <script src="/js/jquery-ui.min.js"></script>
    <script src="/css/common.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js"></script>
	<script src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/markerwithlabel/src/markerwithlabel.js"></script>
	<script type="text/javascript" src="/js/common.js"></script>
	<script type="text/javascript" src="/js/page.js"></script>
	<script type="text/javascript" src="/js/<?=$com?>.js"></script>
	<script type="text/javascript" src="/se2/js/HuskyEZCreator.js" charset="utf-8"></script>
    <script>
		function goSearch(){
			 if(event.keyCode == 13)
			 {
				var form = document.searchForm;
				form.searchWord.value = $('#txtKeyword').val();
				form.submit();

			 }
		}

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
	}else if($com=="board" || $com == "aqBoard"){
?>
    <link rel="stylesheet" href="/css/community.css" />
    <link rel="stylesheet" href="/css/mypage.css" />
    <link rel="stylesheet" href="/css/board.css" />


<?}else if($com=="user"){?>
    <link rel="stylesheet" href="/css/member.css" />
<?}else if($com=="aqBoard"){?>
    <link rel="stylesheet" href="/css/community.css" />
<?}else if($com=="blank"){?>
	<link rel="stylesheet" href="/css/guide.css" />
<?}else if($com=="etc"){?>
    <link rel="stylesheet" href="/css/mypage.css" />
    <link rel="stylesheet" href="/css/board.css" />
<?}else if($com=="shopping"){?>
    <link rel="stylesheet" href="/css/board.css" />
    <link rel="stylesheet" href="/css/shop.css" />
<?}?>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

</head>
<body>
	<form name="searchForm" id="searchForm" method="post" action="?com=shaman&lnd=map">
		<input type="hidden" name="searchWord" value="" />
	</form>
    <!-- 상단 로고 ~ 검색 시작 -->
    <div class="search_top_wrap" style="position:relative;">

        <h1><a href="/" title="첫 페이지로 이동합니다."><img src="/images/logo.jpg" alt="산신각" /></a></h1>

        <div class="top_input_wrap">
            <span class="search_help_txt" style="line-height:42px;" id="helpText" onclick="$('#txtKeyword').focus();">지역 또는 점집명, 선생님 이름 등을 검색해 보세요.</span>
            <img src="/images/search_btn.gif" alt="" />
            <input type="text" id="txtKeyword" onfocus="$('#helpText').hide(100);" onblur="if($('#txtKeyword').val() == '') $('#helpText').show(100);" value="<?=$searchWord?>" onKeyDown="goSearch()"/>
        </div>

        <nav class="sub_top_nav float_right" style="padding-top:5px;">
            <ul class="l_style_left">
<?if($_SESSION["SH_ID"] == ""){?>
                    <!--<li><input type="button" value="무료 점집 등록하기" onclick="location.href = '?com=shaman&lnd=join';" class="btn1_2" /></li>-->
<?}?>

<?if($_SESSION["SH_ID"] != ""){?>
                <li><input type="button" value="마이페이지" onclick="location.href = '?com=shMypage&lnd=modify';" class="btn1" /></li>
				<li><a href="?com=shaman&pro=logout">로그아웃</a></li>
                <li><a href="?com=shMypage&lnd=resList">예약 관리</a></li>
<?}else{?>
<?if($_SESSION["USER_ID"] == ""){?>
                <li><input type="button" value=" 로 그 인" onclick="location.href = '?com=user&lnd=login';" class="btn1" /></li>
                <li><a href="?com=user&lnd=join">회원가입</a></li>
<?}else{?>
                <li><input type="button" value="마이페이지" onclick="location.href = '?com=mypage&lnd=modify';" class="btn1" /></li>
				<li><a href="?com=user&pro=logout">로그아웃</a></li>
                <li><a href="?com=mypage&lnd=resList">예약확인</a></li>
<?}?>
<?}?>            </ul>
        </nav>
    </div>
    <!-- 상단 로고 ~ 검색 끝 -->

<?include $_SERVER["DOCUMENT_ROOT"]."/inc/newMenu.php"?>

<?if($lnd != "app"){?>
    <div class="sub_content_wrap">
<?}?>
