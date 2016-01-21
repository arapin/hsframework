        <!-- 본문 시작 -->
        <div class="sub_content sub_content_max" style="height:650px;">
            <h3 class="sub_h3">사이트맵</h3>
            <ul class="l_style_left sub_site_map">
                <li>HOME >&nbsp;</li>
                <li class="text_bold">사이트맵</li>
            </ul>

            <ul class="l_style_left" style="margin-bottom:40px; padding-top:35px;">
                <li><input type="button" value="무속인 검색" onclick="location.href = '?com=shaman&lnd=map';" class="sitemap_btn1" /></li>
                <!--<li><input type="button" value="문의하기" onclick="location.href = '?com=aqBoard&lnd=list';" class="sitemap_btn2" /></li>-->
                <li><input type="button" value="커뮤니티" onclick="location.href = '?com=board&lnd=list&code=community';" class="sitemap_btn3" /></li>
                <li><input type="button" value="공지사항" onclick="location.href = '?com=board&lnd=noticeList&code=notice';" class="sitemap_btn3" /></li>
            </ul>

            <ul class="l_style_left">
                <li>
<?if($_SESSION["USER_ID"] == ""){?>
                    <input type="button" value="회원가입" onclick="location.href = '?com=user&lnd=join';" class="sitemap_btn4" />

                    <ul class="sitemap_list" style="margin-left:0px;">
                        <li><a href="?com=user&lnd=login">로그인</a></li>
                        <li><a href="?com=user&lnd=join">회원가입</a></li>
                        <li><a href="?com=user&lnd=search">아이디/비밀번호찾기</a></li>
                    </ul>
<?}else{?>
                    <input type="button" value="회원정보수정" onclick="location.href = '?com=mypage&lnd=modify';" class="sitemap_btn4" />

                    <ul class="sitemap_list" style="margin-left:0px;">
                        <li><a href="?com=user&lnd=out">회원탈퇴</a></li>
                    </ul>
<?}?>
                </li>
                <li><input type="button" value="마이페이지" onclick="location.href = '?com=mypage&lnd=modify';" class="sitemap_btn3" /></li>
                <li><input type="button" value="입점하기" onclick="location.href = '?com=shaman&lnd=join';" class="sitemap_btn5" /></li>
                <li>
                    <input type="button" value="이용안내" onclick="location.href = '?com=blank&lnd=info';" class="sitemap_btn3" />

                    <ul class="sitemap_list">
                        <li><a href="#none">회사소개</a></li>
                        <li><a href="#none">신점이란?</a></li>
                        <li><a href="?com=blank&lnd=info">이용안내</a></li>
                        <li><a href="#none">이용약관</a></li>
                        <li><a href="?com=blank&lnd=privacy">개인정보취급방침</a></li>
                        <li><a href="?com=blank&lnd=youth">청소년보호정책</a></li>
                        <li><a href="?com=blank&lnd=email">이메일무단수집거부</a></li>
                        <li><a href="?com=blank&lnd=sitemap">사이트맵</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- 본문 끝 -->
