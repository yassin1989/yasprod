<?php
include('config_local.php');
include('config_opera.php');

$id=$_GET['id']; echo $id.'<br>' ;
$paye="payer"; //echo $genre.'<br>';
$sql=mysql_query("UPDATE reservation SET paye='$paye' where id_res='$id' ");			
header('location:reservation_all.php?success=1');exit;
	
?>

