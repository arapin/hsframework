function resCancel(idx){
	if(confirm('예약을 취소 하시겠습니까?') == true){
		location.href = '/?com=mypage&pro=mypageinfo&mode=cancel&idx='+idx;
	}
}

function modifyMng(idx, code){
	location.href = '/?com=board&lnd=modify&mng=Y&idx='+idx;
}

function deleteMng(idx, code){
	if(confirm('게시물을 삭제 하시겠습니까?') == true){
		location.href = '/?com=board&pro=boardinfo&mode=delete&mng=Y&idx='+idx;
	}
}

function viewMng(idx, code){
	location.href = '/?com=aqBoard&lnd=view&mng=Y&idx='+idx;
}

function setQuestion(){
	var setting = $('select[id=questionType] > option:selected').val();
	var setArray = setting.split('-');

	$('input[name=proCate]').val(setArray[0]);
	$('input[name=proPrice]').val(setArray[1]);
}

function answerChoice(idx, parentIdx){
	var form = document.choiceForm;

	form.idx.value = parentIdx;
	form.answerIdx.value = idx;

	form.submit();
}

function modifyChk(){
	var form = document.writeForm;

	if(form.title.value == ""){
		alert('제목을 입력하여 주십시요.');
		return false;
	}

	if(form.content.value == ""){
		alert('문의내용을 입력하여 주십시요.');
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

function form_chk_modify(){
	var form = document.joinForm;
	var regex=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;   
	var rgEx = /(01[016789])(\d{4}|\d{3})\d{4}$/g;

	if(form.name.value == ""){
		alert('이름을 입력하여 주십시요');
		return false;
	}

	if(form.pwdU.value != ""){
		if(form.pwdU.value != form.pwdUConfirm.value){
			alert('바꾸실 비밀번호와 비밀번호 확인을 동일하게 입력하여 주십시요');
			return false;
		}
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