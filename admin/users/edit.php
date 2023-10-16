<?php
require_once('../../settings.php');

If(count($_POST)>0){
	$output='';
	$fp=fopen(APP_PATH.'/data/users.csv.php', 'r');
	$index=0;
	while(!feof($fp)){
		$line=fgets($fp);
		if($index==$_GET['index']){
			$output.=$_POST['email'].';'.$_POST['password'].PHP_EOL;
		}else{
			$output.=$line;
		}
		$index++;
	}
	fclose($fp);
	$fp=fopen(APP_PATH.'/data/users.csv.php', 'w');
	fputs($fp, $output);
	fclose($fp);
}
$fp=fopen(APP_PATH.'/data/users.csv.php', 'r');
?>
<a href="index.php">Go back to index</a><br />

<?php
$index=0;
while(!feof($fp)){
	$line=trim(fgets($fp));
	if($_GET['index']==$index){
		if(strlen($line)>0){
			$line=explode(';',$line);
			?>
			<form method="POST" action="<?= $_SERVER['PHP_SELF'] ?> ?index=<?= $_GET['index']?>">
				<div>
					<label>Email</label><br />
					<input type="text" name="email" value="<?= $line[0]?>"/>
				</div>
				<div>
					<label>Password</label><br />
					<input type="text" name="password" value="<?= $line[1]?>"/>
				</div>
				<button type="submit">Save changes</button>
			</form>
			<?php
		}
		break;
	}
	$index++;
}
fclose($fp);