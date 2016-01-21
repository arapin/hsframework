<?
	$board = new Board();
	$rtnList = $board->boardList($page, "thread", $code);
?>            
        <div class="sub_content sub_content_max">
            <h3 class="sub_h3">공지사항</h3>
            <ul class="l_style_left sub_site_map">
                <li>HOME >&nbsp;</li>
                <li class="text_bold">공지사항</li>
            </ul>

			<dl class="board_list_1" rel="<?=$page?>">
			<?=$rtnList?>
			</dl>

            <!--<p class="board_more_txt"><?=$board->morBtn?></p>-->
            <div class="paging_wrap">
				<?=$board->pageView?>
            </div>
		</div>