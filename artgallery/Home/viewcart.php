<?php
		include 'connection.php';
    session_start();
    include 'check.php';
?>
<!DOCTYPE html>
<html>
  <?php include 'style.php' ?>
	
                         
<body>
<center>
   <div class="head">
    
       <h1>your cart</h1>
</div>
<?php
$username=$_SESSION["username"];
$select = $conn->prepare("SELECT * FROM art NATURAL JOIN view_cart WHERE username=:username AND available=:available");
$select->setFetchMode(PDO::FETCH_ASSOC);
$select->execute(array('username' => $username,
                      'available' => 1));
if($select->rowCount()==0){?>
   <center>
	<p class="k"> YOUR CART IS EMPTY.SAVE YOUR FAVORITE ART HERE :) </p>
	</center>
    <?php
}?> 
<br><br><br><br>
<?php
while($data=$select->fetch()){
?>	
<img src="/Add_Art/uploads/<?php echo $data['image']; ?>" width="300" height="300"/>
<p class="m"> ART NAME :<?php echo $data['artname']; ?></p>
<p class="n">CATEGORY :<?php echo $data['category']; ?></</p>
<p class="p">PRIZE :<?php echo $data['prize']; ?> ₹ </p>
<form action="/Home/addpurchase.php/" class="PURCHASE" method="POST">
       <input type="hidden" name="category" value='<?php echo $data['category']; ?>'>
      <input type="hidden" name="artname" value='<?php echo $data['artname']; ?>'>
      <input type="hidden" name="prize" value='<?php echo $data['prize']; ?>'>
 
      <input type="hidden" name="image" value='<?php echo $data['image']; ?>'>
      <INPUT class="dtn" type="submit" value="PURCHASE">
      </form>
<br>
      <form action="/Home/delcart.php/" class="ADD TO CART+" method="POST">
      <input type="hidden" name="artname" value='<?php echo $data['artname']; ?>'>
      <INPUT class="ctn" type="submit" value="DELETE FROM CART-">
      <br>
      <br>
    </form>
<?php }
?>
      <br>
       <form action="/Home/home.php/">
      <INPUT class="mtn" type="submit" value=" GO BACK TO HOME">
      </form>
      </center>
</body>
</html>
