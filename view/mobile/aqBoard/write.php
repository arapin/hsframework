<?
	$aqBoard = new AqBoard();

	$getProductInfoList = $aqBoard->getProductInfoList($cate);
?>        	

<script>
	$(function() {
		$( "#answerStartDate" ).datepicker({
			changeMonth: true,
			changeYear: true,
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
			beforeShow: function() {
				setTimeout(function(){
					$('.ui-datepicker').css('z-index', 99999999999999);
				}, 0);
			}
		});

		$( "#answerEndDate" ).datepicker({
			changeMonth: true,
			changeYear: true,
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
			beforeShow: function() {
				setTimeout(function(){
					$('.ui-datepicker').css('z-index', 99999999999999);
				}, 0);
			}
		});
	});
</script>        
		<div class="layer_title">
            <p>글쓰기</p>
            <input type="image" src="/images/mobile/btn_close.gif" alt="" />
        </div>
	<form name="writeForm" method="post" action="?com=aqBoard&pro=aqBoardInfo">
	<input type="hidden" name="mode" value="insert"/>
	<input type="hidden" name="proCate" value=""/>
	<input type="hidden" name="proPrice" value=""/>
	<input type="hidden" name="userId" value="<?=$_SESSION["USER_ID"]?>"/>

        <fieldset class="login_field login_field_ex">

            <select style="color:#666; font-size:14px;" id="questionType" onchange="setQuestionM();">
				<option value="">상담분야</option>
				<?=$getProductInfoList?>
            </select>

            <div class="table" style="width: 100%; border: 1px solid #ccc; border-radius: 3px; height:40px; color:#666; font-size:14px;">
                <div class="t_cell_l" style="width:30px;padding-left:10px;">가격</div>
                <div class="t_cell_r">
                    <input type="text" style="color:#f55;border:none;text-align:right;margin:0px;font-size:15px;" value="0" id="viewPrice"/>
                </div>
                <div class="t_cell_r" style="width:20px;padding-right:10px;">
                    원
                </div>
            </div>

            <p class="table" style="color:#888; padding:0px;margin:10px 0px;">
                <div class="t_cell_l" style="font-size:14px;width:20px; vertical-align:top;">※</div>
                <div class="t_cell_l" style="font-size: 14px; vertical-align: top; line-height: 140%; ">상담분야는 결제후에 바꿀 수 없으니 신중하게 선택해주세요.</div>
            </p>

            <!--<div class="ctl_half" style="margin-bottom:20px;">
                <div class="ctl_half_t1">
                    <input type="button" class="btn_1" value="다음 진행" onclick="" />
                </div>
                <div class="ctl_half_t2">
                    <input type="button" class="btn_2" value="취소" onclick="" />
                </div>
            </div>

            <select style="background-color:#e3e3e3;">
                <option>운수점</option>
            </select>-->

            <input type="text" name="title" placeholder="제목"/>

            <div class="ctl_half">
                <div class="ctl_half_t1">
                    <input type="text" class="" placeholder="답변 시작일" onfocus="$('#calendar').show();" onblur="$('#calendar').hide();" id="answerStartDate" name="answerStartDate" />
                </div>
                <div class="ctl_half_t2">
                    <input type="text" class="" onfocus="$('#calendar').show();" onblur="$('#calendar').hide();" placeholder="답변 종료일" id="answerEndDate" name="answerEndDate"/>
                </div>
            </div>

            <textarea style="width:100%; height:240px; border:1px solid #c3c3c3; color:#888; box-sizing:border-box; padding:10px; font-size:14px; border-radius:2px;" placeholder="※ 고객님의 연락처, 주소 등의 개인정보가 포함 된 글을 올리실 경우에는 타인에게 해당정보가 노출될 수 있으니 게재를 삼가하여 주시기 바랍니다." id="txtContent" name="content"></textarea>

            <div class="ctl_half">
                <div class="ctl_half_t1">
                    <input type="button" style="margin-top:10px;" class="btn_1" value="작성하기" onclick="writeChk();" />
                </div>
                <div class="ctl_half_t2">
                    <input type="button" style="margin-top:10px;" class="btn_2" value="취소" onclick="location.href='?com=aqBoard&lnd=list'" />
                </div>
            </div>
        </fieldset>
	</form>
