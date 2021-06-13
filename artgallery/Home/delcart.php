<?php
		include 'connection.php';
    session_start();
    include 'check.php';
    $username=$_SESSION["username"];
    $artname=$_POST['artname'];
    $count=$conn->prepare("DELETE FROM view_cart WHERE artname=:artname and username=:username");
$data = [
    'artname' => $artname,
    'username'=> $username,
];
$count->execute($data);
header("location:/Home/viewcart.php/");
?>


