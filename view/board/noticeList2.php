<?
	$board = new Board();
	$rtnList = $board->boardList($page, "thread", $code);

	 switch($code){
		 case "search" : $viewTitle = "용한 점집 찾아보기"; break;
		 case "booking" : $viewTitle = "예약하기"; break;
		 case "con" : $viewTitle = "상담"; break;
	 }
?>        
		<!-- 본문 시작 -->
        <div class="sub_content sub_content_max">
            <h3 class="sub_h3"><?= $viewTitle?></h3>
            <ul class="l_style_left sub_site_map">
                <li>HOME >&nbsp;</li>
                <li>이용안내 >&nbsp;</li>
                <li class="text_bold"><?= $viewTitle?></li>
            </ul>

            <dl class="board_list_1">
				<?=$rtnList?>
                <!--<dt><input type="image" src="/images/btn_collapse.gif" onclick="toggleView(this)" alt="축소" />용한 점집 찾아보기<span class="board_date_txt">10/10</span></dt>
                <dd style="display:block;">
                    용한 점집 찾아보기
                </dd>
                <dt><input type="image" src="/images/btn_expand.gif" onclick="toggleView(this)" alt="확대" />용한 점집 찾아보기<span class="board_date_txt">10/09</span></dt>
                <dd></dd>
                <dt><input type="image" src="/images/btn_expand.gif" onclick="toggleView(this)" alt="확대" />용한 점집 찾아보기<span class="board_date_txt">10/08</span></dt>
                <dd></dd>
                <dt><input type="image" src="/images/btn_expand.gif" onclick="toggleView(this)" alt="확대" />용한 점집 찾아보기<span class="board_date_txt">10/07</span></dt>
                <dd></dd>
                <dt><input type="image" src="/images/btn_expand.gif" onclick="toggleView(this)" alt="확대" />용한 점집 찾아보기<span class="board_date_txt">10/06</span></dt>
                <dd></dd>
                <dt><input type="image" src="/images/btn_expand.gif" onclick="toggleView(this)" alt="확대" />용한 점집 찾아보기<span class="board_date_txt">10/0</span></dt>
                <dd></dd>
                <dt><input type="image" src="/images/btn_expand.gif" onclick="toggleView(this)" alt="확대" />용한 점집 찾아보기<span class="board_date_txt">10/04</span></dt>
                <dd></dd>-->
            </dl>

            <div class="paging_wrap">
				<?=$board->pageView?>
            </div>
        </div>
        <!-- 본문 끝 -->

