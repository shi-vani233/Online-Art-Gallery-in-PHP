<?php
    session_start();
    $aname="user10702";
    $apass="user10702";

    include 'connection.php';

    if(isset($_POST['log']))
    {
        if(empty($_POST["username"]) || empty($_POST["password"]))
        {
            $msg='<label>fill the all fields</label>';
        }
        else 
        {
            if($_POST["username"]==$aname && $_POST["password"]==$apass)
            {
                $_SESSION["username"] = $_POST["username"];
                header("location:/Add_art/addart.php");
            }
            else 
            {
                $msg = '<label>invalid username/password </label>';
            }
        }
    }
?>

<HTML lang="en" dir="ltr"><HEAD><META 
content="IE=11.0000" http-equiv="X-UA-Compatible">
   <TITLE>Login Page</TITLE>   
<META http-equiv="Content-Type" content="text/html; charset=windows-1252">
<STYLE>
	body{
  margin: 0;
  padding: 0;
  font-family: sans-serif;
  background-image: url('/Login/image.jpg') ;
  background-size: cover;
}
 h2{
		 margin: 10px 0;
		text-align: center;
		font-size: 80px;
		padding-top: 40px;
		font-family: sans-serif;
		 color: white;
           text-shadow: 2px 2px 4px #000000;
 
	}
.login-box{
  width: 400px;

  position: absolute;
  top: 60%;
  left: 50%;
  transform: translate(-60%,-70%);
  color: white;
}
.login-box h1{
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
<form method="POST">
<DIV class="login-box">
<H1>Log-In for admin</H1>
<DIV class="textbox"><I class="fas fa-user"></I>     
<INPUT type="text" placeholder="Enter Username" value="" name="username">	   </DIV>
<DIV class="textbox"><I class="fas fa-lock"></I>     
<INPUT type="password" placeholder="Enter Password" value="" name="password">   </DIV>
<INPUT class="btn" type="submit" value="Log in" name="log">
</form>
    <br>
    <form action="/Login/index.php/">
      <INPUT class="ctn" type="submit" value="Cancel" align="center">
      </form>
<DIV class=m>
  <?php
    if(isset($msg))
    {
       ?>
    <p class="m"><?php echo '<label class="text-danger">'.$msg.'</label>';?></p>
        <?php
        }
?>
</DIV>

</BODY></HTML>