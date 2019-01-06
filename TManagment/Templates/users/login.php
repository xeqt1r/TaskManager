<?php
echo "<style>";
include "TManagment/Templates/css/style.css";
echo "</style>";
?>


<h1>Login</h1>

<div class="form-login">
<form method="post">
    <input class="username" type="text" name="username" placeholder="Username"><br>
    <input class="password" type="password" name="password" placeholder="Password"><br>
    <input class="btn" type="submit" name="login" value="Login" ">
</form>

    <p> Not registered? <a href="register.php">Create an account</a> </p>

</div>

