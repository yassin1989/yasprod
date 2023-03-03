<?php
include('config_local.php');

$nom=$_POST['name']; //echo $nom.'<br>' ;
//$spec=$_POST['Speciality'];echo $spec.'<br>';
$idnum = mysql_num_rows(mysql_query('select id_agent from agent'));
$id = $idnum+1; //echo $id;
$valeurs="";
foreach ($_POST['Speciality'] as $item)
   { 
	$valeurs= $valeurs.' / '.$item; echo $item ;
	$sql0=mysql_query("INSERT INTO aff_agent (id_agent,id_soin) values ('$id','$item') ");
   }

$niveau=$_POST['niveau']; //echo $niveau.'<br>';
$conge=$_POST['conge'];// echo $conge.'<br>' ;
$phone=$_POST['phone'];//echo $phone.'<br>';
$score=$_POST['score']; //echo $score.'<br>' ;

$date=date('Y-m-d_H-i-s');

if (session_status() == PHP_SESSION_NONE) {
session_start();
}
$moi=$_SESSION['id'];

	$sql=mysql_query("INSERT INTO agent (id_agent,nom,specialty,niveau,conge,phone,score,date_ajout,auteur) VALUES
	('$id','$nom','$valeurs','$niveau','$conge','$phone','$score','$date','$moi')");

?>
<script type="text/javascript">
    alert('Ajout Effectue avec Succes ! :)');
    document.location.href = 'agent_add.php';
</script>