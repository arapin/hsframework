<?
	include $_SERVER["DOCUMENT_ROOT"]."/class/MODEL/shamanMol.php";
	include $_SERVER["DOCUMENT_ROOT"]."/class/COMMON/common.class.php";
	include $_SERVER["DOCUMENT_ROOT"]."/class/COMMON/cipher.class.php";
	include $_SERVER["DOCUMENT_ROOT"]."/class/COMMON/paging.class.php";

	class Shaman extends ShamanMOL {
		private $cipher;
		private $common;
		private $paging;
		private $file;
		public $pageView;
		public $approachPageView;
		public $memoPageView;
		public $searchTotalCnt;
		public $amTotalCnt;
		public $resultSIdo;
		public $link = "20";
		public $linking = "10";

		/*생성자*/
		public function __construct() {
			parent:: __construct("shamaninfo");
			$this->cipher = new Cipher("wpgbxla#$%wpdksrhksfus@good!=");
			$this->common = new Common();
			$this->paging = new Paging();
		}

		/*점집 로그인*/
		public function shamanLogin($shamanData, $loginData){
			$shamanResult = parent::searchShaman($shamanData);

			$inputId = $loginData["id"];
			$inputPwd = $loginData["pwd"];

			while (list($key, $val) = each($shamanResult)){
				$shamanCnt = $shamanResult[$key]["shamanCnt"];
			}

			if($shamanCnt == 0){
				$msg = "점집 등록이 안되어 있습니다. 점집 등록을 하여 주십시요.";
				$com = "shaman";
				$lnd = "join";
			}else{
				$shamanResult = parent::searchShamanInfo($shamanData);
				while (list($key, $val) = each($shamanResult)){
					$id = $shamanResult[$key]["SHId"];
					$pwd_user = trim($this->cipher->getDecrypt($shamanResult[$key]["SHPwd"]));
				}

				if( $inputPwd == $pwd_user){

					if($_SESSION["USER_ID"] != ""){
						$_SESSION = array();
						session_destroy();
					}

					$_SESSION["SH_ID"] = $id;
					$msg = $_SESSION["SH_ID"]." 무속인 회원님 로그인 되었습니다.";
					$com = "index";
					$lnd = "";
				}else{
					$msg = "비밀번호가 틀립니다.";
					$com = "shaman";
					$lnd = "login";
				}
			}
			$this->common->finalMove("lnd",$msg,$com,$lnd);
		}

		/*점집 등록*/
		public function shamanInsert($shamanData){
			$shamanData[2] = $this->cipher->getEncrypt($shamanData[2]);
			parent::joinShamanFront($shamanData);
			$this->common->finalMove("lnd","점집이 등록 되었습니다.","shaman","login");
		}

		public function shamanInsertMng($shamanData, $profile){
			$shamanData[2] = $this->cipher->getEncrypt($shamanData[2]);
			parent::joinShaman($shamanData);
			$this->common->finalMoveMng("lnd","점집이 등록 되었습니다.","shaman","list");
		}

		/*점집 수정 정보*/
		public function shamanModifyInfo($shamanData){
			$shamanResult = parent::modifyShamanInfo($shamanData);
			$returnData = array();
			while (list($key, $val) = each($shamanResult)){
				$returnData["idx"]		= $shamanResult[$key]["idx"];
				$returnData["SHId"]		= $shamanResult[$key]["SHId"];
				$returnData["SHPwd"]	= trim($this->cipher->getDecrypt($shamanResult[$key]["SHPwd"]));
				$returnData["name"]		= $shamanResult[$key]["name"];
				$returnData["SHName"]	= $shamanResult[$key]["SHName"];
				$returnData["SHTel"]	= $shamanResult[$key]["SHTel"];
				$returnData["SHPhone"]	= $shamanResult[$key]["SHPhone"];
				$returnData["SHAddress"]= $shamanResult[$key]["SHAddress"];
				$returnData["SHStartTime"]	= $shamanResult[$key]["SHStartTime"];
				$returnData["SHEndTime"]	= $shamanResult[$key]["SHEndTime"];
				$returnData["SHLng"]	= $shamanResult[$key]["SHLng"];
				$returnData["SHLat"]	= $shamanResult[$key]["SHLat"];
				$returnData["SHDesc"]	= $shamanResult[$key]["SHDesc"];
				$returnData["SHWord"]	= $shamanResult[$key]["SHWord"];
				$returnData["SHStatus"]	= $shamanResult[$key]["SHStatus"];
				$returnData["SHZipcode"]	= $shamanResult[$key]["SHZipcode"];
				$returnData["SHAddress2"]	= $shamanResult[$key]["SHAddress2"];
				$returnData["SHRestSTime"]	= $shamanResult[$key]["SHRestSTime"];
				$returnData["SHRestETime"]	= $shamanResult[$key]["SHRestETime"];
				$returnData["SHApply"]	= $shamanResult[$key]["SHApply"];
			}

			return $returnData;
		}


		/*점집 수정*/
		public function shamanModify($shamanData,$whereData){
			parent::modifyShaman($shamanData,$whereData);
			$this->common->finalMove("lnd","점집정보가 수정 되셨습니다.","shaman","modify");
		}

		public function shamanModifyMng($shamanData,$whereData, $profile){
			$shamanData[10] = $this->cipher->getEncrypt($shamanData[10]);

			if($profile["tmp_name"] != ""){
				$fileData2 = array(":parentId" => $whereData[":SHId"], ":type" => "profile");
				$profileData = $this->getProfileInfoListView($fileData2);

				$deleteFilePath =  uploadPath."/shaman/".$profileData["saveName"];
				@unlink($deleteFilePath);

				$whereBeen = array(":SHId" => $whereData[":SHId"]);
				parent::profileDeleteMOL($whereBeen);

				$rtnVal = $this->common->imageUploader($profile["tmp_name"], $profile["name"], $profile["size"], uploadPath."/shaman", "2000", "2000", "10485760");

				switch ($rtnVal){
					case "01" :
						$this->common->finalMoveMng("lnd","등록할수 없는 확장자 입니다.","shaman","modify","&SHId=".$whereData[":SHId"]);
						break;
					case "02" :
						$this->common->finalMoveMng("lnd","등록할수 없는 크기의 파일 입니다.","shaman","modify","&SHId=".$whereData[":SHId"]);
						break;
					case "03" :
						$this->common->finalMoveMng("lnd","등록할수 있는 용량을 초과 했습니다.","shaman","modify","&SHId=".$whereData[":SHId"]);
						break;
					case "04" :
						$this->common->finalMoveMng("lnd","파일 등록 오류 입니다.","shaman","modify","&SHId=".$whereData[":SHId"]);
						break;
					case "05" :
						$this->common->finalMoveMng("lnd","이미지 파일이 아닙니다.","shaman","modify","&SHId=".$whereData[":SHId"]);
						break;
				}

				$fileInsertData = array($whereData[":SHId"], "profile", $profile["type"], $profile["size"], $profile["name"], $rtnVal, "", date("Y-m-d H:i:s"));
				parent::fileInsert($fileInsertData);

			}

			parent::modifyShamanMng($shamanData,$whereData);
			$this->common->finalMoveMng("lnd","점집정보가 수정 되셨습니다.","shaman","modify", "&SHId=".$whereData[":SHId"]);
		}

		/*점집 아이디 체크*/
		public function shamanIdCheck($idString){
			$rtnVal = "";
			$idLen = strlen($idString);

			if($idLen < 4){
				return "01"; //아이디는 4글자 이상으로 입력하여 주십시요.
				exit;
			}

			if(!preg_match("/^[a-z]/i", $idString)) {
				return "02"; //아이디의 첫글자는 영문이어야 합니다.
				exit;
			}

			if(preg_match("/[^a-z0-9-_]/i", $idString)) {
				return "03"; //아이디는 영문, 숫자, -, _ 만 사용할 수 있습니다.
				exit;
			}

			$shamanData = array(":SHId" => $idString);
			$shamanResult = parent::searchJoinShaman($shamanData);

			while (list($key, $val) = each($shamanResult)){
				$shamanCnt = $shamanResult[$key]["shamanCnt"];
			}

			if($shamanCnt > 0) {
				return "04"; //이미 존재하는 아이디 입니다.
				exit;
			}

			$userData = array(":id" => $idString);
			$userResult = parent::searchUser($userData);

			while (list($key, $val) = each($userResult)){
				$userCnt = $userResult[$key]["userCnt"];
			}

			if($userCnt > 0) {
				return "04"; //이미 존재하는 아이디 입니다.
				exit;
			}

			$withoutResult = parent::withoutSearchIdMOL($userData);

			while (list($key, $val) = each($withoutResult)){
				$withOutCnt = $withoutResult[$key]["withOutCnt"];
			}

			if($withOutCnt > 0) {
				return "04"; //이미 존재하는 아이디 입니다.
				exit;
			}


			return "00";
		}

		/*점집 목록*/
		public function shamanHomeList($search=""){
			$returnVal = "";

			$searchQuery = "";

			if($search["searchSido"] != ""){
				$searchQuery .= " AND SHAddress LIKE '%".$search["searchSido"]." ".$search["searchGun"]." %'";
			}

			if($search["productType"] != ""){
				$searchQuery .= " AND c.idx = '".$search["productType"]."'";
			}

			if($search["sPrice"] != ""){
				$searchQuery .= " AND b.price BETWEEN '".$search["sPrice"]."' AND '".$search["ePrice"]."'";
			}

			if($search["searchDate"] != ""){
				$searchQuery .= " AND a.idx not in (SELECT SHIdx FROM reservation WHERE resDate = '".$search["searchDate"]."' AND resStartTime <= '".$search["searchTime"]."')";
			}

			if($search["searchWord"] != ""){

				switch($search["searchWord"]){
					case "서울특별시" : 
						$search["searchWord"] = "서울";
						break;
					case "경기도" : 
						$search["searchWord"] = "경기";
						break;
					case "강원도" : 
						$search["searchWord"] = "강원";
						break;
					case "충청북도" : 
						$search["searchWord"] = "충북";
						break;
					case "충청남도" : 
						$search["searchWord"] = "충남";
						break;
					case "경상북도" : 
						$search["searchWord"] = "경북";
						break;
					case "경상남도" : 
						$search["searchWord"] = "경남";
						break;
					case "전라북도" : 
						$search["searchWord"] = "전북";
						break;
					case "전라남도" : 
						$search["searchWord"] = "전남";
						break;
					default : 
						$search["searchWord"] = $search["searchWord"];
						break;
				}
				$searchQuery .= " AND (c.proName LIKE '%".$search["searchWord"]."%' OR a.SHName LIKE '%".$search["searchWord"]."%' OR a.name LIKE '%".$search["searchWord"]."%' OR a.SHAddress LIKE '%".$search["searchWord"]."%')";
			}

			$limitQuery = $searchQuery;

			$shamanResult = parent::searchShamanMOL("",$limitQuery);

			$returnVal = "[";

			while (list($key, $val) = each($shamanResult)){
				$idx	=  $shamanResult[$key]["idx"];
				$SHName =  $shamanResult[$key]["SHName"];
				$SHLng	=  $shamanResult[$key]["SHLng"];
				$SHLat	=  $shamanResult[$key]["SHLat"];
				$SHDesc =  $shamanResult[$key]["SHDesc"];
				$SHId	=  $shamanResult[$key]["SHId"];
				$returnVal .= "
					{
						\"idx\": '".$SHId."',
						\"title\": '".$SHName."',
						\"lat\": ".$SHLng.",
						\"lng\": ".$SHLat.",
						\"description\": '".nl2br(str_replace("\r\n","<br>",$SHDesc))."'
					},
				";
			}
			$returnVal .= "]";

			return $returnVal;
		}

		/*점집 리스트*/
		public function shamanListMng($page="", $setOrder=""){
			$returnVal = "";

			$startNum = ($page - 1) * $this->link;
			//$limitQuery = " order by ".$setOrder." limit ".$startNum." , ".$this->link;
			$limitQuery = " order by ".$setOrder;

			try{

				$shamanTotalCntResult = parent::shamanTotalList();
				while (list($key, $val) = each($shamanTotalCntResult)){
					$shamanCnt = $shamanTotalCntResult[$key]["shamanCnt"];
				}
				$record = $shamanCnt;
				/*$url_file = "/";
				$url_parameter = "com=shaman&lnd=list&mng=Y";
				$this->pageView = $this->paging->Link($page,$record,$this->link,$this->linking,$url_file,$url_parameter);
				$loop_number=$record - $startNum;*/

				$shamanResult = parent::shamanListMng("",$limitQuery);
				while (list($key, $val) = each($shamanResult)){
					$SHName		=  $shamanResult[$key]["SHName"];
					$SHId		=  $shamanResult[$key]["SHId"];
					if($shamanResult[$key]["SHPhone"] != ""){
						$SHTel	=  $shamanResult[$key]["SHPhone"];
					}else{
						$SHTel	=  "-";
					}

					switch($shamanResult[$key]["SHStatus"]){
						case "S" :
							$viewStatus = "<span style=\"color:#9cfaac;font-weight:bold;\">대기중</span>";
							break;
						case "U" :
							$viewStatus = "<span style=\"color:#7679f3;font-weight:bold;\">사용중</span>";
							break;
						case "E" :
							$viewStatus = "<span style=\"color:#fc2418;font-weight:bold;\">탈퇴</span>";
							break;
					}

					$writeDate	=  $shamanResult[$key]["writeDate"];

					$returnVal .= "<tr>
						<td>".$record."</td>
						<td style=\"text-transform:none;\">".$SHId."</td>
						<td>".$SHName."</td>
						<td>".$SHTel."</td>
						<td><span class=\"date\">".$writeDate."</span></td>
						<td>".$viewStatus."</td>
						<td>
							<a href=\"#none\" class=\"edit\" onclick=\"modifyMng('".$SHId."');\"><i class=\"fa fa-pencil\"></i></a>
							<a href=\"#none\" class=\"delete\" onclick=\"deleteMng('".$SHId."');\"><i class=\"fa fa-times\"></i></a>
						</td>
					</tr>";
					$record--;
				}

				return $returnVal;

			}catch(Exception $e){
				$logData = array("E", $_SERVER["REMOTE_ADDR"], $e->getMessage(), date("Y-m-d H:i:s"), "");
				parent::logInsert($logData);
				$this->common->finalMoveMng("lnd","시스템 오류입니다.","","");
			}
		}

		/*무속인 삭제*/
		public function shamanDeleteMng($whereData){
			try{
				parent::shamanDelete($whereData);
				$this->common->finalMoveMng("lnd","무속인정보가 삭제 되셨습니다.","shaman","list");
			}catch(Exception $e){
				$logData = array("E", $_SERVER["REMOTE_ADDR"], $e->getMessage(), date("Y-m-d H:i:s"), "");
				parent::logInsert($logData);
				$this->common->finalMove("lnd","시스템 오류입니다.","shaman","list");
			}
		}

		/*점집 승인*/
		public function shamanApply($whereData){
			try{
				$shamanResult = parent::modifyShamanInfo($whereData);
				while (list($key, $val) = each($shamanResult)){
					$SHId	= $shamanResult[$key]["SHId"];
					$SHName	= $shamanResult[$key]["SHName"];
				}

				$boardCodeNotice = "notice_". $SHId;
				$boardNameNotice = $SHName." 공지사항";
				$boardCodeAnswer = "affter_". $SHId;
				$boardNameAnswer = $SHName." 후기";

				$boardConfigData = array($boardCodeNotice, $boardNameNotice, "board", "N", "N", $SHId,date("Y-m-d H:i:s"));
				parent::boardInsert($boardConfigData);
				$boardConfigData = array($boardCodeAnswer, $boardNameAnswer, "affter", "N", "Y", $SHId,date("Y-m-d H:i:s"));
				parent::boardInsert($boardConfigData);
				$shamanApplyData = array("U");
				parent::applyShaman($shamanApplyData, $whereData);

				$this->common->finalMoveMng("lnd","무속인 승인처리 되었습니다.","shaman","list");

			}catch(Exception $e){
				$logData = array("E", $_SERVER["REMOTE_ADDR"], $e->getMessage(), date("Y-m-d H:i:s"), "");
				parent::logInsert($logData);
				$this->common->finalMove("lnd","시스템 오류입니다.","shaman","list");
			}
		}

		/*점집 승인*/
		public function shamanApply2($whereData){
			try{
				$shamanApplyData = array("Y");
				parent::applyShaman2($shamanApplyData, $whereData);

				$this->common->finalMoveMng("lnd","무속인 인증처리 되었습니다.","shaman","list");

			}catch(Exception $e){
				$logData = array("E", $_SERVER["REMOTE_ADDR"], $e->getMessage(), date("Y-m-d H:i:s"), "");
				parent::logInsert($logData);
				$this->common->finalMove("lnd","시스템 오류입니다.","shaman","list");
			}
		}

		/*점집 승인 취소*/
		public function shamanCancel($whereData){
			try{
				$shamanCancelData = array("C");
				parent::applyShaman($shamanCancelData, $whereData);

				$this->common->finalMoveMng("lnd","무속인 승인취소 처리 되었습니다.","shaman","list");

			}catch(Exception $e){
				$logData = array("E", $_SERVER["REMOTE_ADDR"], $e->getMessage(), date("Y-m-d H:i:s"), "");
				parent::logInsert($logData);
				$this->common->finalMove("lnd","시스템 오류입니다.","shaman","list");
			}
		}

		/*점집 승인 취소*/
		public function shamanCancel2($whereData){
			try{
				$shamanCancelData = array("N");
				parent::applyShaman2($shamanCancelData, $whereData);

				$this->common->finalMoveMng("lnd","무속인 인증취소 처리 되었습니다.","shaman","list");

			}catch(Exception $e){
				$logData = array("E", $_SERVER["REMOTE_ADDR"], $e->getMessage(), date("Y-m-d H:i:s"), "");
				parent::logInsert($logData);
				$this->common->finalMove("lnd","시스템 오류입니다.","shaman","list");
			}
		}

		/*구군 출력*/
		public function zipTwoAdress($bind){
			$returnVal = "<select name=\"depthTwoArea\" onchange=\"setGoogleMap('search');\">";
			//<option value=\"\">선택</option>

			try{
				$shamanResult = parent::zipTWODepth($bind);
				while (list($key, $val) = each($shamanResult)){
					$returnVal .= "<option value=\"".$shamanResult[$key]["ds_gugun"]."\">".$shamanResult[$key]["ds_gugun"]."</option>";
				}

				$returnVal .= "</select>";
				return $returnVal;
			}catch (Exception $e){
				$logData = array("E", $_SERVER["REMOTE_ADDR"], $e->getMessage(), date("Y-m-d H:i:s"), "");
				parent::logInsert($logData);
				$this->common->finalMoveMng("lnd","시스템 오류입니다.","","");
			}
		}

		/*등록된 파일 목록 출력*/
		public function getFileInfoListView($getBeen){
			$fileResult = parent::searchFile($getBeen);
			$returnData = "";
			while (list($key, $val) = each($fileResult)){
				$returnData .= "<div class=\"fileItem\">".$fileResult[$key]["orgName"]."</div>";
			}

			return $returnData;
		}

		/*등록된 프로파일 이미지 출력*/
		public function getProfileInfoListView($getBeen){
			$fileResult = parent::searchFile($getBeen);
			$returnData = "";
			while (list($key, $val) = each($fileResult)){
				$returnData["saveName"] = $fileResult[$key]["saveName"];
				$returnData["orgName"] = $fileResult[$key]["orgName"];
			}

			return $returnData;
		}

		/*상품정보 출력*/
		public function getSprInfoListView($getBeen){
			$sprResult = parent::searchSpr($getBeen);
			$returnData = "";

			while (list($key, $val) = each($sprResult)){
				$time = $sprResult[$key]["proTime"];

				$hour = floor($time / 60);
				$min = ($time % 60);
				$printTime = $hour."시간";

				if($min > 0){
					$printTime .= $min."분";
				}

				$returnData .= "<div class=\"fileItem\">상품 : [".$sprResult[$key]["proName"]."] 시간 : [".$printTime."] 가격 : [".number_format($sprResult[$key]["price"])."원]</div>";
			}
			return $returnData;
		}

		/**신점종류 가져오기**/
		public function getProductInfoList(){
			$productResult = parent::searchProduct();
			while (list($key, $val) = each($productResult)){
				$viewData .= "<option value=\"".$productResult[$key]["idx"]."\">".$productResult[$key]["proName"]."</option>";
			}

			return $viewData;
		}

		/**검색 결과**/
		public function getSearchSHList($page="", $setOrder="", $search){
			$returnVal = "";
			$searchQuery = "";

			if($search["searchSido"] != ""){
				$searchQuery .= " AND SHAddress LIKE '%".$search["searchSido"]." ".$search["searchGun"]." %'";
			}

			if($search["productType"] != ""){
				$searchQuery .= " AND c.idx = '".$search["productType"]."'";
			}

			if($search["sPrice"] != ""){
				$searchQuery .= " AND b.price BETWEEN '".$search["sPrice"]."' AND '".$search["ePrice"]."'";
			}

			if($search["searchDate"] != ""){
				$searchQuery .= " AND a.idx not in (SELECT SHIdx FROM reservation WHERE resDate = '".$search["searchDate"]."' AND resStartTime <= '".$search["searchTime"]."')";
			}

			if($search["searchWord"] != ""){
				$searchQuery .= " AND (c.proName LIKE '%".$search["searchWord"]."%' OR a.SHName LIKE '%".$search["searchWord"]."%' OR a.name LIKE '%".$search["searchWord"]."%'  OR a.SHAddress LIKE '%".$search["searchWord"]."%')";
			}

			$startNum = ($page - 1) * $this->link;
			$limitQuery = $searchQuery." GROUP BY SHId order by ".$setOrder." limit ".$startNum." , ".$this->link;
			//$limitQuery = " order by ".$setOrder;

			try{

				$shamanTotalCntResult = parent::getSearchSHTotalCnt("",$searchQuery);
				while (list($key, $val) = each($shamanTotalCntResult)){
					$shamanCnt = $shamanTotalCntResult[$key]["shamanCnt"];
				}
				$record = $shamanCnt;
				$this->searchTotalCnt = $shamanCnt;
				$url_file = "/";
				$url_parameter = "#none";
				$this->pageView = $this->paging->Link_Search($page,$record,$this->link,$this->linking,$url_file,$url_parameter);

				$shamanResult = parent::searchShamanMOL("",$limitQuery);
				$loopCnt = 0;
				while (list($key, $val) = each($shamanResult)){
					$SHId = $shamanResult[$key]["SHId"];
					$prdPrice = $shamanResult[$key]["prdPrice"];
					$SHName = $shamanResult[$key]["SHName"];
					$SHAddress = $shamanResult[$key]["SHAddress"];

					if($loopCnt == 0){
						$addressArry = explode(" ",$SHAddress);
						if($addressArry[0] == "서울" || $addressArry[0] == "광주" || $addressArry[0] == "부산" || $addressArry[0] == "대전" || $addressArry[0] == "대구"){
							$this->resultSIdo = $addressArry[0]." ".$addressArry[1];
						}else{
							$this->resultSIdo =  $addressArry[0]." ".$addressArry[1]." ".$addressArry[2];
						}

					}

					$whereBeen = array(":code" => $SHId."_affter");
					$amTotalCntResult = parent::affterMemoTotalMOL($whereBeen);
					while (list($key_a, $val_a) = each($amTotalCntResult)){
						$amCnt = $amTotalCntResult[$key_a]["amCnt"];
					}

					$wishBeen = array(":SHIdx" => $shamanResult[$key]["SHIdx"], ":userId"=>$_SESSION["USER_ID"]);
					$wishCnt = $this->getWishCnt($wishBeen);

					if($wishCnt > 0){
						$heartImg = "<img class=\"sc_heart\" src=\"/images/heart.png\" alt=\"\" />";
					}else{
						if($_SESSION["USER_ID"] != ""){
							$heartImg = "<img class=\"sc_heart\" src=\"/images/heart_off.png\" alt=\"\" onclick=\"setListWish('".$shamanResult[$key]["SHIdx"]."');\"/>";
						}else{
							$heartImg = "<img class=\"sc_heart\" src=\"/images/heart_off.png\" alt=\"\"/>";
						}
					}

					$fileData2 = array(":parentId" => $SHId, ":type" => "profile");
					$fileResult = parent::searchFile($fileData2);
					$returnData = "";
					while (list($key_s, $val_s) = each($fileResult)){
						$saveName = $fileResult[$key_s]["saveName"];
					}

					$fileData2 = array(":parentId" => $SHId, ":type" => "shaman");
					$fileResult = parent::searchFileMain($fileData2);
					$returnData = "";
					$loopIdx = 0;
					while (list($key_f, $val_f) = each($fileResult)){
						$saveName2 = $fileResult[$key_f]["saveName"];
						break;
					}

					if($saveName == ""){
						$viewName = "/html/sample/sp1.jpg";
					}else{
						$viewName = "/upload/shaman/".$saveName;
					}

					if($saveName2 == ""){
						$viewName2 = "/html/sample/s1.jpg";
					}else{
						$viewName2 = "/upload/shaman/".$saveName2;
					}

					$returnVal .= "
						<li>
							".$heartImg."
							<div class=\"sc_photo_wrap\">
								<a href=\"?com=shaman&lnd=shamanhome&SHId=".$SHId."\"><img src=\"".$viewName2."\" alt=\"\" style=\"width:320px;height:240px;\"/></a>
								<div class=\"sc_money\">
									<span>\</span>".number_format($prdPrice)."
								</div>
							</div>

							<img class=\"sc_photo_face\" src=\"".$viewName."\" alt=\"\" style=\"width:60px;height:60px;\"/>

							<p class=\"photo_link\">
								<a href=\"/html/shop_view.html\"><img src=\"/images/new.gif\" alt=\"new\" />".$SHName."</a>
							</p>
							<p class=\"photo_score\">
								신점 전체 · 4.9<img src=\"/images/star.gif\" alt=\"\" />· 후기 ".$amCnt."개
							</p>
						</li>
					";

					$loopCnt++;
				}

				/*if($returnVal == ""){
					if($search["searchSido"] != ""){
						$this->resultSIdo = $search["searchSido"]." ".$search["searchGun"];
					}else{
						$this->resultSIdo = "서울 강남구";
					}
				}*/

				/*2015-12-04 수정*/
				if($returnVal == ""){
					if($search["searchSido"] != ""){
						$this->resultSIdo = $search["searchSido"]." ".$search["searchGun"];
					}else{
						if($search["searchWord"] != ""){
							$resultAddress = "";
							$limitQuery = " AND ds_sido LIKE '%".$search["searchWord"]."%' OR ds_gugun LIKE '%".$search["searchWord"]."%' ORDER BY ds_gugun limit 1";

							$zipResult = parent::zipTWODepthCreate($limitQuery);

							while (list($key_g, $val_g) = each($zipResult)){
								$resultAddress = $zipResult[$key_g]["ds_sido"]." ".$zipResult[$key_g]["ds_gugun"]." ".$zipResult[$key_g]["ds_dong"];
							}
							if($resultAddress == ""){
								$this->resultSIdo = "서울 강남구";
							}else{
								$this->resultSIdo = $resultAddress;
							}
						}else{
							$this->resultSIdo = "서울 강남구";
						}
					}
				}

				return $returnVal;

			}catch(Exception $e){
				$logData = array("E", $_SERVER["REMOTE_ADDR"], $e->getMessage(), date("Y-m-d H:i:s"), "");
				parent::logInsert($logData);
				$this->common->finalMoveMng("lnd","시스템 오류입니다.","","");
			}
		}

		/**점짐 메인 정보**/
		public function shamanHomeInfo($getBeen){
			$shamanResult = parent::modifyShamanInfo($getBeen);
			$returnData = array();
			while (list($key, $val) = each($shamanResult)){
				$returnData["idx"]		= $shamanResult[$key]["idx"];
				$returnData["SHId"]		= $shamanResult[$key]["SHId"];
				$returnData["SHPwd"]	= trim($this->cipher->getDecrypt($shamanResult[$key]["SHPwd"]));
				$returnData["name"]		= $shamanResult[$key]["name"];
				$returnData["SHName"]	= $shamanResult[$key]["SHName"];
				$returnData["SHTel"]	= $shamanResult[$key]["SHTel"];
				$returnData["SHPhone"]	= $shamanResult[$key]["SHPhone"];
				$returnData["SHAddress"]= $shamanResult[$key]["SHAddress"];
				$returnData["SHStartTime"]	= $shamanResult[$key]["SHStartTime"];
				$returnData["SHEndTime"]	= $shamanResult[$key]["SHEndTime"];
				$returnData["SHLng"]	= $shamanResult[$key]["SHLng"];
				$returnData["SHLat"]	= $shamanResult[$key]["SHLat"];
				$returnData["SHDesc"]	= $shamanResult[$key]["SHDesc"];
				$returnData["SHStatus"]	= $shamanResult[$key]["SHStatus"];
				$returnData["SHZipcode"]	= $shamanResult[$key]["SHZipcsode"];
				$returnData["SHAddress2"]	= $shamanResult[$key]["SHAddress2"];
				$returnData["SHWord"]	= $shamanResult[$key]["SHWord"];
				$returnData["SHApply"]	= $shamanResult[$key]["SHApply"];

				$fileData2 = array(":parentId" => $shamanResult[$key]["SHId"], ":type" => "profile");
				$fileResult = parent::searchFile($fileData2);
				while (list($key_f, $val_f) = each($fileResult)){
					$saveName = $fileResult[$key_f]["saveName"];
				}

				if($saveName == ""){
					$returnData["viewProfile"] = "/html/sample/sp1.jpg";
				}else{
					$returnData["viewProfile"] = "/upload/shaman/".$saveName;
				}

				$fileData2 = array(":parentId" => $shamanResult[$key]["SHId"], ":type" => "shaman");
				$fileResult = parent::searchFile($fileData2);
				$loopIdx = 0;
				$shamanImg = array();
				while (list($key_f, $val_f) = each($fileResult)){
					$shamanImg[] = "/upload/shaman/".$fileResult[$key_f]["saveName"];
				}
				$returnData["shamanImg"] = $shamanImg;

				$fileResult = parent::searchFileMain($fileData2);
				$loopIdx = 0;
				$shamanImg = array();
				while (list($key_f, $val_f) = each($fileResult)){
					$shamanMainImg = "/upload/shaman/".$fileResult[$key_f]["saveName"];
				}
				$returnData["shamanMainImg"] = $shamanMainImg;


				$productNameInfo = "";
				$productInfo = "";
				$productSelect = "";
				$sprData = array(":SHIdx" => $shamanResult[$key]["idx"]);
				$sprResult = parent::searchSpr($sprData);
				while (list($key_s, $val_s) = each($sprResult)){
					$time = $sprResult[$key_s]["proTime"];

					$hour = floor($time / 60);
					$min = ($time % 60);
					$printTime = $hour > 0 ? $hour."시간" : "";

					if($min > 0){
						$printTime .= $min."분";
					}

					$productNameInfo .= $sprResult[$key_s]["proName"].",";
					$productInfo .= "<li>".$sprResult[$key_s]["proName"]." : <span class=\"sv_txt1\">\ ".number_format($sprResult[$key_s]["price"])." / ".$printTime."</span></li>";
					$productSelect .= "<option value=\"".$sprResult[$key_s]["sprIdx"]."-".$sprResult[$key_s]["price"]."\">".$sprResult[$key_s]["proName"]."</option>";
				}

				$returnData["productNameInfo"] = substr($productNameInfo,0,strlen($productNameInfo) - 1);
				$returnData["productInfo"] = $productInfo;
				$returnData["productSelect"] = $productSelect;

				$sTimeArray = explode(":",$shamanResult[$key]["SHStartTime"]);
				$eTimeArray = explode(":",$shamanResult[$key]["SHEndTime"]);
				$sMin = "";
				$eMin = "";

				if($sTimeArray[0] <= 12){
					$sTimeWord = "오전";
					$sTime = $sTimeArray[0];
				}else{
					$sTimeWord = "오후";
					$sTime = ($sTimeArray[0] - 12);
				}

				if($sTimeArray[1] != "00"){
					$sMin = $sTimeArray[1]."분";
				}

				if($eTimeArray[0] <= 12){
					$eTimeWord = "오전";
					$eTime = $eTimeArray[0];
				}else{
					$eTimeWord = "오후";
					$eTime = ($eTimeArray[0] - 12);
				}

				if($eTimeArray[1] != "00"){
					$eMin = $eTimeArray[1]."분";
				}

				$returnData["viewOpenTime"] = $sTimeWord." ".$sTime."시 ".$sMin." - ".$eTimeWord." ".$eTime."시 ".$eMin;

				$regData = substr($shamanResult[$key]["writeDate"],0,10);
				$regDataArr = explode("-", $regData);
				$returnData["viewRegDate"] = $regDataArr[0]."년 ".$regDataArr[1]."월";

				$mapInfo = "var markers = [";
				$idx	=  $shamanResult[$key]["idx"];
				$SHName =  $shamanResult[$key]["SHName"];
				$SHLng	=  $shamanResult[$key]["SHLng"];
				$SHLat	=  $shamanResult[$key]["SHLat"];
				$SHDesc =  $shamanResult[$key]["SHDesc"];
				$SHId	=  $shamanResult[$key]["SHId"];
				$mapInfo .= "
					{
						\"idx\": '".$idx."',
						\"title\": '".$SHName."',
						\"lat\": ".$SHLng.",
						\"lng\": ".$SHLat.",
						\"description\": '".nl2br(str_replace("\r\n","<br>",$SHDesc))."'
					},
				";
				$mapInfo .= "]";
				$returnData["mapInfo"] = $mapInfo;
			}
			return $returnData;

		}

		/**산신각 평점**/
		public function getAffterScore($code){
			$returnData = array();
			$whereBeen = array(":code" => $code);
			$amTotalCntResult = parent::affterMemoTotalMOL($whereBeen);
			while (list($key, $val) = each($amTotalCntResult)){
				$amCnt = $amTotalCntResult[$key]["amCnt"];
			}
			$amResult = parent::affterMemoScoreMOL($whereBeen);

			while (list($key, $val) = each($amResult)){
				$ppTotal = $amResult[$key]["ppTotal"];
				$spTotal = $amResult[$key]["spTotal"];
				$lpTotal = $amResult[$key]["lpTotal"];
				$prpTotal = $amResult[$key]["prpTotal"];
			}

			$totalScore = $ppTotal + $spTotal + $lpTotal + $prpTotal;

			$returnData["totalScore"] = round(($totalScore / $amCnt) / 4);
			$returnData["ppTotalScore"] = round($ppTotal / $amCnt);
			$returnData["spTotalScore"] = round($spTotal / $amCnt);
			$returnData["lpTotalScore"] = round($lpTotal / $amCnt);
			$returnData["prpTotalScore"] = round($prpTotal / $amCnt);
			return $returnData;
		}

		/**후기등록**/
		public function insertAffterMemo($setBeen, $SHId){
			parent::insertAffterMemoMOL($setBeen);
			$this->common->finalMove("lnd","후기가 등록이 되었습니다.","shaman","shamanhome","&SHId=".$SHId);
		}

		/**후기삭제**/
		public function deleteAffterMemo($whereBeen, $SHId){
			parent::deleteAffterMemoMOL($whereBeen);
			$this->common->finalMove("lnd","후기가 삭제 되었습니다.","shaman","shamanhome","&SHId=".$SHId);
		}

		/**후기수정**/
		public function modifyAffterMemo($setBeen, $whereBeen, $SHId){
			parent::modifyAffterMemoMOL($setBeen, $whereBeen);
			$this->common->finalMove("lnd","후기가 수정 되었습니다.","shaman","shamanhome","&SHId=".$SHId);
		}

		/**후기 리스트**/
		public function affterMemoList($page="", $code, $SHId){
			$this->link = 2;
			$startNum = ($page - 1) * $this->link;
			$limitQuery = " order by idx DESC limit ".$startNum." , ".$this->link;
			//$limitQuery = " order by ".$setOrder;
			try{
				$whereBeen = array(":code" => $code);
				$amTotalCntResult = parent::affterMemoTotalMOL($whereBeen);
				while (list($key, $val) = each($amTotalCntResult)){
					$amCnt = $amTotalCntResult[$key]["amCnt"];
				}
				$record = $amCnt;
				$this->amTotalCnt = $amCnt;
				$url_file = "/";
				$url_parameter = "com=shaman&lnd=shamanhome&SHId=".$SHId;
				$this->memoPageView = $this->paging->Link_Memo($page,$record,$this->link,$this->linking,$url_file,$url_parameter);

				$amResult = parent::affterMemoListMOL($whereBeen,$limitQuery);

				while (list($key, $val) = each($amResult)){
					$addBtn = "";
					$userWhereBeen = array(":id"=>$amResult[$key]["userId"]);
					$userResult = parent::getUserInfo($userWhereBeen);
					while (list($key_u, $val_u) = each($userResult)){
						$userName = trim($this->cipher->getDecrypt($userResult[$key_u]["name"]));
					}

					$regData = substr($amResult[$key]["writeDate"],0,10);
					$regDataArr = explode("-", $regData);
					$viewRegDate = $regDataArr[0]."년 ".$regDataArr[1]."월";

					if($amResult[$key]["userId"] == $_SESSION["USER_ID"]){
						$addBtn = "
									<button type=\"button\" class=\"btn_review\" onclick=\"modifyMemo('".$amResult[$key]["idx"]."')\">수정</button>
									<button type=\"button\" class=\"btn_review\" onclick=\"deleteMemo('".$amResult[$key]["idx"]."')\">삭제</button>
						";
					}

					$returnVal .= "
						<li>
							<div class=\"sv_review_pic\">
								<!--<img src=\"/html/sample/svp1.jpg\" alt=\"\" /><br />-->".$userName."
							</div>
							<div class=\"sv_review_txt\">
								<p class=\"sv_review_txt2\">".nl2br($amResult[$key]["memo"])."<textarea id=\"memo".$amResult[$key]["idx"]."\" style=\"display:none\">".$amResult[$key]["memo"]."</textarea>
								</p>
								<div class=\"sv_review_date\">".$viewRegDate."</div>
								<div class=\"float_right\">
									<!--<button type=\"button\" class=\"btn_review\"><img src=\"/images/recommend.gif\" alt=\"\" />추천</button>-->
									".$addBtn."
								</div>
							</div>
						</li>
					";
				}

				return $returnVal;

			}catch(Exception $e){
				$logData = array("E", $_SERVER["REMOTE_ADDR"], $e->getMessage(), date("Y-m-d H:i:s"), "");
				parent::logInsert($logData);
				$this->common->finalMoveMng("lnd","시스템 오류입니다.","","");
			}
		}

		/*상품정보 출력*/
		public function getSprInfoListView2($getBeen){
			$sprResult = parent::searchSpr2($getBeen);
			$returnData = array();

			while (list($key, $val) = each($sprResult)){
				$returnData["time"] = $sprResult[$key]["proTime"];
			}
			return $returnData;
		}

		/*상품정보 출력*/
		public function getResCntInfo($getBeen, $limitQuery){
			$resResult = parent::getResCntMOL($getBeen, $limitQuery);

			while (list($key, $val) = each($resResult)){
				$resCnt = $resResult[$key]["resCnt"];
			}
			return $resCnt;
		}


		/**점집 예약**/
		public function setReservationInfo($getBeen){
			$sprBeen = array(":idx" => $getBeen[1]);
			$sprResult = parent::searchSpr2($sprBeen);
			while (list($key, $val) = each($sprResult)){
				$proIdx = $sprResult[$key]["proIdx"];
			}
			/*결제 데이터 생성*/
			$paymentBeen = array("B", "R", $getBeen[5], $getBeen[3], "0", "", "", "W", "", "", "", "", date("Y-m-d H:i:s"));
			$paymentIdx = parent::paymentInfoInsert($paymentBeen);

			$reservationBeen = array($getBeen[0], $proIdx, $paymentIdx, $getBeen[5], $getBeen[6], $getBeen[7], $getBeen[8], $getBeen[4], "W", date("Y-m-d H:i:s"));
			parent::setReservationInfoMOL($reservationBeen);
		}

		/**위시 체크**/
		public function getWishCnt($getBeen){
			$whisResult = parent::getWishCntMOL($getBeen);
			while (list($key, $val) = each($whisResult)){
				$wishCnt = $whisResult[$key]["wishCnt"];
			}

			return $wishCnt;
		}

		/**위시 등록**/
		public function setWish($getBeen){
			parent::whishInfoInsert($getBeen);
		}

		/**검색 결과**/
		public function getApproachSHList($page="", $setOrder="", $search, $notIdx){
			$returnVal = "";
			$searchQuery = "";
			$this->link = 6;
			if($search["searchSido"] != ""){
				$searchQuery .= " AND SHAddress LIKE '".$search["searchSido"]." ".$search["searchGun"]." %'";
			}

			$startNum = ($page - 1) * $this->link;
			$limitQuery = $searchQuery." order by ".$setOrder." limit ".$startNum." , ".$this->link;
			//$limitQuery = " order by ".$setOrder;

			try{

				$shamanTotalCntResult = parent::getSearchSHTotalCnt("",$searchQuery);
				while (list($key, $val) = each($shamanTotalCntResult)){
					$shamanCnt = $shamanTotalCntResult[$key]["shamanCnt"];
				}
				$record = $shamanCnt;
				$this->searchTotalCnt = $shamanCnt;
				$url_file = "/";
				$url_parameter = "#none";
				$this->approachPageView = $this->paging->Link_Search($page,$record,$this->link,$this->linking,$url_file,$url_parameter);

				$shamanResult = parent::searchShamanMOL("",$limitQuery);
				while (list($key, $val) = each($shamanResult)){

					if($notIdx != $shamanResult[$key]["SHIdx"]){

						$SHId = $shamanResult[$key]["SHId"];
						$prdPrice = $shamanResult[$key]["prdPrice"];
						$SHName = $shamanResult[$key]["SHName"];

						$whereBeen = array(":code" => $SHId."_affter");
						$amTotalCntResult = parent::affterMemoTotalMOL($whereBeen);
						while (list($key_a, $val_a) = each($amTotalCntResult)){
							$amCnt = $amTotalCntResult[$key_a]["amCnt"];
						}

						$wishBeen = array(":SHIdx" => $shamanResult[$key]["SHIdx"], ":userId"=>$_SESSION["USER_ID"]);
						$wishCnt = $this->getWishCnt($wishBeen);

						if($wishCnt > 0){
							$heartImg = "<img class=\"sc_heart\" src=\"/images/heart.png\" alt=\"\" />";
						}else{
							$heartImg = "<img class=\"sc_heart\" src=\"/images/heart_off.png\" alt=\"\" />";
						}

						$fileData2 = array(":parentId" => $SHId, ":type" => "profile");
						$fileResult = parent::searchFile($fileData2);
						$returnData = "";
						while (list($key, $val) = each($fileResult)){
							$saveName = $fileResult[$key]["saveName"];
						}

						$fileData2 = array(":parentId" => $SHId, ":type" => "shaman");
						$fileResult = parent::searchFile($fileData2);
						$returnData = "";
						$loopIdx = 0;
						while (list($key, $val) = each($fileResult)){
							$saveName2 = $fileResult[$key]["saveName"];
							break;
						}

						if($saveName == ""){
							$viewName = "/html/sample/sp1.jpg";
						}else{
							$viewName = "/upload/shaman/".$saveName;
						}

						if($saveName2 == ""){
							$viewName2 = "/html/sample/s1.jpg";
						}else{
							$viewName2 = "/upload/shaman/".$saveName2;
						}

						$returnVal = "
							<li>
								".$heartImg."
								<div class=\"sc_photo_wrap\">
									<a href=\"?com=shaman&lnd=shamanhome&SHId=".$SHId."\"><img src=\"".$viewName2."\" alt=\"\" style=\"width:320px;height240px;\"/></a>
									<div class=\"sc_money\">
										<span>\</span>".number_format($prdPrice)."
									</div>
								</div>

								<img class=\"sc_photo_face\" src=\"".$viewName."\" alt=\"\" />

								<p class=\"photo_link\">
									<a href=\"/html/shop_view.html\"><img src=\"/images/new.gif\" alt=\"new\" />".$SHName."</a>
								</p>
								<p class=\"photo_score\">
									신점 전체 · 4.9<img src=\"/images/star.gif\" alt=\"\" />· 후기 ".$amCnt."개
								</p>
							</li>
						";
					}
				}

				return $returnVal;

			}catch(Exception $e){
				$logData = array("E", $_SERVER["REMOTE_ADDR"], $e->getMessage(), date("Y-m-d H:i:s"), "");
				parent::logInsert($logData);
				$this->common->finalMoveMng("lnd","시스템 오류입니다.","","");
			}
		}

		/**예약 제한 확인**/
		public function resLimitDayCnt($whereBeen, $limitBeen){
			$limitQuery = " AND (startDate <= '".$limitBeen["resDate"]."' AND endDate >= '".$limitBeen["resDate"]."')";
			$resResult = parent::resLimitDayCntMOL($whereBeen, $limitQuery);
			while (list($key, $val) = each($resResult)){
				$limitCnt = $resResult[$key]["limitCnt"];
			}

			$rtnCode = $limitCnt > 0 ? "L" : "F";
			echo $rtnCode;
		}

		/*예약 정보 출력*/
		public function getLimitDayInfoListView($getBeen){
			$limitResult = parent::getLimitInfoList($getBeen);
			$returnData = "";

			while (list($key, $val) = each($limitResult)){
				$startDate = $limitResult[$key]["startDate"];
				$endDate = $limitResult[$key]["endDate"];
				$idx = $limitResult[$key]["idx"];

				$rtnVal = "";

				$returnData .= "<div class=\"fileItem\">".$startDate."~".$endDate." <span class=\"deleteFile\" onclick=\"deleteLimit('".$idx."')\">x</span></div>";
			}
			return $returnData;
		}

		/*예약 정보 출력*/
		public function getLimitDayInfoListView2($getBeen){
			$limitResult = parent::getLimitInfoList($getBeen);
			$returnData = "";

			while (list($key, $val) = each($limitResult)){
				$startDate = $limitResult[$key]["startDate"];
				$endDate = $limitResult[$key]["endDate"];
				$idx = $limitResult[$key]["idx"];

				$rtnVal = "";

				$returnData .= "<div class=\"fileItem\">".$startDate."~".$endDate."</div>";
			}
			return $returnData;
		}

		public function setLimitDayInfo($limitSDate, $limitEDate, $SHIdx){
			$loopCnt = sizeof($limitSDate);
			$limitWhereBeen = array(":SHIdx"=>$SHIdx);
			//parent::emptryLimitDay($limitWhereBeen);
			for($i=0; $i < $loopCnt; $i++){
				$setBeenData = array($SHIdx, $limitSDate[$i], $limitEDate[$i],date("Y-m-d H:i:s"));
				parent::setLimitDay($setBeenData);
			}
		}

		public function deleteLimitDayInfo($whereBeen){
			parent::deleteLimitDayMOL($whereBeen);
		}
	}
?>