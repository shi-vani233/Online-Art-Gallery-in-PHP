<!DOCTYPE HTML>
<!DOCTYPE html PUBLIC "" ""><HTML lang="en" dir="ltr"><HEAD><META 
content="IE=11.0000" http-equiv="X-UA-Compatible">
   <TITLE>Sign In</TITLE>   
<META http-equiv="Content-Type" content="text/html; charset=windows-1252">
<STYLE>
	body{
  margin: 0;
  padding: 0;
  font-family: sans-serif;
  background-image: url('/Login/img.jpg');
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
.ctn{
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
<?php

	$selector =$_GET["selector"];
	$validator =$_GET["validator"];
	if(empty($selector) || empty($validator)){
		echo "we can't validate your request";
	}
	else{
		?>
			<form action='check_reset_password.php' method="POST">
				<DIV class="signin-box">
				<input type="hidden" name="selector"value="<?php echo $selector ?>" >
				<input type="hidden" name="validator"value="<?php echo $validator ?>" >
				<DIV class="textbox"><I class="fas fa-lock"></I>     
				<INPUT type="password" placeholder="Enter New Password" name="password">   </DIV>
				<DIV class="textbox"><I class="fas fa-relock"></I>     
				<INPUT type="password" placeholder="Re-Enter New Password" name="repassword">   </DIV>
				<INPUT class="btn" type="submit" value="Reset Password" name="reset">
			</form>
			<?php
			    session_start();
			    if(isset($_SESSION["message"]))
			    {?>
			        <p class="m"><?php echo $_SESSION['message'];?></p>
			    <?php
			    
			    }
			 
			   unset($_SESSION['message']);
		    ?>
			</DIV>
		<?php
	}

?>
</BODY></HTML>


