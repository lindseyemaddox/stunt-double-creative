<?php
	$path = $_SERVER['DOCUMENT_ROOT'];
	$cgPath = str_replace('/content','/cgi-bin',$path);
	require_once($cgPath.'/cms_connect.php');
?>