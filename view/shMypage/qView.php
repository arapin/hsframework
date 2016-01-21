<?
	$shmypage = new SHMypage();

	$idx = Request::get('idx', Request::REQUEST | Request::XSS_CLEAR);

	$aqBeen = array(":idx" => $idx);
	$rtnData = $shmypage->getAqBoardInfoMng($aqBeen);

	$answerList = $shmypage->aqBoardAnswerList($aqBeen, $rtnData["proState"], $rtnData["userId"]);

	$shamanBeen = array(":idx" => $idx, ":userId" => $_SESSION["SH_ID"]);
	$shamanAnswerCnt = $shmypage->getUserAnswerCnt($shamanBeen);
?>		
		<?include $_SERVER["DOCUMENT_ROOT"]."/inc/shMypageLeftMenu.php"?>
		<!-- 본문 시작 -->
        <div class="sub_content" style="width: 784px;">
            <h3 class="sub_h3">문의하기</h3>
            <ul class="l_style_left sub_site_map">
                <li>HOME >&nbsp;</li>
                <li>마이페이지 >&nbsp;</li>
                <li class="text_bold">문의하기</li>
            </ul>

            <h4 class="board_view_title"><img src="/images/li1.gif" alt="" />글보기</h4>
            <input type="button" class="b_list_btn float_right" style="margin:30px 0px 0px 0px;" value="목록으로" onclick="location.href = '?com=shMypage&lnd=qList';" />

            <dl class="board_view">
                <dt style="padding-top:17px;">
                    <span class="board_view_txt1">[<?=$rtnData["productName"]?>]</span>
                    <span class="board_view_txt2"><?=$rtnData["title"]?></span><br />
                    <span class="float_left board_view_txt3">
                        <?=$rtnData["userId"]?>&nbsp;&nbsp;|&nbsp;&nbsp;<span class="board_view_txt5">15.10.07 - 15.11.07</span>&nbsp;&nbsp;|&nbsp;&nbsp;답변&nbsp;&nbsp;<span class="board_view_txt4"><?=$rtnData["answerCnt"]?></span>&nbsp;&nbsp;|&nbsp;&nbsp;답변채택 : <span class="board_view_txt5"><?=$rtnData["state"]?></span><br />
                        <!--성명(한자) : 홍길동(洪吉洞)&nbsp;&nbsp;|&nbsp;&nbsp;생년월일/시 : 1908.01.01 (음) 12:30-->
                    </span>
                </dt>
                <dd>
                    <?=nl2br($rtnData["content"])?>
                </dd>

                <dt style="border:none;background:none;padding:17px 19px;">
                    &nbsp;<!--<span class="float_left">이 질문에 답변이 완료됐습니다. 이 질문에 답변을 채택중입니다.</span>-->
                </dt>
            </dl>

            <dl class="board_replay">
                <dt>
                    <img src="/images/li2.gif" alt="" />총 <span><?=$rtnData["answerCnt"]?></span> 개의 답변이 있습니다.
                </dt>
				<?=$answerList?>
            </dl>
			
			<div id="modifyArea" style="display:none;">
			<form name="answerForm" method="post" action="?com=shMypage&pro=shMypageInfo">
			<input type="hidden" name="answerIdx" value="" />
			<input type="hidden" name="idx" value="<?=$idx?>" />
			<input type="hidden" name="mode" value="modifyAnswer" />
				<div class="b_comment_edit">
					<textarea name="content"></textarea>
				</div>

				<div style="text-align:center;padding-bottom:40px;">
					<input type="button" class="b_write_btn b_write_btn_ex" style="margin-right:3px;" value="수정" onclick="modifyContent();"/>
					<input type="button" class="b_select_btn b_select_btn_ex2" value="취소" onclick="modifyCancel();"/>
				</div>
			</form>
			</div>
            <input type="button" value="목록으로" class="float_right b_list_btn" style="margin-bottom:40px;" onclick="location.href = '?com=shMypage&lnd=qList';" />
        </div>
        <!-- 본문 끝 -->