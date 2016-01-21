function form_chk(){
	var form = document.joinForm;
	var regex=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;   
	var rgEx = /(01[016789])(\d{4}|\d{3})\d{4}$/g;

	if(form.id.value == ""){
		alert('아이디를 입력하여 주십시요');
		return false;
	}

	if(form.idChk.value != 'Y'){
		alert('사용하실수 있는 아이디를 입력하여 주십시요.');
		return false;
	}

	if(form.pwd.value == ""){
		alert('비밀번호를 입력하여 주십시요');
		return false;
	}

	if(form.pwdConfirm.value == ""){
		alert('비밀번호 확인란을 입력하여 주십시요');
		return false;
	}

	if(form.pwd.value != form.pwdConfirm.value){
		alert('비밀번호와 비밀번호 확인이 다릅니다. 다시 확인하여 주십시요.');
		return false;
	}

	if(form.name.value == ""){
		alert('이름을 입력하여 주십시요');
		return false;
	}

	/*if(form.nameCH.value == ""){
		alert('한자 이름을 입력하여 주십시요');
		return false;
	}

	if(form.birthdayY.value == ""){
		alert('탄생년도를 선택하여 주십시요');
		return false;
	}

	if(form.birthdayM.value == ""){
		alert('탄생월을 선택하여 주십시요');
		return false;
	}

	if(form.birthdayD.value == ""){
		alert('탄생일을 선택하여 주십시요');
		return false;
	}

	if(form.birthdayTime.value == ""){
		alert('탄생시간을 선택하여 주십시요');
		return false;
	}*/

	if(form.phone.value == ""){
		alert('휴대전화 번호를 입력하여 주십시요');
		return false;
	}

	if(rgEx.test(form.phone.value) === false) {  
		alert("잘못된 휴대전화 번호 형식입니다.");  
		return false;  
	}

	if(form.phoneChk.value != 'Y'){
		alert('본인 인증을 하여 주십시요');
		return false;
	}

	if(form.zipcode.value == ""){
		alert('우편번호를 입력하여 주십시요');
		return false;
	}

	/*if(form.address2.value == ""){
		alert('상세주소를 입력하여 주십시요');
		return false;
	}*/

	if(form.email.value == ""){
		alert('이메일을 입력하여 주십시요');
		return false;
	}

	if(regex.test(form.email.value) === false) {  
		alert("잘못된 이메일 형식입니다.");  
		return false;  
	}

	form.submit();
}

function form_chk_modify(){
	var form = document.joinForm;
	var regex=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;   
	var rgEx = /(01[016789])(\d{4}|\d{3})\d{4}$/g;

	if(form.name.value == ""){
		alert('이름을 입력하여 주십시요');
		return false;
	}

	/*if(form.nameCH.value == ""){
		alert('한자 이름을 입력하여 주십시요');
		return false;
	}

	if(form.birthdayY.value == ""){
		alert('탄생년도를 선택하여 주십시요');
		return false;
	}

	if(form.birthdayM.value == ""){
		alert('탄생월을 선택하여 주십시요');
		return false;
	}

	if(form.birthdayD.value == ""){
		alert('탄생일을 선택하여 주십시요');
		return false;
	}

	if(form.birthdayTime.value == ""){
		alert('탄생시간을 선택하여 주십시요');
		return false;
	}*/

	if(form.phone.value == ""){
		alert('휴대전화 번호를 입력하여 주십시요');
		return false;
	}

	if(!rgEx.test(form.phone.value)) {  
		alert("잘못된 휴대전화 번호 형식입니다.");  
		return false;  
	}

	if(form.zipcode.value == ""){
		alert('우편번호를 입력하여 주십시요');
		return false;
	}
	/*if(form.address2.value == ""){
		alert('상세주소를 입력하여 주십시요');
		return false;
	}*/

	if(form.email.value == ""){
		alert('이메일을 입력하여 주십시요');
		return false;
	}

	if(regex.test(form.email.value) === false) {  
		alert("잘못된 이메일 형식입니다.");  
		return false;  
	}

	form.submit();
}

function form_chk_mng(){
	var form = document.joinForm;
	var regex=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;   
	var rgEx = /(01[016789])(\d{4}|\d{3})\d{4}$/g;

	if(form.id.value == ""){
		alert('아이디를 입력하여 주십시요');
		return false;
	}

	if(form.idChk.value != 'Y'){
		alert('사용하실수 있는 아이디를 입력하여 주십시요.');
		return false;
	}

	if(form.pwd.value == ""){
		alert('비밀번호를 입력하여 주십시요');
		return false;
	}

	if(form.pwdConfirm.value == ""){
		alert('비밀번호 확인란을 입력하여 주십시요');
		return false;
	}

	if(form.pwd.value != form.pwdConfirm.value){
		alert('비밀번호와 비밀번호 확인이 다릅니다. 다시 확인하여 주십시요.');
		return false;
	}

	if(form.name.value == ""){
		alert('이름을 입력하여 주십시요');
		return false;
	}

	if(form.nameCH.value == ""){
		alert('한자 이름을 입력하여 주십시요');
		return false;
	}

	if(form.birthdayY.value == ""){
		alert('탄생년도를 선택하여 주십시요');
		return false;
	}

	if(form.birthdayM.value == ""){
		alert('탄생월을 선택하여 주십시요');
		return false;
	}

	if(form.birthdayD.value == ""){
		alert('탄생일을 선택하여 주십시요');
		return false;
	}

	if(form.birthdayH.value == ""){
		alert('탄생시간을 선택하여 주십시요');
		return false;
	}

	if(form.birthdayMI.value == ""){
		alert('탄생분을 선택하여 주십시요');
		return false;
	}

	if(form.phone.value == ""){
		alert('휴대전화 번호를 입력하여 주십시요');
		return false;
	}

	if(!rgEx.test(form.phone.value)) {  
		alert("잘못된 휴대전화 번호 형식입니다.");  
		return false;  
	}

	if(form.zipcode.value == ""){
		alert('우편번호를 입력하여 주십시요');
		return false;
	}

	if(form.address2.value == ""){
		alert('상세주소를 입력하여 주십시요');
		return false;
	}

	if(form.email.value == ""){
		alert('이메일을 입력하여 주십시요');
		return false;
	}

	if(regex.test(form.email.value) === false) {  
		alert("잘못된 이메일 형식입니다.");  
		return false;  
	}

	return true;
}

function login_chk(){
	var form = document.loginForm;

	if(form.id.value == ""){
		alert('아이디를 입력하여 주십시요');
		return false;
	}

	if(form.pwd.value == ""){
		alert('비밀번호를 입력하여 주십시요');
		return false;
	}

	form.submit();
}

function form_chk_update(){
	var form = document.joinForm;

	if(form.nick.value == ""){
		alert('닉네임을 입력하여 주십시요');
		return false;
	}

	if(form.email.value == ""){
		alert('이메일을 입력하여 주십시요');
		return false;
	}

	form.submit();
}

function modifyMng(id){
	location.href = '/?com=user&lnd=modify&mng=Y&id='+id;
}

function deleteMng(id){
	if(confirm('유저 정보를 삭제 하시겠습니까?') == true){
		location.href = '/?com=user&pro=userinfo&mode=delete&mng=Y&id='+id;
	}
}

function checkIdString(){
	var idString = $('input[name=id]').val();

	$.ajax({
		url : '/?com=user&pro=userinfo&mode=idCheck&mng=Y',
		data : {'id':idString},
		type : 'post',
		success : function(data){
			var getCode = trim(data);
			$('.chkResult').each(function(){
				$(this).hide();
			});
			$('.chkResult').each(function(){
				var rtnData = trim($(this).attr('id'));

				if(rtnData == getCode){
					$(this).show();
				}
			});

			if(getCode == '00'){
				$('input[name=idChk]').val('Y');
			}else{
				$('input[name=idChk]').val('N');
			}
		},
		error : function(){
			alert('통신 오류 입니다.');
		}
	});
}

function checkIdStringFront(){
	var idString = $('input[name=id]').val();

	$.ajax({
		url : '/?com=user&pro=userinfo&mode=idCheck',
		data : {'id':idString},
		type : 'post',
		success : function(data){
			var getCode = trim(data);
			$('.chkResult').each(function(){
				$(this).hide();
			});
			$('.chkResult').each(function(){
				var rtnData = trim($(this).attr('id'));

				if(rtnData == getCode){
					$(this).show();
				}
			});

			if(getCode == '00'){
				$('input[name=idChk]').val('Y');
			}else{
				$('input[name=idChk]').val('N');
			}
		},
		error : function(){
			alert('통신 오류 입니다.');
		}
	});
}

function checkIdFront(){
	var form = document.joinForm;
	var id = form.id.value;

	if(id == ''){
		alert('아이디를 입력 하여 주십시요.');
		return false;
	}

	window.open('/view/popup/checkId.php?id='+id, '', 'width=400, height=300')
}

function getPhoneChk(){
	var regex=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;   
	var rgEx = /(01[016789])(\d{4}|\d{3})\d{4}$/g;

	var form = document.joinForm;
	var phone = form.phone.value;

	if(form.phone.value == ''){
		alert('휴대전화 번호를 입력 하여 주십시요.');
		return false;
	}

	if(rgEx.test(form.phone.value) === false) {  
		alert("잘못된 휴대전화 번호 형식입니다.");  
		return false;  
	}

	window.open('/view/popup/setPhoneAuth.php?phone='+phone, '', 'width=400, height=400')
}

function getPhoneChkM(){
	var regex=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;   
	var rgEx = /(01[016789])(\d{4}|\d{3})\d{4}$/g;

	var form = document.joinForm;
	var phone = form.phone.value;

	if(form.phone.value == ''){
		alert('휴대전화 번호를 입력 하여 주십시요.');
		return false;
	}

	if(rgEx.test(form.phone.value) === false) {  
		alert("잘못된 휴대전화 번호 형식입니다.");  
		return false;  
	}

	$.ajax({
		url : '/?com=user&pro=userinfo&mode=setAuth',
		data : {'phone':phone},
		type : 'post',
		success : function(data){
			var getCode = trim(data);
			$('#authNum').val(getCode);
			$('#authArea').show();
		},
		error : function(){
			alert('통신 오류 입니다.');
		}
	});
}

function chkAuth(){
	var authNum = $('input[id=authNum]').val();
	$.ajax({
		url : '/?com=user&pro=userinfo&mode=auth',
		data : {'setAuthNum':authNum},
		type : 'post',
		success : function(data){
			var getCode = trim(data);
			if(getCode == '00'){
				alert('본인 인증 되었습니다.');
				opener.document.joinForm.phoneChk.value = 'Y';
				self.close();
			}else{
				alert('본인 인증에 실패 하셨습니다.');
			}
		},
		error : function(){
			alert('통신 오류 입니다.');
		}
	});
}

function chkAuthM(){
	var authNum = $('input[id=authNum]').val();
	$.ajax({
		url : '/?com=user&pro=userinfo&mode=auth',
		data : {'setAuthNum':authNum},
		type : 'post',
		success : function(data){
			var getCode = trim(data);
			if(getCode == '00'){
				alert('본인 인증 되었습니다.');
				document.joinForm.phoneChk.value = 'Y';
			}else{
				alert('본인 인증에 실패 하셨습니다.');
			}
		},
		error : function(){
			alert('통신 오류 입니다.');
		}
	});
}

function searchId(){
	var form = document.idSearchForm;

	if(form.name.value == ''){
		alert('이름을 입력하여 주십시요.');
		return false;
	}

	if(form.email.value == ''){
		alert('이메일을 입력하여 주십시요.');
		return false;
	}

	var param = $('#idSearchForm').serialize();
	$.ajax({
		url : '/?com=user&pro=userinfo',
		data : param,
		type : 'post',
		success : function(data){
			var getCode = trim(data);
			if(getCode == '99'){
				alert('가입되지 않은 회원 입니다.');
			}else{
				alert('회원님의 ID는 '+getCode+'입니다.');
			}
		},
		error : function(){
			alert('통신 오류 입니다.');
		}
	});
}

function searchPwd(){
	var form = document.pwdSearchForm;
	if(form.id.value == ''){
		alert('아이디를 입력하여 주십시요.');
		return false;
	}

	if(form.name.value == ''){
		alert('이름을 입력하여 주십시요.');
		return false;
	}

	if(form.email.value == ''){
		alert('이메일을 입력하여 주십시요.');
		return false;
	}

	var param = $('#pwdSearchForm').serialize();
	$.ajax({
		url : '/?com=user&pro=userinfo',
		data : param,
		type : 'post',
		success : function(data){
			var getCode = trim(data);
			if(getCode == '99'){
				alert('입력하신 정보에 해당하는 비밀번호가 없습니다.');
			}else{
				alert('회원님의 비밀번호는 '+getCode+'입니다.');
			}
		},
		error : function(){
			alert('통신 오류 입니다.');
		}
	});
}

function withoutChk(){
	var form = document.withoutForm;

	if(form.outType.value == ""){
		alert('탈퇴 사유를 입력하여 주십시요');
		return false;
	}

	var selectVal = $('select[name=outType] > option:selected').val();
	if(selectVal == '999'){
		if(form.outTypeEtc.value == ""){
			alert('기타 탈퇴 사유를 입력하여 주십시요');
			return false;
		}
	}

	form.submit();
}

function searchChk(){
	var form = document.searchForm;

	if(form.searchType.value == ""){
		alert('검색분류를 선택하여 주십시요.');
		return false;
	}

	if(form.searchWord.value == ""){
		alert('검색어를 선택하여 주십시요.');
		return false;
	}

	form.submit();
}