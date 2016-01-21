        <!-- 왼쪽 메뉴 시작 -->
        <div class="sub_menu_wrap" style="width:180px;">
            <h2 class="sub_title">내가 작성한 글</h2>
            <nav>
                <ul class="l_style_none sub_left_menu">
                    <li><a href="?com=mypage&lnd=qList" <?if($lnd == "qList" || $lnd == "qView"){?>class="text_bold"<?}?>>문의하기</a></li>
                    <li><a href="?com=mypage&lnd=aList" <?if($lnd == "aList" || $lnd == "aView"){?>class="text_bold"<?}?>>후기</a></li>
                    <li><a href="?com=mypage&lnd=bList" <?if($lnd == "bList" || $lnd == "bView"){?>class="text_bold"<?}?>>커뮤니티</a></li>
                </ul>
            </nav>
        </div>
        <!-- 왼쪽 메뉴 끝 -->