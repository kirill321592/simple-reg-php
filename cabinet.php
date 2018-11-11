
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>Личный кабинет</h1>
</body>
</html>


<?php
include ('base.php'); 
include ('functions.php'); 
include ('user.php'); 
if(!$user) {
header('location: /les/index.php');
exit();
}

?>
