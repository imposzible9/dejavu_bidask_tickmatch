<?php
include 'connect.class.php';
class system extends pdo_mysql
{
	protected $exchange = 10;
	protected $apuser = "storez";
	protected $appass = "Storez5015";
	protected $twuser = "kitisak_070@hotmail.com";
	protected $twpass = "tmpwokimIURkKUlkPwGgkvgeUjyg[tr][tr]";
	protected $con_id = "102114";
	protected $ac_code = "tmpwoktXABBQMDi[pl]FTaDTwuvkLUHYMUUhFix2IwOaB[pl]hSKXsi[sa]5SUI9HuFTdqhbZzFBSe0BGUu8XK0VoafmvOeHCQYTg[tr][tr]";
	function __construct()
	{
		if (isset($_SESSION['user_name'])) {
			$this->dbserver = $this->DB_server();
			$this->db = $this->DB_PDO();
			$this->db2 = $this->DB_PDO2();
			$this->db3 = $this->DB_PDO3();
		}
		$this->user_name = (isset($_SESSION['user_name'])) ? $_SESSION['user_name'] : '';
	}

	public function ConnectSQL()
	{
		$this->dbserver = $this->DB_server();
		$this->db = $this->DB_PDO();
		// $this->db2 = $this->DB_PDO2();
		// $this->db3 = $this->DB_PDO3();
	}

	function getAllCust()
	{
		$this->ConnectSQL();
		$cars = array("Volvo", "BMW", "Toyota");
		$indo = $this->db->query("SELECT * FROM tb_customer")->fetchAll();
		// $result = [];
		// while($fetchResult = $indo->fetch(PDO::FETCH_ASSOC)){
		// 	array_push($fetchResult);
		// }
		return $indo;
	}


	function userinfo1()
	{
		$check = str_split($_SESSION['user_name']);
		if ($check[0] == "a" || $check[0] == "A" || $check[0] == "b" || $check[0] == "B" || $check[0] == "c" || $check[0] == "C" || $check[0] == "d" || $check[0] == "D") {
			$indo = $this->db->query("SELECT * FROM idtable1 WHERE id = '" . $_SESSION['user_name'] . "'")->fetch();
		} elseif ($check[0] == "e" || $check[0] == "E" || $check[0] == "f" || $check[0] == "F" || $check[0] == "g" || $check[0] == "G" || $check[0] == "h" || $check[0] == "H" || $check[0] == "i" || $check[0] == "I") {
			$indo = $this->db->query("SELECT * FROM idtable2 WHERE id = '" . $_SESSION['user_name'] . "'")->fetch();
		} elseif ($check[0] == "j" || $check[0] == "J" || $check[0] == "k" || $check[0] == "K" || $check[0] == "l" || $check[0] == "L" || $check[0] == "m" || $check[0] == "M" || $check[0] == "n" || $check[0] == "n") {
			$indo = $this->db->query("SELECT * FROM idtable3 WHERE id = '" . $_SESSION['user_name'] . "'")->fetch();
		} elseif ($check[0] == "o" || $check[0] == "O" || $check[0] == "p" || $check[0] == "P" || $check[0] == "q" || $check[0] == "Q" || $check[0] == "r" || $check[0] == "R" || $check[0] == "s" || $check[0] == "S") {
			$indo = $this->db->query("SELECT * FROM idtable4 WHERE id = '" . $_SESSION['user_name'] . "'")->fetch();
		} elseif ($check[0] == "t" || $check[0] == "T" || $check[0] == "u" || $check[0] == "U" || $check[0] == "v" || $check[0] == "V" || $check[0] == "w" || $check[0] == "W" || $check[0] == "x" || $check[0] == "X" || $check[0] == "y" || $check[0] == "Y" || $check[0] == "z" || $check[0] == "Z") {
			$indo = $this->db->query("SELECT * FROM idtable5 WHERE id = '" . $_SESSION['user_name'] . "'")->fetch();
		} else {
			$indo = $this->db->query("SELECT * FROM idtable1 WHERE id = '" . $_SESSION['user_name'] . "'")->fetch();
		}
		return $indo;
	}
	public function userinfo2()
	{
		$stmt = $this->db2->prepare("SELECT * FROM pc WHERE user_id = :username");
		$stmt->execute([':username' => $this->user_name]);
		if ($stmt->rowcount() > 0) {
			while ($rows = $stmt->fetch()) {
				$result[] = $rows;
			}
			return $result;
		} else {
			return 0;
		}
	}


	function save_score($d)
	{
		$this->ConnectSQL();

		$date = str_replace('/', '-', $d['datetimeinsert_score']);
		$dt = date('Y-m-d', strtotime($date));
		$data = [
			"PatientId" => $d['PatientId'],
			"Score" => $d['score'],
			"DateTime" => $dt
		];
		$this->dbserver->insert('tb_phystherapyscore', $data);

		$message['status'] = "success";
		$message['info'] = "บันทึกคะแนนสำเร็จ";

		return $message;
	}

	function scoreForuCust()
	{
		$this->ConnectSQL();

		$sql = "SELECT A.PatientId, A.FirstName, A.LastName, B.Score, B.DateTime FROM tb_customer  A
				LEFT JOIN tb_phystherapyscore B ON A.PatientId = B.PatientId
				ORDER BY A.PatientId, B.DateTime
				";
		$indo = $this->db->query($sql)->fetchAll();

		return $indo;
	}

	private function resultToArray($result)
	{
		$rows = array();
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		return $rows;
	}

	function querybidask($data)
	{
		$this->ConnectSQL();

		try {
			//$data = $_POST;
			$symbol = strtoupper($data['symbol']);
			//$stDt = "2023-02-24 10:00";//$data['stDate'] . " " . $data['sttime'];
			//$enDt = "2023-02-24 16:30";//$data['enDate'] . " " . $data['entime'];
			$stDt = $data['stDate'] . " " . $data['sttime'];
			$enDt = $data['enDate'] . " " . $data['entime'];

			$stDt_tk = $data['stDate'] . " " . "09:00:00";
			$enDt_tk = $data['stDate'] . " " . "17:30:00";


			$sql = "SELECT * FROM stocksm_bidasks WHERE Symbol = '$symbol' AND Time >= '$stDt' AND Time <= '$enDt' ";
			$sql .= "GROUP BY Symbol, Time,  Ask1, Ask2, Ask3, Ask4, Ask5, Bid1, Bid2, Bid3, Bid4, Bid5, VolAsk1, VolAsk2, VolAsk3, VolAsk4, VolAsk5, VolBid1, VolBid2, VolBid3, VolBid4, VolBid5";

			$sql_tickmatch = "SELECT `Symbol`, `Last`, `Vol`, `Type`, `DtMinOfRec` AS Time, `CodeOfTime`, `CountOfTime`, `SeqOfDate`, `updated_at`, `Time` AS OrdrOfTime FROM stocksm_tickmatchs WHERE Symbol = '$symbol' AND DtMinOfRec >= '$stDt_tk' AND DtMinOfRec <= '$enDt_tk' ORDER BY DtMinOfRec ASC ";

			$row_bidask =  $this->db->query($sql)->fetchAll();
			$row_tickmatch =  $this->db->query($sql_tickmatch)->fetchAll();

			$res['bidask'] = $row_bidask;
			$res['tickmatch'] = $row_tickmatch;

			return $res;
		} catch (\Throwable $th) {
			$message['status'] = "error";
			$message['info'] = "";

			return $message;
		}
	}


	function querytickmatch1($data)
	{
		$this->ConnectSQL();

		try {
			$Symbol = $data['symbol1'];
			$datest1 = $data['datest1'];
			$sql = "select * from stocksm_tickmatchs where Symbol ='$Symbol' and updated_at >= '$datest1' and updated_at <= '$datest1';";


			$row_tickmatch =  $this->db->query($sql)->fetchAll();
			$res['tickmatch'] = $row_tickmatch;

			return $res;
		} catch (\Throwable $th) {
			$message['status'] = "error";
			$message['info'] = "";

			return $message;
		}
	}

	function querytickmatch2($data)
	{
		$this->ConnectSQL();

		try {
			$Symbol = $data['symbol2'];
			$datest1 = $data['datest2'];
			$sql = "select * from stocksm_tickmatchs where Symbol ='$Symbol' and updated_at >= '$datest1' and updated_at <= '$datest1';";


			$row_tickmatch =  $this->db->query($sql)->fetchAll();
			$res['tickmatch'] = $row_tickmatch;

			return $res;
		} catch (\Throwable $th) {
			$message['status'] = "error";
			$message['info'] = "";

			return $message;
		}
	}

	function check_symbol($data)
	{
		$this->ConnectSQL();

		try {
			$Symbol = $data['symbol'];
			$sql = "SELECT * FROM stocksm_tickmatchs WHERE Symbol ='$Symbol' LIMIT 1;";

			$row_symbolcheck =  $this->db->query($sql)->fetchAll();
			$res['row_symbolcheck'] = $row_symbolcheck;

			return $res;
		} catch (\Throwable $th) {
			$message['status'] = "error";
			$message['info'] = "";

			return $message;
		}
	}
}
