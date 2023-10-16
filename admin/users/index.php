<?php
require_once('../../settings.php');

$fp=fopen(APP_PATH.'/data/users.csv.php', 'r');
?>
<a href="create.php">Add a new item</a>
<table>
<?php
$index=0;
$firstline = true;
while(!feof($fp)){
	$line=trim(fgets($fp));
	if(strlen($line)>0){
		$line=explode(';',$line);
		if($firstline) {
			$firstline = false;
			$index++;
			continue;
		}
		echo '<tr><td>'.$line[0].'</td>';
		echo '<td>'.$line[1].'</td>';
		echo '<td><a href="detail.php?index='.$index.'">Detail</a></td></tr>';
	}
	$index++;
}
fclose($fp);
?>
</table>