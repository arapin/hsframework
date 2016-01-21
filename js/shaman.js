function form_chk_front(){
	var regex=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;   
	var rgEx = /(01[016789])(\d{4}|\d{3})\d{4}$/g;

	var form = document.joinForm;

	if(form.SHId.value == ""){
		alert('아이디를 입력하여 주십시요');
		return false;
	}

	if(form.idChk.value != 'Y'){
		alert('사용하실수 있는 아이디를 입력하여 주십시요.');
		return false;
	}

	if(form.SHPwd.value == ""){
		alert('비밀번호를 입력하여 주십시요');
		return false;
	}

	if(form.SHPwdConfirm.value == ""){
		alert('비밀번호확인을 입력하여 주십시요');
		return false;
	}

	if(form.SHPwd.value != form.SHPwdConfirm.value){
		alert('비밀번호와 비밀번호확인란의 값이 일치 하지 않습니다.');
		return false;
	}

	if(form.name.value == ""){
		alert('무속인명을 입력하여 주십시요');
		return false;
	}

	if(form.SHName.value == ""){
		alert('상호명을 입력하여 주십시요');
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

	if(form.SHPhone.value == ""){
		alert('점집 휴대전화번호을 입력하여 주십시요');
		return false;
	}

	if(rgEx.test(form.SHPhone.value) === false) {  
		alert("잘못된 휴대전화 번호 형식입니다.");  
		return false;  
	}

	/*if(form.SHEmail.value == ""){
		alert('점집 이메일을 입력하여 주십시요');
		return false;
	}

	if(regex.test(form.SHEmail.value) === false) {  
		alert("잘못된 이메일 형식입니다.");  
		return false;  
	}*/

	form.submit();
}

function form_chk(){
	var form = document.joinForm;

	if(form.SHId.value == ""){
		alert('아이디를 입력하여 주십시요');
		return false;
	}

	if(form.idChk.value != 'Y'){
		alert('사용하실수 있는 아이디를 입력하여 주십시요.');
		return false;
	}

	if(form.name.value == ""){
		alert('이름를 입력하여 주십시요');
		return false;
	}

	if(form.SHPwd.value == ""){
		alert('비밀번호를 입력하여 주십시요');
		return false;
	}

	if(form.SHName.value == ""){
		alert('점집 이름을 입력하여 주십시요');
		return false;
	}

	if(form.SHPhone.value == ""){
		alert('점집 휴대전화번호을 입력하여 주십시요');
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

	if(form.SHAddress2.value == ""){
		alert('점집 상세 주소를 입력하여 주십시요');
		return false;
	}

	if(form.SHLng.value == ""){
		alert('점집 주소를 정확하게 입력하여 주십시요.');
		return false;
	}

	form.submit();
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

	if(form.name.value == ""){
		alert('이름를 입력하여 주십시요');
		return false;
	}

	if(form.SHName.value == ""){
		alert('점집 이름을 입력하여 주십시요');
		return false;
	}

	if(form.SHTel.value == ""){
		alert('점집 전화번호을 입력하여 주십시요');
		return false;
	}

	if(form.SHPhone.value == ""){
		alert('점집 휴대전화번호을 입력하여 주십시요');
		return false;
	}

	if(form.SHLng.value == ""){
		alert('점집 위치가 제대로 설정되지 않았습니다.');
		return false;
	}

	if(form.SHLat.value == ""){
		alert('점집 위도를 입력하여 주십시요');
		return false;
	}

	if(form.SHDesc.value == ""){
		alert('점집 설명을 입력하여 주십시요');
		return false;
	}

	form.submit();
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

function checkIdString(){
	var idString = $('input[name=SHId]').val();

	$.ajax({
		url : '/?com=shaman&pro=shamaninfo&mode=idCheck',
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
	var id = form.SHId.value;

	if(id == ''){
		alert('아이디를 입력 하여 주십시요.');
		return false;
	}

	window.open('/view/popup/checkShId.php?id='+id, '', 'width=400, height=300')
}

function checkIdStringMng(){
	var idString = $('input[name=SHId]').val();

	$.ajax({
		url : '/?com=shaman&pro=shamaninfo&mode=idCheck&mng=Y',
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

function modifyMng(id){
	location.href = '/?com=shaman&lnd=modify&mng=Y&SHId='+id;
}

function deleteMng(id){
	if(confirm('무속인 정보를 삭제 하시겠습니까?') == true){
		location.href = '/?com=shaman&pro=shamaninfo&mode=delete&mng=Y&SHId='+id;
	}
}

function applyShaman(id){
	if(confirm('해당 무속인을 승인 하시겠습니까?') == true){
		location.href = '/?com=shaman&pro=shamaninfo&mode=apply&mng=Y&SHId='+id;
	}
}

function applyShaman2(id){
	if(confirm('해당 무속인을 인증 하시겠습니까?') == true){
		location.href = '/?com=shaman&pro=shamaninfo&mode=apply2&mng=Y&SHId='+id;
	}
}

function cancelShaman(id){
	if(confirm('해당 무속인을 승인취소 하시겠습니까?') == true){
		location.href = '/?com=shaman&pro=shamaninfo&mode=cancel&mng=Y&SHId='+id;
	}
}

function cancelShaman2(id){
	if(confirm('해당 무속인을 인증취소 하시겠습니까?') == true){
		location.href = '/?com=shaman&pro=shamaninfo&mode=cancel2&mng=Y&SHId='+id;
	}
}

function addFile(rndIdx){
	window.open('/mngView/popup/addFile.php?fileRndIdx='+rndIdx+'&type=temp','','scrollbars=yes,width=400,height=400,left=100');
}

function modifyFile(shId){
	window.open('/mngView/popup/addFile.php?fileRndIdx='+shId+'&type=shaman','','scrollbars=yes,width=400,height=400,left=100');
}

function modifyProduct(shId){
	window.open('/mngView/popup/addProduct.php?fileRndIdx='+shId,'','scrollbars=yes,width=400,height=400,left=100');
}

function modifyLimit(shId){
	window.open('/mngView/popup/addLimit.php?fileRndIdx='+shId,'','scrollbars=yes,width=400,height=400,left=100');
}

function setListWish(idx){
	var form = document.wishForm;
	form.SHIdx.value = idx;

	var param =  $("#wishForm").serialize();
	$.ajax({
		url : '?com=shaman&pro=shamaninfo',
		data : param,
		type : 'post',
		success : function(data){
			var getCode = trim(data);
			if(getCode == "00"){
				alert('위시 리스트에 담았습니다.');
				getList();
			}
		},
		error : function(){
			alert('통신 에러 입니다.');
		}
	});
}

function setListWishH(idx){
	var form = document.wishForm;
	form.SHIdx.value = idx;

	var param =  $("#wishForm").serialize();
	$.ajax({
		url : '?com=shaman&pro=shamaninfo',
		data : param,
		type : 'post',
		success : function(data){
			var getCode = trim(data);
			if(getCode == "00"){
				alert('위시 리스트에 담았습니다.');
				location.reload();
			}
		},
		error : function(){
			alert('통신 에러 입니다.');
		}
	});
}

function setDepthTwoAddressMobile(gugun){
	var address = $('select[id=depthOneArea] > option:selected').val();
	$.ajax({
		url : '/?com=shaman&pro=shamaninfo&mode=zipTwoSearch',
		data : {'sido':address, 'gugun':gugun},
		type : 'post',
		async:false,
		success : function(data){
			//alert(data);
			$('#depth2').html(data);
		},
		error : function(){
			alert('통신 에러 입니다.');
		}
	});
}

function setProduct(){
	document.searchForm.productType.value = $('select[id=productType] > option:selected').val();
}

function setOrderType(type){
	document.searchForm.orderType.value = type;
	getList();
	setGoogleMap();
}

function setBookingDate(){
	var selectVal = $('select[name=bookingTime]').val();
	if($('input[id=bookingDate]').val() == ""){
		alert('예약날짜를 입력하여 주십시요.');
	}

	document.searchForm.searchDate.value = $('input[id=bookingDate]').val();
	document.searchForm.searchTime.value = selectVal;

}

function searchFilterGo(){
	searchFilterForm.submit();
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
