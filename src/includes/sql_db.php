<?php

class SqlBD {
	private $numTransactions = 0;

	// Link com o banco de dados.
	private $con = NULL;

	private function formataErroSQL () {
		return "Erro #" . mysql_errno($this->con) . ": " . mysql_error($this->con);
	}

	function connect() {

		$this->con = mysql_connect('localhost', 'patomei_notroot', 'coisa123coisa');

		if (!$this->con) {
			// nao pode usar o metodo formataErroSQL porque $this->con nao eh valido!
			throw new SqlBDException ("Erro #" . mysql_errno() . ":" . mysql_error(), mysql_errno());
		}

		mysql_select_db('patomei_trabbd', $this->con);
	}

	function execQuery($query) {
		$ret = mysql_query($query, $this->con);
		if (mysql_errno($this->con) != 0) {
			$msg = $this->formataErroSQL();
			$msg .= (1)? "<br>Query: " . $query : "";
			throw new SqlBDException ($msg, mysql_errno());
		}
		return $ret;
	}

	function execSQLCmd($cmd) {
		$this->execQuery($cmd);
	}

	function fetchAssoc($result) {
		return mysql_fetch_assoc($result);
	}
	
	function fetchArray($result) {
		return mysql_fetch_array($result);
	}

	function lastId() {
		return mysql_insert_id($this->con);
	}

	function numRows($result) {
		return mysql_num_rows($result);
	}

	function affectedRows() {
		return mysql_affected_rows($this->con);
	}
	
	function transaction () {
		if (!$this->numTransactions) {
			$this->execSQLCmd("start transaction");
		} else {
			$this->execSQLCmd("savepoint trans" . (string) $this->numTransactions);
		}
		$this->numTransactions++;
	}

	function commit () {
		if ($this->numTransactions > 0) {
			$this->numTransactions--;
			if (!$this->numTransactions) {
				$this->execSQLCmd("commit");
			} else {
				$this->execSQLCmd("release savepoint trans" . (string) ($this->numTransactions));
			}
		}
	}

	function rollback () {
		if ($this->numTransactions > 0) {
			$this->numTransactions--;
			if (!$this->numTransactions) {
				$this->execSQLCmd("rollback");
			} else {
				$this->execSQLCmd("rollback to savepoint trans" . (string) ($this->numTransactions));
			}
		}
	}
}

/**
 * O objetivo desta classe eh apenas permitir a diferenciacao (e o tratamento independente) de erros vindos do banco de dados.
 */
class SqlBDException extends Exception {

}


?>