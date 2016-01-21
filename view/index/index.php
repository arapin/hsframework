<?
	$index = new Index();
	$rtnList = $index->mainLogcationList("","seq DESC");
	$rtnListMovie = $index->mainMovieListSeq("","seq DESC");

?>
		<div class="intro_wrap">
            <div class="intro_text">
                <h2>입점하기</h2>
                <p>
                    점집 등록 호스팅은 무궁무진한 기회의 세상을 열어드립니다.
                    이제는 앉아서도 상담 손님들을 만나시고 수입을 창출하세요.
                </p>
                <input type="button" onclick="location.href = '?com=shaman&lnd=join';" value="무료 점집 등록하기" class="btn7" />
            </div>
            <div id="intro_bg">
                <div id="intro_bg_overlap"></div>
                <div class="intro_bg_txt">
                    함께 할 수 있는 즐거움과<br />
                    무속이 나아가야 할 방향을 모색하며,<br />
                    함께 배워 나아가길 희망합니다.
                </div> 
            </div>
        </div>

        <div class="search_shop_wrap">
            <h2>지역별/분야별 점집찾기</h2>
            <p class="search_shop_txt1">
                본 조합에서 인정하는 믿을 수 있는 신점 보는 점집만을 엄선하여 소개합니다.
            </p>
            <p class="search_shop_txt2">
                친구야~ 어디 점 잘 보는데 없니? 이젠 내 주변 용한 점집을 찾아가자
            </p>
            <!-- <ul class="l_style_none search_shop_check">
                <li><img src="/images/chk_on.gif" alt="" /><a href="" class="check_on">최신</a></li>
                <li><img src="/images/chk_off.gif" alt="" /><a href="">인기</a></li>
                <li><img src="/images/chk_off.gif" alt="" /><a href="">별점</a></li>
            </ul> -->

            <div class="search_shop_photo">
                <ul class="l_style_inline">
<?=$rtnList?>
                    <!--<li>
                        <div class="shop_photo_overlay" style="background:url(/html/sample/img1.jpg) no-repeat"><a href="?com=shaman&lnd=map&searchSido=서울특별시">서울특별시<br /></a></div>
                    </li>
                    <li>
                        <div class="shop_photo_overlay" style="background:url(/html/sample/img2.jpg) no-repeat"><a href="?com=shaman&lnd=map&searchSido=경기도">경기도<br /></a></div>
                    </li>
                    <li>
                        <div class="shop_photo_overlay" style="background:url(/html/sample/img5.jpg) no-repeat"><a href="?com=shaman&lnd=map&searchSido=충청남도">충청남도<br /></a></div>
                    </li>
                    <li>
                        <div class="shop_photo_overlay" style="background:url(/html/sample/img4.jpg) no-repeat"><a href="?com=shaman&lnd=map&searchSido=충청북도">충청북도<br /></a></div>
                    </li>
                    <li>
                        <div class="shop_photo_overlay" style="background:url(/html/sample/img3.jpg) no-repeat"><a href="?com=shaman&lnd=map&searchSido=강원도">강원도<br /></a></div>
                    </li>
                    <li>
                        <div class="shop_photo_overlay" style="background:url(/html/sample/img7.jpg) no-repeat"><a href="?com=shaman&lnd=map&searchSido=경상남도">경상남도<br /></a></div>
                    </li>
                    <li>
                        <div class="shop_photo_overlay" style="background:url(/html/sample/img6.jpg) no-repeat"><a href="?com=shaman&lnd=map&searchSido=경상북도">경상북도<br /></a></div>
                    </li>
                    <li>
                        <div class="shop_photo_overlay" style="background:url(/html/sample/img9.jpg) no-repeat"><a href="?com=shaman&lnd=map&searchSido=전라남도">전라남도<br /></a></div>
                    </li>
                    <li>
                        <div class="shop_photo_overlay" style="background:url(/html/sample/img8.jpg) no-repeat"><a href="?com=shaman&lnd=map&searchSido=전라북도">전라북도<br /></a></div>
                    </li>
                    <li>
                        <div class="shop_photo_overlay" style="background:url(/html/sample/img10.jpg) no-repeat"><a href="?com=shaman&lnd=map&searchSido=제주도">제주도<br /></a></div>
                    </li>
                    <li>
                        <div class="shop_photo_overlay" style="background:url(/html/sample/img11.jpg) no-repeat"><a href="?com=shaman&lnd=map&searchSido=인천">인천<br /></a></div>
                    </li>
                    <li>
                        <div class="shop_photo_overlay" style="background:url(/html/sample/img12.jpg) no-repeat"><a href="?com=shaman&lnd=map&searchSido=대전">대전<br /></a></div>
                    </li>
                    <li>
                        <div class="shop_photo_overlay" style="background:url(/html/sample/img12.jpg) no-repeat"><a href="?com=shaman&lnd=map&searchSido=대구">대구<br /></a></div>
                    </li>
                    <li>
                        <div class="shop_photo_overlay" style="background:url(/html/sample/img12.jpg) no-repeat"><a href="?com=shaman&lnd=map&searchSido=대전">부산<br /></a></div>
                    </li>
                    <li>
                        <div class="shop_photo_overlay" style="background:url(/html/sample/img12.jpg) no-repeat"><a href="?com=shaman&lnd=map&searchSido=광주">광주<br /></a></div>
                    </li>-->
                </ul>
            </div>

            <a href=""><img src="/images/down_btn.gif" alt="" /></a>
        </div>

        <!--<div class="att_list_wrap">
            <h2>이달의 무당 / 추천 무당 / 인기 무당</h2>
            <div class="att_photo">
                <div class="float_left arr_photo_btn"><a href=""><img src="/images/left_btn2.gif" alt="" /></a></div>
                <div class="float_left att_photo_list">
                    <dl>
                        <dt>무당 지수아</dt>
                        <dd><img src="/html/sample/photo1.jpg" alt="" /></dd>
                    </dl>
                    <dl>
                        <dt>소원궁 윤정신녀</dt>
                        <dd><img src="/html/sample/photo2.jpg" alt="" /></dd>
                    </dl>
                    <dl>
                        <dt>임지영</dt>
                        <dd><img src="/html/sample/photo3.jpg" alt="" /></dd>
                    </dl>
                    <dl>
                        <dt>천상작두장군</dt>
                        <dd><img src="/html/sample/photo4.jpg" alt="" /></dd>
                    </dl>
                </div>
                <div class="float_left arr_photo_btn"><a href=""><img src="/images/right_btn2.gif" alt="" /></a></div>
            </div>
        </div>-->

        <div class="cafe_link_wrap">
            <p style="color:#333; font-size:30px; margin-bottom:0px;">
                우리의 점집 이야기
            </p>

            <!--<h2>산신각 협동조합 카페</h2>
            <a class="cafe_link" href="http://cafe.daum.net/alanguages/" target="_blank">http://cafe.daum.net/alanguages/</a>

            <div class="cafe_banner1">
                <div class="float_left">
                    <a href="http://www.sansingak.com"><img src="/images/banner_mall.jpg" alt="신점 쇼핑몰" /></a>
                </div>

                <div class="float_left" style="margin:0px 20px;">
                    <a href="/html/player.html" target="_blank"><img src="/html/sample/movie.jpg" alt="" /></a>
                </div>

                <div class="float_left">
                    <a href=""><img src="/images/banner_cafe.jpg" alt="산신각 협동조합 카페" /></a>
                </div>
            </div>-->

            <!--<div id="playerWrap" style="width:1000px; height:632px; margin-top:20px;">
                <div id="youtubePlayer" style="width:100%; height:100%;"></div>
                <input id="btnPlay" type="button" value="재생" style="width:1000px; height:632px; position:absolute;margin-top:-632px;opacity:0;filter:alpha(opacity=0); cursor:pointer;" onclick="jQuery('#youtubePlayer').tubeplayer('play')" />
                <input id="btnStop" type="button" value="멈춤" style="display:none;width:1000px; height:632px;position:absolute;opacity:0;filter:alpha(opacity=0); cursor:pointer;" onclick="jQuery('#youtubePlayer').tubeplayer('pause')" />
            </div>-->
            <div style="overflow:auto;">
                <!--<iframe width="320" height="210" src="https://www.youtube.com/embed/b8JWjt1cgJI" frameborder="0" style="margin-top:20px; float:left;" allowfullscreen></iframe><iframe width="320" height="210" src="https://www.youtube.com/embed/b8JWjt1cgJI" frameborder="0" style="margin: 20px 20px 0px 20px; float: left;" allowfullscreen></iframe><iframe width="320" height="210" src="https://www.youtube.com/embed/b8JWjt1cgJI" frameborder="0" style="margin-top: 20px; float: left;" allowfullscreen></iframe>-->

				<?=$rtnListMovie?>
            </div>

            <div class="cafe_banner1">
                <div class="float_left" style="margin-right:20px;">
                    <!--<a href="http://www.sansingak.com" target="_blank"><img src="/images/banner_mall.jpg" alt="신점 쇼핑몰" /></a>-->
                    <a href="?com=shopping&lnd=list"><img src="/images/banner_mall.jpg" alt="신점 쇼핑몰" /></a>
                </div>

                <div class="float_left">
                    <a href="http://cafe.daum.net/alanguages/" target="_blank"><img src="/images/banner_cafe.jpg" alt="산신각 협동조합 카페" /></a>
                </div>
            </div>

            <div class="cafe_banner2">
                <!-- <div class="float_left" style="width:770px;">
                    <div class="banner_list">
                        <a href=""><img src="/images/banner_intro.jpg" alt="협동조합 소개" /></a>
                        <a href=""><img src="/images/banner_schedule.jpg" alt="협동조합 일정" /></a>
                        <a href=""><img src="/images/banner_join.jpg" alt="협동조합 가입하기" /></a>
                        <a href=""><img src="/images/banner_shop.jpg" alt="협동조합 쇼핑몰" /></a>
                    </div>
                    <div>
                        <ul class="l_style_left banner_direct">
                            <li class="banner_direct1">
                                <a href=""><img src="/images/btn_direct.gif" alt="산신각 아카데미 소개 바로가기" /></a>
                            </li>
                            <li class="banner_direct2">
                                <a href=""><img src="/images/btn_direct.gif" alt="산신각 아카데미 일정 바로가기" /></a>
                            </li>
                            <li class="banner_direct3">
                                <a href=""><img src="/images/btn_direct.gif" alt="산신각 아카데미 학생모집 바로가기" /></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="float_right" style="width:230px; text-align:right; line-height:39px;">
                    <a href=""><img src="/images/banner_1.jpg" alt="운세상담 / 선생님 대모집" /></a><br />
                    <a href=""><img src="/images/banner_2.jpg" alt="구인구직" /></a><br />
                    <a href=""><img src="/images/banner_3.jpg" alt="재미로보는 운세" /></a>
                </div> -->
            </div>
        </div>