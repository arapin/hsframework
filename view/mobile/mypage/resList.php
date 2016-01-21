<?
	$mypage = new Mypage();
	
	$rtnList = $mypage->getUserReservationListM($page, "idx DESC");
?>
        <div class="layer_title">
            <p>예약 확인</p>
            <input type="image" src="/images/mobile/btn_close.gif" alt="" />
        </div>

        <div style="padding:0px 10px; ">
            <dl class="list_style_1">
				<?=$rtnList?>
                <!--<dt>
                    <span class="t_cell_l lst_txt_1">
                        12월 08일 <span class="lst_txt_2">(151208001)</span>
                    </span>
                    <span class="t_cell_r">
                        예약완료
                    </span>
                </dt>
                <dd>
                    <div class="bc_photo">
                        <button style="background:url(/images/mobile/sample3_pic.jpg) no-repeat; background-size:60px 60px; border:none;" type="button" class="shop_photo"></button>
                    </div>
                    <div class="float_left">
                        <ul class="bc_lst l_style_none">
                            <li class="txt_1">천궁암</li>
                            <li>대구 천궁암 산신당</li>
                            <li>상담분야 : 사주점</li>
                            <li class="txt_3">예약일자 : 15.12.10 10:00</li>
                            <li class="txt_3">결제일자 : 15.12.08 10:00</li>
                            <li class="txt_3">결제금액 : <span class="txt_2">￦ 20,000</span> (1인)</li>
                        </ul>
                    </div>
                </dd>
                <dd>
                    <div class="table">
                        <div class="t_cell_c" style="padding-right:5px;">
                            <input type="button" value="취소하기" class="btn_7" />
                        </div>
                        <div class="t_cell_c" style="padding-left:5px;">
                            <input type="button" value="후기작성" class="btn_7" />
                        </div>
                    </div>
                </dd>



                <dt>
                    <span class="t_cell_l lst_txt_1">
                        12월 07일 <span class="lst_txt_2">(151208001)</span>
                    </span>
                    <span class="t_cell_r">
                        취소
                    </span>
                </dt>
                <dd>
                    <div class="bc_photo">
                        <button style="background:url(/images/mobile/sample3_pic.jpg) no-repeat; background-size:60px 60px; border:none;" type="button" class="shop_photo"></button>
                    </div>
                    <div class="float_left">
                        <ul class="bc_lst l_style_none">
                            <li class="txt_1">천궁암</li>
                            <li>대구 천궁암 산신당</li>
                            <li>상담분야 : 사주점</li>
                            <li class="txt_3">예약일자 : 15.12.10 10:00</li>
                            <li class="txt_3">결제일자 : 15.12.08 10:00</li>
                            <li class="txt_3">결제금액 : <span class="txt_2">￦ 40,000</span> (2인)</li>
                        </ul>
                    </div>
                </dd>

                

                <dt>
                    <span class="t_cell_l lst_txt_1">
                        12월 01일 <span class="lst_txt_2">(151208001)</span>
                    </span>
                    <span class="t_cell_r">
                        상담완료
                    </span>
                </dt>
                <dd>
                    <div class="bc_photo">
                        <button style="background:url(/images/mobile/sample3_pic.jpg) no-repeat; background-size:60px 60px; border:none;" type="button" class="shop_photo"></button>
                    </div>
                    <div class="float_left">
                        <ul class="bc_lst l_style_none">
                            <li class="txt_1">천궁암</li>
                            <li>대구 천궁암 산신당</li>
                            <li>상담분야 : 사주점</li>
                            <li class="txt_3">예약일자 : 15.12.10 10:00</li>
                            <li class="txt_3">결제일자 : 15.12.08 10:00</li>
                            <li class="txt_3">결제금액 : <span class="txt_2">￦ 20,000</span> (1인)</li>
                        </ul>
                    </div>
                </dd>
                <dd style="text-align:center;">
                    <input type="button" value="후기완료" class="btn_8" />
                </dd>-->

            </dl>

            <div class="paging_wrap">
					<?=$mypage->pageView?>
            </div>
        </div>