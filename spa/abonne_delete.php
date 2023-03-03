<?php
include('config_local.php');
?>
<?php
$id_client=$_GET['id']; //echo $nom.'<br>' ;

$sql=mysql_query("DELETE FROM abonnee  WHERE id_abonne = $id_client	");
if($sql==true) {
 header('location:abonnee_all.php?error1=3');exit;
		}
?>
