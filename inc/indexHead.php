<!DOCTYPE html>
<html>
<head>
    <meta charset=utf-8"/>
    <title>산신각::대한민국 무속인과 무속을 종하는 모든이의 점</title>
    <script src="/js/jquery-1.11.3.min.js"></script>
    <script src="/js/jquery-ui.min.js"></script>
    <script src="/css/common.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js"></script>
	<script src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/markerwithlabel/src/markerwithlabel.js"></script>
	<script type="text/javascript" src="/js/common.js"></script>
	<script type="text/javascript" src="/js/page.js"></script>
	<script type="text/javascript" src="/js/<?=$com?>.js"></script>
    <link rel="stylesheet" href="/css/layout.css" />
    <link rel="stylesheet" href="/css/main.css" />
    <link rel="stylesheet" href="/css/calendar.css" />
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="/css/jquery.tubeplayer.min.js"></script>

    <script>
        var topBgIndex = 1;
        var introIndex = 1;

        function videoPlayStyle()
        {
            $("#btnPlay").hide();

            $("#playerWrap").css("width", "100%");
            $("#playerWrap").css("height", "100%");
            $("#playerWrap").css("position", "absolute");
            $("#playerWrap").css("left", "0px");
            $("#playerWrap").css("top", "0px");
            $("#playerWrap").css("margin-top", "0px");

            $("#btnStop").css("position", "absolute");
            $("#btnStop").css("width", "100%");
            $("#btnStop").css("height", "100%");
            $("#btnStop").css("left", "0px");
            $("#btnStop").css("top", "0px");
            $("#btnStop").show();
        }

        function videoPauseStyle()
        {
            $("#btnPlay").show();
            $("#btnStop").hide();

            $("#playerWrap").css("width", "1000px");
            $("#playerWrap").css("height", "632px");
            $("#playerWrap").css("position", "relative");
            $("#playerWrap").css("margin-top", "20px");
        }

		function getMainImg(seq){
			var rtnData = "";
			$.ajax({
				url : '?com=main&pro=maininfo',
				data : {'mode':'mainBig', 'seq' : seq},
				type : 'post',
				async:false,
				success : function (data){
					rtnData = data;
				},
				error : function(){
					alert('통신 에러 입니다.');
				}
			});

			return rtnData;
		}

		function getMainSubImg(seq){
			var rtnData = "";
			$.ajax({
				url : '?com=main&pro=maininfo',
				data : {'mode':'mainMiddle', 'seq' : seq},
				type : 'post',
				async:false,
				success : function (data){
					rtnData = data;
				},
				error : function(){
					alert('통신 에러 입니다.');
				}
			});

			return rtnData;
		}

        // 메인 인트로(아래는 샘플이므로 요구사항에 맞춰서 수정해주세요)
        $(
            function()
            {

                videoPlayStyle();
                videoPauseStyle();

                jQuery("#youtubePlayer").tubeplayer({
                    width: "100%", // the width of the player
                    height: "100%", // the height of the player
                    allowFullScreen: "true", // true by default, allow user to go full screen
                    initialVideo: "b8JWjt1cgJI", // the video that is loaded into the player
                    preferredQuality: "default",// preferred quality: default, small, medium, large, hd720
                    onPlay: function (id)
                    {
                        videoPlayStyle();
                        $("#btnStop").focus();
                    }, // after the play method is called
                    onPause: function ()
                    {
                        videoPauseStyle();
                        $("#btnPlay").focus();
                    }, // after the pause method is called
                    onStop: function ()
                    {
                        videoPauseStyle();
                        $("#btnPlay").focus();
                    }, // after the player is stopped
                    onSeek: function (time) { }, // after the video has been seeked to a defined point
                    onMute: function () { }, // after the player is muted
                    onUnMute: function () { } // after the player is unmuted
                });

                $(window).bind("scroll", function ()
                {
                    var scrollTop = window.scrollY ? window.scrollY : (document.compatMode == "CSS1Compat" ? document.documentElement.scrollTop : document.body.scrollTop);

                    if (scrollTop >= 590 && $("#guideWrap").css("display") == "block")
                    {
                        window.scrollTop();
                        $("#guideWrap").hide();
                        window.scrollTop();
                    }

                    if (scrollTop >= 100 && $("#btnStop").css("display").indexOf("block") >= 0)
                    {
                        $('#youtubePlayer').tubeplayer('pause');
                    }
                });

				var fristBgImg = getMainImg(1);

				$("#top_big").css({"background":"url("+fristBgImg+")", 'background-repeat' : 'no-repeat', 'background-position':'center center', "background-size":"cover"});
				$("#top_big").css("filter", "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" + fristBgImg + "', sizingMethod='scale')");

                // 상단 배경 이미지 변경
                setInterval(
                    function ()
                    {
                        topBgIndex++;

                        if (topBgIndex > 5) topBgIndex = 1;
						
						var imgUrl = getMainImg(topBgIndex);
						var bgImage = "url("+imgUrl+") center no-repeat";
						var bgImageFilter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" + imgUrl + "', sizingMethod='scale')";

						$("#top_intro_overlap").css("background", bgImage);
                        $("#top_intro_overlap").css("filter", bgImageFilter);
                        $("#top_intro_overlap").css("background-size", "cover");

						$("#top_intro_overlap").fadeIn("slow", function(){
							$("#top_big").css({"background":bgImage, 'background-repeat' : 'no-repeat', 'background-position':'center center', "background-size":"cover"});
                            $("#top_big").css("filter", bgImageFilter);

                            $("#top_intro_overlap").fadeOut();
						});
                    }
                , 5000); // 5초마다 변경


                // 입점안내 이미지 변경
                setInterval(
                    function ()
                    {
                        introIndex++;

                        if (introIndex > 4) introIndex = 1;
						var imgSubUrl = getMainSubImg(introIndex);
                        var bgImage = "url("+imgSubUrl+") no-repeat;";
                        //var bgImage = "url(/images/intro" + introIndex + ".jpg) no-repeat;";

                        $("#intro_bg_overlap").css("background", bgImage);
                        $("#intro_bg_overlap").css("background-size", "cover");

                        $("#intro_bg_overlap").fadeIn("slow", function ()
                        {
                            //$("#intro_bg").css("background", bgImage);
                            //$("#intro_bg").css("background-size", "cover");
							$("#intro_bg").css({"background":bgImage, 'background-repeat' : 'no-repeat', 'background-position':'center center', "background-size":"cover"});

                            $("#intro_bg_overlap").fadeOut(700);
                        });
                    }
                , 5000); // 5초마다 변경

				$( "#txtKeyword2" ).datepicker({
					changeMonth: true,
					changeYear: true,
					dateFormat: 'yy-mm-dd',
					prevText: '이전 달',
					nextText: '다음 달',
					monthNames: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
					monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
					dayNames: ['일','월','화','수','목','금','토'],
					dayNamesShort: ['일','월','화','수','목','금','토'],
					dayNamesMin: ['일','월','화','수','목','금','토'],
					showMonthAfterYear: true,
					yearSuffix: '년',
					beforeShow: function() {
						setTimeout(function(){
							$('.ui-datepicker').css('z-index', 99999999999999);
						}, 0);
					},
					onSelect  : function(dateText){
						location.href='?com=shaman&lnd=map&searchDate='+dateText;
						$( "#txtKeyword2" ).val('예약일');
						return false;
					}
				});
            }
        )

		function goSearch(){
			location.href='?com=shaman&lnd=map&searchSido='+$('select[name=depthOneArea] > option:selected').val();
		}

		function goSearch2(){
			var form = document.searchForm;
			form.searchWord.value = $('#txtKeyword').val();
			form.submit();
		}

		function goLocation(sido){
			var form = document.searchForm;
			form.searchWord.value = sido;
			form.submit();
		}

		function goSearch3(){
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
    <!-- 이용방법 레이어 시작 -->
    <div id="guideWrap">
        <div style="text-align:right;padding:20px 20px 55px 0px;">
            <input type="image" src="/images/btn_close.gif" onclick="$('#guideWrap').hide(100)" alt="닫기" />
        </div>
        <ul class="l_style_inline">
            <li>
                <dl>
                    <dt onclick="location.href='?com=board&lnd=noticeList2&code=search'"><img src="/images/guide_img1.png" alt="" /></dt>
                    <dt>
                        용한 점집 찾아보기
                    </dt>
                    <dd onclick="location.href='?com=board&lnd=noticeList2&code=search'">
                        우리 주변과 개인적 마음에 맞는<br />
                        용한 점집을 찾아보세요
                    </dd>
                </dl>
            </li>

            <li>
                <dl>
                    <dt style="width:400px;" onclick="location.href='?com=board&lnd=noticeList2&code=booking'"><img src="/images/guide_img2.png" alt="" /></dt>
                    <dt style="width:400px;">
                        예약하기
                    </dt>
                    <dd style="width:400px;" onclick="location.href='?com=board&lnd=noticeList2&code=booking'">
                        <p>
                            '점'의 믿을만한 시스템을 통해서 상담사와 연락하고<br />
                            답답한 마음을 상담받을 일정을 확인하세요.
                        </p>
                        결제도 물론 가능합니다.
                    </dd>
                </dl>
            </li>

            <li>
                <dl>
                    <dt onclick="location.href='?com=board&lnd=noticeList2&code=con'"><img src="/images/guide_img3.png" alt="" /></dt>
                    <dt onclick="location.href='?com=board&lnd=noticeList2&code=con'">
                        상담
                    </dt>
                    <dd>
                        나의 맞춤 상담사와 방문, 전화의<br />
                        상담 방법을 알아보세요.
                    </dd>
                </dl>
            </li>
        </ul>
    </div>
    <!-- 이용방법 레이어 끝 -->

    <!-- 상단 로고 ~ 검색 시작 -->
    <div class="sub_top_wrap top_wrap" id="top_big">

        <div id="top_intro_overlap">

        </div>
        <div style="position:absolute;width:100%;min-width:640px;">
            <h1 class="sub_h1"><a href="/" title="첫 페이지로 이동합니다."><img src="/images/logo.png" alt="산신각" /></a></h1>

            <nav class="sub_top_nav">
                <ul class="l_style_left">
<?if($_SESSION["SH_ID"] == ""){?>
                    <!--<li><input type="button" value="무료 점집 등록하기" onclick="location.href = '?com=shaman&lnd=join';" class="btn1_2" /></li>-->
<?}?>

<?if($_SESSION["SH_ID"] != ""){?>
				<li><input type="button" value=" 마이페이지 " onclick="location.href = '?com=shMypage&lnd=modify';" class="btn1_2" /></li>
				<li><a href="?com=shaman&pro=logout">로그아웃</a></li>
                <!-- <li><a href="?com=shMypage&lnd=resList">예약 관리</a></li> -->
<?}else{?>
<?if($_SESSION["USER_ID"] == ""){?>
                <li><input type="button" value=" 로 그 인 " onclick="location.href = '?com=user&lnd=login';" class="btn1_2" /></li>
                <li><a href="?com=user&lnd=join">회원가입</a></li>
<?}else{?>
				<li><input type="button" value=" 마이페이지 " onclick="location.href = '?com=mypage&lnd=modify';" class="btn1_2" /></li>
				<li><a href="?com=user&pro=logout">로그아웃</a></li>
                <!-- <li><a href="?com=mypage&lnd=resList">예약확인</a></li> -->
<?}?>
<?}?>
                </ul>
            </nav>

            <div class="top_intro_text">
                <p class="intro_txt1">
                    친구야 점보러 갈래?
                </p>
                <p class="intro_txt2"><img src="/images/jeum.png" alt="" width="80px"/></p>
                <a class="intro_txt3" href="#none">전국의 우리 주변 용한 점집을 예약해 보세요</a>

                <p>
                    <input type="button" value="占(점) 이용 방법" onclick="$('#guideWrap').show(100, function () { window.scrollTop(); })" class="btn1_3" />
                </p>
            </div>

            <div class="top_search_overlap">

            </div>

            <div class="top_search_wrap">
                <ul class="l_style_none top_txt_list">
                    <!-- <li><a href="">무당 지수아</a></li>
                    <li><a href="">윤정신녀</a></li>
                    <li><a href="">천상작두장군</a></li>
                    <li><a href="">신점굿당</a></li>
                    <li><a href="">신년운세</a></li> -->
                </ul>

                <div class="st_sch_input">
			<?if($searchWord == ""){?>
                    <span class="search_help_txt" id="helpText" onclick="$('#txtKeyword').focus();">지역 또는 점집명, 선생님 이름 등을 검색해 보세요.</span>
			<?}?>
                    <input type="text" class="float_left" id="txtKeyword" onfocus="$('#helpText').hide(100);" onblur="if($('#txtKeyword').val() == '') $('#helpText').show(100);" onkeyup="goSearch3();"/>

                    <button class="float_right st_sch_btn" onclick="goSearch2()"><div>점집 검색</div></button>

                    <div class="float_right st_sch_option" id="bookingDate"><input type="text" id="txtKeyword2" style='display:table-cell; vertical-align:middle;' value="예약일"/></div>
                    <div class="float_right st_sch_option">
                    <select name="depthOneArea" onchange="goSearch();">
						<option value="">지역 선택</option>
						<option value="서울특별시">서울특별시</option>
						<option value="경기도">경기도</option>
						<option value="강원도">강원도</option>
						<option value="경상북도">경상북도</option>
						<option value="경상남도">경상남도</option>
						<option value="충청북도">충청북도</option>
						<option value="충청남도">충청남도</option>
						<option value="전라북도">전라북도</option>
						<option value="전라남도">전라남도</option>
						<option value="제주도">제주도</option>
                    </select>
                    </div>
                </div>
                <!--<div id="calendar" style="position:absolute; display:none; z-index:999;left:50%; margin-left:172px;">
                    <div class="cld_wrap" style=" height:340px;">
                        <div style="position:absolute;width:280px;">
                            <input type="image" class="cld_btn float_left" src="/images/cld_prev.gif" alt="이전달" />
                            <input type="image" class="cld_btn float_right" src="/images/cld_next.gif" alt="다음달" />
                        </div>

                        <table class="cld_skin">
                            <caption>2015년 10월(OCT)</caption>
                            <thead>
                                <tr>
                                    <th scope="col">일</th>
                                    <th scope="col">월</th>
                                    <th scope="col">화</th>
                                    <th scope="col">수</th>
                                    <th scope="col">목</th>
                                    <th scope="col">금</th>
                                    <th scope="col">토</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a href=""></a></td>
                                    <td><a href=""></a></td>
                                    <td><a href=""></a></td>
                                    <td><a href=""></a></td>
                                    <td class="cld_nday cld_yday"><a href="">1</a></td>
                                    <td class="cld_nday cld_yday"><a href="">2</a></td>
                                    <td class="cld_nday cld_yday"><a href="">3</a></td>
                                </tr>
                                <tr>
                                    <td class="cld_nday cld_yday"><a href="">4</a></td>
                                    <td class="cld_nday cld_yday"><a href="">5</a></td>
                                    <td class="cld_nday cld_yday"><a href="">6</a></td>
                                    <td class="cld_nday cld_yday"><a href="">7</a></td>
                                    <td class="cld_nday cld_yday"><a href="">8</a></td>
                                    <td class="cld_nday cld_yday"><a href="">9</a></td>
                                    <td class="cld_nday cld_yday"><a href="">10</a></td>
                                </tr>
                                <tr>
                                    <td class="cld_nday cld_yday"><a href="">11</a></td>
                                    <td class="cld_nday cld_yday"><a href="">12</a></td>
                                    <td class="cld_nday cld_yday"><a href="">13</a></td>
                                    <td class="cld_nday cld_yday"><a href="">14</a></td>
                                    <td class="cld_nday cld_yday"><a href="">15</a></td>
                                    <td class="cld_nday cld_yday"><a href="">16</a></td>
                                    <td class="cld_nday cld_yday"><a href="">17</a></td>
                                </tr>
                                <tr>
                                    <td class="cld_nday cld_yday"><a href="">18</a></td>
                                    <td class="cld_nday cld_yday"><a href="">19</a></td>
                                    <td class="cld_nday"><a href="">20</a></td>
                                    <td class="cld_bday"><a href="">21</a></td>
                                    <td class="cld_normal"><a href="">22</a></td>
                                    <td class="cld_nday"><a href="">23</a></td>
                                    <td class="cld_nday"><a href="">24</a></td>
                                </tr>
                                <tr>
                                    <td class="cld_normal"><a href="">25</a></td>
                                    <td class="cld_normal"><a href="">26</a></td>
                                    <td class="cld_normal"><a href="">27</a></td>
                                    <td class="cld_normal"><a href="">28</a></td>
                                    <td class="cld_normal"><a href="">29</a></td>
                                    <td class="cld_normal"><a href="">30</a></td>
                                    <td class="cld_normal"><a href="">31</a></td>
                                </tr>
                            </tbody>
                        </table>

                        <div style="color:#777; font-size:12px;">
                            <input type="button" class="cld_btn1 float_left" value="날짜 선택 지우기" />
                        </div>
                    </div>
                </div>-->
            </div>
        </div>
    </div>
    <!-- 상단 로고 ~ 검색 끝 -->


    <div class="content_wrap">
