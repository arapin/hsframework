<?
	$aqBoard = new AqBoard();
	$searchState = Request::get('searchState', Request::REQUEST | Request::XSS_CLEAR);
	$setOrder = Request::get('setOrder', Request::REQUEST | Request::XSS_CLEAR);
	$searchValue = Request::get('searchValue', Request::REQUEST | Request::XSS_CLEAR);

	$orderBy = "idx DESC";
	if($setOrder == "regDate"){
		$orderBy = "regDate DESC";
	}else if($setOrder == "answerCnt"){
		$orderBy = "answerCnt DESC";
	}

	$search = array("searchState"=>$searchState, "searchValue"=>$searchValue);


	$rtnList = $aqBoard->aqBoardList($page,$orderBy, $search);

	$getProductInfoList = $aqBoard->getProductInfoList($cate);
?>
       <!-- 본문 시작 -->
        <div class="sub_content sub_content_max">
            <h3 class="sub_h3">문의하기</h3>
            <ul class="l_style_left sub_site_map">
                <li>HOME >&nbsp;</li>
                <li class="text_bold">문의하기</li>
            </ul>
<form name="searchFrom" method="post" action="?com=aqBoard&lnd=list">
<input type="hidden" name="setOrder" value="<?=$setOrder?>"/>
<input type="hidden" name="searchState" value="<?=$searchState?>"/>
            <div class="b_search_wrap">
                <label>
                    문의하기 검색
                    <input type="text" value="<?=$searchValue?>" name="searchValue"/>
                </label>
                <button type="button" onclick="goSearch()">
                    <img src="/images/ic_glass.png" alt="" />검색
                </button>
            </div>
</form>

            <div>
                <div class="b_list_option">
                    <select name="selectState" onchange="setSearchState();">
                        <option value="" >전체</option>
                        <option value="V" <?if($searchState == "V"){?>selected<?}?>>진행대기</option>
                        <option value="I" <?if($searchState == "I"){?>selected<?}?>>진행중</option>
                        <option value="C" <?if($searchState == "C"){?>selected<?}?>>채택완료</option>
                    </select>
                    <ul class="l_style_inline">
                        <li><a href="#none" <?if($setOrder == "regDate"){?>class="b_option_sel"<?}?> onclick="setOrder('regDate');">최신순</a></li>
                        <li><a href="#none" <?if($setOrder == "answerCnt"){?>class="b_option_sel"<?}?> onclick="setOrder('answerCnt');">답변수순</a></li>
                    </ul>
                </div>
                <span class="float_right book_count" style="margin-top:7px;">TOTAL : <?=number_format($aqBoard->totalCnt)?> / PAGE : <?=number_format($page)?> / <?=number_format($aqBoard->totalPage);?></span>
                
                <div style="min-height:430px;">
                    <table class="book_tskin1">
                        <thead>
                            <tr>
                                <th scope="row">번호</th>
                                <th scope="row">구분</th>
                                <th scope="row">제목</th>
                                <th scope="row">답변기간</th>
                                <th scope="row">작성일</th>
                                <th scope="row">작성자</th>
                                <th scope="row">답변수</th>
                                <th scope="row">진행현황</th>
                            </tr>
                        </thead>
                        <tbody>
						<?=$rtnList?>
                        </tbody>
                    </table>
                </div>

                <div class="paging_wrap">
				<?=$aqBoard->pageView?>
                </div>
            <?if($_SESSION["USER_ID"] != ""){?>
				<input type="button" value="글쓰기" onclick="showPop('write_layer2')" class="b_end_btn" style="width:100px;margin:-70px 0px 0px;"/>
			<?}?>
            </div>
        </div>
        <!-- 본문 끝 -->
