<script src="https://maps.googleapis.com/maps/api/js"></script>
<form name="joinForm" method="post" action="?com=shaman&pro=shamaninfo">
<input type="hidden" name="mode" value="join" />
<input type="hidden" name="idChk" value="N" />
<input type="hidden" name="SHLng" value=""/>
<input type="hidden" name="SHLat" value=""/>

        <!-- 본문 시작 -->
        <div class="sub_content" style="margin-left:0px; width:540px;">
            <h3 class="sub_h3">입점하기</h3>
            <ul class="l_style_left sub_site_map">
                <li>HOME >&nbsp;</li>
                <li class="text_bold">입점하기</li>
            </ul>

            <div class="login_wrap" style="margin-bottom:40px; width:540px; height:785px; margin-top:50px;">
                <fieldset class="login_form">
                    <legend>점(占) 입점 신청하기</legend>

                    <p class="join_info">
                        무속인 입점 신청을 하면 점(占)의<br />
                        <span class="shop_join_rules"><a href="/html/rules/service.html">이용약관</a>, <a href="/html/rules/privacy.html">개인정보취급방침</a>, <a href="/html/rules/youthpolicy.html">청소년보호정책</a></span>에 동의하게 됩니다.
                    </p>

                    <p class="join_info">
                        ※ 이곳은 무속인들의 입점 신청 공간입니다.<br />
                        만약 <span style="color:red">일반 회원</span>이시라면 '<a href="?com=user&lnd=join" style="text-decoration:none;color:blue">회원가입</a>'를 클릭해 주세요.
                    </p>

                    <p class="join_req">
                        [<span class="req_mark">*</span>]는 필수입력정보입니다.
                    </p>

                    <div class="join_width">
                        <label class="join_label" for="txtID">
                            <img src="/images/li3.gif" alt="" />아이디<span class="req_mark">*</span>
                        </label>
                        <input type="text" id="txtID" name="SHId"/>
                        <input type="button" onclick="checkIdFront();" value="ID중복확인" class="btn9" />
                        <br />

                        <label class="join_label" for="txtPassword">
                            <img src="/images/li3.gif" alt="" />비밀번호<span class="req_mark">*</span>
                        </label>
                        <input type="password" id="txtPassword" name="SHPwd"/>
                        <br />

                        <label class="join_label" for="txtChkPwd">
                            <img src="/images/li3.gif" alt="" />비밀번호확인<span class="req_mark">*</span>
                        </label>
                        <input type="password" id="txtChkPwd" name="SHPwdConfirm"/>
                        <br />

                        <label class="join_label" for="txtName">
                            <img src="/images/li3.gif" alt="" />무속인명<span class="req_mark">*</span>
                        </label>
                        <input type="text" id="txtName" name="name"/>
                        <br />

                        <label class="join_label" for="txtShopName">
                            <img src="/images/li3.gif" alt="" />상호명<span class="req_mark">*</span>
                        </label>
                        <input type="text" id="txtShopName" name="SHName"  />
                        <br />

                        <label class="join_label" for="txtZipCode">
                            <img src="/images/li3.gif" alt="" />주소<span class="req_mark">*</span>
                        </label>
                        <input type="text" id="txtZipCode" style="width:80px;" name="SHZipcode" id="zipcode" value=""/>
                        <input type="button" value="우편번호 검색" class="btn9_1" onclick="execDaumPostcode()"/><br />
                        <input type="text" style="width:390px; margin-left:103px;" name="SHAddress" id="address"/><br />
                        <input type="text" style="width:390px; margin-left:103px;" name="SHAddress2" id="address2"/>
                        <br />

                        <label class="join_label" for="txtPhone">
                            <img src="/images/li3.gif" alt="" />휴대폰번호<span class="req_mark">*</span>
                        </label>
                        <input type="text" id="txtPhone" style="width:150px;" name="SHPhone"/>
                        <br />

                        <label class="join_label" for="txtEmail">
                            <img src="/images/li3.gif" alt="" />이메일
                        </label>
                        <input type="text" id="txtEmail" style="width:390px;" name="SHEmail" />
                    </div>
                </fieldset>

                <div class="login_width">
                    <input type="button" class="btn8" value="입점 신청하기" style="margin:20px 0px 0px;background:#3b9;" onclick="form_chk_front();"/>
                    <p>
                        <img src="/images/li3.gif" alt="" />이미 점(占) 무속인 회원이시면 <a href="?com=user&lnd=login" style="color:#0a8;">로그인</a>하세요
                    </p>
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
				document.joinForm.SHZipcode.value = data.zonecode;
				$('#address').val(fullAddr);
				$('#address2').focus();
				codeAddress();
			}
		}).open();
	}
</script>