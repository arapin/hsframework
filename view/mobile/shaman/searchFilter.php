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
	$shamanProductList = $shaman->getProductInfoList2($productType);

	if($searchWord == ""){
		if($searchSido == ""){
			//$searchSido = "서울";
		}
	}
?>
<script>
	$(function() {
		$( "#bookingDate" ).datepicker({
			dateFormat: 'yy-mm-dd',
			prevText: '이전 달',
			nextText: '다음 달',
			monthNames: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
			monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
			dayNames: ['일','월','화','수','목','금','토'],
			dayNamesShort: ['일','월','화','수','목','금','토'],
			dayNamesMin: ['일','월','화','수','목','금','토'],
			showMonthAfterYear: true,
			yearSuffix: '년'
		});

		setDepthTwoAddressMobile('<?=$searchGun?>');
	});

	function goSearchFilter(){
		var form = document.searchFilterForm;
		//form.searchWord.value = $('#searchKeyword').val();
		form.submit();
	}
</script>
<form name="searchFilterForm" method="post" action="?com=shaman&lnd=search">
	   <div class="layer_title" style="text-align:left;padding-left:20px;font-size:15px;">
            검색필터
        </div>

        <fieldset class="login_field login_field_ex">

            <div class="ctl_half">
                <div class="ctl_half_t1">
                    <input type="text" class="" placeholder="예약일" id="bookingDate" name="searchDate" value="<?=$searchDate?>"/>
                </div>
                <div class="ctl_half_t2">
                    <select style="width:100%;" name="searchTime">
						<option value="">예약 시간</option>
						<option value="08:00" <?if($searchTime == "08:00"){?>selected<?}?>>08:00</option>
						<option value="08:30" <?if($searchTime == "08:30"){?>selected<?}?>>08:30</option>
						<option value="09:00" <?if($searchTime == "09:00"){?>selected<?}?>>09:00</option>
						<option value="09:30" <?if($searchTime == "09:30"){?>selected<?}?>>09:30</option>
						<option value="10:00" <?if($searchTime == "10:00"){?>selected<?}?>>10:00</option>
						<option value="10:30" <?if($searchTime == "10:30"){?>selected<?}?>>10:30</option>
						<option value="11:00" <?if($searchTime == "11:00"){?>selected<?}?>>11:00</option>
						<option value="11:30" <?if($searchTime == "11:30"){?>selected<?}?>>11:30</option>
						<option value="12:00" <?if($searchTime == "12:00"){?>selected<?}?>>12:00</option>
						<option value="12:30" <?if($searchTime == "12:30"){?>selected<?}?>>12:30</option>
						<option value="13:00" <?if($searchTime == "13:00"){?>selected<?}?>>13:00</option>
						<option value="13:30" <?if($searchTime == "13:30"){?>selected<?}?>>13:30</option>
						<option value="14:00" <?if($searchTime == "14:00"){?>selected<?}?>>14:00</option>
						<option value="14:30" <?if($searchTime == "14:30"){?>selected<?}?>>14:30</option>
						<option value="15:00" <?if($searchTime == "15:00"){?>selected<?}?>>15:00</option>
						<option value="15:30" <?if($searchTime == "15:30"){?>selected<?}?>>15:30</option>
						<option value="16:00" <?if($searchTime == "16:00"){?>selected<?}?>>16:00</option>
						<option value="16:30" <?if($searchTime == "16:30"){?>selected<?}?>>16:30</option>
						<option value="17:00" <?if($searchTime == "17:00"){?>selected<?}?>>17:00</option>
						<option value="17:30" <?if($searchTime == "17:30"){?>selected<?}?>>17:30</option>
						<option value="18:00" <?if($searchTime == "18:00"){?>selected<?}?>>18:00</option>
						<option value="18:30" <?if($searchTime == "18:30"){?>selected<?}?>>18:30</option>
						<option value="19:00" <?if($searchTime == "19:00"){?>selected<?}?>>19:00</option>
						<option value="19:30" <?if($searchTime == "19:30"){?>selected<?}?>>19:30</option>
						<option value="20:00" <?if($searchTime == "20:00"){?>selected<?}?>>20:00</option>
						<option value="20:30" <?if($searchTime == "20:30"){?>selected<?}?>>20:30</option>
						<option value="21:00" <?if($searchTime == "21:00"){?>selected<?}?>>21:00</option>
						<option value="21:30" <?if($searchTime == "21:30"){?>selected<?}?>>21:30</option>
					</select>
                </div>
            </div>

            <select name="productType">
				<option value="">선택하세요</option>
				<?=$shamanProductList?>
            </select>
            <div class="ctl_half">
				<input type="text" class="" value="" name="searchWord" />
			</div>
            <div class="ctl_half">
                <div class="ctl_half_t1">
					<select name="searchSido" id="depthOneArea" onchange="setDepthTwoAddressMobile('<?=$searchGun?>');">
						<option value="">선택</option>
						<option value="서울" <?if($searchSido == "서울"){?>selected<?}?>>서울특별시</option>
						<option value="경기" <?if($searchSido == "경기"){?>selected<?}?>>경기도</option>
						<option value="강원" <?if($searchSido == "강원"){?>selected<?}?>>강원도</option>
						<option value="경북" <?if($searchSido == "경북"){?>selected<?}?>>경상북도</option>
						<option value="경남" <?if($searchSido == "경남"){?>selected<?}?>>경상남도</option>
						<option value="충북" <?if($searchSido == "충북"){?>selected<?}?>>충청북도</option>
						<option value="충남" <?if($searchSido == "충남"){?>selected<?}?>>충청남도</option>
						<option value="전북" <?if($searchSido == "전북"){?>selected<?}?>>전라북도</option>
						<option value="전남" <?if($searchSido == "전남"){?>selected<?}?>>전라남도</option>
						<option value="제주특별자치도" <?if($searchSido == "제주특별자치도"){?>selected<?}?>>제주특별자치도</option>
						<option value="인천" <?if($searchSido == "인천"){?>selected<?}?>>인천</option>
						<option value="대전" <?if($searchSido == "대전"){?>selected<?}?>>대전</option>
						<option value="대구" <?if($searchSido == "대구"){?>selected<?}?>>대구</option>
						<option value="부산" <?if($searchSido == "부산"){?>selected<?}?>>부산</option>
						<option value="광주" <?if($searchSido == "광주"){?>selected<?}?>>광주</option>
					</select>
                </div>
                <div class="ctl_half_t2"  id="depth2">

                </div>
            </div>

            <div class="ctl_half">
                <div class="ctl_half_t1">
                    <input type="button" style="margin-top:10px;" class="btn_2" value="취소" onclick="history.back(-1);" />
                </div>
                <div class="ctl_half_t2">
                    <input type="button" style="margin-top:10px;" class="btn_1" value="검색 필터 적용" onclick="goSearchFilter();" />
                </div>
            </div>
        </fieldset>

    </div>
</form>


	<!--
                   <div id="calendar" style="position:absolute; display:none; z-index:999; margin-top:-11px;">
                        <div class="cld_wrap">
                            <div style="position:absolute;width:280px;">
                                <input type="image" class="cld_btn" style="float:left;" src="/images/cld_prev.gif" alt="이전달" />
                                <input type="image" class="cld_btn" style="float:right;" src="/images/cld_next.gif" alt="다음달" />
                            </div>

                            <table class="cld_skin">
                                <caption>2015년 10월(OCT)</caption>
                                <thead>
                                    <tr>
                                        <th scope="col">일</th>
                                        <th scope="col">월</th>
                                        <th scope="col">화</th>
                                        <th scope="col">수</th>
                                        <th scope="col">목</th>
                                        <th scope="col">금</th>
                                        <th scope="col">토</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href=""></a></td>
                                        <td><a href=""></a></td>
                                        <td><a href=""></a></td>
                                        <td><a href=""></a></td>
                                        <td class="cld_nday cld_yday"><a href="">1</a></td>
                                        <td class="cld_nday cld_yday"><a href="">2</a></td>
                                        <td class="cld_nday cld_yday"><a href="">3</a></td>
                                    </tr>
                                    <tr>
                                        <td class="cld_nday cld_yday"><a href="">4</a></td>
                                        <td class="cld_nday cld_yday"><a href="">5</a></td>
                                        <td class="cld_nday cld_yday"><a href="">6</a></td>
                                        <td class="cld_nday cld_yday"><a href="">7</a></td>
                                        <td class="cld_nday cld_yday"><a href="">8</a></td>
                                        <td class="cld_nday cld_yday"><a href="">9</a></td>
                                        <td class="cld_nday cld_yday"><a href="">10</a></td>
                                    </tr>
                                    <tr>
                                        <td class="cld_nday cld_yday"><a href="">11</a></td>
                                        <td class="cld_nday cld_yday"><a href="">12</a></td>
                                        <td class="cld_nday cld_yday"><a href="">13</a></td>
                                        <td class="cld_nday cld_yday"><a href="">14</a></td>
                                        <td class="cld_nday cld_yday"><a href="">15</a></td>
                                        <td class="cld_nday cld_yday"><a href="">16</a></td>
                                        <td class="cld_nday cld_yday"><a href="">17</a></td>
                                    </tr>
                                    <tr>
                                        <td class="cld_nday cld_yday"><a href="">18</a></td>
                                        <td class="cld_nday cld_yday"><a href="">19</a></td>
                                        <td class="cld_nday"><a href="">20</a></td>
                                        <td class="cld_bday"><a href="">21</a></td>
                                        <td class="cld_normal"><a href="">22</a></td>
                                        <td class="cld_nday"><a href="">23</a></td>
                                        <td class="cld_nday"><a href="">24</a></td>
                                    </tr>
                                    <tr>
                                        <td class="cld_normal"><a href="">25</a></td>
                                        <td class="cld_normal"><a href="">26</a></td>
                                        <td class="cld_normal"><a href="">27</a></td>
                                        <td class="cld_normal"><a href="">28</a></td>
                                        <td class="cld_normal"><a href="">29</a></td>
                                        <td class="cld_normal"><a href="">30</a></td>
                                        <td class="cld_normal"><a href="">31</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
	-->
