<?
	$user = new User();

	$userData = array(":id" => $_SESSION["USER_ID"]);
	$rData = $user->userModifyInfo($userData);
?>
		<!-- 본문 시작 -->
        <div class="sub_content">
            <h3 class="sub_h3">회원탈퇴</h3>
            <ul class="l_style_left sub_site_map">
                <li>HOME >&nbsp;</li>
                <li>회원 >&nbsp;</li>
                <li class="text_bold">회원탈퇴</li>
            </ul>
<form name="withoutForm" method="post" action="?com=user&pro=userinfo">
<input type="hidden" name="mode" value="outMember"/>
<input type="hidden" name="id" value="<?=$_SESSION["USER_ID"]?>"/>
<input type="hidden" name="name" value="<?=$rData["name"]?>"/>
            <div class="login_wrap" style="margin-bottom: 0px; width: 540px; height: 430px; margin-bottom:500px">
                <fieldset class="login_form">
                    <legend>점(占) 회원탈퇴하기</legend>

                    <p class="join_info">
                        <span>점(占)</span>을 이용해 주셔서 감사합니다.<br />
더 나은 모습으로 고객님을 만나뵐 수 있도록 노력하겠습니다.<br />
(회원탈퇴시 모든 회원정보는 삭제되고 재가입을 하더라도 복구되지 않습니다.)
                    </p>

                    <div class="join_width">
                        <label class="join_label">
                            <img src="/images/li3.gif" alt="" />아이디
                        </label>
                        <span class="edit_txt"><?=$_SESSION["USER_ID"]?></span>
                        <br />

                        <label class="join_label">
                            <img src="/images/li3.gif" alt="" />이름
                        </label>
                        <span class="edit_txt" style="color:#888;"><?=$rData["name"]?></span>
                        <br />

                        <label class="join_label" for="txtEmail">
                            <img src="/images/li3.gif" alt="" />탈퇴사유
                        </label>
                        <select style="width:270px; color:#555; padding-left:10px;" name="outType" onchange="viewEtc();">
                            <option value="">선택해주세요</option>
							<option value="201" >개인적인 사정으로</option>
							<option value="202" >타사이트와의 차별성 부족</option>
							<option value="203" >방송을 듣는데 장애가 많아서</option>
							<option value="204" >고객에 대한 태도가 불량</option>
							<option value="205" >시스템 장애 및 느린 속도 문제</option>
                            <option value="999">기타</option>
                        </select>
                        <br />
                        <label class="join_label" for="outTypeEtc" style="padding-left:105px;width:auto;margin-right:7px;">기타 :</label>
                        <input type="text" style="width:320px;" name="outTypeEtc" id="outTypeEtc"/>
                    </div>
                </fieldset>

                <div style="text-align:center;">
                    <input type="button" class="btn9_2" value="회원탈퇴" style="margin:20px 5px 0px;" onclick="withoutChk();"/>
                    <!--<input type="button" class="btn9_1" value="취소" style="margin:20px 0px 0px;" />-->
                </div>
            </div>
        </div>
</form>
        <!-- 본문 끝 -->