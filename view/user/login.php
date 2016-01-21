<?
	$SHId = Request::get('SHId', Request::GET | Request::XSS_CLEAR);

if($_SESSION["USER_ID"] != ""){
	header('Location: /');
	exit;
}
?>
<script>
$(document).ready(function(){
    // 저장된 쿠키값을 가져와서 ID 칸에 넣어준다. 없으면 공백으로 들어감.
    var userInputId = getCookie("userInputId");
    var userInputPwd = getCookie("userInputPwd");
    $("input[name='id']").val(userInputId);
    $("input[name='pwd']").val(userInputPwd);

    if($("input[name='id']").val() != ""){ // 그 전에 ID를 저장해서 처음 페이지 로딩 시, 입력 칸에 저장된 ID가 표시된 상태라면,
        $("#saveId").attr("checked", true); // ID 저장하기를 체크 상태로 두기.
		$("#txtID").prev().hide();
    }

    if($("input[name='pwd']").val() != ""){ // 그 전에 ID를 저장해서 처음 페이지 로딩 시, 입력 칸에 저장된 ID가 표시된 상태라면,
        $("#savePwd").attr("checked", true); // ID 저장하기를 체크 상태로 두기.
		$("#txtPassword").prev().hide();
    }

    $("#saveId").change(function(){ // 체크박스에 변화가 있다면,
        if($("#saveId").is(":checked")){ // ID 저장하기 체크했을 때,
            var userInputId = $("input[name='id']").val();
            setCookie("userInputId", userInputId, 7); // 7일 동안 쿠키 보관
        }else{ // ID 저장하기 체크 해제 시,
            deleteCookie("userInputId");
        }
    });

    $("#savePwd").change(function(){ // 체크박스에 변화가 있다면,
        if($("#savePwd").is(":checked")){ // ID 저장하기 체크했을 때,
            var userInputPwd = $("input[name='pwd']").val();
            setCookie("userInputPwd", userInputPwd, 7); // 7일 동안 쿠키 보관
        }else{ // ID 저장하기 체크 해제 시,
            deleteCookie("userInputPwd");
        }
    });

    // ID 저장하기를 체크한 상태에서 ID를 입력하는 경우, 이럴 때도 쿠키 저장.
    $("input[name='id']").keyup(function(){ // ID 입력 칸에 ID를 입력할 때,
        if($("#saveId").is(":checked")){ // ID 저장하기를 체크한 상태라면,
            var userInputId = $("input[name='id']").val();
            setCookie("userInputId", userInputId, 7); // 7일 동안 쿠키 보관
        }
    });

    $("input[name='pwd']").keyup(function(){ // ID 입력 칸에 ID를 입력할 때,
        if($("#savePwd").is(":checked")){ // ID 저장하기를 체크한 상태라면,
            var userInputPwd = $("input[name='pwd']").val();
            setCookie("userInputPwd", userInputPwd, 7); // 7일 동안 쿠키 보관
        }
    });
});

function onKeyDown()
{
     if(event.keyCode == 13)
     {
          login_chk();
     }
}
</script>
		<!-- 본문 시작 -->
        <div class="sub_content">
            <h3 class="sub_h3">로그인</h3>
            <ul class="l_style_left sub_site_map">
                <li>HOME >&nbsp;</li>
                <li>회원/무속인 >&nbsp;</li>
                <li class="text_bold">로그인</li>
            </ul>
<form name="loginForm" method="post" action="?com=user&pro=login">
<input type="hidden" name="SHId" value="<?=$SHId?>" />
            <div class="login_wrap" style="margin-bottom:500px;">
                <fieldset class="login_form">
                    <legend>점(占) 회원/무속인 통합 로그인</legend>

                    <div class="login_width">
                        <label class="login_label" for="txtID">아이디</label>
                        <input type="text" onfocus="$(this).prev().hide();" onblur="if (this.value == '') $(this).prev().show();" id="txtID" name="id" />

                        <label class="login_label" for="txtPassword">비밀번호</label>
                        <input type="password" onfocus="$(this).prev().hide();" onblur="if (this.value == '') $(this).prev().show();" id="txtPassword" name="pwd" onKeyDown="onKeyDown();"/>

                        <label><input type="checkbox" id="saveId" value="Y"/>아이디 저장</label>
                        <label style="margin-left:17px;"><input type="checkbox" id="savePwd" value="Y"/>비밀번호 저장</label>
                    </div>
                </fieldset>

                <div class="login_width">
                    <input type="button" class="btn8" onclick="login_chk();" value="로그인" />

                    <p>
                        <img src="/images/li3.gif" alt="" />(일반 회원) 점(占) 계정이 없으세요?
                        <a href="?com=user&lnd=join">가입하기</a>
                    </p>
                    <p>
                        <img src="/images/li3.gif" alt="" />(무속인) 아직 입점하지 않으셨나요?
                        <a href="/?com=shaman&lnd=join">입점하기</a>
                    </p>
                    <p>
                        <img src="/images/li3.gif" alt="" /><a href="?com=user&lnd=search">아이디/비밀번호찾기</a>
                    </p>
                </div>
            </div>
        </div>
</form>