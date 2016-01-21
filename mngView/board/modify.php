<?
	$board = new Board();

	$idx = Request::get('idx', Request::REQUEST | Request::XSS_CLEAR);
	$code = Request::get('code', Request::REQUEST | Request::XSS_CLEAR);

	$getBeen = array(":idx" => $idx);
	$rtnData = $board->boardModifyInfo($getBeen);
	$headWord = $rtnData["headWord"];
?>
			<script type="text/javascript" src="/se2/js/HuskyEZCreator.js" charset="utf-8"></script>
			<div class="breadcrumbs clearfix">
                <ul class="breadcrumbs left">
                    <li><a href="#">SAN SIN GAK ADMIN</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>게시판 관리</li>
                </ul>
                <!--<a href="#" class="btn right"><i class="fa fa-caret-square-o-left"></i>EXPORT</a>-->
            </div>

            <form id="file-upload" class="upload"  name="writeForm" method="post" action="?com=board&pro=boardinfo&mng=Y" onsubmit="return writeChkMng(this);">
<input type="hidden" name="mode" value="modify" />
<input type="hidden" name="code" value="<?=$code?>" />
<input type="hidden" name="idx" value="<?=$idx?>" />

                <h3>게시물 등록</h3>
                <div class="inner clearfix">
                    <fieldset class="error">
                        <label for="field1">제목</label>
                        <div class="field">
                            <input type="text" placeholder="제목" id="field1" class="transform_cancel" name="title" value="<?=$rtnData["title"]?>" >
                    </fieldset>
<?if($code == "community"){?>
                    <fieldset class="error">
                        <label for="field1">구분</label>
                        <div class="field">
						<select class="chosen-select" id="ddlType" name="headWord">
							<option value="이곳어때" <?if($headWord == "이곳어때"){?>selected<?}?>>이곳어때</option>
							<option value="잡담신설" <?if($headWord == "잡담신설"){?>selected<?}?>>잡담신설</option>
							<option value="신점공유" <?if($headWord == "신점공유"){?>selected<?}?>>신점공유</option>
							<option value="기타" <?if($headWord == "기타"){?>selected<?}?>>기타</option>
						</select>
					</fieldset>


<?}?>
<?if($code == "travel"){?>
                    <fieldset class="error">
                        <label for="field1">구분</label>
                        <div class="field">
                    <select class="chosen-select" id="ddlType" name="headWord">
                        <option value="당일기도" <?if($headWord == "당일기도"){?>selected<?}?>>당일기도</option>
                        <option value="1박2일" <?if($headWord == "1박2일"){?>selected<?}?>>1박2일</option>
                        <option value="추천기도" <?if($headWord == "추천기도"){?>selected<?}?>>추천기도</option>
                    </select>
					</fieldset>
<?}?>
<?if($code == "area"){?>

                    <fieldset class="error">
                        <label for="field1">구분</label>
                        <div class="field">
                    <select class="chosen-select" id="ddlType" name="headWord">
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
					</fieldset>
<?}?>
					<fieldset class="error">
						<label for="field13">내용</label>
						<div class="field">
							<textarea placeholder="Placeholder" id="field3" name="content"><?=$rtnData["content"]?></textarea>
							<script type="text/javascript">
							var oEditors = [];
							nhn.husky.EZCreator.createInIFrame({
								oAppRef: oEditors,
								elPlaceHolder: "field3",
								sSkinURI: "/se2/SmartEditor2Skin.html",
								fCreator: "createSEditor2"
							});
							</script>
						</div>
                    </fieldset>
                    <input type="submit" value="저장" class="right">
                    <a href="#" class="cancel right" onclick="location.href='?com=board&lnd=list&mng=Y&code=<?=$code?>'">목록으로</a>
                </div>
            </form>
