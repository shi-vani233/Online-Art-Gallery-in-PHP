<?php
    include 'connection.php';
	if(isset($_POST['reset'])){

		$selector =$_POST["selector"];
		$validator =$_POST["validator"];
		$password=$_POST['password'];
		$repassword=$_POST['repassword'];
		if(empty($selector) || empty($validator) ||empty($password) ||empty($repassword)){
			$_SESSION['message']='fill all the details';
			header("Location: reset_pass.php");
		}
		if($password==$repassword)
        {
            if(strlen($password)<6)
            {  
               $_SESSION['message']='password length should be minimum of 6';
               header("Location:reset_pass.php");
            }
         }
        else{    
            $_SESSION['message']='password does not match';
            header("Location:reset_pass.php");
        }
        $currentdate=date("U");

        $statement = $conn->prepare("SELECT * FROM pwdreset WHERE selector = :selector AND expires >= :currentdate");
        $statement->execute( array('selector' => $selector,'currentdate' => $currentdate));
        $count = $statement->rowCount();
        if(!$count){
        	 $_SESSION['msg']='You have to resubmit your request';
           	 header("Location:reset_pass.php");
        }
        $data = $statement->fetch();
        $token = hex2bin($validator);
        $tokencheck = password_verify($token,$data['token']);

        if(!$tokencheck){
        	$_SESSION['msg']='You have to resubmit your request';
           	header("Location:reset_pass.php");
        }

        $email = $data['email'];

        $select = $conn->prepare("UPDATE user SET password=:password WHERE email=:email");
		$select->bindValue(":password",$password, PDO::PARAM_STR);
		$select->bindValue(":email",$email, PDO::PARAM_STR);
		$select->execute();

		$delete = $conn->prepare("DELETE FROM pwdreset WHERE email = :email ");
        $delete->execute( array('email' => $email));

        $_SESSION['msg']='PASSWORD CHANGED SUCCESFULLY';
        header("Location:index.php");
	}
	else{
		header("Location: index.php");
	}
?>