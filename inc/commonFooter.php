    <!-- 퀵 메뉴 -->
    <div class="quick_menu">
        <a href="?com=index" title="첫 페이지로 이동합니다."><img src="/images/quick_home.gif" alt="Home" /></a><a href="javascript:scrollTop()" title="최상단으로 스크롤 이동"><img src="/images/quick_top.gif" alt="Top" /></a>
    </div>

	<div class="bottom_menu_wrap">

        <!-- Global 추가부분 시작 -->
        <div class="global_sel_wrap">
            <select>
                <option value="kr" selected="">한국어</option>
                <option value="ja" >日本語 (準備中)</option>
            </select>

            <select>
                <option>KRW</option>
                <option>JPY</option>
            </select>

            <p>국내 : 010 8554 3670 (수신자 부담)</p>
            <p>해외 : 준비중</p>
        </div>
        <!-- Global 추가부분 끝 -->


        <ul class="l_style_left bottom_menu_list">
            <li>
                <nav>
                    <ul class="l_style_none bottom_menu_nav">
                        <li><a href="?com=shaman&lnd=map">유명점집</a></li>
                        <!-- <li><a href="?com=aqBoard&lnd=list">신점문의</a></li> -->
                        <li><a href="?com=board&lnd=list&code=community">커뮤니티</a></li>
                        <li><a href="?com=shaman&lnd=map">예약하기</a></li>
<?if($_SESSION["USER_ID"] != ""){?>
                        <li><a href="?com=mypage&lnd=resList">나의 서비스</a></li>
<?}?>
<?if($_SESSION["SH_ID"] != ""){?>
                        <li><a href="?com=shMypage&lnd=resList">나의 서비스</a></li>
<?}?>
<?if($_SESSION["SH_ID"] == "" && $_SESSION["USER_ID"] == ""){?>
                        <li><a href="#none">나의 서비스</a></li>
<?}?>
                        <li><a href="?com=board&lnd=noticeList2&code=search">이용안내</a></li>
                        <li><a href="?com=board&lnd=noticeList&code=notice">공지사항</a></li>
                    </ul>
                </nav>
            </li>
            <li>
                <nav>
                    <ul class="l_style_none bottom_menu_nav">
                        <li><a href="?com=blank&lnd=company">회사소개</a></li>
                        <li><a href="?com=blank&lnd=about">신점이란?</a></li>
                        <li><a href="?com=blank&lnd=sitemap">사이트맵</a></li>
                    </ul>
                </nav>
            </li>
            <li>
                <nav>
                    <ul class="l_style_none bottom_menu_nav">
                        <li><a href="#none">이용약관</a></li>
                        <li><a href="?com=blank&lnd=privacy">개인정보취급방침</a></li>
                        <li><a href="?com=blank&lnd=youth">청소년보호정책</a></li>
                        <li><a href="?com=blank&lnd=email">이메일무단수집거부</a></li>
                    </ul>
                </nav>
            </li>
            <li>
                <nav>
                    <ul class="l_style_none bottom_menu_nav">
                        <li><a href="?com=board&lnd=list&code=join">점집등록 방법</a></li>
                        <li><a href="?com=board&lnd=list&code=oq">조합가입 문의</a></li>
                        <li><a href="?com=board&lnd=list&code=travel">기도여행</a></li>
                        <li><a href="?com=board&lnd=list&code=area">추천 기도터 굿당</a></li>
<?if($_SESSION["USER_ID"] != ""){?>
                        <li><a href="?com=user&lnd=out">회원탈퇴</a></li>
<?}?>
                    </ul>
                </nav>
            </li>
        </ul>

        <!--<a href="" class="family_site_btn"><img src="/images/btn_familysite.gif" alt="Family site"></a>-->
    </div>
    <div class="bottom_addr_wrap">
        <div class="bottom_addr_text">
            <p>
                상호명 : 주식회사 점 | 대표자 : 맹영호 | 주소 : 충청남도 천안시 서북구 종정로 116, 314호(성정동, 성정빌딩) | 전화번호 : 010-8554-3670
            </p>
            <p>
                전자우편주소 : credit9600@hanmail.net | 사업자등록번호 : 367-87-00243 | 사이버몰의 이용약관 : <a href="http://sansingak.com" target="_blank">http://sansingak.com</a>
            </p>
            <p>
                통신판매신고번호 : 제2015-충남천안-702호
            </p>
        </div>
        <div class="sns_btn_wrap">
            <a href="http://band.us/#!/band/7997029" target="_new"><img src="/images/band.gif" alt="Band" /></a>
            <a href="https://twitter.com/baeseokbeom" target="_new"><img src="/images/twitter.gif" alt="twitter" /></a>
            <a href="https://www.facebook.com/shamacooperative/" target="_new"><img src="/images/facebook.gif" alt="facebook" /></a>
            <a href="http://blog.naver.com/credit18" target="_new"><img src="/images/blog.gif" alt="blog" /></a>
            <a href="http://cafe.naver.com/credit9600" target="_new"><img src="/images/cafe.gif" alt="cafe" /></a>
            <a href="https://story.kakao.com/ch/credit9600" target="_new"><img src="/images/kakaoch.png" alt="kakaoch" /></a>
            <a href="https://story.kakao.com/sansingak" target="_new"><img src="/images/kakaostory.png" alt="kakaostory" /></a>
            <a href="https://www.youtube.com/user/credit9600" target="_new"><img src="/images/youtube.png" alt="youtube" /></a>

            <a class="escrow_btn" href="" target="_blank"><img src="/images/escrow.gif" alt="안전거래 가맹점 확인" /></a>
        </div>
    </div>
    <!-- 하단 메뉴 ~ 주소 끝 -->
