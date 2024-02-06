<?php 
	include 'connect.class.php';
	class system extends pdo_mysql {
		protected $exchange = 10;
		protected $apuser = "storez";
		protected $appass = "Storez5015";
		protected $twuser = "kitisak_070@hotmail.com";
		protected $twpass = "tmpwokimIURkKUlkPwGgkvgeUjyg[tr][tr]";
		protected $con_id = "102114";
		protected $ac_code = "tmpwoktXABBQMDi[pl]FTaDTwuvkLUHYMUUhFix2IwOaB[pl]hSKXsi[sa]5SUI9HuFTdqhbZzFBSe0BGUu8XK0VoafmvOeHCQYTg[tr][tr]";
		function __construct() {
			if(isset($_SESSION['user_name']))
			{
			$this->dbserver = $this->DB_server();
			$this->db = $this->DB_PDO();
			//$this->db2 = $this->DB_PDO2();
			//$this->db3 = $this->DB_PDO3();
			}
			$this->user_name = (isset($_SESSION['user_name'])) ? $_SESSION['user_name'] : '';
		}
		
		public function ConnectSQL(){
		    $this->dbserver = $this->DB_server();
			$this->db = $this->DB_PDO();
		    $this->db2 = $this->DB_PDO2();
			$this->db3 = $this->DB_PDO3();
		}
		public function register($username,$password,$email){
            $this->ConnectSQL();
			$data = [
				"id" => $username,
				"passwd" => $password,
				"email" => $email
			];
			$check = str_split($username);
			if ($check[0] == "a" || $check[0] == "A" || $check[0] == "b" || $check[0] == "B" || $check[0] == "c" || $check[0] == "C" || $check[0] == "d" || $check[0] == "D") {
				try {
					$this->dbserver->insert('idtable1',$data);
					$_SESSION['user_name'] = $username;
					$message['status'] = "success";
					$message['info'] = "สมัครสำเร็จแล้ว";
				} catch (Exception $e) {
					$message['status'] = "error";
					$message['info'] = "มีผู้ใช้นี้อยู่ในระบบแล้ว";
				}
			}elseif($check[0] == "e" || $check[0] == "E" || $check[0] == "f" || $check[0] == "F" || $check[0] == "g" || $check[0] == "G" || $check[0] == "h" || $check[0] == "H" || $check[0] == "i" || $check[0] == "I"){
				try {
					$this->dbserver->insert('idtable2',$data);
					$_SESSION['user_name'] = $username;
					$message['status'] = "success";
				} catch (Exception $e) {
					$message['status'] = "error";
					$message['info'] = "มีผู้ใช้นี้อยู่ในระบบแล้ว";
				}
			}elseif ($check[0] == "j" || $check[0] == "J" || $check[0] == "k" || $check[0] == "K" || $check[0] == "l" || $check[0] == "L" || $check[0] == "m" || $check[0] == "M" || $check[0] == "n" || $check[0] == "n") {
				try {
					$this->dbserver->insert('idtable3',$data);
					$_SESSION['user_name'] = $username;
					$message['status'] = "success";
				} catch (Exception $e) {
					$message['status'] = "error";
					$message['info'] = "มีผู้ใช้นี้อยู่ในระบบแล้ว";
				}
			}elseif ($check[0] == "o" || $check[0] == "O" || $check[0] == "p" || $check[0] == "P" || $check[0] == "q" || $check[0] == "Q" || $check[0] == "r" || $check[0] == "R" || $check[0] == "s" || $check[0] == "S") {
				try {
					$this->dbserver->insert('idtable4',$data);
					$_SESSION['user_name'] = $username;
					$message['status'] = "success";
				} catch (Exception $e) {
					$message['status'] = "error";
					$message['info'] = "มีผู้ใช้นี้อยู่ในระบบแล้ว";
				}
			}elseif ($check[0] == "t" || $check[0] == "T" || $check[0] == "u" || $check[0] == "U" || $check[0] == "v" || $check[0] == "V" || $check[0] == "w" || $check[0] == "W" || $check[0] == "x" || $check[0] == "X" || $check[0] == "y" || $check[0] == "Y" || $check[0] == "z" || $check[0] == "Z") {
				try {
					$this->dbserver->insert('idtable5',$data);
					$_SESSION['user_name'] = $username;
					$message['status'] = "success";
				} catch (Exception $e) {
					$message['status'] = "error";
					$message['info'] = "มีผู้ใช้นี้อยู่ในระบบแล้ว";
				}
			}else{
				try {
					$this->dbserver->insert('idtable1',$data);
					$_SESSION['user_name'] = $username;
					$message['status'] = "success";
				} catch (Exception $e) {
					$message['status'] = "error";
					$message['info'] = "มีผู้ใช้นี้อยู่ในระบบแล้ว";
				}
			}
			return $message;
		}
		public function login($username,$password){
            $this->ConnectSQL();
			$user = [
				"id" => $username
			];
			$pass = $this->db->query("SELECT OLD_PASSWORD('".$password."')")->fetch();
			$passhas = $pass["OLD_PASSWORD('".$password."')"];
			$check = str_split($username);
			if ($check[0] == "a" || $check[0] == "A" || $check[0] == "b" || $check[0] == "B" || $check[0] == "c" || $check[0] == "C" || $check[0] == "d" || $check[0] == "D") {
				$num = $this->dbserver->select('idtable1',$user);
				if ($num->count() > 0) {
					$indo = $this->db->query("SELECT * FROM idtable1 WHERE id = '".$username."'")->fetch();
					if ($passhas == $indo['passwd']) {
						$_SESSION['user_name'] = $indo['id'];
						$message['status'] = "success";
					}else{
						$message['status'] = "error";
						$message['info'] = "รหัสผ่านผิด";
					}
				}else{
					$message['status'] = "error";
					$message['info'] = "ไม่พบบัญชีนี้อยู่ในระบบ";
				}
			}elseif($check[0] == "e" || $check[0] == "E" || $check[0] == "f" || $check[0] == "F" || $check[0] == "g" || $check[0] == "G" || $check[0] == "h" || $check[0] == "H" || $check[0] == "i" || $check[0] == "I"){
				$num = $this->dbserver->select('idtable2',$user);
				if ($num->count() > 0) {
					$indo = $this->db->query("SELECT * FROM idtable2 WHERE id = '".$username."'")->fetch();
					if ($passhas == $indo['passwd']) {
						$_SESSION['user_name'] = $indo['id'];
						$message['status'] = "success";
					}else{
						$message['status'] = "error";
						$message['info'] = "รหัสผ่านผิด";
					}
				}else{
					$message['status'] = "error";
					$message['info'] = "ไม่พบบัญชีนี้อยู่ในระบบ";
				}
			}elseif ($check[0] == "j" || $check[0] == "J" || $check[0] == "k" || $check[0] == "K" || $check[0] == "l" || $check[0] == "L" || $check[0] == "m" || $check[0] == "M" || $check[0] == "n" || $check[0] == "n") {
				$num = $this->dbserver->select('idtable3',$user);
				if ($num->count() > 0) {
					$indo = $this->db->query("SELECT * FROM idtable3 WHERE id = '".$username."'")->fetch();
					if ($passhas == $indo['passwd']) {
						$_SESSION['user_name'] = $indo['id'];
						$message['status'] = "success";
					}else{
						$message['status'] = "error";
						$message['info'] = "รหัสผ่านผิด";
					}
				}else{
					$message['status'] = "error";
					$message['info'] = "ไม่พบบัญชีนี้อยู่ในระบบ";
				}
			}elseif ($check[0] == "o" || $check[0] == "O" || $check[0] == "p" || $check[0] == "P" || $check[0] == "q" || $check[0] == "Q" || $check[0] == "r" || $check[0] == "R" || $check[0] == "s" || $check[0] == "S" || $check[0] == "s" || $check[0] == "S") {
				$num = $this->dbserver->select('idtable4',$user);
				if ($num->count() > 0) {
					$indo = $this->db->query("SELECT * FROM idtable4 WHERE id = '".$username."'")->fetch();
					if ($passhas == $indo['passwd']) {
						$_SESSION['user_name'] = $indo['id'];
						$message['status'] = "success";
					}else{
						$message['status'] = "error";
						$message['info'] = "รหัสผ่านผิด";
					}
				}else{
					$message['status'] = "error";
					$message['info'] = "ไม่พบบัญชีนี้อยู่ในระบบ";
				}
			}elseif ($check[0] == "t" || $check[0] == "T" || $check[0] == "u" || $check[0] == "U" || $check[0] == "v" || $check[0] == "V" || $check[0] == "w" || $check[0] == "W" || $check[0] == "x" || $check[0] == "X" || $check[0] == "y" || $check[0] == "Y" || $check[0] == "z" || $check[0] == "Z") {
				$num = $this->dbserver->select('idtable5',$user);
				if ($num->count() > 0) {
					$indo = $this->db->query("SELECT * FROM idtable5 WHERE id = '".$username."'")->fetch();
					if ($passhas == $indo['passwd']) {
						$_SESSION['user_name'] = $indo['id'];
						$message['status'] = "success";
						$message['info'] = "เข้าสู่ระบบสำเร็จ";
					}else{
						$message['status'] = "error";
						$message['info'] = "รหัสผ่านผิด";
					}
				}else{
					$message['status'] = "error";
					$message['info'] = "ไม่พบบัญชีนี้อยู่ในระบบ";
				}
			}else{
				$num = $this->dbserver->select('idtable1',$user);
				if ($num->count() > 0) {
					$indo = $this->db->query("SELECT * FROM idtable1 WHERE id = '".$username."'")->fetch();
					if ($passhas == $indo['passwd']) {
						$_SESSION['user_name'] = $indo['id'];
						$message['status'] = "success";
					}else{
						$message['status'] = "error";
						$message['info'] = "รหัสผ่านผิด";
					}
				}else{
					$message['status'] = "error";
					$message['info'] = "ไม่พบบัญชีนี้อยู่ในระบบ";
				}
			}
			return $message;
		}
		function userinfo(){
			$check = str_split($_SESSION['user_name']);
			if ($check[0] == "a" || $check[0] == "A" || $check[0] == "b" || $check[0] == "B" || $check[0] == "c" || $check[0] == "C" || $check[0] == "d" || $check[0] == "D") {
				$indo = $this->db->query("SELECT * FROM idtable1 WHERE id = '".$_SESSION['user_name']."'")->fetch();
			}elseif($check[0] == "e" || $check[0] == "E" || $check[0] == "f" || $check[0] == "F" || $check[0] == "g" || $check[0] == "G" || $check[0] == "h" || $check[0] == "H" || $check[0] == "i" || $check[0] == "I"){
				$indo = $this->db->query("SELECT * FROM idtable2 WHERE id = '".$_SESSION['user_name']."'")->fetch();
			}elseif ($check[0] == "j" || $check[0] == "J" || $check[0] == "k" || $check[0] == "K" || $check[0] == "l" || $check[0] == "L" || $check[0] == "m" || $check[0] == "M" || $check[0] == "n" || $check[0] == "n") {
				$indo = $this->db->query("SELECT * FROM idtable3 WHERE id = '".$_SESSION['user_name']."'")->fetch();
			}elseif ($check[0] == "o" || $check[0] == "O" || $check[0] == "p" || $check[0] == "P" || $check[0] == "q" || $check[0] == "Q" || $check[0] == "r" || $check[0] == "R" || $check[0] == "s" || $check[0] == "S") {
				$indo = $this->db->query("SELECT * FROM idtable4 WHERE id = '".$_SESSION['user_name']."'")->fetch();
			}elseif ($check[0] == "t" || $check[0] == "T" || $check[0] == "u" || $check[0] == "U" || $check[0] == "v" || $check[0] == "V" || $check[0] == "w" || $check[0] == "W" || $check[0] == "x" || $check[0] == "X" || $check[0] == "y" || $check[0] == "Y" || $check[0] == "z" || $check[0] == "Z") {
				$indo = $this->db->query("SELECT * FROM idtable5 WHERE id = '".$_SESSION['user_name']."'")->fetch();
			}else{
				$indo = $this->db->query("SELECT * FROM idtable1 WHERE id = '".$_SESSION['user_name']."'")->fetch();
			}
			return $indo;
		}
		public function userinfo2(){
			$stmt = $this->db2->prepare("SELECT * FROM pc WHERE user_id = :username");
			$stmt->execute([':username'=>$this->user_name]);
			if ($stmt->rowcount()>0) {
				while($rows = $stmt->fetch()){
					$result[] = $rows;
				}
				return $result;
			}else{
				return 0;
			}
		}
		public function addpoint($point){
			$pointb = $point;
			$check = str_split($_SESSION['user_name']);
			if ($check[0] == "a" || $check[0] == "A" || $check[0] == "b" || $check[0] == "B" || $check[0] == "c" || $check[0] == "C" || $check[0] == "d" || $check[0] == "D") {
				$queryq = $this->db->prepare("SELECT * FROM idtable1 WHERE id = :user");
				$queryq->execute([':user'=>$_SESSION['user_name']]);
				$row = $queryq->fetch();
				$pointez = $row['point']+$pointb;
				$addpointw = $this->db->prepare("UPDATE `idtable1` SET `point` = :pointb WHERE id = :user");
				$addpointw->execute([':pointb'=>$pointez,':user'=>$_SESSION['user_name']]);
			}elseif($check[0] == "e" || $check[0] == "E" || $check[0] == "f" || $check[0] == "F" || $check[0] == "g" || $check[0] == "G" || $check[0] == "h" || $check[0] == "H" || $check[0] == "i" || $check[0] == "I"){
				$queryq = $this->db->prepare("SELECT * FROM idtable2 WHERE id = :user");
				$queryq->execute([':user'=>$_SESSION['user_name']]);
				$row = $queryq->fetch();
				$pointez = $row['point']+$pointb;
				$addpointw = $this->db->prepare("UPDATE `idtable2` SET `point` = :pointb WHERE id = :user");
				$addpointw->execute([':pointb'=>$pointez,':user'=>$_SESSION['user_name']]);
			}elseif ($check[0] == "j" || $check[0] == "J" || $check[0] == "k" || $check[0] == "K" || $check[0] == "l" || $check[0] == "L" || $check[0] == "m" || $check[0] == "M" || $check[0] == "n" || $check[0] == "n") {
				$queryq = $this->db->prepare("SELECT * FROM idtable3 WHERE id = :user");
				$queryq->execute([':user'=>$_SESSION['user_name']]);
				$row = $queryq->fetch();
				$pointez = $row['point']+$pointb;
				$addpointw = $this->db->prepare("UPDATE `idtable3` SET `point` = :pointb WHERE id = :user");
				$addpointw->execute([':pointb'=>$pointez,':user'=>$_SESSION['user_name']]);
			}elseif ($check[0] == "o" || $check[0] == "O" || $check[0] == "p" || $check[0] == "P" || $check[0] == "q" || $check[0] == "Q" || $check[0] == "r" || $check[0] == "R" || $check[0] == "s" || $check[0] == "S") {
				$queryq = $this->db->prepare("SELECT * FROM idtable4 WHERE id = :user");
				$queryq->execute([':user'=>$_SESSION['user_name']]);
				$row = $queryq->fetch();
				$pointez = $row['point']+$pointb;
				$addpointw = $this->db->prepare("UPDATE `idtable4` SET `point` = :pointb WHERE id = :user");
				$addpointw->execute([':pointb'=>$pointez,':user'=>$_SESSION['user_name']]);
			}elseif ($check[0] == "t" || $check[0] == "T" || $check[0] == "u" || $check[0] == "U" || $check[0] == "v" || $check[0] == "V" || $check[0] == "w" || $check[0] == "W" || $check[0] == "x" || $check[0] == "X" || $check[0] == "y" || $check[0] == "Y" || $check[0] == "z" || $check[0] == "Z") {
				$queryq = $this->db->prepare("SELECT * FROM idtable5 WHERE id = :user");
				$queryq->execute([':user'=>$_SESSION['user_name']]);
				$row = $queryq->fetch();
				$pointez = $row['point']+$pointb;
				$addpointw = $this->db->prepare("UPDATE `idtable5` SET `point` = :pointb WHERE id = :user");
				$addpointw->execute([':pointb'=>$pointez,':user'=>$_SESSION['user_name']]);
			}else{
				$queryq = $this->db->prepare("SELECT * FROM idtable1 WHERE id = :user");
				$queryq->execute([':user'=>$_SESSION['user_name']]);
				$row = $queryq->fetch();
				$pointez = $row['point']+$pointb;
				$addpointw = $this->db->prepare("UPDATE `idtable1` SET `point` = :pointb WHERE id = :user");
				$addpointw->execute([':pointb'=>$pointez,':user'=>$_SESSION['user_name']]);
			}
		}
		public function showrc(){
			if (empty($_SESSION['user_name'])) {
				return 0;
			}else{
				$stmt = $this->db2->prepare("SELECT * FROM store WHERE user_id = :username");
				$stmt->execute([':username'=>$_SESSION['user_name']]);
				if ($stmt->rowCount() > 0) {
					$result = $stmt->fetch();
					if ($result['it0']=="6232") {
						return $result['io0']+1;
					}else{
						return 0;
					}
				}else{
					return 0;
				}
			}
		}
		public function trade($rc){
			if (empty($_SESSION['user_name'])) {
				$message['status'] = "error";
				$message['info'] = "กรุณาล็อกอินก่อน";
			}else{
				$stmt = $this->db->prepare("SELECT pay_flag FROM idtable1 WHERE id = :username");
				$stmt->execute([':username'=>$_SESSION['user_name']]);
				if ($stmt->rowCount() > 0)
				{
					$result = $stmt->fetch();
					if($result['pay_flag'] == 0) {
						$message = $this->trade_callback($rc);
					} else {
						$message['status'] = "error";
						$message['info'] = "กรุณาออกจากเกมก่อน";
					}
				} else {
					$stmt = $this->db->prepare("SELECT pay_flag FROM idtable2 WHERE id = :username");
					$stmt->execute([':username'=>$_SESSION['user_name']]);
					if ($stmt->rowCount() > 0)
					{
						$result = $stmt->fetch();
						if($result['pay_flag'] == 0) {
							$message = $this->trade_callback($rc);
						} else {
							$message['status'] = "error";
							$message['info'] = "กรุณาออกจากเกมก่อน";
						}
					} else {
						$stmt = $this->db->prepare("SELECT pay_flag FROM idtable3 WHERE id = :username");
						$stmt->execute([':username'=>$_SESSION['user_name']]);
						if ($stmt->rowCount() > 0)
						{
							$result = $stmt->fetch();
							if($result['pay_flag'] == 0) {
								$message = $this->trade_callback($rc);
							} else {
								$message['status'] = "error";
								$message['info'] = "กรุณาออกจากเกมก่อน";
							}
						} else {
							$stmt = $this->db->prepare("SELECT pay_flag FROM idtable4 WHERE id = :username");
							$stmt->execute([':username'=>$_SESSION['user_name']]);
							if ($stmt->rowCount() > 0)
							{
								$result = $stmt->fetch();
								if($result['pay_flag'] == 0) {
									$message = $this->trade_callback($rc);
								} else {
									$message['status'] = "error";
									$message['info'] = "กรุณาออกจากเกมก่อน";
								}
							} else {
								$stmt = $this->db->prepare("SELECT pay_flag FROM idtable5 WHERE id = :username");
								$stmt->execute([':username'=>$_SESSION['user_name']]);
								if ($stmt->rowCount() > 0)
								{
									$result = $stmt->fetch();
									if($result['pay_flag'] == 0) {
										$message = $this->trade_callback($rc);
									} else {
										$message['status'] = "error";
										$message['info'] = "กรุณาออกจากเกมก่อน";
									}
								} else {
									$message['status'] = "error";
									$message['info'] = "กรุณาล็อกอินก่อน";
								}
							}
						}
					}
				}
			}
			return $message;
		}
		
		public function trade_callback($rc) {
			if (empty($_SESSION['user_name'])) {
				$message['status'] = "error";
				$message['info'] = "กรุณาล็อกอินก่อน";
			}else{
				$stmt = $this->db2->prepare("SELECT * FROM store WHERE user_id = :username");
				$stmt->execute([':username'=>$_SESSION['user_name']]);
				if ($stmt->rowCount() > 0) {
					$result = $stmt->fetch();
					if ($result['it0']=="6232") {
						if ($result['io0']=="0") {
							$update = $this->db2->prepare("UPDATE `store` SET `it0` = '0' WHERE user_id =:username");
							$update->execute([':username'=>$_SESSION['user_name']]);
							$this->addpoint(100);
							$message['status'] = "success";
							$message['info'] = "แลกrcสำเร็จแล้ว";
						}elseif ($rc == $this->showrc()) {
							$update = $this->db2->prepare("UPDATE `store` SET `it0` = '0' , `io0` = '0' WHERE user_id =:username");
							$update->execute([':username'=>$_SESSION['user_name']]);
							$this->addpoint($rc*100);
							$message['status'] = "success";
							$message['info'] = "แลกrcสำเร็จแล้ว";
						}else{
							$rcnow = $this->showrc()-$rc-1;
							$update = $this->db2->prepare("UPDATE `store` SET `io0` = :rcnow WHERE user_id =:username");
							$update->execute([':rcnow'=>$rcnow,':username'=>$_SESSION['user_name']]);
							$this->addpoint($rc*100);
							$message['status'] = "success";
							$message['info'] = "แลกrcสำเร็จแล้ว";
						}
					}else{
						$message['status'] = "error";
						$message['info'] = "ไม่พบRCในช่องแรก";
					}
				}else{
					$message['status'] = "error";
					$message['info'] = "ไม่พบชื่อผู้ใช้ในคลัง";
				}
			}
			return $message;
		}
		public function buyrc($count){
			$stmt = $this->db2->prepare("SELECT * FROM store WHERE user_id = :user_name");
			$stmt->execute([':user_name'=>$this->user_name]);
			if ($stmt->rowcount() > 0) {
				$this->addpoint($count*-100);
				$result = $stmt->fetch();
				if ($result['it0'] == 0) {
					$lootempty = "0";
				}elseif ($result['it1'] == 0) {
					$lootempty = "1";
				}elseif ($result['it2'] == 0) {
					$lootempty = "2";
				}elseif ($result['it3'] == 0) {
					$lootempty = "3";
				}elseif ($result['it4'] == 0) {
					$lootempty = "4";
				}elseif ($result['it5'] == 0) {
					$lootempty = "5";
				}elseif ($result['it6'] == 0) {
					$lootempty = "6";
				}elseif ($result['it7'] == 0) {
					$lootempty = "7";
				}elseif ($result['it8'] == 0) {
					$lootempty = "8";
				}elseif ($result['it9'] == 0) {
					$lootempty = "9";
				}elseif ($result['it10']==0) {
					$lootempty = "10";
				}elseif ($result['it11']==0) {
					$lootempty = "11";
				}elseif ($result['it12']==0) {
					$lootempty = "12";
				}elseif ($result['it13']==0) {
					$lootempty = "13";
				}elseif ($result['it14']==0) {
					$lootempty = "14";
				}elseif ($result['it15']==0) {
					$lootempty = "15";
				}elseif ($result['it16']==0) {
					$lootempty = "16";
				}elseif ($result['it17']==0) {
					$lootempty = "17";
				}elseif ($result['it18']==0) {
					$lootempty = "18";
				}elseif ($result['it19']==0) {
					$lootempty = "19";
				}elseif ($result['it20']==0) {
					$lootempty = "20";
				}elseif ($result['it21']==0) {
					$lootempty = "21";
				}elseif ($result['it22']==0) {
					$lootempty = "22";
				}elseif ($result['it23']==0) {
					$lootempty = "23";
				}elseif ($result['it24']==0) {
					$lootempty = "24";
				}elseif ($result['it25']==0) {
					$lootempty = "25";
				}elseif ($result['it26']==0) {
					$lootempty = "26";
				}elseif ($result['it27']==0) {
					$lootempty = "27";
				}elseif ($result['it28']==0) {
					$lootempty = "28";
				}elseif ($result['it29']==0) {
					$lootempty = "29";
				}elseif ($result['it30']==0) {
					$lootempty = "30";
				}elseif ($result['it31']==0) {
					$lootempty = "31";
				}elseif ($result['it32']==0) {
					$lootempty = "32";
				}elseif ($result['it33']==0) {
					$lootempty = "33";
				}elseif ($result['it34']==0) {
					$lootempty = "34";
				}elseif ($result['it35']==0) {
					$lootempty = "35";
				}elseif ($result['it36']==0) {
					$lootempty = "36";
				}elseif ($result['it37']==0) {
					$lootempty = "37";
				}elseif ($result['it38']==0) {
					$lootempty = "38";
				}elseif ($result['it39']==0) {
					$lootempty = "39";
				}elseif ($result['it40']==0) {
					$lootempty = "40";
				}elseif ($result['it41']==0) {
					$lootempty = "41";
				}elseif ($result['it42']==0) {
					$lootempty = "42";
				}elseif ($result['it43']==0) {
					$lootempty = "43";
				}elseif ($result['it44']==0) {
					$lootempty = "44";
				}elseif ($result['it45']==0) {
					$lootempty = "45";
				}elseif ($result['it46']==0) {
					$lootempty = "46";
				}elseif ($result['it47']==0) {
					$lootempty = "47";
				}elseif ($result['it48']==0) {
					$lootempty = "48";
				}elseif ($result['it49']==0) {
					$lootempty = "49";
				}elseif ($result['it50']==0) {
					$lootempty = "50";
				}elseif ($result['it51']==0) {
					$lootempty = "51";
				}elseif ($result['it52']==0) {
					$lootempty = "52";
				}elseif ($result['it53']==0) {
					$lootempty = "53";
				}elseif ($result['it54']==0) {
					$lootempty = "54";
				}elseif ($result['it55']==0) {
					$lootempty = "55";
				}elseif ($result['it56']==0) {
					$lootempty = "56";
				}elseif ($result['it57']==0) {
					$lootempty = "57";
				}elseif ($result['it58']==0) {
					$lootempty = "58";
				}elseif ($result['it59']==0) {
					$lootempty = "59";
				}elseif ($result['it60']==0) {
					$lootempty = "60";
				}elseif ($result['it61']==0) {
					$lootempty = "61";
				}elseif ($result['it62']==0) {
					$lootempty = "62";
				}elseif ($result['it63']==0) {
					$lootempty = "63";
				}elseif ($result['it64']==0) {
					$lootempty = "64";
				}elseif ($result['it65']==0) {
					$lootempty = "65";
				}elseif ($result['it66']==0) {
					$lootempty = "66";
				}elseif ($result['it67']==0) {
					$lootempty = "67";
				}elseif ($result['it68']==0) {
					$lootempty = "68";
				}elseif ($result['it69']==0) {
					$lootempty = "69";
				}elseif ($result['it70']==0) {
					$lootempty = "70";
				}elseif ($result['it71']==0) {
					$lootempty = "71";
				}elseif ($result['it72']==0) {
					$lootempty = "72";
				}elseif ($result['it73']==0) {
					$lootempty = "73";
				}elseif ($result['it74']==0) {
					$lootempty = "74";
				}elseif ($result['it75']==0) {
					$lootempty = "75";
				}elseif ($result['it76']==0) {
					$lootempty = "76";
				}elseif ($result['it77']==0) {
					$lootempty = "77";
				}elseif ($result['it78']==0) {
					$lootempty = "78";
				}elseif ($result['it79']==0) {
					$lootempty = "79";
				}else{
					$message['status'] = "error";
					$message['info'] = "ไม่มีช่องเก็บของว่าง";
					return $message;
					exit();
				}
				$nowcountz = $count-1;
				$lootit = "it".strval($lootempty);
				$lootio = "io".strval($lootempty);
				$setrc = $this->db2->prepare("	
					UPDATE store
					SET ".$lootit." = 6232 , ".$lootio." = :countnow
					WHERE user_id = :user_name 
					");
				$setrc->execute([
					':countnow'=>$nowcountz,
					':user_name'=>$this->user_name,
				]);
				$message['status'] = "success";
				$message['info'] = "สำเร็จแล้ว";
			}else{
				$message['status'] = "error";
				$message['info'] = "ไม่พบusernameในระบบ";
			}
			return $message;
		}
		function addtoinventory($item, $count) {
			$stmt = $this->db2->prepare("SELECT * FROM store WHERE user_id = :user_name");
			$stmt->execute([':user_name'=>$this->user_name]);
			if ($stmt->rowcount() > 0) {
				$result = $stmt->fetch();
				if ($result['it0'] == 0) {
					$lootempty = "0";
				}elseif ($result['it1'] == 0) {
					$lootempty = "1";
				}elseif ($result['it2'] == 0) {
					$lootempty = "2";
				}elseif ($result['it3'] == 0) {
					$lootempty = "3";
				}elseif ($result['it4'] == 0) {
					$lootempty = "4";
				}elseif ($result['it5'] == 0) {
					$lootempty = "5";
				}elseif ($result['it6'] == 0) {
					$lootempty = "6";
				}elseif ($result['it7'] == 0) {
					$lootempty = "7";
				}elseif ($result['it8'] == 0) {
					$lootempty = "8";
				}elseif ($result['it9'] == 0) {
					$lootempty = "9";
				}elseif ($result['it10']==0) {
					$lootempty = "10";
				}elseif ($result['it11']==0) {
					$lootempty = "11";
				}elseif ($result['it12']==0) {
					$lootempty = "12";
				}elseif ($result['it13']==0) {
					$lootempty = "13";
				}elseif ($result['it14']==0) {
					$lootempty = "14";
				}elseif ($result['it15']==0) {
					$lootempty = "15";
				}elseif ($result['it16']==0) {
					$lootempty = "16";
				}elseif ($result['it17']==0) {
					$lootempty = "17";
				}elseif ($result['it18']==0) {
					$lootempty = "18";
				}elseif ($result['it19']==0) {
					$lootempty = "19";
				}elseif ($result['it20']==0) {
					$lootempty = "20";
				}elseif ($result['it21']==0) {
					$lootempty = "21";
				}elseif ($result['it22']==0) {
					$lootempty = "22";
				}elseif ($result['it23']==0) {
					$lootempty = "23";
				}elseif ($result['it24']==0) {
					$lootempty = "24";
				}elseif ($result['it25']==0) {
					$lootempty = "25";
				}elseif ($result['it26']==0) {
					$lootempty = "26";
				}elseif ($result['it27']==0) {
					$lootempty = "27";
				}elseif ($result['it28']==0) {
					$lootempty = "28";
				}elseif ($result['it29']==0) {
					$lootempty = "29";
				}elseif ($result['it30']==0) {
					$lootempty = "30";
				}elseif ($result['it31']==0) {
					$lootempty = "31";
				}elseif ($result['it32']==0) {
					$lootempty = "32";
				}elseif ($result['it33']==0) {
					$lootempty = "33";
				}elseif ($result['it34']==0) {
					$lootempty = "34";
				}elseif ($result['it35']==0) {
					$lootempty = "35";
				}elseif ($result['it36']==0) {
					$lootempty = "36";
				}elseif ($result['it37']==0) {
					$lootempty = "37";
				}elseif ($result['it38']==0) {
					$lootempty = "38";
				}elseif ($result['it39']==0) {
					$lootempty = "39";
				}elseif ($result['it40']==0) {
					$lootempty = "40";
				}elseif ($result['it41']==0) {
					$lootempty = "41";
				}elseif ($result['it42']==0) {
					$lootempty = "42";
				}elseif ($result['it43']==0) {
					$lootempty = "43";
				}elseif ($result['it44']==0) {
					$lootempty = "44";
				}elseif ($result['it45']==0) {
					$lootempty = "45";
				}elseif ($result['it46']==0) {
					$lootempty = "46";
				}elseif ($result['it47']==0) {
					$lootempty = "47";
				}elseif ($result['it48']==0) {
					$lootempty = "48";
				}elseif ($result['it49']==0) {
					$lootempty = "49";
				}elseif ($result['it50']==0) {
					$lootempty = "50";
				}elseif ($result['it51']==0) {
					$lootempty = "51";
				}elseif ($result['it52']==0) {
					$lootempty = "52";
				}elseif ($result['it53']==0) {
					$lootempty = "53";
				}elseif ($result['it54']==0) {
					$lootempty = "54";
				}elseif ($result['it55']==0) {
					$lootempty = "55";
				}elseif ($result['it56']==0) {
					$lootempty = "56";
				}elseif ($result['it57']==0) {
					$lootempty = "57";
				}elseif ($result['it58']==0) {
					$lootempty = "58";
				}elseif ($result['it59']==0) {
					$lootempty = "59";
				}elseif ($result['it60']==0) {
					$lootempty = "60";
				}elseif ($result['it61']==0) {
					$lootempty = "61";
				}elseif ($result['it62']==0) {
					$lootempty = "62";
				}elseif ($result['it63']==0) {
					$lootempty = "63";
				}elseif ($result['it64']==0) {
					$lootempty = "64";
				}elseif ($result['it65']==0) {
					$lootempty = "65";
				}elseif ($result['it66']==0) {
					$lootempty = "66";
				}elseif ($result['it67']==0) {
					$lootempty = "67";
				}elseif ($result['it68']==0) {
					$lootempty = "68";
				}elseif ($result['it69']==0) {
					$lootempty = "69";
				}elseif ($result['it70']==0) {
					$lootempty = "70";
				}elseif ($result['it71']==0) {
					$lootempty = "71";
				}elseif ($result['it72']==0) {
					$lootempty = "72";
				}elseif ($result['it73']==0) {
					$lootempty = "73";
				}elseif ($result['it74']==0) {
					$lootempty = "74";
				}elseif ($result['it75']==0) {
					$lootempty = "75";
				}elseif ($result['it76']==0) {
					$lootempty = "76";
				}elseif ($result['it77']==0) {
					$lootempty = "77";
				}elseif ($result['it78']==0) {
					$lootempty = "78";
				}elseif ($result['it79']==0) {
					$lootempty = "79";
				}
				$nowcountz = $count-1;
				$lootit = "it".strval($lootempty);
				$lootio = "io".strval($lootempty);
				$lootioo = "ioo".strval($lootempty);
				$setrc = $this->db2->prepare("	
					UPDATE store
					SET ".$lootit." = :itemid , ".$lootio." = :countnow , ".$lootioo." = -1
					WHERE user_id = :user_name 
					");
				$setrc->execute([
					':itemid'=>$item,
					':countnow'=>$nowcountz,
					':user_name'=>$this->user_name,
				]);
			}
		}
		public function changpassword($oldpassword,$password){
			$passold = $this->db->query("SELECT OLD_PASSWORD('".$oldpassword."')")->fetch();
			$oldpasswordhas = $passold["OLD_PASSWORD('".$oldpassword."')"];
			$passnew = $this->db->query("SELECT OLD_PASSWORD('".$password."')")->fetch();
			$passwordnewhas = $passnew["OLD_PASSWORD('".$password."')"];
			$check = str_split($_SESSION['user_name']);
			if ($check[0] == "a" || $check[0] == "A" || $check[0] == "b" || $check[0] == "B" || $check[0] == "c" || $check[0] == "C" || $check[0] == "d" || $check[0] == "D") {
				$indo = $this->db->query("SELECT * FROM idtable1 WHERE id = '".$_SESSION['user_name']."'")->fetch();
				if ($oldpasswordhas == $indo['passwd']) {
					$update = $this->db->prepare("UPDATE idtable1 SET passwd = :pass WHERE id = :user");
					$update->execute([':pass'=>$passwordnewhas,':user'=>$_SESSION['user_name']]);
					$message['status'] = "success";
					$message['info'] = "เปลื่ยนรหัสผ่านสำเร็จ";
				}else{
					$message['status'] = "error";
					$message['info'] = "รหัสผ่านเดิมไม่ถูกต้อง";
				}
			}elseif($check[0] == "e" || $check[0] == "E" || $check[0] == "f" || $check[0] == "F" || $check[0] == "g" || $check[0] == "G" || $check[0] == "h" || $check[0] == "H" || $check[0] == "i" || $check[0] == "I"){
				$indo = $this->db->query("SELECT * FROM idtable2 WHERE id = '".$_SESSION['user_name']."'")->fetch();
				if ($oldpasswordhas == $indo['passwd']) {
					$update = $this->db->prepare("UPDATE idtable2 SET passwd = :pass WHERE id = :user");
					$update->execute([':pass'=>$passwordnewhas,':user'=>$_SESSION['user_name']]);
					$message['status'] = "success";
					$message['info'] = "เปลื่ยนรหัสผ่านสำเร็จ";
				}else{
					$message['status'] = "error";
					$message['info'] = "รหัสผ่านเดิมไม่ถูกต้อง";
				}
			}elseif ($check[0] == "j" || $check[0] == "J" || $check[0] == "k" || $check[0] == "K" || $check[0] == "l" || $check[0] == "L" || $check[0] == "m" || $check[0] == "M" || $check[0] == "n" || $check[0] == "n") {
				$indo = $this->db->query("SELECT * FROM idtable3 WHERE id = '".$_SESSION['user_name']."'")->fetch();
				if ($oldpasswordhas == $indo['passwd']) {
					$update = $this->db->prepare("UPDATE idtable3 SET passwd = :pass WHERE id = :user");
					$update->execute([':pass'=>$passwordnewhas,':user'=>$_SESSION['user_name']]);
					$message['status'] = "success";
					$message['info'] = "เปลื่ยนรหัสผ่านสำเร็จ";
				}else{
					$message['status'] = "error";
					$message['info'] = "รหัสผ่านเดิมไม่ถูกต้อง";
				}
			}elseif ($check[0] == "o" || $check[0] == "O" || $check[0] == "p" || $check[0] == "P" || $check[0] == "q" || $check[0] == "Q" || $check[0] == "r" || $check[0] == "R" || $check[0] == "s" || $check[0] == "S") {
				$indo = $this->db->query("SELECT * FROM idtable4 WHERE id = '".$_SESSION['user_name']."'")->fetch();
				if ($oldpasswordhas == $indo['passwd']) {
					$update = $this->db->prepare("UPDATE idtable4 SET passwd = :pass WHERE id = :user");
					$update->execute([':pass'=>$passwordnewhas,':user'=>$_SESSION['user_name']]);
					$message['status'] = "success";
					$message['info'] = "เปลื่ยนรหัสผ่านสำเร็จ";
				}else{
					$message['status'] = "error";
					$message['info'] = "รหัสผ่านเดิมไม่ถูกต้อง";
				}
			}elseif ($check[0] == "t" || $check[0] == "T" || $check[0] == "u" || $check[0] == "U" || $check[0] == "v" || $check[0] == "V" || $check[0] == "w" || $check[0] == "W" || $check[0] == "x" || $check[0] == "X" || $check[0] == "y" || $check[0] == "Y" || $check[0] == "z" || $check[0] == "Z") {
				$indo = $this->db->query("SELECT * FROM idtable5 WHERE id = '".$_SESSION['user_name']."'")->fetch();
				if ($oldpasswordhas == $indo['passwd']) {
					$update = $this->db->prepare("UPDATE idtable5 SET passwd = :pass WHERE id = :user");
					$update->execute([':pass'=>$passwordnewhas,':user'=>$_SESSION['user_name']]);
					$message['status'] = "success";
					$message['info'] = "เปลื่ยนรหัสผ่านสำเร็จ";
				}else{
					$message['status'] = "error";
					$message['info'] = "รหัสผ่านเดิมไม่ถูกต้อง";
				}
			}else{
				$indo = $this->db->query("SELECT * FROM idtable1 WHERE id = '".$_SESSION['user_name']."'")->fetch();
				if ($oldpasswordhas == $indo['passwd']) {
					$update = $this->db->prepare("UPDATE idtable1 SET passwd = :pass WHERE id = :user");
					$update->execute([':pass'=>$passwordnewhas,':user'=>$_SESSION['user_name']]);
					$message['status'] = "success";
					$message['info'] = "เปลื่ยนรหัสผ่านสำเร็จ";
				}else{
					$message['status'] = "error";
					$message['info'] = "รหัสผ่านเดิมไม่ถูกต้อง";
				}
			}
			return $message;
		}
		public function addpromotion_item($num) {
			/*
				50 - 89  จะได้ โปร 50
				90 - 149 จะได้โปร 90
				150 - 299 จะได้โปร 150
				300 - 499 จะได้โปร 300
				500 - 999 จะได้โปร 500
				1000 ก็จะได้โปร 1000
				2000 ก็จะได้โปร 1000 2 รอบ
			*/
			$pro50 = array(8072 => 1, 8071 => 1, 8057 => 1, 8058 => 1);
			$pro90 = array(8072 => 3, 8071 => 3, 8057 => 2, 8058 => 2);
			$pro150 = array(8021 => 1, 8018 => 1, 8057 => 3, 8036 => 50, 8058 => 3);
			$pro300 = array(8021 => 2, 8018 => 2, 8037 => 1, 8062 => 1,  8029 => 50,  8036 => 50, 8008 => 10);
			$pro500 = array(8021 => 3, 8018 => 3, 8037 => 1, 8062 => 1, 8008 => 20, 8029 => 50, 8036 => 50, 8011 => 5);
			$pro1000 = array(8021 => 5, 8018 => 5, 8037 => 2, 8062 => 2, 8008 => 30, 8011 => 10, 8100 => 5, 8029 => 50, 8036 => 50, 8046 => 1, 8046 => 1);
			if($num >= 50 && $num < 90) {
				foreach($pro50 as $item => $qty) {
					$query = $this->db3->query("INSERT INTO seal_item (ItemType, ItemOp1, OwnerID, bxaid) VALUES ($item, $qty-1, '".$_SESSION['user_name']."', 'BUY')");
				}
			} elseif($num >= 90 && $num < 150 ) {
				foreach($pro90 as $item => $qty) {
					$query = $this->db3->query("INSERT INTO seal_item (ItemType, ItemOp1, OwnerID, bxaid) VALUES ($item, $qty-1, '".$_SESSION['user_name']."', 'BUY')");
				}
			} elseif($num >= 150 && $num < 300) {
				foreach($pro150 as $item => $qty) {
					$query = $this->db3->query("INSERT INTO seal_item (ItemType, ItemOp1, OwnerID, bxaid) VALUES ($item, $qty-1, '".$_SESSION['user_name']."', 'BUY')");
				}
			} elseif($num >= 300 && $num < 500) {
				foreach($pro300 as $item => $qty) {
					$query = $this->db3->query("INSERT INTO seal_item (ItemType, ItemOp1, OwnerID, bxaid) VALUES ($item, $qty-1, '".$_SESSION['user_name']."', 'BUY')");
				}
			} elseif($num >= 500 && $num < 1000) {
				foreach($pro500 as $item => $qty) {
					$query = $this->db3->query("INSERT INTO seal_item (ItemType, ItemOp1, OwnerID, bxaid) VALUES ($item, $qty-1, '".$_SESSION['user_name']."', 'BUY')");
				}
			} elseif($num >= 1000) {
				foreach($pro1000 as $item => $qty) {
					$check = intval($num/1000);
					$exqty = ($qty - 0) * intval($num/1000);
					$query = $this->db3->query("INSERT INTO seal_item (ItemType, ItemOp1, OwnerID, bxaid) VALUES ($item, $exqty, '".$_SESSION['user_name']."', 'BUY')");
				}
			}
		}
		public function getcanreward(){
			$check = str_split($this->user_name);
			$checklog = $this->db->query("SELECT reward FROM logreward WHERE user = '".$_SESSION['user_name']."' AND reward = 1")->rowCount();
			$checklog2 = $this->db->query("SELECT reward FROM logreward WHERE user = '".$_SESSION['user_name']."' AND reward = 2")->rowCount();
			$checklog3 = $this->db->query("SELECT reward FROM logreward WHERE user = '".$_SESSION['user_name']."' AND reward = 3")->rowCount();
			$checklog4 = $this->db->query("SELECT reward FROM logreward WHERE user = '".$_SESSION['user_name']."' AND reward = 4")->rowCount();
			$checklog5 = $this->db->query("SELECT reward FROM logreward WHERE user = '".$_SESSION['user_name']."' AND reward = 5")->rowCount();
			$checklog6 = $this->db->query("SELECT reward FROM logreward WHERE user = '".$_SESSION['user_name']."' AND reward = 6")->rowCount();
			$checklog7 = $this->db->query("SELECT reward FROM logreward WHERE user = '".$_SESSION['user_name']."' AND reward = 7")->rowCount();
			$checklog8 = $this->db->query("SELECT reward FROM logreward WHERE user = '".$_SESSION['user_name']."' AND reward = 8")->rowCount();
			$checklog9 = $this->db->query("SELECT reward FROM logreward WHERE user = '".$_SESSION['user_name']."' AND reward = 9")->rowCount();
		
			if ($check[0] == "a" || $check[0] == "A" || $check[0] == "b" || $check[0] == "B" || $check[0] == "c" || $check[0] == "C" || $check[0] == "d" || $check[0] == "D") {
				$logtop = $this->db->query("SELECT id, logtopup FROM idtable1 WHERE id = '".$_SESSION['user_name']."'");
			}elseif($check[0] == "e" || $check[0] == "E" || $check[0] == "f" || $check[0] == "F" || $check[0] == "g" || $check[0] == "G" || $check[0] == "h" || $check[0] == "H" || $check[0] == "i" || $check[0] == "I"){
				$logtop = $this->db->query("SELECT id, logtopup FROM idtable2 WHERE id = '".$_SESSION['user_name']."'");
			}elseif ($check[0] == "j" || $check[0] == "J" || $check[0] == "k" || $check[0] == "K" || $check[0] == "l" || $check[0] == "L" || $check[0] == "m" || $check[0] == "M" || $check[0] == "n" || $check[0] == "n") {
				$logtop = $this->db->query("SELECT id, logtopup FROM idtable3 WHERE id = '".$_SESSION['user_name']."'");
			}elseif ($check[0] == "o" || $check[0] == "O" || $check[0] == "p" || $check[0] == "P" || $check[0] == "q" || $check[0] == "Q" || $check[0] == "r" || $check[0] == "R" || $check[0] == "s" || $check[0] == "S") {
				$logtop = $this->db->query("SELECT id, logtopup FROM idtable4 WHERE id = '".$_SESSION['user_name']."'");
			}elseif ($check[0] == "t" || $check[0] == "T" || $check[0] == "u" || $check[0] == "U" || $check[0] == "v" || $check[0] == "V" || $check[0] == "w" || $check[0] == "W" || $check[0] == "x" || $check[0] == "X" || $check[0] == "y" || $check[0] == "Y" || $check[0] == "z" || $check[0] == "Z") {
				$logtop = $this->db->query("SELECT id, logtopup FROM idtable5 WHERE id = '".$_SESSION['user_name']."'");
			}else{
				$logtop = $this->db->query("SELECT id, logtopup FROM idtable1 WHERE id = '".$_SESSION['user_name']."'");
			}
			$str = "";
			$str .= "<option value='1'>เติมสะสม 2,000 </option>";
			$str .= "<option value='2'>เติมสะสม 3,000 </option>";
			$str .= "<option value='4'>เติมสะสม 5,000 </option>";
			$str .= "<option value='6'>เติมสะสม 7,000 </option>";
			$str .= "<option value='8'>เติมสะสม 9,000 </option>";
			$str .= "<option value='9'>เติมสะสม 10,000 </option>";
			echo $str;
		}
		public function topup_reward($id) {
			$pro2000 = array(8011 => 10, 8100 => 10, 11573 => 2, 11572 => 2);
			$pro3000 = array(8011 => 10, 8100 => 10, 11573 => 3, 11572 => 3, 8046 => 1,8046 => 1, 8046 => 1);
			$pro4000 = array();
			$pro5000 = array(13374 => 1, 11573 => 5, 11572 => 5, 8046 => 1, 8046 => 1, 8046 => 1, 7899 => 1, 8059 => 10, 12790 => 10);
			$pro6000 = array();
			$pro7000 = array(14776 => 1, 7899 => 1, 8059 => 10, 12790 => 10);
			$pro8000 = array();
			$pro9000 = array(8591 => 1);
			$pro10000 = array(13566 => 1, 13567 => 1, 13568 => 1, 13569 => 1);
			$check_topup = $this->db->prepare("SELECT reward FROM logreward WHERE user = '".$_SESSION['user_name']."' AND reward = :id");
			$check_topup->execute([':id'=>$id]);
			$check_topup_row = $check_topup->rowCount();
			$reward_point = $this->userinfo()['logtopup'];
			if($check_topup_row == 0) {
				if($id == 1 && $reward_point >= 2000) {
					foreach($pro2000 as $item => $qty) {
						$query = $this->db3->query("INSERT INTO seal_item (ItemType, ItemOp1, OwnerID, bxaid) VALUES ($item, $qty-1, '".$_SESSION['user_name']."', 'BUY')");
					}
					$addlog = $this->db->query("INSERT INTO logreward (user, reward) VALUES ('".$_SESSION['user_name']."', $id)");
					$message['status'] = "success";
					$message['info'] = "สำเร็จแล้ว!";
				} elseif($id == 2 && $reward_point >= 3000) {
					foreach($pro3000 as $item => $qty) {
						$query = $this->db3->query("INSERT INTO seal_item (ItemType, ItemOp1, OwnerID, bxaid) VALUES ($item, $qty-1, '".$_SESSION['user_name']."', 'BUY')");
					}
					$addlog = $this->db->query("INSERT INTO logreward (user, reward) VALUES ('".$_SESSION['user_name']."', $id)");
					$message['status'] = "success";
					$message['info'] = "สำเร็จแล้ว!";
				} elseif($id == 3 && $reward_point >= 4000) {
					foreach($pro4000 as $item => $qty) {
						$query = $this->db3->query("INSERT INTO seal_item (ItemType, ItemOp1, OwnerID, bxaid) VALUES ($item, $qty-1, '".$_SESSION['user_name']."', 'BUY')");
					}
					$addlog = $this->db->query("INSERT INTO logreward (user, reward) VALUES ('".$_SESSION['user_name']."', $id)");
					$message['status'] = "success";
					$message['info'] = "สำเร็จแล้ว!";
				} elseif($id == 4 && $reward_point >= 5000) {
					foreach($pro5000 as $item => $qty) {
						$query = $this->db3->query("INSERT INTO seal_item (ItemType, ItemOp1, OwnerID, bxaid) VALUES ($item, $qty-1, '".$_SESSION['user_name']."', 'BUY')");
					}
					$addlog = $this->db->query("INSERT INTO logreward (user, reward) VALUES ('".$_SESSION['user_name']."', $id)");
					$message['status'] = "success";
					$message['info'] = "สำเร็จแล้ว!";
				} elseif($id == 5 && $reward_point >= 6000) {
					foreach($pro6000 as $item => $qty) {
						$query = $this->db3->query("INSERT INTO seal_item (ItemType, ItemOp1, OwnerID, bxaid) VALUES ($item, $qty-1, '".$_SESSION['user_name']."', 'BUY')");
					}
					$addlog = $this->db->query("INSERT INTO logreward (user, reward) VALUES ('".$_SESSION['user_name']."', $id)");
					$message['status'] = "success";
					$message['info'] = "สำเร็จแล้ว!";
				} elseif($id == 6 && $reward_point >= 7000) {
					foreach($pro7000 as $item => $qty) {
						$query = $this->db3->query("INSERT INTO seal_item (ItemType, ItemOp1, OwnerID, bxaid) VALUES ($item, $qty-1, '".$_SESSION['user_name']."', 'BUY')");
					}
					$addlog = $this->db->query("INSERT INTO logreward (user, reward) VALUES ('".$_SESSION['user_name']."', $id)");
					$message['status'] = "success";
					$message['info'] = "สำเร็จแล้ว!";
				} elseif($id == 7 && $reward_point >= 8000) {
					foreach($pro8000 as $item => $qty) {
						$query = $this->db3->query("INSERT INTO seal_item (ItemType, ItemOp1, OwnerID, bxaid) VALUES ($item, $qty-1, '".$_SESSION['user_name']."', 'BUY')");
					}
					$addlog = $this->db->query("INSERT INTO logreward (user, reward) VALUES ('".$_SESSION['user_name']."', $id)");
					$message['status'] = "success";
					$message['info'] = "สำเร็จแล้ว!";
				} elseif($id == 8 && $reward_point >= 9000) {
					//$this->addtoinventory(563, 1);
					foreach($pro9000 as $item => $qty) {
						$query = $this->db3->query("INSERT INTO seal_item (ItemType, ItemOp1, OwnerID, bxaid) VALUES ($item, $qty-1, '".$_SESSION['user_name']."', 'BUY')");
					}
					$addlog = $this->db->query("INSERT INTO logreward (user, reward) VALUES ('".$_SESSION['user_name']."', $id)");
					$message['status'] = "success";
					$message['info'] = "สำเร็จแล้ว!";
				} elseif($id == 9 && $reward_point >= 10000) {
					//$this->addtoinventory(583, 1, 21474836472);
					foreach($pro10000 as $item => $qty) {
						$query = $this->db3->query("INSERT INTO seal_item (ItemType, ItemOp1, OwnerID, bxaid) VALUES ($item, $qty-1, '".$_SESSION['user_name']."', 'BUY')");
					}
					$addlog = $this->db->query("INSERT INTO logreward (user, reward) VALUES ('".$_SESSION['user_name']."', $id)");
					$message['status'] = "success";
					$message['info'] = "สำเร็จแล้ว!";
				} else {
					$message['status'] = "error";
					$message['info'] = "ยอดเติมเงินสะสมไม่เพียงพอ...ไม่สามารถรับไอเทมได้!";
				}
			} else {
				$message['status'] = "error";
				$message['info'] = "คุณเคยรับไปแล้ว" . $check_topup_row;
			}
			return $message;
		}
		private function addpoints($txid, $amount, $time, $type) {
			$point = $amount * $this->exchange;
			$user = $this->user_name;
			$check = str_split($user);
			if ($check[0] == "a" || $check[0] == "A" || $check[0] == "b" || $check[0] == "B" || $check[0] == "c" || $check[0] == "C" || $check[0] == "d" || $check[0] == "D") {
				$table = 'idtable1';
			} elseif($check[0] == "e" || $check[0] == "E" || $check[0] == "f" || $check[0] == "F" || $check[0] == "g" || $check[0] == "G" || $check[0] == "h" || $check[0] == "H" || $check[0] == "i" || $check[0] == "I") {
				$table = 'idtable2';
			} elseif($check[0] == "j" || $check[0] == "J" || $check[0] == "k" || $check[0] == "K" || $check[0] == "l" || $check[0] == "L" || $check[0] == "m" || $check[0] == "M" || $check[0] == "n" || $check[0] == "n") {
				$table = 'idtable3';
			} elseif($check[0] == "o" || $check[0] == "O" || $check[0] == "p" || $check[0] == "P" || $check[0] == "q" || $check[0] == "Q" || $check[0] == "r" || $check[0] == "R" || $check[0] == "s" || $check[0] == "S") {
				$table = 'idtable4';
			} elseif($check[0] == "t" || $check[0] == "T" || $check[0] == "u" || $check[0] == "U" || $check[0] == "v" || $check[0] == "V" || $check[0] == "w" || $check[0] == "W" || $check[0] == "x" || $check[0] == "X" || $check[0] == "y" || $check[0] == "Y" || $check[0] == "z" || $check[0] == "Z") {
				$table = 'idtable5';
			} else {
				$table = 'idtable1';
			}
			$this->db->query("INSERT INTO logtopup (transaction, user, amount, point, time, type) VALUES('{$txid}', '{$user}', {$amount}, {$point}, now(), '{$type}')");
			$this->db->query("UPDATE {$table} SET point = point + {$point}, logtopup = logtopup + {$amount} WHERE id = '{$user}'");
		}
		private function tmtopupconnect($transactionid, $session='') {
			$url_api="http://tmwallet.thaighost.net/apiwallet.php";
			$urlconnect = $url_api."?username=".$this->apuser."&password=".$this->appass."&action=yes&tmemail=".$this->twuser."&truepassword=".$this->twpass."&session=".$session."&transactionid=".$transactionid."&clientip=".$_SERVER['REMOTE_ADDR']."&ref1=".$this->user_name."&json=1";
			$ch = curl_init($urlconnect);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
			curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; th; rv:1.9.2.12) Gecko/20101026 Firefox/3.6.12");
			curl_setopt($ch, CURLOPT_HEADER, 0);
			@curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			$callback = curl_exec($ch);
			curl_close($ch);
			return $callback;
		}
		private function tmtopup_Bank_connect($transactionid, $session='') 
		{
			$url_api = "http://tmwallet.thaighost.net/apiwallet.php";
			$urlconnect = $url_api."?username=".$this->apuser."&password=".$this->appass."&action=yes&tmemail=".$this->twuser."&truepassword=tmpwoktXABBQMDi..&session=$session&transactionid=$transactionid&clientip=".$_SERVER['REMOTE_ADDR']."&ref1=".$this->user_name."&json=1&ac_code=".$this->ac_code;
			$ch = curl_init($urlconnect);
			//curl_setopt($ch, CURLOPT_SSLVERSION,3);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
			curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; th; rv:1.9.2.12) Gecko/20101026 Firefox/3.6.12");
			curl_setopt($ch, CURLOPT_HEADER, 0);
			@curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			$callback = curl_exec($ch);
			curl_close($ch);
			return $callback;
		}
		public function topup_bank($post) 
		{
			$amount = $post['amount'];
			$amount2 = $post['amount2'];
			if($amount2 == "")
				$amount2 = "00";
			else if(strlen($amount) == 1)
				$amount2 = "0".$amount2;
			$day = $post['day'];
			$hour = $post['h'];
			$minute = $post['m'];
			$transactionid = $this->con_id.$day.$hour.$minute.$amount.$amount2;
			$result = $this->tmtopup_Bank_connect($transactionid);
			$result = json_decode($result, true);
			if($result["Status"] === "check_success") {
				$amount = $result["Amount"];
				$this->addpoints($transactionid, $amount, $result['date_time'], 'Bank');
				$this->addpromotion_item($amount);
				$message['status'] = "success";
				$message['info'] = "เติมเงินจำนวน {$amount} บาท สำเร็จแล้ว!";
			} else {
				$message['status'] = "error";
				$message['info'] = $result['Msg'];
			}
			return $message;
		}
		public function topup($transaction) {
			$result = json_decode($this->tmtopupconnect($transaction) , true);
			if($result["Status"] === "check_success") {
				$amount = $result["Amount"];
				$this->addpoints($result['txid'], $amount, $result['date_time'], 'Wallet');
				$this->addpromotion_item($amount);
				$message['status'] = "success";
				$message['info'] = "เติมเงินจำนวน {$amount} บาท สำเร็จแล้ว!";
			} else {
				$message['status'] = "error";
				$message['info'] = $result['Msg'];
			}
			return $message;
		}
		public function ctopup($transaction){
			$result=$this->tmtopupconnect('@'.$transaction);
			$result=json_decode($result,true);
			/*$sql_check_reportid = $this->db2->prepare("SELECT * FROM logtopup WHERE transaction = :ref");
			$sql_check_reportid->execute([':ref'=>$result['txid']]);
			$sql_check_reportid_row = $sql_check_reportid->rowCount();
			if($sql_check_reportid_row > 0){
				$message['status'] = "error";
				$message['info'] = "บัตรนี้ถูกใช้งานแล้ว";
			} else {*/
				if ($result["Status"] === "check_success"){
					$amount = $result["Amount"];
					$this->addpoints($result['txid'], $amount, $result['date_time'], 'TMNCard');
					$this->addpromotion_item($amount);
					$message['status'] = "success";
					$message['info'] = "เติมเงินจำนวน {$amount} บาท สำเร็จแล้ว!";
				} else {
					$message['status'] = "error";
					$message['info'] = $result['Msg'];
				}
			//}
			return $message;
		}
		public function countusernow(){
			$stmt = $this->db2->query("SELECT * FROM pc");
			$i = 0;
			while($rows = $stmt->fetch())
			{
				if($rows['play_flag'] != 0) {
					$i++;
				}
			}
			return $i;
		}
		public function countcharall(){
			$stmt = $this->db2->query("SELECT count(play_flag) as total FROM pc");
			return $stmt->fetch()['total'];
		}
		public function countuserall(){
			$stmt = $this->db->query("SELECT count(*) as total FROM idtable1");
			$Count = $stmt->fetch()['total'];
			$stmt = $this->db->query("SELECT count(*) as total FROM idtable2");
			$Count += $stmt->fetch()['total'];
			$stmt = $this->db->query("SELECT count(*) as total FROM idtable3");
			$Count += $stmt->fetch()['total'];
			$stmt = $this->db->query("SELECT count(*) as total FROM idtable4");
			$Count += $stmt->fetch()['total'];
			$stmt = $this->db->query("SELECT count(*) as total FROM idtable5");
			$Count += $stmt->fetch()['total'];
			return $Count;
		}
		public function kickplayer($charid) {
			if($_SESSION['user_name']) {
				$query = $this->db2->query("UPDATE pc SET play_flag = 0 WHERE char_id = '".$charid."'");
				$message['status'] = "success";
				$message['info'] = "เตะเรียบร้อย";
			}
			return $message;
		}
		public function getchar_list(){
			$stmt = $this->db2->query("SELECT char_id, char_name FROM pc WHERE user_id = '".$_SESSION['user_name']."'");
			while($rows = $stmt->fetch()){
				echo "<option value='".$rows['char_id']."'>".$rows['char_name']."</option>";
			}
		}
	}
?>