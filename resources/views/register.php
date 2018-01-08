<form action="/register" method="POST">
	<input type="text" name="first_name" placeholder="Please insert your firstname..">
	<input type="text" name="last_name" placeholder="Please insert your lastname..">
	<input type="email" name="email" placeholder="Please insert your email..">
	<input type="password" name="password" placeholder="Please insert your password..">

	<input type="hidden" name="_token" value="<?php echo csrf_token();?>">
	<button type="submit">Register</button>
</form>