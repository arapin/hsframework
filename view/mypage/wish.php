<?
	$mypage = new Mypage();

	$userData = array(":id" => $_SESSION["USER_ID"]);
	$rData = $mypage->userModifyInfo($userData);

	$rtnList = $mypage->getUserWishList($page, "idx DESC");
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
<form name="wishForm" id="wishForm" method="post">
	<input type="hidden" name="idx" value="" />
	<input type="hidden" name="mode" value="wishDel" />
</form>
		<!-- 본문 시작 -->
        <div class="sub_content" style="margin-left: 0px; width: 1024px;">
            <h3 class="sub_h3">위시리스트</h3>
            <ul class="l_style_left sub_site_map">
                <li>HOME >&nbsp;</li>
                <li>마이페이지 >&nbsp;</li>
                <li class="text_bold">위시리스트</li>
            </ul>

            <div style="padding-top:25px;">
                <!--<img class="wish_tphoto" src="/html/sample/svp1.jpg" alt="" />-->
                <div class="wish_title">
                    <h4><?=$rData["name"]?>님의 위시리스트</h4>
                    TOTAL : <?=$mypage->totalCnt?>
                </div>
                <input type="button" value="전체삭제" class="btn_wish_del float_right" style="color:#666;" />
            </div>

            <ul class=" l_style_inline search_plist" style="width:1080px;">
				<?=$rtnList?>
            </ul>
			<div class="paging_wrap" style="text-align:center;">
				<?=$mypage->pageView?>
			</div>
        </div>
        <!-- 본문 끝 -->