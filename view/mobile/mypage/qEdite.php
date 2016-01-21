<?
	$mypage = new Mypage();

	$idx = Request::get('idx', Request::REQUEST | Request::XSS_CLEAR);

	$aqBeen = array(":idx" => $idx);
	$rtnData = $mypage->getAqBoardInfoMng($aqBeen);
?>
        <div class="layer_title">
            <p>글 수정하기</p>
            <input type="image" src="/images/mobile/btn_close.gif" alt="" />
        </div>
	<form name="writeForm" method="post" action="?com=mypage&pro=mypageinfo">
	<input type="hidden" name="mode" value="aqModify"/>
	<input type="hidden" name="idx" value="<?=$idx?>"/>
        <fieldset class="login_field login_field_ex">
            <input type="text" name="title" value="<?=$rtnData["title"]?>"/>

            <textarea style="width:100%; height:240px; border:1px solid #c3c3c3; color:#666; box-sizing:border-box; padding:10px; font-size:14px; border-radius:2px;" name="content"><?=$rtnData["content"]?></textarea>

            <div class="ctl_half">
                <div class="ctl_half_t1">
                    <input type="button" style="margin-top:10px;" class="btn_1" value="수정" onclick="modifyChk();"/>
                </div>
                <div class="ctl_half_t2">
                    <input type="button" style="margin-top:10px;" class="btn_2" value="취소" onclick="location.href = '?com=mypage&lnd=qView&idx=<?=$idx?>';" />
                </div>
            </div>
        </fieldset>
	</form>