<?php
include('config_local.php');

$id_client=$_POST['id_abonne']; //echo $id_client.'<br>' ;
$genre=$_POST['genre']; //echo $nom.'<br>' ;
$name=$_POST['name']; //echo $nom.'<br>' ;
$last=$_POST['last']; //echo $nom.'<br>' ;
$email=$_POST['email'];// echo $conge.'<br>' ;
$start=$_POST['start']; //echo $niveau.'<br>';
$end=$_POST['end']; //echo $niveau.'<br>';
$phone=$_POST['phone'];//echo $phone.'<br>';
$birth=$_POST['date'];//echo $phone.'<br>';
//$room=$_POST['room'];//echo $phone.'<br>';
//$health=$_POST['radio'];//echo $phone.'<br>';
$note=$_POST['note'];//echo $phone.'<br>';

$datenow=date('Y-m-d_H-i-s');

if (session_status() == PHP_SESSION_NONE) {
session_start();
}
$moi=$_SESSION['id'];

$sql=mysql_query("UPDATE abonnee SET genre='$genre',name='$name',last='$last',email='$email',start='$start',end='$end',phone='$phone',birth='$birth',note='$note',date_modif='$datenow',auteur='$moi' Where id_abonne= '$id_client' ");
if($sql==true) {
 header('location:abonnee_all.php?error1=3');exit;
		}

?>
