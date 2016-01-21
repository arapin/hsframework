<?
	include $_SERVER["DOCUMENT_ROOT"]."/class/MODEL/calcMol.php";
	include $_SERVER["DOCUMENT_ROOT"]."/class/COMMON/common.class.php";
	include $_SERVER["DOCUMENT_ROOT"]."/class/COMMON/cipher.class.php";
	include $_SERVER["DOCUMENT_ROOT"]."/class/COMMON/paging.class.php";

	class Calc extends CalcMOL {
		private $cipher;
		private $common;
		public $morBtn="";
		public $link = "20";
		public $linking = "10";

		/*생성자*/
		public function __construct() {
			parent:: __construct("sample");
			$this->cipher = new Cipher("wpgbxla#$%wpdksrhksfus@good!=");
			$this->common = new Common();
			$this->paging = new Paging();
		}

		/**정산확인**/
		public function getCalcResultInfo($setBeen){
			$calcResult = parent::monthCalcCountMOL($setBeen);
			while (list($key, $val) = each($calcResult)){
				$scCnt = $calcResult[$key]["scCnt"];
			}

			return $scCnt;
		}
		
		/**정산하기**/
		public function setCalcInfo($setBeen){
			$calcResult = parent::monthCalcCountMOL($setBeen);
			while (list($key, $val) = each($calcResult)){
				$scCnt = $calcResult[$key]["scCnt"];
			}

			if($scCnt == 0){
				$totalPrice = 0;
				$totalCnt = 0;
				$shamanCalcArray = array();

				$calcFristDate = date("Y-m-d",strtotime($setBeen[":year"].$setBeen[":month"].CALCDAY));
				$time = strtotime($calcFristDate); 
				$calcLastDay = date("t", $time);
				$calcLastDate = date("Y-m-d",strtotime($setBeen[":year"].$setBeen[":month"].$calcLastDay));
				
				/*예약 결제 내역 정산*/
				$limitQuery = " AND payDate BETWEEN  '".$calcFristDate."' AND  '".$calcLastDate."' GROUP BY b.SHIdx";
				$shamanResult = parent::paymentCalcShamanUserMOL("",$limitQuery);

				while (list($key, $val) = each($shamanResult)){
					$SHIdx = $shamanResult[$key]["SHIdx"];
					$shamanGetBeen = array(":SHIdx" => $SHIdx);
					$shamanCalcArray[$SHIdx] = array();

					$calcResInfoResult = parent::shamanCalcResTotalInfoMOL($shamanGetBeen);
					while (list($key_s, $val_s) = each($calcResInfoResult)){
						$totalPrice += $calcResInfoResult[$key_s]["totalPrice"];
						$totalCnt += $calcResInfoResult[$key_s]["totalCnt"];
					}

					$shamanCalcArray[$SHIdx]["totalPrice"] = $totalPrice;
					$shamanCalcArray[$SHIdx]["totalCnt"] = $totalCnt;
				}
				/*예약 결제 내역 정산*/

				/*신점문의 결제 내역 정산*/
				/*신점문의 결제 내역 정산*/
				while (list($key, $val) = each($shamanCalcArray)){
					$shamanGetBeen = array(":SHIdx" => $key);
					$shamanResult = parent::getShamanNameMOL($shamanGetBeen);
					while (list($key_s, $val_s) = each($shamanResult)){
						$SHId = $shamanResult[$key_s]["SHId"];
					}
					$calcSetBeen = array($SHId, $setBeen[":year"], $setBeen[":month"], $shamanCalcArray[$key]["totalPrice"], $shamanCalcArray[$key]["totalCnt"],"N",date("Y-m-d H:i:s"));
					parent::setShamanCalcInfoMOL($calcSetBeen);
				}
				$this->common->finalMoveMng("lnd",$setBeen[":year"]."년 ".$setBeen[":month"]."월 무속인 정산내역이 처리 되었습니다.","calc","list","&searchYear=".$setBeen[":year"]."&searchMonth".$setBeen[":month"]);
			}else{
				$this->common->finalMoveMng("lnd","이미 정산 하셨습니다.","calc","list","&searchYear=".$setBeen[":year"]."&searchMonth".$setBeen[":month"]);
			}
		}
		
		/**정산 내역 가져오기**/
		public function getCalcList($getBeen, $setOrder){
			$returnVal = "";

			$startNum = ($page - 1) * $this->link;
			//$limitQuery = "order by ".$setOrder." limit ".$startNum." , ".$this->link;
			$limitQuery = "order by ".$setOrder;

			try{
				$calcTotalListResult = parent::calcTotalListMOL($getBeen);
				while (list($key, $val) = each($calcTotalListResult)){
					$scCnt = $calcTotalListResult[$key]["scCnt"];
				}

				$record = $scCnt;
				/*$url_file = "/";
				$url_parameter = "com=board&lnd=".$lnd."&code=".$code;
				$this->pageView = $this->paging->Link($page,$record,$this->link,$this->linking,$url_file,$url_parameter);
				$loop_number=$record - $startNum;*/

				$calcListResult = parent::calcListMOL($getBeen,$limitQuery);
				while (list($key, $val) = each($calcListResult)){
					$idx				=  $calcListResult[$key]["idx"];
					$SHId				=  $calcListResult[$key]["SHId"];
					$year				=  $calcListResult[$key]["year"];
					$month				=  $calcListResult[$key]["month"];
					$calcPrice				=  $calcListResult[$key]["calcPrice"];
					$calcCnt			=  $calcListResult[$key]["calcCnt"];
					$calcState			=  $calcListResult[$key]["calcState"];
					$regDate			=  $calcListResult[$key]["regDate"];
					
					$shamanData = array(":SHId" => $SHId);
					$shamanResult = parent::modifyShamanInfo($shamanData);
					$returnData = array();
					while (list($key_s, $val_s) = each($shamanResult)){
						$name	= $shamanResult[$key_s]["name"];
						$SHIdx	= $shamanResult[$key_s]["idx"];
					}

					if($calcState == "Y"){
						$viewState = "<font style=\"color:#0000ff\">지급</font>";
						$viewBtn = "";
					}else{
						$viewState = "<font style=\"color:#cc3300\">미지급</font>";
						$viewBtn = "<a href=\"#\" class=\"approve\" style=\"padding-right:10px;\"  onclick=\"calcInput('".$idx."','".$year."','".$month."');\"><i class=\"fa fa-check\"></i></a>";
					}

					$returnVal .= "<tr>
						<td>".$record."</td>
						<td>".$year."</td>
						<td>".$month."</td>
						<td><a href=\"?com=payment&lnd=list&SHIdx=".$SHIdx."&searchPayState=I&mng=Y\">".$name."</a></td>
						<td>".number_format($calcPrice)."원</td>
						<td>".number_format($calcCnt)."건</td>
						<td>".$viewState."</td>
						<td><span class=\"date\">".$regDate."</span></td>
						<td>".$viewBtn."</td>
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

		/**정산금액 지급 업데이트**/
		public function setCalcUpdate($getBeen, $setBeen, $year, $month){
			parent::shamanCalcStateUpdateMOL($getBeen, $setBeen);
			$this->common->finalMoveMng("lnd","지급 처리 되었습니다.","calc","list","&searchYear=".$year."&searchMonth".$year);
		}
	}
?>