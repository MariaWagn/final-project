<?php
require_once('../../settings.php');
$content=file_get_contents(APP_PATH.'/data/genre.json');
$content=json_decode($content, true);
$item=$content[$_GET['index']];
if(count($_POST)>0){
	$item=$_POST;
	$content[$_GET['index']]=$item;
	$content=json_encode($content,JSON_PRETTY_PRINT);
	file_put_contents(APP_PATH.'/data/genre.json',$content);
}
?>
<a href="index.php">Go back to the index page</a>
<form action="<?= $_SERVER['PHP_SELF'] ?>?index=<?=$_GET['index'] ?>" method="POST">
	<div>
		<label>Name</label><br/>
		<input type="text" name="name" value="<?= $item['name'] ?>"/>
	</div>
	<div>
		<label>Amount of Books</label><br/>
		<input type="text" name="amount" value="<?= $item['amount'] ?>"/>
	</div>
	<div>
		<label>img</label><br/>
		<textarea name="img"><?= $item['img'] ?></textarea>
	</div>
	<button type="submit">Save changes</button>
</form>