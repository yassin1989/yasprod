<?php
include('config_local.php');
$id_cabine=$_POST['id_cabine']; //echo $nom.'<br>' ;

$nom=$_POST['name']; //echo $nom.'<br>' ;
$type=$_POST['type']; //echo $nom.'<br>' ;
$status=$_POST['status']; //echo $niveau.'<br>';
$special=$_POST['special'];// echo $conge.'<br>' ;
$date=date('Y-m-d_H-i-s');

if (session_status() == PHP_SESSION_NONE) {
session_start();
}
$moi=$_SESSION['id'];
	$sql=mysql_query("UPDATE cabine SET name='$nom',type='$type',status='$status',special='$special',date_modif='$date',auteur='$moi' WHERE id_cabine = '$id_cabine'");

?>
<script type="text/javascript">
    alert('Modification Effectue avec Succes ! :)');
    document.location.href = 'cabine_all.php';
</script>