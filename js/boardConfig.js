function form_chk(){
	var form = document.writeForm;
	
	if(form.boardCode.value == ""){
		alert('게시판 코드를 입력하여 주십시요');
		return false;
	}

	if(form.boardName.value == ""){
		alert('게시판명을 입력하여 주십시요');
		return false;
	}

	if(form.ownerId.value == ""){
		alert('게시판 관리자를 입력하여 주십시요');
		return false;
	}

	if(form.idChk.value != 'Y'){
		alert('사용하실수 있는 아이디를 입력하여 주십시요.');
		return false;
	}

	form.submit();
}

function form_chk_modify(){
	var form = document.writeForm;

	if(form.boardName.value == ""){
		alert('게시판명을 입력하여 주십시요');
		return false;
	}

	if(form.ownerId.value == ""){
		alert('게시판 관리자를 입력하여 주십시요');
		return false;
	}

	if(form.idChk.value != 'Y'){
		alert('사용하실수 있는 아이디를 입력하여 주십시요.');
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

function modifyMng(idx){
	location.href = '/?com=boardConfig&lnd=modify&mng=Y&idx='+idx;
}

function checkIdString(){
	var idString = $('input[name=ownerId]').val();

	$.ajax({
		url : '/?com=boardConfig&pro=boardConfigInfo&mode=idCheck&mng=Y',
		data : {'ownerId':idString},
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
			}else if(getCode == '02'){
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
