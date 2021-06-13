<html>
    <?php include 'style.php';
    ?><style>
        .x{
  float: center;
	text-align: center;
  font-size: 30px;
  text-shadow: 1px 1px 2px #000000;
  margin-bottom: 1px;
  padding: 13px 0;
  color: red;
}
    </style>
<br><br><br><br><br><br>
<body><center>
     <?php
   session_start();
    if(isset($_SESSION["message"]))
    {?>
        <p class="x"><?php echo $_SESSION['message'];?></p>
    <?php
    
    }
 
   unset($_SESSION['message']);

    ?>
		<?php
		
    	include 'connection.php';
   
      include 'check.php';

		$select = $conn->prepare("SELECT * FROM art ");
		$select->setFetchMode(PDO::FETCH_ASSOC);
		$select->execute();
		while($data=$select->fetch()){
		?>	
		<img src="/Add_Art/uploads/<?php echo $data['image']; ?>" width="300" height="300"/>
    <?php if($data['available']==1){ ?>
                 <form action="/Add_Art/delart.php/" class="REMOVE THIS CART" method="POST">
		<p class="m"> ART NAME :&nbsp<?php echo $data['artname']; ?></p>
        <p class="n">CATEGORY :<?php echo $data['category']; ?></</p>
        <p class="p">PRIZE :<?php echo $data['prize']; ?> ₹ </p>
       
      <input type="hidden" name="artname" value='<?php echo $data['artname']; ?>'>
      <INPUT class="ctn" type="submit" value="REMOVE THIS ART">
      <br>
      <br>
    </form>
        <br>
    	<?php echo "</br></br>"; } 
      else { ?>
        <p class="m"> THE ART &nbsp<?php echo $data['artname']; ?> <br></p>
        <p class="m">   IS SOLD TO   <?php echo $data['pusername']; ?><br></p>
     <p class="m">   IN   <?php echo $data['prize']; ?> ₹ </p>
     
        <br>
        <br>
        
      <?php }} ?> 
       
 <form action="/Add_Art/addart.php/">
      <INPUT class="mtn" type="submit" value=" GO BACK TO HOME">
      </form>
</center></body></html>