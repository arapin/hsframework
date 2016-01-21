<?
	$shmypage = new SHMypage();
	$year = Request::get('year', Request::REQUEST | Request::XSS_CLEAR);
	$month = Request::get('month', Request::REQUEST | Request::XSS_CLEAR);
	$SHIdx = Request::get('SHIdx', Request::REQUEST | Request::XSS_CLEAR);

	$orderBy = "a.idx DESC";

	$rtnList = $shmypage->shamanCalcView($page, $orderBy, $year, $month, $SHIdx);
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
                    ※ <?=$_SESSION["SH_NAME"]?>님 <?=$year?>년 <?=$month?>월 정산상세내역 : <?=$shmypage->shCalTotalPrice?>원(<?=$shmypage->shCalTotalCnt?>건)

                </p>
                
                <div style="min-height:500px; margin-top:20px;">
                    <table class="book_tskin1">
                        <thead>
                            <tr>
                                <th scope="row">결제일자</th>
                                <th scope="row">상품분류</th>
                                <th scope="row">결제유저</th>
                                <th scope="row">결제금액</th>
                                <th scope="row">결제분류</th>
                                <th scope="row">결제상태</th>
                            </tr>
                        </thead>
                        <tbody>
<?=$rtnList?>
                            <!--<tr>
                                <td>2016-01-01</td>
                                <td style="color:#333;">예약</td>
                                <td>honggildong</td>
                                <td class="btskin_txt2">\20,000</td>
                                <td>카드</td>
                                <td class="btskin_txt2">결제완료</td>
                            </tr>
                            <tr>
                                <td>2016-01-01</td>
                                <td style="color:#333;">예약</td>
                                <td>honggildong</td>
                                <td class="btskin_txt2">\20,000</td>
                                <td>카드</td>
                                <td class="btskin_txt2">결제완료</td>
                            </tr>
                            <tr>
                                <td>2016-01-01</td>
                                <td style="color:#333;">예약</td>
                                <td>honggildong</td>
                                <td class="btskin_txt2">\20,000</td>
                                <td>카드</td>
                                <td class="btskin_txt2">결제완료</td>
                            </tr>
                            <tr>
                                <td>2016-01-01</td>
                                <td style="color:#333;">예약</td>
                                <td>honggildong</td>
                                <td class="btskin_txt2">\20,000</td>
                                <td>카드</td>
                                <td class="btskin_txt2">결제완료</td>
                            </tr>
                            <tr>
                                <td>2016-01-01</td>
                                <td style="color:#333;">예약</td>
                                <td>honggildong</td>
                                <td class="btskin_txt2">\20,000</td>
                                <td>카드</td>
                                <td class="btskin_txt2">결제완료</td>
                            </tr>-->
                        </tbody>
                    </table>

                    <div style="text-align:center;margin-top:20px;">
                        <input type="button" value="목록으로" class="b_list_btn" onclick="location.href='?com=shMypage&lnd=calList&year=<?=$year?>'"/>
                    </div>
                </div>
            </div>
        </div>
        <!-- 본문 끝 -->