function deleteAnswer(idx){
	var form = document.answerForm;
	form.mode.value = 'deleteAnswer';
	form.answerIdx.value = idx;
	form.submit();
}

function modifyAnswer(idx){
	var form = document.answerForm;
	form.mode.value = 'modifyAnswer';
	form.answerIdx.value = idx;
	$('#modifyArea').show();
	form.content.value = $('#content'+idx).val();
}

function modifyCancel(){
	var form = document.answerForm;
	form.mode.value = '';
	form.answerIdx.value = '';
	$('#modifyArea').hide();
	form.content.value = '';
}

function modifyContent(){
	var form = document.answerForm;
	if(form.content.value == ""){
		alert('내용을 입력 하여 주십시요.');
		return false;
	}

	form.submit();
}

function memoModifyChk(){
	var form = document.modifyForm;

	if(form.memo.value == ""){
		alert('내용을 입력하여 주십시요.');
		return false;
	}

	form.submit();
}

function memoModify(idx){
	var form = document.memoForm;
	var content = $('#content'+idx).val();

	form.content.value = content;
	form.memoIdx.value = idx;
	form.mode.value = 'memoModify';
}

function memoDelete(idx){
	var form = document.memoForm;
	form.memoIdx.value = idx;
	form.mode.value = 'memoDelete';

	if(confirm('댓글을 삭제 하시겠습니까?') == true){
		form.submit();
	}
}

function setSearchCode(){
	var form = document.searchFrom;
	var headWord = $('select[name=selectHead] > option:selected').val();
	form.searchHead.value = headWord;
	form.submit();
}

function setOrder(val){
	var form = document.searchFrom;
	form.setOrder.value = val;
	form.submit();
}

function boardModifyChk(){
	var form = document.writeForm;

	if(form.headWord.value == ""){
		alert('구분을 선택하여 주십시요.');
		return false;
	}

	if(form.title.value == ""){
		alert('제목을 입력하여 주십시요.');
		return false;
	}

	if(form.content.value == ""){
		alert('내용을 입력하여 주십시요.');
		return false;
	}
	form.mode.value = 'boardModify';
	form.submit();
}

function memoWrite(){
	var form = document.memoForm;

	if(form.content.value == ""){
		alert('내용을 입력하여 주십시요.');
		return false;
	}
	form.submit();
}

function deleteBoard(){
	var form = document.writeForm;
	form.mode.value = 'boardDelete';
	if(confirm('삭제 하시려는 글의 댓글도 같이 삭제 됩니다. 삭제 하시겠습니까?') == true){
		form.submit();
	}
}

function resCancel(idx){
	if(confirm('예약을 취소 하시겠습니까?') == true){
		location.href = '/?com=shMypage&pro=shMypageInfo&mode=rescancel&idx='+idx;
	}
}

function goShamanHome(SHId){
	location.href = '?com=shaman&lnd=shamanhome&SHId='+SHId;
}

function codeAddress() {
	var form = document.joinForm;
	var address = form.SHAddress.value;

	if(address == ""){
		alert('주소를 입력하시오');
		return false;
	}

	geocoder = new google.maps.Geocoder();
	geocoder.geocode( { 'address': address, 'region': 'uk'}, function(results, status) {
	  if (status == google.maps.GeocoderStatus.OK) {
		form.SHLng.value = results[0].geometry.location.lat();
		form.SHLat.value = results[0].geometry.location.lng();
	  } else {
		alert("Geocode was not successful for the following reason: " + status);
	  }
	});
}

function setMainImg(){
	var checkIdx = '';
	$('input[name*=chkMain]').each(function(){
		if($(this).prop('checked') == true){
			checkIdx = $(this).val();
		}
	});

	if(checkIdx == ''){
		alert('대표이미지로 설정하실 이미지를 선택하여 주십시요.');
		return false;
	}

	$.ajax({
		url : '/?com=shMypage&pro=shMypageInfo&mode=mainImgCheck',
		data : {'idx':checkIdx},
		type : 'post',
		success : function(data){
			location.reload();
		},
		error : function(){
			alert('통신 오류 입니다.');
		}
	});
}

function checkImgDel(){
	var checkIdx = '';
	$('input[name*=chkMain]').each(function(){
		if($(this).prop('checked') == true){
			checkIdx = $(this).val();
		}
	});

	if(checkIdx == ''){
		alert('삭제하실 이미지를 선택하여 주십시요.');
		return false;
	}

	$.ajax({
		url : '/?com=shMypage&pro=shMypageInfo&mode=checkDel',
		data : {'checkIdx':checkIdx},
		type : 'post',
		success : function(data){
			location.reload();
		},
		error : function(){
			alert('통신 오류 입니다.');
		}
	});
}


function saveImg(){
	var form = document.fileForm;

	if(document.getElementsByName("imgFile[]")[0].value.trim() == ""){
		alert('이미지를 선택하여 주십시요.');
		return false;
	}

	form.submit();
}

function saveImg2(){
	var form = document.proFileForm;
	form.submit();
}

function reLoad(){
	location.reload();
}

function addItem(){
	var size = $('select[name*="proIdx[]"]').size();
	$.ajax({
		url : '/view/addSprItem.php',
		data : {'idx':(size + 1)},
		type : 'post',
		success : function(data){
			$('#priceUl').append(data);
		},
		error : function(){
			alert('통신 오류 입니다.');
		}
	});
}

function addDateItem(){
	var size = $('input[name*="limitSDate[]"]').size();
	$.ajax({
		url : '/view/addDateItem.php',
		data : {'idx':(size + 1)},
		type : 'post',
		success : function(data){
			$('#limitDiv').append(data);
		},
		error : function(){
			alert('통신 오류 입니다.');
		}
	});
}

function delRow(idx){
	$('#proArea'+idx).remove();
}

function delDateItem(idx){
	$('#limitArea'+idx).remove();
}

function form_chk_info(){
	var form = document.joinForm;
	var regex=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;
	var rgEx = /(01[016789])(\d{4}|\d{3})\d{4}$/g;

	if(form.name.value == ""){
		alert('이름를 입력하여 주십시요');
		return false;
	}

	if(form.SHPwdU.value != ""){
		if(form.SHPwdU.value != form.SHPwdUConfirm.value){
			alert('바꾸실 비밀번호와 비밀번호 확인을 동일하게 입력하여 주십시요');
			return false;
		}
	}

	if(form.SHName.value == ""){
		alert('점집 이름을 입력하여 주십시요');
		return false;
	}

	/*if(form.SHTel.value == ""){
		alert('점집 전화번호을 입력하여 주십시요');
		return false;
	}*/

	if(form.SHPhone.value == ""){
		alert('점집 휴대전화번호을 입력하여 주십시요');
		return false;
	}

	if(!rgEx.test(form.SHPhone.value)) {
		alert("잘못된 휴대전화 번호 형식입니다.");
		return false;
	}

	if(form.SHZipcode.value == ""){
		alert('점집 우편번호을 입력하여 주십시요');
		return false;
	}

	if(form.SHAddress.value == ""){
		alert('점집 기본 주소를 입력하여 주십시요');
		return false;
	}

	/*if(form.SHAddress2.value == ""){
		alert('점집 상세 주소를 입력하여 주십시요');
		return false;
	}*/

	if(form.SHLng.value == ""){
		alert('점집 주소를 정확하게 입력하여 주십시요.');
		return false;
	}

	if(form.SHDesc.value == ""){
		alert('점집 설명을 입력하여 주십시요');
		return false;
	}

	form.submit();
}

function setResInfo(idx){
	$.ajax({
		url : '?com=shMypage&pro=shMypageInfo',
		data : {'idx':idx, 'mode':'resInfo'},
		type : 'post',
		success : function(data){
			var obj = JSON.parse(data);
			$('#resName').text(obj.userName);
			$('#resUserInfo').text(obj.userBirthInfo);
			$('#resProname').text(obj.proName);
			$('#resDate').text(obj.resDate);
			$('#resMemCnt').text(obj.resCnt);
			$('#resPrice').text(obj.payPrice);
			showPop();
		},
		error : function(){
			alert('통신 오류 입니다.');
		}
	});
}

function searchShCalc(){
	var form = document.shCalcForm;
	form.submit();
}