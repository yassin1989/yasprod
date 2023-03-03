<?php
include('config_local.php');

$genre=$_POST['genre']; echo $genre.'<br>' ;
$name=strtoupper($_POST['name']); echo $name.'<br>' ;
$last=strtoupper($_POST['last']); echo $last.'<br>' ;
$email=$_POST['email']; echo $email.'<br>' ;
$start=$_POST['start']; echo $start.'<br>';
$end=$_POST['end'];echo $end.'<br>';
$phone=$_POST['phone'];echo $phone.'<br>';
$birth=$_POST['birth'];echo $birth.'<br>';
$note=$_POST['note'];echo $note.'<br>';

$datenow=date('Y-m-d_H-i-s');

if (session_status() == PHP_SESSION_NONE) {
session_start();
}
$moi=$_SESSION['id'];
//$idnum=0;
$idnum = mysql_num_rows(mysql_query('select id_abonnee from abonnee where name='.$name.' '));
echo $idnum;  //$id = $idnum+1; //
	$sql=mysql_query("INSERT INTO abonnee (genre,name,last,email,start,end,phone,birth,note,datenow,auteur)  VALUES
	('$genre','$name','$last','$email','$start','$end','$phone','$birth','$note','$datenow','$moi') ");
if($sql==true) {
 header('location:client_abonne.php?success=1'.$idnum.'');exit;
		}
?>