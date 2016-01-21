 <?
	 if($com == "board"){

		 if($lnd == "list"){
			 switch($code){
				 case "community" : $viewTitle = "커뮤니티"; break;
				 case "oq" : $viewTitle = "조합원 가입문의"; break;
				 case "travel" : $viewTitle = "기도여행"; break;
				 case "area" : $viewTitle = "추천 기도터 굿당"; break;
				 case "join" : $viewTitle = "점집등록 방법"; break;
			 }
?>
	<div id="scrollMenu" class="sview_content_wrap sv_scroll_menu" style="display:block; position:relative;">
        <ul class="l_style_inline">
            <li class="sv_menu_sel"><a href="?com=board&lnd=list&code=<?=$code?>"><?=$viewTitle?></a></li>
        </ul>
    </div>
<?
		 }else{
?>
    <div id="scrollMenu" class="sview_content_wrap sv_scroll_menu" style="display:block; position:relative;">
        <ul class="l_style_inline">
            <li <?if($lnd=="company"){?>class="sv_menu_sel"<?}?>><a href="?com=blank&lnd=company">회사소개</a></li>
            <li <?if($lnd=="about"){?>class="sv_menu_sel"<?}?>><a href="?com=blank&lnd=about">신점이란?</a></li>
            <li <?if($lnd=="noticeList2"){?>class="sv_menu_sel"<?}?>><a href="?com=board&lnd=noticeList2&code=search">이용안내</a></li>
            <li <?if($lnd=="service"){?>class="sv_menu_sel"<?}?>><a href="?com=blank&lnd=service">이용약관</a></li>
            <li <?if($lnd=="privacy"){?>class="sv_menu_sel"<?}?>><a href="?com=blank&lnd=privacy">개인정보취급방침</a></li>
            <li <?if($lnd=="youth"){?>class="sv_menu_sel"<?}?>><a href="?com=blank&lnd=youth">청소년보호정책</a></li>
            <li <?if($lnd=="email"){?>class="sv_menu_sel"<?}?>><a href="?com=blank&lnd=email">이메일무단수집거부</a></li>
            <li <?if($lnd=="sitemap"){?>class="sv_menu_sel"<?}?>><a href="?com=blank&lnd=sitemap">사이트맵</a></li>
        </ul>
    </div>

    <div class="sub_sub_menu">
        <ul class="l_style_inline">
            <li><a <?if($code == "search"){?>class="ss_link_sel"<?}?> href="?com=board&lnd=noticeList2&code=search">용한 점집 찾아보기</a></li>
            <li><a <?if($code == "booking"){?>class="ss_link_sel"<?}?> href="?com=board&lnd=noticeList2&code=booking">예약하기</a></li>
            <li><a <?if($code == "con"){?>class="ss_link_sel"<?}?> href="?com=board&lnd=noticeList2&code=con">상담</a></li>
        </ul>
    </div>
<?
		}
	}else if($com=="aqBoard") {
?>
    <!-- <div id="scrollMenu" class="sview_content_wrap sv_scroll_menu" style="display:block; position:relative;">
        <ul class="l_style_inline">
            <li class="sv_menu_sel"><a href="?com=aqBoard&lnd=list">문의하기</a></li>
        </ul>
    </div> -->
<?}else if($com=="blank"){?>
    <div id="scrollMenu" class="sview_content_wrap sv_scroll_menu" style="display:block; position:relative;">
        <ul class="l_style_inline">
            <li <?if($lnd=="company"){?>class="sv_menu_sel"<?}?>><a href="?com=blank&lnd=company">회사소개</a></li>
            <li <?if($lnd=="about"){?>class="sv_menu_sel"<?}?>><a href="?com=blank&lnd=about">신점이란?</a></li>
            <li <?if($lnd=="info"){?>class="sv_menu_sel"<?}?>><a href="?com=board&lnd=noticeList2&code=search">이용안내</a></li>
            <li <?if($lnd=="service"){?>class="sv_menu_sel"<?}?>><a href="?com=blank&lnd=service">이용약관</a></li>
            <li <?if($lnd=="privacy"){?>class="sv_menu_sel"<?}?>><a href="?com=blank&lnd=privacy">개인정보취급방침</a></li>
            <li <?if($lnd=="youth"){?>class="sv_menu_sel"<?}?>><a href="?com=blank&lnd=youth">청소년보호정책</a></li>
            <li <?if($lnd=="email"){?>class="sv_menu_sel"<?}?>><a href="?com=blank&lnd=email">이메일무단수집거부</a></li>
            <li <?if($lnd=="sitemap"){?>class="sv_menu_sel"<?}?>><a href="?com=blank&lnd=sitemap">사이트맵</a></li>
        </ul>
    </div>
<?}else if($com == "etc"){?>
    <div id="scrollMenu" class="sview_content_wrap sv_scroll_menu" style="display:block; position:relative;">
        <ul class="l_style_inline">
            <li <?if($lnd=="invite"){?>class="sv_menu_sel"<?}?>><a href="?com=etc&lnd=invite">친구 초대</a></li>
            <li <?if($lnd=="app"){?>class="sv_menu_sel"<?}?>><a href="?com=etc&lnd=app">앱 다운로드</a></li>
        </ul>
    </div>
<?}?>