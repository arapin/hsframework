<?
	$user = new User();

	$userData = array(":id" => $_SESSION["USER_ID"]);
	$rData = $user->userModifyInfo($userData);
	
	$birthdayArray = explode("-",$rData["birthday"]);
?>
<form name="joinForm" method="post" action="?com=user&pro=userinfo">
<input type="hidden" name="mode" value="modify" />
<input type="hidden" name="id" value="<?=$_SESSION["USER_ID"]?>" />
        <!-- 본문 시작 -->
        <div class="sub_content">
            <h3 class="sub_h3">회원정보수정</h3>
            <ul class="l_style_left sub_site_map">
                <li>HOME >&nbsp;</li>
                <li>회원 >&nbsp;</li>
                <li class="text_bold">회원정보수정</li>
            </ul>

            <div class="login_wrap" style="margin-bottom:250px; width:540px; height:730px;">
                <fieldset class="login_form">
                    <legend>점(占) 회원정보 수정하기</legend>

                    <p class="join_info">
                        회원가입을 하면 점(占)<br />
                        <span>이용약관, 개인정보취급방침, 청소년보호정책</span>에 동의하게 됩니다.
                    </p>

                    <p class="join_req">
                        [<span class="req_mark">*</span>]는 필수입력정보입니다.
                    </p>

                    <div class="join_width">
                        <label class="join_label" for="txtID">
                            <img src="/images/li3.gif" alt="" />아이디<span class="req_mark">*</span>
                        </label>
                        <span class="edit_txt"><?=$_SESSION["USER_ID"]?></span>
                        <br />

                        <!--<label class="join_label" for="txtPassword">
                            <img src="/images/li3.gif" alt="" />비밀번호<span class="req_mark">*</span>
                        </label>
                        <input type="password" value="12345678" id="txtPassword" />
                        <br />

                        <label class="join_label" for="txtChkPwd">
                            <img src="/images/li3.gif" alt="" />비밀번호확인<span class="req_mark">*</span>
                        </label>
                        <input type="password" value="12345678" id="txtChkPwd" />
                        <br />-->

                        <label class="join_label" for="txtName">
                            <img src="/images/li3.gif" alt="" />이름(한글)<span class="req_mark">*</span>
                        </label>
                        <input type="text" value="<?=$rData["name"]?>" id="txtName" name="name" />
                        <br />

                        <label class="join_label" for="txtCName">
                            <img src="/images/li3.gif" alt="" />이름(한자)<span class="req_mark">*</span>
                        </label>
                        <input type="text" value="<?=$rData["nameCH"]?>" id="txtCName" name="nameCH" />
                        <br />

                        <label class="join_label" for="txtBirth">
                            <img src="/images/li3.gif" alt="" />생년월일(시)<span class="req_mark">*</span>
                        </label>
                        <input type="text" value="<?=$birthdayArray[0]?>" id="txtBirth" style="width:60px;"  name="birthdayY"/>년
                        <input type="text" value="<?=$birthdayArray[1]?>" style="width:30px;margin-left:6px;"  name="birthdayM"/>월
                        <input type="text" value="<?=$birthdayArray[2]?>" style="width:30px;margin-left:6px;"  name="birthdayD"/>일
                        <select style="width:80px;margin-left:6px;" name="birthdayTime">
                            <option value="00:00" <?if($rData["birthdayTime"] == "00:00"){?>selected<?}?>>00시 00분</option>
                            <option value="00:30" <?if($rData["birthdayTime"] == "00:30"){?>selected<?}?>>00시 30분</option>
                            <option value="01:00" <?if($rData["birthdayTime"] == "01:00"){?>selected<?}?>>01시 00분</option>
                            <option value="01:30" <?if($rData["birthdayTime"] == "01:30"){?>selected<?}?>>01시 30분</option>
                            <option value="02:00" <?if($rData["birthdayTime"] == "02:00"){?>selected<?}?>>02시 00분</option>
                            <option value="02:30" <?if($rData["birthdayTime"] == "02:30"){?>selected<?}?>>02시 30분</option>
                            <option value="03:00" <?if($rData["birthdayTime"] == "03:00"){?>selected<?}?>>03시 00분</option>
                            <option value="03:30" <?if($rData["birthdayTime"] == "03:30"){?>selected<?}?>>03시 30분</option>
                            <option value="04:00" <?if($rData["birthdayTime"] == "04:00"){?>selected<?}?>>04시 00분</option>
                            <option value="04:30" <?if($rData["birthdayTime"] == "04:30"){?>selected<?}?>>04시 30분</option>
                            <option value="05:00" <?if($rData["birthdayTime"] == "05:00"){?>selected<?}?>>05시 00분</option>
                            <option value="05:30" <?if($rData["birthdayTime"] == "05:30"){?>selected<?}?>>05시 30분</option>
                            <option value="06:00" <?if($rData["birthdayTime"] == "06:00"){?>selected<?}?>>06시 00분</option>
                            <option value="06:30" <?if($rData["birthdayTime"] == "06:30"){?>selected<?}?>>06시 30분</option>
                            <option value="07:00" <?if($rData["birthdayTime"] == "07:00"){?>selected<?}?>>07시 00분</option>
                            <option value="07:30" <?if($rData["birthdayTime"] == "07:30"){?>selected<?}?>>07시 30분</option>
                            <option value="08:00" <?if($rData["birthdayTime"] == "08:00"){?>selected<?}?>>08시 00분</option>
                            <option value="08:30" <?if($rData["birthdayTime"] == "08:30"){?>selected<?}?>>08시 30분</option>
                            <option value="09:00" <?if($rData["birthdayTime"] == "09:00"){?>selected<?}?>>09시 00분</option>
                            <option value="09:30" <?if($rData["birthdayTime"] == "09:30"){?>selected<?}?>>09시 30분</option>
                            <option value="10:00" <?if($rData["birthdayTime"] == "10:00"){?>selected<?}?>>10시 00분</option>
                            <option value="10:30" <?if($rData["birthdayTime"] == "10:30"){?>selected<?}?>>10시 30분</option>
                            <option value="11:00" <?if($rData["birthdayTime"] == "11:00"){?>selected<?}?>>11시 00분</option>
                            <option value="11:30" <?if($rData["birthdayTime"] == "11:30"){?>selected<?}?>>11시 30분</option>
                            <option value="12:00" <?if($rData["birthdayTime"] == "12:00"){?>selected<?}?>>12시 00분</option>
                            <option value="12:30" <?if($rData["birthdayTime"] == "12:30"){?>selected<?}?>>12시 30분</option>
                            <option value="13:00" <?if($rData["birthdayTime"] == "13:00"){?>selected<?}?>>13시 00분</option>
                            <option value="13:30" <?if($rData["birthdayTime"] == "13:30"){?>selected<?}?>>13시 30분</option>
                            <option value="14:00" <?if($rData["birthdayTime"] == "14:00"){?>selected<?}?>>14시 00분</option>
                            <option value="14:30" <?if($rData["birthdayTime"] == "14:30"){?>selected<?}?>>14시 30분</option>
                            <option value="15:00" <?if($rData["birthdayTime"] == "15:00"){?>selected<?}?>>15시 00분</option>
                            <option value="15:30" <?if($rData["birthdayTime"] == "15:30"){?>selected<?}?>>15시 30분</option>
                            <option value="16:00" <?if($rData["birthdayTime"] == "16:00"){?>selected<?}?>>16시 00분</option>
                            <option value="16:30" <?if($rData["birthdayTime"] == "16:30"){?>selected<?}?>>16시 30분</option>
                            <option value="17:00" <?if($rData["birthdayTime"] == "17:00"){?>selected<?}?>>17시 00분</option>
                            <option value="17:30" <?if($rData["birthdayTime"] == "17:30"){?>selected<?}?>>17시 30분</option>
                            <option value="18:00" <?if($rData["birthdayTime"] == "18:00"){?>selected<?}?>>18시 00분</option>
                            <option value="18:30" <?if($rData["birthdayTime"] == "18:30"){?>selected<?}?>>18시 30분</option>
                            <option value="19:00" <?if($rData["birthdayTime"] == "19:00"){?>selected<?}?>>19시 00분</option>
                            <option value="19:30" <?if($rData["birthdayTime"] == "19:30"){?>selected<?}?>>19시 30분</option>
                            <option value="20:00" <?if($rData["birthdayTime"] == "20:00"){?>selected<?}?>>20시 00분</option>
                            <option value="20:30" <?if($rData["birthdayTime"] == "20:30"){?>selected<?}?>>20시 30분</option>
                            <option value="21:00" <?if($rData["birthdayTime"] == "21:00"){?>selected<?}?>>21시 00분</option>
                            <option value="21:30" <?if($rData["birthdayTime"] == "21:30"){?>selected<?}?>>21시 30분</option>
                            <option value="22:00" <?if($rData["birthdayTime"] == "22:00"){?>selected<?}?>>22시 00분</option>
                            <option value="22:30" <?if($rData["birthdayTime"] == "22:30"){?>selected<?}?>>22시 30분</option>
                            <option value="23:00" <?if($rData["birthdayTime"] == "23:00"){?>selected<?}?>>23시 00분</option>
                            <option value="23:30" <?if($rData["birthdayTime"] == "23:30"){?>selected<?}?>>23시 30분</option>
                        </select>시
                        <label class=""><input type="radio" checked="checked" name="birthdayType" value="P" <?if($rData["birthdayType"] == "P"){?>checked<?}?>/>양력</label>
                        <label><input type="radio" name="birthdayType" value="M" <?if($rData["birthdayType"] == "M"){?>checked<?}?>/>음력</label>

                        <label class="join_label" for="txtZipCode">
                            <img src="/images/li3.gif" alt="" />주소<span class="req_mark">*</span>
                        </label>
                        <input type="text" value="<?=$rData["zipcode"]?>" style="width:80px;" name="zipcode" id="zipcode"/>
                        <input type="button" value="우편번호 검색" class="btn9_1" /><br />
                        <input type="text" value="<?=$rData["address"]?>" style="width:390px; margin-left:103px;" name="address" id="address"/><br />
                        <input type="text" value="<?=$rData["address2"]?>" style="width:390px; margin-left:103px;" name="address2" id="address2"/>
                        <br />

                        <label class="join_label" for="txtPhone">
                            <img src="/images/li3.gif" alt="" />휴대폰번호<span class="req_mark">*</span>
                        </label>
                        <input type="text" value="<?=$rData["phone"]?>" id="txtPhone" style="width:150px;" id="phone" name="phone"/>
                        <br />

                        <label class="join_label" for="txtEmail">
                            <img src="/images/li3.gif" alt="" />이메일<span class="req_mark">*</span>
                        </label>
                        <input type="text" value="<?=$rData["email"]?>" id="txtEmail" style="width:390px;" name="email"/>
                    </div>
                </fieldset>

                <div class="login_width">
                    <input type="button" class="btn8" value="회원정보수정" style="margin:20px 0px 0px;" onclick="form_chk_modify();" />
                </div>
            </div>
        </div>
        <!-- 본문 끝 -->
		</form>
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
							alert(data.zonecode);
							document.joinForm.zipcode.value = data.zonecode;
							$('#address').val(fullAddr);
							$('#address2').focus();
						}
					}).open();
				}
			</script>
