<?
	include $_SERVER["DOCUMENT_ROOT"]."/class/COMMON/config.php";
	include $_SERVER["DOCUMENT_ROOT"]."/class/CONTROL/shaman.php";
	$shaman = new Shaman();

	$id		= Request::get('id', Request::REQUEST | Request::XSS_CLEAR);

	$checkCode = $shaman->shamanIdCheck($id);
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>산신각 - 아이디 중복확인 < 회원가입 < 회원</title>
    <meta charset="utf-8" />
    <script src="/js/jquery-1.11.3.min.js"></script>
    <link rel="stylesheet" href="/css/layout.css" />
    <link rel="stylesheet" href="/css/pop.css" />

    <script>
		function setId(code){
			if(code == '00'){
				opener.document.joinForm.idChk.value = 'Y';
			}else{
				opener.document.joinForm.id.value = '';
			}
			self.close();
		}
    </script>
</head>
<body>
    
    <h1>
        아이디 중복확인
        <a href="javascript:self.close()" class="pop_close_btn2"><img src="/images/pop_close_btn2.gif" alt="닫기" /></a>
    </h1>

    <div class="pop_box1">
        <div class="pb_content1">
<?if($checkCode == "00"){?>
            <span class="pop_txt1"><?=$id?></span> 은 사용가능한 아이디입니다.
<?}else{?>
            <span class="pop_txt1"><?=$id?></span> 은 사용 불가능한 아이디입니다.
<?}?>
        </div>
    </div>

    <div style="text-align:center">
        <input type="button" class="btn2_1" value="확인" onclick="setId('<?=$checkCode?>');"/>
        <a href="javascript:self.close()"><input type="button" class="btn2_2" value="취소" /></a>
    </div>
</body>
</html>
