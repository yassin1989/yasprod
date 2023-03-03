<?php
include('config_local.php');

$id_aff=$_GET['id']; //echo $id_aff.'<br>' ;
$id_ag=$_GET['agent']; //echo $id_agent.'<br>' ;
$date=$_GET['date']; echo $date ;
//$sql00=mysql_query("SELECT * FROM reservation WHERE id_agent = $id_ag and date = '$date'  ");
//echo $sql00;
//$count=mysql_num_rows($sql00);	
//	if($count > 0) 
	//{ echo $count;
	 //echo " Agent déja affecter !!!" ;exit();
		//header('location:affectation_all.php?error1=1&rev='.$id_ag.'&date='.$date.'');exit;
	//} 
//else {	
$sql0=mysql_query("DELETE FROM affectation WHERE id_affectation = $id_aff ");
if($sql0==true) {
 header('location:affectation_all.php?error1=2&date='.$date.'');exit;
		}

?>

