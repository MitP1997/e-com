<?php
    $url = "http://localhost:100/eye/";
    session_start();
    require_once __DIR__ . '/db_connect.php';
 
    // connecting to db
    $db = new DB_CONNECT();
    
  /*  if($_SESSION['loggedUser'] != "")
    {
        
    }
    else
    {
        header("Location: ".$url."login.php");
        die();
    }
*/  
    echo "out";
    if(isset($_POST['atc']))
    {
        echo "add";
        if($_SESSION['loggedUser'] != '')
        {
            $updation = mysql_query("UPDATE carts set product_id_list = concat(product_id_list, ',".$_POST['atc']."') where cart_id = '".$_SESSION['loggedUser']."'") or die(mysql_error());
            
        }
        else
        {
            header("Location: ".$url."login.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sunglasses-Eye See You</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/business-casual.css" rel="stylesheet">
    <style>
        .btns{
            border-radius: 10px;
            border-color: #fff;
            text-decoration-color: #fff;
            background: #333;
            color: #fff;
        }
    </style>
</head>

<body>

    <div class="brand">Eye See You</div>
    <div class="address-bar">EyeWear | SunGlasses | EyeGlasses | Contact Lens</div>

    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Business Casual</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li><a href="eyeglasses.php">EyeGlasses</a>
                    </li>
                    <li><a href="sunglasses.php">SunGlasses</a>
                    </li>
                <li><a href="cart.php">Cart</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

  <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center"><strong>Women</strong>
                    </h2>
                    <hr>
                </div>
        <?php
            $result = mysql_query("SELECT * FROM products where gender = 'W' and category = 'S'") or die(mysql_error());
            if (mysql_num_rows($result) > 0) 
            { 
                while ($row = mysql_fetch_array($result)) 
                {
        ?>
                <div class="col-sm-4 text-center" height = "1000px">
                    <img class="img-responsive" src="<?php echo $row['img']; ?>" alt="Image1">
     <p class="title"><?php echo "Rs. ".$row['price']; ?></p>
  <div class="overlay">    <div class="button">
        <form method="post" action="<?php echo $url.'eyeglasses.php'; ?>">
            <input type="hidden" name="atc" value="<?php echo $row['product_id']; ?>">
            <input class="button btns" style="position: absolute; top:25px;" type="submit" name="a" value="Add to Cart">
        </form>
        <!-- <a href="#">AddToCart</a> -->
    </div></div>
    <?php
        if($_SESSION['loggedUser'] != '')
        {
    ?>    

    <?php
        }
    ?>
                    <h3><?php echo $row['name']; ?>
                        <br>
                    </h3>
                </div>
                <?php

            }
        }
        ?>
<!--            <div class="col-sm-4 text-center">
                    <img class="img-responsive" src="img/XXweg2.jpg" alt=""> <p class="title">Rs 2000</p>
  <div class="overlay"></div>
  <div class="button"><a href="#">AddToCart</a></div>
                    <h3>Black and Gold
                        <small><br>Full Rim</small>
                    </h3>
                </div>
        <div class="col-sm-4 text-center">
                    <img class="img-responsive" src="img/XXweg3.jpg" alt="">
                    <p class="title">Rs 1000</p>
  <div class="overlay"></div>
  <div class="button"><a href="#">AddToCart</a></div>
            <h3>Red Cat-Eye
                        <small><br>Full Rim</small>
                    </h3>
                </div>
            <div class="col-sm-4 text-center">
                    <img class="img-responsive" src="img/XXweg4.jpg" alt="">
                    <p class="title">Rs 750</p>
  <div class="overlay"></div>
  <div class="button"><a href="#">AddToCart</a></div>
            <h3>Blue Box Frame
                        <small><br>Full Rim</small>
                    </h3>
                </div>
            <div class="col-sm-4 text-center">
                    <img class="img-responsive" src="img/XXweg5.jpg" alt="">
                    <p class="title">Rs 1000</p>
  <div class="overlay"></div>
  <div class="button"><a href="#">AddToCart</a></div>
            <h3>Maroon Cat-Eye
                        <small><br>Full Rim</small>
                    </h3>
                </div>
            <div class="col-sm-4 text-center">
                    <img class=0"img-responsive" src="img/XXweg6.jpg" alt="">
                    <p class="title">Rs 1250</p>
  <div class="overlay"></div>
  <div class="button"><a href="#">AddToCart</a></div>
            <h3>Black Round Frame
                        <small>Full Rim</small>
                    </h3>
                </div>
                <div class="col-sm-4 text-center">
                    <img class="img-responsive" src="img/XXweg7.jpg" alt="">
                    <p class="title">Rs 1000</p>
  <div class="overlay"></div>
  <div class="button"><a href="#">AddToCart</a></div>
            <h3>Black with Red Temples
                        <small>Full Rim</small>
                    </h3>
                </div>
                <div class="col-sm-4 text-center">
                    <img class="img-responsive" src="img/XXweg8.jpg" alt="">
                    <p class="title">Rs 890</p>
  <div class="overlay"></div>
  <div class="button"><a href="#">AddToCart</a></div>
            <h3>Leopard Print Cat-Eye
                        <small>Full Rim</small>
                    </h3>
                </div> -->
                <div class="clearfix"></div>
            </div>
        </div>

    </div> 
    <!-- /.container -->

<div class="container">
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center"><strong>Men</strong>
                    </h2>
                    <hr>
                </div>
                <?php
            $result = mysql_query("SELECT * FROM products where gender = 'M' and category = 'S'") or die(mysql_error());
            if (mysql_num_rows($result) > 0) 
            { 
                while ($row = mysql_fetch_array($result)) 
                {
        ?>
                <div class="col-sm-4 text-center">
                    <a href="ImgOpen.html"><img class="img-responsive" src="<?php echo $row['img']; ?>" alt="Image1">
     <p class="title"><?php echo "Rs. ".$row['price']; ?></p>
  <div class="overlay">    <div class="button">
        
        <!-- <a href="#">AddToCart</a> -->
    
    <?php
        if($_SESSION['loggedUser'] != '')
        {
    ?>    
  <form method="post" action="<?php echo $url.'eyeglasses.php'; ?>">
            <input type="hidden" name="atc" value="<?php echo $row['product_id']; ?>">
            <input style="position: absolute; top:25px" class="button btns" type="submit" name="a" value="Add to Cart">
        </form>
    <?php
        }
    ?>
      </div></div></a>
                    <h3><?php echo $row['name']; ?>
                        
                    </h3>
                </div>
                <?php

            }
        }
        ?>
                <div class="clearfix"></div>
            </div>
        </div>

    </div> 
    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; Company 2013</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script>
        function addtocart(prid)
        {
            var xttp = new XMLHttpRequest();
            xttp.open("")
        }
    </script>
</body>

</html>
<?php
  
?>
