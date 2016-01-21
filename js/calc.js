function calcInput(idx, year, month){
	if(confirm('정산된 금액을 무속인에게 지급한것을 확인 후 눌러 주십시요. 한번 지급된 내용은 철회가 불가 합니다.') == true){
		location.href = '/?com=calc&pro=calcinfo&mode=calcCheck&mng=Y&idx='+idx+'&year'+year+'&month='+month;
	}
}