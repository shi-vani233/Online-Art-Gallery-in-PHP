<?php
		include 'connection.php';
    session_start();
    include 'check.php';
    $artname=$_POST['artname'];
    $count=$conn->prepare("DELETE FROM art WHERE artname=:artname");
$data = [
    'artname' => $artname,
];
$count->execute($data);
 $_SESSION['message']='successfully deleted that art';
header("location:/Add_Art/viewall.php/");
?>
