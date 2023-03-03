<?php
include('config_local.php');
//include('config_opera.php');

$id=$_GET['id']; echo $id.'<br>' ;
$annuler="annuler"; //echo $genre.'<br>';
$sql=mysql_query("UPDATE reservation SET status='$annuler',start_time='0000-00-00 00:00:00',endtime='0000-00-00 00:00:00' where id_res='$id' ");			
header('location:reservation_all.php?success=1');exit;
	
?>

