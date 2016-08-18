<?php

//require_once '../system/DB.php';

class Student {

	private $dbc;

	public function __construct($db) {
		$this->dbc = $db;
	}

	public function addStudent($fak_nom, $ime, $fam, $spec, $course, $grupa) {
		$this->dbc->query("INSERT INTO students (fak_nom, ime, fam, spec, course, grupa) VALUES(:fn, :first, :last, :sp, :cr, :gr)");
		$this->dbc->bind(':fn', $fak_nom);
		$this->dbc->bind(':first', $ime);
		$this->dbc->bind(':last', $fam);
		$this->dbc->bind(':sp', $spec);
		$this->dbc->bind(':cr', $course);
		$this->dbc->bind(':gr', $grupa);
		$this->dbc->execute();

	}

	public function deleteStudent($delId) {
		$this->dbc->query("DELETE FROM students WHERE fak_nom=:delId");
		$this->dbc->bind(':delId', $delId);
		$this->dbc->execute();
	}

	//TODO WHERE fak_nom
	public function updateStudent($fak_nom, $ime, $fam, $spec, $course, $grupa, $id) {
		$this->dbc->query("UPDATE students SET fak_nom=:fn, ime=:first, fam=:last, spec=:sp, course=:cr, grupa=:gr WHERE fak_nom='$id'");
		$this->dbc->bind(':fn', $fak_nom);
		$this->dbc->bind(':first', $ime);
		$this->dbc->bind(':last', $fam);
		$this->dbc->bind(':sp', $spec);
		$this->dbc->bind(':cr', $course);
		$this->dbc->bind(':gr', $grupa);
		$this->dbc->execute();

	}

	public function getAllStudents() {
		$this->dbc->query("SELECT * FROM students");
		$this->dbc->execute();
		$row = $this->dbc->resultset();
		return $row;
	}

}