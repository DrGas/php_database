<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Client Details</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>


<body>
<?php require 'menu.php';?>

<h2>Client Information</h2>
<?php
$cid = filter_input(INPUT_GET, 'cid', FILTER_VALIDATE_INT) or die('Missing/illegal parameter');

require_once 'dbcon.php';

$sql = 'SELECT `Client-Name`, `Client-Adress`, `Client-Contact-Name`, `Client-Contact-Phone`, `Zip_Code_Zip_Code_ID`
from client
where `CLIENT-ID` = ?';

$stmt = $link->prepare($sql);
$stmt->bind_param('i', $cid);
$stmt->execute();
$stmt->bind_result($cnam, $cadr, $ccnam, $ccphone, $czip);

while($stmt->fetch()) { }

echo '<h1>'.$cnam.'</h1>' . '<br>';
?>
<!--UPDATE DETAILS-->
	<form class="new-form" action="update.php" method="post">
    	<input type="hidden" name="$cid" value='<?=$cid?>'> 
        <input type="text" name="$cnam" placeholder="New client name" required> <br>
    	<button type="submit" value="Update Name">Update Name</button><br><br>
    </form>
<?php 
	//combine to strings and make between them
	/*sql in sql to call two different tables with ZIP to get ZIP code and the city */
	echo '<h3>'.'Address:'.'</h3>';
	echo '<p>'.$cadr. ' ' .$czip.'</p>';
	?>
    <?php 
    $sql = 'SELECT `City` 
	FROM `zip_code` 
	WHERE `Zip_Code_ID` = ?';

$stmt = $link->prepare($sql);
$stmt->bind_param('i', $czip);
$stmt->execute();
$stmt->bind_result($ci);

while($stmt->fetch()) { 
	echo '<p>'.$ci.'</p>';
	?>
    
    <?php
	echo '<h3>'.'Project Contact:'.'</h3>';
	echo '<p>'.$ccnam.'</p>';
	echo '<h3>'.'Contact Number:'.'</h3>';
	echo '<p>'.$ccphone.'</p>';
}
?>
</ul>
   
<br>   

<h2>Projects</h2>
<ul>
<!--PROJECTS-->
<?php 

$sql = 'SELECT `Project-ID`, `Project-Name`
from `project`
where `Project-ID` = ?
and `CLIENT-ID` = `CLIENT-ID`';

$stmt = $link->prepare($sql);
$stmt->bind_param('i', $cid);
$stmt->execute();
$stmt->bind_result($pid, $pnam);

while($stmt->fetch()) { 
	echo '<li><a href="projectdetails.php?cid='.$cid.'">'.$pnam.'</a>'; 
}
	?>	
</ul>


</body>
</html>