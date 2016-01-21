function setSchedule(){
	var product = $('select[name=product] > option:selected').val();
	$.ajax({
		url : '/application/shaman/setSchedule.php',
		data : {'proIdx':product},
		type : 'post',
		beforeSend : function(){
			if(product == ''){
				alert('상품을 선택하여 주십시요.');
				return false;
			}
		    //$("#noticeBody").html("<img src='/loading.gif'/>");
		},
		success : function(data){
			$('#scheDuleResult').html(data);
		},
		error : function(){
			alert('통신오류');
		}
	});
}
