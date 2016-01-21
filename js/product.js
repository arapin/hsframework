function form_chk_mng(){

	var form = document.writeForm;
	if(form.proName.value == ""){
		alert('상품명을 입력하여 주십시요');
		return false;
	}

	form.submit();
}

function modifyMng(idx){
	location.href = '/?com=product&lnd=modify&mng=Y&idx='+idx;
}

function deleteMng(idx){
	if(confirm('상품 정보를 삭제 하시겠습니까?') == true){
		location.href = '/?com=product&pro=productInfo&mode=delete&mng=Y&idx='+idx;
	}
}