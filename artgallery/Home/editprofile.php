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
    
       <h1>UPDATE PROFILE</h1>
</div>
        <?php
        $username=$_SESSION["username"];
        
        $select = $conn->prepare("SELECT * FROM user WHERE username=:username");
        $select->setFetchMode(PDO::FETCH_ASSOC);
        $select->execute(array('username' => $username));
        while($data=$select->fetch()){
        ?>
        <form action="/Home/update.php/" class="UPDATE" method="POST">
        <table>
        <tr>
            <td>
                <p class="m">Username :</p>
            </td>
            <td>
                <p class="m"> <input type="text" name="username" value="<?php echo $_SESSION['username'];?>" size="50" readonly></p>
            </td>
        </tr>
        <br>
        <tr>
            <td>
                <p class="m">  Email : </p>
            </td>
            <td>
                <p class="m"> <input type="text" name="email" value="<?php echo $data['email'];?>" size="50"></p>
            </td>
        </tr>
        <br>
        <tr>
            <td>
                <p class="m"> Address : </p>
            </td>
            <td>
                <p class="m"> <input type="textfield" name="address" value="<?php echo $data['address'];?>" height="200" size="50"></p>
            </td>
        </tr>
        <br>
        <tr>
            <td>
                <p class="m">Phone Number :</p>
            </td>
            <td>
                <p class="m">  <input type="textfield" name="phoneno" value="<?php echo $data['phoneno'];?>" size="50"></p>
            </td>
        </tr>
        </table>
          <?php echo "</br>"; }
 ?> 
      <INPUT class="ctn" type="submit" value="UPDATE">
                 </form>
       <form action="/Home/profile.php/">
      <INPUT class="dtn" type="submit" value="CANCEL">
      </form>
    </center>
    </body>
</html>

