<?

	$SHIdx	= Request::get('SHIdx', Request::GET | Request::XSS_CLEAR);

	$shmypage = new SHMypage();
	$sprData = array(":SHIdx" => $SHIdx);
	$limitList = $shmypage->getLimitDayInfoListViewM2($sprData);
?>
<script>
	function deleteLimit(idx){
		var form = document.sprDeleteForm;
		form.lidx.value = idx;
		if(confirm('예약 제한 일자를 삭제 하시겠습니까?') == true){
			form.submit();
		}
	}

	function formChk(){
		var form = document.sprForm;
		var error = 0;
		$('input[name*="price[]"]').each(function(){
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

	$(function(){
		$('#limitSDate').datepicker({
			dateFormat: 'yy-mm-dd',
			prevText: '이전 달',
			nextText: '다음 달',
			monthNames: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
			monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
			dayNames: ['일','월','화','수','목','금','토'],
			dayNamesShort: ['일','월','화','수','목','금','토'],
			dayNamesMin: ['일','월','화','수','목','금','토'],
			showMonthAfterYear: true,
			yearSuffix: '년'
		});

		$('#limitEDate').datepicker({
			dateFormat: 'yy-mm-dd',
			prevText: '이전 달',
			nextText: '다음 달',
			monthNames: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
			monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
			dayNames: ['일','월','화','수','목','금','토'],
			dayNamesShort: ['일','월','화','수','목','금','토'],
			dayNamesMin: ['일','월','화','수','목','금','토'],
			showMonthAfterYear: true,
			yearSuffix: '년'
		});
	});
</script>
		<form name="sprDeleteForm" method="post" action="?com=shMypage&pro=shMypageInfo">
			<input type="hidden" name="mode" value="limitDel" />
			<input type="hidden" name="lidx" value="" />
			<input type="hidden" name="fileRndIdx" value="<?=$SHIdx?>" />
		</form>
        <div class="layer_title">
            <p>예약 제한 일자 관리</p>
            <input type="image" src="/images/mobile/btn_close.gif" alt="" />
        </div>

        <fieldset class="login_field login_field_ex">

            <div style="border:1px solid #c3c3c3; background:#f6f6f6; border-radius:3px;height:150px; overflow-y:auto; padding:10px; box-sizing:border-box; font-size:14px; margin-bottom:10px;">
                <ul class="l_style_none bl_lst">
					<?=$limitList?>
                </ul>
            </div>

            <div class="table">
		<form name="sprForm" action="?com=shMypage&pro=shMypageInfo" method="post">
		<input type="hidden" name="SHIdx" value="<?=$SHIdx?>"/>
		<input type="hidden" name="mode" value="addLimitDay"/>

                <div class="t_cell_c">
                    <input type="text" class="" value="" name="limitSDateM" id="limitSDate" />
                </div>
                <div class="t_cell_c" style="width:30px;padding-bottom:10px;">
                    ~
                </div>
                <div class="t_cell_c">
                    <input type="text" class="" value="" name="limitEDateM" id="limitEDate"/>
                </div>
		</form>
            </div>
            <div class="table">
                <div class="t_cell_c" style="padding:0px 5px 0px 0px;">
                    <input type="button" style="margin-top:10px;" class="btn_1" value="예약제한일자추가" onclick="formChk();" />
                </div>
                <!--<div class="t_cell_c" style="padding:0px 5px;">
                    <input type="button" style="margin-top:10px;" class="btn_7" value="저장" onclick="" />
                </div>-->
                <div class="t_cell_c">
                    <input type="button" style="margin-top:10px;" class="btn_2" value="취소" onclick="location.href='?com=shMypage&lnd=modify'" />
                </div>
            </div>
        </fieldset>
