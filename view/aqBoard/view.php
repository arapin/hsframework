<?
	$aqBoard = new AqBoard();

	$idx = Request::get('idx', Request::REQUEST | Request::XSS_CLEAR);

	$aqBeen = array(":idx" => $idx);
	$rtnData = $aqBoard->getAqBoardInfoMng($aqBeen);

	$answerList = $aqBoard->aqBoardAnswerList($aqBeen, $rtnData["proState"], $rtnData["userId"]);

	$shamanBeen = array(":idx" => $idx, ":userId" => $_SESSION["SH_ID"]);
	$shamanAnswerCnt = $aqBoard->getUserAnswerCnt($shamanBeen);
?>        
		<!-- 본문 시작 -->
<form name="choiceForm" method="post" action="?com=aqBoard&pro=aqBoardInfo">
	<input type="hidden" name="mode" value="choice" />
	<input type="hidden" name="idx" value="" />
	<input type="hidden" name="answerIdx" value="" />
</form>
        <div class="sub_content sub_content_max">
            <h3 class="sub_h3">문의하기</h3>
            <ul class="l_style_left sub_site_map">
                <li>HOME >&nbsp;</li>
                <li class="text_bold">문의하기</li>
            </ul>


            <h4 class="board_view_title"><img src="/images/li1.gif" alt="" />글보기</h4>
            <input type="button" class="b_list_btn float_right" style="margin:30px 0px 0px 0px;" value="목록으로" onclick="location.href = '?com=aqBoard&lnd=list';" />

            <dl class="board_view">
                <dt style="padding-top:17px;">
                    <span class="board_view_txt1" style="width:50px">[<?=$rtnData["productName"]?>]</span>
                    <span class="board_view_txt2"><?=$rtnData["title"]?></span><br />
                    <span class="float_left board_view_txt3">
                       <?=$rtnData["userId"]?>&nbsp;&nbsp;|&nbsp;&nbsp;<?=$rtnData["answerDate"]?>&nbsp;&nbsp;|&nbsp;&nbsp;답변&nbsp;&nbsp;<span class="board_view_txt4"><?=$rtnData["answerCnt"]?></span>&nbsp;&nbsp;|&nbsp;&nbsp;답변채택 : <span class="board_view_txt5"><?=$rtnData["state"]?></span>
                    </span>
                    <span class="float_right">
<?if($rtnData["proState"] == "W" || $rtnData["proState"] == "V"){?>
                        <input type="button" value="수정" onclick="showPop()" class="b_edit_btn" style="margin-right:3px;"/>
                        <!--<input type="button" value="삭제" class="btn5" />-->
<?}?>
                    </span>
                </dt>
                <dd>
					<?=nl2br($rtnData["content"])?>
                </dd>

                <dt class="b_reply_dt">
					<span class="float_left">이 질문에 답변해 주세요. <span class="board_view_txt5">이 질문에 답변이 완료 되었습니다.</span></span>
                    <span class="float_right">
					<?
						if($_SESSION["SH_ID"] != ""){
							if($shamanAnswerCnt == 0){
					?>
                        <input type="button" value="답변하기" onclick="$('.board_reply_write').show(); $(this).hide();" class="b_end_btn" id="replyBtn" style="margin:10px 0px 0px; padding:0px 24px; clear:none;" />
                        <!--<input type="button" value="답변완료" class="btn4" />-->
					<?
							}
						}
					?>
                    </span>
                </dt>
                <dd class="board_reply_write">
				<form name="answerForm" method="post" action="?com=aqBoard&pro=aqBoardInfo">
				<input type="hidden" name="mode" value="answer" />
				<input type="hidden" name="userId" value="<?=$_SESSION["SH_ID"]?>" />
				<input type="hidden" name="parentIdx" value="<?=$idx?>" />
				<input type="hidden" name="answerIdx" value="" />
                    ※ 고객님의 연락처, 주소 등의 개인정보가 포함된 글을 올리실 경우에는 타인에게 해당정보가 노출될 수 있으니 게재를 삼가하여 주시기 바랍니다.
                    <textarea name="content"></textarea>

                    <p>
                        <input type="button" value="작성완료" class="b_write_btn" onclick="writeAnswer();" style="width:100px; float:none;"/>
                        <input type="button" value="취소하기" onclick="$('.board_reply_write').hide(); $('#replyBtn').show();" style="width:100px; float:none;" class="b_select_btn" />
                    </p>
				</form>
                </dd>
            </dl>

            <dl class="board_replay">
                <dt>
                    <img src="/images/li2.gif" alt="" />총 <span><?=$rtnData["answerCnt"]?></span> 개의 답변이 있습니다.
                </dt>
				<?=$answerList?>
            </dl>
            <div style="text-align:center; padding-bottom:60px;">
                &nbsp;<!--<input type="button" value="답변 더보기" class="b_reply_more_btn" />-->
            </div>

            <input type="button" value="목록으로" class="float_right b_list_btn" style="margin-top:-90px;" onclick="location.href = '?com=aqBoard&lnd=list';" />
        </div>