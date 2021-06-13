<?php
	if( empty($_SESSION["username"]) || $_SESSION['username']=='user10702')
	{
		header("Location:/Login/index.php");
	}
?>