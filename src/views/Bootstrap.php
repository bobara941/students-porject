<?php


function __autoload($className) {
	$filename = "../src/system/".str_replace('\\', '/', $className). ".php";
	$filename2 = "../src/models/".str_replace('\\', '/', $className). ".php";
	if (file_exists($filename)) {
		include($filename);
		if (class_exists($className)) {
			return TRUE;
		}
	}
	elseif (file_exists($filename2)) {
		include($filename2);
	}
	return FALSE;
}
