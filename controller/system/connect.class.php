<?php 
include 'database.class.php';

date_default_timezone_set('Asia/Bangkok');

class pdo_mysql{

	private static $HOST = "172.17.1.11";

	private static $USER = "quant@ideatrade";

	private static $PASSWORD = ")5twQni9p6M!.oty";

	private static $DATABASE = "db_ideatrade";

	private static $DATABASE2 = "";

	private static $DATABASE3 = "";

	public function DB_PDO(){

		$opt = array(

			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

			PDO::ATTR_EMULATE_PREPARES => FALSE,

		);

		$dsn = "mysql:host=" . self::$HOST . ';dbname=' . self::$DATABASE . ';charset=utf8';

		try {

			$pdo_connect = new PDO($dsn, self::$USER, self::$PASSWORD, $opt);

		} catch (Exception $e) {

			$pdo_connect = $e->GetMessage();

		}

		return $pdo_connect;

	}

	public function DB_server(){

		$conn = new Database(self::$DATABASE, self::$USER, self::$PASSWORD,self::$HOST);

		return $conn;

	}

	public function DB_PDO2(){

		$opt = array(

			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

			PDO::ATTR_EMULATE_PREPARES => FALSE,

		);

		$dsn = "mysql:host=" . self::$HOST . ';dbname=' . self::$DATABASE2 . ';charset=utf8';

		try {

			$pdo_connect = new PDO($dsn, self::$USER, self::$PASSWORD, $opt);

		} catch (Exception $e) {

			$pdo_connect = $e->GetMessage();

		}

		return $pdo_connect;

	}

	public function DB_PDO3(){

		$opt = array(

			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

			PDO::ATTR_EMULATE_PREPARES => FALSE,

		);

		$dsn = "mysql:host=" . self::$HOST . ';dbname=' . self::$DATABASE3 . ';charset=utf8';

		try {

			$pdo_connect = new PDO($dsn, self::$USER, self::$PASSWORD, $opt);

		} catch (Exception $e) {

			$pdo_connect = $e->GetMessage();

		}

		return $pdo_connect;

	}

}

?>