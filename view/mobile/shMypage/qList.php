<?
	$shmypage = new SHMypage();

	$rtnList = $shmypage->aqBoardListM($page, "idx DESC");
?>	        
		<div class="layer_title">
            <p>내가 작성한 글</p>
            <input type="image" src="/images/mobile/btn_close.gif" alt="" />
        </div>


		<?include $_SERVER["DOCUMENT_ROOT"]."/inc/mobile/shMypageTabMenu.php"?>


        <div style="padding:0px 10px;">
            <dl class="list_style_1">
			<?=$rtnList?>
                <!--<dt>
                    <span style="color:#888;">[2]</span> 운수점
                    <span style="color:#333;display:block;margin-top:10px;">내년 2016년 제 사업운을 알고 싶습니다.</span>
                </dt>
                <dd>
                    <ul class="bc_lst l_style_none">
                        <li>답변기간 : <span class="txt_2">15.12.10 ~ 15.12.30</span></li>
                        <li>작성일 : 15.12.10</li>
                        <li>작성자 : shinjeum</li>
                        <li>답변수 : <span class="txt_2">20</span></li>
                        <li>답변채택 : <span class="txt_2">진행중</span></li>
                    </ul>
                    <div class="b_view_btn">
                        <input type="button" value="상세보기" onclick="location.href = 'mw_shop_view.html'" />
                    </div>
                </dd>



                <dt>
                    <span style="color:#888;">[1]</span> 사주점
                    <span style="color:#333;display:block;margin-top:10px;">제 평생 사주를 알고 싶습니다.</span>
                </dt>
                <dd>
                    <ul class="bc_lst l_style_none">
                        <li>답변기간 : <span class="txt_2">15.12.10 ~ 15.12.30</span></li>
                        <li>작성일 : 15.12.10</li>
                        <li>작성자 : shinjeum</li>
                        <li>답변수 : <span class="txt_2">20</span></li>
                        <li>답변채택 : 완료</li>
                    </ul>
                    <div class="b_view_btn">
                        <input type="button" value="상세보기" onclick="location.href = 'mw_shop_view.html'" />
                    </div>
                </dd>-->

            </dl>
        </div>

        <div class="paging_wrap">
					<?=$shmypage->pageView?>
        </div>