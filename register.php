<?php

	$url = "http://localhost:100/eye/";
	require_once __DIR__ . '/db_connect.php';
 
    $db = new DB_CONNECT();

	if(isset($_POST['email']))
	{
		$email = $_POST['email'];
		$pwd = $_POST['passwd'];
		$name = $_POST['name'];
		$address = $_POST['address'];
		$contact = $_POST['contact'];
		$result = mysql_query("SELECT * FROM users where email ='".$email."'") or die(mysql_error());
		if (mysql_num_rows($result) == 0)
		{ 
			$result = mysql_query("INSERT into users(email,password,name,address,contact) values('".$email."','".$pwd."','".$name."','".$address."','".$contact."')") or die(mysql_error());
			$res = mysql_query("INSERT into carts(product_id_list) values('')") or die(mysql_error());
			header("Location: ".$url."login.php");
			die();
		}
		echo "Username Taken";
	}

?>


