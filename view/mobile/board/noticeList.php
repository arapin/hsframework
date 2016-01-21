<?
	$board = new Board();
	$rtnList = $board->boardListM($page, "thread", $code);
?>  
		<?if($code == "notice"){?>
		<div class="board_title">
            공지사항
        </div>
		<?}else if($code == "search" || $code == "booking" || $code == "con"){?>
        <div class="board_tab_wrap">
            <div <?if($code == "search"){?>class="board_tab_sel"<?}?>>
                <input type="button" value="용한 점집 찾아보기" onclick="location.href='?com=board&lnd=noticeList&code=search'"/>
            </div>
            <div <?if($code == "booking"){?>class="board_tab_sel"<?}?>>
                <input type="button" value="예약하기" onclick="location.href='?com=board&lnd=noticeList&code=booking'"/>
            </div>
            <div <?if($code == "con"){?>class="board_tab_sel"<?}?>>
                <input type="button" value="상담" onclick="location.href='?com=board&lnd=noticeList&code=con'"/>
            </div>
        </div>
		<?}?>

        <dl class="board_list_1">
			<?=$rtnList?>
        </dl>


        <div class="paging_wrap">
			<?=$board->pageView?>
        </div>