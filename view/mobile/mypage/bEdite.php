<?
	$mypage = new Mypage();

	$idx = Request::get('idx', Request::REQUEST | Request::XSS_CLEAR);
	$code = Request::get('code', Request::REQUEST | Request::XSS_CLEAR);
	$boardBeen = array(":idx" => $idx);

	$rData = $mypage->boardModifyInfo($boardBeen);

	$memoBeen = array(":parentIdx" => $idx);

	$mList = $mypage->getMemoList($memoBeen);
	$title = $rData["title"];
	$content = $rData["content"];
	$headWord = $rData["headWord"];
?>

        <div class="layer_title">
            <p>글 수정하기</p>
            <!--<input type="image" src="/images/mobile/btn_close.gif" alt="" />-->
        </div>

		<?include $_SERVER["DOCUMENT_ROOT"]."/inc/mobile/mypageTabMenu.php"?>

	<form name="writeForm" method="post" action="?com=mypage&pro=mypageinfo">
	<input type="hidden" name="mode" value="insert"/>
	<input type="hidden" name="idx" value="<?=$idx?>"/>
	<input type="hidden" name="code" value="<?=$code?>"/>
<?if($_SESSION["USER_ID"] == ""){?>
	<input type="hidden" name="userId" value="<?=$_SESSION["SH_ID"]?>"/>
<?}else{?>
	<input type="hidden" name="userId" value="<?=$_SESSION["USER_ID"]?>"/>
<?}?>
        <fieldset class="login_field login_field_ex">

			<select id="ddlType" name="headWord">
				<option value="추천점집공유" <?if($headWord == "추천점집공유"){?>selected<?}?>>추천점집공유</option>
				<option value="잡담" <?if($headWord == "잡담"){?>selected<?}?>>잡담</option>
				<option value="나의 신점" <?if($headWord == "나의 신점"){?>selected<?}?>>나의 신점</option>
			</select>

            <input type="text" value="<?=$title?>" name="title"/>

            <textarea style="width:100%; height:240px; border:1px solid #c3c3c3; color:#666; box-sizing:border-box; padding:10px; font-size:14px; border-radius:2px;" name="content"><?=$content?></textarea>

            <div class="ctl_half">
                <div class="ctl_half_t1">
                    <input type="button" style="margin-top:10px;" class="btn_1" value="수정" onclick="boardModifyChk();" />
                </div>
                <div class="ctl_half_t2">
                    <input type="button" style="margin-top:10px;" class="btn_2" value="취소" onclick="location.href = '?com=mypage&lnd=bView&idx=<?=$idx?>&code=<?=$code?>';" />
                </div>
            </div>
        </fieldset>
	</form>
