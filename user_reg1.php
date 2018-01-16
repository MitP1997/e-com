<div class="user">
    <header class="user__header">
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3219/logo.svg" alt="" />
        <h1 class="user__title">Sign Up</h1>
	<link rel="stylesheet" href="user_regcss.css">
    </header>
<form class="form1" method="POST" action="./register.php">
        <div class="form__group">
            <input type="text" placeholder="Name" name="name" class="form__input" />
        </div>
         <div class="form__group">
            <input type="email" placeholder="Email" name="email" class="form__input" />
        </div>
        <div class="form__group">
        <input type="password" placeholder="Password" name="passwd" id="password" required class="form__input"/>     </div>
       
       <div class="form__group"> <input type="password" placeholder="Confirm Password"  id="confirm_password" required class="form__input"/>     </div>
       
       <div class="form__group">
        <input type="text" placeholder="Address" name="address" class="form__input" />
        </div>
		
		<div class="form__group">
            <input type="text" placeholder="Contact" name="contact" class="form__input" />
        </div>
      <button class="btn" type="submit" >Register</button>
</form>
</div>
<script>
var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>