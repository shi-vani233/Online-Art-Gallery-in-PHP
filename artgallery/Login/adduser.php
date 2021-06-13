<?php
session_start();
include 'connection.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$aname="admin";
$apass="admin";
$username=$_POST['username'];
$password=$_POST['password'];
$repassword=$_POST['repassword'];
$email=$_POST['email'];
$phoneno=$_POST['phoneno'];
$address=$_POST['address'];
$ulen=strlen($username);
$plen=strlen($password);
$aname="admin";
    $apass="admin";

if(isset($_POST['sign']))
{
     if(empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["repassword"]) || empty($_POST["email"]) || empty($_POST['phoneno']) || empty($_POST['address']))
        {
            $_SESSION['message']='fill all the details';
            header("Location:signup.php");
        }
        else
        {
            if($_POST["username"]==$aname || $_POST["password"]==$apass)
            {
               $_SESSION['message']='Enter some other username or password';
                                 header("Location:/Login/signup.php/");
            }
 else {
            if($password==$repassword)
            {
                if($plen>5)
                {
                    if (filter_var($email, FILTER_VALIDATE_EMAIL) != true)
                    {
                        $_SESSION['message']='Invalid pattern of email';
                        header("Location:signup.php");
                    }
                    else {
                            if(strlen($phoneno)==10 && preg_match("/^[789]\d{9}$/",$phoneno)){
                        $sth=$conn->prepare("insert into user(username,password,email,phoneno,address)values(:username,:password,:email,:phoneno,:address)"); 
                        $sth->bindParam(':username',$username); 
                        $sth->bindParam(':password',$password);
                        $sth->bindParam(':email',$email);
                        $sth->bindParam(':phoneno',$phoneno);
                        $sth->bindParam(':address',$address);
                        $sth->execute();
                        $_SESSION["username"] = $username;
                        header("Location:/Home/home.php");
                            }
                            else
                            {
                                 $_SESSION['message']='Enter valid phone number';
                                 header("Location:signup.php");
                            }
                            
                    }
                }
                else
                {
                    $_SESSION['message']='password length should be minimum of 6';
                    header("Location:signup.php");
                }
             }
            else
            {    
                $_SESSION['message']='password does not match';
                header("Location:signup.php");
            }
 }
        } 
}
?>