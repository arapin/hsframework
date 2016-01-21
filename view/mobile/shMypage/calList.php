<?
	$shmypage = new SHMypage();
	$year = Request::get('year', Request::REQUEST | Request::XSS_CLEAR);

	$orderBy = "month";
	
	if($year == ""){
		$year = date("Y");
	}

	$rtnList = $shmypage->shamanCalcListM($page, $orderBy, $year);
?>         
		<div class="layer_title">
            <p>정산 관리</p>
            <!--<input type="image" src="/images/mobile/btn_close.gif" alt="" />-->
        </div>

        <div style="padding:0px 10px 20px 10px; ">

            <div style="border:1px solid #f77; background:#f99; color:#fff; margin-top:10px; font-size:14px; padding:10px;">
                <div style="padding-bottom:9px;">※ <?=$_SESSION["SH_NAME"]?>님 <?=$year?>년 정산내역 :</div>
                <div><?=$shmypage->shCalTotalPrice?>원(<?=$shmypage->shCalTotalCnt?>건)</div>
            </div>
<form name="shCalcForm" method="post" action="">

            <div style="padding-top:9px; width:100%;" class="table">
                <div class="t_cell_c" style="width:50%; padding-right:5px;">
                    <select style="width:100%;height:35px; border:1px solid #c3c3c3;color:#666; padding-left:7px; background-color:#fff; margin-right:5px;" name="year" onchange="searchShCalc();">
<?
	$limitYear = 2026;
	for($i="2015"; $i <= $limitYear; $i++){
		if($year == $i) $selected = "selected=\"selected\"";
		else $selected = "";

		echo "<option value=\"".$i."\" ".$selected.">".$i."년</option>";
	}
?>                    </select>
                </div>
            </div>
</form>

            <dl class="list_style_1">
			<?=$rtnList?>

                <!--<dt style="padding:10px;">
                    <span class="t_cell_l lst_txt_1">
                        2016년 1월
                    </span>
                    <span class="t_cell_r">
                        <input type="button" value="상세보기" onclick="location.href = 'calc_view.html'" class="btn_2 btn_s" style="font-size:13px; color:#555; padding:5px 10px;" />
                    </span>
                </dt>
                <dd>
                    <ul class="bc_lst l_style_none">
                        <li><span style="color:#666;">정산기간</span> : <span class="txt_3">2016.01.01 ~ 2016.01.31</span></li>
                        <li><span style="color:#666;">금액</span> : <span class="txt_2">100,000원</span></li>
                        <li><span style="color:#666;">정산건수</span> : <span class="txt_3">10건</span></li>
                        <li><span style="color:#666;">지급현황</span> : <span class="txt_3">지급</span></li>
                    </ul>
                </dd>
                <dt style="padding:10px;">
                    <span class="t_cell_l lst_txt_1">
                        2016년 2월
                    </span>
                    <span class="t_cell_r">
                        <input type="button" value="상세보기" onclick="location.href = 'calc_view.html'" class="btn_2 btn_s" style="font-size:13px; color:#555; padding:5px 10px;" />
                    </span>
                </dt>
                <dd>
                    <ul class="bc_lst l_style_none">
                        <li><span style="color:#666;">정산기간</span> : <span class="txt_3">2016.01.01 ~ 2016.01.31</span></li>
                        <li><span style="color:#666;">금액</span> : <span class="txt_2">100,000원</span></li>
                        <li><span style="color:#666;">정산건수</span> : <span class="txt_3">10건</span></li>
                        <li><span style="color:#666;">지급현황</span> : <span class="txt_2">미지급</span></li>
                    </ul>
                </dd>-->

            </dl>
        </div>
        <div class="paging_wrap">
					<?=$shmypage->pageView?>
        </div>