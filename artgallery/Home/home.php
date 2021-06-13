<?php
    include 'connection.php';
    session_start();
    include 'check.php';
?>


<!DOCTYPE html>
<html>
  <?php include 'style.php';?>
<body>
<div class="bg">
<div class="u"><center><h1>welcome to Art Gallery</h1></center></div>
</div>
<div class="navbar">
  <a href="/Login/logout.php">Logout</a>
  <a href="/Home/viewcart.php/">Your Cart</a>
  <a href="/Home/viewpurchase.php/">Your Purchases</a>
  <a href="/Home/profile.php/">Your Profile</a>
  <div class="dropdown">
    <button class="dropbtn">Search By Category 
      <i class="fa fa-caret-down"></i>
       </button>
    <div class="dropdown-content">
      <a href="/Home/search.php?category=Oil Pastel " method="GET">Oil Pastel</a>	
       <a href="/Home/search.php?category=Watercolor Painting" method="GET">Watercolor Paiting</a>
       <a href="/Home/search.php?category=Graffiti" method="GET">Graffiti</a>
       <a href="/Home/search.php?category=Acrylic Painting" method="GET">Acrylic Painting</a>	
       <a href="/Home/search.php?category=Ink Wash Painting" method="GET">Ink Wash Painting</a>
       <a href="/Home/search.php?category=Sketch" method="GET">Sketch</a>
       <a href="/Home/search.php?category=Other" method="GET">Other</a>
    </div>
     
  </div>
  </form> 
</div>
    <br>
        <br>
        
        <?php
        if(isset($_GET['msg']))
        {?>
        <p class='k'><?php echo $_GET['msg'];?></p>
            <?php
        }
        ?>
<div class="head">
    
	<h1>Featured Arts</h1>
</div>
    <br>
<center>
    <?php
        $select = $conn->prepare("SELECT * FROM art WHERE available=1 LIMIT 4");
		$select->setFetchMode(PDO::FETCH_ASSOC);
		$select->execute();
		while($data=$select->fetch()){
		?>	
      <img src="/Add_Art/uploads/<?php echo $data['image']; ?>" width="300" height="300"/>
     <p class="m"> ART NAME :<?php echo $data['artname']; ?></p>
        <p class="n">CATEGORY :<?php echo $data['category']; ?></</p>
        <p class="p">PRIZE :<?php echo $data['prize']; ?></₹ </p>
      <form action="/Home/addpurchase.php/" class="PURCHASE" method="POST">
       <input type="hidden" name="category" value='<?php echo $data['category']; ?>'>
      <input type="hidden" name="artname" value='<?php echo $data['artname']; ?>'>
      <input type="hidden" name="prize" value='<?php echo $data['prize']; ?>'>
 
      <input type="hidden" name="image" value='<?php echo $data['image']; ?>'>
      <INPUT class="dtn" type="submit" value="PURCHASE">
      </form>
      <br>
      <form action="/Home/addcart.php/" class="ADD TO CART+" method="POST">
      <input type="hidden" name="artname" value='<?php echo $data['artname']; ?>'>
      <INPUT class="ctn" type="submit" value="ADD TO CART+">
      <br>
      <br>
      <br>
      <br>
    </form>
        	<?php echo "</br></br>"; }
 ?>
</center>
</body>
</html>

