<?if($_SESSION["USER_ID"] == ""){?>
		<input type="button" value="회원가입" onclick="goPage('join');" />
		<input type="button" value="로그인" onclick="goPage('login');" />
		<input type="button" value="점집MAP" onclick="goPage('map');" />

<?}else{?>
		<input type="button" value="<?=$_SESSION["USER_ID"]?>님 정보수정" onclick="goPage('modify');" />
		<input type="button" value="<?=$_SESSION["USER_ID"]?>님 로그아웃" onclick="goPage('logout');" />
<?}?>

<?if($_SESSION["SH_ID"] == ""){?>
		<input type="button" value="점집등록" onclick="goPage('shamanJoin');" />
		<input type="button" value="점집로그인" onclick="goPage('shamanLogin');" />
<?}else{?>
		<input type="button" value="<?=$_SESSION["SH_ID"]?>님 점집수정" onclick="goPage('shModify');" />
		<input type="button" value="<?=$_SESSION["SH_ID"]?>님 로그아웃" onclick="goPage('shLogout');" />
<?}?>