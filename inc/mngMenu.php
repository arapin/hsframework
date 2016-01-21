<nav class="left eqh">
    <a class="menu-btn open">
        <div class="ham">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </a>
    <a class="mobile-menu">MENU</a>
    <ul class="menu">
        <!--<li <?if($com==""){?>class="active"<?}?>><a href="/?mng=Y"><span><i class="fa fa-tachometer"></i></span><p>DASHBOARD</p></a></li>-->
        <!--<li class="dropdown"><a href="#"><span><i class="fa fa-file-text"></i></span><p>PAGES</p></a>
            <ul>
                <li class="active"><a>EXAMPLE GALLERY</a></li>
                <li><a href="#">SETTINGS</a></li>
            </ul>
        </li>-->
        <li <?if($com=="user"){?>class="active"<?}?>><a href="/?com=user&lnd=list&mng=Y"><span><i class="fa fa-cog"></i></span><p>회원관리</p></a></li>
        <li <?if($com=="shaman"){?>class="active"<?}?>><a href="/?com=shaman&lnd=list&mng=Y"><span><i class="fa fa-cog"></i></span><p>무속인관리</p></a></li>
        <li class="dropdown"><a href="#"><span><i class="fa fa-file-text"></i></span><p>게시판관리</p></a>
            <ul>
                <li <?if($code=="notice"){?>class="active"<?}?>><a href="?com=board&lnd=list&code=notice&mng=Y">공지사항</a></li>
                <li <?if($code=="community"){?>class="active"<?}?>><a href="?com=board&lnd=list&code=community&mng=Y">커뮤니티</a></li>
                <li <?if($code=="search"){?>class="active"<?}?>><a href="?com=board&lnd=list&code=search&mng=Y">용한 점집 찾아보기</a></li>
                <li <?if($code=="booking"){?>class="active"<?}?>><a href="?com=board&lnd=list&code=booking&mng=Y">예약하기</a></li>
                <li <?if($code=="con"){?>class="active"<?}?>><a href="?com=board&lnd=list&code=con&mng=Y">상담</a></li>
                <li <?if($code=="join"){?>class="active"<?}?>><a href="?com=board&lnd=list&code=join&mng=Y">점집등록 방법</a></li>
                <li <?if($code=="oq"){?>class="active"<?}?>><a href="?com=board&lnd=list&code=oq&mng=Y">조합가입 문의</a></li>
                <li <?if($code=="travel"){?>class="active"<?}?>><a href="?com=board&lnd=list&code=travel&mng=Y">기도여행</a></li>
                <li <?if($code=="area"){?>class="active"<?}?>><a href="?com=board&lnd=list&code=area&mng=Y">추천 기도 터 굿당</a></li>
                <!-- <li <?if($com=="aqBoard"){?>class="active"<?}?>><a href="?com=aqBoard&lnd=list&mng=Y">신점문의</a></li> -->
                <li <?if($code=="affterMemo"){?>class="active"<?}?>><a href="?com=affterMemo&lnd=list&mng=Y">후기관리</a></li>
            </ul>
        </li>
        <!--<li <?if($com=="boardConfig"){?>class="active"<?}?>><a href="/?com=boardConfig&lnd=list&mng=Y"><span><i class="fa fa-file-text"></i></span><p>게시판관리</p></a></li>-->
        <li <?if($com=="main" && ($lnd == "location" || $lnd == "locationView")){?>class="active"<?}?>><a href="/?com=main&lnd=location&mng=Y"><span><i class="fa fa-cog"></i></span><p>메인 지역 이미지 관리</p></a></li>
        <li <?if($com=="main" && ($lnd == "big" || $lnd == "bigView")){?>class="active"<?}?>><a href="/?com=main&lnd=big&mng=Y"><span><i class="fa fa-cog"></i></span><p>메인 대표 이미지 관리</p></a></li>
        <li <?if($com=="main" && ($lnd == "middle" || $lnd == "middleView")){?>class="active"<?}?>><a href="/?com=main&lnd=middle&mng=Y"><span><i class="fa fa-cog"></i></span><p>메인 서브 이미지 관리</p></a></li>
        <li <?if($com=="main" && ($lnd == "movie" || $lnd == "movieView")){?>class="active"<?}?>><a href="/?com=main&lnd=movie&mng=Y"><span><i class="fa fa-cog"></i></span><p>메인 동영상 관리</p></a></li>
        <li <?if($com=="product"){?>class="active"<?}?>><a href="/?com=product&lnd=list&mng=Y"><span><i class="fa fa-cog"></i></span><p>상품관리</p></a></li>
		
		<?if($_SESSION["ADMIN_LEVEL"] == "SA"){?>
        <li <?if($com=="mng"){?>class="active"<?}?>><a href="/?com=mng&lnd=list&mng=Y"><span><i class="fa fa-cog"></i></span><p>관리자 관리</p></a></li>
        <li <?if($com=="payment"){?>class="active"<?}?>><a href="/?com=payment&lnd=list&mng=Y"><span><i class="fa fa-cog"></i></span><p>결제관리</p></a></li>
        <li <?if($com=="reservation"){?>class="active"<?}?>><a href="/?com=reservation&lnd=list&mng=Y"><span><i class="fa fa-cog"></i></span><p>예약관리</p></a></li>
        <li <?if($com=="calc"){?>class="active"<?}?>><a href="/?com=calc&lnd=list&mng=Y"><span><i class="fa fa-cog"></i></span><p>정산 관리</p></a></li>
		<?}?>
    </ul>
    <!--<div class="bottom">
        <a class="info-btn"><i class="fa fa-info"></i></a>
        <div class="info right">
            <h4>DID YOU KNOW?</h4>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata</p>
            <a class="menu-back"><i class="fa fa-chevron-left"></i></a>
        </div>
    </div>-->
</nav>
