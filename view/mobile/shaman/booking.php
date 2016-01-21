<?
	$shaman = new Shaman();
	$SHId = Request::get('SHId', Request::GET | Request::XSS_CLEAR);

	$shamanData = array(":SHId" => $SHId);
	$rData = $shaman->shamanHomeInfo($shamanData);
?>
<script>
	$(function() {
		$( "#bookingDate" ).datepicker({
			dateFormat: 'yy-mm-dd',
			prevText: '이전 달',
			nextText: '다음 달',
			monthNames: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
			monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
			dayNames: ['일','월','화','수','목','금','토'],
			dayNamesShort: ['일','월','화','수','목','금','토'],
			dayNamesMin: ['일','월','화','수','목','금','토'],
			showMonthAfterYear: true,
			yearSuffix: '년',
			onSelect  : function(dateText){
				getLimitDay(dateText);
				setBookingDate();
			}
		});

	});

	function setProductInfo(){
		var info = $('select[name=proinfo] > option:selected').val();
		var infoArray = info.split('-');
		var bookingPriceText = '￦' + number_format(infoArray[1]);
		var bookingMemCntText = document.reservationForm.memCnt.value + '인';
		var bookingText = bookingPriceText	+ ' X ' + bookingMemCntText;

		document.reservationForm.proIdx.value = infoArray[0];
		document.reservationForm.price.value = infoArray[1];
		document.reservationForm.totalPrice.value = infoArray[1] * document.reservationForm.memCnt.value;
		
		var bookingTotalPriceText = '￦' + number_format(document.reservationForm.price.value * document.reservationForm.memCnt.value);

		$('#bookingInfo').text(bookingText);
		$('#bookingPrice').text(bookingPriceText);
		$('#bookingTotal').text(bookingTotalPriceText);

		setBookingDate()
	}

	function setBookingMem(){
		var info = $('select[name=bookingMem] > option:selected').val();
		document.reservationForm.memCnt.value = info;

		var bookingPriceText = '￦' + number_format(document.reservationForm.price.value);
		var bookingMemCntText = document.reservationForm.memCnt.value + '인';
		var bookingText = bookingPriceText	+ ' X ' + bookingMemCntText;
		
		var bookingTotalPriceText = '￦' + number_format(document.reservationForm.price.value * document.reservationForm.memCnt.value);
		document.reservationForm.totalPrice.value = document.reservationForm.price.value * document.reservationForm.memCnt.value;

		$('#bookingInfo').text(bookingText);
		$('#bookingPrice').text(bookingPriceText);
		$('#bookingMem').text(bookingMemCntText);
		$('#bookingTotal').text(bookingTotalPriceText);
	}

	function setBookingDate(){
		var bookingDate = $('#bookingDate').val();
		//alert(bookingDate);
		document.reservationForm.resDate.value = bookingDate;
		var param =  $("#reservationForm").serialize();
		$.ajax({
			url : '?com=shaman&pro=setSchedule',
			data : param,
			type : 'post',
			success : function(data){
				$('#bookingTime').empty();
				$('#bookingTime').html(data);
			},
			error : function(){
				alert('통신 에러 입니다.');
			}
		});
	}

	function setBookingTime(){
		var info = $('select[name=bookingTime] > option:selected').val();
		var infoArray = info.split('|');
		document.reservationForm.resStartTime.value = infoArray[0];
		document.reservationForm.resEndTime.value = infoArray[1];
	}

	function setReservation(){
		var form = document.reservationForm;

		if(form.proIdx.value == ""){
			alert('상품을 선택하여 주세요.');
			return false;
		}

		if(form.resDate.value == ""){
			alert('예약일자를 선택하여 주세요.');
			return false;
		}

		if(form.resStartTime.value == ""){
			alert('예약시간을 선택하여 주세요.');
			return false;
		}
		
		if(confirm('결제 하시겠습니까?') == true){
			var param =  $("#reservationForm").serialize();
			$.ajax({
				url : '?com=shaman&pro=shamaninfo',
				data : param,
				type : 'post',
				success : function(data){
					var getCode = trim(data);
					if(getCode == "00"){
						alert('예약 되었습니다.');
						location.href = '?com=shaman&lnd=shamanHome&SHId=<?=$SHId?>';
					}
				},
				error : function(){
					alert('통신 에러 입니다.');
				}
			});
		}

		//form.submit();
	}

	function getLimitDay(date){
		var SHIdx = document.reservationForm.SHIdx.value;
		$.ajax({
			url : '?com=shaman&pro=shamaninfo',
			data : {'mode':'limitDayConfirm','SHIdx':SHIdx, 'resDate':date},
			type : 'post',
			success : function(data){
				var getCode = trim(data);
				if(getCode == "L"){
					alert('예약이 불가능 합니다.');
					location.reload();
				}
			},
			error : function(){
				alert('통신 에러 입니다.');
			}
		});
	}

	function goLogin(SHId){
		alert('로그인후 이용하여 주십시요.');
		location.href = '?com=user&lnd=login&SHId='+SHId;
	}
</script>
<form name="reservationForm" id="reservationForm" method="post">
	<input type="hidden" name="SHId" value="<?=$SHId?>" />
	<input type="hidden" name="SHIdx" value="<?=$rData["idx"]?>" />
	<input type="hidden" name="proIdx" value="" />
	<input type="hidden" name="price" value="" />
	<input type="hidden" name="totalPrice" value="" />
	<input type="hidden" name="memCnt" value="1" />
	<input type="hidden" name="resUserId" value="<?=$_SESSION["USER_ID"]?>" />
	<input type="hidden" name="resDate" value="" />
	<input type="hidden" name="resStartTime" value="" />
	<input type="hidden" name="resEndTime" value="" />
	<input type="hidden" name="mode" value="reservation" />
</form>
	<div class="layer_title">
        <p>예약 요청</p>
        <input type="image" src="/images/mobile/btn_close.gif" alt="" onclick="location.href = '?com=shaman&lnd=shamanHome&SHId=<?=$SHId?>'"/>
    </div>

    <div style="height:40px; width:100%; background:#666; color:#fff; line-height:40px; padding:0px 20px; box-sizing:border-box;">
        <div style="float:left; font-size:19px;" id="bookingTotal">
            ￦ 0
        </div>
        <div style="float:right; font-size:16px;" id="bookingMem">
            1인
        </div>
    </div>

    <fieldset class="login_field login_field_ex">
        <select name="proinfo" onchange="setProductInfo();">
			<option value="">신점 선택</option>
			<?=$rData["productSelect"]?>
        </select>

        <div class="ctl_half">
            <div class="ctl_half_t1">
                <input type="text" class="" id="bookingDate" name="bookingDate" placeholder="예약일"/>
            </div>
            <div class="ctl_half_t2">
				<div id="bookingTime">
                <select style="width:100%;" name="bookingTime">
					<option value="">예약시간 선택</option>
                </select>
				</div>
            </div>
        </div>

        <div class="ctl_half">
            <div class="ctl_half_t1">
                <select style="width:100%;" name="bookingMem" onchange="setBookingMem();">
					<option value="1">1명</option>
					<option value="2">2명</option>
					<option value="3">3명</option>
                </select>
            </div>
            <div class="ctl_half_t2">
            </div>
        </div>
		<?if($_SESSION["USER_ID"] == ""){?>
        <button type="button" style="margin-top:10px;" class="btn_1" onclick="goLogin('<?=$SHId?>')">즉시예약</button>
		<?}else{?>
		<button type="button" style="margin-top:10px;" class="btn_1" onclick="setReservation();">즉시예약</button>
		<?}?>

    </fieldset>