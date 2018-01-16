<?php

	$url = "http://localhost:100/eye/";
    session_start();
    require_once __DIR__ . '/db_connect.php';
 
    // connecting to db
    $db = new DB_CONNECT();

    if($_SESSION['loggedUser'] != "")
    {
    	$productslist='';
     	$result = mysql_query("SELECT * FROM carts where cart_id = '".$_SESSION['loggedUser']."'") or die(mysql_error());  
     	if (mysql_num_rows($result) > 0) 
        { 
            while ($row = mysql_fetch_array($result)) 
            {
            	$productslist = $row['product_id_list'];
            }
        }
        $productslist = substr($productslist,1);
        $products = explode(",",$productslist);
        $query = "SELECT * from products where ";
        $queryAmount = "SELECT SUM(price) from products where ";
        for($i = 0; $i < sizeof($products); $i++)
        {
        	$query .= "product_id = '".$products[$i]."' OR "; 
        	$queryAmount .= "product_id = '".$products[$i]."' OR "; 
        }
        $query = substr($query,0,(strlen($query)-3));
        $queryAmount = substr($queryAmount,0,(strlen($queryAmount)-3));
        $result = mysql_query($query) or die(mysql_error());
        $amount = mysql_query($queryAmount) or die(mysql_error());
        $sum = 0;
        if (mysql_num_rows($amount) > 0) 
    	{ 
        	while ($row = mysql_fetch_array($amount)) 
        	{
        		$sum = $row['SUM(price)'];
        	}
        }


    }
    else
    {
        header("Location: ".$url."login.php");
        die();
    }

?>

	<header id="site-header">
		<div class="container">
			<h1>Shopping cart <span></span> <em><a href="https://codepen.io/tag/rodeo-007" target="_blank"></a></em> <span class="last-span is-open"></span></h1>
			<link rel="stylesheet" href="cartcss.css">
		</div>
	</header>

	<div class="container">

		<section id="cart"> 

			<?php

				if (mysql_num_rows($result) > 0) 
            	{ 
                	while ($row = mysql_fetch_array($result)) 
                	{

			?>
			<article class="product">
				<header>
						<img src="<?php echo $row['img']; ?>" alt="">		
				</header>
				<div class="content">
					<h1><?php echo $row['name']; ?></h1>
					
				</div>
				<footer class="content">
					<!-- <span class="qt-minus">-</span>
					<span class="qt">2</span>
					<span class="qt-plus">+</span>
					 -->
					 <h2 class="full-price">
						<?php echo "INR ".$row['price']; ?>
					</h2>
					<!-- <h2 class="price">
						14.99€
					</h2> -->
				</footer>
			</article>
			<?php
					}
				}
			?>

			
		</section>

	</div>

	<footer id="site-footer">
		<div class="container clearfix">

			<div class="left">
				<h2 class="subtotal">Subtotal: <span>INR <?php echo $sum; ?></span></h2>
				<h3 class="tax">Taxes (18%): <span><?php echo $sum*0.18; ?></span></h3>
			</div>

			<div class="right">
				<h1 class="total">Total: <span><?php echo "INR ".($sum + ($sum * 0.18)); ?></span></h1>
				<a class="btn" onclick="window.location.href='checkout.php'">Checkout</a>
			</div>

		</div>
	</footer>
	<?php

		$_SESSION['amount'] = ($sum + ($sum * 0.18));

	?>
	<script>
		var check = false;

function changeVal(el) {
  var qt = parseFloat(el.parent().children(".qt").html());
  var price = parseFloat(el.parent().children(".price").html());
  var eq = Math.round(price * qt * 100) / 100;
  
  el.parent().children(".full-price").html( eq + "€" );
  
  changeTotal();			
}

function changeTotal() {
  
  var price = 0;
  
  $(".full-price").each(function(index){
    price += parseFloat($(".full-price").eq(index).html());
  });
  
  price = Math.round(price * 100) / 100;
  var tax = Math.round(price * 0.05 * 100) / 100
  var shipping = parseFloat($(".shipping span").html());
  var fullPrice = Math.round((price + tax + shipping) *100) / 100;
  
  if(price == 0) {
    fullPrice = 0;
  }
  
  $(".subtotal span").html(price);
  $(".tax span").html(tax);
  $(".total span").html(fullPrice);
}

$(document).ready(function(){
  
  $(".remove").click(function(){
    var el = $(this);
    el.parent().parent().addClass("removed");
    window.setTimeout(
      function(){
        el.parent().parent().slideUp('fast', function() { 
          el.parent().parent().remove(); 
          if($(".product").length == 0) {
            if(check) {
              $("#cart").html("<h1>The shop does not function, yet!</h1><p>If you liked my shopping cart, please take a second and heart this Pen on <a href='https://codepen.io/ziga-miklic/pen/xhpob'>CodePen</a>. Thank you!</p>");
            } else {
              $("#cart").html("<h1>No products!</h1>");
            }
          }
          changeTotal(); 
        });
      }, 200);
  });
  
  $(".qt-plus").click(function(){
    $(this).parent().children(".qt").html(parseInt($(this).parent().children(".qt").html()) + 1);
    
    $(this).parent().children(".full-price").addClass("added");
    
    var el = $(this);
    window.setTimeout(function(){el.parent().children(".full-price").removeClass("added"); changeVal(el);}, 150);
  });
  
  $(".qt-minus").click(function(){
    
    child = $(this).parent().children(".qt");
    
    if(parseInt(child.html()) > 1) {
      child.html(parseInt(child.html()) - 1);
    }
    
    $(this).parent().children(".full-price").addClass("minused");
    
    var el = $(this);
    window.setTimeout(function(){el.parent().children(".full-price").removeClass("minused"); changeVal(el);}, 150);
  });
  
  window.setTimeout(function(){$(".is-open").removeClass("is-open")}, 1200);
  
  $(".btn").click(function(){
    check = true;
    $(".remove").click();
  });
});

	</script>