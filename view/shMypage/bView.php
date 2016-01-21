<?
	$shmypage = new SHMypage();

	$idx = Request::get('idx', Request::REQUEST | Request::XSS_CLEAR);
	$code = Request::get('code', Request::REQUEST | Request::XSS_CLEAR);
	$boardBeen = array(":idx" => $idx);

	$rData = $shmypage->boardModifyInfo($boardBeen);

	$memoBeen = array(":parentIdx" => $idx);

	$mList = $shmypage->getMemoList($memoBeen);
	$title = $rData["title"];
	$content = $rData["content"];
	$headWord = $rData["headWord"];
?> 
		<?include $_SERVER["DOCUMENT_ROOT"]."/inc/mypageLeftMenu.php"?>

		<!-- 본문 시작 -->
        <div class="sub_content" style="width: 784px; min-height:650px;">
            <h3 class="sub_h3">커뮤니티</h3>
            <ul class="l_style_left sub_site_map">
                <li>HOME >&nbsp;</li>
                <li>마이페이지 >&nbsp;</li>
                <li class="text_bold">커뮤니티</li>
            </ul>

            <h4 class="board_view_title"><img src="/images/li1.gif" alt="" />글보기</h4>
            <input type="button" class="b_list_btn float_right" style="margin:30px 0px 0px 0px;" value="목록으로" onclick="location.href = 'com=shMypage&lnd=bList>';" />

            <dl class="board_view">
                <dt style="padding-top:17px;">
                    <span class="board_view_txt1">[<?=$headWord?>]</span>
                    <span class="board_view_txt2"><?=$title?></span><br />
                    <span class="float_left" style="font-size:14px;padding-top:5px;">
                        <span class="board_view_txt5"><?=$rData["userId"]?></span>&nbsp;&nbsp;|&nbsp;&nbsp;<?=str_replace("-",".",substr($rData["regDate"],2))?>
                    </span>
                </dt>
                <dd style="min-height:80px;border-bottom:none;">
                    <?=nl2br($content)?>
                </dd>
            </dl>

            <div style="text-align:center; padding:5px 0px 0px 0px;">
<?if($rData["userId"] == $_SESSION["SH_ID"]){?>
                <input type="button" value="수정" onclick="showPop();" class="b_end_btn" style="float:none;margin:0px 3px 0px 0px; width:80px;" />
                <input type="button" value="삭제" class="b_select_btn" style="float:none;margin:0px;width:80px;" onclick="deleteBoard('<?=$idx?>');"/>
<?}?>
            </div>
            

            <dl class="board_replay board_replay_ex">
				<?=$mList?>
            </dl>
			
			<form name="memoForm" method="post" action="?com=shMypage&pro=shMypageInfo">
			<input type="hidden" name="mode" value="memoInsert"/>
			<input type="hidden" name="memoIdx" value=""/>
			<input type="hidden" name="parentIdx" value="<?=$idx?>"/>
			<input type="hidden" name="userId" value="<?=$_SESSION["SH_ID"]?>"/>
			<input type="hidden" name="code" value="<?=$code?>"/>
            <div class="b_comment_edit">
                <textarea name="content"></textarea>
            </div>
			</form>
            <div style="text-align:center;padding-bottom:40px;">
<?if($_SESSION["SH_ID"] != ""){?>
                <input type="button" class="b_write_btn b_write_btn_ex" style="margin-right:3px;" value="등록" onclick="memoWrite();"/>
                <!--<input type="button" class="b_select_btn b_select_btn_ex2" value="취소" />-->
<?}?>
            </div>

            <input type="button" value="목록으로" class="float_right b_list_btn" style="margin-top:-70px;" onclick="location.href = '?com=shMypage&lnd=bList';" />
        </div>
        <!-- 본문 끝 -->