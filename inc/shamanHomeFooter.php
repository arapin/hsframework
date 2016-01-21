	<?include $_SERVER["DOCUMENT_ROOT"]."/inc/commonFooter.php"?>

    <!-- 사진보기 레이어 시작 -->
    <div class="pop_layer_wrap">
        <div class="pop_overlap"></div>
        
        <div class="pop_preview">
            <input style="float:right;margin:10px 30px;" type="image" onclick="closePop()" src="/images/pop_close_btn3.gif" alt="" />
            <div style="text-align:left;padding:20px 0px 20px 160px; font-size:14px;">
                
            </div>
			<div class="fotorama" data-width="100%" data-max-width="100%" data-ratio="1000/600" data-nav="thumbs">
				<?
					$imgCnt = sizeof($rData["shamanImg"]);

					for($i=0; $i < $imgCnt; $i++){
						echo "<img src=\"".$rData["shamanImg"][$i]."\" alt=\"\" />";
					}
				?>			</div>
        </div>
    </div>
    <!-- 사진보기 레이어 끝 -->
</body>
</html>
