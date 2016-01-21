        <div class="board_tab_wrap board_tab_wrap_ex">
            <!--<div <?if($lnd=="qList" || $lnd=="qView"){?>class="board_tab_sel"<?}?>>
                <input type="button" onclick="location.href = '?com=mypage&lnd=qList';" value="문의하기" />
            </div>-->
            <div <?if($lnd=="aList" || $lnd=="aView"){?>class="board_tab_sel"<?}?>>
                <input type="button" onclick="location.href = '?com=mypage&lnd=aList';" value="후기" />
            </div>
            <div <?if($lnd=="bList" || $lnd=="bView" || $lnd=="bEdite"){?>class="board_tab_sel"<?}?>>
                <input type="button" onclick="location.href = '?com=mypage&lnd=bList';" value="커뮤니티" />
            </div>
        </div>