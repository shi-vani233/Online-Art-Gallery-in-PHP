<?php 
session_start();

include 'check.php';

?>
<!DOCTYPE html PUBLIC "" ""><HTML lang="en" dir="ltr"><HEAD><META 
content="IE=11.0000" http-equiv="X-UA-Compatible">
   <TITLE></TITLE>   
<META http-equiv="Content-Type" content="text/html; charset=windows-1252">
<STYLE>
	body{
  margin: 0;
  padding: 0;
  font-family: sans-serif;
  background: url('/Add_Art/image.jpg') ;
  background-size: cover;
}

.box{
  width: 400px;

  position: absolute;
  top: 60%;
  left: 20%;
  transform: translate(-60%,-70%);
  color: white;
}
.box h1{
  float: left;
	text-align: center;
  font-size: 40px;
  text-shadow: 2px 2px 4px #000000;
  margin-bottom: 1px;
  padding: 13px 0;
}
.textbox{
  width: 100%;
  overflow: hidden;
  font-size: 20px;

  padding: 8px 0;
  margin: 8px 0;
  border-bottom: 1px solid pink;
}
.textbox i{
  width: 20px;
  float: left;
  text-align: center;
}
.textbox input{
  border: none;
  outline: none;
  background: none;
  color: white;
  font-size: 20px;
  width: 70%;
  float: left;
  margin: 0 30px;
}
.btn{
  width: 100%;
  background: none;
  border: 2px solid pink;
  color: white;
  padding: 10px;
  font-size: 18px;
  cursor: pointer;
  margin: 12px 0;
}
.ctn,.mtn{
  width: 70%;
  background: none;
  color: white;
  padding: 10px;
  font-size: 15px;
  cursor: pointer;
  margin: 12px 0;
}
.dtn{
  width: 70%;
  background: none;
  color: white;
  padding: 10px;
  font-size: 15px;
  cursor: pointer;
  margin: 12px 0;
}
.i{
border: none;
  outline: none;
  background: none;
  color: white;
  font-size: 20px;
  width: 70%;
  float: left;
  margin: 0 30px;
}
.m{
  float: left;
	text-align: center;
  font-size: 30px;
  text-shadow: 2px 2px 4px #000000;
  margin-bottom: 1px;
  padding: 13px 0;
  color: red;
}

</STYLE>
    
<META name="GENERATOR" content="MSHTML 11.00.10570.1001"></HEAD>   
<BODY>
<DIV class="box">
<?php echo"</br></br></br></br></br></br></br></br></br></br>"; ?>
<H1>Add New Art</H1>
<form action="/Add_Art/add.php/" enctype="multipart/form-data"  class="submit" method="POST">
<DIV class="textbox"><I class="fas fa-user"></I>     
<INPUT type="text" placeholder="artname" name="artname"  required>	   </DIV>
 <div class="mtn"><h3>
 <label>Select Category : </label>
 <select name="category" required>
    <option name="Oil Pastel" value="Oil Pastel">Oil Pastel</option>
    <option name="Watercolor Painting" value="Watercolor Painting">Watercolor Painting</option>
    <option name="Graffiti" value="Graffiti">Graffiti</option>
    <option name="Acrylic Painting" value="Acrylic Painting">Acrylic Painting</option>
    <option name="Ink Wash Painting" value="Ink Wash Painting">Ink Wash Painting</option>
    <option name="Sketch" value="Sketch">Sketch</option>
    <option name="Other" value="Other">Other</option>
  </select></h3>
</div> 
<DIV class="textbox"><I class="fas fa-relock"></I>     
<INPUT type="prize" placeholder="prize" name="prize"  required>   </DIV>
<DIV class="i">
<label for="img">Select image:</label>
</div>
  <input type="file" id="image" name="image" class="ctn"  required>
 <INPUT class="btn" type="submit" value="submit" name="submit">
</form>
<form action="/Add_Art/viewall.php/" class="view all art" method="POST">
<INPUT class="ctn" type="submit" value="view all arts" name="viewall">
</form>    
<form action="/Login/logout.php" class="Log Out" method="POST">
<INPUT class="dtn" type="submit" value="Log Out">
</form> 
<?php

    if(isset($_SESSION["message"]))
    {?>
        <p class="m"><?php echo $_SESSION['message'];?></p>
    <?php
    
    }
 
   unset($_SESSION['message']);

    ?>
</DIV></BODY></HTML>