<?
	$code = Request::get('code', Request::REQUEST | Request::XSS_CLEAR);
?>        
		<div class="layer_title">
            <p>글쓰기</p>
            <input type="image" src="/images/mobile/btn_close.gif" alt="" onclick="location.href='?com=board&lnd=list&code=<?=$code?>'" />
        </div>
	<form name="writeForm" method="post" action="?com=board&pro=boardinfo">
	<input type="hidden" name="mode" value="insert"/>
	<input type="hidden" name="code" value="<?=$code?>"/>
<?if($_SESSION["USER_ID"] == ""){?>
	<input type="hidden" name="userId" value="<?=$_SESSION["SH_ID"]?>"/>
<?}else{?>
	<input type="hidden" name="userId" value="<?=$_SESSION["USER_ID"]?>"/>
<?}?>

        <fieldset class="login_field login_field_ex">
<?if($code == "community"){?>

                    <select name="headWord">
                        <option value="이곳어때" <?if($headWord == "이곳어때"){?>selected<?}?>>이곳어때</option>
                        <option value="잡담신설" <?if($headWord == "잡담신설"){?>selected<?}?>>잡담신설</option>
                        <option value="신점공유" <?if($headWord == "신점공유"){?>selected<?}?>>신점공유</option>
                        <option value="기타" <?if($headWord == "기타"){?>selected<?}?>>기타</option>
                    </select>
<?}?>
<?if($code == "travel"){?>

                    <select name="headWord">
                        <option value="당일기도" <?if($headWord == "당일기도"){?>selected<?}?>>당일기도</option>
                        <option value="1박2일" <?if($headWord == "1박2일"){?>selected<?}?>>1박2일</option>
                        <option value="추천기도" <?if($headWord == "추천기도"){?>selected<?}?>>추천기도</option>
                    </select>
<?}?>
<?if($code == "area"){?>

                    <select name="headWord">
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
<?}?>

            <input type="text" placeholder="제목" value="<?=$title?>" name="title"/>

            <textarea style="width:100%; height:240px; border:1px solid #c3c3c3; color:#666; box-sizing:border-box; padding:10px; font-size:14px; border-radius:2px;" placeholder="내용을 적어주세요" name="content"></textarea>

            <div class="ctl_half" style="padding-top:20px;">
                <div class="ctl_half_t1">
                    <input type="button" class="btn_1" value="작성하기" onclick="writeChk();" />
                </div>
                <div class="ctl_half_t2">
                    <input type="button" class="btn_2" value="취소" onclick="location.href='?com=board&lnd=list&code=<?=$code?>'" />
                </div>
            </div>
        </fieldset>

	</form>
