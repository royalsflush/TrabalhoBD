<?php
require_once 'SqlBD.php';


class UserMngt {


	private $id = NULL;
	private $login = "";
	private $password = "";
	private $level = NULL;
	private $lastLogin = NULL;

	public function __construct ($id = NULL, $login = NULL) {
		if (!is_null($id) && is_null($login)) {
			$this->read ($id);
		} else {
			$this->id = $id;
			$this->nome = $login;
		}
	}

	private function read ($id) {

		global $sqlbd;

		// Procura o usuario.
		$query = "select userId, login, password, leve, lastLogin from Login where userId = " . $id;

		$user = $sqlbd->execQuery ($query);
		if (!$sqlbd->numRows ($user)) {
			throw new Exception ("User not found");
		}
		$this->clear();
		$row = $sqlbd->fetchAssoc($user);
		$this->id = $row["userId"];
		$this->login = $row["login"];
		$this->password = $row["password"];
		$this->level = $row["level"];
		$this->lastLogin = $row["lastLogin"];
	}


	private function clear () {
		$this->id = NULL;
		$this->login = "";
		$this->password = "";
		$this->level = NULL;
		$this->lastLogin = NULL;
	}

	public function insert () {
		global $sqlbd;
		$sqlbd->transaction();
		try {
			$cmd = "insert into Login (userId, login, password, level, lastLogin) values 
			(" . $this->id . " , 
			'" . $this->login . "' , 
			" . md5($this->password) . " , 
			" . $this->level . " , 
			" . $this->lastLogin . "); "
			
			$sqlbd->execSQLCmd ($cmd);
			$this->id = $sqlbd->lastId();

			$sqlbd->commit();
		} catch (Exception $e) {
			$sqlbd->rollback();
			throw $e;
		}
	}

	public function update () {
		global $sqlbd;

		$sqlbd->transaction();


			// altera o funcionario
			$query = "update Login set
 					userId=". $this->id. ",
 					login=" . $this->login . ",
  					password=" . md5($this->password) . ",
 					level=" . $this->level ",
 					lastLogin=" . $this->lastLogin . ",				
					where userId =" . $this->id; 		
			
			$sqlbd->execSQLCmd($query);
			
			$sqlbd->commit();
		} catch (Exception $e) {
			$sqlbd->rollback();
			throw $e;
		}
	}

	public function delete () {
		global $sqlbd;

		$sqlbd->transaction();
		try {

			$query = "delete from Login where userId =". $this->id; 
			$sqlbd->execSQLCmd($query);

			$sqlbd->commit();
		} catch (Exception $e) {
			$sqlbd->rollback();
			throw $e;
		}
	}

	public function getId () {
		return $this->id;
	}

	public function setId ($id) {
		$this->id = $id;
	}
	
	public function getLogin () {
		return $this->Login;
	}

	public function setLogin ($login) {
		$this->login = $login;
	}
		
	public function getLevel () {
		return $this->level;
	}

	public function setLevel ($level) {
		$this->level = $level;
	}

	// Como armazenar as senhas?!
	public function setPassword ($password) {
		$this->password = md5($password);
	}

}

?>