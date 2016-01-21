function paymentCancel(idx){
	if(confirm('결제를 취소 하시겠습니까?') == true){
		location.href = '/?com=payment&pro=paymentInfo&mode=cancel&mng=Y&idx='+idx;
	}
}

function paymentInfo(idx){
	window.open('/mngView/popup/viewPaymentInfo.php?idx='+idx,'','scrollbars=yes,width=400,height=400,left=100');
}

function payment(idx){
	window.open('/mngView/popup/paymentApply.php?idx='+idx,'','scrollbars=yes,width=400,height=200,left=100');
}

function searchChk(){
	var form = document.searchForm;

	form.submit();
}