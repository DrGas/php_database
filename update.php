<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Update</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php require 'menu.php';?>

<?php
$cnam = filter_input(INPUT_POST,'$cnam', FILTER_SANITIZE_STRING) or die('Missing/illegal parameter');
$cid = filter_input(INPUT_POST, '$cid', FILTER_VALIDATE_INT) or die('Missing/illegal parameter2');

require_once 'dbcon.php';
/*UPDATE needs SET (specific table and row) and WHERE - otherwise it will change all the names*/
$sql = 'UPDATE `client` 
SET `Client-Name` = ?
WHERE `Client-ID` = ?';

$stmt = $link->prepare($sql);
$stmt->bind_param('si', $cnam, $cid);
$stmt->execute();
//$stmt->bind_result($cid, $cnam);

if ($stmt->affected_rows >0 ){
	echo '<h2>' . 'Information Updated' . '<h2>';
}
else {
	echo '<h2>' . 'No change' . '<h2>';

}
?>
<br>
<a href="clientdetails.php?cid=<?=$cid?>">Client details</a><br>
</body>

</html>