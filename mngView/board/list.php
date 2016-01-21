<?
	$board = new Board();

	$searchHead = Request::get('searchHead', Request::REQUEST | Request::XSS_CLEAR);
	$searchWord = Request::get('searchWord', Request::REQUEST | Request::XSS_CLEAR);

	$search = array();

	if($searchHead != ""){
		$search["searchHead"] = $searchHead;
	}

	if($searchWord != ""){
		$search["searchValue"] = $searchWord;
	}

	$rtnList = $board->boardMngList($page,"idx DESC",$code, $search);

	 switch($code){
		 case "community" : $viewTitle = "커뮤니티"; break;
		 case "oq" : $viewTitle = "조합원 가입문의"; break;
		 case "travel" : $viewTitle = "기도여행"; break;
		 case "area" : $viewTitle = "추천 기도터 굿당"; break;
		 case "join" : $viewTitle = "점집등록 방법"; break;
		 case "notice" : $viewTitle = "공지사항"; break;
		 case "search" : $viewTitle = "용한 점집 찾아보기"; break;
		 case "booking" : $viewTitle = "예약하기"; break;
		 case "con" : $viewTitle = "상담"; break;
	 }
?>
			<div class="breadcrumbs clearfix">
                <ul class="breadcrumbs left">
                    <li><a href="#">SAN SIN GAK ADMIN</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>게시판 관리</li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li><?=$viewTitle?></li>
                </ul>
				<a href="#" class="btn right" onclick="location.href='?com=board&lnd=write&code=<?=$code?>&mng=Y'"><i class="fa fa-caret-square-o-left"></i>등록</a>
            </div>
<form name="searchFrom" method="post" action="?com=board&lnd=list&mng=Y">
<input type="hidden" name="code" value="<?=$code?>" />
<input type="hidden" name="searchHead" value="<?=$searchHead?>" />
			<div class="breadcrumbs clearfix">
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
				<input type="text" value="<?=$searchWord?>" name="searchWord"/>
				<input type="button" value="검색" onclick="searchChk();"/>
<?if($search["searchValue"] != ""){?>	
				<input type="button" value="목록으로" onclick="location.href='?com=board&lnd=list&code=<?=$code?>&mng=Y'"/>
<?}?>
			</div>
</form>
			<div class="tables clearfix">
				<table class="datatable adm-table">
					<thead>
						<tr>
							<th>순번</th>
<?if($code == "community" || $code == "travel" || $code == "area"){?>
                            <th>구분</th>
<?}?>
							<th>제목<span class="order"></span></th>
							<th>등록자<span class="order"></span></th>
							<th>조회수<span class="order"></span></th>
							<th>등록일<span class="order"></span></th>
							<th>ACTIONS</th>
						</tr>
					</thead>
					<tbody>
						<?=$rtnList?>
					</tbody>
				</table>
			</div>
