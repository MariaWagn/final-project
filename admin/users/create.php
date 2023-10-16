<?php
require_once('../../settings.php');
if(count($_POST)>0){
	$fp=fopen(APP_PATH.'/data/users.csv.php','a+');
	fwrite($fp,$_POST['email'].';'.password_hash($_POST['password'],PASSWORD_DEFAULT).PHP_EOL);
	fclose($fp);
	header('location: index.php');
}else{
?>
<form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
	<div>
		<label>Email</label><br />
		<input type="text" name="email"/>
	</div>
	<div>
		<label>Password</label><br />
		<input type="text" name="password"/>
	</div>
	<button type="submit">Create item</button>
</form>
<?php
}