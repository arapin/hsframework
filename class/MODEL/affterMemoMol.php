<?
	include $_SERVER["DOCUMENT_ROOT"]."/class/DAO/DAO.class.php";

	class AffterMemoMOL extends DAO {
		private $logc;
		private $shamanInfo;
		private $mainBig;
		private $mainMiddle;
		private $fileinfo;
		private $multimedia;

		public function __construct($svName) {
			parent:: __construct($svName);
			$this->logc = new DAO("logcinfo");
			$this->shamanInfo = new DAO("shamaninfo");
		}

		public function affterMemoTotalCntMOL(){
			$amResult = parent::selectQuery("affterMemoTotalCnt");
			return $amResult;
		}

		public function affterMemoListMOL($bind,$limitQuery){
			$amResult =  parent::selectQuery("affterMemoList",$bind,$limitQuery);
			return $amResult;
		}

		public function affterMemoInfoMOL($bind){
			$amResult =  parent::selectQuery("affterMemoInfoSelect",$bind);
			return $amResult;
		}

		public function affterMemoInfoDeleteMOL($whereBeen){
			parent::deleteQuery("affterMemoDelete",$whereBeen);
		}


		/** 회원정보 수정 회원정보 조회 **/
		public function modifyShamanInfo($bind){
			$shamanResult = $this->shamanInfo->selectQuery("shamanModify", $bind);
			return $shamanResult;
		}
		
		/** 로그 기록용**/
		public function logInsert($bind){
			$this->logc->insertQuery("logcInfoInsert",$bind);
		}
	}
?>