<?php
include('config_local.php');

$id_agent=$_POST['id_agent']; //echo $nom.'<br>' ;
$nom=$_POST['name']; //echo $nom.'<br>' ;
$idnum = mysql_num_rows(mysql_query('select * from aff_agent '));
$idas = $idnum+1; //echo $idas; 
//vider la table
$sql="DELETE from aff_agent WHERE id_agent='$id_agent' ";
mysql_query($sql);

//ajout des actes
foreach ($_POST['speciality'] as $item)
   { //echo $item.'<br>';
	  // echo $id_agent;
   		$sqlz = "INSERT INTO aff_agent(id_soin,id_agent) VALUES ('$item','$id_agent')";
	    //echo $sqlz;
		$resz = mysql_query($sqlz);
   }
	
$niveau=$_POST['niveau'];// echo $valeurs.'<br>';
$conge=$_POST['conge'];// echo $conge.'<br>' ;
$phone=$_POST['phone'];//echo $phone.'<br>';
$score=$_POST['score']; //echo $score.'<br>' ;

$date=date('Y-m-d_H-i-s');

if (session_status() == PHP_SESSION_NONE) {
session_start();
}
$moi=$_SESSION['id'];

$sql2=mysql_query("UPDATE agent SET nom='$nom',niveau='$niveau',conge='$conge',phone='$phone',score='$score',date_modif='$date',auteur='$moi' WHERE id_agent = '$id_agent'	");
if($sql2==true) {
 header('location:agent_all.php?success=1');exit;
		}
?>
<script type="text/javascript">
   // alert('Modifiaction Effectue avec Succes ! :)');
   //document.location.href = 'agent_all.php';
</script>