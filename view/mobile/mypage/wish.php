<?
	$mypage = new Mypage();

	$userData = array(":id" => $_SESSION["USER_ID"]);
	$rData = $mypage->userModifyInfo($userData);

	$rtnList = $mypage->getUserWishListM($page, "idx DESC");
?>  
<script>
	function delWish(idx){
		var form = document.wishForm;
		form.idx.value = idx;
		
		if(confirm('위시항목을 삭제 하시겠습니까?') == true){
			var param =  $("#wishForm").serialize();
			$.ajax({
				url : '?com=mypage&pro=mypageinfo',
				data : param,
				type : 'post',
				success : function(data){
					var getCode = trim(data);
					if(getCode == "00"){
						alert('위시 리스트에서 삭제했습니다.');
						location.reload();
					}
				},
				error : function(){
					alert('통신 에러 입니다.');
				}
			});
		}
	}
</script>        
		<div class="layer_title" style="text-align:left; padding-left:20px;">
            <p>위시리스트</p>
            <!--<input type="image" src="/images/mobile/btn_close.gif" alt="" />-->
        </div>
<form name="wishForm" id="wishForm" method="post">
	<input type="hidden" name="idx" value="" />
	<input type="hidden" name="mode" value="wishDel" />
</form>

        <div class="sv_shop_lst">
            <dl style="margin-top:0px; ">
                <dd>
                    <ul class="l_style_inline search_plist" style="padding-top:10px;">
						<?=$rtnList?>
                    </ul>
                </dd>
            </dl>
        </div>

        <div class="paging_wrap">
			<?=$mypage->pageView?>
        </div>