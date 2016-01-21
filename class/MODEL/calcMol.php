<?
	include $_SERVER["DOCUMENT_ROOT"]."/class/DAO/DAO.class.php";

	class CalcMOL extends DAO {
		private $logc;
		private $shamanInfo;
		private $paymentInfo;
		private $reservationInfo;
		private $aqBoardInfo;
		private $userInfo;
		private $productInfo;
		private $productInfo2;
		private $shamanCalc;


		public function __construct($svName) {
			parent:: __construct($svName);
			$this->logc = new DAO("logcinfo");
			$this->shamanInfo = new DAO("shamaninfo");
			$this->paymentInfo = new DAO("paymentinfo");
			$this->reservationInfo = new DAO("reservationinfo");
			$this->aqBoardInfo = new DAO("aqboardinfo");
			$this->userInfo = new DAO("userinfo");
			$this->productInfo = new DAO("shrelayproinfo");
			$this->productInfo2 = new DAO("productinfo");
			$this->shamanCalc = new DAO("shamanCalc");
		}

		/**정산내역 리스트**/
		public function calcListMOL($getBeen, $limitQuery){
			$calcResult = $this->shamanCalc->selectQuery("calcList", $getBeen, $limitQuery);
			return $calcResult;
		}

		/**정산내역 총 갯수**/
		public function calcTotalListMOL($getBeen, $limitQuery){
			$calcResult = $this->shamanCalc->selectQuery("calcTotalList", $getBeen, $limitQuery);
			return $calcResult;
		}
		
		/**정산내역 확인**/
		public function monthCalcCountMOL($getBeen){
			$calcResult = $this->shamanCalc->selectQuery("monthCalcCount", $getBeen);
			return $calcResult;
		}

		/**정산 대상 무속인 가져오기**/
		public function paymentCalcShamanUserMOL($getBeen, $limitQuery){
			$calcResult = $this->paymentInfo->selectQuery("paymentCalcShamanUser", $getBeen, $limitQuery);
			return $calcResult;
		}

		/**무속인 예약 결제 총합 정보**/
		public function shamanCalcResTotalInfoMOL($whereBeen, $limitQuery){
			$payResult = $this->paymentInfo->selectQuery("paymentCalcResTotalInfo", $whereBeen, $limitQuery);
			return $payResult;
		}

		/**무속인명 가져오기**/
		public function getShamanNameMOL($getBeen){
			$shamanResult = $this->shamanInfo->selectQuery("getShamanName", $getBeen);
			return $shamanResult;
		}

		/**무속인명 가져오기**/
		public function modifyShamanInfo($getBeen){
			$shamanResult = $this->shamanInfo->selectQuery("shamanModify", $getBeen);
			return $shamanResult;
		}

		/**정산내역 입력**/
		public function setShamanCalcInfoMOL($setBeen){
			$this->shamanCalc->insertQuery("shamanCalcInsert",$setBeen);
		}

		/**정산 금액 지급 수정**/
		public function shamanCalcStateUpdateMOL($getBeen, $setBeen){
			$this->shamanCalc->updateQuery("shamanCalcStateUpdate",$setBeen,$getBeen);
		}
	}
?>