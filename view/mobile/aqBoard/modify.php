<?
	$aqBoard = new AqBoard();

	$idx = Request::get('idx', Request::REQUEST | Request::XSS_CLEAR);

	$aqBeen = array(":idx" => $idx);
	$rtnData = $aqBoard->getAqBoardInfoMng($aqBeen);

	$answerList = $aqBoard->aqBoardAnswerListM($aqBeen, $rtnData["proState"], $rtnData["userId"]);

	$shamanBeen = array(":idx" => $idx, ":userId" => $_SESSION["SH_ID"]);
	$shamanAnswerCnt = $aqBoard->getUserAnswerCnt($shamanBeen);
?>       	        
		<div class="layer_title">
            <p>글쓰기</p>
            <input type="image" src="/images/mobile/btn_close.gif" alt="" />
        </div>
	<form name="writeForm" method="post" action="?com=aqBoard&pro=aqBoardInfo">
	<input type="hidden" name="mode" value="modify"/>
	<input type="hidden" name="idx" value="<?=$idx?>"/>

        <fieldset class="login_field login_field_ex">

            <input type="text" name="title" placeholder="제목" value="<?=$rtnData["title"]?>"/>

            <textarea style="width:100%; height:240px; border:1px solid #c3c3c3; color:#888; box-sizing:border-box; padding:10px; font-size:14px; border-radius:2px;" placeholder="※ 고객님의 연락처, 주소 등의 개인정보가 포함 된 글을 올리실 경우에는 타인에게 해당정보가 노출될 수 있으니 게재를 삼가하여 주시기 바랍니다." id="txtContent" name="content"><?=$rtnData["content"]?></textarea>

            <div class="ctl_half">
                <div class="ctl_half_t1">
                    <input type="button" style="margin-top:10px;" class="btn_1" value="작성하기" onclick="modifyChk();" />
                </div>
                <div class="ctl_half_t2">
                    <input type="button" style="margin-top:10px;" class="btn_2" value="취소" onclick="location.href='?com=aqBoard&lnd=view&idx=<?=$idx?>'" />
                </div>
            </div>
        </fieldset>
	</form>
