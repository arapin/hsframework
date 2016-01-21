<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width">
    <title>산신각 - 점집 소개</title>
    <script src="/js/jquery-1.11.3.min.js"></script>
    <script src="/js/jquery-ui.min.js"></script>
    <script src="/css/common.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js"></script>
	<script src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/markerwithlabel/src/markerwithlabel.js"></script>
	<script type="text/javascript" src="/js/common.js"></script>
	<script type="text/javascript" src="/js/page.js"></script>
	<script type="text/javascript" src="/js/<?=$com?>.js"></script>
    <link rel="stylesheet" href="/css/layout.css" />
    <link rel="stylesheet" href="/css/search.css" />
    <link rel="stylesheet" href="/css/calendar.css" />
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<link type="text/css" href="/css/bottom.css" rel="stylesheet" />
	<link href="/css/fotorama.css" rel="stylesheet">
	<script src="/js/fotorama.js"></script>
    <script>
        $(function ()
        {
            var _oldLinkObj = null;

            $("#scrollMenu a").click(function()
            {
                if (_oldLinkObj != null) _oldLinkObj.attr("class", "");

                _oldLinkObj = $(this).parent();

                $(this).parent().attr("class", "sv_menu_sel");

                setTimeout(function ()
                {
                    document.body.scrollLeft = 0;
                    document.documentElement.scrollLeft = 0;

                    if (document.compatMode == "CSS1Compat") document.documentElement.scrollTop -= 40;
                    else document.body.scrollTop -= 40;
                }, 1);
            });

            $(window).scroll(function ()
            {
                var scrollTop = document.compatMode == "CSS1Compat" ? document.documentElement.scrollTop : document.body.scrollTop;

                if (scrollTop > 740)
                {
                    $('#scrollMenu').show(100);
                    $('#scrollMenu').css("top", 0);
                    $('.sv_book_form').css("top", 0);
                    $('.sv_book_form').css("position", "fixed");
                    $('.sv_book_form').css("margin-top", "0");
                }
                else
                {
                    $('#scrollMenu').hide(100);
                    $('.sv_book_form').css("position", "relative");

                    $('.sv_book_form').css("margin-top", "-40px");
                }
            });

		});

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
            <span class="search_help_txt" id="helpText" onclick="$('#txtKeyword').focus();">지역 또는 점집명, 선생님 이름 등을 검색해 보세요.</span>
            <img src="/images/search_btn.gif" alt="" />
            <input type="text" id="txtKeyword" onfocus="$('#helpText').hide(100);" onblur="if($('#txtKeyword').val() == '') $('#helpText').show(100);" onKeyDown="goSearch()"/>
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

    <div id="scrollMenu" class="sview_content_wrap sv_scroll_menu">
        <ul class="l_style_inline">
            <li><a href="#map1">사진</a></li>
            <li><a href="#map2">상세 설명</a></li>
            <li><a href="#map3">후기</a></li>
            <li><a href="#map4">알림장</a></li>
            <li><a href="#map5">위치</a></li>
            <li><a href="#map6">비슷한 점집</a></li>
        </ul>
    </div>
