<?
	$shmypage = new SHMypage();
	$fileData = array(":parentId" => $_SESSION["SH_ID"], ":type" => "shaman");
	$fileList = $shmypage->getFileInfoListViewM2($fileData);
?>
		<script>
			function formChk(){
				var form = document.fileForm;
				var error = 0;
				$('input[name*="imgFile"]').each(function(){
					if($(this).val() == ''){
						error++;
					}
				});

				if(error > 0){
					alert('파일을 모두 등록하여 주십시요.');
					return false;
				}

				form.submit();
			}

			function deleteFile(idx){
				var form = document.fileDeleteForm;
				form.fidx.value = idx;
				if(confirm('파일을 삭제 하시겠습니까?') == true){
					form.submit();
				}
			}
		</script>
		<form name="fileDeleteForm" method="post" action="?com=shMypage&pro=shMypageInfo">
			<input type="hidden" name="fidx" value="" />
			<input type="hidden" name="type" value="<?=$type?>" />
			<input type="hidden" name="mode" value="delFile"/>
		</form>
        <fieldset class="login_field login_field_ex">

            <div style="border:1px solid #c3c3c3; background:#f6f6f6; border-radius:3px;height:200px; overflow-y:auto; padding:10px; box-sizing:border-box; font-size:14px; margin-bottom:10px;">
                <dl class="img_up_list">
					<?=$fileList?>
                </dl>
            </div>
		<form name="fileForm" action="?com=shMypage&pro=shMypageInfo" method="post"  enctype="multipart/form-data">
		<input type="hidden" name="SHId" value="<?=$_SESSION["SH_ID"]?>"/>
		<input type="hidden" name="mode" value="saveFile"/>

            <div style="padding-bottom:10px;">
                <input type="file" name="imgFile"/>
            </div>
		</form>

            <div class="table">
                <!--<div class="t_cell_c">
                    <input type="button" style="margin-top:10px;" class="btn_1" value="파일추가" onclick="" />
                </div>-->
                <div class="t_cell_c" style="padding-left:5px;">
                    <input type="button" style="margin-top:10px;" class="btn_7" value="대표사진" onclick="setMainImg();" />
                </div>
                <div class="t_cell_c" style="padding:0px 5px;">
                    <input type="button" style="margin-top:10px;" class="btn_7" value="저장" onclick="formChk();"/>
                </div>
                <div class="t_cell_c">
                    <input type="button" style="margin-top:10px;" class="btn_2" value="취소" onclick="location.href='?com=shMypage&lnd=modify'" />
                </div>
            </div>
        </fieldset>