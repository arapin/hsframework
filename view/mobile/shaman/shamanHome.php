<?
	$shaman = new Shaman();
	$SHId = Request::get('SHId', Request::GET | Request::XSS_CLEAR);

	$shamanData = array(":SHId" => $SHId);
	$rData = $shaman->shamanHomeInfoM($shamanData);

	$addressArray = explode(" ",$rData["SHAddress"]);
	
	$memoList = $shaman->affterMemoListM($memoPage, $SHId."_affter", $SHId);

	$scoreData = $shaman->getAffterScore($SHId."_affter");

	$wishBeen = array(":SHIdx" => $rData["idx"], ":userId"=>$_SESSION["USER_ID"]);
	$wishCnt = $shaman->getWishCnt($wishBeen);
	$addressArray[0] = str_replace("광역시","",$addressArray[0]);
	//$addressArray[0] = str_replace("특별자치도","",$addressArray[0]);

	switch($addressArray[0]){
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
			$getSido = $addressArray[0];
			break;
	}

	$searchArray = array("searchSido" => $getSido, "searchGun" => $addressArray[1]);
	//print_r($searchArray);
	$approachList = $shaman->getApproachSHListM($approachPage,"a.idx DESC", $searchArray, $rData["idx"]);

    $profileImage = new Image(".".$rData["viewProfile"]);
    $newWidth = 60;
    $newHeight = 60;
    $profileImage->resize($newWidth, $newHeight, 'crop', 'l', 't');
    $profileImage->save('./tempImg/tempProfileImg_'.$SHId);

    $profileImage2 = new Image(".".$rData["viewProfile"]);
    $newWidth = 100;
    $newHeight = 100;
    $profileImage2->resize($newWidth, $newHeight, 'crop', 'l', 't');
    $profileImage2->save('./tempImg/tempProfileImgBig_'.$SHId);

?> 
    <!-- Owl Carousel Assets -->
    <link href="/css/owl.carousel.css" rel="stylesheet">
    <link href="/css/owl.theme.css" rel="stylesheet">
    <script src="./js/owl.carousel.js"></script>


    <!-- Demo -->

    <style>
    #owl-demo .item{
        margin: 3px;
    }
    #owl-demo .item img{
        display: block;
        width: 100%;
        height: auto;
    }
    </style>


    <script>
    $(document).ready(function() {
      $("#owl-demo").owlCarousel({
        autoPlay: 3000,
        items : 4,
		 autoHeight : true,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3]
      });
	setGoogleMap();

    });
    </script>

<script>

	<?=$rData["mapInfo"]?>

	function setGoogleMap(){
		var address = '<?=$rData["SHAddress"]?>';
		var mapCenter = '';
		geocoder = new google.maps.Geocoder();
		geocoder.geocode( { 'address': address, 'region': 'uk'}, function(results, status) {
		  if (status == google.maps.GeocoderStatus.OK) {
				mapCenter = new google.maps.LatLng(<?=$rData["SHLng"]?>, <?=$rData["SHLat"]?>);
				var mapOptions = {
					center: mapCenter,
					zoom: 18,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
				var marker = new google.maps.Marker({
					position: mapCenter,
					map: map,
					title: '<?=$rData["SHName"]?>'
				  });
			} else {
			"Geocode was not successful for the following reason: " + status;
		  }
		});
	}
	function viewAffterMemo(){
		document.memoForm.memo.value = '';
		$('#writeAffterMemo').show();
	}

	function closeAffterMemo(){
		$('#writeAffterMemo').hide();
	}


	function deleteMemo(idx){
		var form = document.memoForm;
		form.mode.value = 'delMemo';
		form.memoIdx.value = idx;
		if(confirm('후기를 삭제 하시겠습니까?')==true){
			form.submit();
		}
	}

	function modifyMemo(idx){
		var form = document.memoForm;
		form.memoIdx.value = idx;
		form.action = '?com=shaman&lnd=review';
		form.submit();
	}

	function goLogin(SHId){
		alert('로그인후 이용하여 주십시요.');
		location.href = '?com=user&lnd=login&SHId='+SHId;
	}
</script>
<form name="memoForm" method="post" action="?com=shaman&pro=shamaninfo">
<input type="hidden" name="mode" value="afftermemoinsert"/>
<input type="hidden" name="userId" value="<?=$_SESSION["USER_ID"]?>"/>
<input type="hidden" name="code" value="<?=$SHId?>_affter"/>
<input type="hidden" name="SHId" value="<?=$SHId?>"/>
<input type="hidden" name="memoIdx" value=""/>
</form>
<form name="wishForm" id="wishForm" method="post">
	<input type="hidden" name="SHIdx" value="" />
	<input type="hidden" name="resUserId" value="<?=$_SESSION["USER_ID"]?>" />
	<input type="hidden" name="mode" value="wish" />
</form>
		<!-- 예약 버튼 -->
<?if($_SESSION["SH_ID"] == ""){?>
        <div id="bookButton" style="position:fixed; width:100%; padding:0px 20px; box-sizing:border-box; z-index:99; top:500px;">
            <input type="button" class="btn_1" value="예약 요청" onclick="location.href = '?com=shaman&lnd=booking&SHId=<?=$SHId?>'" />
        </div>
<?}?>
        <div style="background:url(<?=$rData["shamanMainImg"]?>) no-repeat; background-size:cover;" class="sv_shop_wrap">
            <!--<div>
                <span class="shop_price2">
                    <span>￦</span>20,000
                </span>
            </div>-->
        </div>
        <div class="sv_shop_title">
            <button style="background:url(<?=$rData["viewProfile"]?>) no-repeat; background-size:60px 60px; border:none;" type="button" class="shop_photo"></button>
            <p style="font-size:15px;margin-top:20px;"><?=$rData["SHName"]?></p>
            <a href="#none" class="link3"><?=$addressArray[1]?>,</a> <a href="#none" class="link3"><?=$addressArray[0]?>,</a> <a href="#none" class="link3">한국</a>
            <p style="font-size:14px;margin-top:5px;">대표 : <?=$rData["productNameInfo"]?></p>
        </div>

        <div id="introTitle" class="sv_title_layer">
            상세 설명
        </div>
        
        <!-- 상세설명 시작 -->
        <div class="sv_intro">
            <dl>
                <dt>상세 설명</dt>
                <dd id="moreText1" style="max-height:250px;overflow:hidden;">
                    <div id="moreTextLayer1" onclick="expand(1)" class="more_wrap"></div>
					<?=nl2br($rData["SHDesc"])?>
                </dd>
                <dd id="moreTextLink1" class="sv_more">
                    <a href="javascript:expand(1)" class="link4">+ 더보기</a>
                </dd>

                <dt>가격</dt>
                <dd class="sv_intro_dd">
                    <ul class="l_style_none">
						<?=$rData["productInfo"]?>

                        <!--<li>기본점 : ￦ 20,000</li>
                        <li>추가점 : ￦ 10,000</li>
                        <li>추가인원요금 : ￦ 20,000 / 1명</li>-->
                    </ul>
                </dd>

                <dt>예약 조건</dt>
                <dd class="sv_intro_dd">
                    <ul class="l_style_none">
                        <li>예약가능시간 : <?=$rData["viewOpenTime"]?></li>
                        <!--<li>예약 가능 여부 : 최소 1일</li>
                        <li>
                            <a href="javascript:$('#calendar').toggle()" class="link4">달력 보기</a>

                            <div id="calendar" style="position:absolute; display:none; z-index:999;">
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
                        </li>-->
                    </ul>
                </dd>
            </dl>
        </div>
        <!-- 상세설명 끝 -->

        <div id="reviewTitle" class="sv_title_layer">
            후기
        </div>

        <!-- 후기 시작 -->
        <div class="sv_review">
            <p class="sv_review_cnt">
                후기 <?=$shaman->amTotalCnt?>개 <img src="/images/mobile/ic_star_b<?=$scoreData["totalScore"]?>.png" alt="<?=$scoreData["totalScore"]?>점" />
            </p>

            <!--<input type="text" value="후기 검색" class="review_search" />-->

            <ul class="l_style_none sv_score_list">
                <li>
                    <span>정확성</span>
                    <img src="/images/mobile/ic_star<?=$scoreData["ppTotalScore"]?>.png" alt="<?=$scoreData["ppTotalScore"]?>점" />
                </li>
                <li>
                    <span>친절도</span>
                    <img src="/images/mobile/ic_star<?=$scoreData["spTotalScore"]?>.png" alt="<?=$scoreData["spTotalScore"]?>점" />
                </li>
                <li>
                    <span>위치</span>
                    <img src="/images/mobile/ic_star<?=$scoreData["lpTotalScore"]?>.png" alt="<?=$scoreData["lpTotalScore"]?>점" />
                </li>
                <li>
                    <span>가격</span>
                    <img src="/images/mobile/ic_star<?=$scoreData["prpTotalScore"]?>.png" alt="<?=$scoreData["prpTotalScore"]?>점" />
                </li>
            </ul>

            <!--<input type="button" value="후기 한국어로 번역하기" class="btn_5" />-->

            <dl class="sv_cmt_lst">
				<?=$memoList?>
            </dl>
			<?if($_SESSION["USER_ID"] != ""){?>
            <input type="button" value="후기 등록하기" onclick="location.href = '?com=shaman&lnd=review&SHId=<?=$SHId?>'" class="btn_5" />
			<?}?>
        </div>
        <!-- 후기 끝 -->

        <div id="skTitle" class="sv_title_layer">
            선생님
        </div>

        <div class="sv_intro">
            <dl>
                <dt style="padding-bottom:20px;"><?=$rData["name"]?> 선생님 더 알아보기</dt>
                <dd style="padding-bottom:13px;">
                    <button style="background: url(<?=$rData["viewProfile"]?>) no-repeat; background-size: 60px 60px; border:none;" type="button" class="shop_photo"></button>
                </dd>
                <dd id="moreText2" style="max-height:200px;overflow:hidden;">
                    <div id="moreTextLayer2" onclick="expand(2)" class="more_wrap3"></div>
					<?=nl2br($rData["SHWord"])?>
                </dd>
              <div id="owl-demo" class="owl-carousel">
				<?
					$imgCnt = sizeof($rData["shamanImg"]);

					for($i=0; $i < $imgCnt; $i++){
						/*$mainImg = new Image(".".$rData["shamanImg"][$i]);
						$newWidth = 60;
						$newHeight = 40;
						$mainImg->resize($newWidth, $newHeight, 'crop', 'l', 't');
						$mainImg->save('./tempImg/tempMainImg239_'.$i."_".$SHId);
						echo "
							<div class=\"item\">
								";
							$mainImg->displayHTML();
							echo "
							</div>
						";*/
						echo "<div class=\"item\"><img src=\"".$rData["shamanImg"][$i]."\" style=\"\" /></div>";

					}
				?>
              </div>
                <dd id="moreTextLink2" class="sv_more" style="height:20px;">
                    <a href="javascript:expand(2)" class="link4">+ 더보기</a>
                </dd>
                <dd style="padding-top:20px;color:#888;font-size:14px;">
                    <p>지역 : <?=$addressArray[1]?>, <?=$addressArray[0]?>, 한국</p>
                    <!--<p>회원가입 : 2015년 10월</p>-->
                </dd>
                <dd style="padding: 20px 0px 5px 0px; color: #888; font-size: 14px;">
                    신뢰도
                </dd>
                <dd style="padding-bottom:10px;">
					<?if($rData["SHApply"] == "Y"){?>
                    <img src="/images/mobile/logo_mark.gif" style="width:60px; height:60px;" alt="" />
					<?}?>
                </dd>
            </dl>
        </div>

        <div id="mapTitle" class="sv_title_layer">
            위치
        </div>

        <!-- 지도 시작 -->
        <div style="width:100%; padding:20px 10px; box-sizing:border-box;">
			<div id="dvMap" style="width:100%; height:300px;"></div>
        </div>
        <!-- 지도 끝 -->

        <!-- 비슷한 점집 시작 -->
        <div class="sv_shop_lst">
            <dl>
                <dt>비슷한 점집</dt>
                <dd>
                    <ul class="l_style_inline search_plist">
<?=$approachList?>
                        <!--<li>
                            <img class="sc_heart" src="/images/mobile/ic_heart_on.png" alt="" />
                            <div class="sc_photo_wrap">
                                <a href="shop_view.html"><img src="/html/sample/s1.jpg" alt="" /></a>
                                <div class="sc_money">
                                    <span>￦</span>20,000
                                </div>
                            </div>

                            <button style="background: url(/images/mobile/sample4_pic.jpg) no-repeat; background-size: 60px 60px; " type="button" class="sc_photo_face"></button>

                            <p class="photo_link">
                                <a href="shop_view.html">책을 읽는 무당 - 양사암</a>
                            </p>
                            <p class="photo_score">
                                신점 전체 · 4.9<img src="/images/mobile/star.gif" alt="" />· 후기 20개
                            </p>
                        </li>


                        <li>
                            <img class="sc_heart" src="/images/mobile/ic_heart.png" alt="" />
                            <div class="sc_photo_wrap">
                                <a href="shop_view.html"><img src="/html/sample/s2.jpg" alt="" /></a>
                                <div class="sc_money">
                                    <span>￦</span>30,000
                                </div>
                            </div>

                            <button style="background: url(/images/mobile/sample4_pic.jpg) no-repeat; background-size: 60px 60px; " type="button" class="sc_photo_face"></button>

                            <p class="photo_link">
                                <a href="shop_view.html">따뜻하게 힐링할수 있는 신점</a>
                            </p>
                            <p class="photo_score">
                                신점 전체 · 4.9<img src="/images/mobile/star.gif" alt="" />· 후기 20개
                            </p>
                        </li>-->
                    </ul>
					<div class="paging_wrap">
						<?=$shaman->approachPageView?>
					</div>
                </dd>
            </dl>
        </div>
        <!-- 비슷한 점집 끝 -->

        <!--<div style="color:#777;font-size:14px;padding:0px 20px 10px 20px;">

            <div class="sl_shop_option" style="margin-top:20px;">

                <p style="text-align:center;font-size:15px; color:#333;margin:30px 0px 5px 0px;">
                    서성구와(과) 인근의 다른 옵션 살펴보기
                </p>

                <p>
                    <a href="">서성구</a>의 신점 유형 더보기 :
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
                </p>
            </div>
        </div>-->