<?
	$user = new User();

	$id = Request::get('id', Request::GET | Request::XSS_CLEAR);

	$setBeen = array(":id" => $id);
	$rData = $user->userModifyInfo($setBeen);
	$birthdayArray = explode("-",$rData["birthday"]);

?>
            <div class="breadcrumbs clearfix">
                <ul class="breadcrumbs left">
                    <li><a href="#">SAN SIN GAK ADMIN</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>회원 관리</li>
                </ul>
                <!--<a href="#" class="btn right"><i class="fa fa-caret-square-o-left"></i>EXPORT</a>-->
            </div>

            <form id="file-upload" class="upload"  name="joinForm" method="post" action="?com=user&pro=userinfo&mng=Y" onsubmit="return form_chk_modify();">
<input type="hidden" name="mode" value="modify" />
<input type="hidden" name="id" value="<?=$id?>" />
<input type="hidden" value="<?=$rData["nameCH"]?>" name="nameCH" />

                <h3>회원 수정</h3>
                <div class="inner clearfix">
                    <fieldset class="error">
                        <label for="field1">아이디</label>
                        <div class="field">
                            <input type="text" placeholder="아이디" id="field1" class="transform_cancel" name="id" value="<?=$rData["id"]?>" readonly>
                        </div>
                    </fieldset>
                     <fieldset class="error">
                        <label for="field1">비밀번호</label>
                        <div class="field">
                            <input type="password" placeholder="비밀번호" id="field1" name="pwd" value="">
                        </div>
                    </fieldset>
                     <fieldset class="error">
                        <label for="field1">비밀번호 확인</label>
                        <div class="field">
                            <input type="password" placeholder="비밀번호" id="field1" name="pwdConfirm" value="">
                        </div>
                    </fieldset>
                     <fieldset class="error">
                        <label for="field1">이름</label>
                        <div class="field">
                            <input type="text" placeholder="이름" name="name" value="<?=$rData["name"]?>">
                        </div>
                    </fieldset>
                     <fieldset class="error">
                        <label for="field1">생년월일</label>
                        <div class="field">
                            <input type="text" placeholder="년" name="birthdayY" value="<?=$birthdayArray[0]?>" style="width:100px;">
                            <input type="text" placeholder="월" name="birthdayM" value="<?=$birthdayArray[1]?>" style="width:100px;">
                            <input type="text" placeholder="일" name="birthdayD" value="<?=$birthdayArray[2]?>" style="width:100px;">
							<br/>
                            <input type="radio" data-label="음력" name="birthdayType" value="M" <?if($rData["birthdayType"] == "M"){?>checked<?}?>>
                            <input type="radio" data-label="양력" name="birthdayType" value="P" <?if($rData["birthdayType"] == "P"){?>checked<?}?>>
                        </div>
                    </fieldset>
                     <fieldset class="error">
                        <label for="field1">탄생 시분</label>
                        <div class="field">
                       <select class="chosen-select" name="birthdayTime">
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
                        </select>                      
						</div>
                    </fieldset>
                    <fieldset class="error">
                        <label for="field1">휴대번호</label>
                        <div class="field">
                            <input type="text" placeholder="- 는 빼고 입력하여 주십시요" id="phone" name="phone" value="<?=$rData["phone"]?>">
                        </div>
                    </fieldset>
                    <fieldset class="error">
                        <label for="field1">우편번호</label>
                        <div class="field" style="white-space:nowrap;">
                            <span><input type="text" placeholder="우편번호" name="zipcode" id="zipcode" value="<?=$rData["zipcode"]?>" style="width:100px;disply:inline;" readonly></span><span><input type="button" value="우편번호 찾기" class="hsBtnGreen" onclick="execDaumPostcode()"/></span>
                        </div>
                    </fieldset>
                    <fieldset class="error">
                        <label for="field1">주소</label>
                        <div class="field" style="white-space:nowrap;">
                            <input type="text" placeholder="우편번호를 검색하여 주십시요" name="address" id="address" value="<?=$rData["address"]?>" readonly><br/>
							<input type="text" placeholder="상세주소" name="address2" id="address2" value="<?=$rData["address2"]?>">
                        </div>
                    </fieldset>
                    <fieldset class="error">
                        <label for="field1">이메일</label>
                        <div class="field" style="white-space:nowrap;">
                            <input type="text" placeholder="이메일" name="email" id="email" value="<?=$rData["email"]?>" >
                        </div>
                    </fieldset>
												

                    <input type="submit" value="저장" class="right">
                    <a href="#" class="cancel right" onclick="location.href='?com=user&lnd=list&mng=Y'">목록으로</a>
                </div>
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
							$('#zipcode').val(data.zonecode);
							$('#address').val(fullAddr);
							$('#address2').focus();
						}
					}).open();
				}
			</script>

