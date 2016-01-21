<?
if($_SESSION["USER_ID"] != ""){
	header('Location: /');
	exit;
}
?>
<script type="text/javascript">
<!--
 /**
  * 본 스크립트는 HTML문서에서 입력할 경우
  * 텍스트 필드입력을 지정한 마스크형태로
  * 입력 받도록 하기위한 스크립트임.
*/
var numberArray = new Array();
numberArray[0] = '0';numberArray[1] = '1';
numberArray[2] = '2';numberArray[3] = '3';
numberArray[4] = '4';numberArray[5] = '5';
numberArray[6] = '6';numberArray[7] = '7';
numberArray[8] = '8';numberArray[9] = '9';

/**
  * 문자열을 주면 숫자만을 골라서 숫자문자열을 돌려준다.
  * @param inStr 문자열
  * @return 숫자문자열
*/
function getDigit(inStr)
{
        var i=0;
        var onlyDigit = "";
        for(i=0; i<inStr.length; i++)
        {
                if(isDigit(inStr.charAt(i))) onlyDigit = onlyDigit + inStr.charAt(i);
        }
        return onlyDigit;
}

function isDigit(inStr)
{
        var i=0;
        for(i=0; i<10; i++)
        {
                if(numberArray[i] == inStr) return true;
        }

        return false;
}


/**
  * 숫자열을 주면 콤마를 Currency 문자열 형태로 만들어 돌려준다.
  * @param str 문자열
  * @return Currency 문자열
  */
function getLuCommaStr(str)
{
        var i=0;
        var strLen = str.length;
        var count = 0;
        var result = "";

        for(i=(strLen-1); i>=0; i--)
        {
                if(count == 3)
                {
                        result = "," + result;
                        count = 0;
                }

                result = str.charAt(i) + result;
                count = count + 1;
        }
        return result;
}

function getLuMaskedStr(mask, str)
{
        var i=0;
        var mIndex = mask.length - 1;
        var sIndex = str.length - 1;
        var result = "";

        var searchCount = (mask.length > str.length)? str.length : mask.length;

        for(i=0; i<mask.length; i++)
        {
                if(sIndex < 0) break;
                if(mask.charAt(mIndex) == '#')
                {
                        result = str.charAt(sIndex) + result;
                        sIndex --;
                        mIndex --;
                }
                else
                {
                        result = mask.charAt(mIndex) + result;
                        mIndex --;
                }
        }
        return result;
}

/*
  * 해당 텍스트 필드를 주어진 Mask형태로 입력받는다.
  * @param maskStr 입력 Mask
  * Mask Sample : 마스크는 반드시 '#'로 시작해야 함.
  *                     8자리 Currency형태      : "##,###,###",
  *                     주민등록번호                    : "######-#######-##"
  *                     전화번호                                : "###)###-####"
  *                     날짜                                    : "##/##/##" or "####/##/##"
  * @param inObj 텍스트필드
*/
function LuMaskedField(maskStr, inObj) {
        if(maskStr.length >= inObj.value.length)
        {
                var commaStr =getLuMaskedStr(maskStr, getDigit(inObj.value));
                inObj.value = commaStr;
                if(window.event.keyCode != 13)  inObj.focus();
        }
        else
        {
                var i = 0;
                var result = "";
                for(i=0; i<maskStr.length; i++)
                {
                        result = result + inObj.value.charAt(i);
                }
                inObj.value = result;
        }
}

//만약 전화번호 및 핸드폰 경우 체크
function chkBizTel(maskStr, inObj)
{
        var tml = inObj.value.length;

        if(tml<=9){
                result=LuMaskedField('####-####', inObj);
        }else if(tml>9 && tml<=12){
				var chk = inObj.value.substr(0,2);
				if(chk == "02") result=LuMaskedField('##-####-####', inObj);
				else result=LuMaskedField(maskStr, inObj);
        }else{
                result=LuMaskedField('###-####-####', inObj);
        }

        return result;
}
//-->
</script>

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
        <!-- 본문 시작 -->
        <div class="sub_content">
            <h3 class="sub_h3">회원가입</h3>
            <ul class="l_style_left sub_site_map">
                <li>HOME >&nbsp;</li>
                <li>회원 >&nbsp;</li>
                <li class="text_bold">회원가입</li>
            </ul>

            <div class="login_wrap" style="margin-bottom:250px; width:540px; height:760px;">
                <fieldset class="login_form">
                    <legend>점(占) 회원가입</legend>

                    <p class="join_info">
                        회원가입을 하면 점(占)<br />
                        <span>이용약관, 개인정보취급방침, 청소년보호정책</span>에 동의하게 됩니다.
                    </p>

                    <p class="join_info">
                        ※ 이곳은 일반 회원님들의 가입 공간입니다.<br />
                        만약 <span style="color:red">무속인</span>이시라면 '<a href="?com=shaman&lnd=join" style="text-decoration:none;color:blue">입점 신청하기</a>'를 클릭해 주세요.
                    </p>

                    <p class="join_req">
                        [<span class="req_mark">*</span>]는 필수입력정보입니다.
                    </p>

                    <div class="join_width">
                        <label class="join_label" for="txtID">
                            <img src="/images/li3.gif" alt="" />아이디<span class="req_mark">*</span>
                        </label>
                        <input type="text" id="txtID" name="id"/>
                        <input type="button" onclick="checkIdFront();" value="ID중복확인" class="btn9" />
                        <br />

                        <label class="join_label" for="txtPassword">
                            <img src="/images/li3.gif" alt="" />비밀번호<span class="req_mark">*</span>
                        </label>
                        <input type="password" id="txtPassword" name="pwd"/>
                        <br />

                        <label class="join_label" for="txtChkPwd">
                            <img src="/images/li3.gif" alt="" />비밀번호확인<span class="req_mark">*</span>
                        </label>
                        <input type="password" id="txtChkPwd" name="pwdConfirm"/>
                        <br />

                        <label class="join_label" for="txtName">
                            <img src="/images/li3.gif" alt="" />이름(한글)<span class="req_mark">*</span>
                        </label>
                        <input type="text" id="txtName" name="name"/>
                        <br />

                        <!--<label class="join_label" for="txtCName">
                            <img src="/images/li3.gif" alt="" />이름(한자)<span class="req_mark">*</span>
                        </label>
                        <input type="text" id="txtCName" name="nameCH"/>
                        <br />-->

                        <!--<label class="join_label" for="txtBirth">
                            <img src="/images/li3.gif" alt="" />생년월일(시)<span class="req_mark">*</span>
                        </label>
                        <select style="width:55px;margin-left:6px;" id="txtBirth" name="birthdayY">
                        <?
                        for($y=1900; $y<=date("Y"); $y++){
                            echo "<option value='$y'>$y</option>";
                        }
                        ?>
                        </select>년
                        <select style="width:35px;margin-left:6px;" name="birthdayM">
                        <?
                        for($m=1; $m<=12; $m++){
                            echo "<option value='$m'>$m</option>";
                        }
                        ?>
                        </select>월
                        <select style="width:35px;margin-left:6px;" name="birthdayD">
                        <?
                        for($d=1; $d<=31; $d++){
                            echo "<option value='$d'>$d</option>";
                        }
                        ?>
                        </select>월
                        <select style="width:80px;margin-left:6px;" name="birthdayTime">
                            <option value="00:00">00시 00분</option>
                            <option value="00:30">00시 30분</option>
                            <option value="01:00">01시 00분</option>
                            <option value="01:30">01시 30분</option>
                            <option value="02:00">02시 00분</option>
                            <option value="02:30">02시 30분</option>
                            <option value="03:00">03시 00분</option>
                            <option value="03:30">03시 30분</option>
                            <option value="04:00">04시 00분</option>
                            <option value="04:30">04시 30분</option>
                            <option value="05:00">05시 00분</option>
                            <option value="05:30">05시 30분</option>
                            <option value="06:00">06시 00분</option>
                            <option value="06:30">06시 30분</option>
                            <option value="07:00">07시 00분</option>
                            <option value="07:30">07시 30분</option>
                            <option value="08:00">08시 00분</option>
                            <option value="08:30">08시 30분</option>
                            <option value="09:00">09시 00분</option>
                            <option value="09:30">09시 30분</option>
                            <option value="10:00">10시 00분</option>
                            <option value="10:30">10시 30분</option>
                            <option value="11:00">11시 00분</option>
                            <option value="11:30">11시 30분</option>
                            <option value="12:00">12시 00분</option>
                            <option value="12:30">12시 30분</option>
                            <option value="13:00">13시 00분</option>
                            <option value="13:30">13시 30분</option>
                            <option value="14:00">14시 00분</option>
                            <option value="14:30">14시 30분</option>
                            <option value="15:00">15시 00분</option>
                            <option value="15:30">15시 30분</option>
                            <option value="16:00">16시 00분</option>
                            <option value="16:30">16시 30분</option>
                            <option value="17:00">17시 00분</option>
                            <option value="17:30">17시 30분</option>
                            <option value="18:00">18시 00분</option>
                            <option value="18:30">18시 30분</option>
                            <option value="19:00">19시 00분</option>
                            <option value="19:30">19시 30분</option>
                            <option value="20:00">20시 00분</option>
                            <option value="20:30">20시 30분</option>
                            <option value="21:00">21시 00분</option>
                            <option value="21:30">21시 30분</option>
                            <option value="22:00">22시 00분</option>
                            <option value="22:30">22시 30분</option>
                        </select>
                        <label class=""><input type="radio" checked="checked" name="birthdayType" value="P"/>양력</label>
                        <label><input type="radio" name="birthdayType" value="M"/>음력</label>-->

                        <label class="join_label" for="txtZipCode">
                            <img src="/images/li3.gif" alt="" />주소<span class="req_mark">*</span>
                        </label>
                        <input type="text" id="txtZipCode" style="width:80px;" name="zipcode" id="zipcode"/>
                        <input type="button" value="우편번호 검색" class="btn9_1" onclick="execDaumPostcode()"/><br />
                        <input type="text" style="width:390px; margin-left:103px;" name="address" id="address"/><br />
                        <input type="text" style="width:390px; margin-left:103px;" name="address2" id="address2"/>
                        <br />

                        <label class="join_label" for="txtPhone">
                            <img src="/images/li3.gif" alt="" />휴대폰번호<span class="req_mark">*</span>
                        </label>
                        <input language=javascript type="text" id="txtPhone" style="width:150px;" id="phone" name="phone" placeholder="- 생략, 숫자만 입력"/>
                        <input type="button" onclick="getPhoneChk();" value="본인인증" class="btn9" />
                        <br />

                        <label class="join_label" for="txtEmail">
                            <img src="/images/li3.gif" alt="" />이메일<span class="req_mark">*</span>
                        </label>
                        <input type="text" id="txtEmail" style="width:390px;" name="email" id="email"/>
                    </div>
                </fieldset>

                <div class="login_width">
                    <input type="button" class="btn8" value="회원가입" style="margin:20px 0px 0px;" onclick="form_chk();"/>
                    <p>
                        <img src="/images/li3.gif" alt="" />이미 점(占) 회원이시면 <a href="?com=user&lnd=login">로그인</a>하세요
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
							document.joinForm.zipcode.value = data.zonecode;
							$('#address').val(fullAddr);
							$('#address2').focus();
						}
					}).open();
				}

			</script>