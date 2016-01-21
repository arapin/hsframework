<?
	$mypage = new Mypage();

	$idx = Request::get('idx', Request::REQUEST | Request::XSS_CLEAR);

	$aqBeen = array(":idx" => $idx);
	$rtnData = $mypage->getAqBoardInfoMng($aqBeen);

	$answerList = $mypage->aqBoardAnswerList($aqBeen, $rtnData["proState"], $rtnData["userId"]);

	$shamanBeen = array(":idx" => $idx, ":userId" => $_SESSION["SH_ID"]);
	$shamanAnswerCnt = $mypage->getUserAnswerCnt($shamanBeen);
?>		
		<?include $_SERVER["DOCUMENT_ROOT"]."/inc/mypageLeftMenu.php"?>

<form name="choiceForm" method="post" action="?com=mypage&pro=mypageinfo">
	<input type="hidden" name="mode" value="choice" />
	<input type="hidden" name="idx" value="" />
	<input type="hidden" name="answerIdx" value="" />
</form>
        <!-- 본문 시작 -->
        <div class="sub_content" style="width: 784px;">
            <h3 class="sub_h3">문의하기</h3>
            <ul class="l_style_left sub_site_map">
                <li>HOME >&nbsp;</li>
                <li>마이페이지 >&nbsp;</li>
                <li class="text_bold">문의하기</li>
            </ul>

            <h4 class="board_view_title"><img src="/images/li1.gif" alt="" />글보기</h4>
            <input type="button" class="b_list_btn float_right" style="margin:30px 0px 0px 0px;" value="목록으로" onclick="location.href = '?com=mypage&lnd=qList';" />

            <dl class="board_view">
                <dt style="padding-top:17px;">
                    <span class="board_view_txt1">[<?=$rtnData["productName"]?>]</span>
                    <span class="board_view_txt2"><?=$rtnData["title"]?></span><br />
                    <span class="float_left board_view_txt3">
                        <?=$rtnData["userId"]?>&nbsp;&nbsp;|&nbsp;&nbsp;<span class="board_view_txt5"><?=substr($rtnData["answerStartDate"],2)?> - <?=substr($rtnData["answerEndDate"],2)?></span>&nbsp;&nbsp;|&nbsp;&nbsp;답변&nbsp;&nbsp;<span class="board_view_txt4"><?=$rtnData["answerCnt"]?></span>&nbsp;&nbsp;|&nbsp;&nbsp;답변채택 : <span class="board_view_txt5"><?=$rtnData["state"]?></span><br />
                        <!--성명(한자) : 홍길동(洪吉洞)&nbsp;&nbsp;|&nbsp;&nbsp;생년월일/시 : 1908.01.01 (음) 12:30-->
                    </span>
                    <span class="float_right" style="margin-top:23px;">
<?if($rtnData["proState"] == "W" || $rtnData["proState"] == "V"){?>
                        <input type="button" value="수정" onclick="showPop()" class="b_edit_btn" style="margin-right:3px;" />
                        <!--<input type="button" value="삭제" class="b_edit_btn" />-->
<?}?>
                    </span>
                </dt>
                <dd>
                    <?=nl2br($rtnData["content"])?>
                </dd>
<?if($rtnData["proState"] == "I"){?>
                <dt style="border:none;background:none;padding:17px 19px;">
                    <span class="float_left">이 질문에 답변이 완료됐습니다. 이 질문에 답변을 채택해주세요.</span>
                </dt>
<?}?>
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
            <input type="button" value="목록으로" class="float_right b_list_btn" style="margin-top:-90px;" onclick="location.href = '?com=mypage&lnd=qList';" />
        </div>
