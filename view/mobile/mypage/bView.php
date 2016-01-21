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
	<form name="writeForm" method="post" action="?com=mypage&pro=mypageinfo">
	<input type="hidden" name="mode" value="insert"/>
	<input type="hidden" name="idx" value="<?=$idx?>"/>
	<input type="hidden" name="code" value="<?=$code?>"/>
<?if($_SESSION["USER_ID"] == ""){?>
	<input type="hidden" name="userId" value="<?=$_SESSION["SH_ID"]?>"/>
<?}else{?>
	<input type="hidden" name="userId" value="<?=$_SESSION["USER_ID"]?>"/>
<?}?>
	</form>
        <div class="layer_title">
            <p>내가 작성한 글</p>
            <input type="image" src="/images/mobile/btn_close.gif" alt="" onclick="location.href = '?com=mypage&lnd=bList'"/>
        </div>

		<?include $_SERVER["DOCUMENT_ROOT"]."/inc/mobile/mypageTabMenu.php"?>

        <div style="padding:0px 10px;">
            <dl class="list_style_1">
                <dt>
                    <span class="float_left">
                        <?=$headWord?>
                    </span>
                    <span class="float_right">
                        <?=str_replace("-",".",substr($rData["regDate"],2))?>
                    </span>
                    <span style="color:#333;display:block;padding-top:10px;clear:both;"><?=$title?></span>
                </dt>
                <dd>
					<?=nl2br($content)?>
                </dd>
            </dl>

            <div style="text-align:right;padding:10px 0px 20px 0px; overflow:auto;">
                <div class="float_left">
                    <input type="button" value="수정" class="btn_7 btn_s" style="margin-right:7px;" onclick="location.href = '?com=mypage&lnd=bEdite&idx=<?=$idx?>&code=<?=$code?>';" />
					<input type="button" value="삭제" class="btn_2 btn_s" onclick="deleteBoard('<?=$idx?>');" />
                </div>
                <div class="float_right">
                    <input type="button" value="목록으로" class="btn_8 btn_s" onclick="location.href = '?com=mypage&lnd=bList';" />
                </div>
            </div>
        </div>