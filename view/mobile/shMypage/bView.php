<?
	$shmypage = new SHMypage();

	$idx = Request::get('idx', Request::REQUEST | Request::XSS_CLEAR);
	$code = Request::get('code', Request::REQUEST | Request::XSS_CLEAR);
	$boardBeen = array(":idx" => $idx);

	$rData = $shmypage->boardModifyInfo($boardBeen);

	$memoBeen = array(":parentIdx" => $idx);

	$mList = $shmypage->getMemoListM($memoBeen);
	$title = $rData["title"];
	$content = $rData["content"];
	$headWord = $rData["headWord"];
?> 
	<form name="writeForm" method="post" action="?com=shMypage&pro=shMypageInfo">
	<input type="hidden" name="mode" value="insert"/>
	<input type="hidden" name="idx" value="<?=$idx?>"/>
	<input type="hidden" name="code" value="<?=$code?>"/>
	<input type="hidden" name="userId" value="<?=$_SESSION["SH_ID"]?>"/>
	</form>
        <div class="layer_title">
            <p>내가 작성한 글</p>
            <input type="image" src="/images/mobile/btn_close.gif" alt="" />
        </div>

		<?include $_SERVER["DOCUMENT_ROOT"]."/inc/mobile/shMypageTabMenu.php"?>

        <div style="padding:0px 10px;">
            <dl class="list_style_1">
                <dt>
                    <span class="float_left">
                        <?=$headWord?>
                    </span>
                    <span class="float_right">
                       <?=str_replace("-",".",substr($rData["regDate"],2))?>
                    </span>
                    <span style="color: #333; display: block; padding: 10px 0px 15px 0px; clear: both;"><?=$title?></span>
                    작성자 : <span class="txt_2">shinjeum</span>
                </dt>
                <dd>
                    <?=nl2br($content)?>
                </dd>
            </dl>
<?if($rData["userId"] == $_SESSION["SH_ID"]){?>

            <div style="text-align:right;padding:10px 0px 20px 0px; overflow:auto;">
                <div class="float_left">
                    <input type="button" value="수정" class="btn_7 btn_s" style="margin-right:7px;" onclick="location.href = '?com=shMypage&lnd=bEdite&idx=<?=$idx?>';" /><input type="button" value="삭제" class="btn_2 btn_s" onclick="deleteBoard('<?=$idx?>');" />
                </div>
                <div class="float_right">
                    <input type="button" value="목록으로" class="btn_8 btn_s" onclick="location.href = '?com=shMypage&lnd=bList';" />
                </div>
            </div>
<?}?>
			<?=$mList?>
            <!--<div style="border:1px solid #ccc; padding:15px 10px 10px 10px; font-size:14px; line-height:150%;">
                <div style="color:#888;">
                    <span class="float_left">[댓글2]</span>
                    <span class="float_right">15.12.10 10:00</span>
                </div>

                <p style="clear:both;margin:0px;padding-top:10px;">
                    저희 대구 천궁암을 방문해주셔서 진심으로 감사 드립니다.
                </p>
            </div>

            <div style="text-align:right;padding:10px 0px 20px 0px; overflow:auto;">
                <div class="float_left">
                    <input type="button" value="수정" class="btn_9 btn_s" style="margin-right:7px;" onclick="" /><input type="button" value="삭제" class="btn_2 btn_s" onclick="" />
                </div>
            </div>-->
			<form name="memoForm" method="post" action="?com=shMypage&pro=shMypageInfo">
			<input type="hidden" name="mode" value="memoInsert"/>
			<input type="hidden" name="memoIdx" value=""/>
			<input type="hidden" name="parentIdx" value="<?=$idx?>"/>
			<input type="hidden" name="userId" value="<?=$_SESSION["SH_ID"]?>"/>
			<input type="hidden" name="code" value="<?=$code?>"/>

            <textarea class="txtarea1" name="content"></textarea>

			</form>

            <div class="ctl_half" style="padding:10px 0px 20px 0px;">
                <div class="ctl_half_t1">
                    <input type="button" style="margin-top:10px; font-size:14px;" class="btn_3" value="수정" onclick="memoWrite();"/>
                </div>
            </div>
        </div>