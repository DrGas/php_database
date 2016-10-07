<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Delete</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<?php require 'menu.php';?>
<?php
$pid = filter_input(INPUT_POST, 'pid', FILTER_VALIDATE_INT) or die('Missing/illegal parameter1');
$rid = filter_input(INPUT_POST, 'rid', FILTER_VALIDATE_INT) or die('Missing/illegal parameter');


require_once 'dbcon.php';

$sql = 'DELETE FROM `project_has_resources` 
WHERE `Project-ID` = ? 
AND `Resources-ID` = ?';

$stmt = $link->prepare($sql);
$stmt->bind_param('ii', $pid, $rid);
$stmt->execute();
//$stmt->bind_result($pid, $rid);

if ($stmt->affected_rows >0 ){
	echo '<h2>' . 'Resource deleted' . '<h2>';
}
else {
	echo '<h2>' . 'No change - resource stil existing' . '<h2>' ;

}

?>
<br>
<a href="allresources.php?cid=<?=$cid?>">Resource details</a>
</body>
</html>