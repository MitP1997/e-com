<?php

    $url = "http://localhost:100/eye/";
    session_start();
    require_once __DIR__ . '/db_connect.php';
 
    // connecting to db
    $db = new DB_CONNECT();

    if($_SESSION['loggedUser'] != "")
    {
        if($_SESSION['amount'] != "")
        {
            $name = '';
            $email = '';
            $contact = '';
            $address = '';
            $result = mysql_query("SELECT * FROM users where user_id = '".$_SESSION['loggedUser']."'") or die(mysql_error());
            if (mysql_num_rows($result) > 0) 
            { 
                while ($row = mysql_fetch_array($result)) 
                {
                    $name = $row['name'];
                    $email = $row['email'];
                    $contact = $row['contact'];
                    $address = $row['address'];
                }
            }
        }
        else
        {
            header("Location: ".$url."cart.php");
            die();       
        }
    }
    else
    {
        header("Location: ".$url."login.php");
        die();
    }

?>


<div class="user">
    <header class="user__header">
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3219/logo.svg" alt="" />
        <h1 class="user__title">Personal Details</h1>
	<link rel="stylesheet" href="user_regcss.css">
    </header>
<form class="form1">
        <div class="form__group">
            <input value="<?php echo $name; ?>" type="text" placeholder="Name" class="form__input" />
        </div>
         <div class="form__group">
            <input type="email" placeholder="Email" value="<?php echo $email; ?>" class="form__input" />
        </div>
		
		<div class="form__group">
            <input type="text" placeholder="Contact" value="<?php echo $contact; ?>" class="form__input" />
        </div>
      
</form>
   <header class="user__header">
    <h1 class="user__title">Billing Address</h1>
    </header>
<form class="form2">
        <div class="form__group">
            <textarea class="form__input"><?php echo $address; ?></textarea>
            <!-- <input type="text" placeholder="Address Line 1" class="form__input" /> -->
        </div><!-- 
         <div class="form__group">
            <input type="text" placeholder="Address Line 2" class="form__input" />
        </div>
        <div class="form__group">
        <input type="text" placeholder="City" class="form__input"/>     </div>
       
       <div class="form__group">
        <input type="text" placeholder="State" class="form__input"/>     </div>
       
    
    <div class="form__group">
            <input type="number" placeholder="Zip" class="form__input" />
        </div> -->
      <!--   <a href="" class="btn">Proceed</a> -->
      <button class="btn" type="button" onclick="window.location.href='credit.php'">Proceed</button>
</form>
</div>

