<?
	$mypage = new Mypage();

	$rtnList = $mypage->affterMemoListM($page);
?>	
		<div class="layer_title">
            <p>내가 작성한 글</p>
            <!--<input type="image" src="/images/mobile/btn_close.gif" alt="" />-->
        </div>

		<?include $_SERVER["DOCUMENT_ROOT"]."/inc/mobile/mypageTabMenu.php"?>


        <div style="padding:0px 10px;">
            <dl class="list_style_1">
				<?=$rtnList?>
                <!--<dt>
                    <span class="float_left">
                        <span style="color:#888;">[2]</span> 천궁암 <img src="/images/mobile/star2.gif" style="vertical-align:middle;margin:-6px 0px 0px 5px; width:16px; height:15px;" /> 4.8
                    </span>
                    <span class="float_right">
                        15.12.10
                    </span>
                    <span style="color:#333;display:block;padding-top:10px;clear:both;">대구 천궁암 산신당</span>
                </dt>
                <dd>
                    <p>점집 분위기는 아늑하고 아주 깔끔해서 좋았습니다. 질문을 하면 답변을 상세하고 조목조목 알려주셨고 예방하는 방법까지 알려주셨습니다.</p>
                    <p>다음에는 지인과 다시한번 방문해보고 싶어요~</p>
                    <div style="text-align:right;margin-top:15px;">
                        <input type="button" value="수정" class="btn_7 btn_s" style="margin-right:7px;" onclick="location.href = 'mw_member2_edit.html';" /><input type="button" value="삭제" class="btn_2 btn_s" onclick="" />
                    </div>
                </dd>



                <dt>
                    <span class="float_left">
                        <span style="color:#888;">[1]</span> 청담보살 <img src="/images/mobile/star2.gif" style="vertical-align:middle;margin:-6px 0px 0px 5px; width:16px; height:15px;" /> 5.0
                    </span>
                    <span class="float_right">
                        15.12.01
                    </span>
                    <span style="color:#333;display:block;padding-top:10px;clear:both;">안산 천궁암</span>
                </dt>
                <dd>
                    <p>점 잘보고 갑니다~</p>
                    <div style="text-align:right;margin-top:15px;">
                        <input type="button" value="수정" class="btn_7 btn_s" style="margin-right:7px;" onclick="location.href = 'mw_member2_edit.html';" /><input type="button" value="삭제" class="btn_2 btn_s" onclick="" />
                    </div>
                </dd>-->

            </dl>
        </div>

        <div class="paging_wrap">
			<?=$mypage->pageView?>
        </div>