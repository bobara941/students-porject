<?php

function validateStudent($firstName, $lastName, $fakNom, $specialty, $course, $group)
	{
		try {
			if(empty($firstName)) {
				throw new Exception('Моля въведете Име.');
			}
			if(empty($lastName)) {
				throw new Exception('Моля въведете Фамилия.');
			}
			if(empty($fakNom)) {
				throw new Exception('Моля въведете Факултетен номер.');
			}
			if (strlen($fakNom) > 6 || strlen($fakNom) < 6) {
				throw new Exception('Факултетния номер трябва да бъде дълъг 6 цифри');
			}
			if(empty($specialty)) {
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
		catch (Exception $e) {
			return [
				'code' => 'error', 
				'message' => $e->getMessage()
			];
		}
	}