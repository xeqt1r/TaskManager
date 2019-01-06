<?php
echo "<style>";
include "TManagment/Templates/css/style.css";
echo "</style>";
?>

<h1>Register Page</h1>

<div class="form-register">
<form  method="post">
     <input class="register" type="text" name="username" placeholder="Username"><br>
     <input class="register" type="password" name="password" placeholder="Password"><br>
     <input class="register" type="password" name="confirm_password" placeholder="Confirm Password"><br>
     <input class="register" type="text" name="firstName" placeholder="First Name"><br>
     <input class="register" type="text" name="lastName" placeholder="Last Name"><br>
     <input class="btn" type="submit" name="register" value="Register!">
</form>
</div>