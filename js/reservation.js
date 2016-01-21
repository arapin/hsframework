function resCancel(idx){
	if(confirm('예약을 취소 하시겠습니까?') == true){
		location.href = '/?com=reservation&pro=reservationInfo&mode=cancel&mng=Y&idx='+idx;
	}
}

function resInfo(idx){
	window.open('/mngView/popup/viewReservationSubInfo.php?idx='+idx,'','scrollbars=yes,width=400,height=400,left=100');
}

function searchChk(){
	var form = document.searchForm;

	form.submit();
}