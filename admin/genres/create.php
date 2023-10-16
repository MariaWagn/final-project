<?php
require_once('../../settings.php');
if(count($_POST)>0){
	$content=file_get_contents(APP_PATH.'/data/genre.json');
	$content=json_decode($content, true);
	$content[]=$_POST;
	$content=json_encode($content,JSON_PRETTY_PRINT);
	file_put_contents(APP_PATH.'/data/genre.json',$content);
	header('location:index.php');
}else{
?>
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
	<div>
		<label>Name</label><br/>
		<input type="text" name="name"/>
	</div>
	<div>
		<label>Amount of Books</label><br/>
		<input type="text" name="amount"/>
	</div>
	<div>
		<label>img</label><br/>
		<textarea name="img"></textarea>
	</div>
	<button type="submit">Create item</button>
</form>

<?php
}