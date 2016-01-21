		<form name="idSearchForm" id="idSearchForm" method="post">
		<input type="hidden" name="mode" value="idSearch"/>

		<!-- 아이디 찾기 시작 -->
        <fieldset class="login_field" style="padding:10px 17px;">
            <div class="id_search_guide">
                회원가입시 작성한<br />
                <span>휴대폰번호</span>로
                <span>아이디</span>가 전송됩니다.
            </div>

            <input type="text" placeholder="이름" name="name"/>
            <input type="text" placeholder="이메일주소" name="email"/>

            <div style="text-align:center;">
                <input type="button" value="확인" style="width:135px;" class="btn_3" onclick="searchId();"/>
                <!--<input type="button" value="취소" style="width:135px;font-size:17px;margin-left:7px;" class="btn_2" />-->
            </div>
        </fieldset>
        <!-- 아이디 찾기 종료 -->
		</form>

		<form name="pwdSearchForm" id="pwdSearchForm" method="post">
		<input type="hidden" name="mode" value="pwdSearch"/>

        <!-- 비밀번호 찾기 시작 -->
        <fieldset class="login_field" style="padding:20px 17px 40px 17px;">
            <div class="id_search_guide">
                회원가입시 작성한<br />
                <span>휴대폰번호</span>로
                <span>비밀번호</span>가 전송됩니다.
            </div>

            <input type="text" placeholder="아이디" name="id"/>
            <input type="text" placeholder="이름" name="name"/>
            <input type="text" placeholder="이메일주소" name="email"/>

            <div style="text-align:center;">
                <input type="button" value="확인" style="width:135px;" class="btn_3" onclick="searchPwd();"/>
                <!--<input type="button" value="취소" style="width:135px;font-size:17px;margin-left:7px;" class="btn_2" />-->
            </div>
        </fieldset>
        <!-- 비밀번호 찾기 종료 -->
		</form>
