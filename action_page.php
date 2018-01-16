<?php
	$url = "http://localhost:100/eye/";
	require_once __DIR__ . '/db_connect.php';
 
    // connecting to db
    $db = new DB_CONNECT();
 
	if(isset($_POST['uname'])&&isset($_POST['psw']))
	{
		$email = $_POST['uname'];
		$psw = $_POST['psw'];
		$result = mysql_query("SELECT * FROM users where email ='".$email."'") or die(mysql_error());
		if (mysql_num_rows($result) > 0) 
		{ 
			while ($row = mysql_fetch_array($result)) 
			{
				if($psw == $row['password'])
				{
					session_start();
					$_SESSION['loggedUser'] = $row['user_id'];					
					//echo 'logged in';
					header("Location: ".$url."index.php");
					die();
					break;
				}
				else
				{
					echo 'invalid pass';
				}
			}
		}
		else
		{
			echo 'no such user';
		}
	}	

?>