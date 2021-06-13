<html>
     <?php include 'style.php';?>
    <body>
<?php
include 'connection.php';
session_start();
include 'check.php';
$username=$_SESSION["username"];
$artname=$_POST['artname'];
$prize=$_POST['prize'];
$category=$_POST['category'];
$image=$_POST['image'];
$available=0;
?><br>
    <center>
        
        <img src="/Add_Art/uploads/<?php echo $image; ?>" width="300" height="300"/>
     <p class="m"> ART NAME :<?php echo $artname; ?></p>
        <p class="n">CATEGORY :<?php echo $category; ?></</p>
        <p class="p">PRIZE :<?php echo $prize; ?></₹ </p>
        <p class="k">PURCHASED SUCCESSFULLY </p>
        <br>
        <div class="head">
        <h1>Product will be Delivered to your Address soon</h1>
        </div>
        <br>
        <form action="/Home/viewpurchase.php/">
      <INPUT class="mtn" type="submit" value=" SEE ALL YOUR PURCHASES">
      </form>
        <br>
       <form action="/Home/home.php/">
      <INPUT class="mtn" type="submit" value=" GO BACK TO HOME">
      </form>


    </center>
     <?php

   
$data = [
    'artname' => $artname,
    'username'=> $username,
    'available'=> $available,
];
$statement = $conn->prepare("UPDATE art SET pusername=:username,available=:available WHERE artname = :artname");
$statement->execute($data);
?>
    </body>
</html>
