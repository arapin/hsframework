<?
	$mypage = new Mypage();
	$idx = Request::get('idx', Request::REQUEST | Request::XSS_CLEAR);

	$aqBeen = array(":idx" => $idx);
	$rtnData = $mypage->getAffterMemoModifyInfo($aqBeen);
?>        
		<div class="layer_title">
            <p>후기 수정하기</p>
            <input type="image" src="/images/mobile/btn_close.gif" alt="" />
        </div>

		<?include $_SERVER["DOCUMENT_ROOT"]."/inc/mobile/mypageTabMenu.php"?>

<form name="modifyForm" method="post" action="?com=mypage&pro=mypageinfo">
<input type="hidden" name="mode" value="memoModify" />
<input type="hidden" name="idx" value="<?=$idx?>" />

        <fieldset class="login_field login_field_ex">

            <textarea style="width:100%; height:240px; border:1px solid #c3c3c3; color:#666; box-sizing:border-box; padding:10px; font-size:14px; border-radius:2px;" name="memo"><?=$rtnData["memo"]?></textarea>

            <div class="ctl_half">
                <div class="ctl_half_t1">
                    <input type="button" style="margin-top:10px;" class="btn_1" value="수정" onclick="memoModifyChk();" />
                </div>
                <div class="ctl_half_t2">
                    <input type="button" style="margin-top:10px;" class="btn_2" value="취소" onclick="location.href = '?com=mypage&lnd=aList&idx=<?=$idx?>';" />
                </div>
            </div>
        </fieldset>
</form>
