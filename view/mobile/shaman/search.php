<?
	$searchSido = Request::get('searchSido', Request::POST | Request::XSS_CLEAR);
	$searchGun = Request::get('searchGun', Request::POST | Request::XSS_CLEAR);
	$productType = Request::get('productType', Request::POST | Request::XSS_CLEAR);
	$sPrice = Request::get('sPrice', Request::POST | Request::XSS_CLEAR);
	$ePrice = Request::get('ePrice', Request::POST | Request::XSS_CLEAR);
	$searchDate = Request::get('searchDate', Request::POST | Request::XSS_CLEAR);
	$searchTime = Request::get('searchTime', Request::POST | Request::XSS_CLEAR);
	$searchWord = Request::get('searchWord', Request::POST | Request::XSS_CLEAR);
	$orderType = Request::get('orderType', Request::POST | Request::XSS_CLEAR);

	$shaman = new Shaman();

		switch($searchSido){
		case "서울특별시" : 
			$getSido = "서울";
			break;
		case "경기도" : 
			$getSido = "경기";
			break;
		case "강원도" : 
			$getSido = "강원";
			break;
		case "충청북도" : 
			$getSido = "충북";
			break;
		case "충청남도" : 
			$getSido = "충남";
			break;
		case "경상북도" : 
			$getSido = "경북";
			break;
		case "경상남도" : 
			$getSido = "경남";
			break;
		case "전라북도" : 
			$getSido = "전북";
			break;
		case "전라남도" : 
			$getSido = "전남";
			break;
		case "제주도" : 
			$getSido = "제주특별자치도";
			break;
		default : 
			$getSido = $searchSido;
			break;
	}

	switch($searchWord){
		case "서울특별시" : 
			$searchWord = "서울";
			break;
		case "경기도" : 
			$searchWord = "경기";
			break;
		case "강원도" : 
			$searchWord = "강원";
			break;
		case "충청북도" : 
			$searchWord = "충북";
			break;
		case "충청남도" : 
			$searchWord = "충남";
			break;
		case "경상북도" : 
			$searchWord = "경북";
			break;
		case "경상남도" : 
			$searchWord = "경남";
			break;
		case "전라북도" : 
			$searchWord = "전북";
			break;
		case "전라남도" : 
			$searchWord = "전남";
			break;
		case "제주도" : 
			$searchWord = "제주특별자치도";
			break;
		default : 
			$searchWord = $searchWord;
			break;
	}

	switch ($orderType){
		case "H" : 
			$searchOrderType = "a.idx DESC";
			break;
		case "P" : 
			$searchOrderType = "b.price DESC";
			break;
		case "N" : 
			$searchOrderType = "a.writeDate DESC";
			break;
		default :
			$searchOrderType = "a.idx DESC";
			break;
	}

	$searchArray = array("searchSido" => $getSido, "searchGun" => $searchGun, "productType" => $productType, "searchDate" => $searchDate, "searchTime" => $searchTime, "searchWord" => $searchWord);
	$rtnList = $shaman->getSearchSHListM($page,$searchOrderType, $searchArray);
	if($shaman->resultSIdo == ""){
		$shaman->resultSIdo = $getSido." ".$searchGun;
	}
?> 
<form name="searchFilterForm" method="post" action="?com=shaman&lnd=searchFilter">
	<input type="hidden" name="searchSido" value="<?=$searchSido?>" />
	<input type="hidden" name="searchGun" value="<?=$searchGun?>" />
	<input type="hidden" name="productType" value="<?=$productType?>" />
	<input type="hidden" name="searchDate" value="<?=$searchDate?>" />
	<input type="hidden" name="searchTime" value="<?=$searchTime?>" />
	<input type="hidden" name="searchWord" value="<?=$searchWord?>" />
</form>

		<?
			if($rtnList == ""){
				echo "
				<div style=\"background:#f9f9f9; border-bottom:1px solid #ccc; color:#888; text-align:center; height:80px; display:table; width:100%;\">
					<div style=\"display:table-cell; vertical-align:middle; font-size:14px; line-height:160%;\">
						<p style=\"margin:0px;\">검색 결과가 없습니다.</p>
						<p style=\"margin:0px;\">다시 검색해 주세요.</p>
					</div>
				</div>
				<div id=\"searchButton\" style=\"position:fixed; width:100%;\">
					<input type=\"button\" value=\"검색필터\" class=\"btn_1\" onclick=\"searchFilterGo()\" />
				</div>
				";
			}else{
				echo $rtnList;
			}
		?>

		<!-- 검색필터 버튼 시작 -->

		<!-- 검색필터 버튼 끝 -->

        <div style="color:#777;font-size:14px;padding:24px 20px 0px 20px;">
            <p>예약가능 점집 <?=$shaman->searchTotalCnt?>개 <!--중 1-18--></p>
			<?if($shaman->searchTotalCnt > 20){?>
				<button type="button" class="btn_arrow" ><img src="/images/mobile/arrow1.gif" alt="" onclick=""/></button>
			<?}?>

            <!--<div class="sl_shop_option">
                <p>
                    신점 유형 더보기 :
                    <a href="">사주점</a> ·
                    <a href="">운수점</a> ·
                    <a href="">신수점</a> ·
                    <a href="">단시점</a> ·
                    <a href="">멸액점</a> ·
                    <a href="">절초점</a> ·
                    <a href="">관송점</a> ·
                    <a href="">관운점</a> ·
                    <a href="">실물점</a> ·
                    <a href="">구심점</a>
                </p>

                <p>
                    <a href="">서울</a> ·
                    <a href="">마포구</a> ·
                    <a href="">해운대구</a> ·
                    <a href="">중구</a> ·
                    <a href="">용산구</a> 에
                    예약한 다른 회원
                </p>-->

                <p style="margin:33px 0px 30px 0px;">
                    <!--span>한국</span> &gt; 서울-->
					<?=$shaman->resultSIdo?>
                </p>
            </div>
        </div>