<?php
		include 'connection.php';
    session_start();
    include 'check.php';
?>
<html>
    <?php include 'style.php' ?>
    <body>
      <br><br>
    <center>
         <div class="head">
        
       <h1>your profile</h1>
         </div><br>
          <?php
        if(isset($_GET['msg']))
        {?>
        <p class='k'><?php echo $_GET['msg'];?></p>
            <?php
        }
        ?>
        <?php
        $username=$_SESSION["username"];
        
        $select = $conn->prepare("SELECT * FROM user WHERE username=:username");
        $select->setFetchMode(PDO::FETCH_ASSOC);
        $select->execute(array('username' => $username));
        while($data=$select->fetch()){
        ?>
        <p class="l"> USER NAME :  <?php echo $data['username']; ?></p>
           <p class="l"> EMAIL :  <?php echo $data['email']; ?></p>
              <p class="l"> PHONE NUMBER :  <?php echo $data['phoneno']; ?></p>
                 <p class="l"> ADDRESS :  <?php echo $data['address']; ?></p>
                 
        <?php echo "</br>"; }
 ?>
                 <form action="/Home/editprofile.php/" class="EDIT PROFILE" method="POST">
      <input type="hidden" name="username" value='<?php echo $data['username']; ?>'>
      <INPUT class="ctn" type="submit" value="EDIT PROFILE">
                 </form>
      <br>
      <br>
      <br>
      <br>
      <form action="/Home/home.php/">
      <INPUT class="mtn" type="submit" value=" GO BACK TO HOME">
      </form>
    </center>
    </body>
</html>

