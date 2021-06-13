<html>
    <?php include 'style.php';?>
    <body>
<?php
include 'connection.php';
session_start();
include 'check.php';
$username=$_SESSION["username"];
$artname=$_POST['artname'];
$data = [
    'artname' => $artname,
    'username'=> $username,
];
$select = $conn->prepare("SELECT * FROM view_cart WHERE username=:username AND artname=:artname");
$select->setFetchMode(PDO::FETCH_ASSOC);
$select->execute(array('username' => $username ,'artname'=>$artname));
if($select ->rowCount()==0){
$statement = $conn->prepare("insert into view_cart(artname,username) values(:artname,:username)");
$statement->execute($data);
       header("location:/Home/home.php/?msg=Added to cart Successfully");
       ?>
    <?php
}
else {?>
	<?php header("location:/Home/home.php/?msg=This art is already in your cart");?>
<?php
}
?>
</body>
</html>