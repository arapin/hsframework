<?
	$shmypage = new SHMypage();

	$shamanData = array(":SHId" => $_SESSION["SH_ID"]);
	$rData = $shmypage->shamanModifyInfo($shamanData);
	$SHIdx = $rData["idx"];
	$rtnList = $shmypage->getShamanReservationList($page, "idx DESC", $SHIdx);
?>        
		<!-- 본문 시작 -->
        <div class="sub_content" style="margin-left: 0px; width: 1024px;">
            <h3 class="sub_h3">예약관리</h3>
            <ul class="l_style_left sub_site_map">
                <li>HOME >&nbsp;</li>
                <li>마이페이지 >&nbsp;</li>
                <li class="text_bold">예약관리</li>
            </ul>

            <div>
                <span class="float_right book_count">TOTAL : <?=$shmypage->totalCnt?> / PAGE : <?=$page?> / <?=$shmypage->totalPage?></span>
                
                <div style="min-height:500px;">
                    <table class="book_tskin1">
                        <thead>
                            <tr>
                                <th scope="row">예약번호</th>
                                <th scope="row">예약자명</th>
                                <th scope="row">예약분류</th>
                                <th scope="row">예약일자</th>
                                <th scope="row">결제일자</th>
                                <th scope="row">예약인원</th>
                                <th scope="row">결제금액</th>
                                <th scope="row">진행현황</th>
                                <th scope="row">취소</th>
                            </tr>
                        </thead>
                        <tbody>
						<?=$rtnList?>
                        </tbody>
                    </table>
                </div>
                <div class="paging_wrap" style="text-align:center;">
					<?=$shmypage->pageView?>
                </div>
            </div>
        </div>
        <!-- 본문 끝 -->