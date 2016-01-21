<?
	$aqBoard = new AqBoard();

	$idx = Request::get('idx', Request::REQUEST | Request::XSS_CLEAR);

	$aqBeen = array(":idx" => $idx);
	$rtnData = $aqBoard->getAqBoardInfoMng($aqBeen);

	$answerList = $aqBoard->aqBoardAnswerListM($aqBeen, $rtnData["proState"], $rtnData["userId"]);

	$shamanBeen = array(":idx" => $idx, ":userId" => $_SESSION["SH_ID"]);
	$shamanAnswerCnt = $aqBoard->getUserAnswerCnt($shamanBeen);
?>        
		<div class="layer_title" style="background:#999; color:#fff;">
            <p>문의하기</p>
            <input type="image" src="/images/mobile/btn_close.gif" alt="" />
        </div>
<form name="choiceForm" method="post" action="?com=aqBoard&pro=aqBoardInfo">
	<input type="hidden" name="mode" value="choice" />
	<input type="hidden" name="idx" value="" />
	<input type="hidden" name="answerIdx" value="" />
</form>

        <div style="padding:0px 10px;">
            <dl class="list_style_1">
                <dt>
                    <?=$rtnData["productName"]?>
                    <span style="color:#333;display:block;margin:10px 0px;"><?=$rtnData["title"]?></span>
                    <ul class="bc_lst l_style_none">
                        <li>답변기간 : <span class="txt_2"><?=$rtnData["answerDate"]?></span></li>
                        <li>작성일 : 15.12.10</li>
                        <li>작성자 : <?=$rtnData["userId"]?></li>
                        <li>답변수 : <span class="txt_2"><?=$rtnData["answerCnt"]?></span></li>
                        <li>답변채택 : <span class="txt_2"><?=$rtnData["state"]?></span></li>
                    </ul>
                    <div class="b_view_btn">
<?if($rtnData["proState"] == "W" || $rtnData["proState"] == "V"){?>
                        <input type="button" value="수정" style="margin-right:7px;" onclick="location.href='?com=aqBoard&lnd=modify&idx=<?=$idx?>';" /><!--<input type="button" value="삭제" onclick="" />-->
<?}else{?>
						&nbsp;
<?}?>
                    </div>
                </dt>
                <dd>
                    <?=nl2br($rtnData["content"])?>
                </dd>
                <dd class="table" style="border-bottom:1px solid #ddd; color:#999;padding:7px 10px;font-size:13px;line-height:140%;">
                    <div class="t_cell_l">
<?if($rtnData["proState"] == "I"){?>
                        <div style="color:#f55;">답변이 완료되었습니다.</div>
                        답변을 채택해 주세요.
<?}?>
                    </div>
                    <div class="t_cell_r">
					<?
						if($_SESSION["SH_ID"] != ""){
							if($shamanAnswerCnt == 0){
					?>
                        <input type="button" value="답변하기" class="btn_1 btn_s" onclick="$('#answer').show(); $(this).hide();" id="replyBtn"/>
					<?
							}
						}
					?>
                    </div>
                </dd>
            </dl>
				<form name="answerForm" method="post" action="?com=aqBoard&pro=aqBoardInfo">
				<input type="hidden" name="mode" value="answer" />
				<input type="hidden" name="userId" value="<?=$_SESSION["SH_ID"]?>" />
				<input type="hidden" name="parentIdx" value="<?=$idx?>" />
				<input type="hidden" name="answerIdx" value="" />

            <div style="padding:20px 10px 0px 10px;display:none" id="answer">
                <textarea class="txtarea1" name="content" placeholder="이 질문에 답변해 주세요."></textarea>

                <div class="ctl_half" style="padding:10px 0px 20px 0px;">
                    <div class="ctl_half_t1">
                        <input type="button" style="margin-top:10px; font-size:14px;" class="btn_3" value="작성"  onclick="writeAnswer();" />
                    </div>
                    <div class="ctl_half_t2">
                        <input type="button" style="margin-top:10px;" class="btn_2" value="취소" onclick="$('#answer').hide(); $('#replyBtn').show();" />
                    </div>
                </div>
            </div>
				</form>

            <dl class="list_style_2">
                <dt style="padding-top:0px;"><img src="/images/mobile/arrow2.gif" alt="" />총 <span class="txt_4"><?=$rtnData["answerCnt"]?></span>개의 답변이 있습니다.</dt>
				<?=$answerList?>
                <!--<dd class="cmt_sel">
                    <p class="cmt_cnt">[답변 2]</p>
                    <div class="cmt_sel_btn">
                        <input type="button" value="채택완료" class="btn_1" />
                    </div>

                    <p>홍길동님의 2016년 사업운은 음력 4,5월은 사업의 경쟁자를 주의하셔야 합니다.</p>
                    <p>음력 7월, 8월은 좋은운이 들어올 달이고 11월, 12월은 경제도 풀리고 문서운도 좋습니다.</p>

                    <div style="color:#777;padding-top:8px;">
                        answer&nbsp;&nbsp;|&nbsp;2015.12.03
                    </div>
                </dd>


                <dd>
                    <p class="cmt_cnt">[답변 2]</p>
                    <div class="cmt_sel_btn">
                        <input type="button" value="채택하기" class="btn_7" />
                    </div>

                    <p>음력 10월부터 재물이 들어올 운세입니다.</p>

                    <div style="color:#777;padding-top:8px;">
                        jeum2&nbsp;&nbsp;|&nbsp;2015.12.03
                    </div>
                </dd>


                <dd>
                    <p class="cmt_cnt">[답변 1]</p>
                    <div class="cmt_sel_btn">
                        <input type="button" value="채택하기" class="btn_7" />
                    </div>

                    <p>6월부터 재물이 들어올 운세입니다.</p>

                    <div style="color:#777;padding-top:8px;">
                        jeum1&nbsp;&nbsp;|&nbsp;2015.12.03
                    </div>
                </dd>
            </dl>-->

            <div class="bv_btn_wrap">
                <input type="button" value="목록으로" onclick="location.href = '?com=aqBoard&lnd=list';" class="btn_8" />
            </div>
        </div>

        <!--<div style="padding:0px 20px;">
            <textarea class="txtarea1">음력 10월부터 재물이 들어올 운세입니다.</textarea>

            <div class="ctl_half" style="padding:10px 0px 20px 0px;">
                <div class="ctl_half_t1">
                    <input type="button" style="margin-top:10px; font-size:14px;" class="btn_1" value="수정" onclick="" />
                </div>
                <div class="ctl_half_t2">
                    <input type="button" style="margin-top:10px;" class="btn_2" value="취소" onclick="" />
                </div>
            </div>
        </div>-->