<?php
include('config_local.php');

$id_client=$_POST['id_client']; //echo $id_client.'<br>' ;
$genre=$_POST['genre']; //echo $nom.'<br>' ;
$name=$_POST['name']; //echo $nom.'<br>' ;
$last=$_POST['last']; //echo $nom.'<br>' ;
$email=$_POST['email'];// echo $conge.'<br>' ;
$type=$_POST['type']; //echo $niveau.'<br>';
$phone=$_POST['phone'];//echo $phone.'<br>';
$birth=$_POST['date'];//echo $phone.'<br>';
$room=$_POST['room'];//echo $phone.'<br>';
$health=$_POST['radio'];//echo $phone.'<br>';
$note=$_POST['note'];//echo $phone.'<br>';

$datenow=date('Y-m-d_H-i-s');

if (session_status() == PHP_SESSION_NONE) {
session_start();
}
$moi=$_SESSION['id'];

$sql=mysql_query("UPDATE client SET genre='$genre',name='$name',last='$last',email='$email',type='$type',phone='$phone',birth='$birth',room='$room',health='$health',note='$note',date_modif='$datenow',auteur='$moi' Where id_client= '$id_client' ");

?>
<script type="text/javascript">
    alert('Ajout Effectue avec Succes ! :)');
    document.location.href = 'client_all.php';
</script>