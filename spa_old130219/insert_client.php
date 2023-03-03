<?php
include('config_local.php');

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

$idnum=0;
$idnum = mysql_num_rows(mysql_query('select id_client from client'));
$id = $idnum+1; //echo $id;
	$sql=mysql_query("INSERT INTO client (id_client,genre,name,last,email,type,phone,birth,room,health,note,date_ajout,auteur) VALUES
	('$id','$genre','$name','$last','$email','$type','$phone','$birth','$room','$health','$note','$datenow','$moi')");

?>
<script type="text/javascript">
    alert('Ajout Effectue avec Succes ! :)');
    document.location.href = 'client_add.php';
</script>