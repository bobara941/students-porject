<?php

//require_once '../system/DB.php';

class Student {

	private $dbc;

	public function __construct($db) {
		$this->dbc = $db;
	}

	public function addStudent($fn, $first, $last, $sp, $cr, $gr) {
		$this->dbc->query("INSERT INTO students (fak_nom, ime, fam, spec, course, grupa) VALUES(':fn', ':first', ':last', ':sp', ':cr', ':gr')");
		$this->dbc->bind(':fn', $fn);
		$this->dbc->bind(':first', $first);
		$this->dbc->bind(':last', $last);
		$this->dbc->bind(':sp', $sp);
		$this->dbc->bind(':cr', $cr);
		$this->dbc->bind(':gr', $gr);
		$this->dbc->execute();
	}

	public function deleteStudent($delName) {
		$this->dbc->query("DELETE FROM students WHERE ime=:delnm");
		$this->dbc->bind(':delnm', $delName);
		$this->dbc->execute();
	}

	public function getAllStudents() {
		$this->dbc->query("SELECT * FROM students");
		$this->dbc->execute();
		$row = $this->dbc->resultset();
		return $row;
	}

}