<?php
include('config_local.php');

$genre=$_POST['genre']; //echo $nom.'<br>' ;
$name=strtoupper($_POST['name']); //echo $nom.'<br>' ;
$last=strtoupper($_POST['last']); //echo $nom.'<br>' ;
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

//$idnum=0;
$idnum = mysql_num_rows(mysql_query('select id_client from client where name='.$name.' '));
echo $idnum;  //$id = $idnum+1; //
	$sql=mysql_query("INSERT INTO client (genre,name,last,email,type,phone,birth,room,health,note,date_ajout,auteur)  VALUES
	('$genre','$name','$last','$email','$type','$phone','$birth','$room','$health','$note','$datenow','$moi') ");
if($sql==true) {
 header('location:client_add.php?success=1'.$idnum.'');exit;
		}
?>
<script type="text/javascript">
 // alert('Ajout Effectue avec Succes ! :)');
   // document.location.href = 'client_add.php';
</script>