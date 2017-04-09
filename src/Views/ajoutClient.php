<form action="/Clients/ajout" method="POST">
	<p>
	<?php echo $titre_page; ?>
	<label>Name</label>
	<input type="text" name="name">
	</p>
	<p>
	<label>Last name</label>
	<input type="text" name="last_name">
	</p>
	<p>
		<input type="submit" value="Send">
		<input type="reset" value="Cancel">
	</p>
</form>