<form action="/login" method="POST">

	<input type="email" name="email" placeholder="Please insert your email..">
	<input type="password" name="password" placeholder="Please insert your password..">

	<input type="hidden" name="_token" value="<?php echo csrf_token();?>">
	<button type="submit">Login</button>
</form>