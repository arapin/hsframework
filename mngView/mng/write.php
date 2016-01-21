<!--<form name="joinForm" method="post" action="?com=mng&pro=mnginfo&mng=Y">
<input type="hidden" name="mode" value="join" />
<input type="hidden" name="idChk" value="N" />
<table>
	<tr>
		<td>아이디</td>
		<td>
			<input type="text" name="mngId" value="" onkeyup="checkIdString();"/>
			<span class="chkResult" id="00" style="display:none;color:blue;font-size:9pt;font-weight:bold;">사용 하실수 있는 아이디 입니다.</span>
			<span class="chkResult" id="01" style="display:none;color:red;font-size:9pt;font-weight:bold;">아이디는 4글자 이상으로 입력하여 주십시요.</span>
			<span class="chkResult" id="02" style="display:none;color:red;font-size:9pt;font-weight:bold;">아이디의 첫글자는 영문이어야 합니다.</span>
			<span class="chkResult" id="03" style="display:none;color:red;font-size:9pt;font-weight:bold;">아이디는 영문, 숫자, -, _ 만 사용할 수 있습니다.</span>
			<span class="chkResult" id="04" style="display:none;color:red;font-size:9pt;font-weight:bold;">이미 존재하는 아이디 입니다.</span>
		</td>
	</tr>
	<tr>
		<td>비밀번호</td>
		<td><input type="password" name="mngPwd" value="" /></td>
	</tr>
	<tr>
		<td>관리자 이름</td>
		<td><input type="text" name="mngName" value="" /></td>
	</tr>
</table>
</form>
<div>
	<input type="button" value="저장" onclick="form_chk();"/>
	<input type="button" value="목록으로" onclick="location.href='?com=mng&lnd=list&mng=Y'" />
</div>-->


            <div class="breadcrumbs clearfix">
                <ul class="breadcrumbs left">
                    <li><a href="#">SAN SIN GAK ADMIN</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>관리자 관리</li>
                </ul>
                <!--<a href="#" class="btn right"><i class="fa fa-caret-square-o-left"></i>EXPORT</a>-->
            </div>

            <form id="file-upload" class="upload"  name="joinForm" method="post" action="?com=mng&pro=mnginfo&mng=Y">
<input type="hidden" name="mode" value="join" />
<input type="hidden" name="idChk" value="N" />

                <h3>관리자 등록</h3>
                <div class="inner clearfix">
                    <fieldset class="error">
                        <label for="field1">아이디</label>
                        <div class="field">
                            <input type="text" placeholder="아이디" id="field1" class="transform_cancel" name="mngId" value="" onkeyup="checkIdString();">
							<span class="chkResult error-alert" id="00" style="display:none;color:blue;font-size:9pt;font-weight:bold;">사용 하실수 있는 아이디 입니다.</span>
							<span class="chkResult error-alert" id="01" style="display:none;color:red;font-size:9pt;font-weight:bold;">아이디는 4글자 이상으로 입력하여 주십시요.</span>
							<span class="chkResult error-alert" id="02" style="display:none;color:red;font-size:9pt;font-weight:bold;">아이디의 첫글자는 영문이어야 합니다.</span>
							<span class="chkResult error-alert" id="03" style="display:none;color:red;font-size:9pt;font-weight:bold;">아이디는 영문, 숫자, -, _ 만 사용할 수 있습니다.</span>
							<span class="chkResult error-alert" id="04" style="display:none;color:red;font-size:9pt;font-weight:bold;">이미 존재하는 아이디 입니다.</span>
                        </div>
                    </fieldset>
                     <fieldset class="error">
                        <label for="field1">비밀번호</label>
                        <div class="field">
                            <input type="password" placeholder="비밀번호" id="field1" name="mngPwd" value="">
                        </div>
                    </fieldset>
                     <fieldset class="error">
                        <label for="field1">관리자 레벨</label>
                        <div class="field">
                            <input type="radio" data-label="총괄 관리자" name="mngLevel" value="SA">
                            <input type="radio" data-label="일반 관리자" name="mngLevel" value="NA" checked>
                        </div>
                    </fieldset>

                    <fieldset class="error">
                        <label for="field1">관리자 이름</label>
                        <div class="field">
                            <input type="text" placeholder="관리자 이름" id="field1" name="mngName" value="">
                        </div>
                    </fieldset>
                    <input type="submit" value="저장" class="right">
                    <a href="#" class="cancel right" onclick="location.href='?com=mng&lnd=list&mng=Y'">목록으로</a>
                </div>
            </form>