<?
	$shaman = new Shaman();

	$shamanData = array(":SHId" => $_SESSION["SH_ID"]);
	$rData = $shaman->shamanModifyInfo($shamanData);

?>
<script src="https://maps.googleapis.com/maps/api/js"></script>
<form name="joinForm" method="post" action="?com=shaman&pro=shamaninfo">
<input type="hidden" name="mode" value="modify" />
<input type="hidden" name="SHId" value="<?=$rData["SHId"]?>" />
<table>
	<tr>
		<td>아이디</td>
		<td><?=$rData["SHId"]?></td>
	</tr>
	<tr>
		<td>이름</td>
		<td><input type="text" name="name" value="<?=$rData["name"]?>" /></td>
	</tr>
	<tr>
		<td>점집 이름</td>
		<td><input type="text" name="SHName" value="<?=$rData["SHName"]?>" /></td>
	</tr>
	<tr>
		<td>점집 전화번호</td>
		<td><input type="text" name="SHTel" value="<?=$rData["SHTel"]?>" /></td>
	</tr>
	<tr>
		<td>점집 휴대폰</td>
		<td><input type="text" name="SHPhone" value="<?=$rData["SHPhone"]?>" /></td>
	</tr>
	<tr>
		<td>점집 주소</td>
		<td><input type="text" name="SHAddress" value=""/><input type="button" value="입력한 주소로 위도 경도 매칭" onclick="codeAddress();"/></td>
	</tr>
	<tr>
		<td>점집 위도</td>
		<td><input type="text" name="SHLng" value="<?=$rData["SHLng"]?>" readonly/></td>
	</tr>
	<tr>
		<td>점집 경도</td>
		<td><input type="text" name="SHLat" value="<?=$rData["SHLat"]?>" readonly/></td>
	</tr>
	<tr>
		<td>점집 설명</td>
		<td>
			<textarea name="SHDesc" style="width:200px;height:100px"><?=$rData["SHDesc"]?></textarea>
		</td>
	</tr>
	<tr>
		<td>운영시간</td>
		<td>
			시작 : <select name="SHStartTime">
				<option value="">::선택하여 주십시요::</option>
				<option value="00" <?if($rData["SHStartTime"] == "00"){?>selected<?}?>>24</option>
				<option value="01" <?if($rData["SHStartTime"] == "01"){?>selected<?}?>>1</option>
				<option value="02" <?if($rData["SHStartTime"] == "02"){?>selected<?}?>>2</option>
				<option value="03" <?if($rData["SHStartTime"] == "03"){?>selected<?}?>>3</option>
				<option value="04" <?if($rData["SHStartTime"] == "04"){?>selected<?}?>>4</option>
				<option value="05" <?if($rData["SHStartTime"] == "05"){?>selected<?}?>>5</option>
				<option value="06" <?if($rData["SHStartTime"] == "06"){?>selected<?}?>>6</option>
				<option value="07" <?if($rData["SHStartTime"] == "07"){?>selected<?}?>>7</option>
				<option value="08" <?if($rData["SHStartTime"] == "08"){?>selected<?}?>>8</option>
				<option value="09" <?if($rData["SHStartTime"] == "09"){?>selected<?}?>>9</option>
				<option value="10" <?if($rData["SHStartTime"] == "10"){?>selected<?}?>>10</option>
				<option value="11" <?if($rData["SHStartTime"] == "11"){?>selected<?}?>>11</option>
				<option value="12" <?if($rData["SHStartTime"] == "12"){?>selected<?}?>>12</option>
				<option value="13" <?if($rData["SHStartTime"] == "13"){?>selected<?}?>>13</option>
				<option value="14" <?if($rData["SHStartTime"] == "14"){?>selected<?}?>>14</option>
				<option value="15" <?if($rData["SHStartTime"] == "15"){?>selected<?}?>>15</option>
				<option value="16" <?if($rData["SHStartTime"] == "16"){?>selected<?}?>>16</option>
				<option value="17" <?if($rData["SHStartTime"] == "17"){?>selected<?}?>>17</option>
				<option value="18" <?if($rData["SHStartTime"] == "18"){?>selected<?}?>>18</option>
				<option value="19" <?if($rData["SHStartTime"] == "19"){?>selected<?}?>>19</option>
				<option value="20" <?if($rData["SHStartTime"] == "20"){?>selected<?}?>>20</option>
				<option value="21" <?if($rData["SHStartTime"] == "21"){?>selected<?}?>>21</option>
				<option value="22" <?if($rData["SHStartTime"] == "22"){?>selected<?}?>>22</option>
				<option value="23" <?if($rData["SHStartTime"] == "23"){?>selected<?}?>>23</option>
			</select>
				종료 : <select name="SHEndTime">
				<option value="">::선택하여 주십시요::</option>
				<option value="00" <?if($rData["SHEndTime"] == "00"){?>selected<?}?>>24</option>
				<option value="01" <?if($rData["SHEndTime"] == "01"){?>selected<?}?>>1</option>
				<option value="02" <?if($rData["SHEndTime"] == "02"){?>selected<?}?>>2</option>
				<option value="03" <?if($rData["SHEndTime"] == "03"){?>selected<?}?>>3</option>
				<option value="04" <?if($rData["SHEndTime"] == "04"){?>selected<?}?>>4</option>
				<option value="05" <?if($rData["SHEndTime"] == "05"){?>selected<?}?>>5</option>
				<option value="06" <?if($rData["SHEndTime"] == "06"){?>selected<?}?>>6</option>
				<option value="07" <?if($rData["SHEndTime"] == "07"){?>selected<?}?>>7</option>
				<option value="08" <?if($rData["SHEndTime"] == "08"){?>selected<?}?>>8</option>
				<option value="09" <?if($rData["SHEndTime"] == "09"){?>selected<?}?>>9</option>
				<option value="10" <?if($rData["SHEndTime"] == "10"){?>selected<?}?>>10</option>
				<option value="11" <?if($rData["SHEndTime"] == "11"){?>selected<?}?>>11</option>
				<option value="12" <?if($rData["SHEndTime"] == "12"){?>selected<?}?>>12</option>
				<option value="13" <?if($rData["SHEndTime"] == "13"){?>selected<?}?>>13</option>
				<option value="14" <?if($rData["SHEndTime"] == "14"){?>selected<?}?>>14</option>
				<option value="15" <?if($rData["SHEndTime"] == "15"){?>selected<?}?>>15</option>
				<option value="16" <?if($rData["SHEndTime"] == "16"){?>selected<?}?>>16</option>
				<option value="17" <?if($rData["SHEndTime"] == "17"){?>selected<?}?>>17</option>
				<option value="18" <?if($rData["SHEndTime"] == "18"){?>selected<?}?>>18</option>
				<option value="19" <?if($rData["SHEndTime"] == "19"){?>selected<?}?>>19</option>
				<option value="20" <?if($rData["SHEndTime"] == "20"){?>selected<?}?>>20</option>
				<option value="21" <?if($rData["SHEndTime"] == "21"){?>selected<?}?>>21</option>
				<option value="22" <?if($rData["SHEndTime"] == "22"){?>selected<?}?>>22</option>
				<option value="23" <?if($rData["SHEndTime"] == "23"){?>selected<?}?>>23</option>
			</select>
		</td>
	</tr>
</table>
</form>
<div>
	<input type="button" value="점집수정" onclick="form_chk_update();"/>
	<input type="button" value="취소" onclick="goPage('index');" />
</div>