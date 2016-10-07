<?php
/*const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASS = '';
const DB_NAME = 'Project_VD';*/

const DB_HOST = 'magdalenadrgas.dk.mysql';
const DB_USER = 'magdalenadrgas_';
const DB_PASS = 'Sr6awUJb';
const DB_NAME = 'magdalenadrgas_';

$link = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($link->connect_error) { 
	die('Connect Error ('.$link->connect_errno.') '.$link->connect_error);
}
$link->set_charset('utf8'); 
?>
