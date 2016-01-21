   </div>

	<?include $_SERVER["DOCUMENT_ROOT"]."/inc/commonFooter.php"?>
   <?if($com=="shMypage" && $lnd=="qView"){?>
   <!-- 수정하기 레이어 시작 -->
	<form name="writeForm" method="post" action="?com=shMypage&pro=shMypageInfo">
	<input type="hidden" name="mode" value="aqModify"/>
	<input type="hidden" name="idx" value="<?=$idx?>"/>
    <div class="pop_layer_wrap">
        <div class="pop_overlap"></div>
        <fieldset class="write_form">
            <legend>글 수정하기</legend>
            <a href="javascript:closePop()" class="pop_close_btn"><img src="/images/pop_close_btn.gif" alt="닫기" /></a>
            <dl class="pop_form_ctl">
                <dt><label for="txtSubject">제목</label></dt>
                <dd><input type="text" id="txtSubject" name="title" value="<?=$rtnData["title"]?>" /></dd>

                <!--<dt><label for="ddlStartDate">답변기간</label></dt>
                <dd>
                    <select type="text" id="ddlStartDate" onfocus="$('#calendar').show()" onblur="$('#calendar').hide()" style="width:100px;font-size:15px;">
                        <option value="">15.10.31</option>
                    </select>
                    -
                    <select type="text" id="ddlStartDate" style="width:100px;font-size:15px;">
                        <option value="">15.11.10</option>
                    </select>

                    <div id="calendar" style="position:absolute; display:none; z-index:999;">
                        <div class="cld_wrap" style=" height:340px;">
                            <div style="position:absolute;width:280px;">
                                <input type="image" class="cld_btn float_left" src="/images/cld_prev.gif" alt="이전달" />
                                <input type="image" class="cld_btn float_right" src="/images/cld_next.gif" alt="다음달" />
                            </div>

                            <table class="cld_skin">
                                <caption>2015년 10월</caption>
                                <thead>
                                    <tr>
                                        <th scope="col">일</th>
                                        <th scope="col">월</th>
                                        <th scope="col">화</th>
                                        <th scope="col">수</th>
                                        <th scope="col">목</th>
                                        <th scope="col">금</th>
                                        <th scope="col">토</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href=""></a></td>
                                        <td><a href=""></a></td>
                                        <td><a href=""></a></td>
                                        <td><a href=""></a></td>
                                        <td class="cld_nday cld_yday"><a href="">1</a></td>
                                        <td class="cld_nday cld_yday"><a href="">2</a></td>
                                        <td class="cld_nday cld_yday"><a href="">3</a></td>
                                    </tr>
                                    <tr>
                                        <td class="cld_nday cld_yday"><a href="">4</a></td>
                                        <td class="cld_nday cld_yday"><a href="">5</a></td>
                                        <td class="cld_nday cld_yday"><a href="">6</a></td>
                                        <td class="cld_nday cld_yday"><a href="">7</a></td>
                                        <td class="cld_nday cld_yday"><a href="">8</a></td>
                                        <td class="cld_nday cld_yday"><a href="">9</a></td>
                                        <td class="cld_nday cld_yday"><a href="">10</a></td>
                                    </tr>
                                    <tr>
                                        <td class="cld_nday cld_yday"><a href="">11</a></td>
                                        <td class="cld_nday cld_yday"><a href="">12</a></td>
                                        <td class="cld_nday cld_yday"><a href="">13</a></td>
                                        <td class="cld_nday cld_yday"><a href="">14</a></td>
                                        <td class="cld_nday cld_yday"><a href="">15</a></td>
                                        <td class="cld_nday cld_yday"><a href="">16</a></td>
                                        <td class="cld_nday cld_yday"><a href="">17</a></td>
                                    </tr>
                                    <tr>
                                        <td class="cld_nday cld_yday"><a href="">18</a></td>
                                        <td class="cld_nday cld_yday"><a href="">19</a></td>
                                        <td class="cld_nday"><a href="">20</a></td>
                                        <td class="cld_bday"><a href="">21</a></td>
                                        <td class="cld_normal"><a href="">22</a></td>
                                        <td class="cld_nday"><a href="">23</a></td>
                                        <td class="cld_nday"><a href="">24</a></td>
                                    </tr>
                                    <tr>
                                        <td class="cld_normal"><a href="">25</a></td>
                                        <td class="cld_normal"><a href="">26</a></td>
                                        <td class="cld_normal"><a href="">27</a></td>
                                        <td class="cld_normal"><a href="">28</a></td>
                                        <td class="cld_normal"><a href="">29</a></td>
                                        <td class="cld_normal"><a href="">30</a></td>
                                        <td class="cld_normal"><a href="">31</a></td>
                                    </tr>
                                </tbody>
                            </table>

                            <div style="color:#777; font-size:12px;">
                                <input type="button" class="cld_btn1 float_left" value="날짜 선택 지우기" />
                            </div>
                        </div>
                    </div>
                </dd>-->

                <dd class="pop_form_cont">
                    <p>※ 고객님의 연락처, 주소 등의 개인정보가 포함된 글을 올리실 경우에는 타인에게 해당정보가<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;노출될 수 있으니 게재를 삼가하여 주시기 바랍니다.</p>
                    <textarea id="txtContent" style="height:190px;" name="content"><?=$rtnData["content"]?></textarea>
                </dd>
            </dl>
            <div class="pop_form_btn">
                <input type="button" value="수정" class="b_end_btn" style="float:none;margin:0px 5px 0px 0px; width:100px;" onclick="modifyChk();"/>
                <input type="button" value="취소" onclick="if (confirm('글 작성을 취소 하시겠습니까?')) closePop();" class="b_select_btn" style="float:none;margin:0px;width:100px;" />
            </div>
        </fieldset>
    </div>
</form>
	<?}?>
   <?if($com=="shMypage" && $lnd=="bView"){?>
	<form name="writeForm" method="post" action="?com=shMypage&pro=shMypageInfo">
	<input type="hidden" name="mode" value="insert"/>
	<input type="hidden" name="idx" value="<?=$idx?>"/>
	<input type="hidden" name="code" value="<?=$code?>"/>
	<input type="hidden" name="userId" value="<?=$_SESSION["SH_ID"]?>"/>

    <div class="pop_layer_wrap">
        <div class="pop_overlap"></div>
        
        <fieldset class="write_form">
            <legend>글쓰기</legend>
            <a href="javascript:closePop()" class="pop_close_btn"><img src="/images/pop_close_btn.gif" alt="닫기" /></a>
            <dl class="pop_form_ctl">
                <dt><label for="ddlType">구분</label></dt>
                <dd>
                    <select type="text" id="ddlType" name="headWord">
                        <option value="추천점집공유" <?if($headWord == "추천점집공유"){?>selected<?}?>>추천점집공유</option>
                        <option value="잡담" <?if($headWord == "잡담"){?>selected<?}?>>잡담</option>
                        <option value="나의 신점" <?if($headWord == "나의 신점"){?>selected<?}?>>나의 신점</option>
                    </select>
                </dd>

                <dt><label for="txtSubject">제목</label></dt>
                <dd><input type="text" id="txtSubject" value="<?=$title?>" name="title"/></dd>

                <dd class="pop_form_cont">
                    <p>※ 고객님의 연락처, 주소 등의 개인정보가 포함된 글을 올리실 경우에는 타인에게 해당정보가<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;노출될 수 있으니 게재를 삼가하여 주시기 바랍니다.</p>
                    <textarea id="txtContent" style="height:230px;" name="content"><?=$content?></textarea>
                </dd>
            </dl>
            <div class="pop_form_btn">
                <input type="button" value="작성완료" class="b_end_btn" style="float:none;margin:0px 5px 0px 0px; width:100px;" onclick="boardModifyChk();"/>
                <input type="button" value="취소" onclick="if (confirm('글 작성을 취소 하시겠습니까?')) closePop();" class="b_select_btn" style="float:none;margin:0px;width:100px;" />
            </div>
        </fieldset>
    </div>
	</form>
    <!-- 글쓰기 레이어 끝 -->
	<?}?>

	<?if($com=="shMypage" && $lnd=="resList"){?>
    <div class="pop_layer_wrap">
        <div class="pop_overlap"></div>
        <div style="width:400px; height:450px; background:#fff; position:absolute; left:50%; margin-left:-200px;">
            <table class="table_view_skin1">
                <caption>
                    예약자 정보
                    <a href="javascript:closePop()" class="pop_close_btn"><img src="/images/pop_close_btn.gif" alt="닫기" /></a>
                </caption>
                <tbody>
                    <tr>
                        <th scope="col">예약자명</th>
                        <td style="color:#333;" id="resName"></td>
                    </tr>
                    <tr>
                        <th scope="col">생년월일/시</th>
                        <td id="resUserInfo"></td>
                    </tr>
                    <tr>
                        <th scope="col">예약분류</th>
                        <td id="resProname"></td>
                    </tr>
                    <tr>
                        <th scope="col">예약일자</th>
                        <td id="resDate"></td>
                    </tr>
                    <tr>
                        <th scope="col">예약인원</th>
                        <td id="resMemCnt"></td>
                    </tr>
                    <tr>
                        <th scope="col">결제금액</th>
                        <td class="sj_help_txt2" id="resPrice"></td>
                    </tr>
                </tbody>
            </table>

            <div style="text-align:center; padding-top:90px;">
                <input type="button" value="닫기" onclick="closePop()" class="sj_btn4" style="width:100px;" />
            </div>
        </div>
    </div>
	<?}?>
    <!-- 수정하기 레이어 끝 -->

</body>
</html>
