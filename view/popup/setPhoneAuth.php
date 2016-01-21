<?
	include $_SERVER["DOCUMENT_ROOT"]."/class/COMMON/config.php";
	include $_SERVER["DOCUMENT_ROOT"]."/class/CONTROL/user.php";
	$user = new User();

	$phone		= Request::get('phone', Request::REQUEST | Request::XSS_CLEAR);
	$setAuthNum = $user->userAuthNumCreate($phone);
	setcookie("authNum",$setAuthNum, time() + 300, "/");
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>산신각 - 휴대폰 본인인증 < 회원가입 < 회원</title>
    <meta charset="utf-8" />
    <script src="/js/jquery-1.11.3.min.js"></script>
    <script src="/js/common.js"></script>
    <script src="/js/user.js"></script>
    <link rel="stylesheet" href="/css/layout.css" />
    <link rel="stylesheet" href="/css/pop.css" />
</head>
<body>
    
    <h1>
        휴대폰 본인인증
        <a href="javascript:self.close()" class="pop_close_btn2"><img src="/images/pop_close_btn2.gif" alt="닫기"/></a>
    </h1>

    <div class="pop_form_wrap">
        <dl class="pop_form">
            <dt><label>인증번호입력</label></dt><dd>
                <input type="text" id="authNum" value="<?=$setAuthNum?>"/>
                <input type="button" class="btn2" style="background:#555;font-size:13px;height:27px;" value="인증하기" onclick="chkAuth();"/>
            </dd>
        </dl>
        <ul class="list_1">
            <li><div>고객님의 정보는 항상 암호화되어 처리되고 있습니다.</div></li>
            <!--<li>일 3회 인증오류 발생시 금일에 한해 더 이상 휴대폰 본인인증을 이용할 수 없습니다.</li>-->
        </ul>
    </div>

    <div style="text-align:center">
        <a href="javascript:self.close()" ><input type="button" class="btn2_1" value="확인" /></a>
		<a href="javascript:self.close()" ><input type="button" class="btn2_2" value="닫기" /></a>
    </div>
</body>
</html>
