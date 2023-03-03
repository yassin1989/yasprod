<?php
include('config_local.php');
//include('config_opera.php');

$id=$_GET['id']; echo $id.'<br>' ;
$datenow=date('Y-m-d_H-i-s');
$annuler="annuler"; //echo $genre.'<br>';
$sql=mysql_query("UPDATE reservation SET status='$annuler', date_modif='$datenow'  where id_res='$id' ");			
header('location:reservation_all.php?success=1');exit;
	
?>

