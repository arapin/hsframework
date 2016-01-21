<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>산신각 - 예약 확인 < 마이페이지</title>
    <script src="/js/jquery-1.11.3.min.js"></script>
    <script src="/js/jquery-ui.min.js"></script>
    <script src="/js/json2.js"></script>
    <script src="/css/common.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js"></script>
	<script src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/markerwithlabel/src/markerwithlabel.js"></script>
	<script type="text/javascript" src="/js/common.js"></script>
	<script type="text/javascript" src="/js/page.js"></script>
	<script type="text/javascript" src="/js/<?=$com?>.js"></script>
    <link rel="stylesheet" href="/css/layout.css" />
    <link rel="stylesheet" href="/css/search.css" />
<?if($com=="mypage" && $lnd == "modify"){?>
    <link rel="stylesheet" href="/css/member.css" />
<?}else{?>
    <link rel="stylesheet" href="/css/mypage.css" />
	<link rel="stylesheet" href="/css/board.css" />
<?}?>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script>
		function goSearch(){
			 if(event.keyCode == 13)
			 {
				var form = document.searchForm;
				form.searchWord.value = $('#txtKeyword').val();
				form.submit();

			 }
		}
    </script>
</head>
<body>
	<form name="searchForm" id="searchForm" method="post" action="?com=shaman&lnd=map">
		<input type="hidden" name="searchWord" value="" />
	</form>

    <!-- 상단 로고 ~ 검색 시작 -->
    <div class="search_top_wrap" style="position:relative;">

        <h1><a href="/?com=index" title="첫 페이지로 이동합니다."><img src="/images/logo.jpg" alt="산신각" /></a></h1>

        <div class="top_input_wrap">
			<?if($searchWord == ""){?>
            <span class="search_help_txt" id="helpText" onclick="$('#txtKeyword').focus();">지역 또는 점집명, 선생님 이름 등을 검색해 보세요.</span>
			<?}?>
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
    </div>
    <!-- 상단 로고 ~ 검색 끝 -->

    <div id="scrollMenu" class="sview_content_wrap sv_scroll_menu" style="display:block; position:relative;">
        <ul class="l_style_inline">
            <li <?if($lnd == "modify"){?>class="sv_menu_sel"<?}?>><a href="?com=shMypage&lnd=modify">입점관리</a></li>
            <li <?if($lnd == "resList"){?>class="sv_menu_sel"<?}?>><a href="?com=shMypage&lnd=resList">예약관리</a></li>
            <li <?if($lnd == "qList" || $lnd == "qView" || $lnd == "aList" || $lnd == "aView" || $lnd == "bList"){?>class="sv_menu_sel"<?}?>><a href="?com=shMypage&lnd=qList">내가 작성한 글</a></li>
			<?if($_SESSION["SH_ID"] == "SHstormfiled"){?>
            <li <?if($lnd == "resList"){?>class="sv_menu_sel"<?}?>><a href="?com=shMypage&lnd=calList">정산관리</a></li>
			<?}else{?>
            <li><a href="#none">정산관리</a></li>
			<?}?>
        </ul>
    </div>

<div class="sub_content_wrap">