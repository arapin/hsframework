<?
	$board = new Board();

	$idx = Request::get('idx', Request::REQUEST | Request::XSS_CLEAR);
	$code = Request::get('code', Request::REQUEST | Request::XSS_CLEAR);

	$getBeen = array(":idx" => $idx);
	$rtnData = $board->boardModifyInfo($getBeen);
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
            <form id="file-upload" class="upload"  name="joinForm" method="post">
                <h3>게시물 내용</h3>
                <div class="inner clearfix">
                    <fieldset class="error">
                        <label for="field1">제목</label>
                        <div class="field">
							<div class="error-alert" style="display:;color:#828282;font-size:9pt;background-color:#F4F4F4;height:auto;margin-bottom:5px;padding:5px;line-height: 10px;"><?=$rtnData["title"]?></div>
						</div>
                    </fieldset>
					<fieldset class="error">
						<label for="field13">내용</label>
                        <div class="field">

							<div class="error-alert" style="display:;color:#828282;font-size:9pt;background-color:#F4F4F4;height:auto;margin-bottom:5px;padding:5px;line-height: 10px;"><?=str_replace("src=\"upload","src=\"/se2/upload",$rtnData["content"])?></div>
						</div>
                    </fieldset>
                    <a href="#" class="cancel right" onclick="location.href='?com=board&lnd=modify&mng=Y&idx=<?=$idx?>&code=<?=$code?>'">수정하기</a>
                    <a href="#" class="cancel right" onclick="location.href='?com=board&lnd=list&mng=Y&code=<?=$code?>'">목록으로</a>
                </div>
            </form>
