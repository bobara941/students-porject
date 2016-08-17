<?php
	

class DB {

	private $dbh;
	private $error;
	private $stmt;

	public function __construct() {
			try {
				$this->dbh = new PDO('mysql:host=localhost;dbname=first_project', 'root', 'qwerty123');
				$this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->dbh->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
			}
			catch (PDOException $e) {
				$this->error = $e->getMessage();
				echo $this->error;
			}
		}

	// Query function
	public function query($query) {
		$this->stmt = $this->dbh->prepare($query);
	}

	// Bind function
	public function bind($param, $value, $type = null) {
		if (is_null($type)) {
			switch (true) {
				case is_int($value):
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;
				default:
					$type = PDO::PARAM_STR;
			}
			$this->stmt->bindValue($param, $value, $type);
		}
	}


	public function execute() {
		return $this->stmt->execute();
	}

	public function resultset() {
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getDatabaseConnection() {
		return $this->dbh;
	}
 
	public function fetchAllNum() {
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_NUM);
	}

}