<h1>Bitcrypt</h1>

<h2>Registration Form</h2>

<?php
	if(isset($view_vars['message'])){
?>
		<p class="message"><?=$view_vars['message'];?></p>
<?php
	}
?>
<form name="register" action="index.php" method="post">
	<label>Email</label>
	<input type="text" name="email" id="email" style="display-inline" />

	<label>Password</label>
	<input type="password" name="password1" />
	<label>Confirm Password</label>
	<input type="password" name="password2" />
	<input type="submit" value="Register" />
</form>
