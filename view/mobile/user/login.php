<script>
$(document).ready(function(){
    // 저장된 쿠키값을 가져와서 ID 칸에 넣어준다. 없으면 공백으로 들어감.
    var userInputId = getCookie("userInputId");
    var userInputPwd = getCookie("userInputPwd");
    $("input[name='id']").val(userInputId);
    $("input[name='pwd']").val(userInputPwd);

    if($("input[name='id']").val() != ""){ // 그 전에 ID를 저장해서 처음 페이지 로딩 시, 입력 칸에 저장된 ID가 표시된 상태라면,
        $("#saveId").attr("checked", true); // ID 저장하기를 체크 상태로 두기.
    }

    if($("input[name='pwd']").val() != ""){ // 그 전에 ID를 저장해서 처음 페이지 로딩 시, 입력 칸에 저장된 ID가 표시된 상태라면,
        $("#savePwd").attr("checked", true); // ID 저장하기를 체크 상태로 두기.
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
<form name="loginForm" method="post" action="?com=user&pro=login">
<input type="hidden" name="SHId" value="<?=$SHId?>" />

		<fieldset class="login_field">
            <input type="text" value="" placeholder="아이디" id="txtID" name="id"/>
            <input type="password" value="" placeholder="비밀번호" id="txtPassword" name="pwd" onKeyDown="onKeyDown();"/>

            <div style="padding:10px 0px 15px 0px;">
                <label><input type="checkbox" id="saveId" value="Y"/>아이디 저장</label>
                <label><input type="checkbox" id="savePwd" value="Y"/>비밀번호 저장</label>
            </div>

            <input type="button" value="로그인" class="btn_3" onclick="login_chk();"/>

            <p>
                점(占) 계정이 없으세요?&nbsp;&nbsp;<a href="?com=user&lnd=join" class="link1">회원가입하기</a>
            </p>
            <p>
                <a href="?com=user&lnd=search" class="link1">아이디/비밀번호찾기</a>
            </p>
        </fieldset>
</form>