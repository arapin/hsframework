<?
	$shmypage = new SHMypage();

	$orderBy = "thread";
	
	$rtnList = $shmypage->boardListM($page, $orderBy);
?>		      
		<div class="layer_title">
            <p>내가 작성한 글</p>
            <input type="image" src="/images/mobile/btn_close.gif" alt="" />
        </div>

		<?include $_SERVER["DOCUMENT_ROOT"]."/inc/mobile/shMypageTabMenu.php"?>


        <div style="padding:0px 10px;">
            <dl class="list_style_1">
				<?=$rtnList ?>
                <!--<dt>
                    <span class="float_left">
                        <span style="color:#888;">[2]</span> 추천 점집 공유
                    </span>
                    <span class="float_right">
                        15.12.10
                    </span>
                    <span style="color:#333;display:block;padding:10px 0px 15px 0px;clear:both;">점집 분위기가 아늑하고 하주 편안해요</span>
                    작성자 : shinjeum
                </dt>
                <dd>
                    <p>점집 분위기는 아늑하고 아주 깔끔해서 좋았습니다. 질문을 하면 답변을 상세하고 조목조목 알려주셨고 예방하는 방법까지 알려주셨...</p>

                    <div style="text-align:right;margin-top:15px;">
                        <input type="button" value="상세보기" class="btn_2 btn_s" onclick="location.href = 'mw_shop2_view.html';" />
                    </div>
                </dd>



                <dt>
                    <span class="float_left">
                        <span style="color:#888;">[2]</span> 나의 신점
                    </span>
                    <span class="float_right">
                        15.12.10
                    </span>
                    <span style="color: #333; display: block; padding: 10px 0px 15px 0px; clear: both;">신통하게 잘 맞추네요~</span>
                    작성자 : jeum
                </dt>
                <dd>
                    <p>저도 대구 천궁암 가서 점봤는데 잘 맞추더라구요~</p>

                    <div style="text-align:right;margin-top:15px;">
                        <input type="button" value="상세보기" class="btn_2 btn_s" onclick="location.href = 'mw_shop2_view.html';" />
                    </div>
                </dd>-->

            </dl>
        </div>

        <div class="paging_wrap">
					<?=$shmypage->pageView?>
        </div>