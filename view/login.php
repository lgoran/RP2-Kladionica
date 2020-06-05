<?php require_once __DIR__ . '/_header.php'; ?>

	<form method="post" action="index.php">
		Username: 
		<input type="text" name="username" />
		<br />
		Password:
		<input type="password" name="password" />
		<br />
		Email (samo za registraciju): 
		<input type="text" name="email" />
		<br />
		<button type="submit" name="gumb" value="login">Ulogiraj se!</button>
		<button type="submit" name="gumb" value="novi">Stvori novog korisnika!</button>
	</form>
<?php require_once __DIR__ . '/_footer.php'; ?>
