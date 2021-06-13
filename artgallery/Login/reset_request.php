<?php
// Connect to MySQL
include 'connection.php';
session_start();

// Was the form submitted?
if (isset($_POST["submit"])) {
	
	// Harvest submitted e-mail address
	if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
		$email = $_POST["email"];
		
	}else{
		$_SESSION['msg']='e-mail is not valid ';
        header("Location:password.php");
	}

    $sth=$conn->prepare("SELECT * FROM user WHERE email = :email");
    $sth->bindParam(':email',$email);
    $sth->execute();

    if($sth->rowCount()){

    	$selector=bin2hex(random_bytes(8));
    	$token=random_bytes(32);

    	$url="http://localhost/Login/create_new_password.php?selector=".$selector."&validator=".bin2hex($token);
    	$expires=date("U") + 300; //expires in 5 minutes


    	$sth=$conn->prepare("DELETE FROM pwdReset WHERE email = :email");
        $sth->bindParam(':email',$email);
        $sth->execute();

        $sth=$conn->prepare("insert into pwdReset(email,selector,token,expires)values(:email,:selector,:token,:expires)"); 
                   
        $sth->bindParam(':email',$email);
        $sth->bindParam(':selector',$selector);
        $sth->bindParam(':token',$token);
        $sth->bindParam(':expires',$expires);
        $sth->execute();

        include 'PHPMailerAutoload.php';
        $mail = new PHPMailer;
        //$mail->SMTPDebug = 3;
        $mail->IsSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPSecure = 'tls'; 
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->SMTPAutoTLS = false; 
        $mail->From = "project23032609@gmail.com";
        $mail->FromName = "FROM ART GALLERY";
        $mail->Username = "project23032609@gmail.com";                 
        $mail->Password = "ibvfkgsgotncjyvf";
        $mail->addAddress($email, "no memory");

        $mail->isHTML(true);

        $mail->Subject = "RESET YOUR PASSWORD FOR ART GALLERY";
        $mail->Body = 'COPY AND PASTE THE BELOW LINK TO CHANGE YOUR PASSWORD<br>'.$url;

        if(!$mail->send()) {
            $_SESSION['msg']='There was a problem during sending Email.Check your Internet ';
        } 
        else {
             $_SESSION['msg']='Check Your Email';
        }
    }

    else{
        $_SESSION['msg']='e-mail is not registered by user';
    }

    header("Location:reset_password.php");
}
else{
    header("Location:index.php");
}
?>