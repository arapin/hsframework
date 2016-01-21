<?
	$user = new User();

	$searchType = Request::get('searchType', Request::REQUEST | Request::XSS_CLEAR);
	$searchWord = Request::get('searchWord', Request::REQUEST | Request::XSS_CLEAR);
	
	$search = array();

	if($searchType != ""){
		$search["searchType"] = $searchType;
	}

	if($searchWord != ""){
		$search["searchWord"] = $searchWord;
	}

	$rtnList = $user->userListMng($page,"idx DESC", $search);
?>
			<div class="breadcrumbs clearfix">
				<ul class="breadcrumbs left">
					<li><a href="#">SAN SIN GAK ADMIN</a></li>
					<li><i class="fa fa-angle-right"></i></li>
					<li>회원 관리</li>
				</ul>
				<a href="#" class="btn right" onclick="location.href='?com=user&lnd=write&mng=Y'"><i class="fa fa-caret-square-o-left"></i>등록</a>
			</div>
			<div class="breadcrumbs clearfix">
<form name="searchForm" method="post" action="?com=user&lnd=list&mng=Y">
				<select name="searchType">
					<option value="">선택</option>
					<option value="name" <?if($searchType == "name"){?>selected<?}?>>이름</option>
					<option value="id" <?if($searchType == "id"){?>selected<?}?>>아이디</option>
				</select>
				<input type="text" value="<?=$searchWord?>" name="searchWord"/>
				<input type="button" value="검색" onclick="searchChk();"/>
</form>
			</div>
			<div class="tables clearfix">
				<table class="datatable adm-table">
					<thead>
						<tr>
							<th>순번</th>
							<th>ID<span class="order"></span></th>
							<th>이름<span class="order"></span></th>
							<th>생년월일<span class="order"></span></th>
							<th>휴대전화번호<span class="order"></span></th>
							<th>등록일<span class="order"></span></th>
							<th>ACTIONS</th>
						</tr>
					</thead>
					<tbody>
						<?=$rtnList?>
					</tbody>
				</table>
			</div>