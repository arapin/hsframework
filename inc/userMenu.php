        <div class="sub_menu_wrap">
            <h2 class="sub_title">회원</h2>
            <nav>
                <ul class="l_style_none sub_left_menu">
<?if($_SESSION["USER_ID"] == ""){?>
                    <li><a href="?com=user&lnd=login" <?if($lnd=="login"){?>class="text_bold"<?}?>>로그인</a></li>
                    <li><a href="?com=user&lnd=join" <?if($lnd=="join"){?>class="text_bold"<?}?>>회원가입</a></li>
                    <li><a href="?com=user&lnd=search" <?if($lnd=="search"){?>class="text_bold"<?}?>>아이디/비밀번호찾기</a></li>
<?}else{?>
                    <li><a href="?com=user&lnd=logout" >로그아웃</a></li>
                    <li><a href="?com=user&lnd=out" <?if($lnd=="out"){?>class="text_bold"<?}?>>회원탈퇴</a></li>
<?}?>
                </ul>
            </nav>
        </div>