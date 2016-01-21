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


	$rtnList = $aqBoard->aqBoardListM($page,$orderBy, $search);

	$getProductInfoList = $aqBoard->getProductInfoList($cate);
?>        	
		<div class="layer_title" style="background:#999; color:#fff;">
            <p>문의하기</p>
            <input type="image" src="/images/mobile/btn_close.gif" alt="" />
        </div>


        <div style="padding: 10px 10px 0px 10px;">

            <div class="review_search">
<form name="searchFrom" method="post" action="?com=aqBoard&lnd=list">
<input type="hidden" name="setOrder" value="<?=$setOrder?>"/>
<input type="hidden" name="searchState" value="<?=$searchState?>"/>
				<?if($searchValue == ""){?>
                <span id="bbsGuide" onclick="$('#bbsKeyword').focus();" style="position:absolute;height:40px; line-height:40px; font-size:14px;">제목 또는 연관키워드를 검색해주세요</span>
				<?}?>
                <div class="table" style="width:100%; height:40px;">
                    <div class="t_cell_l"><input type="text" style="width:100%;border:none;" id="bbsKeyword" onfocus="$('#bbsGuide').hide();" value="<?=$searchValue?>" name="searchValue" /></div>
                    <div class="t_cell_r" style="width:25px;padding-top:4px;"><input type="image" style="width:17px; height:19px;" src="/images/mobile/glass2.png" alt="" onclick="goSearch()"/></div>
                </div>
</form>

            </div>

            <div style="padding-top:10px; font-size:15px;">
                <select style="height:40px; border:1px solid #c3c3c3; border-radius:3px; color:#666; min-width:130px;padding-left:10px;" name="selectState" onchange="setSearchState();">
                        <option value="" >전체</option>
                        <option value="V" <?if($searchState == "V"){?>selected<?}?>>진행대기</option>
                        <option value="I" <?if($searchState == "I"){?>selected<?}?>>진행중</option>
                        <option value="C" <?if($searchState == "C"){?>selected<?}?>>채택완료</option>
                </select>
                &nbsp;&nbsp;<a class="link5" href="#none" onclick="setOrder('regDate');">최신순</a>&nbsp;&nbsp;<a class="link6" href="#none" onclick="setOrder('answerCnt');">답변수순</a>
            </div>

            <div style="padding-top:10px;text-align:right;color:#888;font-size:14px;">
                TOTAL : <?=number_format($aqBoard->totalCnt)?> / PAGE : <?=number_format($page)?>/<?=number_format($aqBoard->totalPage);?>
            </div>

            <dl class="list_style_1">
				<?=$rtnList?>
                <!--<dt>
                    <span style="color:#888;">[2]</span> 운수점
                    <span style="color:#333;display:block;margin-top:10px;">내년 2016년 제 사업운을 알고 싶습니다.</span>
                </dt>
                <dd>
                    <ul class="bc_lst l_style_none">
                        <li>답변기간 : <span class="txt_2">15.12.10 ~ 15.12.30</span></li>
                        <li>작성일 : 15.12.10</li>
                        <li>작성자 : shinjeum</li>
                        <li>답변수 : <span class="txt_2">20</span></li>
                        <li>답변채택 : <span class="txt_2">진행중</span></li>
                    </ul>
                    <div class="b_view_btn">
                        <input type="button" value="상세보기" onclick="location.href = 'qna_view.html'" />
                    </div>
                </dd>



                <dt>
                    <span style="color:#888;">[1]</span> 사주점
                    <span style="color:#333;display:block;margin-top:10px;">제 평생 사주를 알고 싶습니다.</span>
                </dt>
                <dd>
                    <ul class="bc_lst l_style_none">
                        <li>답변기간 : <span class="txt_2">15.12.10 ~ 15.12.30</span></li>
                        <li>작성일 : 15.12.10</li>
                        <li>작성자 : jeum</li>
                        <li>답변수 : <span class="txt_2">20</span></li>
                        <li>답변채택 : 완료</li>
                    </ul>
                    <div class="b_view_btn">
                        <input type="button" value="상세보기" onclick="location.href = 'qna_view.html'" />
                    </div>
                </dd>-->

            </dl>
            <div style="text-align:right; padding-top:20px;">
            <?if($_SESSION["USER_ID"] != ""){?>
                <input type="button" class="btn_1 btn_s" value="글쓰기" onclick="location.href = '?com=aqBoard&lnd=write';" style="width:80px;" />
			<?}?>
            </div>
        </div>

        <div class="paging_wrap">
				<?=$aqBoard->pageView?>
        </div>