<?
	$SHIdx	= Request::get('SHIdx', Request::GET | Request::XSS_CLEAR);

	$shmypage = new SHMypage();
	$sprData = array(":SHIdx" => $SHIdx);
	$sprList = $shmypage->getSprInfoListViewM2($sprData);
	$productSelect = $shmypage->getProductSelectinfo();
?>
		<script>

			function formChk(){
				var form = document.sprForm;
				var error = 0;
				$('input[name="price"]').each(function(){
					if($(this).val() == ''){
						error++;
					}
				});

				if(error > 0){
					alert('가격을 모두 등록하여 주십시요.');
					return false;
				}

				form.submit();
			}

			function deleteSpr(idx){
				var form = document.sprDeleteForm;
				form.sidx.value = idx;
				if(confirm('상품을 삭제 하시겠습니까?') == true){
					form.submit();
				}
			}
		</script>
		<form name="sprDeleteForm" method="post" action="?com=shMypage&pro=shMypageInfo">
			<input type="hidden" name="sidx" value="" />
			<input type="hidden" name="SHIdx" value="<?=$SHIdx?>" />
			<input type="hidden" name="mode" value="delSpr" />
		</form>
        <div class="layer_title">
            <p>상품 관리</p>
            <input type="image" src="/images/mobile/btn_close.gif" alt="" />
        </div>

        <fieldset class="login_field login_field_ex">

            <div style="border:1px solid #c3c3c3; background:#f6f6f6; border-radius:3px;height:200px; overflow-y:auto; padding:10px; box-sizing:border-box; font-size:13px; margin-bottom:10px;">

                <ul class="l_style_none bl_lst">
					<?=$sprList?>
                </ul>

            </div>
		<form name="sprForm" action="?com=shMypage&pro=shMypageInfo" method="post" >
		<input type="hidden" name="SHIdx" value="<?=$SHIdx?>"/>
		<input type="hidden" name="mode" value="addSpr"/>
            <div class="table">
                <div class="t_cell_c">
                    <select style="min-width:90px;" name="proIdxM">
                        <?=$productSelect?>
                    </select>
                </div>
                <div class="t_cell_c" style="padding-left:10px;">
                    <select style="min-width:90px;" name="proTimeM">
						<option value="30">30분</option>
						<option value="60">1시간</option>
						<option value="90">1시간30분</option>
						<option value="120">2시간</option>
						<option value="150">2시간30분</option>
						<option value="180">3시간</option>
						<option value="210">3시간30분</option>
						<option value="240">4시간</option>
						<option value="270">4시간30분</option>
						<option value="300">5시간</option>
						<option value="330">5시간30분</option>
						<option value="360">6시간</option>
						<option value="390">6시간30분</option>
						<option value="420">7시간</option>
						<option value="450">7시간30분</option>
						<option value="480">8시간</option>
                    </select>
                </div>
                <div class="t_cell_c" style="padding-left:10px;">
                    <input type="text" name="priceM" />
                </div>
            </div>
		</form>

            <div class="table">
                <div class="t_cell_c">
                    <input type="button" style="margin-top:10px;" class="btn_1" value="상품추가" onclick="formChk();" />
                </div>
                <!--<div class="t_cell_c" style="padding:0px 5px;">
                    <input type="button" style="margin-top:10px;" class="btn_7" value="저장" onclick="" />
                </div>-->
                <div class="t_cell_c" style="padding:0px 0px 0px 5px;">
                    <input type="button" style="margin-top:10px;" class="btn_2" value="취소" onclick="location.href='?com=shMypage&lnd=modify'" />
                </div>
            </div>
        </fieldset>