<?
	if($_SESSION["ADMIN_ID"] == ""){
		if($lnd != "login" && $pro != "login"){
			header("Location:/mngView/mng/login.php");
		}
	}
?>