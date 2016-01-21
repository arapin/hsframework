<?
	$mypage = new Mypage();

	$rtnList = $mypage->affterMemoList($page);
?>		
		<?include $_SERVER["DOCUMENT_ROOT"]."/inc/mypageLeftMenu.php"?>

        <!-- 본문 시작 -->
        <div class="sub_content" style="width: 784px;">
            <h3 class="sub_h3">후기</h3>
            <ul class="l_style_left sub_site_map">
                <li>HOME >&nbsp;</li>
                <li>마이페이지 >&nbsp;</li>
                <li class="text_bold">후기</li>
            </ul>

            <div>
                <span class="float_right book_count">TOTAL : 3 / PAGE : 1 / 1</span>
                
                <div style="min-height:430px;">
                    <table class="book_tskin1">
                        <thead>
                            <tr>
                                <th scope="row">번호</th>
                                <th scope="row">무속인명</th>
                                <th scope="row">상호명</th>
                                <th scope="row">별점</th>
                                <th scope="row">내용</th>
                                <th scope="row">작성일</th>
                            </tr>
                        </thead>
                        <tbody>
							<?=$rtnList?>
                        </tbody>
                    </table>
                </div>
                <div class="paging_wrap" style="text-align:center;">
					<?=$mypage->pageView?>
                </div>
            </div>
        </div>
        <!-- 본문 끝 -->
