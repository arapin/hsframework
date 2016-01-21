<?
	$mypage = new Mypage();
	$cate = Request::get('cate', Request::REQUEST | Request::XSS_CLEAR);

	$rtnList = $mypage->aqBoardList($page,"regDate DESC");
?>		
		<?include $_SERVER["DOCUMENT_ROOT"]."/inc/mypageLeftMenu.php"?>
		
		<!-- 본문 시작 -->
        <div class="sub_content" style="width: 784px;">
            <h3 class="sub_h3">문의하기</h3>
            <ul class="l_style_left sub_site_map">
                <li>HOME >&nbsp;</li>
                <li>마이페이지 >&nbsp;</li>
                <li class="text_bold">문의하기</li>
            </ul>

            <div>
                <span class="float_right book_count">TOTAL : <?=number_format($mypage->totalCnt)?> / PAGE : <?=number_format($page)?> / <?=number_format($mypage->totalPage);?></span>
                
                <div style="min-height:430px;">
                    <table class="book_tskin1">
                        <thead>
                            <tr>
                                <th scope="row">번호</th>
                                <th scope="row">구분</th>
                                <th scope="row">제목</th>
                                <th scope="row">답변기간</th>
                                <th scope="row">작성일</th>
                                <th scope="row">답변수</th>
                                <th scope="row">진행현황</th>
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