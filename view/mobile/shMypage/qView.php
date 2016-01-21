<?
	$shmypage = new SHMypage();

	$idx = Request::get('idx', Request::REQUEST | Request::XSS_CLEAR);

	$aqBeen = array(":idx" => $idx);
	$rtnData = $shmypage->getAqBoardInfoMng($aqBeen);

	$answerList = $shmypage->aqBoardAnswerListM($aqBeen, $rtnData["proState"], $rtnData["userId"]);

	$shamanBeen = array(":idx" => $idx, ":userId" => $_SESSION["SH_ID"]);
	$shamanAnswerCnt = $shmypage->getUserAnswerCnt($shamanBeen);
?>	
		<div class="layer_title">
            <p>내가 작성한 글</p>
            <input type="image" src="/images/mobile/btn_close.gif" alt="" />
        </div>

		<?include $_SERVER["DOCUMENT_ROOT"]."/inc/mobile/shMypageTabMenu.php"?>



        <div style="padding:0px 10px;">
            <dl class="list_style_1">
                <dt>
                    <?=$rtnData["productName"]?>
                    <span style="color:#333;display:block;margin:10px 0px;"><?=$rtnData["title"]?></span>
                    <ul class="bc_lst l_style_none">
                        <li>답변기간 : <span class="txt_2">15.12.10 ~ 15.12.30</span></li>
                        <li>작성일 : 15.12.10</li>
                        <li>작성자 : <?=$rtnData["userId"]?></li>
                        <li>답변수 : <span class="txt_2"><?=$rtnData["answerCnt"]?></span></li>
                        <li>답변채택 : <span class="txt_2"><?=$rtnData["state"]?></span></li>
                    </ul>
                </dt>
                <dd>
                    <?=nl2br($rtnData["content"])?>
                </dd>
                <dd style="border-bottom:1px solid #ddd; color:#999;padding:10px;font-size:13px;">
                    <!--답변이 완료됐습니다. 답변을 채택해 주세요.-->
                </dd>
            </dl>

            <dl class="list_style_2">
                <dt><img src="/images/mobile/arrow2.gif" alt="" /><span class="txt_4"><?=$rtnData["userId"]?></span> 님의 총 <span class="txt_4"><?=$rtnData["answerCnt"]?></span>개의 답변이 있습니다.</dt>
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
                        <input type="button" value="수정" class="btn_2" style="margin-right:5px;" /><input type="button" value="삭제" class="btn_2" />
                    </div>

                    <p>음력 10월부터 재물이 들어올 운세입니다.</p>

                    <div style="color:#777;padding-top:8px;">
                        jeum2&nbsp;&nbsp;|&nbsp;2015.12.03
                    </div>
                </dd>-->

            </dl>

            <div class="bv_btn_wrap">
                <input type="button" value="목록으로" onclick="location.href = '?com=shMypage&lnd=qList'" class="btn_8" />
            </div>
			<div id="modifyArea" style="display:none;">
			<form name="answerForm" method="post" action="?com=shMypage&pro=shMypageInfo">
			<input type="hidden" name="answerIdx" value="" />
			<input type="hidden" name="idx" value="<?=$idx?>" />
			<input type="hidden" name="mode" value="modifyAnswer" />

            <textarea class="txtarea1" name="content"></textarea>

            <div class="table" style="padding:20px 0px;">
                <div class="t_cell_c" style="padding-right:5px;">
                    <input type="button" class="btn_1" value="수정" onclick="modifyContent();" />
                </div>
                <div class="t_cell_c" style="padding-left:5px;">
                    <input type="button" class="btn_2" value="취소" onclick="modifyCancel();" />
                </div>
            </div>
			</form>
			</div>

        </div>