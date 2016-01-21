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
	
	$rtnList = $board->boardListM($page, $orderBy, $code, $search);
?>
        <div class="layer_title" style="background:#999; color:#fff;">
            <p>커뮤니티</p>
            <!--<input type="image" src="/images/mobile/btn_close.gif" alt="" />-->
        </div>

        <div style="padding:10px 10px 0px 10px;">
<form name="searchFrom" method="post" action="?com=board&lnd=list">
<input type="hidden" name="setOrder" value="<?=$setOrder?>"/>
<input type="hidden" name="code" value="<?=$code?>"/>
<input type="hidden" name="searchHead" value="<?=$searchHead?>"/>

            <div class="review_search">
				<?if($searchValue == ""){?>
                <span id="bbsGuide" onclick="$('#bbsKeyword').focus();" style="position:absolute;height:40px; line-height:40px; font-size:14px;">제목 또는 연관키워드를 검색해주세요</span>
				<?}?>
                <div class="table" style="width:100%; height:40px;">
                    <div class="t_cell_l"><input type="text" style="width:100%;border:none;" id="bbsKeyword" onfocus="$('#bbsGuide').hide();" value="<?=$searchValue?>" name="searchValue" /></div>
                    <div class="t_cell_r" style="width:25px;padding-top:4px;"><input type="image" style="width:17px; height:19px;" src="/images/mobile/glass2.png" onclick="goSearch();" /></div>
                </div>
            </div>
</form>

            <div style="padding-top:10px; font-size:15px;">
<?if($code == "community"){?>
                    <select style="height:40px; border:1px solid #c3c3c3; border-radius:3px; color:#666; min-width:130px;padding-left:10px;" name="selectHead" onchange="setSearchCode();">
						<option value="">전체</option>
                        <option value="이곳어때" <?if($searchHead == "이곳어때"){?>selected<?}?>>이곳어때</option>
                        <option value="잡담신설" <?if($searchHead == "잡담신설"){?>selected<?}?>>잡담신설</option>
                        <option value="신점공유" <?if($searchHead == "신점공유"){?>selected<?}?>>신점공유</option>
                        <option value="기타" <?if($searchHead == "기타"){?>selected<?}?>>기타</option>
                    </select>
<?}?>
<?if($code == "travel"){?>
                    <select style="height:40px; border:1px solid #c3c3c3; border-radius:3px; color:#666; min-width:130px;padding-left:10px;" name="selectHead" onchange="setSearchCode();">
						<option value="">전체</option>
                        <option value="당일기도" <?if($searchHead == "당일기도"){?>selected<?}?>>당일기도</option>
                        <option value="1박2일" <?if($searchHead == "1박2일"){?>selected<?}?>>1박2일</option>
                        <option value="추천기도" <?if($searchHead == "추천기도"){?>selected<?}?>>추천기도</option>
                    </select>
<?}?>
<?if($code == "area"){?>
                    <select style="height:40px; border:1px solid #c3c3c3; border-radius:3px; color:#666; min-width:130px;padding-left:10px;" name="selectHead" onchange="setSearchCode();">
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

                &nbsp;&nbsp;<a class="link5" href="#none" onclick="setOrder('regDate');">최신순</a>&nbsp;&nbsp;<a class="link6" href="#none" onclick="setOrder('mCnt');">답변수순</a>
            </div>

            <div style="padding-top:10px;text-align:right;color:#888;font-size:14px;">
                TOTAL : <?=$board->totalCnt?> / PAGE : <?=$page?>/<?=$board->totalPage?>
            </div>

            <dl class="list_style_1">
				<?=$rtnList?>
                <!--<dt>
                    <span class="float_left">
                        <span style="color:#888;">[2]</span> 추천 점집 공유
                    </span>
                    <span class="float_right">
                        15.12.10
                    </span>
                    <span style="color:#333;display:block;padding:10px 0px 15px 0px;clear:both;">점집 분위기가 아늑하고 하주 편안해요 <span class="txt_2">(20)</span></span>
                    작성자 : shinjeum
                </dt>
                <dd>
                    <p>점집 분위기는 아늑하고 아주 깔끔해서 좋았습니다. 질문을 하면 답변을 상세하고 조목조목 알려주셨고 예방하는 방법까지 알려주셨...</p>

                    <div style="text-align:right;margin-top:15px;">
                        <input type="button" value="상세보기" class="btn_2 btn_s" onclick="location.href = 'mw_shop2_view.html';" />
                    </div>
                </dd>



                <dt>
                    <span class="float_left">
                        <span style="color:#888;">[2]</span> 나의 신점
                    </span>
                    <span class="float_right">
                        15.12.10
                    </span>
                    <span style="color: #333; display: block; padding: 10px 0px 15px 0px; clear: both;">신통하게 잘 맞추네요~ <span class="txt_2">(50)</span></span>
                    작성자 : jeum
                </dt>
                <dd>
                    <p>저도 대구 천궁암 가서 점봤는데 잘 맞추더라구요~</p>

                    <div style="text-align:right;margin-top:15px;">
                        <input type="button" value="상세보기" class="btn_2 btn_s" onclick="location.href = 'mw_shop2_view.html';" />
                    </div>
                </dd>-->

            </dl>

            <div style="text-align:right; padding-top:20px;">
<?if($_SESSION["USER_ID"] != "" || $_SESSION["SH_ID"] != "" ){?>

                <input type="button" class="btn_1 btn_s" value="글쓰기" style="width:80px;" onclick="location.href = '?com=board&lnd=write&code=<?=$code?>'"/>
<?}?>

            </div>
        </div>

        <div class="paging_wrap">
					<?=$board->pageView?>
        </div>