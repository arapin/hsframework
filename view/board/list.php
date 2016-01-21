<?
	$board = new Board();

	$setOrder = Request::get('setOrder', Request::REQUEST | Request::XSS_CLEAR);
	$searchHead = Request::get('searchHead', Request::REQUEST | Request::XSS_CLEAR);
	$searchValue = Request::get('searchValue', Request::REQUEST | Request::XSS_CLEAR);

	$orderBy = "thread";
	if($setOrder == "regDate"){
		$orderBy = "regDate DESC";
	}else if($setOrder == "mCnt"){
		$orderBy = "mCnt DESC";
	}
	
	$search = array("searchHead"=>$searchHead, "searchValue"=>$searchValue);
	
	$rtnList = $board->boardList($page, $orderBy, $code, $search);
?>
	   <!-- 본문 시작 -->
        <div class="sub_content sub_content_max">
            <h3 class="sub_h3"><?=$viewTitle?></h3>
            <ul class="l_style_left sub_site_map">
                <li>HOME >&nbsp;</li>
                <li class="text_bold"><?=$viewTitle?></li>
            </ul>
<form name="searchFrom" method="post" action="?com=board&lnd=list">
<input type="hidden" name="setOrder" value="<?=$setOrder?>"/>
<input type="hidden" name="code" value="<?=$code?>"/>
<input type="hidden" name="searchHead" value="<?=$searchHead?>"/>
            <div class="b_search_wrap">
                <label>
                    <?=$viewTitle?> 검색
                    <input type="text" value="<?=$searchValue?>" name="searchValue" />
                </label>
                <button type="button" onclick="goSearch();">
                    <img src="/images/ic_glass.png" alt="" />검색
                </button>
            </div>
</form>

            <div>
                <div class="b_list_option">
<?if($code == "community"){?>
                    <select name="selectHead" onchange="setSearchCode();">
						<option value="">전체</option>
                        <option value="이곳어때" <?if($searchHead == "이곳어때"){?>selected<?}?>>이곳어때</option>
                        <option value="잡담신설" <?if($searchHead == "잡담신설"){?>selected<?}?>>잡담신설</option>
                        <option value="신점공유" <?if($searchHead == "신점공유"){?>selected<?}?>>신점공유</option>
                        <option value="기타" <?if($searchHead == "기타"){?>selected<?}?>>기타</option>
                    </select>
<?}?>
<?if($code == "travel"){?>
                    <select name="selectHead" onchange="setSearchCode();">
						<option value="">전체</option>
                        <option value="당일기도" <?if($searchHead == "당일기도"){?>selected<?}?>>당일기도</option>
                        <option value="1박2일" <?if($searchHead == "1박2일"){?>selected<?}?>>1박2일</option>
                        <option value="추천기도" <?if($searchHead == "추천기도"){?>selected<?}?>>추천기도</option>
                    </select>
<?}?>
<?if($code == "area"){?>
                    <select name="selectHead" onchange="setSearchCode();">
						<option value="">전체</option>
                        <option value="서울" <?if($searchHead == "서울"){?>selected<?}?>>서울</option>
                        <option value="경기" <?if($searchHead == "경기"){?>selected<?}?>>경기</option>
                        <option value="충청남도" <?if($searchHead == "충청남도"){?>selected<?}?>>충청남도</option>
                        <option value="충청북도" <?if($searchHead == "충청북도"){?>selected<?}?>>충청북도</option>
                        <option value="강원도" <?if($searchHead == "강원도"){?>selected<?}?>>강원도</option>
                        <option value="경상남도" <?if($searchHead == "경상남도"){?>selected<?}?>>경상남도</option>
                        <option value="경상북도" <?if($searchHead == "경상북도"){?>selected<?}?>>경상북도</option>
                        <option value="전라남도" <?if($searchHead == "전라남도"){?>selected<?}?>>전라남도</option>
                        <option value="전라북도" <?if($searchHead == "전라북도"){?>selected<?}?>>전라북도</option>
                        <option value="제주도" <?if($searchHead == "제주도"){?>selected<?}?>>제주도</option>
                        <option value="인천" <?if($searchHead == "인천"){?>selected<?}?>>인천</option>
                        <option value="대전" <?if($searchHead == "대전"){?>selected<?}?>>대전</option>
                        <option value="대구" <?if($searchHead == "대구"){?>selected<?}?>>대구</option>
                        <option value="부산" <?if($searchHead == "부산"){?>selected<?}?>>부산</option>
                        <option value="광주" <?if($searchHead == "광주"){?>selected<?}?>>광주</option>
                        <option value="그 외 지역" <?if($searchHead == "그 외 지역"){?>selected<?}?>>그 외 지역</option>
                        <option value="해외" <?if($searchHead == "해외"){?>selected<?}?>>해외</option>
                    </select>
<?}?>
                    <ul class="l_style_inline">
                        <li><a href="#none" <?if($setOrder == "regDate"){?>class="b_option_sel"<?}?> onclick="setOrder('regDate');">최신순</a></li>
                        <li><a href="#none" <?if($setOrder == "mCnt"){?>class="b_option_sel"<?}?> onclick="setOrder('mCnt');">답변수순</a></li>
                    </ul>
                </div>
                <span class="float_right book_count" style="margin-top:7px;">TOTAL : <?=$board->totalCnt?> / PAGE : <?=$page?> / <?=$board->totalPage?></span>
                
                <div style="min-height:430px;">
                    <table class="book_tskin1">
                        <thead>
                            <tr>
                                <th scope="row">번호</th>
<?if($code == "community" || $code == "travel" || $code == "area"){?>
                                <th scope="row">구분</th>
<?}?>
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

                <div class="paging_wrap">
					<?=$board->pageView?>
                </div>
<?if($_SESSION["USER_ID"] != "" || $_SESSION["SH_ID"] != "" ){?>
<?if($code != "join"){?>
                <input type="button" class="b_end_btn" value="글쓰기" onclick="showPop('write_layer2')" 
				style="width:100px;margin:-70px 0px 0px;" />
<?}?>
<?}?>
            </div>
        </div>
        <!-- 본문 끝 -->