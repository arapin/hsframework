function viewMng(idx){
	location.href = '/?com=affterMemo&lnd=view&mng=Y&idx='+idx;
}

function deleteMng(idx){
	if(confirm('후기 정보를 삭제 하시겠습니까?') == true){
		location.href = '/?com=affterMemo&pro=affterMemoInfo&mode=delete&mng=Y&idx='+idx;
	}
}