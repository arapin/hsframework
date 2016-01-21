<?
	$shmypage = new SHMypage();
	$year = Request::get('year', Request::REQUEST | Request::XSS_CLEAR);

	$orderBy = "month";
	
	if($year == ""){
		$year = date("Y");
	}

	$rtnList = $shmypage->shamanCalcList($page, $orderBy, $year);
?> 
		<!-- 본문 시작 -->
        <div class="sub_content" style="margin-left: 0px; width: 1024px;">
            <h3 class="sub_h3">정산관리</h3>
            <ul class="l_style_left sub_site_map">
                <li>HOME >&nbsp;</li>
                <li>마이페이지 >&nbsp;</li>
                <li class="text_bold">정산관리</li>
            </ul>

            <div style="padding-top:25px;">
               <p style="border:1px solid #f77;background:#f99; color:#fff; height:40px; line-height:40px; padding:0px 10px; box-sizing:border-box;margin:0px; font-size:15px;">
                    ※ <?=$_SESSION["SH_NAME"]?>님 <?=$year?>년 정산상세내역 : <?=$shmypage->shCalTotalPrice?>원(<?=$shmypage->shCalTotalCnt?>건)
                </p>
<form name="shCalcForm" method="post" action="">
                <div class="float_left" style="padding:9px 0px;">
                    <select style="width:93px;height:35px; border:1px solid #c3c3c3;color:#666; padding-left:7px; background-color:#fff; margin-right:5px; font-size:14px;" name="year" onchange="searchShCalc();">
<?
	$limitYear = 2026;
	for($i="2015"; $i <= $limitYear; $i++){
		if($year == $i) $selected = "selected=\"selected\"";
		else $selected = "";

		echo "<option value=\"".$i."\" ".$selected.">".$i."년</option>";
	}
?>
                    </select>
                </div>
</form>

                <div style="min-height:500px;">
                    <table class="book_tskin1">
                        <thead>
                            <tr>
                                <th scope="row">년도</th>
                                <th scope="row">월</th>
                                <th scope="row">정산기간</th>
                                <th scope="row">금액</th>
                                <th scope="row">정산건수</th>
                                <th scope="row">지급현황</th>
                            </tr>
                        </thead>
                        <tbody>
						<?=$rtnList?>
                            <!--<tr>
                                <td>2016년</td>
                                <td style="color:#333;"><a href="calc_view.html" style="text-decoration:none; color:#333;">1월</a></td>
                                <td>2016.01.01~2016.01.31</td>
                                <td class="btskin_txt2">\100,000</td>
                                <td>10건</td>
                                <td>지급</td>
                            </tr>
                            <tr>
                                <td>2016년</td>
                                <td style="color:#333;"><a href="calc_view.html" style="text-decoration:none; color:#333;">2월</a></td>
                                <td>2016.02.01~2016.02.31</td>
                                <td class="btskin_txt2">\100,000</td>
                                <td>10건</td>
                                <td class="btskin_txt2">미지급</td>
                            </tr>-->
                        </tbody>
                    </table>
                </div>
                <div class="paging_wrap" style="text-align:center;">
					<?=$shmypage->pageView?>
                </div>
            </div>
        </div>
        <!-- 본문 끝 -->