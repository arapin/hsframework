<?
	$mng = new Mng();
	$rtnList = $mng->mngUserList("","idx DESC");
?>
            <div class="breadcrumbs clearfix">
                <ul class="breadcrumbs left">
                    <li><a href="#">SAN SIN GAK ADMIN</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>관리자 관리</li>
                </ul>
                <a href="#" class="btn right" onclick="location.href='?com=mng&lnd=write&mng=Y'"><i class="fa fa-caret-square-o-left"></i>등록</a>
            </div>

            <div class="tables clearfix">
                <table class="datatable adm-table">
                    <thead>
                        <tr>
                            <th>순번</th>
                            <th>관리자 ID<span class="order"></span></th>
                            <th>관리자 이름<span class="order"></span></th>
                            <th>등록일<span class="order"></span></th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
						<?=$rtnList?>
                    </tbody>
                </table>
            </div>

