<?
	$shmypage = new SHMypage();

	$shamanData = array(":SHId" => $_SESSION["SH_ID"]);
	$rData = $shmypage->shamanModifyInfo($shamanData);

	//$startTimeArray = explode(":", $rData["SHStartTime"]);
	//$endTimeArray = explode(":", $rData["SHEndTime"]);

	$fileData = array(":parentId" => $_SESSION["SH_ID"], ":type" => "shaman");
	$fileList = $shmypage->getFileInfoListView($fileData);

	$fileData2 = array(":parentId" => $_SESSION["SH_ID"], ":type" => "profile");
	$profileData = $shmypage->getProfileInfoListView($fileData2);

	$sprData = array(":SHIdx" => $rData["idx"]);
	$sprList = $shmypage->getSprInfoListView($sprData);

	$limitList = $shmypage->getLimitDayInfoListView($sprData);

	$productSelect = $shmypage->getProductSelectinfo();
?>
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script src="/js/jquery.form.min.js"></script>
<script>

	function setCal(vType, idx){
		if(vType == 'limitDate'){
			$calObj1 = $('#limitSDate'+idx);
			$calObj2 = $('#limitEDate'+idx);
		}

		$calObj1.datepicker({
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

		$calObj2.datepicker({
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

	}
</script>

<form name="joinForm" method="post" action="?com=shMypage&pro=shMypageInfo" enctype="multipart/form-data">
<input type="hidden" name="mode" value="shamanModify" />
<input type="hidden" name="SHId" value="<?=$rData["SHId"]?>" />
<input type="hidden" name="SHPwd" value="<?=$rData["SHPwd"]?>" />
<input type="hidden" name="SHLng" value="<?=$rData["SHLng"]?>"/>
<input type="hidden" name="SHLat" value="<?=$rData["SHLat"]?>"/>
<input type="hidden" name="SHIdx" value="<?=$rData["idx"]?>"/>

	   <!-- 본문 시작 -->
        <div class="sub_content sub_content_max">
            <h3 class="sub_h3">입점관리</h3>
            <ul class="l_style_left sub_site_map">
                <li>HOME >&nbsp;</li>
                <li>마이페이지 >&nbsp;</li>
                <li class="text_bold">입점관리</li>
            </ul>

            <fieldset class="sj_field_wrap" style="padding-top:30px;">
                <legend class="float_left"><img src="/images/li1.gif" alt="" />회원정보</legend>
                <input type="button" value="내 점집 보기" style="margin-top:-10px;" class="sj_btn1 float_right" onclick="goShamanHome('<?=$_SESSION["SH_ID"]?>');"/>

                <div class="sj_ctl_wrap">
                    <ul class="sj_ctl_list" style="width:430px;">
                        <li>
                            <label class="ctl_title">아이디<span class="txt_ess">*</span></label>
                            <span style="display:inline-block;height:30px;vertical-align:middle;line-height:30px;color:#46d"><?=$rData["SHId"]?></span>
                        </li>
                        <li>
                            <label class="ctl_title" for="txtPwd">비밀번호<span class="txt_ess">*</span></label>
                            <input type="password" id="txtPwd" name="SHPwdU" value="" />
                        </li>
                        <li>
                            <label class="ctl_title" for="txtRePwd">비밀번호확인<span class="txt_ess">*</span></label>
                            <input type="password" id="txtRePwd" name="SHPwdUConfirm" value="" />
                        </li>
                        <li>
                            <label class="ctl_title" for="txtName">무속인명<span class="txt_ess">*</span></label>
                            <input type="text" id="txtName" name="name" value="<?=$rData["name"]?>" />
                        </li>
                        <li>
                            <label class="ctl_title" for="txtComName">상호명<span class="txt_ess">*</span></label>
                            <input type="text" id="txtComName" name="SHName" value="<?=$rData["SHName"]?>" />
                        </li>
                        <li>
                            <label class="ctl_title" for="txtPhone">전화번호<span class="txt_ess">*</span></label>
                            <input type="text" id="txtPhone" name="SHTel" value="<?=$rData["SHTel"]?>" />
                        </li>
                    </ul>

                    <ul class="sj_ctl_list">
                        <li>
                            <label class="ctl_title" for="txtZipCode">주소<span class="txt_ess">*</span></label>
                            <input type="text" style="width:80px;" id="txtZipCode" value="<?=$rData["SHZipcode"]?>" name="SHZipcode" id="zipcode" />
                            <input type="button" value="우편번호검색" class="sj_zip_btn" onclick="execDaumPostcode()"/>
                            <input type="text" style="width:390px;display:block;margin:10px 0px;" name="SHAddress" value="<?=$rData["SHAddress"]?>" id="address"/>
                            <input type="text" style="width:390px;display:block;" name="SHAddress2" value="<?=$rData["SHAddress2"]?>" id="address2"/>
                        </li>
                        <li>
                            <label class="ctl_title" for="txtHandPhone">휴대폰번호<span class="txt_ess">*</span></label>
                            <input type="text" id="txtHandPhone" name="SHPhone" value="<?=$rData["SHPhone"]?>" />
                        </li>
                        <li>
                            <label class="ctl_title" for="txtEmail">이메일</label>
                            <input type="text" style="width:390px;" id="txtEmail" name="SHEmail" value="<?=$rData["SHEmail"]?>" />
                        </li>
                    </ul>
                </div>
            </fieldset>

            <div style="text-align:center;">
                <input type="button" value="저장하기" style="width:100px;margin-right:5px;" class="sj_btn4" onclick="form_chk_info()"/>
                <!--<input type="button" value="취소" style="width:100px;" class="sj_btn2" />-->
            </div>

            <p></p>


            <fieldset class="sj_field_wrap">
                <legend><img src="/images/li1.gif" alt="" />입점페이지 정보</legend>

                <div class="sj_ctl_wrap" style="padding-top:0px;">
                    <ul class="sj_ctl_list sj_ctl_list_ex">
                        <!--<li style="padding-top:9px; padding-bottom:9px;">
                            <label class="ctl_title_ex"><img src="/images/li3.gif" alt="" />대표신점<span class="txt_ess">*</span></label>
                            <div class="sj_chk_list">
                                <label><input type="checkbox" />애정</label>
                                <label><input type="checkbox" />궁합</label>
                                <label><input type="checkbox" />사업</label>
                                <label><input type="checkbox" />재물</label>
                                <label><input type="checkbox" />사주</label>
                                <label><input type="checkbox" />취업</label>
                                <label><input type="checkbox" />해몽</label>
                                <label><input type="checkbox" />이사</label>
                                <label><input type="checkbox" />풍수</label>
                                <label><input type="checkbox" />결혼</label>
                                <label><input type="checkbox" />택일</label>
                                <label><input type="checkbox" />작명</label>
                                <label><input type="checkbox" />개명</label>
                                <label><input type="checkbox" />시험</label>
                                <label><input type="checkbox" />가족</label>
                                <label><input type="checkbox" />건강</label>
                            </div>
                        </li>-->
                        <li>
                            <label class="ctl_title_ex" style="padding-top:1px;" for="txtIntro"><img src="/images/li3.gif" alt="" />상세 설명<span class="txt_ess">*</span></label>
                            <textarea style="height:200px;" id="txtIntro" name="SHDesc"><?=$rData["SHDesc"]?></textarea>
                        </li>
                        <li style="padding-top:13px; padding-bottom:13px;">
                            <label class="ctl_title_ex" for="txtIntro"><img src="/images/li3.gif" alt="" />가격<span class="txt_ess">*</span></label>
                            <div class="sj_opt_list">
                                <ul id="priceUl">
									<?
										if($sprList != ""){
										 echo $sprList;
										}else{
									?>
									<li>
										<select name="proIdx[]">
										<?=$productSelect?>
										</select>
										<select name="proTime[]">
											<option value="30">30분</option>
											<option value="60">1시간</option>
											<option value="90">1시간30분</option>
											<option value="120">2시간</option>
											<option value="150">2시간30분</option>
											<option value="180">3시간</option>
											<option value="210">3시간30분</option>
											<option value="240">4시간</option>
											<option value="270">4시간30분</option>
											<option value="300">5시간</option>
											<option value="330">5시간30분</option>
											<option value="360">6시간</option>
											<option value="390">6시간30분</option>
											<option value="420">7시간</option>
											<option value="450">7시간30분</option>
											<option value="480">8시간</option>
										</select>
                                        <input type="text" value="" name="price[]" /><span>원/1명</span>
                                    </li>
									<?}?>
                                </ul>
								<input type="button" value="항목추가하기" class="sj_btn3" onclick="addItem();"/>
                            </div>
                        </li>
                        <li style="padding-top:13px; padding-bottom:13px;">
                            <label class="ctl_title_ex" for="txtIntro"><img src="/images/li3.gif" alt="" />예약 조건<span class="txt_ess">*</span></label>
                            <div class="sj_opt_list sj_opt_list_ex">
                                <ul>
                                    <li>
                                        <label>
                                            <span>예약가능시간 :</span>
                                            <select style="width:100px" name="SHStartTime">
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
                                            &nbsp;&nbsp;~&nbsp;&nbsp;
                                            <select style="width:100px" name="SHEndTime">
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
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <span>휴식시간 :</span>
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
                                            &nbsp;&nbsp;~&nbsp;&nbsp;
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
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </li>
						<li style="padding-top:7px; padding-bottom:13px;">
                            <label class="ctl_title_ex" for="txtIntro"><img src="/images/li3.gif" alt="" />예약 제한 일자</label>
                            <div class="sj_opt_list" id="limitDiv">
							<?if($limitList != ""){?>
							<?=$limitList?>
							<?}else{?>
								<div><input type="text" name="limitSDate[]" id="limitSDate1" value="" /> ~ <input type="text" name="limitEDate[]" id="limitEDate1" value="" /></div>
								<script>setCal('limitDate','1')</script>
							<?}?>
							</div>
							<div style="margin-top:5px;"><input type="button" value="항목추가하기" class="sj_btn3" onclick="addDateItem();"/></div>
						</li>
                        <!--<li style="padding-top:7px; padding-bottom:15px;">
                            <label class="ctl_title_ex" for="txtIntro"><img src="/images/li3.gif" alt="" />예약날짜선택<span class="txt_ess">*</span></label>
                            <p class="sj_help_txt">
                                ※ 최대 3개월 단위로 날짜 선택가능하며 선택된 날짜에만 회원이 예약가능합니다. <span class="sj_help_txt2">회원이 예약한 날짜</span>는 해제가 안되며 예약관리에서 취소해주세요.
                            </p>
                            <div>
                                <div class="cld_wrap float_left" style=" height:335px; margin-right:15px;">

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

                                    <div style="color:#777; font-size:12px;">
                                        <input type="button" class="cld_btn1 float_left" value="전체 선택" />
                                        <input type="button" class="cld_btn1 cld_btn1_ex float_left" value="전체 제거" />
                                        <span class="float_right" style="padding:15px 10px 0px 0px;">3일 전에 업데이트 됨</span>
                                    </div>
                                </div>


                                <div class="cld_wrap float_left" style=" height: 335px; margin-right: 15px;">

                                    <table class="cld_skin">
                                        <caption>2015년 11월(NOV)</caption>
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
                                                <td class="cld_normal"><a href="">1</a></td>
                                                <td class="cld_normal"><a href="">2</a></td>
                                                <td class="cld_normal"><a href="">3</a></td>
                                            </tr>
                                            <tr>
                                                <td class="cld_normal"><a href="">4</a></td>
                                                <td class="cld_normal"><a href="">5</a></td>
                                                <td class="cld_normal"><a href="">6</a></td>
                                                <td class="cld_normal"><a href="">7</a></td>
                                                <td class="cld_normal"><a href="">8</a></td>
                                                <td class="cld_normal"><a href="">9</a></td>
                                                <td class="cld_normal"><a href="">10</a></td>
                                            </tr>
                                            <tr>
                                                <td class="cld_normal"><a href="">11</a></td>
                                                <td class="cld_normal"><a href="">12</a></td>
                                                <td class="cld_normal"><a href="">13</a></td>
                                                <td class="cld_normal"><a href="">14</a></td>
                                                <td class="cld_normal"><a href="">15</a></td>
                                                <td class="cld_normal"><a href="">16</a></td>
                                                <td class="cld_normal"><a href="">17</a></td>
                                            </tr>
                                            <tr>
                                                <td class="cld_normal"><a href="">18</a></td>
                                                <td class="cld_normal"><a href="">19</a></td>
                                                <td class="cld_normal"><a href="">20</a></td>
                                                <td class="cld_bday"><a href="">21</a></td>
                                                <td class="cld_normal"><a href="">22</a></td>
                                                <td class="cld_normal"><a href="">23</a></td>
                                                <td class="cld_normal"><a href="">24</a></td>
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

                                    <div style="color:#777; font-size:12px;">
                                        <input type="button" class="cld_btn1 float_left" value="전체 선택" />
                                        <input type="button" class="cld_btn1 cld_btn1_ex float_left" value="전체 제거" />
                                        <span class="float_right" style="padding:15px 10px 0px 0px;">2일 전에 업데이트 됨</span>
                                    </div>
                                </div>


                                <div class="cld_wrap float_left" style=" height:335px;">

                                    <table class="cld_skin">
                                        <caption>2015년 12월(DEC)</caption>
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
                                                <td class="cld_normal"><a href="">1</a></td>
                                                <td class="cld_normal"><a href="">2</a></td>
                                                <td class="cld_normal"><a href="">3</a></td>
                                            </tr>
                                            <tr>
                                                <td class="cld_normal"><a href="">4</a></td>
                                                <td class="cld_normal"><a href="">5</a></td>
                                                <td class="cld_normal"><a href="">6</a></td>
                                                <td class="cld_normal"><a href="">7</a></td>
                                                <td class="cld_normal"><a href="">8</a></td>
                                                <td class="cld_normal"><a href="">9</a></td>
                                                <td class="cld_normal"><a href="">10</a></td>
                                            </tr>
                                            <tr>
                                                <td class="cld_normal"><a href="">11</a></td>
                                                <td class="cld_normal"><a href="">12</a></td>
                                                <td class="cld_normal"><a href="">13</a></td>
                                                <td class="cld_normal"><a href="">14</a></td>
                                                <td class="cld_normal"><a href="">15</a></td>
                                                <td class="cld_normal"><a href="">16</a></td>
                                                <td class="cld_normal"><a href="">17</a></td>
                                            </tr>
                                            <tr>
                                                <td class="cld_normal"><a href="">18</a></td>
                                                <td class="cld_normal"><a href="">19</a></td>
                                                <td class="cld_normal"><a href="">20</a></td>
                                                <td class="cld_bday"><a href="">21</a></td>
                                                <td class="cld_normal"><a href="">22</a></td>
                                                <td class="cld_normal"><a href="">23</a></td>
                                                <td class="cld_normal"><a href="">24</a></td>
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

                                    <div style="color:#777; font-size:12px;">
                                        <input type="button" class="cld_btn1 float_left" value="전체 선택" />
                                        <input type="button" class="cld_btn1 cld_btn1_ex float_left" value="전체 제거" />
                                        <span class="float_right" style="padding:15px 10px 0px 0px;">1일 전에 업데이트 됨</span>
                                    </div>
                                </div>
                            </div>
                        </li>-->

                        <li style="padding-top:9px; padding-bottom:15px; padding-right:12px; border:none;">
                            <label class="ctl_title_ex" style="padding-top:1px;" for="txtMemo"><img src="/images/li3.gif" alt="" />선생님 알림장<span class="txt_ess">*</span></label>
                            <textarea style="height:120px;" id="txtMemo" name="SHWord"><?=$rData["SHWord"]?></textarea>
                        </li>
</form>
                    </ul>
                </div>
            </fieldset>



            <div style="text-align:center;">
                <input type="button" value="저장하기" style="width:100px;margin-right:5px;" class="sj_btn4" onclick="form_chk_info()"/>
                <!--<input type="button" value="취소" style="width:100px;" class="sj_btn2" />-->
            </div>


            <p></p>


            <fieldset class="sj_field_wrap">
                <legend><img src="/images/li1.gif" alt="" />이미지 정보</legend>

                <div class="sj_ctl_wrap" style="padding-top:0px;">
                    <ul class="sj_ctl_list sj_ctl_list_ex">

<form id="proFileForm" name="proFileForm" method="post" action="?com=shMypage&pro=shMypageInfo" enctype="multipart/form-data" target="fileFrame">
<input type="hidden" name="mode" value="saveProfile" />
<input type="hidden" name="SHId" value="<?=$rData["SHId"]?>" />

                        <li>
                            <label class="ctl_title_ex" for="filePhoto"><img src="/images/li3.gif" alt="" />선생님 이미지<span class="txt_ess">*</span></label>
                            <div>
                                <div class="float_left">
                                    <img class="float_left" style="margin-right:20px;border-radius:49px; width:100px; height:100px;" src="/upload/shaman/<?=$profileData["saveName"]?>" alt="" onerror="this.src = '/images/no_photo.jpg'" />
                                    <output id="viewFilePhoto"></output>
                                </div>
                                <div class="float_left">
                                    <div style="height:35px;padding-top:5px;" class="sj_help_txt">
                                        ※ 추천사이즈 : <span class="sj_help_txt2">100×100</span> px &nbsp; &nbsp; ※ <span class="sj_help_txt2">선택하신 이미지</span>를 미리 확인하실 수 있습니다.
                                    </div>
                                    <input type="file" id="filePhoto" name="profile" multiple /> &nbsp; <input type="button" value="저장" class="sj_btn1 float_right" onclick="saveImg2();" />
                                </div>
                            </div>
                        </li>
</form>


                        <li style="padding-top:9px; padding-bottom:15px; padding-right:12px; border:none;">
                            <div><label class="ctl_title_ex"><img src="/images/li3.gif" alt="" />점집 홍보사진<span class="txt_ess">*</span></label></div>
                            <p class="sj_help_txt float_left">
                                ※ 대표사진 추천사이즈 : <span class="sj_help_txt2">1280×700, 960×640</span> px  <!--사진을 선택한 후 <span class="sj_help_txt2">수정</span> 버튼을 클릭하면 사진과 제목을 수정할 수 있습니다.-->
                            </p>
                            <p class="float_right">총 사진수 : <span style="color:#333;"><?=$shmypage->totalImg?></span></p>

                            <div class="sj_photo_list">
							<?=$fileList?>
                            </div>

                            <div>
                                <div style="text-align:center;letter-spacing:2px;">
                                    <input type="button" value="선택삭제" class="sj_btn2" onclick="checkImgDel();"/>
                                    <!--<input type="button" value="수정" class="sj_btn3" />-->
                                    <input type="button" value="저장" class="sj_btn1 float_right" onclick="saveImg();"/>
                                </div>

                                <input type="button" value="대표사진수정" class="sj_btn3 float_left" style="margin-top:-30px;" onclick="setMainImg();"/>

                                <!-- <input type="button" value="전체삭제" class="sj_btn2 float_right" style="margin-top:-30px;" /> -->
                            </div>
							<form id="fileForm" name="fileForm" method="post" action="?com=shMypage&pro=shMypageInfo" enctype="multipart/form-data" target="fileFrame">
							<input type="hidden" name="mode" value="saveFile" />
							<input type="hidden" name="SHId" value="<?=$rData["SHId"]?>" />
                            <label style="clear:both;display:block;color:#666; padding-top:30px;">
                                사진 추가하기 : <input type="file" name="imgFile[]" />
                            </label>
							</form>
							<iframe name="fileFrame" src="about:blank" frameborder="0" width="0" height="0" marginwidth="0" marginheight="0" scrolling="no" title="내용없음"></iframe>

                        </li>
                    </ul>
                </div>
            </fieldset>


            <input type="button" value="내 점집 보기" style="margin:-20px 0px 50px 0px;" class="sj_btn1 float_right" onclick="goShamanHome('<?=$_SESSION["SH_ID"]?>');"/>
        </div>
        <!-- 본문 끝 -->



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
				$('#zipcode').val(data.zonecode);
				$('#address').val(fullAddr);
				$('#address2').focus();
				codeAddress();
			}
		}).open();
	}
</script>