<?php
	if(empty($_SESSION["username"]))
	{
		header("Location:/Login/index.php");
	}
?>