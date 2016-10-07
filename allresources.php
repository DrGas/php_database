<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>All Resources</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
</head>

<body>
<?php require 'menu.php';?>

<h1>All Resources</h1>
<br>
<ul>
<?php 

require_once 'dbcon.php';
/*without ? paramiter so no bind_paramiter - placeholder, only bind_resoult if SELECT statement*/
$sql = 'SELECT `Resource-Name`, `Resource_Detail`, `Resource-Type-Code-ID` FROM resources ORDER BY `Resource-Type-Code-ID`';

$stmt = $link->prepare($sql);
$stmt->execute();
$stmt->bind_result($rnam, $rdetail, $rtcid);

while($stmt->fetch()) { 
	echo '<p>'.'<b>'.$rnam.': '.'</b>'.'</p>';
	echo '<p>'.$rdetail.'</p>';
	echo '<p>'.'('.'Resource ID: ' .$rtcid. ')'.'</p>'.'<br>'.PHP_EOL;
}
?>

</ul>
</body>
</html>