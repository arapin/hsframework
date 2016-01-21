<?
	$shmypage = new SHMypage();
	$year = Request::get('year', Request::REQUEST | Request::XSS_CLEAR);
	$month = Request::get('month', Request::REQUEST | Request::XSS_CLEAR);
	$SHIdx = Request::get('SHIdx', Request::REQUEST | Request::XSS_CLEAR);

	$orderBy = "a.idx DESC";

	$rtnList = $shmypage->shamanCalcViewM($page, $orderBy, $year, $month, $SHIdx);
?>          
		<div class="layer_title">
            <p>정산 관리 상세 내역</p>
            <input type="image" src="/images/mobile/btn_close.gif" alt="" />
        </div>

        <div style="padding:0px 10px 20px 10px; ">

            <div style="border:1px solid #f77; background:#f99; color:#fff; margin-top:10px; font-size:14px; padding:10px;">
                <div style="padding-bottom:9px;">※ <?=$_SESSION["SH_NAME"]?>님 <?=$year?>년 <?=$month?>월 정산내역 :</div>
                <div><?=$shmypage->shCalTotalPrice?> 원(<?=$shmypage->shCalTotalCnt?>건)</div>
            </div>

            <dl class="list_style_1">
<?=$rtnList?>
                <!--<dt style="padding:10px;">
                    <span class="t_cell_l lst_txt_1">
                        2016-01-01
                    </span>
                </dt>
                <dd>
                    <ul class="bc_lst l_style_none">
                        <li><span style="color:#666;">상품분류</span> : <span class="txt_3">예약</span></li>
                        <li><span style="color:#666;">결제유저</span> : <span class="txt_3">honggildong</span></li>
                        <li><span style="color:#666;">금액</span> : <span class="txt_2">100,000원</span></li>
                        <li><span style="color:#666;">결제분류</span> : <span class="txt_3">카드</span></li>
                        <li><span style="color:#666;">결제상태</span> : <span class="txt_2">결제완료</span></li>
                    </ul>
                </dd>
                <dt style="padding:10px;">
                    <span class="t_cell_l lst_txt_1">
                        2016-01-01
                    </span>
                </dt>
                <dd>
                    <ul class="bc_lst l_style_none">
                        <li><span style="color:#666;">상품분류</span> : <span class="txt_3">예약</span></li>
                        <li><span style="color:#666;">결제유저</span> : <span class="txt_3">honggildong</span></li>
                        <li><span style="color:#666;">금액</span> : <span class="txt_2">100,000원</span></li>
                        <li><span style="color:#666;">결제분류</span> : <span class="txt_3">카드</span></li>
                        <li><span style="color:#666;">결제상태</span> : <span class="txt_2">결제완료</span></li>
                    </ul>
                </dd>-->
            </dl>
        </div>