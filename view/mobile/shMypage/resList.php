<?
	$shmypage = new SHMypage();

	$shamanData = array(":SHId" => $_SESSION["SH_ID"]);
	$rData = $shmypage->shamanModifyInfo($shamanData);
	$SHIdx = $rData["idx"];
	$rtnList = $shmypage->getShamanReservationListM($page, "idx DESC", $SHIdx);
?>
        <div class="layer_title">
            <p>예약 관리</p>
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
                    <ul class="bc_lst l_style_none">
                        <li><span style="color:#666;">예약자명</span> : <span class="txt_1">홍길동</span> (010-1234-5678)</li>
                        <li><span style="color:#666;">예약분류</span> : <span class="txt_2">사주점</span></li>
                        <li class="txt_3">예약일자 : 15.12.10 10:00</li>
                        <li class="txt_3">결제일자 : 15.12.08 10:00</li>
                        <li class="txt_3">결제금액 : <span class="txt_2">￦ 20,000</span> (1인)</li>
                    </ul>
                </dd>
                <dd>
                    <div class="table">
                        <div class="t_cell_c" style="padding-right:5px;">
                            <input type="button" value="취소하기" style="width:140px;" class="btn_7" />
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
                    <ul class="bc_lst l_style_none">
                        <li><span style="color:#666;">예약자명</span> : <span class="txt_1">홍길동</span> (010-1234-5678)</li>
                        <li><span style="color:#666;">예약분류</span> : <span class="txt_2">사주점</span></li>
                        <li class="txt_3">예약일자 : 15.12.10 10:00</li>
                        <li class="txt_3">결제일자 : 15.12.08 10:00</li>
                        <li class="txt_3">결제금액 : <span class="txt_2">￦ 20,000</span> (1인)</li>
                    </ul>
                </dd>-->

            </dl>

            <div class="paging_wrap">
					<?=$shmypage->pageView?>
            </div>