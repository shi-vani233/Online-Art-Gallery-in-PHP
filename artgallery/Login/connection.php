<?php
$dsn="mysql:host=localhost;dbname=art_gallery";
$username="root";
$password="";
try{
	$conn=new PDO($dsn ,$username ,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
	$err = $e->getMessage();
	echo $err;
	exit();
}
?>