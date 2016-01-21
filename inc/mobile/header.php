<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    
    <title>산신각</title>

    <link rel="stylesheet" type="text/css" href="/html/mobile/css/layout.css" />
    <link rel="stylesheet" type="text/css" href="/html/mobile/css/main.css" />
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="/js/jquery-1.11.3.min.js"></script>
    <script src="/js/jquery-ui.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js"></script>
	<script src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/markerwithlabel/src/markerwithlabel.js"></script>
	<script type="text/javascript" src="/js/common.js"></script>
	<script type="text/javascript" src="/js/page.js"></script>
    <script src="/js/<?=$com?>.js"></script>
    <script src="/html/mobile/css/common.js"></script>

    <script>
<?if($searchWord != ""){?>
	$(function(){
		$('#searchGuide').hide();
	});
<?}?>

		function goSearch(){
			 if(event.keyCode == 13)
			 {
				var form = document.searchForm;
				form.searchWord.value = $('#searchKeyword').val();
				form.submit();

			 }
		}

		function goSearchBtn(){
			var form = document.searchForm;
			form.searchWord.value = $('#searchKeyword').val();
			form.submit();
		}

<?if($com == "shaman" && $lnd == "shamanHome"){?>

        var introTitleTop = 0;
        var reviewTitleTop = 0;
        var skTitleTop = 0;
        var mapTitleTop = 0;

        $(function()
        {
            setMoreVisible();

            // 회전 이벤트 등록
            $(window).on("orientationchange", function ()
            {
                setMoreVisible()
            });


            // 예약버튼 위치 설정
            $("#bookButton").css("top", document.body.clientHeight - 70);


            // 타이틀 레이어
            introTitleTop = $("#introTitle").offset().top - 40;
            reviewTitleTop = $("#reviewTitle").offset().top - 40;
            skTitleTop = $("#skTitle").offset().top - 40;
            mapTitleTop = $("#mapTitle").offset().top - 40;
            
            $("#introTitle, #reviewTitle, #skTitle, #mapTitle").hide();
            $("#introTitle, #reviewTitle, #skTitle, #mapTitle").css("top", 0);

            $(window).bind("scroll", function ()
            {
                var scrollTop = window.scrollY ? window.scrollY : (document.compatMode == "CSS1Compat" ? document.documentElement.scrollTop : document.body.scrollTop);

                // 상세설명
                if(scrollTop >= introTitleTop) $("#introTitle").show();
                else $("#introTitle").hide();
                
                // 후기
                if (scrollTop >= reviewTitleTop) $("#reviewTitle").show();
                else $("#reviewTitle").hide();

                // 선생님
                if (scrollTop >= skTitleTop) $("#skTitle").show();
                else $("#skTitle").hide();

                // 지도
                if (scrollTop >= mapTitleTop) $("#mapTitle").show();
                else $("#mapTitle").hide();
            });
        })

        // 글자수가 특정 높이 이상 넘어갔을 경우에만 더보기 버튼 활성화
        function setMoreVisible()
        {
            if ($("#moreText1").height() < 250) $("#moreTextLayer1, #moreTextLink1").hide();
            else
            {
                $("#moreText1").css("max-height", 250);
                $("#moreTextLayer1, #moreTextLink1").show();
            }

            if ($("#moreText2").height() < 200) $("#moreTextLayer2, #moreTextLink2").hide();
            else
            {
                $("#moreText2").css("max-height", 200);
                $("#moreTextLayer2, #moreTextLink2").show();
            }

            // 댓글
            for (var i = 0; ; i++) {
                var obj = $("#moreTextCmt" + i);

                if (obj.length <= 0) break;

                if (obj.height() < 100) $("#moreTextLayerCmt" + i + ", #moreTextLinkCmt" + i).hide();
                else
                {
                    obj.css("max-height", 100);
                    $("#moreTextLayerCmt" + i + ", #moreTextLinkCmt" + i).show();
                }
            }
        }

        // 더보기
        function expand(index)
        {
            $("#moreTextLayer" + index).hide();
            $("#moreTextLink" + index).hide();

            $("#moreText" + index).css("max-height", "100%");
        }
<?}?>

<?if($com == "shaman" && $lnd == "search"){?>
        $(function()
        {
            // 검색버튼 위치 설정
            //$("#searchButton").css("top", document.body.clientHeight - 800);

        });
<?}?>


<?if($com == "board"){?>

        function toggleView(obj)
        {
            if ($(obj).attr("alt") == "확대")
            {
                $(obj).attr("src", "/images/mobile/collapse.gif");
                $(obj).attr("alt", "축소");
                $(obj).parent().next().show(100);
            }
            else
            {http://m.jeomhouse.com/?com=shaman&lnd=shamanHome&SHId=Mother
                $(obj).attr("src", "/images/mobile/expand.gif");
                $(obj).attr("alt", "확대");
                $(obj).parent().next().hide(100);
            }
        }

<?}?>
    </script>
</head>
<body>
<form name="searchForm" method="post" action="?com=shaman&lnd=search" >
	<input type="hidden" name="searchWord" value=""/>
</form>
    <div id="bodyWrap" class="body_sub">
        <div class="header header_sub">
            <input type="image" onclick="showSideMenu()" src="/images/mobile/menu_btn.jpg" width="18" height="17" alt="메뉴" class="header_btn" />
            <div class="search_wrap">
                <div>
                    <span id="searchGuide" onclick="$('#searchKeyword').focus();">어느지역 찾으세요?</span>
                    <div><input type="text" id="searchKeyword" onfocus="$('#searchGuide').hide();" value="<?=$searchWord?>" onKeyDown="goSearch()"/></div>
                    <div><input type="image" src="/images/mobile/glass2.png" alt="" onclick="goSearchBtn()"/></div>
                </div>
            </div>
        </div>