<?php


function __autoload($className) {
	$database = "../src/system/".str_replace('\\', '/', $className). ".php";
	$model = "../src/models/".str_replace('\\', '/', $className). ".php";
	try {
		if (file_exists($database)) {
			require_once($database);
			if (class_exists($className)) {
				return TRUE;
			}
		}
	} catch(Exception $exc) {
		echo $exc->getMessage();
	}
	if (file_exists($model)) {
		include($model);
		if (class_exists($className)) {
			return TRUE;
		}
	}
	return FALSE;
}