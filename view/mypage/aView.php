<?
	$mypage = new Mypage();
	$idx = Request::get('idx', Request::REQUEST | Request::XSS_CLEAR);

	$aqBeen = array(":idx" => $idx);
	$rtnData = $mypage->getAffterMemoModifyInfo($aqBeen);
?>		
		<?include $_SERVER["DOCUMENT_ROOT"]."/inc/mypageLeftMenu.php"?>
<script>
	function viewModify(vType){
		if(vType == 'modify'){
			$('#submitModify').show();
			$('#writeArea').show();
			$('#cancelBtn').show();
			$('#viewArea').hide();
			$('#setModify').hide();
		}else{
			$('#submitModify').hide();
			$('#writeArea').hide();
			$('#cancelBtn').hide();
			$('#viewArea').show();
			$('#setModify').show();
		}
	}
</script>
        <!-- 본문 시작 -->
        <div class="sub_content" style="width: 784px;">
            <h3 class="sub_h3">후기</h3>
            <ul class="l_style_left sub_site_map">
                <li>HOME >&nbsp;</li>
                <li>마이페이지 >&nbsp;</li>
                <li class="text_bold">후기</li>
            </ul>

            <h4 class="board_view_title"><img src="/images/li1.gif" alt="" />글보기</h4>
            <input type="button" class="b_list_btn float_right" style="margin:30px 0px 0px 0px;" value="목록으로" onclick="location.href = '?com=mypage&lnd=aList';" />

            <dl class="board_view">
<form name="modifyForm" method="post" action="?com=mypage&pro=mypageinfo">
<input type="hidden" name="mode" value="memoModify" />
<input type="hidden" name="idx" value="<?=$idx?>" />
                <dt style="padding-top:17px;">
                    <!--<span class="board_view_txt1">[사업]</span>-->
                    <span class="board_view_txt2"><?=$rtnData["name"]?> / <?=$rtnData["SHName"]?><span class="b_view_score"><img src="/images/star.gif" alt="" /><?=$rtnData["totalScore"]?></span></span><br />
                    <span class="float_left" style="font-size:13px;padding-top:5px;">
                        <?=$rtnData["writeDate"]?>
                    </span>
                </dt>
                <dd style="min-height:80px;border-bottom:none;" id="viewArea">
					<?=nl2br($rtnData["memo"])?>
				</dd>
                <dd style="min-height:80px;border-bottom:none;display:none" id="writeArea">
                    <textarea name="memo"><?=$rtnData["memo"]?></textarea>
                </dd>
</form>
            </dl>

            <div style="text-align:center; padding:5px 0px 60px 0px;">
                <input type="button" value="수정" onclick="viewModify('modify');" class="b_end_btn" style="float:none;margin:0px 3px 0px 0px; width:80px;" id="setModify" />
                <input type="button" value="작성완료" onclick="memoModifyChk();" class="b_write_btn" style="float:none;margin:0px 3px 0px 0px; width:80px;display:none" id="submitModify"/>
                <input type="button" value="취소" class="b_select_btn" style="float:none;margin:0px;width:80px;display:none" onclick="viewModify('view');" id="cancelBtn"/>
            </div>
            <input type="button" value="목록으로" class="float_right b_list_btn" style="margin-top:-90px;" onclick="location.href = '?com=mypage&lnd=aList';" />
        </div>
        <!-- 본문 끝 -->