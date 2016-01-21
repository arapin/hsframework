<form name="joinForm" method="post" action="?com=user&pro=userinfo">
<input type="hidden" name="mode" value="join" />
<input type="hidden" name="idChk" value="N" />
<input type="hidden" name="phoneChk" value="N" />
<input type="hidden" id="txtCName" name="nameCH" value=""/>
<input type="hidden" id="txtCName" name="birthdayType" value=""/>
<input type="hidden" id="txtCName" name="birthdayY" value=""/>
<input type="hidden" id="txtCName" name="birthdayM" value=""/>
<input type="hidden" id="txtCName" name="birthdayD" value=""/>
<input type="hidden" id="txtCName" name="birthdayTime" value=""/>
        <fieldset class="login_field" style="padding:20px 17px 25px 17px;">
            <div class="id_search_guide">
                회원가입을 하면 점(占)의<br />
                <a href="" class="link1">이용약관</a>, 
                <a href="" class="link1">개인정보취급방침</a>, 
                <a href="" class="link1">청소년보호정책</a> 에<br />
                동의하게 됩니다.
            </div>

            <div style="display:table; width:100%;">
                <div style="display: table-cell; padding-right: 10px;">
                    <input type="text" placeholder="아이디" name="id" onkeyup="checkIdString();"/>
                </div>
                <!--<div style="display: table-cell; width: 100px; vertical-align: middle;">
                    <input type="button" value="중복확인" class="btn_6" style="margin-bottom:10px;" />
                </div>-->
				<span class="chkResult error-alert" id="00" style="display:none;color:blue;font-size:9pt;font-weight:bold;">사용 하실수 있는 아이디 입니다.</span>
				<span class="chkResult error-alert" id="01" style="display:none;color:red;font-size:9pt;font-weight:bold;">아이디는 4글자 이상으로 입력하여 주십시요.</span>
				<span class="chkResult error-alert" id="02" style="display:none;color:red;font-size:9pt;font-weight:bold;">아이디의 첫글자는 영문이어야 합니다.</span>
				<span class="chkResult error-alert" id="03" style="display:none;color:red;font-size:9pt;font-weight:bold;">아이디는 영문, 숫자, -, _ 만 사용할 수 있습니다.</span>
				<span class="chkResult error-alert" id="04" style="display:none;color:red;font-size:9pt;font-weight:bold;">이미 존재하는 아이디 입니다.</span>

            </div>
            <input type="password" placeholder="비밀번호" name="pwd"/>
            <input type="password" placeholder="비밀번호 확인" name="pwdConfirm"/>
            <input type="text" placeholder="이름(한글)" name="name"/>

            <div>
                <input type="text" value="" name="zipcode" style="width:120px; float:left;margin:0px 10px 10px 0px;" />
                <input type="button" value="우편번호 찾기" class="btn_6" style="width:110px; float:left; margin-bottom:10px;" onclick="execDaumPostcode()"/>
            </div>

            <input type="text" placeholder="기본주소" readonly name="address" id="address"/>
            <input type="text" placeholder="상세주소" name="address2" id="address2"/>

            <!--<input type="text" placeholder="휴대폰번호 - 생략, 숫자만 입력" id="phone" name="phone"/>-->

            <div style="display:table; width:100%;">
                <div style="display: table-cell; padding-right: 10px;">
                    <input type="text" placeholder="휴대폰번호 - 생략, 숫자만 입력" id="phone" name="phone"/>
                </div>
                <div style="display: table-cell; width: 100px; vertical-align: middle;">
                    <input type="button" value="본인인증" class="btn_6" style="margin-bottom:10px;" onclick="getPhoneChkM()"/>
                </div>
            </div>
            <div style="display:none; width:100%;" id="authArea">
                <div style="display: table-cell; padding-right: 10px;">
                    <input type="text" placeholder="인증번호를 입력하세요" id="authNum"/>
                </div>
                <div style="display: table-cell; width: 100px; vertical-align: middle;">
                    <input type="button" value="인증확인" class="btn_6" style="margin-bottom:10px;" onclick="chkAuthM();"/>
                </div>
            </div>

            <input type="text" placeholder="이메일" name="email" id="email"/>

            <input type="button" value="회원가입" style="margin-top:10px;" class="btn_3" onclick="form_chk();"/>

            <div style="text-align:center;padding:20px 0px;">
                이미 점(占) 회원이시면 <a href="?com=user&lnd=login" class="link1">로그인</a> 하세요.
            </div>
        </fieldset>
</form>
		<div id="layer" style="display:none;position:fixed;overflow:hidden;z-index:1;-webkit-overflow-scrolling:touch;">
		<img src="//i1.daumcdn.net/localimg/localimages/07/postcode/320/close.png" id="btnCloseLayer" style="cursor:pointer;position:absolute;right:-3px;top:-3px;z-index:1" onclick="closeDaumPostcode()" alt="닫기 버튼">
		</div>
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
						document.joinForm.zipcode.value = data.zonecode;
						$('#address').val(fullAddr);
						$('#address2').focus();

						// iframe을 넣은 element를 안보이게 한다.
						// (autoClose:false 기능을 이용한다면, 아래 코드를 제거해야 화면에서 사라지지 않는다.)
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