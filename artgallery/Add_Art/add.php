<?php
session_start();
include 'check.php';

$artname=$_POST['artname'];
$category=$_POST['category'];
$prize=$_POST['prize'];

include 'connection.php';

if(isset($_POST['submit'])) 
{ 
	$folder ="uploads/"; 
	$image = $_FILES['image']['name']; 
	$path = $folder . $image ; 
	$target_file=$folder.basename($_FILES["image"]["name"]);
	$imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
	$allowed=array('jpeg','png' ,'jpg','jfif'); $filename=$_FILES['image']['name']; 
	$ext=pathinfo($filename, PATHINFO_EXTENSION); 
	

	move_uploaded_file( $_FILES['image'] ['tmp_name'], $path); 
	$sth=$conn->prepare("insert into art(artname,category,prize,image)values(:artname,:category,:prize,:image) "); 
	$sth->bindParam(':image',$image); 
	$sth->bindParam(':artname',$artname);
	$sth->bindParam(':category',$category);
	$sth->bindParam(':prize',$prize);
	$sth->execute(); 
 $_SESSION['message']='successfully uploaded';
                    header("Location:/Add_Art/addart.php/");
	
}
?> 