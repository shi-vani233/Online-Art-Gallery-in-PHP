<!DOCTYPE html>
<html>
	<?php include 'style.php';?>
<body>
<center>
     <div class="head">
    
       <h1>your purchases</h1>
</div>
<?php
include 'connection.php';
session_start();
include 'check.php';
$pusername=$_SESSION["username"];
$select = $conn->prepare("SELECT * FROM art WHERE pusername=:pusername");
$select->setFetchMode(PDO::FETCH_ASSOC);
$select->execute(array('pusername' => $pusername));
if($select->rowCount()==0){?>
	<center>
	<p class="k"> YOU HAVE NOT PURCHASED ANYTHING YET </p>
	</center><?php
}?>
<br><br><br><br>
<?php
while($data=$select->fetch()){
?>	
<img src="/Add_Art/uploads/<?php echo $data['image']; ?>" width="300" height="300"/>
<p class="m"> ART NAME :<?php echo $data['artname']; ?></p>
<p class="n">CATEGORY :<?php echo $data['category']; ?></</p>
<p class="p">PRIZE :<?php echo $data['prize']; ?></₹ </p>
<br>
<br>
<?php }
?>
       <form action="/Home/home.php/">
      <INPUT class="mtn" type="submit" value=" GO BACK TO HOME">
      </form>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
</center>
</body>
</html>
