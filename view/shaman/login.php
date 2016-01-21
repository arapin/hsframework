<script>
$(document).ready(function(){
    // 저장된 쿠키값을 가져와서 ID 칸에 넣어준다. 없으면 공백으로 들어감.
    var ShInputId = getCookie("ShInputId");
    var ShInputPwd = getCookie("ShInputPwd");
    $("input[name='id']").val(ShInputId); 
    $("input[name='pwd']").val(ShInputPwd); 
     
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
            var ShInputId = $("input[name='id']").val();
            setCookie("ShInputId", ShInputId, 7); // 7일 동안 쿠키 보관
        }else{ // ID 저장하기 체크 해제 시,
            deleteCookie("ShInputId");
        }
    });

    $("#savePwd").change(function(){ // 체크박스에 변화가 있다면,
        if($("#savePwd").is(":checked")){ // ID 저장하기 체크했을 때,
            var ShInputPwd = $("input[name='pwd']").val();
            setCookie("ShInputPwd", ShInputPwd, 7); // 7일 동안 쿠키 보관
        }else{ // ID 저장하기 체크 해제 시,
            deleteCookie("ShInputPwd");
        }
    });
     
    // ID 저장하기를 체크한 상태에서 ID를 입력하는 경우, 이럴 때도 쿠키 저장.
    $("input[name='id']").keyup(function(){ // ID 입력 칸에 ID를 입력할 때,
        if($("#saveId").is(":checked")){ // ID 저장하기를 체크한 상태라면,
            var ShInputId = $("input[name='id']").val();
            setCookie("ShInputId", ShInputId, 7); // 7일 동안 쿠키 보관
        }
    });

    $("input[name='pwd']").keyup(function(){ // ID 입력 칸에 ID를 입력할 때,
        if($("#savePwd").is(":checked")){ // ID 저장하기를 체크한 상태라면,
            var ShInputPwd = $("input[name='pwd']").val();
            setCookie("ShInputPwd", ShInputPwd, 7); // 7일 동안 쿠키 보관
        }
    });
});
</script>

		<!-- 본문 시작 -->
        <div class="sub_content">
            <h3 class="sub_h3">무속인 로그인</h3>
            <ul class="l_style_left sub_site_map">
                <li>HOME >&nbsp;</li>
                <li>회원 >&nbsp;</li>
                <li class="text_bold">무속인 로그인</li>
            </ul>
<form name="loginForm" method="post" action="?com=shaman&pro=login">
            <div class="login_wrap" style="margin-bottom:500px;">
                <fieldset class="login_form">
                    <legend>무속인 회원로그인하기</legend>

                    <div class="login_width">
                        <label class="login_label" for="txtID">아이디</label>
                        <input type="text" onfocus="$(this).prev().hide();" onblur="if (this.value == '') $(this).prev().show();" id="txtID" name="id" />

                        <label class="login_label" for="txtPassword">비밀번호</label>
                        <input type="password" onfocus="$(this).prev().hide();" onblur="if (this.value == '') $(this).prev().show();" id="txtPassword" name="pwd" />

                        <label><input type="checkbox" id="saveId" value="Y"/>아이디 저장</label>
                        <label style="margin-left:17px;"><input type="checkbox" id="savePwd" value="Y"/>비밀번호 저장</label>
                    </div>
                </fieldset>

                <div class="login_width">
                    <input type="button" class="btn8" onclick="login_chk();" value="로그인" />
                </div>
            </div>
        </div>
</form>