<?if($lnd != "app"){?>
	</div>
<?}?>
    <!-- 하단 메뉴 ~ 주소 시작 -->
	<?include $_SERVER["DOCUMENT_ROOT"]."/inc/commonFooter.php"?>
	
	<?if($com == "board"){?>
    <!-- 글쓰기 레이어 시작 -->
	<form name="writeForm" method="post" action="?com=board&pro=boardinfo">
	<input type="hidden" name="mode" value="insert"/>
	<input type="hidden" name="idx" value="<?=$idx?>"/>
	<input type="hidden" name="code" value="<?=$code?>"/>
<?if($_SESSION["USER_ID"] == ""){?>
	<input type="hidden" name="userId" value="<?=$_SESSION["SH_ID"]?>"/>
<?}else{?>
	<input type="hidden" name="userId" value="<?=$_SESSION["USER_ID"]?>"/>
<?}?>

    <div class="pop_layer_wrap">
        <div class="pop_overlap"></div>
        
        <fieldset class="write_form">
            <legend>글쓰기</legend>
            <a href="javascript:closePop()" class="pop_close_btn"><img src="/images/pop_close_btn.gif" alt="닫기" /></a>
            <dl class="pop_form_ctl">
<?if($code == "community"){?>
                <dt><label for="ddlType">구분</label></dt>
                <dd>
                    <select type="text" id="ddlType" name="headWord">
                        <option value="이곳어때" <?if($headWord == "이곳어때"){?>selected<?}?>>이곳어때</option>
                        <option value="잡담신설" <?if($headWord == "잡담신설"){?>selected<?}?>>잡담신설</option>
                        <option value="신점공유" <?if($headWord == "신점공유"){?>selected<?}?>>신점공유</option>
                        <option value="기타" <?if($headWord == "기타"){?>selected<?}?>>기타</option>
                    </select>
                </dd>
<?}?>
<?if($code == "travel"){?>
                <dt><label for="ddlType">구분</label></dt>
                <dd>
                    <select type="text" id="ddlType" name="headWord">
                        <option value="당일기도" <?if($headWord == "당일기도"){?>selected<?}?>>당일기도</option>
                        <option value="1박2일" <?if($headWord == "1박2일"){?>selected<?}?>>1박2일</option>
                        <option value="추천기도" <?if($headWord == "추천기도"){?>selected<?}?>>추천기도</option>
                    </select>
                </dd>
<?}?>
<?if($code == "area"){?>

                <dt><label for="ddlType">구분</label></dt>
                <dd>
                    <select type="text" id="ddlType" name="headWord">
						<option value="">전체</option>
                        <option value="서울" <?if($headWord == "서울"){?>selected<?}?>>서울</option>
                        <option value="경기" <?if($headWord == "경기"){?>selected<?}?>>경기</option>
                        <option value="충청남도" <?if($headWord == "충청남도"){?>selected<?}?>>충청남도</option>
                        <option value="충청북도" <?if($headWord == "충청북도"){?>selected<?}?>>충청북도</option>
                        <option value="강원도" <?if($headWord == "강원도"){?>selected<?}?>>강원도</option>
                        <option value="경상남도" <?if($headWord == "경상남도"){?>selected<?}?>>경상남도</option>
                        <option value="경상북도" <?if($headWord == "경상북도"){?>selected<?}?>>경상북도</option>
                        <option value="전라남도" <?if($headWord == "전라남도"){?>selected<?}?>>전라남도</option>
                        <option value="전라북도" <?if($headWord == "전라북도"){?>selected<?}?>>전라북도</option>
                        <option value="제주도" <?if($headWord == "제주도"){?>selected<?}?>>제주도</option>
                        <option value="인천" <?if($headWord == "인천"){?>selected<?}?>>인천</option>
                        <option value="대전" <?if($headWord == "대전"){?>selected<?}?>>대전</option>
                        <option value="대구" <?if($headWord == "대구"){?>selected<?}?>>대구</option>
                        <option value="부산" <?if($headWord == "부산"){?>selected<?}?>>부산</option>
                        <option value="광주" <?if($headWord == "광주"){?>selected<?}?>>광주</option>
                        <option value="그 외 지역" <?if($headWord == "그 외 지역"){?>selected<?}?>>그 외 지역</option>
                        <option value="해외" <?if($headWord == "해외"){?>selected<?}?>>해외</option>
                    </select>
                </dd>
<?}?>


                <dt><label for="txtSubject">제목</label></dt>
                <dd><input type="text" id="txtSubject" value="<?=$title?>" name="title"/></dd>

                <dd class="pop_form_cont">
                    <p>※ 고객님의 연락처, 주소 등의 개인정보가 포함된 글을 올리실 경우에는 타인에게 해당정보가<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;노출될 수 있으니 게재를 삼가하여 주시기 바랍니다.</p>
                    <!--<textarea id="txtContent" style="height:230px;" name="content"><?=$content?></textarea>-->
					<textarea placeholder="Placeholder" id="txtContent" name="content" style="width:100%;min-width:310px;height:210px; display:none;"></textarea>
					<script type="text/javascript">
					var oEditors = [];
					nhn.husky.EZCreator.createInIFrame({
						oAppRef: oEditors,
						elPlaceHolder: "txtContent",
						sSkinURI: "/se2/SmartEditor2Skin.html",
						fCreator: "createSEditor2"
					});
					</script>
                </dd>
            </dl>
            <div class="pop_form_btn">
<?if($idx == ""){?>
                <input type="button" value="작성완료" class="b_end_btn" style="float:none;margin:0px 5px 0px 0px; width:100px;" onclick="writeChk();"/>
<?}else{?>
                <input type="button" value="작성완료" class="b_end_btn" style="float:none;margin:0px 5px 0px 0px; width:100px;" onclick="modifyChk();"/>
<?}?>
                <input type="button" value="취소" onclick="if (confirm('글 작성을 취소 하시겠습니까?')) closePop();" class="b_select_btn" style="float:none;margin:0px;width:100px;" />
            </div>
        </fieldset>
    </div>
	</form>
    <!-- 글쓰기 레이어 끝 -->
	<?}else if($com == "aqBoard" && $lnd=="list"){?>
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
    <!-- 글쓰기 레이어 시작 -->
	<form name="writeForm" method="post" action="?com=aqBoard&pro=aqBoardInfo">
	<input type="hidden" name="mode" value="insert"/>
	<input type="hidden" name="proCate" value=""/>
	<input type="hidden" name="proPrice" value=""/>
	<input type="hidden" name="userId" value="<?=$_SESSION["USER_ID"]?>"/>
    <div class="pop_layer_wrap">
        <div class="pop_overlap"></div>
        <fieldset class="write_form">
            <legend>글쓰기</legend>
            <a href="javascript:closePop()" class="pop_close_btn"><img src="/images/pop_close_btn.gif" alt="닫기" /></a>
            <dl class="pop_form_ctl">
                <dt><label for="ddlType">상담분야</label></dt>
                <dd>
                    <select type="text" id="questionType" onchange="setQuestion();">
						<option value="">선택</option>
						<?=$getProductInfoList?>
                    </select>
                </dd>

                <dt><label for="txtSubject">제목</label></dt>
                <dd><input type="text" id="txtSubject" name="title"/></dd>

                <dt><label for="txtStartDate">답변기간</label></dt>
                <dd><input type="text" id="answerStartDate" style="width:98px;" name="answerStartDate"/> - <input type="text" id="answerEndDate" style="width:98px;" name="answerEndDate"/></dd>

                <dd class="pop_form_cont">
                    <p>※ 고객님의 연락처, 주소 등의 개인정보가 포함된 글을 올리실 경우에는 타인에게 해당정보가<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;노출될 수 있으니 게재를 삼가하여 주시기 바랍니다.</p>
                    <textarea id="txtContent" style="height:210px;" name="content">내용을 입력해주세요.</textarea>
                </dd>
            </dl>
            <div class="pop_form_btn">
                <input type="button" value="글쓰기" class="btn2" onclick="writeChk();"/>
                <input type="button" value="취소" onclick="if (confirm('글 작성을 취소 하시겠습니까?')) closePop();" class="btn3" />
            </div>
        </fieldset>
    </div>
	</form>
    <!-- 글쓰기 레이어 끝 -->
	<?}else if($com == "aqBoard" && $lnd=="view"){?>
    <!-- 글쓰기 레이어 시작 -->
	<form name="writeForm" method="post" action="?com=aqBoard&pro=aqBoardInfo">
	<input type="hidden" name="mode" value="modify"/>
	<input type="hidden" name="idx" value="<?=$idx?>"/>
    <div class="pop_layer_wrap">
        <div class="pop_overlap"></div>
        <fieldset class="write_form">
            <legend>글쓰기</legend>
            <a href="javascript:closePop()" class="pop_close_btn"><img src="/images/pop_close_btn.gif" alt="닫기" /></a>
            <dl class="pop_form_ctl">

                <dt><label for="txtSubject">제목</label></dt>
                <dd><input type="text" id="txtSubject" name="title" value="<?=$rtnData["title"]?>"/></dd>

                <!--<dt><label for="txtStartDate">답변기간</label></dt>
                <dd><input type="text" id="txtStartDate" style="width:98px;" /> - <input type="text" id="txtEndDate" style="width:98px;" /></dd>-->

                <dd class="pop_form_cont">
                    <p>※ 고객님의 연락처, 주소 등의 개인정보가 포함된 글을 올리실 경우에는 타인에게 해당정보가<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;노출될 수 있으니 게재를 삼가하여 주시기 바랍니다.</p>
                    <textarea id="txtContent" style="height:210px;" name="content"><?=$rtnData["content"]?></textarea>
                </dd>
            </dl>
            <div class="pop_form_btn">
                <input type="button" value="수정" class="btn2" onclick="modifyChk();"/>
                <input type="button" value="취소" onclick="if (confirm('글 수정을 취소 하시겠습니까?')) closePop();" class="btn3" />
            </div>
        </fieldset>
    </div>
	</form>
	<?}?>
<!-- 리포트2.0 로그분석코드 시작 -->
<script type="text/j-vascript">
var JsHost = (("https:" == document.location.protocol) ? "https://" : "http://");
var uname = escape("점");
document.write(unescape("%3Cscript id='log_script' src='" + JsHost + "credit9600.weblog.cafe24.com/weblog.js?uid=credit9600&uname="+uname+"' type='text/j-vascript'%3E%3C/script%3E"));
</script>
<!-- 리포트2.0  로그분석코드 완료 -->
</body>
</html>