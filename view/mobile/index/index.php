<?
	$index = new Index();
	$rtnList = $index->mainLogcationListM("","seq DESC");
	$rtnListMovie = $index->mainMovieListSeqM("","seq DESC");

?>
<script>
	function searchGo(){
		var form = document.searchForm;

		if(form.searchWord.value == ""){
			alert('검색어를 입력하여 주세요');
			return false;
		}

		form.submit();
	}

	function goLocation(sido){
		var form = document.searchForm;
		form.searchWord.value = sido;
		form.submit();
	}
</script>
		<div id="top_intro">
            <div id="intro_overlap"></div>
            <div class="intro_txt_wrap">
                <p>친구야 점보러 갈래?</p>
                <p style="font-size:39px;margin:8px 0px 20px 0px;">
					<img src="/images/mobile/jeum.png" alt="占" style="width:50px; height:40px" />
				</p>

                <div class="intro_input">
<form name="searchForm" method="post" action="?com=shaman&lnd=search" >
                    <p style="text-shadow:none;" id="helpText" onclick="$('#txtKeyword').focus();">지역,점집명,선생님을 검색</p><!--등을 검색해 보세요-->
                    <input type="text" id="txtKeyword" onfocus="$('#helpText').hide(100);" onblur="if($('#txtKeyword').val() == '') $('#helpText').show(100);" name="searchWord" /><button type="button" onclick="searchGo();"><img src="/images/mobile/glass.png" width="17" height="19" /></button>
</form>
                </div>
            </div>
        </div>
<?if($_COOKIE["APP"] != "Y"){?>
        <div style="margin:20px 0px 40px;">
            <!--<video id="my-video" class="video-js" controls preload="auto" width="100%" height="320" data-setup="{}" poster="/images/mobile/video_pv.jpg" onclick="$('#videoOverlay').fadeOut(500)">
                <source src="https://a0.muscache.com/airbnb/brand/asia-cci/korea.mp4" type='video/mp4'>

                <p class="vjs-no-js">
                    To view this video please enable JavaScript, and consider upgrading to a web browser that
                    <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                </p>
            </video>-->
			<?=$rtnListMovie?>
            <!--<iframe src="https://www.youtube.com/embed/b8JWjt1cgJI" frameborder="0" style="width:100%; height:320px;"></iframe>-->

            <!--<div id="videoOverlay" style="position:absolute; margin-top:-220px; font-size:22px; color:#fff; text-align:center; width:100%;">
                기회의 세상을 열어드립니다.
            </div>-->
        </div>
<?}?>
        <div id="sub_intro">
            <div id="sub_overlap"></div>

            <div class="intro_txt_wrap">
                <p class="intro_txt1">점집 등록 호스팅은 무궁무진한</p>
                <p class="intro_txt1" style="margin-bottom:25px;">기회의 세상을 열어드립니다.</p>

                <p class="intro_txt2">이제는 앉아서도 상담 손님들을</p>
                <p class="intro_txt2">만나시고 수입을 창출하세요.</p>

                <input type="button" onclick="location.href = '?com=shaman&lnd=join';" value="무료 점집 등록하기" class="m_btn1" />
            </div>
        </div>

        <div>
            <p class="intro_txt3">용한 점집 찾아보기</p>
            <p class="intro_txt4">우리 주변과 개인적 마음에 맞는</p>
            <p class="intro_txt4">용한 점집을 찾아보세요</p>
        </div>

        <dl class="shop_list">
			<?=$rtnList?>
            <!--<dt style="background:url(/images/mobile/m_img1.jpg) no-repeat; background-size:cover;">
                강원도
            </dt>-->
            <!--<dd style="background:url(/images/mobile/m_img2.jpg) no-repeat; background-size:cover;">
                <span class="shop_price">
                    <span>￦</span>20,000
                </span>
                <button style="background:url(/images/mobile/m_pic1.jpg) no-repeat; background-size:cover;" type="button" class="shop_photo"></button>
                <div class="intro_txt_wrap" style="margin:15px 0px 0px 0px;">
                    <p class="intro_txt1" style="margin-bottom:10px;">강릉 천궁암</p>
                    <p class="intro_txt2">천궁암</p>
                </div>
            </dd>

            <dt style="background:url(/images/mobile/m_img3.jpg) no-repeat; background-size:cover;">
                경기도
            </dt>
            <dd style="background:url(/images/mobile/m_img4.jpg) no-repeat; background-size:cover;">
                <span class="shop_price">
                    <span>￦</span>30,000
                </span>
                <button style="background:url(/images/mobile/m_pic2.jpg) no-repeat; background-size:cover;" type="button" class="shop_photo"></button>
                <div class="intro_txt_wrap" style="margin:15px 0px 0px 0px;">
                    <p class="intro_txt1" style="margin-bottom:10px;">대구 천궁암</p>
                    <p class="intro_txt2">천궁암</p>
                </div>
            </dd>-->

        </dl>

        <div class="table" style="margin-bottom:15px;">
            <div class="t_cell_l" style="padding-right:10px;">
                <a href="http://www.sansingak.com"><img style="width:100%;" src="/images/mobile/banner_mall.jpg" alt="신점 쇼핑몰" /></a>
            </div>

            <div class="t_cell_r" style="padding-left:10px;">
                <a href="http://cafe.daum.net/alanguages"><img style="width:100%;" src="/images/mobile/banner_cafe.jpg" alt="산신각 협동조합 카페" /></a>
            </div>
        </div>