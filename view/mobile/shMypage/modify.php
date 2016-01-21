<?
	$shmypage = new SHMypage();

	$shamanData = array(":SHId" => $_SESSION["SH_ID"]);
	$rData = $shmypage->shamanModifyInfo($shamanData);

	//$startTimeArray = explode(":", $rData["SHStartTime"]);
	//$endTimeArray = explode(":", $rData["SHEndTime"]);

	$fileData = array(":parentId" => $_SESSION["SH_ID"], ":type" => "shaman");
	$fileList = $shmypage->getFileInfoListViewM($fileData);

	$fileData2 = array(":parentId" => $_SESSION["SH_ID"], ":type" => "profile");
	$profileData = $shmypage->getProfileInfoListView($fileData2);

	$sprData = array(":SHIdx" => $rData["idx"]);
	$sprList = $shmypage->getSprInfoListViewM($sprData);

	$limitList = $shmypage->getLimitDayInfoListViewM($sprData);

	$productSelect = $shmypage->getProductSelectinfo();
?>
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script src="/js/jquery.form.min.js"></script>

<script type="text/javascript">
        // function ios (version) {
        // alert("23");
        // var uagent = navigator.userAgent.toLowerCase();
        // var iosPath = location.protocol + '//' + location.host + '/eventapp/Airtel/build.plist';
        // window.location.href = 'itms-services://?action=download-manifest&url=' + iosPath;
        // };
        /*$( document ).delegate("#filePhoto", "click", function () {
                var isKitkat = window.navigator.userAgent.search( "MobileApp Android 4.4") > -1 ? true : false;
               
                if ( isKitkat ) {       window.Android.open("filePhoto", "thumbnail1");       }
        })*/
</script> 

<form name="joinForm" method="post" action="?com=shMypage&pro=shMypageInfo" enctype="multipart/form-data">
<input type="hidden" name="mode" value="shamanModify" />
<input type="hidden" name="SHId" value="<?=$rData["SHId"]?>" />
<input type="hidden" name="SHPwd" value="<?=$rData["SHPwd"]?>" />
<input type="hidden" name="SHLng" value="<?=$rData["SHLng"]?>"/>
<input type="hidden" name="SHLat" value="<?=$rData["SHLat"]?>"/>
<input type="hidden" name="SHIdx" value="<?=$rData["idx"]?>"/>

        <div class="layer_title">
            <p>무속인 입점관리</p>
            <input type="image" src="/images/mobile/btn_close.gif" alt="" />
        </div>

        <fieldset class="login_field login_field_ex">

            <div style="font-size:16px; padding-bottom:20px;">
                아이디 : <span style="color:#0a8;"><?=$rData["SHId"]?></span>
            </div>

            <input type="password" placeholder="비밀번호" name="SHPwdU" value="" />
            <input type="password" placeholder="비밀번호" name="SHPwdUConfirm" value=""/>
            <input type="text" placeholder="무속인명" name="name" value="<?=$rData["name"]?>"/>
            <input type="text" placeholder="상호명" name="SHName" value="<?=$rData["SHName"]?>"/>
            <div>
                <input type="text" value="<?=$rData["SHZipcode"]?>" name="SHZipcode" id="zipcode" style="width:80px; float:left; margin:0px 10px 10px 0px;" />
                <input type="button" value="우편번호 찾기" class="btn_6" style="width:110px; float:left; margin-bottom:10px;" onclick="execDaumPostcode()"/>
            </div>

            <input type="text" placeholder="기본주소" name="SHAddress" value="<?=$rData["SHAddress"]?>" id="address"/>
            <input type="text" placeholder="상세주소" name="SHAddress2" value="<?=$rData["SHAddress2"]?>" id="address2"/>
            <input type="text" placeholder="전화번호 - 를 빼고 입력하여주십시요." name="SHTel" value="<?=$rData["SHTel"]?>"/>
            <input type="text" placeholder="휴대폰번호 - 를 빼고 입력하여주십시요." name="SHPhone" value="<?=$rData["SHPhone"]?>"/>
            <input type="text" placeholder="이메일" name="SHEmail" value="<?=$rData["SHEmail"]?>"/>

            <div style="border-top:1px solid #ddd; padding-bottom:10px;"></div>

            <textarea class="txtarea1" name="SHDesc"><?=$rData["SHDesc"]?></textarea>

            <textarea class="txtarea1" style="margin-top:5px;" name="SHWord"><?=$rData["SHWord"]?></textarea>

            <p style="padding:10px 0px 5px 0px; color:#333; font-size:15px;">예약 가능 시간</p>
            <div class="ctl_half">
                <div class="ctl_half_t1">
					<select name="SHStartTime">
						<option value="08:00" <?if($rData["SHStartTime"] == "08:00"){?>selected<?}?>>08:00</option>
						<option value="08:30" <?if($rData["SHStartTime"] == "08:30"){?>selected<?}?>>08:30</option>
						<option value="09:00" <?if($rData["SHStartTime"] == "09:00"){?>selected<?}?>>09:00</option>
						<option value="09:30" <?if($rData["SHStartTime"] == "09:30"){?>selected<?}?>>09:30</option>
						<option value="10:00" <?if($rData["SHStartTime"] == "10:00"){?>selected<?}?>>10:00</option>
						<option value="10:30" <?if($rData["SHStartTime"] == "10:30"){?>selected<?}?>>10:30</option>
						<option value="11:00" <?if($rData["SHStartTime"] == "11:00"){?>selected<?}?>>11:00</option>
						<option value="11:30" <?if($rData["SHStartTime"] == "11:30"){?>selected<?}?>>11:30</option>
						<option value="12:00" <?if($rData["SHStartTime"] == "12:00"){?>selected<?}?>>12:00</option>
						<option value="12:30" <?if($rData["SHStartTime"] == "12:30"){?>selected<?}?>>12:30</option>
						<option value="13:00" <?if($rData["SHStartTime"] == "13:00"){?>selected<?}?>>13:00</option>
						<option value="13:30" <?if($rData["SHStartTime"] == "13:30"){?>selected<?}?>>13:30</option>
						<option value="14:00" <?if($rData["SHStartTime"] == "14:00"){?>selected<?}?>>14:00</option>
						<option value="14:30" <?if($rData["SHStartTime"] == "14:30"){?>selected<?}?>>14:30</option>
						<option value="15:00" <?if($rData["SHStartTime"] == "15:00"){?>selected<?}?>>15:00</option>
						<option value="15:30" <?if($rData["SHStartTime"] == "15:30"){?>selected<?}?>>15:30</option>
						<option value="16:00" <?if($rData["SHStartTime"] == "16:00"){?>selected<?}?>>16:00</option>
						<option value="16:30" <?if($rData["SHStartTime"] == "16:30"){?>selected<?}?>>16:30</option>
						<option value="17:00" <?if($rData["SHStartTime"] == "17:00"){?>selected<?}?>>17:00</option>
						<option value="17:30" <?if($rData["SHStartTime"] == "17:30"){?>selected<?}?>>17:30</option>
						<option value="18:00" <?if($rData["SHStartTime"] == "18:00"){?>selected<?}?>>18:00</option>
						<option value="18:30" <?if($rData["SHStartTime"] == "18:30"){?>selected<?}?>>18:30</option>
						<option value="19:00" <?if($rData["SHStartTime"] == "19:00"){?>selected<?}?>>19:00</option>
						<option value="19:30" <?if($rData["SHStartTime"] == "19:30"){?>selected<?}?>>19:30</option>
						<option value="20:00" <?if($rData["SHStartTime"] == "20:00"){?>selected<?}?>>20:00</option>
						<option value="20:30" <?if($rData["SHStartTime"] == "20:30"){?>selected<?}?>>20:30</option>
						<option value="21:00" <?if($rData["SHStartTime"] == "21:00"){?>selected<?}?>>21:00</option>
						<option value="21:30" <?if($rData["SHStartTime"] == "21:30"){?>selected<?}?>>21:30</option>
						<option value="22:00" <?if($rData["SHStartTime"] == "22:00"){?>selected<?}?>>22:00</option>
						<option value="22:30" <?if($rData["SHStartTime"] == "22:30"){?>selected<?}?>>22:30</option>
					</select>
                </div>
                <div class="ctl_half_t2">
					<select name="SHEndTime">
						<option value="08:00" <?if($rData["SHEndTime"] == "08:00"){?>selected<?}?>>08:00</option>
						<option value="08:30" <?if($rData["SHEndTime"] == "08:30"){?>selected<?}?>>08:30</option>
						<option value="09:00" <?if($rData["SHEndTime"] == "09:00"){?>selected<?}?>>09:00</option>
						<option value="09:30" <?if($rData["SHEndTime"] == "09:30"){?>selected<?}?>>09:30</option>
						<option value="10:00" <?if($rData["SHEndTime"] == "10:00"){?>selected<?}?>>10:00</option>
						<option value="10:30" <?if($rData["SHEndTime"] == "10:30"){?>selected<?}?>>10:30</option>
						<option value="11:00" <?if($rData["SHEndTime"] == "11:00"){?>selected<?}?>>11:00</option>
						<option value="11:30" <?if($rData["SHEndTime"] == "11:30"){?>selected<?}?>>11:30</option>
						<option value="12:00" <?if($rData["SHEndTime"] == "12:00"){?>selected<?}?>>12:00</option>
						<option value="12:30" <?if($rData["SHEndTime"] == "12:30"){?>selected<?}?>>12:30</option>
						<option value="13:00" <?if($rData["SHEndTime"] == "13:00"){?>selected<?}?>>13:00</option>
						<option value="13:30" <?if($rData["SHEndTime"] == "13:30"){?>selected<?}?>>13:30</option>
						<option value="14:00" <?if($rData["SHEndTime"] == "14:00"){?>selected<?}?>>14:00</option>
						<option value="14:30" <?if($rData["SHEndTime"] == "14:30"){?>selected<?}?>>14:30</option>
						<option value="15:00" <?if($rData["SHEndTime"] == "15:00"){?>selected<?}?>>15:00</option>
						<option value="15:30" <?if($rData["SHEndTime"] == "15:30"){?>selected<?}?>>15:30</option>
						<option value="16:00" <?if($rData["SHEndTime"] == "16:00"){?>selected<?}?>>16:00</option>
						<option value="16:30" <?if($rData["SHEndTime"] == "16:30"){?>selected<?}?>>16:30</option>
						<option value="17:00" <?if($rData["SHEndTime"] == "17:00"){?>selected<?}?>>17:00</option>
						<option value="17:30" <?if($rData["SHEndTime"] == "17:30"){?>selected<?}?>>17:30</option>
						<option value="18:00" <?if($rData["SHEndTime"] == "18:00"){?>selected<?}?>>18:00</option>
						<option value="18:30" <?if($rData["SHEndTime"] == "18:30"){?>selected<?}?>>18:30</option>
						<option value="19:00" <?if($rData["SHEndTime"] == "19:00"){?>selected<?}?>>19:00</option>
						<option value="19:30" <?if($rData["SHEndTime"] == "19:30"){?>selected<?}?>>19:30</option>
						<option value="20:00" <?if($rData["SHEndTime"] == "20:00"){?>selected<?}?>>20:00</option>
						<option value="20:30" <?if($rData["SHEndTime"] == "20:30"){?>selected<?}?>">20:30</option>
						<option value="21:00" <?if($rData["SHEndTime"] == "21:00"){?>selected<?}?>>21:00</option>
						<option value="21:30" <?if($rData["SHEndTime"] == "21:30"){?>selected<?}?>>21:30</option>
						<option value="22:00" <?if($rData["SHEndTime"] == "22:00"){?>selected<?}?>>22:00</option>
						<option value="22:30" <?if($rData["SHEndTime"] == "22:30"){?>selected<?}?>>22:30</option>
					</select>
                </div>
            </div>

            <p style="padding:5px 0px 5px 0px; color:#333; font-size:15px;">휴식시간</p>
            <div class="ctl_half">
                <div class="ctl_half_t1">
					<select style="width:100px" name="SHRestSTime">
						<option value="08:00" <?if($rData["SHRestSTime"] == "08:00"){?>selected<?}?>>08:00</option>
						<option value="08:30" <?if($rData["SHRestSTime"] == "08:30"){?>selected<?}?>>08:30</option>
						<option value="09:00" <?if($rData["SHRestSTime"] == "09:00"){?>selected<?}?>>09:00</option>
						<option value="09:30" <?if($rData["SHRestSTime"] == "09:30"){?>selected<?}?>>09:30</option>
						<option value="10:00" <?if($rData["SHRestSTime"] == "10:00"){?>selected<?}?>>10:00</option>
						<option value="10:30" <?if($rData["SHRestSTime"] == "10:30"){?>selected<?}?>>10:30</option>
						<option value="11:00" <?if($rData["SHRestSTime"] == "11:00"){?>selected<?}?>>11:00</option>
						<option value="11:30" <?if($rData["SHRestSTime"] == "11:30"){?>selected<?}?>>11:30</option>
						<option value="12:00" <?if($rData["SHRestSTime"] == "12:00"){?>selected<?}?>>12:00</option>
						<option value="12:30" <?if($rData["SHRestSTime"] == "12:30"){?>selected<?}?>>12:30</option>
						<option value="13:00" <?if($rData["SHRestSTime"] == "13:00"){?>selected<?}?>>13:00</option>
						<option value="13:30" <?if($rData["SHRestSTime"] == "13:30"){?>selected<?}?>>13:30</option>
						<option value="14:00" <?if($rData["SHRestSTime"] == "14:00"){?>selected<?}?>>14:00</option>
						<option value="14:30" <?if($rData["SHRestSTime"] == "14:30"){?>selected<?}?>>14:30</option>
						<option value="15:00" <?if($rData["SHRestSTime"] == "15:00"){?>selected<?}?>>15:00</option>
						<option value="15:30" <?if($rData["SHRestSTime"] == "15:30"){?>selected<?}?>>15:30</option>
						<option value="16:00" <?if($rData["SHRestSTime"] == "16:00"){?>selected<?}?>>16:00</option>
						<option value="16:30" <?if($rData["SHRestSTime"] == "16:30"){?>selected<?}?>>16:30</option>
						<option value="17:00" <?if($rData["SHRestSTime"] == "17:00"){?>selected<?}?>>17:00</option>
						<option value="17:30" <?if($rData["SHRestSTime"] == "17:30"){?>selected<?}?>>17:30</option>
						<option value="18:00" <?if($rData["SHRestSTime"] == "18:00"){?>selected<?}?>>18:00</option>
						<option value="18:30" <?if($rData["SHRestSTime"] == "18:30"){?>selected<?}?>>18:30</option>
						<option value="19:00" <?if($rData["SHRestSTime"] == "19:00"){?>selected<?}?>>19:00</option>
						<option value="19:30" <?if($rData["SHRestSTime"] == "19:30"){?>selected<?}?>>19:30</option>
						<option value="20:00" <?if($rData["SHRestSTime"] == "20:00"){?>selected<?}?>>20:00</option>
						<option value="20:30  <?if($rData["SHRestSTime"] == "20:30"){?>selected<?}?>">20:30</option>
						<option value="21:00" <?if($rData["SHRestSTime"] == "21:00"){?>selected<?}?>>21:00</option>
						<option value="21:30" <?if($rData["SHRestSTime"] == "21:30"){?>selected<?}?>>21:30</option>
						<option value="22:00" <?if($rData["SHRestSTime"] == "22:00"){?>selected<?}?>>22:00</option>
						<option value="22:30" <?if($rData["SHRestSTime"] == "22:30"){?>selected<?}?>>22:30</option>
					</select>

                </div>
                <div class="ctl_half_t2">
					<select style="width:100px" name="SHRestETime">
						<option value="08:00" <?if($rData["SHRestETime"] == "08:00"){?>selected<?}?>>08:00</option>
						<option value="08:30" <?if($rData["SHRestETime"] == "08:30"){?>selected<?}?>>08:30</option>
						<option value="09:00" <?if($rData["SHRestETime"] == "09:00"){?>selected<?}?>>09:00</option>
						<option value="09:30" <?if($rData["SHRestETime"] == "09:30"){?>selected<?}?>>09:30</option>
						<option value="10:00" <?if($rData["SHRestETime"] == "10:00"){?>selected<?}?>>10:00</option>
						<option value="10:30" <?if($rData["SHRestETime"] == "10:30"){?>selected<?}?>>10:30</option>
						<option value="11:00" <?if($rData["SHRestETime"] == "11:00"){?>selected<?}?>>11:00</option>
						<option value="11:30" <?if($rData["SHRestETime"] == "11:30"){?>selected<?}?>>11:30</option>
						<option value="12:00" <?if($rData["SHRestETime"] == "12:00"){?>selected<?}?>>12:00</option>
						<option value="12:30" <?if($rData["SHRestETime"] == "12:30"){?>selected<?}?>>12:30</option>
						<option value="13:00" <?if($rData["SHRestETime"] == "13:00"){?>selected<?}?>>13:00</option>
						<option value="13:30" <?if($rData["SHRestETime"] == "13:30"){?>selected<?}?>>13:30</option>
						<option value="14:00" <?if($rData["SHRestETime"] == "14:00"){?>selected<?}?>>14:00</option>
						<option value="14:30" <?if($rData["SHRestETime"] == "14:30"){?>selected<?}?>>14:30</option>
						<option value="15:00" <?if($rData["SHRestETime"] == "15:00"){?>selected<?}?>>15:00</option>
						<option value="15:30" <?if($rData["SHRestETime"] == "15:30"){?>selected<?}?>>15:30</option>
						<option value="16:00" <?if($rData["SHRestETime"] == "16:00"){?>selected<?}?>>16:00</option>
						<option value="16:30" <?if($rData["SHRestETime"] == "16:30"){?>selected<?}?>>16:30</option>
						<option value="17:00" <?if($rData["SHRestETime"] == "17:00"){?>selected<?}?>>17:00</option>
						<option value="17:30" <?if($rData["SHRestETime"] == "17:30"){?>selected<?}?>>17:30</option>
						<option value="18:00" <?if($rData["SHRestETime"] == "18:00"){?>selected<?}?>>18:00</option>
						<option value="18:30" <?if($rData["SHRestETime"] == "18:30"){?>selected<?}?>>18:30</option>
						<option value="19:00" <?if($rData["SHRestETime"] == "19:00"){?>selected<?}?>>19:00</option>
						<option value="19:30" <?if($rData["SHRestETime"] == "19:30"){?>selected<?}?>>19:30</option>
						<option value="20:00" <?if($rData["SHRestETime"] == "20:00"){?>selected<?}?>>20:00</option>
						<option value="20:30" <?if($rData["SHRestETime"] == "20:30"){?>selected<?}?>>20:30</option>
						<option value="21:00" <?if($rData["SHRestETime"] == "21:00"){?>selected<?}?>>21:00</option>
						<option value="21:30" <?if($rData["SHRestETime"] == "21:30"){?>selected<?}?>>21:30</option>
						<option value="22:00" <?if($rData["SHRestETime"] == "22:00"){?>selected<?}?>>22:00</option>
						<option value="22:30" <?if($rData["SHRestETime"] == "22:30"){?>selected<?}?>>22:30</option>
					</select>
                </div>
            </div>
</form>

<form id="proFileForm" name="proFileForm" method="post" action="?com=shMypage&pro=shMypageInfo" enctype="multipart/form-data" target="fileFrame">
<input type="hidden" name="mode" value="saveProfile" />
<input type="hidden" name="SHId" value="<?=$rData["SHId"]?>" />

            <div style="border-top:1px solid #ddd; border-bottom:1px solid #ddd;padding-bottom:10px;">
                <p style="padding:15px 0px 10px 0px; color:#333; font-size:15px;">선생님 이미지</p>
                <div style="padding-bottom:10px;">
                    <img src="/upload/shaman/<?=$profileData["saveName"]?>" style="width:100px; height:100px; border-radius:50px;" alt="" onerror="this.src = '/images/no_photo.jpg'"/>
                    <output id="viewFilePhoto"></output>
                </div>
                <input type="file" id="filePhoto" name="profile" />

                <div style="text-align:right;padding-top:5px;">
                    <input type="button" class="btn_7 btn_s" value="사진 올리기" onclick="saveImg2();"/>
                </div>
            </div>
</form>

            <p style="padding:10px 0px 5px 0px; color:#333; font-size:15px;">예약 제한 일자</p>
            <textarea class="txtarea1" style="margin-top:5px;height:100px; background:#f6f6f6;"><?=$limitList?></textarea>
            <div style="text-align:right;padding:5px 0px 10px 0px;">
                <input type="button" class="btn_7 btn_s" onclick="location.href = '?com=shMypage&lnd=limitDay&SHIdx=<?=$rData["idx"]?>';" value="예약 제한 일자 관리" />
            </div>

            <div style="border-top:1px solid #ddd; border-bottom:1px solid #ddd;padding-bottom:10px;">

                <p style="padding:10px 0px 5px 0px; color:#333; font-size:15px;">점집 대표 사진</p>

                <div style="border:1px solid #c3c3c3; background:#f6f6f6; border-radius:3px;height:200px; overflow-y:auto; padding:10px; box-sizing:border-box;">
                    <dl class="img_up_list">
					<?=$fileList?>
                    </dl>
                </div>

                <div style="text-align:right;padding-top:10px;">
                    <input type="button" class="btn_7 btn_s" onclick="location.href = '?com=shMypage&lnd=mngFile';" value="이미지 파일 관리" />
                </div>
            </div>

            <p style="padding:10px 0px 5px 0px; color:#333; font-size:15px;">점집 상품</p>
            <textarea class="txtarea1" style="margin-top:5px; background:#f6f6f6; font-size:12px;"><?=$sprList?></textarea>
            <div style="text-align:right;padding:5px 0px 10px 0px;border-bottom:1px solid #ddd;margin-bottom:10px">
                <input type="button" class="btn_7 btn_s" onclick="location.href = '?com=shMypage&lnd=mngProduct&SHIdx=<?=$rData["idx"]?>';" value="상품관리" />
            </div>

            <div class="ctl_half">
                <div class="ctl_half_t1">
                    <input type="button" style="margin-top:10px;" class="btn_1" value="저장하기" onclick="form_chk_info()" />
                </div>
                <!--<div class="ctl_half_t2">
                    <input type="button" style="margin-top:10px;" class="btn_2" value="취소" onclick="location.href = 'mw_member_view.html';" />
                </div>-->
            </div>
        </fieldset>

		<div id="layer" style="display:none;position:fixed;overflow:hidden;z-index:1;-webkit-overflow-scrolling:touch;">
		<img src="//i1.daumcdn.net/localimg/localimages/07/postcode/320/close.png" id="btnCloseLayer" style="cursor:pointer;position:absolute;right:-3px;top:-3px;z-index:1" onclick="closeDaumPostcode()" alt="닫기 버튼">
		</div>
		<iframe name="fileFrame" src="about:blank" frameborder="0" width="0" height="0" marginwidth="0" marginheight="0" scrolling="no" title="내용없음"></iframe>
		<script type="text/javascript">
		<!--

		  function handleFileSelect(evt) {
			var files = evt.target.files; // FileList object
			// Loop through the FileList and render image files as thumbnails.
			for (var i = 0, f; f = files[i]; i++) {
			  // Only process image files.
			  if (!f.type.match('image.*')) {
				continue;
			  }
			  document.getElementById('viewFilePhoto').outerHTML = '<output id="viewFilePhoto"></output>';
			  var reader = new FileReader();
			  // Closure to capture the file information.
			  reader.onload = (function(theFile) {
				return function(e) {
				  // Render thumbnail.
				  var span = document.createElement('span');
				  span.innerHTML = ['<img class="float_left" style="margin-right:20px;border-radius:49px; width:100px; height:100px;" src="', e.target.result,
				  '" title="', escape(theFile.name), '" alt="" onerror="this.src = \'/images/no_photo.jpg\'" />'].join('');
				  document.getElementById('viewFilePhoto').insertBefore(span, null);
				};
			  })(f);
			  // Read in the image file as a data URL.
			  reader.readAsDataURL(f);
			}
		  }
		  document.getElementById('filePhoto').addEventListener('change', handleFileSelect, false);
		//-->
		</script>
		<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
		<script>

			// 우편번호 찾기 화면을 넣을 element
			var element_layer = document.getElementById('layer');

			function closeDaumPostcode() {
				// iframe을 넣은 element를 안보이게 한다.
				element_layer.style.display = 'none';
			}
			function execDaumPostcode() {
				new daum.Postcode({
					oncomplete: function(data) {
						// 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

						// 각 주소의 노출 규칙에 따라 주소를 조합한다.
						// 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
						var fullAddr = ''; // 최종 주소 변수
						var extraAddr = ''; // 조합형 주소 변수

						// 사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
						if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
							fullAddr = data.roadAddress;

						} else { // 사용자가 지번 주소를 선택했을 경우(J)
							fullAddr = data.jibunAddress;
						}

						// 사용자가 선택한 주소가 도로명 타입일때 조합한다.
						if(data.userSelectedType === 'R'){
							//법정동명이 있을 경우 추가한다.
							if(data.bname !== ''){
								extraAddr += data.bname;
							}
							// 건물명이 있을 경우 추가한다.
							if(data.buildingName !== ''){
								extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
							}
							// 조합형주소의 유무에 따라 양쪽에 괄호를 추가하여 최종 주소를 만든다.
							fullAddr += (extraAddr !== '' ? ' ('+ extraAddr +')' : '');
						}

						// 우편번호와 주소 정보를 해당 필드에 넣는다.
						document.joinForm.SHZipcode.value = data.zonecode;
						$('#address').val(fullAddr);
						$('#address2').focus();
						codeAddress();
						element_layer.style.display = 'none';
					},
					width : '100%',
					height : '100%'
				}).embed(element_layer);

				// iframe을 넣은 element를 보이게 한다.
				element_layer.style.display = 'block';

				// iframe을 넣은 element의 위치를 화면의 가운데로 이동시킨다.
				initLayerPosition();
			}

			// 브라우저의 크기 변경에 따라 레이어를 가운데로 이동시키고자 하실때에는
			// resize이벤트나, orientationchange이벤트를 이용하여 값이 변경될때마다 아래 함수를 실행 시켜 주시거나,
			// 직접 element_layer의 top,left값을 수정해 주시면 됩니다.
			function initLayerPosition(){
				var width = 300; //우편번호서비스가 들어갈 element의 width
				var height = 460; //우편번호서비스가 들어갈 element의 height
				var borderWidth = 5; //샘플에서 사용하는 border의 두께

				// 위에서 선언한 값들을 실제 element에 넣는다.
				element_layer.style.width = width + 'px';
				element_layer.style.height = height + 'px';
				element_layer.style.border = borderWidth + 'px solid';
				// 실행되는 순간의 화면 너비와 높이 값을 가져와서 중앙에 뜰 수 있도록 위치를 계산한다.
				element_layer.style.left = (((window.innerWidth || document.documentElement.clientWidth) - width)/2 - borderWidth) + 'px';
				element_layer.style.top = (((window.innerHeight || document.documentElement.clientHeight) - height)/2 - borderWidth) + 'px';
			}
		</script>
