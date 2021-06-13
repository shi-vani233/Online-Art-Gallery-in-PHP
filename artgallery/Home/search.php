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
    <br>
    <br>
    
    <?php
        if(!empty($_GET["category"]))
        {
        $select = $conn->prepare("SELECT * FROM art WHERE category=:category AND available=:available");
		$select->setFetchMode(PDO::FETCH_ASSOC);
		$select->execute(array('category' => $_GET['category'] , 'available' =>1 ));
    if($select->rowCount()==0){?>
   <?php
        $msg='no product available of '.$_GET['category'].'. sorry :(';
    header("location:/Home/home.php/?msg={$msg}");
    ?>

    
    
    <?php
    }
		while($data=$select->fetch()){
    ?>  
    <img src="/Add_Art/uploads/<?php echo $data['image']; ?>" width="300" height="300"/>
     <p class="m"> ART NAME :<?php echo $data['artname']; ?></p>
        <p class="n">CATEGORY :<?php echo $data['category']; ?></</p>
        <p class="p">PRIZE :<?php echo $data['prize']; ?></₹ </p>
      <form action="/Home/addpurchase.php/" class="PURCHASE" method="POST">
  
      <input type="hidden" name="artname" value='<?php echo $data['artname']; ?>'>
      <input type="hidden" name="prize" value='<?php echo $data['prize']; ?>'>
      <input type="hidden" name="category" value='<?php echo $data['category']; ?>'>
      <input type="hidden" name="image" value='<?php echo $data['image']; ?>'>
      <INPUT class="dtn" type="submit" value="PURCHASE">
      </form>
      <br>
      <form action="/Home/addcart.php/" class="ADD TO CART+" method="POST">
      <input type="hidden" name="artname" value='<?php echo $data['artname']; ?>'>
      <INPUT class="ctn" type="submit" value="ADD TO CART+">
      <br>
      <br>
    </form>
     
        <?php echo "</br></br>"; }  }
 ?>
      <form action="/Home/home.php/">
      <INPUT class="mtn" type="submit" value=" GO BACK TO HOME">
      </form>
</center>

	
</body>
</html>