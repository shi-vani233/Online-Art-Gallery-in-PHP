<!DOCTYPE HTML>
<!DOCTYPE html PUBLIC "" ""><HTML lang="en" dir="ltr"><HEAD><META 
content="IE=11.0000" http-equiv="X-UA-Compatible">
   <TITLE>forgot password</TITLE>   
<META http-equiv="Content-Type" content="text/html; charset=windows-1252">
<STYLE>
	body{
  margin: 0;
  padding: 0;
  font-family: sans-serif;
  background-image: url('img.jpg');
  background-size: cover;
}

.signin-box{
  width: 400px;

  position: absolute;
  top: 60%;
  left: 50%;
  transform: translate(-60%,-70%);
  color: white;
}
.signin-box h1{
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
   
<form action="reset_request.php"  class="submit" method="POST">

<DIV class="signin-box">
<H2>Enter Your email and GO ahead</H2>

<DIV class="textbox"><I class="fas fa-phone"></I>     
<INPUT type="email" placeholder="Enter Email Adress" name="email">   </DIV>
<INPUT class="btn" type="submit" value="submit" name="submit">

</form>    	
<?php
    session_start();
    if(isset($_SESSION["msg"]))
    {?>
        <p class="m"><?php echo $_SESSION['msg'];?></p>
    <?php
    
    }
 
   unset($_SESSION['msg']);
?>
</DIV>

    
    
</BODY></HTML>
