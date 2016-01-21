        <div class="foot_wrap1">
            <select>
                <option value="ko">한국어</option>
                <option value="jp">日本語(準備中)</option>
            </select>

            <p>전화번호 : <a href="tel:010-8811-5795">010-8554-3670</a></p>
            <p>전자우편주소 : <a href="mailto:aoddudgh@naver.com">aoddudgh@naver.com</a></p>

            <ul>
                <li><a href="?com=blank&lnd=intro">회사소개</a></li>
                <!--<li><a href="#none">신점문의</a></li>-->
                <li><a href="?com=board&lnd=list&code=join">점집등록방법</a></li>
                <li><a href="?com=board&lnd=list&code=oq">조합가입 문의</a></li>
			</ul>
			<ul>
                <li><a href="?com=board&lnd=list&code=travel">기도여행</a></li>
                <li><a href="?com=board&lnd=list&code=area">추천 기도터 굿당</a></li>
                <li><a href="?com=blank&lnd=service">이용약관</a></li>
            </ul>
        </div>
        <div class="foot_wrap2">
            <ul>
                <li> <a href="http://band.us/#!/band/7997029" target="_new"><input type="image" src="/images/mobile/band.gif" alt="band" /></a></li>
                <li> <a href="https://twitter.com/baeseokbeom" target="_new"><input type="image" src="/images/mobile/twitter.gif" alt="twitter" /></a></li>
                <li><a href="https://www.facebook.com/shamacooperative/" target="_new"><input type="image" src="/images/mobile/facebook.gif" alt="facebook" /></a></li>
                <li><a href="http://blog.naver.com/credit18" target="_new"><input type="image" src="/images/mobile/blog.gif" alt="blog" /></a></li>
                <li><a href="http://cafe.naver.com/credit9600" target="_new"><input type="image" src="/images/mobile/cafe.gif" alt="cafe" /></a></li>
                <li><a href="https://story.kakao.com/ch/credit9600" target="_new"><input type="image" src="/images/mobile/ic_kakaoch.png" alt="kakaoch" /></a></li>
                <li><a href="https://story.kakao.com/sansingak" target="_new"><input type="image" src="/images/mobile/ic_kakaostory.png" alt="kakaostory" /></a></li>
                <li><a href="https://www.youtube.com/user/credit9600" target="_new"><input type="image" src="/images/mobile/ic_youtube.png" alt="youtube" /></a></li>
            </ul>
            <!--<p>ⓒSansingak co-op</p>-->
            <p>ⓒ Jeom co-op</p>
        </div>
    </div>

    <!-- 왼쪽 메뉴 시작 -->
    <div class="side_menu_wrap" onclick="hideSideMenu()">
        <div class="side_menu" onclick="hideCancel = true;">
<?if($_SESSION["USER_ID"] != "" || $_SESSION["SH_ID"] != ""){?>
            <!-- 로그인 후 메뉴 시작 -->
            <div class="side_menu_user">
				<?
					if($_SESSION["USER_ID"] != ""){
						echo $_SESSION["USER_NAME"]."님 안녕하세요";
					}else if($_SESSION["SH_ID"] != ""){
						echo $_SESSION["SH_ID"]."님 안녕하세요";
					}
				?>
            </div>
            <ul class="side_menu_list" style="padding:7px 0px 0px 0px;">
                <!--<li><a href="#none">메시지</a></li>-->
                <li><a href="/">홈</a></li>
                <li><a href="?com=shaman&lnd=searchFilter">점집검색</a></li>
<?if($_SESSION["USER_ID"] != ""){?>
                <li><a href="?com=mypage&lnd=resList">예약확인</a></li>
                <li><a href="?com=mypage&lnd=aList">내가 작성한글</a></li>
                <li><a href="?com=mypage&lnd=modify">회원정보 수정</a></li>
                <li><a href="?com=user&lnd=out">회원 탈퇴</a></li>
                <li><a href="?com=mypage&lnd=wish">위시 확인</a></li>
<?}?>
<? if($_SESSION["SH_ID"] != ""){?>
                <li><a href="?com=shMypage&lnd=resList">예약확인</a></li>
                <li><a href="?com=shMypage&lnd=modify">점집정보 수정</a></li>
                <li><a href="?com=shMypage&lnd=qList">내가 작성한글</a></li>
			<?if($_SESSION["SH_ID"] == "SHstormfiled"){?>
				<li><a href="?com=shMypage&lnd=calList">정산관리</a></li>
				<?}else{?>
				<li><a href="#none">정산관리</a></li>
				<?}?><?}?>

                <li><a href="?com=board&lnd=list&code=community">커뮤니티</a></li><!--?com=board&lnd=list&code=community-->
                <li><a href="?com=board&lnd=noticeList&code=search">이용방법</a></li>
                <li style="padding-top:46px;"><a href="?com=board&lnd=noticeList&code=notice">도움말</a></li>
                <li><a href="?com=blank&lnd=privacy">개인정보취급방침</a></li>
                <li><a href="?com=blank&lnd=youthpolicy">청소년보호정책</a></li>
                <li><a href="?com=blank&lnd=email">이메일무단수집거부</a></li>
                <!--<li><a href="invite.html">친구 초대</a></li>-->
                <li><a href="?com=user&pro=logout">로그아웃</a></li>
            </ul>
            <!-- 로그인 후 메뉴 끝 -->
<?}else{?>
            <!-- 로그인 전 메뉴 시작 -->
            <ul class="side_menu_list">
                <li><a href="/">홈</a></li>
                <!--<li><a href="app.html">앱 다운로드</a></li>-->
                <li><a href="?com=user&lnd=join">회원가입</a></li>
                <li><a href="?com=user&lnd=login">로그인</a></li>
                <li><a href="?com=shaman&lnd=searchFilter">점집검색</a></li>
                <li><a href="?com=board&lnd=list&code=community">커뮤니티</a></li><!--?com=board&lnd=list&code=community-->
                <li><a href="?com=board&lnd=noticeList&code=search">이용방법</a></li>
                <li style="padding-top:46px;"><a href="?com=board&lnd=noticeList&code=notice">도움말</a></li>
                <li><a href="?com=blank&lnd=privacy">개인정보취급방침</a></li>
                <li><a href="?com=blank&lnd=youthpolicy">청소년보호정책</a></li>
                <li><a href="?com=blank&lnd=email">이메일무단수집거부</a></li>
            </ul>
            <!-- 로그인 전 메뉴 끝 -->
<?}?>
        </div>
    </div>
    <!-- 왼쪽 메뉴 끝 -->
</body>
</html>