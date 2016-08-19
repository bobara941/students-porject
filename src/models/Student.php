<?php

//require_once '../system/DB.php';

class Student {

	private $dbc;

	public function __construct($db) {
		$this->dbc = $db;
	}

	private function validateStudent($firstName, $lastName, $fakNom, $specialty, $course, $group) {
		try {
			if (empty($firstName)) {
				throw new Exception('Моля въведете Име.');
			}
			if (empty($lastName)) {
				throw new Exception('Моля въведете Фамилия.');
			}
			if (empty($fakNom)) {
				throw new Exception('Моля въведете Факултетен номер.');
			}
			if (strlen($fakNom) > 6 || strlen($fakNom) < 6) {
				throw new Exception('Факултетния номер трябва да бъде дълъг 6 цифри');
			}
			if (empty($specialty)) {
				throw new Exception('Моля въведете Специалност.');
			}
			if(empty($course)) {
				throw new Exception('Моля въведете Курс.');
			}
			if(empty($group)) {
				throw new Exception('Моля въведете Група.');
			}

			return [
				'code' => 'ok',
				'message' => 'success'
			];
		}
		catch(Exception $e) {
			return [
				'code' => 'error',
				'message' => $e->getMessage()
			];
		}
	}

	public function addStudent() {

		// Getting user input
		$firstName = trim($_POST['ime']);
		$lastName = trim($_POST['fam']);
		$fakNom = trim(intval($_POST['fn']));
		$specialty = trim($_POST['spec']);
		$course = trim(intval($_POST['kurs']));
		$group = trim($_POST['grupa']);

		// Validating user input
		$result = $this->validateStudent($firstName, $lastName, $fakNom, $specialty, $course, $group);

		if ($result['code'] == 'ok') {
			$this->dbc->query("INSERT INTO students (fak_nom, ime, fam, spec, course, grupa) VALUES(:fn, :first, :last, :sp, :cr, :gr)");
			$this->dbc->bind(':fn', $fakNom);
			$this->dbc->bind(':first', $firstName);
			$this->dbc->bind(':last', $lastName);
			$this->dbc->bind(':sp', $specialty);
			$this->dbc->bind(':cr', $course);
			$this->dbc->bind(':gr', $group);
			$this->dbc->execute();
		}

		return $result;
	}

	public function deleteStudent() {

		// Getting user input TODO
		$id = $_GET['id'];

		$this->dbc->query("DELETE FROM students WHERE fak_nom=:delId");
		$this->dbc->bind(':delId', $id);
		$this->dbc->execute();
	}

	public function updateStudent() {
		// Getting user input
		$id = $_GET['id'];
		$firstName = trim($_POST['ime']);
		$lastName = trim($_POST['fam']);
		$fakNom = trim(intval($_POST['fn']));
		$specialty = trim($_POST['spec']);
		$course = trim(intval($_POST['kurs']));
		$group = trim($_POST['grupa']);

		// Validating user input
		$result = $this->validateStudent($firstName, $lastName, $fakNom, $specialty, $course, $group);

		if ($result['code'] == 'ok') {
			$this->dbc->query("UPDATE students SET fak_nom=:fn, ime=:first, fam=:last, spec=:sp, course=:cr, grupa=:gr WHERE fak_nom='$id'");
			$this->dbc->bind(':fn', $fakNom);
			$this->dbc->bind(':first', $firstName);
			$this->dbc->bind(':last', $lastName);
			$this->dbc->bind(':sp', $specialty);
			$this->dbc->bind(':cr', $course);
			$this->dbc->bind(':gr', $group);
			$this->dbc->execute();
		}

		return $result;
	}

	public function getStudent() {

		// Getting from user input
		$stdId = $_GET['id'];

		$this->dbc->query("SELECT * FROM students WHERE fak_nom=:fn");
		$this->dbc->bind(':fn', $stdId);
		$this->dbc->execute();
		$row = $this->dbc->fetchRow();
		return $row;
	}

	// TODO PREPARE THE STATEMENT LATER
	public function orderStudents($sort, $sort_order) {
		$this->dbc->query("SELECT * FROM students ORDER BY $sort $sort_order");
		/*$this->dbc->bind(':sort', $sort);
		$this->dbc->bind(':sort_order', $sort_order);*/
		$this->dbc->execute();
		$row = $this->dbc->resultset();
		return $row;
	}

	public function getAllStudents() {
		$this->dbc->query("SELECT * FROM students");
		$this->dbc->execute();
		$row = $this->dbc->resultset();
		return $row;
	}

}

