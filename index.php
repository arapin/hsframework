<?
	include $_SERVER["DOCUMENT_ROOT"]."/class/COMMON/config.php";
	include $_SERVER["DOCUMENT_ROOT"]."/class/COMMON/class.Images.php";
	/*하하하하*/
	if(MOBILE == "N"){
		if($com != ""){
			include $_SERVER["DOCUMENT_ROOT"]."/class/CONTROL/".$com.".php";

			if($mng == "Y"){
				include $_SERVER["DOCUMENT_ROOT"]."/inc/mngChk.php";
				if($pro == ""){
					include $_SERVER["DOCUMENT_ROOT"]."/inc/mngHead.php";
					include $_SERVER["DOCUMENT_ROOT"]."/mngView/".$com."/".$lnd.".php";
					include $_SERVER["DOCUMENT_ROOT"]."/inc/mngFooter.php";
				}else{
					include $_SERVER["DOCUMENT_ROOT"]."/application/mng/".$com."/".$pro.".php";
				}
			}else{
				if($pro == ""){
					if($com == "mypage"){
						if($_SESSION["USER_ID"] == ""){
							header('Location: ?com=user&lnd=login');
						}
					}
					/*상단*/
					if($com=="index"){
						include $_SERVER["DOCUMENT_ROOT"]."/inc/indexHead.php";
					}else if($com=="shaman" && ($lnd == "map" || $lnd == "mapDaum")){
						include $_SERVER["DOCUMENT_ROOT"]."/inc/searchHead.php";
					}else if($com=="shaman" && ($lnd == "shamanhome" || $lnd == "shamanHomeDaum")){
						include $_SERVER["DOCUMENT_ROOT"]."/inc/shamanHomeHeader.php";
					}else if($com=="mypage"){
						include $_SERVER["DOCUMENT_ROOT"]."/inc/mypageHeader.php";
					}else if($com == "shMypage"){
						include $_SERVER["DOCUMENT_ROOT"]."/inc/shMypageHeader.php";
					}else if($com == "board" && ($lnd == "list" || $lnd == "view")){
						include $_SERVER["DOCUMENT_ROOT"]."/inc/headNew.php";
					}else if($com == "aqBoard" && ($lnd == "list" || $lnd == "view")){
						include $_SERVER["DOCUMENT_ROOT"]."/inc/headNew.php";
					}else if($com == "blank"){
						include $_SERVER["DOCUMENT_ROOT"]."/inc/headNew.php";
					}else if($com == "etc"){
						include $_SERVER["DOCUMENT_ROOT"]."/inc/headNew.php";
					}else if($com == "board" && $lnd == "noticeList2"){
						include $_SERVER["DOCUMENT_ROOT"]."/inc/headNew.php";
					}else if($com == "shopping"){
						include $_SERVER["DOCUMENT_ROOT"]."/inc/headNew.php";
					}else{
						include $_SERVER["DOCUMENT_ROOT"]."/inc/head.php";
					}

					/*본문*/
					include $_SERVER["DOCUMENT_ROOT"]."/view/".$com."/".$lnd.".php";

					/*하단*/
					if($com=="index"){
						include $_SERVER["DOCUMENT_ROOT"]."/inc/indexFooter.php";
					}else if($com=="shaman" && ($lnd == "map" || $lnd == "mapDaum")){
						include $_SERVER["DOCUMENT_ROOT"]."/inc/searchFooter.php";
					}else if($com=="shaman" && ($lnd == "shamanhome" || $lnd == "shamanHomeDaum")){
						include $_SERVER["DOCUMENT_ROOT"]."/inc/shamanHomeFooter.php";
					}else if($com=="mypage"){
						include $_SERVER["DOCUMENT_ROOT"]."/inc/mypageFooter.php";
					}else if($com == "shMypage"){
						include $_SERVER["DOCUMENT_ROOT"]."/inc/shMypageFooter.php";
					}else if($com == "board" && ($lnd == "list" || $lnd == "view")){
						include $_SERVER["DOCUMENT_ROOT"]."/inc/footerNew.php";
					}else if($com == "aqBoard" && ($lnd == "list" || $lnd == "view")){
						include $_SERVER["DOCUMENT_ROOT"]."/inc/footerNew.php";
					}else if($com == "board" && $lnd == "noticeList2"){
						include $_SERVER["DOCUMENT_ROOT"]."/inc/footerNew.php";
					}else if($com == "blank"){
						include $_SERVER["DOCUMENT_ROOT"]."/inc/footerNew.php";
					}else if($com == "etc"){
						include $_SERVER["DOCUMENT_ROOT"]."/inc/footerNew.php";
					}else if($com == "shopping"){
						include $_SERVER["DOCUMENT_ROOT"]."/inc/footerNew.php";
					}else{
						include $_SERVER["DOCUMENT_ROOT"]."/inc/footer.php";
					}

				}else{
					include $_SERVER["DOCUMENT_ROOT"]."/application/".$com."/".$pro.".php";
				}
			}
		}else{
			header('Location: http://jeomhouse.com/?com=index');
		}
	}else{
		include $_SERVER["DOCUMENT_ROOT"]."/class/CONTROL/".$com.".php";

		if($pro == ""){
			if($com == "mypage"){
				if($_SESSION["USER_ID"] == ""){
					header('Location: ?com=user&lnd=login');
				}
			}
			/*상단*/
			if($com=="index"){
				include $_SERVER["DOCUMENT_ROOT"]."/inc/mobile/indexHeader.php";
			}else{
				include $_SERVER["DOCUMENT_ROOT"]."/inc/mobile/header.php";
			}

			/*본문*/
			include $_SERVER["DOCUMENT_ROOT"]."/view/mobile/".$com."/".$lnd.".php";

			/*하단*/
			include $_SERVER["DOCUMENT_ROOT"]."/inc/mobile/footer.php";


		}else{
			include $_SERVER["DOCUMENT_ROOT"]."/application/mobile/".$com."/".$pro.".php";
		}
	}
?>