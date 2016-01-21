function writeChk(){
	var form = document.writeForm;

	if(form.proCate.value == ""){
		alert('상담분야를 선택하여 주십시요.');
		return false;
	}

	if(form.title.value == ""){
		alert('제목을 입력하여 주십시요.');
		return false;
	}

	if(form.answerStartDate.value == ""){
		alert('답변기간 시작일을 입력하여 주십시요.');
		return false;
	}

	if(form.answerEndDate.value == ""){
		alert('답변기간 종료일을 입력하여 주십시요.');
		return false;
	}

	if(form.content.value == ""){
		alert('문의내용을 입력하여 주십시요.');
		return false;
	}

	var confirmWord = number_format(form.proPrice.value) + '원을 결제 하시겠습니까?';
	
	if(confirm(confirmWord) == true){
		form.submit();
	}
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

function writeAnswer(){
	var form = document.answerForm;

	if(form.content.value == ""){
		alert('내용을 입력 하여 주십시요.');
		return false;
	}

	form.submit();
}

function writeChkMng(){
	var form = document.writeForm;

	if(form.title.value == ""){
		alert('제목을 입력하여 주십시요.');
		return false;
	}

	oEditors.getById["field3"].exec("UPDATE_CONTENTS_FIELD", []);	// 에디터의 내용이 textarea에 적용됩니다.
	
	// 에디터의 내용에 대한 값 검증은 이곳에서 document.getElementById("ir1").value를 이용해서 처리하면 됩니다.
	if($('textarea[name=content]').val() == "" || $('textarea[name=content]').val() == "<p>&nbsp;</p>"){
		alert('내용을 입력하여 주십시요.');
		return false;
	}

	form.submit();
}

function getMoreList(){
	var page = $('.board_list_1').attr('rel');
	
}

function hiddenMoreBtn(){
	$('#morBtn').hidden();
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

function setQuestionM(){
	var setting = $('select[id=questionType] > option:selected').val();
	var setArray = setting.split('-');

	$('input[name=proCate]').val(setArray[0]);
	$('input[name=proPrice]').val(setArray[1]);
	$('input[id=viewPrice]').val(setArray[1]);
}

function modifyAnswer(idx){
	var form = document.answerForm;
	form.mode.value = 'modifyAnswer';
	form.answerIdx.value = idx;
	$('.board_reply_write').show();
	form.content.value = $('#content'+idx).val();
}

function modifyAnswerM(idx){
	var form = document.answerForm;
	form.mode.value = 'modifyAnswer';
	form.answerIdx.value = idx;
	$('#answer').show();
	form.content.value = $('#content'+idx).val();
}

function deleteAnswer(idx){
	var form = document.answerForm;
	form.mode.value = 'deleteAnswer';
	form.answerIdx.value = idx;
	form.submit();
}

function answerChoice(idx, parentIdx){
	var form = document.choiceForm;

	form.idx.value = parentIdx;
	form.answerIdx.value = idx;

	form.submit();
}

function setSearchState(){
	var form = document.searchFrom;
	var selectState = $('select[name=selectState] > option:selected').val();
	form.searchState.value = selectState;
	form.submit();
}

function setOrder(val){
	var form = document.searchFrom;
	form.setOrder.value = val;
	form.submit();
}

function goSearch(){
	document.searchFrom.submit();
}