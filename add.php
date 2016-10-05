<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
<?php
$cid = filter_input(INPUT_POST, 'cid', FILTER_VALIDATE_INT) or die('Missing/illegal parameter');
$pid = filter_input(INPUT_POST, 'pid', FILTER_VALIDATE_INT) or die('Missing/illegal parameter');

require_once 'dbcon.php';

$sql = 'INSERT INTO Project(`Project-ID`, `Project-Name`, `Project-Description`, `Project-Start-Date`, `Project-End-Date`, `CLIENT-ID`)
VALUES(?, ?, ?, ?, ?, ?)';
$stmt = $link->prepare($sql);
$stmt->bind_param('issssi', $pid, $pnam, $pdesc, $psd, $ped, $cid);
$stmt->execute();

if ($stmt->affected_rows >0 ){
	echo 'Project added ';
}
else {
	echo 'No change - project whatever';
//	echo $stmt->error;
}
?>
<hr>
<a href="clientdetails.php?fid=<?=$cid?>">Client Details</a><br>
<a href="clientprojects.php?cid=<?=$pid?>">Client Projects</a><br>

</body>
</html>