<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
<?php require 'menu.php';?>
<?php
$cid = filter_input(INPUT_GET, 'cid', FILTER_VALIDATE_INT) or die('Missing/illegal parameter');

?>

<h1>Client #<?=$cid?></h1>
<ul>
<?php
require_once 'dbcon.php';
$sql = 'SELECT `Client-Name`, `Client-Adress`, `Client-Contact-Name`, `Client-Contact-Phone`, `Zip_Code_Zip_Code_ID`
from client';

$stmt = $link->prepare($sql);
$stmt->execute();
$stmt->bind_result($cnam, $cadr, $ccnam, $ccphone, $czip);

while($stmt->fetch()) {
	echo '<h2>'.$cnam.'</h1>';
	//combine to strings and make between them
	echo '<h5>'.$cadr. ' ' .$czip.'</h5>';
	echo '<h5>'.$ccnam.'</h5>';
	echo '<h5>'.$ccphone.'</h5>';
	
	//echo '<li><a href="projectdetails.php?fid='.$cnam.'">'.$cadr.' ('.$czip.')</a></li>'.PHP_EOL;
}

?>
</ul>


</body>
</html>