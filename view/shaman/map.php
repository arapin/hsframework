<?
	$shaman = new Shaman();
	$shamanProductList = $shaman->getProductInfoList();

	$searchSido = Request::get('searchSido', Request::GET | Request::XSS_CLEAR);
	$searchDate = Request::get('searchDate', Request::GET | Request::XSS_CLEAR);

	if($searchWord == ""){
		if($searchSido == ""){
			$searchSido = "서울특별시";
		}
	}
?>
<style type="text/css">
   .makerTitle { background-color:#d1d1d1; font-family: Arial; font-size: 12px; font-weight: bold; text-align: center;}
   .makerContent { background-color:#e7d2ff; font-family: Arial; font-size: 11px;}
	a:link     {color:#000000;text-decoration:none}
	a:visited  {color:#000000;text-decoration:none}
	a:active   {color:#000000;text-decoration:none}
	a:hover    {color:#000000;text-decoration:none}
</style>
<script type="text/javascript">
	$(function() {
		$( "#bookingDate" ).datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: 'yy-mm-dd',
			prevText: '이전 달',
			nextText: '다음 달',
			monthNames: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
			monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
			dayNames: ['일','월','화','수','목','금','토'],
			dayNamesShort: ['일','월','화','수','목','금','토'],
			dayNamesMin: ['일','월','화','수','목','금','토'],
			showMonthAfterYear: true,
			yearSuffix: '년',
			beforeShow: function() {
				setTimeout(function(){
					$('.ui-datepicker').css('z-index', 99999999999999);
				}, 0);
			}
		});

		$( "#slider-range" ).slider({
			range: true,
			min: 0,
			max: 200000,
			values: [ 0, 100000 ],
			slide: function( event, ui ) {
				$( "#amount" ).val( "￦" + number_format(ui.values[ 0 ]) + " - ￦ " + number_format(ui.values[ 1 ] ));
				document.searchForm.sPrice.value = ui.values[ 0 ];
				document.searchForm.ePrice.value = ui.values[ 1 ];
			}
		});
		$( "#amount" ).val( " ￦ " + number_format($( "#slider-range" ).slider( "values", 0 )) +
		" - ￦ " + number_format($( "#slider-range" ).slider( "values", 1 )) );

		setDepthTwoAddress();
		getList();

<?if($searchSido != "" || $searchWord != ""){?>
		setTimeout(function() {
			setGoogleMap('search');
		}, 500);
<?}else{?>
		setTimeout(function() {
			setGoogleMap('frist');
		}, 500);
<?}?>

	});

function getList(){
	var param = $("#searchForm").serialize();
	console.log( document.searchForm.searchSido.value );
	console.log( document.searchForm.searchGun.value );

	$.ajax({
		url : '/view/searchList.php',
		data : param,
		type : 'post',
		async:false,
		success : function(data){
			$('#searchValue').html(data);
		},
		error : function(){
			alert('통신 에러 입니다.');
		}
	});
}

function getMarkers(){
	var param = $("#searchForm").serialize().replace(/%/g,'%25');
	var returnData = "";
	$.ajax({
		url : '/view/searchMarker.php',
		data : param,
		type : 'post',
		async:false,
		contentType: "application/x-www-form-urlencoded; charset=UTF-8", 
		dataType: "text",
		success : function(data){
			returnData = data;
		},
		error : function(){
			alert('통신 에러 입니다.');
		}
	});

	return returnData;
}

function setGoogleMap(fristType){
	document.searchForm.searchSido.value = $('select[name=depthOneArea] > option:selected').val();
	document.searchForm.searchGun.value = $('select[name=depthTwoArea] > option:selected').val();
	if(fristType != 'frist'){
		//document.searchForm.searchWord.value = $('#txtKeyword').val();
	}
	if(fristType == "select"){
		document.searchForm.searchWord.value = "";
	}
	var address = $('select[name=depthOneArea] > option:selected').val() + ' ' + $('select[name=depthTwoArea] > option:selected').val();
	var mapCenter = '';
	var data1 = '';
	var data2 = '';
	console.log( "address : " + address );

	//var markers = getMarkers();
	//markers = eval(markers);
	geocoder = new google.maps.Geocoder();
	geocoder2 = new google.maps.Geocoder();
	geocoder.geocode( { 'address': address, 'region': 'uk'}, function(results, status) {
	  if (status == google.maps.GeocoderStatus.OK) {
			data1 = results[0].geometry.location.lat();
			data2 = results[0].geometry.location.lng();
	console.log( "lat : " + data1 );
	console.log( "lng : " + data2 );

			mapCenter = new google.maps.LatLng(data1, data2);

			if(fristType != 'frist'){
				//setAddress(mapCenter);
			}

			var mapOptions = {
				center: mapCenter,
				zoom: 13,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};
			var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);

			setMarkers(map);
			//getList();

			map.addListener('center_changed', function(event) {
				geocoder2.geocode(
					{
						'latLng' : map.getCenter()
					},
					function (results, status){
						if(status == google.maps.GeocoderStatus.OK){
							var centerAddress = results[0].formatted_address;
							if(centerAddress != ""){
								var arrayAddress = centerAddress.split(' ');

									//console.log( arrayAddress[1] );
									//console.log( $('select[name=depthOneArea]').html() );
									//console.log( $('select[name=depthOneArea] > option[text="'+arrayAddress[1]+'"]').size() );

								if(fristType != 'frist'){
									var selectedBol = false;

									$('select[name=depthOneArea] > option').each(function () {
										if ($.trim($(this).text()) == $.trim(arrayAddress[1])) {
											$(this).prop('selected', true);
										}
									});

									setDepthTwoAddress(function () {
									
										setArea = arrayAddress[2];
										var Objs = $('select[name=depthTwoArea] option');
										for(i=0;i<Objs.length;i++){
											if(Objs.eq(i).text() == setArea){
												selectedBol = true;
											}
										}
										
										if(!selectedBol){
											setArea = arrayAddress[2] + ' ' + arrayAddress[3];

											for(i=0;i<Objs.length;i++){
												if(Objs.eq(i).text() == setArea){
													selectedBol = true;
												}
											}
										}
										
										//if(selectedBol){
											//setArea = arrayAddress[2];
											//document.searchForm.searchWord.value = '';

											document.searchForm.searchSido.value = arrayAddress[1];
											document.searchForm.searchGun.value = setArea;

											//clearMarkers() 
											setMarkers(map);
											getList();

										//}


									});

								}
							}
							//$('#currentAddress').html(arrayAddress[1] + ' ' + arrayAddress[2]);
						}
						if (status === google.maps.GeocoderStatus.OVER_QUERY_LIMIT) {  
							//alert('OVER_QUERY_LIMIT');				
							setTimeout(function() {
								//setAddress(mapCenter);
							}, 200);
						}
					}
				);

			});

	  } else {
		"Geocode was not successful for the following reason: " + status;
	  }
	});
}

function setAddress(latLng){
	geocoder = new google.maps.Geocoder();
	geocoder.geocode(
		{
			'latLng' : latLng
		},
		function (results, status){
			if(status == google.maps.GeocoderStatus.OK){
				var centerAddress = results[0].formatted_address;
	console.log( "centerAddress : " + centerAddress );

				var arrayAddress = centerAddress.split(' ');
				var selectedBol = false;

				$('select[name=depthOneArea] > option').each(function () {
					if ($.trim($(this).text()) == $.trim(arrayAddress[1])) {
						$(this).prop('selected', true);
					}
				});

				setDepthTwoAddress(function () {
				
					setArea = arrayAddress[2];
					var Objs = $('select[name=depthTwoArea] option');
					for(i=0;i<Objs.length;i++){
						if(Objs.eq(i).val() == setArea){
							Objs.eq(i).prop('selected', true);
							selectedBol = true;
						}
					}
					
					if(!selectedBol){
						setArea = arrayAddress[2] + ' ' + arrayAddress[3];

						for(i=0;i<Objs.length;i++){
							if(Objs.eq(i).val() == setArea){
								Objs.eq(i).prop('selected', true);
								selectedBol = true;
							}
						}
					}
					
					//if(selectedBol){
						//setArea = arrayAddress[2];
						document.searchForm.searchSido.value = arrayAddress[1];
						document.searchForm.searchGun.value = setArea;
															//console.log("setAddress : " + setArea);

						//clearMarkers() 
						//setMarkers(map);
						//getList();
					//}


				});

				/*수정*/
				/*setDepthTwoAddress();

				setArea = arrayAddress[2];
				var Objs = $('select[name=depthTwoArea] option');
				for(i=0;i<Objs.length;i++){
					if(Objs.eq(i).text() == setArea){
						selectedBol = true;
					}
				}
				
				if(!selectedBol){
					setArea = arrayAddress[2] + ' ' + arrayAddress[3];

					for(i=0;i<Objs.length;i++){
						if(Objs.eq(i).text() == setArea){
							selectedBol = true;
						}
					}
				}

				//setArea = arrayAddress[2];
				//if(selectedBol){
					document.searchForm.searchSido.value = arrayAddress[1];
					document.searchForm.searchGun.value = setArea;
					getList();/*
				//}
				//$('#currentAddress').html(arrayAddress[1] + ' ' + arrayAddress[2]);
				/*수정*/
			}
			if (status === google.maps.GeocoderStatus.OVER_QUERY_LIMIT) {   
				//alert('OVER_QUERY_LIMIT');
				setTimeout(function() {
					//setAddress(latLng);
				}, 200);
			}
		}
	);
}

function setDepthTwoAddress(callback){
	var address = $('select[name=depthOneArea] > option:selected').val();
	$.ajax({
		url : '/?com=shaman&pro=shamaninfo&mode=zipTwoSearch',
		data : {'sido':address},
		type : 'post',
		async:false,
		success : function(data){
			//alert(data);
			$('#depth2').html(data);

			if (callback != undefined) {
				callback();
			}

		},
		error : function(){
			alert('통신 에러 입니다.');
		}
	});
}

function setSearchWord(){
	document.searchForm.searchWord.value = $('#searchWord2').val();
	//console.log( document.searchForm.searchWord.value );

}

function setSelectAddress(){
	var getSido = $('select[name=depthOneArea] option:selected').val();
	var getGugun = $('select[name=depthTwoArea] option:selected').val();

	document.searchForm.searchSido.value = getSido;
	document.searchForm.searchGun.value = getGugun;
	document.searchForm.searchWord.value = $('#searchWord2').val();

	/*console.log( document.searchForm.searchSido.value );
	console.log( document.searchForm.searchGun.value );
	console.log( document.searchForm.searchWord.value );*/

	getList();
	setGoogleMap('select');

}

function setMarkers(map){
	var markers = getMarkers();
	//console.log( "markers" + markers );

	markers = eval(markers);
	
	var infoWindow = new google.maps.InfoWindow();
	for (i = 1; i <= markers.length; i++) {
		var data = markers[i-1];
		var myLatlng = new google.maps.LatLng(data.lat, data.lng);
	   
		var marker = new MarkerWithLabel({
			position: myLatlng,
			map: map,
			title: data.title,
			//labelContent: i,
			labelAnchor: new google.maps.Point(7, 30),
			labelClass: "labels", // the CSS class for the label
			labelInBackground: false
		 });


		(function (marker, data) {
			var markContent = "<div style='font-weight:bold;size:18px;text-decoration:none;'><a href='?com=shaman&lnd=shamanhome&SHId="+data.idx+"'>" +data.title+ "</a></div><div>" +data.description+ "</div>";
			google.maps.event.addListener(marker, "click", function (e) {
				infoWindow.setContent(markContent);
				infoWindow.open(map, marker);
			});
		})(marker, data);

	}
}

// Sets the map on all markers in the array.
function setMapOnAll(map) {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(map);
  }
}

// Removes the markers from the map, but keeps them in the array.
function clearMarkers() {
  setMapOnAll(null);
}

function searchFilterGo(){
	var form = document.searchFilterForm;
	form.submit();
}
</script>
	<form name="searchForm" id="searchForm" method="post">
		<input type="hidden" name="searchDate" value="<?=$searchDate?>" />
		<input type="hidden" name="searchWord" value="<?=$searchWord?>" />
		<input type="hidden" name="searchTime" value="" />
		<input type="hidden" name="productType" value="" />
		<input type="hidden" name="sPrice" value="" />
		<input type="hidden" name="ePrice" value="" />
		<input type="hidden" name="searchSido" value="<?=$searchSido?>" />
		<input type="hidden" name="searchGun" value="" />
		<input type="hidden" name="page" value="1" />
		<input type="hidden" name="orderType" value="" />
	</form>
	<form name="wishForm" id="wishForm" method="post">
		<input type="hidden" name="SHIdx" value="" />
		<input type="hidden" name="resUserId" value="<?=$_SESSION["USER_ID"]?>" />
		<input type="hidden" name="mode" value="wish" />
	</form>
    <div class="search_content_wrap">
        <div class="sc_left">
            <!-- 검색옵션 시작 -->
            <div style="width:100%;padding:0px 20px;box-sizing:border-box;overflow-x:hidden;">
                <ul class="l_style_none search_option">
                    <li>
                        <div class="sc_opt_title">
                            <img src="/images/li3.gif" alt="" />날짜
                        </div>
                        <div class="sc_opt_ctl">
                            <input type="text" id="bookingDate" <?if($searchDate == ""){?>value="예약일"<?}else{?>value="<?=$searchDate?>"<?}?> name="searchDate" />
                            <select name="bookingTime" onchange="setBookingDate()">
                                <option value="">예약 시간</option>
                                <option value="08:00">08:00</option>
                                <option value="08:30">08:30</option>
                                <option value="09:00">09:00</option>
                                <option value="09:30">09:30</option>
                                <option value="10:00">10:00</option>
                                <option value="10:30">10:30</option>
                                <option value="11:00">11:00</option>
                                <option value="11:30">11:30</option>
                                <option value="12:00">12:00</option>
                                <option value="12:30">12:30</option>
                                <option value="13:00">13:00</option>
                                <option value="13:30">13:30</option>
                                <option value="14:00">14:00</option>
                                <option value="14:30">14:30</option>
                                <option value="15:00">15:00</option>
                                <option value="15:30">15:30</option>
                                <option value="16:00">16:00</option>
                                <option value="16:30">16:30</option>
                                <option value="17:00">17:00</option>
                                <option value="17:30">17:30</option>
                                <option value="18:00">18:00</option>
                                <option value="18:30">18:30</option>
                                <option value="19:00">19:00</option>
                                <option value="19:30">19:30</option>
                                <option value="20:00">20:00</option>
                                <option value="20:30">20:30</option>
                                <option value="21:00">21:00</option>
                                <option value="21:30">21:30</option>
                            </select>
                        </div>
                    </li>
                    <li>
                        <div class="sc_opt_title">
                            <img src="/images/li3.gif" alt="" />신점종류
                        </div>
                        <div class="sc_opt_ctl">
                            <select id="productType" onchange="setProduct();">
                                <option value="">선택하세요</option>
								<?=$shamanProductList?>
                            </select>
                        </div>
                    </li>
                    <li>
                        <div class="sc_opt_title">
                            <img src="/images/li3.gif" alt="" />가격범위
                        </div>

                        <div class="sc_opt_ctl" style="padding-top:24px; padding-bottom:20px;">
							<div id="slider-range"></div>
							<input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                            <!--<div style="background: url(/images/range_bg.gif) repeat-x center center; width: 90%; height: 20px; box-sizing: border-box; padding-left: 100px; margin-left:10px;">
                                <input type="image" src="/images/range_btn.png" alt="" style="vertical-align:middle;" /><div style="background: #f88; height: 6px; width: 170px; display: inline-block; vertical-align: middle;"></div><input type="image" src="/images/range_btn.png" alt="" style="vertical-align: middle;" />
                            </div>

                            <div class="range_txt" style="width:90%;">
                                <div class="float_left" style="padding-top:5px;">\ 10,000</div>

                                <div class="range_avg" style="margin-left:37px;">
                                    <img src="/images/box_arrow.gif" alt="" />
                                    \ 20,000 평균
                                </div>

                                <div class="float_right" style="margin-right:-20px;">\ 100,000</div>
                            </div>-->
                        </div>
                    </li>
                    <li>
                        <div class="sc_opt_title">
                            <img src="/images/li3.gif" alt="" />지역명
                        </div>
                        <div class="sc_opt_ctl" style="padding-top: 18px; padding-bottom: 18px;">
							<span id="depth1">
								<select name="depthOneArea" onchange="setDepthTwoAddress();">
									<option value="">선택</option>
									<option value="서울" <?if($searchSido == "서울특별시"){?>selected<?}?>>서울특별시</option>
									<option value="경기" <?if($searchSido == "경기도"){?>selected<?}?>>경기도</option>
									<option value="강원" <?if($searchSido == "강원도"){?>selected<?}?>>강원도</option>
									<option value="경북" <?if($searchSido == "경상북도"){?>selected<?}?>>경상북도</option>
									<option value="경남" <?if($searchSido == "경상남도"){?>selected<?}?>>경상남도</option>
									<option value="충북" <?if($searchSido == "충청북도"){?>selected<?}?>>충청북도</option>
									<option value="충남" <?if($searchSido == "충청남도"){?>selected<?}?>>충청남도</option>
									<option value="전북" <?if($searchSido == "전라북도"){?>selected<?}?>>전라북도</option>
									<option value="전남" <?if($searchSido == "전라남도"){?>selected<?}?>>전라남도</option>
									<option value="제주특별자치도" <?if($searchSido == "제주특별자치도"){?>selected<?}?>>제주특별자치도</option>
									<option value="인천" <?if($searchSido == "인천"){?>selected<?}?>>인천광역시</option>
									<option value="울산" <?if($searchSido == "울산"){?>selected<?}?>>울산광역시</option>
									<option value="대전" <?if($searchSido == "대전"){?>selected<?}?>>대전광역시</option>
									<option value="대구" <?if($searchSido == "대구"){?>selected<?}?>>대구광역시</option>
									<option value="부산" <?if($searchSido == "부산"){?>selected<?}?>>부산광역시</option>
									<option value="광주" <?if($searchSido == "광주"){?>selected<?}?>>광주광역시</option>
								</select>
							</span>
							<span id="depth2">
                            </span>
                            <!--<div style="font-size: 14px; color: #333; display: table-cell; white-space: nowrap;">서울 :</div>
                            <div class="sc_check_list">
                                <label><input type="checkbox" value="" />도봉구</label>
                                <label><input type="checkbox" value="" />노원구</label>
                                <label><input type="checkbox" value="" />서대문구</label>
                                <label><input type="checkbox" value="" />용산구</label>
                                <label><input type="checkbox" value="" />송파구</label>
                                <label><input type="checkbox" value="" />강남구</label>
                                <label><input type="checkbox" value="" />서초구</label>
                                <label><input type="checkbox" value="" />성북구</label>
                                <label><input type="checkbox" value="" />광진구</label>
                                <label><input type="checkbox" value="" />양천구</label>
                                <label><input type="checkbox" value="" />관악구</label>
                                <label><input type="checkbox" value="" />동대문구</label>
                                <label><input type="checkbox" value="" />구로구</label>
                                <label><input type="checkbox" value="" />금천구</label>
                            </div>-->
                        </div>
                    </li>
                    <li>
                        <div class="sc_opt_title">
                            <img src="/images/li3.gif" alt="" />검색 키워드
                        </div>
                        <div class="sc_opt_ctl">
                            <input type="text" id="searchWord2" style="width:450px;" name="searchWord2" value="<?=$searchWord2?>" onkeyup="setSearchWord()"/>
                        </div>
                    </li>
                    <li>
                        <div class="sc_opt_title">
                            <img src="/images/li3.gif" alt="" />정렬순서
                        </div>
                        <div class="sc_opt_ctl sc_sort">
                            <label><input type="radio" name="orderType" value="" onclick="setOrderType('H');"/>인기도</label>
                            <label><input type="radio" name="orderType" value="" onclick="setOrderType('P');"/>가격</label>
                            <label><input type="radio" name="orderType" value="" onclick="setOrderType('N');"/>신규 점집</label>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- 검색옵션 끝 -->

            <div class="search_list">
                <!--<input type="button" class="search_btn float_left" value="필터 추가하기" />
                <input type="button" class="search_btn float_left" value="취소" />-->
                <input type="button" class="search_btn float_left" value="검색필터적용" onclick="getList();setGoogleMap('search');"/>

				<div id="searchValue"></div>
            </div>
        </div>
        <div class="sc_right">
			<div id="dvMap" style="width:100%;height:100%;"></div>
        </div>
<!--
<select name="product" onchange="setSchedule()">
	<option value="">::선택하시오::</option>
	<option value="1">sample destiny1</option>
	<option value="2">sample destiny2</option>
	<option value="3">sample destiny3</option>
	<option value="4">sample destiny4</option>
</select>
<div id="scheDuleResult"></div>

</div>
-->
