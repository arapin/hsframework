<?
	$shmypage = new SHMypage();

	$orderBy = "thread";
	
	$rtnList = $shmypage->boardList($page, $orderBy);
?>		
		<?include $_SERVER["DOCUMENT_ROOT"]."/inc/shMypageLeftMenu.php"?>
		<!-- 본문 시작 -->
        <div class="sub_content" style="width: 784px;">
            <h3 class="sub_h3">커뮤니티</h3>
            <ul class="l_style_left sub_site_map">
                <li>HOME >&nbsp;</li>
                <li>마이페이지 >&nbsp;</li>
                <li class="text_bold">커뮤니티</li>
            </ul>

            <div>
                <span class="float_right book_count">TOTAL : <?=$shmypage->totalCnt?> / PAGE : <?=$page?> / <?=$shmypage->totalPage?></span>
                
                <div style="min-height:430px;">
                    <table class="book_tskin1">
                        <thead>
                            <tr>
                                <th scope="row">번호</th>
                                <th scope="row">구분</th>
                                <th scope="row">제목</th>
                                <th scope="row">작성자</th>
                                <th scope="row">작성일</th>
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