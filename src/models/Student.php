<?php

class Student {

	private $dbc;

	public function __construct($db)
	{
		$this->dbc = $db;
	}

	private function validateStudent($firstName, $lastName, $fakNom, $specialty, $course, $group)
	{
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

	private function getUserInput()
	{
		$id = $_GET['id'];
		$firstName = trim($_POST['ime']);
		$lastName = trim($_POST['fam']);
		$fakNom = trim(intval($_POST['fn']));
		$specialty = trim($_POST['spec']);
		$course = trim(intval($_POST['kurs']));
		$group = trim(intval($_POST['grupa']));
		// Assigning user input into associative array
		$studData = array(
			'id' => $id,
			'firstName' => $firstName,
			'lastName' => $lastName,
			'fakNom' => $fakNom,
			'specialty' => $specialty,
			'course' => $course,
			'group' => $group
		);
		return $studData;
	}

	public function addStudent()
	{
		// Getting the user input
		$studData = $this->getUserInput();

		// Validating user input
		$result = $this->validateStudent($studData['firstName'], $studData['lastName'], $studData['fakNom'], $studData['specialty'], $studData['course'], $studData['group']);

		if ($result['code'] == 'ok') {
			$this->dbc->preparedQuery("INSERT INTO students (fak_nom, ime, fam, spec, course, grupa) VALUES(:fn, :first, :last, :sp, :cr, :gr)");
			$this->dbc->bind(':fn', $studData['fakNom']);
			$this->dbc->bind(':first', $studData['firstName']);
			$this->dbc->bind(':last', $studData['lastName']);
			$this->dbc->bind(':sp', $studData['specialty']);
			$this->dbc->bind(':cr', $studData['course']);
			$this->dbc->bind(':gr', $studData['group']);
			$this->dbc->execute();
		}

		return $result;
	}

	public function deleteStudent()
	{

		// Getting student ID
		$studData = $this->getUserInput();

		$this->dbc->preparedQuery("DELETE FROM students WHERE fak_nom=:deleteID");
		$this->dbc->bind(':deleteID', $studData['id']);
		$this->dbc->execute();
	}

	public function updateStudent()
	{
		// Getting user input
		$studData = $this->getUserInput();

		// Validating user input
		$result = $this->validateStudent($studData['firstName'], $studData['lastName'], $studData['fakNom'], $studData['specialty'], $studData['course'], $studData['group']);

		if ($result['code'] == 'ok') {
			$this->dbc->preparedQuery("UPDATE students SET fak_nom=:fn, ime=:first, fam=:last, spec=:sp, course=:cr, grupa=:gr WHERE fak_nom='".$studData['id']."'");
			$this->dbc->bind(':fn', $studData['fakNom']);
			$this->dbc->bind(':first', $studData['firstName']);
			$this->dbc->bind(':last', $studData['lastName']);
			$this->dbc->bind(':sp', $studData['specialty']);
			$this->dbc->bind(':cr', $studData['course']);
			$this->dbc->bind(':gr', $studData['group']);
			$this->dbc->execute();
		}

		return $result;
	}

	public function getStudent()
	{
		// Getting student ID
		$studData = $this->getUserInput();

		$this->dbc->preparedQuery("SELECT * FROM students WHERE fak_nom=:fn");
		$this->dbc->bind(':fn', $studData['id']);
		$this->dbc->execute();
		$row = $this->dbc->fetchRowAssoc();
		return $row;
	}

	// 
	public function getAllSortedStudents($sort, $sort_order)
	{
		$this->dbc->preparedQuery("SELECT * FROM students ORDER BY $sort $sort_order");
		$this->dbc->execute();
		$row = $this->dbc->fetchAllAssoc();
		return $row;
	}

	public function getAllStudents()
	{
		$this->dbc->preparedQuery("SELECT * FROM students");
		$this->dbc->execute();
		$row = $this->dbc->fetchAllAssoc();
		return $row;
	}

	// TODO
	public function getSearchedStudents() 
	{
		if ($_POST['search'] != NULL) {
			$this->dbc->preparedQuery("SELECT * FROM students WHERE ime LIKE '%".$_POST["search"]."%' OR fam LIKE '%".$_POST["search"]."%'");
			$this->dbc->execute();
			$row = $this->dbc->fetchAllAssoc();
			return $row;
		}

	}

}

