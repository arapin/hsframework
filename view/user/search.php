<?
if($_SESSION["USER_ID"] != ""){
	header('Location: /');
	exit;
}
?>
		<!-- 본문 시작 -->
        <div class="sub_content">
            <h3 class="sub_h3">아이디/비밀번호찾기</h3>
            <ul class="l_style_left sub_site_map">
                <li>HOME >&nbsp;</li>
                <li>회원 >&nbsp;</li>
                <li class="text_bold">아이디/비밀번호찾기</li>
            </ul>
			
			<form name="idSearchForm" id="idSearchForm" method="post">
			<input type="hidden" name="mode" value="idSearch"/>
            <div class="login_wrap" style="margin-bottom: 0px; width: 540px; height: 310px;">
                <fieldset class="login_form">
                    <legend>점(占) 회원 아이디 찾기</legend>

                    <p class="join_info">
                        회원가입시 작성한
                        <span>휴대폰번호</span>로 아이디가 전송됩니다.
                    </p>

                    <div class="join_width">
                        <label class="join_label" for="txtName">
                            <img src="/images/li3.gif" alt="" />이름
                        </label>
                        <input type="text" id="txtName" name="name"/>
                        <br />

                        <label class="join_label" for="txtEmail">
                            <img src="/images/li3.gif" alt="" />이메일주소
                        </label>
                        <input type="text" style="width:300px;" id="txtEmail" name="email"/>
                    </div>
                </fieldset>
				</form>

                <div style="text-align:center;">
                    <input type="button" class="btn9_2" value="확인" style="margin:20px 5px 0px;" onclick="searchId();" />
                    <!--<input type="button" class="btn9_1" value="취소" style="margin:20px 0px 0px;" />-->
                </div>
            </div>

            <div class="login_wrap" style="margin-top:30px;margin-bottom:300px; width:540px; height:350px;">
			<form name="pwdSearchForm" id="pwdSearchForm" method="post">
			<input type="hidden" name="mode" value="pwdSearch"/>

                <fieldset class="login_form">
                    <legend>점(占) 회원 비밀번호 찾기</legend>

                    <p class="join_info">
                        회원가입시 작성한
                        <span>휴대폰번호</span>로 비밀번호가 전송됩니다.
                    </p>

                    <div class="join_width">
                        <label class="join_label" for="txtID">
                            <img src="/images/li3.gif" alt="" />아이디
                        </label>
                        <input type="text" id="txtID" name="id"/>
                        <br />

                        <label class="join_label" for="txtName2">
                            <img src="/images/li3.gif" alt="" />이름
                        </label>
                        <input type="text" id="txtName2" name="name"/>
                        <br />

                        <label class="join_label" for="txtEmail2">
                            <img src="/images/li3.gif" alt="" />이메일주소
                        </label>
                        <input type="text" style="width:300px;" id="txtEmail2" name="email"/>
                    </div>
                </fieldset>
				</form>
                <div style="text-align:center;">
                    <input type="button" class="btn9_2" value="확인" style="margin:20px 5px 0px;" onclick="searchPwd();"/>
                    <!--<input type="button" class="btn9_1" value="취소" style="margin:20px 0px 0px;" />-->
                </div>
            </div>
        </div>

        <!-- 본문 끝 -->