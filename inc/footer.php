        </div>
        <!-- 본문 끝 -->
    </div>



    <!-- 하단 메뉴 ~ 주소 시작 -->
	<?include $_SERVER["DOCUMENT_ROOT"]."/inc/commonFooter.php"?>
	
	<?if($com == "board"){?>
    <!-- 글쓰기 레이어 시작 -->
	<form name="writeForm" method="post" action="?com=board&pro=boardinfo">
	<input type="hidden" name="mode" value="insert"/>
	<input type="hidden" name="code" value="<?=$code?>"/>
<?if($code == "notice"){?>
	<input type="hidden" name="userId" value="<?=$_SESSION["ADMIN_ID"]?>"/>
<?}else{?>
	<input type="hidden" name="userId" value="<?=$_SESSION["USER_ID"]?>"/>
<?}?>
    <div class="pop_layer_wrap">
        <div class="pop_overlap"></div>
        <fieldset class="write_form">
            <legend>글쓰기</legend>
            <a href="javascript:closePop()" class="pop_close_btn"><img src="/images/pop_close_btn.gif" alt="닫기" /></a>
            <dl class="pop_form_ctl">
                <dt><label for="txtSubject">제목</label></dt>
                <dd><input type="text" id="txtSubject" name="title"/></dd>
                <dd class="pop_form_cont"><textarea id="txtContent" name="content"></textarea></dd>
            </dl>
            <div class="pop_form_btn">
                <input type="button" value="글쓰기" class="btn2" onclick="writeChk();" />
                <input type="button" value="취소" onclick="if (confirm('글 작성을 취소 하시겠습니까?')) closePop();" class="btn3" />
            </div>
        </fieldset>
    </div>
	</form>
    <!-- 글쓰기 레이어 끝 -->
	<?}else if($com == "aqBoard" && $lnd=="list"){?>
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

                <!--<dt><label for="txtStartDate">답변기간</label></dt>
                <dd><input type="text" id="txtStartDate" style="width:98px;" /> - <input type="text" id="txtEndDate" style="width:98px;" /></dd>-->

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