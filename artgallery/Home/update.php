
<?php

include 'connection.php';
  include 'check.php';
  session_start();
   $username=$_SESSION["username"];
      $email=$_POST['email'];
        $address=$_POST['address'];
        $phoneno=$_POST['phoneno'];
  $select = $conn->prepare("UPDATE user SET email=:email,address=:address,phoneno=:phoneno WHERE username=:username");
  $select->bindValue(":email",$email, PDO::PARAM_STR);
  $select->bindValue(":address",$address, PDO::PARAM_STR);
  $select->bindValue(":phoneno",$phoneno, PDO::PARAM_STR);
  $select->bindValue(":username",$username, PDO::PARAM_STR);
  $select->execute();
  header("location:/Home/profile.php/?msg=updated successfully");

