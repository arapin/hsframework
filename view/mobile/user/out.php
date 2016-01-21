<?
	$user = new User();

	$userData = array(":id" => $_SESSION["USER_ID"]);
	$rData = $user->userModifyInfo($userData);
?>       
		<div class="layer_title" style="text-align:center; padding-left:20px;">
            <p>회원 탈퇴하기</p>
            <!--<input type="image" src="/images/mobile/btn_close.gif" alt="" />-->
        </div>
<form name="withoutForm" method="post" action="?com=user&pro=userinfo">
<input type="hidden" name="mode" value="outMember"/>
<input type="hidden" name="id" value="<?=$_SESSION["USER_ID"]?>"/>
<input type="hidden" name="name" value="<?=$rData["name"]?>"/>

        <fieldset class="login_field" style="padding:20px 17px 25px 17px;">

            <div class="id_search_guide" style="line-height:160%;">
                <span style="color:#57c;">점(占)</span>을 이용해 주셔서 감사합니다.<br />
                더 나은 모습으로 만나뵐 수 있도록 노력하겠습니다.<br />
                (회원탈퇴시 모든 회원정보는 삭제되고<br />재가입을 하더라도 복구되지 않습니다.)
            </div>

            <div style="font-size:15px; padding-top:10px; padding-bottom:10px;">
                아이디 :&nbsp;&nbsp;&nbsp;<span style="color:#57c;"><?=$_SESSION["USER_ID"]?></span>
            </div>
            <div style="font-size:15px; padding-bottom:20px;">
                이&nbsp;&nbsp;&nbsp;&nbsp;름 :&nbsp;&nbsp;&nbsp;<span style="color:#57c;"><?=$rData["name"]?></span>
            </div>

            <select name="outType" onchange="viewEtc();">
				<option value="">선택해주세요</option>
				<option value="201" >개인적인 사정으로</option>
				<option value="202" >타사이트와의 차별성 부족</option>
				<option value="203" >방송을 듣는데 장애가 많아서</option>
				<option value="204" >고객에 대한 태도가 불량</option>
				<option value="205" >시스템 장애 및 느린 속도 문제</option>
				<option value="999">기타</option>
            </select>
            <input type="text"  name="outTypeEtc" id="outTypeEtc"/>

            <div style="text-align:center;padding-top:10px;">
                <input type="button" value="회원탈퇴" style="width:135px;" class="btn_3" onclick="withoutChk();"/>
                <!--<input type="button" value="취소" style="width:135px;font-size:17px;margin-left:7px;" class="btn_2" />-->
            </div>
        </fieldset>
</form>
