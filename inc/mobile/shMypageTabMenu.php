        <div class="board_tab_wrap board_tab_wrap_ex">
            <div <?if($lnd=="qList" || $lnd=="qView"){?>class="board_tab_sel"<?}?>>
                <input type="button" onclick="location.href = '?com=shMypage&lnd=qList';" value="문의하기" />
            </div>
            <div <?if($lnd=="bList" || $lnd=="bView" || $lnd=="bEdite"){?>class="board_tab_sel"<?}?>>
                <input type="button" onclick="location.href = '?com=shMypage&lnd=bList';" value="커뮤니티" />
            </div>
        </div>